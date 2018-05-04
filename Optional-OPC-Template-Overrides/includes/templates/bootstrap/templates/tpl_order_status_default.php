<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9 (cindy@vinosdefrutastropicales.com).
// Copyright (C) 2018, Vinos de Frutas Tropicales.  All rights reserved.
//
// Adapted from the like-named page handling with the following history:
// - Integrated COWAA v1.0 (@davewest)
//
//use the following defines if you want to turn off payment, products, shipping
define('DISPLAY_PAYMENT', true);
define('DISPLAY_SHIPPING', true);
define('DISPLAY_PRODUCTS', true);
?>

<div class="centerColumn" id="orderStatusDefault">
<h1 id="orderStatusDefaultHeading"><?php echo HEADING_TITLE; ?></h1>

<?php 
if ($messageStack->size('order_status') > 0) {
    echo $messageStack->output('order_status');
}

if (isset($order)) { 
?>

<div class="card p-0 mb-3">
  <h4 class="card-header">
    <?php echo SUB_HEADING_TITLE . ORDER_HEADING_DIVIDER . sprintf(HEADING_ORDER_NUMBER, $_POST['order_id']); ?>
  </h4>
  <div class="card-body p-3">

<div class="text-right px-3"><?php echo HEADING_ORDER_DATE . ' ' . zen_date_long($order->info['date_purchased']); ?></div>

<?php 
    if (DISPLAY_PRODUCTS) { 
?>
<div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr class="tableHeading">
                <th scope="col" id="myAccountQuantity"><?php echo HEADING_QUANTITY; ?></th>
                <th scope="col" id="myAccountProducts"><?php echo HEADING_PRODUCTS; ?></th>
<?php
        if (count($order->info['tax_groups']) > 1) {
?>
                <th scope="col" id="myAccountTax"><?php echo HEADING_TAX; ?></th>
<?php
        }
?>
                <th scope="col" id="myAccountTotal"><?php echo HEADING_TOTAL; ?></th>
            </tr>
<?php
        $currency = $order->info['currency'];
        $currency_value = $order->info['currency_value'];
        foreach ($order->products as $current_product) {
?>
            <tr>
                <td class="accountQuantityDisplay"><?php echo $current_product['qty'] . QUANTITY_SUFFIX; ?></td>
                <td class="accountProductDisplay"><?php echo $current_product['name'];

            if (isset($current_product['attributes']) && is_array($current_product['attributes']) && count($current_product['attributes']) > 0) {
?>
                    <ul id="orderAttribsList">
<?php
                foreach ($current_product['attributes'] as $current_attribute) {
?>
                        <li><?php echo $current_attribute['option'] . TEXT_OPTION_DIVIDER . nl2br($current_attribute['value']); ?></li>
<?php
                }
?>
                    </ul>
<?php
            }
?>
                </td>
<?php
            $product_tax = $current_product['tax'];
            if (count($order->info['tax_groups']) > 1) {
?>
                <td class="accountTaxDisplay"><?php echo zen_display_tax_value($product_tax) . '%' ?></td>
<?php
            }
?>
                <td class="accountTotalDisplay"><?php echo $currencies->format(zen_add_tax($current_product['final_price'], $product_tax) * $current_product['qty'], true, $currency, $currency_value) . ($current_product['onetime_charges'] != 0 ? '<br />' . $currencies->format(zen_add_tax($current_product['onetime_charges'], $product_tax), true, $currency, $currency_value) : ''); ?></td>
            </tr>
<?php
        }
?>

<?php
        foreach ($order->totals as $current_ot) {
?>

<tr>
<td colspan="2" class="text-right bg-white">
<?php echo $current_ot['title']; ?>
</td>
<td class="text-left bg-white">
<?php echo $current_ot['text']; ?>
</td> 
</tr>

<?php
        }
?>
        </table>
</div>

</div>
</div>
<?php 
    }

    // -----
    // Displays any downloads associated with the order.  The base processing (from the zc156 version) will
    // search based on an email address, if set into the session.
    //
    // We'll set the order's email address into the session for that module's processing and then remove
    // that value, once finished.
    //
    if (DOWNLOAD_ENABLED == 'true') {
        require $template->get_template_dir('tpl_modules_downloads.php', DIR_WS_TEMPLATE, $current_page_base, 'templates'). '/tpl_modules_downloads.php';
    }
    
    // -----
    // Display the order's status information.
    //
    if (count($statusArray) > 0) {
?>

<div class="card p-0 mb-3">
  <h4 class="card-header">
    <?php echo HEADING_ORDER_HISTORY; ?>
  </h4>
  <div class="card-body p-3">
 <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr class="tableHeading">
                <th scope="col" id="myAccountStatusDate"><?php echo TABLE_HEADING_STATUS_DATE; ?></th>
                <th scope="col" id="myAccountStatus"><?php echo TABLE_HEADING_STATUS_ORDER_STATUS; ?></th>
                <th scope="col" id="myAccountStatusComments"><?php echo TABLE_HEADING_STATUS_COMMENTS; ?></th>
            </tr>
<?php
        foreach ($statusArray as $statuses) {
?>
            <tr>
                <td><?php echo zen_date_short($statuses['date_added']); ?></td>
                <td><?php echo $statuses['orders_status_name']; ?></td>
                <td><?php echo (empty($statuses['comments']) ? '&nbsp;' : nl2br(zen_output_string_protected($statuses['comments']))); ?></td> 
            </tr>
<?php
        }
?>
        </table>
        </div>
<?php 
    } 
?>
  </div>
</div>



        
<?php 
    if (DISPLAY_SHIPPING) { 
?>
        <div class="row">
            <div class="col">
<?php 
        if (zen_not_null($order->info['shipping_method'])) { 
?>

<div class="card p-0 mb-3">
  <h4 class="card-header">
    <?php echo HEADING_SHIPPING_METHOD; ?>
  </h4>
  <div class="card-body p-3">
<?php echo $order->info['shipping_method']; ?>
  </div>
</div>


<?php 
        } else { // temporary just remove these 4 lines ?>

<div class="card p-0 mb-3">
  <div class="card-body p-3">
<?php echo 'WARNING: Missing Shipping Information'; ?>
  </div>
</div>

<?php
        }
?>
        </div>
<?php 
    }
?>

<?php 
    if (DISPLAY_PAYMENT) { 
?>
<div class="col">
<div class="card p-0 mb-3">
  <h4 class="card-header">
    <?php echo HEADING_PAYMENT_METHOD; ?>
  </h4>
  <div class="card-body p-3">
<?php echo $order->info['payment_method']; ?>
  </div>
</div> 

 </div>
<?php 
    } 
?>
    </div>
<?php 
} 

echo zen_draw_form('order_status', zen_href_link(FILENAME_ORDER_STATUS, 'action=status', $request_type), 'post');
?>

<div id="lookupOrderInformation-card" class="card p-0 mb-3">
  <h4 class="card-header">
<?php echo HEADING_TITLE; ?>
  </h4>
  <div class="card-body p-3">
<?php echo TEXT_LOOKUP_INSTRUCTIONS; ?>
  <div class="p-3"></div>

        <?php echo zen_draw_input_field($spam_input_name, '', ' size="40" id="CUAS" style="visibility:hidden; display:none;" autocomplete="off"'); ?>
        <?php echo $extra_validation_html; ?>

        <label class="inputLabel"><?php echo ENTRY_ORDER_NUMBER; ?></label>
        <?php echo zen_draw_input_field('order_id', $orderID, 'size="10" id="order_id"', 'number'); ?> 
    <div class="p-3"></div>
        
        <label class="inputLabel"><?php echo ENTRY_EMAIL; ?></label>
        <?php echo zen_draw_input_field('query_email_address', $query_email_address, 'size="35" id="query_email_address"', 'email'); ?> 
    <div class="p-3"></div>

<div id="lookupOrderInformation-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo zen_image_submit(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT); ?>
</div>

</form>

  </div>
</div>

</div>