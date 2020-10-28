<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Loaded automatically by index.php?main_page=account_edit.<br />
 * Displays information related to a single specific order
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: lat9 2019 Mar 10 Modified in v1.5.6b $
 */
?>
<div id="accountHistoryInfoDefault" class="centerColumn">

<!--bof order information card-->
<div id="orderInformation-card" class="card mb-3">
<h4 id="orderInformation-card-header" class="card-header"><?php echo HEADING_ORDER_DATE . ' ' . zen_date_long($order->info['date_purchased']); ?></h4>
<div id="orderInformation-card-body" class="card-body p-3">


<?php if ($current_page != FILENAME_CHECKOUT_SUCCESS) { ?>
<h4 id="orderHistoryDetailedOrder"><?php echo HEADING_TITLE . ORDER_HEADING_DIVIDER . sprintf(HEADING_ORDER_NUMBER, $_GET['order_id']); ?></h4>
<?php } ?>

<!-- bof order details table -->
<div class="table-responsive">
<table id="orderHistory-orderTableDisplay" class="orderTableDisplay table table-bordered table-striped">
    <tr id="orderHistory-tableHeading" class="tableHeading">
        <th scope="col" id="orderHistory-qtyHeading"><?php echo HEADING_QUANTITY; ?></th>
        <th scope="col" id="orderHistory-productHeading"><?php echo HEADING_PRODUCTS; ?></th>
<?php
  if (sizeof($order->info['tax_groups']) > 1) {
?>
        <th scope="col" id="orderHistory-taxHeading"><?php echo HEADING_TAX; ?></th>
<?php
 }
?>
        <th scope="col" id="orderHistory-totalHeading"><?php echo HEADING_TOTAL; ?></th>
    </tr>
<?php
  for ($i=0, $n=sizeof($order->products); $i<$n; $i++) {
  ?>
    <tr>
        <td class="qtyCell"><?php echo  $order->products[$i]['qty'] . QUANTITY_SUFFIX; ?></td>
        <td class="productCell"><?php echo  $order->products[$i]['name'];

    if ( (isset($order->products[$i]['attributes'])) && (sizeof($order->products[$i]['attributes']) > 0) ) {
  echo '<div class="productCell-attributes">';
      echo '<ul>';
      for ($j=0, $n2=sizeof($order->products[$i]['attributes']); $j<$n2; $j++) {
        echo '<li>' . $order->products[$i]['attributes'][$j]['option'] . TEXT_OPTION_DIVIDER . nl2br(zen_output_string_protected($order->products[$i]['attributes'][$j]['value'])) . '</li>';
      }
        echo '</ul>';
  echo '</div>';
    }
?>
        </td>
<?php
    if (sizeof($order->info['tax_groups']) > 1) {
?>
        <td class="taxCell"><?php echo zen_display_tax_value($order->products[$i]['tax']) . '%' ?></td>
<?php
    }
?>
        <td class="totalCell">
        <?php
         $ppe = zen_round(zen_add_tax($order->products[$i]['final_price'], $order->products[$i]['tax']), $currencies->get_decimal_places($order->info['currency']));
         $ppt = $ppe * $order->products[$i]['qty'];
        //        echo $currencies->format(zen_add_tax($order->products[$i]['final_price'], $order->products[$i]['tax']) * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value']) . ($order->products[$i]['onetime_charges'] != 0 ? '<br />' . $currencies->format(zen_add_tax($order->products[$i]['onetime_charges'], $order->products[$i]['tax']), true, $order->info['currency'], $order->info['currency_value']) : '')
        echo $currencies->format($ppt, true, $order->info['currency'], $order->info['currency_value']) . ($order->products[$i]['onetime_charges'] != 0 ? '<br />' . $currencies->format(zen_add_tax($order->products[$i]['onetime_charges'], $order->products[$i]['tax']), true, $order->info['currency'], $order->info['currency_value']) : '');
        ?></td>
    </tr>
<?php
  }
?>
<!-- bof order totals -->  
<?php
  for ($i = 0, $n = count($order->totals); $i < $n; $i++) {
?>
<tr>
    <td colspan="2" class="ot-title bg-white"><?php echo $order->totals[$i]['title']; ?></td>
    <td class="ot-text bg-white"><?php echo $order->totals[$i]['text']; ?></td>
</tr>
<?php
  }
?>
<!-- eof order totals -->


</table>
</div>    
<!-- eof order details table -->  
    
<?php
/**
 * Used to display any downloads associated with the cutomers account
 */
  if (DOWNLOAD_ENABLED == 'true') require($template->get_template_dir('tpl_modules_downloads.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_downloads.php');
?>

<?php
/**
 * Used to loop thru and display order status information
 */
if (sizeof($statusArray)) {
?>
<!--bof order history status card-->
<div id="orderHistoryStatus-card" class="card mb-3">
<?php echo '<h4 id="orderHistoryStatus-card-header" class="card-header">' . HEADING_ORDER_HISTORY . '</h4>'; ?>
<div id="orderHistoryStatus-card-body" class="card-body p-3">

<div class="table-responsive">
<table id="orderHistory-orderHistoryStatusTableDisplay" class="orderHistoryStatusTableDisplay table table-bordered table-striped">
    <tr id="orderHistoryStatusTableDisplay-tableHeading" class="tableHeading">
        <th scope="col" id="orderHistoryStatusTableDisplay-dateHeading"><?php echo TABLE_HEADING_STATUS_DATE; ?></th>
        <th scope="col" id="orderHistoryStatusTableDisplay-statusHeading"><?php echo TABLE_HEADING_STATUS_ORDER_STATUS; ?></th>
        <th scope="col" id="orderHistoryStatusTableDisplay-commentsHeading"><?php echo TABLE_HEADING_STATUS_COMMENTS; ?></th>
       </tr>
<?php
  foreach ($statusArray as $statuses) {
?>
    <tr>
        <td class="dateCell"><?php echo zen_date_short($statuses['date_added']); ?></td>
        <td class="statusCell"><?php echo $statuses['orders_status_name']; ?></td>
        <td class="commentsCell"><?php echo (empty($statuses['comments']) ? '&nbsp;' : nl2br(zen_output_string_protected($statuses['comments']))); ?></td>
     </tr>
<?php
  }
?>
</table>
</div>
</div>
</div>
<!--eof order history status card-->
<?php } ?>

<!--bof delivery address card-->
<div id="deliveryAddress-card" class="card mb-3">
<?php echo '<h4 id="deliveryAddress-card-header" class="card-header">' . HEADING_DELIVERY_ADDRESS . '</h4>'; ?>
<div id="deliveryAddress-card-body" class="card-body p-3">


<div class="card-deck">
<?php
  if (!empty($order->delivery['format_id'])) {
?>
<!--bof ship to address card-->
  <div id="shipToAddress-card" class="card">
          <div id="shipToAddress-card-body" class="card-body">
<address><?php echo zen_address_format($order->delivery['format_id'], $order->delivery, 1, ' ', '<br />'); ?></address>
    </div>
  </div>
<!--eof ship to address card-->
<?php
  }
?>
<?php
    if (zen_not_null($order->info['shipping_method'])) {
?>
<!--bof shipping method card-->
  <div id="shippingMethod-card" class="card">
<?php echo '<h4 id="shippingMethod-card-header" class="card-header">' . HEADING_SHIPPING_METHOD . '</h4>'; ?>    
          <div id="shippingMethod-card-body" class="card-body">
<div><?php echo $order->info['shipping_method']; ?></div>

    </div>
  </div>
<!--eof shipping method card-->
<?php } else { // temporary just remove these 4 lines ?>
<div>WARNING: Missing Shipping Information</div>


<?php
    }
?>

</div>
</div>
</div>
<!--eof delivery address card-->

<!--bof billing address card-->
<div id="billingAddress-card" class="card mb-3">
<?php echo '<h4 id="billingAddress-card-header" class="card-header">' . HEADING_BILLING_ADDRESS . '</h4>'; ?>
<div id="billingAddress-card-body" class="card-body p-3">
<div class="card-deck">

<!--bof bill to address card-->
  <div id="billToAddress-card" class="card">
          <div id="billToAddress-card-body" class="card-body">
<address><?php echo zen_address_format($order->billing['format_id'], $order->billing, 1, ' ', '<br />'); ?></address>
    </div>
  </div>
<!--eof bill to address card-->

<!--bof payment method card-->
  <div id="paymentMethod-card" class="card">
<?php echo '<h4 id="paymentMethod-card-header" class="card-header">' . HEADING_PAYMENT_METHOD . '</h4>'; ?>    
          <div id="paymentMethod-card-body" class="card-body">

<div><?php echo $order->info['payment_method']; ?></div>

    </div>
  </div>
<!--eof payment method card-->
</div>

</div>
</div>
<!--eof billing address card-->


</div>    
 </div>   
<!--eof order information card-->
    
</div>    
