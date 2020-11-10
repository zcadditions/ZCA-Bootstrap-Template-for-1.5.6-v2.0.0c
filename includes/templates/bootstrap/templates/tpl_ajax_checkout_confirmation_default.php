<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=checkout_confirmation.<br />
 * Displays final checkout details, cart, payment and shipping info details.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2017 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id:  Aug 2017 Modified in v1.5.6 $
 */
?>
<div id="checkoutConfirmationDefault" class="centerColumn">

<div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
</div>

<h1 id="checkoutConfirmationDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if ($messageStack->size('redemptions') > 0) echo $messageStack->output('redemptions'); ?>
<?php if ($messageStack->size('checkout_confirmation') > 0) echo $messageStack->output('checkout_confirmation'); ?>
<?php if ($messageStack->size('checkout') > 0) echo $messageStack->output('checkout'); ?>

<div id="checkoutConfirmationDefault-card-columns" class="card-columns">  
  
<!--bof billing address card-->
<div id="billingAddress-card" class="card mb-3">
<h4 id="billingAddress-card-header" class="card-header"><?php echo HEADING_BILLING_ADDRESS; ?></h4>

<div id="billingAddress-card-body" class="card-body p-3">

<address><?php echo zen_address_format($order->billing['format_id'], $order->billing, 1, ' ', '<br />'); ?></address>

<div id="billingAddress-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar">
<?php if (!$flagDisablePaymentAddressChange) { ?>
<?php echo '<a href="' . zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_EDIT_SMALL, BUTTON_EDIT_SMALL_ALT) . '</a>'; ?>
<?php } ?>
</div>

    </div>
  </div>
<!--eof bill to address card-->

<!--bof payment method card-->
  <div id="paymentMethod-card" class="card mb-3">
<?php
  $class =& $_SESSION['payment'];
?>

<h4 id="paymentMethod-card-header" class="card-header"><?php echo HEADING_PAYMENT_METHOD; ?></h4>
          <div id="paymentMethod-card-body" class="card-body">
<h4 id="paymentMethod-paymentTitle"><?php echo $GLOBALS[$class]->title; ?></h4>

<?php
  if (is_array($payment_modules->modules)) {
    if ($confirmation = $payment_modules->confirmation()) {
?>
<div id="paymentMethod-content" class="content"><?php echo $confirmation['title']; ?></div>
<?php
    }
?>
<div id="paymentMethod-content-one" class="content">
<?php
      for ($i=0, $n=sizeof($confirmation['fields']); $i<$n; $i++) {
?>
<div class="row">
<div class="col-sm-6"><?php echo $confirmation['fields'][$i]['title']; ?></div>
<div class="col-sm-6"><?php echo $confirmation['fields'][$i]['field']; ?></div>
</div>
<?php
     }
?>
</div>
<?php
  }
?>

</div>
</div>
<!--eof payment method card-->
</div>

</div>
</div>
<!--eof billing address card-->

<?php
  if ($_SESSION['sendto'] != false) {
?>
<!--bof delivery address card-->
<div id="deliveryAddress-card" class="card mb-3">
    <h4 id="deliveryAddress-card-header" class="card-header"><?php echo HEADING_DELIVERY_ADDRESS; ?></h4>
    
<div id="deliveryAddress-card-body" class="card-body p-3">

<div class="card-deck">

<!--bof ship to address card-->    
  <div id="shipToAddress-card" class="card">
          <div id="shipToAddress-card-body" class="card-body">    
    
<address><?php echo zen_address_format($order->delivery['format_id'], $order->delivery, 1, ' ', '<br />'); ?></address>    
    
    
<div id="shipToAddress-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar"><?php echo '<a href="' . $editShippingButtonLink . '">' . zen_image_button(BUTTON_IMAGE_EDIT_SMALL, BUTTON_EDIT_SMALL_ALT) . '</a>'; ?>
</div>

    </div>
  </div>
<!--eof ship to address card-->

<?php
    if ($order->info['shipping_method']) {
?>
<!--bof shipping method card-->
  <div id="shippingMethod-card" class="card">
          <h4 id="shippingMethod-card-header" class="card-header"><?php echo HEADING_SHIPPING_METHOD; ?></h4>
<div id="shippingMethod-card-body" class="card-body"><h4><?php echo $order->info['shipping_method']; ?></h4>

</div>
</div>
<!--eof shipping method card-->
<?php
    }
?>
</div>

</div>
</div>
<!--eof delivery address card-->
<?php
  }
?>
<!--bof special instructions or order comments card-->
<div id="orderComment-card" class="card mb-3">
    <h4 id="orderComment-card-header" class="card-header">

<?php echo HEADING_ORDER_COMMENTS; ?></h4>
<div id="orderComment-card-body" class="card-body p-3">
    
<?php echo (empty($order->info['comments']) ? NO_COMMENTS_TEXT : nl2br(zen_output_string_protected($order->info['comments'])) . zen_draw_hidden_field('comments', $order->info['comments'])); ?>

<div id="orderComment-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar">
    <?php echo  '<a href="' . zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_EDIT_SMALL, BUTTON_EDIT_SMALL_ALT) . '</a>'; ?></div>
<div></div>
<br class="clearBoth" />
</div>

</div>
</div>
<!--eof special instructions or order comments card-->

<!--bof shopping cart contents card-->
<div id="cartContents-card" class="card mb-3">
    <h4 id="cartContents-card-header" class="card-header"><?php echo HEADING_PRODUCTS; ?></h4>
<div id="cartContents-card-body" class="card-body p-3">

<?php  if ($flagAnyOutOfStock) { ?>
<?php    if (STOCK_ALLOW_CHECKOUT == 'true') {  ?>
<div class="alert alert-danger" role="alert"><?php echo OUT_OF_STOCK_CAN_CHECKOUT; ?></div>
<?php    } else { ?>
<div class="alert alert-danger" role="alert"><?php echo OUT_OF_STOCK_CANT_CHECKOUT; ?></div>
<?php    } //endif STOCK_ALLOW_CHECKOUT ?>
<?php  } //endif flagAnyOutOfStock ?>




<div class="table-responsive">
<table id="shoppingCartDefault-cartTableDisplay" class="cartTableDisplay table table-bordered">

        <tr>
        <th scope="col" id="cartTableDisplay-qtyHeading"><?php echo TABLE_HEADING_QUANTITY; ?></th>
        <th scope="col" id="cartTableDisplay-productsHeading"><?php echo TABLE_HEADING_PRODUCTS; ?></th>
<?php
  // If there are tax groups, display the tax columns for price breakdown
  if (sizeof($order->info['tax_groups']) > 1) {
?>
<th scope="col" id="cartTableDisplay-taxHeading"><?php echo HEADING_TAX; ?></th>
<?php
  }
?>
          <th scope="col" id="cartTableDisplay-totalHeading"><?php echo TABLE_HEADING_TOTAL; ?></th>
        </tr>
<?php // now loop thru all products to display quantity and price ?>
<?php for ($i=0, $n=sizeof($order->products); $i<$n; $i++) { ?>
        <tr class="<?php echo $order->products[$i]['rowClass']; ?>">
          <td  class="qtyCell"><?php echo $order->products[$i]['qty']; ?>&nbsp;x</td>
          <td class="productsCell"><?php echo $order->products[$i]['name']; ?>
          <?php  echo $stock_check[$i]; ?>

<?php // if there are attributes, loop thru them and display one per line
    if (isset($order->products[$i]['attributes']) && sizeof($order->products[$i]['attributes']) > 0 ) {
    echo '<div class="productsCell-attributes">';
    echo '<ul>';
      for ($j=0, $n2=sizeof($order->products[$i]['attributes']); $j<$n2; $j++) {
?>
      <li><?php echo $order->products[$i]['attributes'][$j]['option'] . ': ' . nl2br(zen_output_string_protected($order->products[$i]['attributes'][$j]['value'])); ?></li>
<?php
      } // end loop
      echo '</ul>';
        echo '</div>';      
    } // endif attribute-info
?>
        </td>

<?php // display tax info if exists ?>
<?php if (sizeof($order->info['tax_groups']) > 1)  { ?>
        <td class="taxCell">
          <?php echo zen_display_tax_value($order->products[$i]['tax']); ?>%</td>
<?php    }  // endif tax info display  ?>
        <td class="totalsCell">
          <?php echo $currencies->display_price($order->products[$i]['final_price'], $order->products[$i]['tax'], $order->products[$i]['qty']);
          if ($order->products[$i]['onetime_charges'] != 0 ) echo '<br /> ' . $currencies->display_price($order->products[$i]['onetime_charges'], $order->products[$i]['tax'], 1);
?>
        </td>
      </tr>
<?php  }  // end for loopthru all products ?>

<?php
  if (MODULE_ORDER_TOTAL_INSTALLED) {
    $order_totals = $order_total_modules->process();
?>
<?php $order_total_modules->output(); ?>
<?php
  }
?>

      </table>
</div>

<div id="cartContents-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar">
<?php echo '<a href="' . zen_href_link(FILENAME_SHOPPING_CART, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_EDIT_SMALL, BUTTON_EDIT_SMALL_ALT) . '</a>'; ?>
</div>


</div>
</div>
<!--eof shopping cart contents card-->

</div>

<?php
  echo zen_draw_form('checkout_confirmation', $form_action_url, 'post', 'id="checkout_confirmation" onsubmit="submitonce();"');
?>
<div id="processButtonHolder"></div>
<?php
   if (is_array($payment_modules->modules)) {
     $processButtonOptions = $payment_modules->process_button_ajax();
     if (isset($processButtonOptions['ccFields']) && count($processButtonOptions['ccFields'])> 0 ) {
       foreach  ($processButtonOptions['ccFields'] as $newField => $oldField)
       {
?>
<input type="hidden" name="<?php echo $newField; ?>" value="">
<?php if (!is_array($oldField)) { ?>
<script>
$(document).ready(function () {
    $(":input[name='<?php echo $newField; ?>']").val($(":input[name='<?php echo $oldField; ?>']").val());
});
</script>
<?php } else { ?>

<script>
    $(document).ready(function () {
     var oldField = window['<?php echo $oldField['name']; ?>'](<?php echo $oldField['args']; ?>);
     $(":input[name='<?php echo $newField; ?>']").val(oldField);
    });
</script>
<?php } ?>
<?php
       }
     }
     if (isset($processButtonOptions['extraFields']) && count($processButtonOptions['extraFields'])> 0 ) {
       foreach  ($processButtonOptions['extraFields'] as $fieldName => $fieldValue)
       {
?>
<input type="hidden" name="<?php echo $fieldName; ?>"  value="<?php echo $fieldValue; ?>">
<?php
       }
     }
   }
?>
<?php
// Add shipping-module "extra" variables so they get transported to the checkout_process page.
if (isset ($_SESSION['shipping']['extras']) && is_array ($_SESSION['shipping']['extras'])) {
    list ($module, $method) = explode ('_', $_SESSION['shipping']['id']);
    foreach ($_SESSION['shipping']['extras'] as $varname => $value) {
        echo zen_draw_hidden_field ($module . '_' . $varname, $value) . PHP_EOL;
    }
}
?>
  
<div id="checkoutConfirmationDefault-btn-toolbar" class="btn-toolbar justify-content-between" role="toolbar">
<?php echo TITLE_CONTINUE_CHECKOUT_PROCEDURE . '<br />' . TEXT_CONTINUE_CHECKOUT_PROCEDURE; ?>
<?php echo zen_image_submit(BUTTON_IMAGE_CONFIRM_ORDER, BUTTON_CONFIRM_ORDER_ALT, 'name="btn_submit" id="btn_submit"') ;?>
</div>


</form>


</div>
