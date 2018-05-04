<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Loaded automatically by index.php?main_page=checkout_shipping.<br />
 * Displays allowed shipping modules for selection by customer.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2013 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version GIT: $Id: Author: Ian Wilson  Mon Oct 28 17:54:33 2013 +0000 Modified in v1.5.2 $
 */
?>
<div id="checkoutShippingDefault" class="centerColumn">

<div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
</div>

<?php echo zen_draw_form('checkout_address', zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL')) . zen_draw_hidden_field('action', 'process'); ?>

<h1 id="checkoutShippingDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if ($messageStack->size('checkout_shipping') > 0) echo $messageStack->output('checkout_shipping'); ?>

<div class="card-columns">
  
<!--bof shipping information card-->
<div id="shippingInformation-card" class="card mb-3">
<h4 id="shippingInformation-card-header" class="card-header">
<?php echo TITLE_SHIPPING_ADDRESS; ?></h4>
<div id="shippingInformation-card-body" class="card-body p-3">

<div class="row">
<div id="shippingInformation-shipToAddress" class="shipToAddress col-sm-5">
<address><?php echo zen_address_label($_SESSION['customer_id'], $_SESSION['sendto'], true, ' ', '<br />'); ?></address>      
      </div>
  <div class="col-sm-7">
<?php echo TEXT_CHOOSE_SHIPPING_DESTINATION; ?>
<?php if ($displayAddressEdit) { ?>

<div id="shippingInformation-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar">
<?php echo '<a href="' . $editShippingButtonLink . '">' . zen_image_button(BUTTON_IMAGE_CHANGE_ADDRESS, BUTTON_CHANGE_ADDRESS_ALT) . '</a>'; ?>
</div>

<?php } ?>
      </div>
</div>
</div>
</div>
<!--eof shipping information card-->
 
<?php
  if (zen_count_shipping_modules() > 0) {
?>
<!--bof shipping method card-->
<div id="shippingMethod-card" class="card mb-3">
<h4 id="shippingMethod-card-header" class="card-header"><?php echo TABLE_HEADING_SHIPPING_METHOD; ?></h4>
<div id="shippingMethod-card-body" class="card-body p-3">

<?php
    if (sizeof($quotes) > 1 && sizeof($quotes[0]) > 1) {
?>
 
<div id="shippingMethod-content" class="content"><?php echo TEXT_CHOOSE_SHIPPING_METHOD; ?></div>
 
<?php
    } elseif ($free_shipping == false) {
?>
<div id="shippingMethod-content-one" class="content"><?php echo TEXT_ENTER_SHIPPING_INFORMATION; ?></div>
 
<?php
    }
?>
<?php
    if ($free_shipping == true) {
?>
<div id="shippingMethod-content-two" class="content"><?php echo FREE_SHIPPING_TITLE; ?>&nbsp;<?php echo $quotes[$i]['icon']; ?></div>

<div id="shippingMethod-selected" class="selected"><?php echo sprintf(FREE_SHIPPING_DESCRIPTION, $currencies->format(MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER)) . zen_draw_hidden_field('shipping', 'free_free'); ?></div>
 
<?php
    } else {
      $radio_buttons = 0;
      for ($i=0, $n=sizeof($quotes); $i<$n; $i++) {
      // bof: field set
// allows FedEx to work comment comment out Standard and Uncomment FedEx
//      if ($quotes[$i]['id'] != '' || $quotes[$i]['module'] != '') { // FedEx
      if ($quotes[$i]['module'] != '') { // Standard
?>

<!--bof shipping method option card-->
<div id="shippingMethodOption-card" class="card mb-3">
<div id="shippingMethodOption-card-header" class="card-header">
    <?php echo $quotes[$i]['module']; ?>&nbsp;<?php if (isset($quotes[$i]['icon']) && zen_not_null($quotes[$i]['icon'])) { echo $quotes[$i]['icon']; } ?></div>
<div id="shippingMethodOption-card-body" class="card-body p-3">

<?php
        if (isset($quotes[$i]['error'])) {
?>
      <div><?php echo $quotes[$i]['error']; ?></div>
<?php
        } else {
          for ($j=0, $n2=sizeof($quotes[$i]['methods']); $j<$n2; $j++) {
// set the radio button to be checked if it is the method chosen
            $checked = FALSE;
            if (isset($_SESSION['shipping']) && isset($_SESSION['shipping']['id'])) {
              $checked = ($quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id'] == $_SESSION['shipping']['id']);
            }
            if ( ($checked == true) || ($n == 1 && $n2 == 1) ) {
              //echo '      <div id="defaultSelected" class="moduleRowSelected">' . "\n";
            //} else {
              //echo '      <div class="moduleRow">' . "\n";
            }
?>
<?php
            if ( ($n > 1) || ($n2 > 1) ) {
?>
<div class="float-right"><?php echo $currencies->format(zen_add_tax($quotes[$i]['methods'][$j]['cost'], (isset($quotes[$i]['tax']) ? $quotes[$i]['tax'] : 0))); ?></div>
<?php
            } else {
?>
<div class="float-right"><?php echo $currencies->format(zen_add_tax($quotes[$i]['methods'][$j]['cost'], $quotes[$i]['tax'])) . zen_draw_hidden_field('shipping', $quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id']); ?></div>
<?php
            }
?>
<div class="custom-control custom-radio custom-control-inline">
<?php echo zen_draw_radio_field('shipping', $quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id'], $checked, 'id="ship-'.$quotes[$i]['id'] . '-' . str_replace(' ', '-', $quotes[$i]['methods'][$j]['id']) .'"'); ?>

<label for="ship-<?php echo $quotes[$i]['id'] . '-' . str_replace(' ', '-', $quotes[$i]['methods'][$j]['id']); ?>" class="custom-control-label checkboxLabel"><?php echo $quotes[$i]['methods'][$j]['title']; ?></label>
</div>
<div class="p-1"></div>

<?php
            $radio_buttons++;
          }
        }
?>
 
</div>
</div>
<!--eof shipping method option card-->
<?php
    }
// eof: field set
      }
    }
?>
</div>
</div>
<!--eof shipping method card-->
<?php
  } else {
?>
<!--bof noShipping method card-->
<div id="noShipping-card" class="card mb-3">
    <div id="noShipping-card-body" class="card-body p-3">
<h1 id="shippingMethodOption-noOptions-pageHeading" class="pageHeading"><?php echo TITLE_NO_SHIPPING_AVAILABLE; ?></h2>
<div id="shippingMethodOption-noOptions-content" class="content"><?php echo TEXT_NO_SHIPPING_AVAILABLE; ?></div>
    </div>
</div>
<!--eof noShipping method card-->
<?php
  }
?>
  
<!--bof order comments card--> 
<div id="orderComments-card" class="card mb-3">
<h4 id="orderComments-card-header" class="card-header">
    <?php echo TABLE_HEADING_COMMENTS; ?></h4>
<div id="orderComments-card-body" class="card-body p-3">
<?php echo zen_draw_textarea_field('comments', '45', '3'); ?>
</div>
</div>
<!--eof order comments card--> 

</div>  
  
<div id="checkoutShippingDefault-btn-toolbar1" class="btn-toolbar justify-content-between" role="toolbar">
<?php echo '<strong>' . TITLE_CONTINUE_CHECKOUT_PROCEDURE . '</strong><br />' . TEXT_CONTINUE_CHECKOUT_PROCEDURE; ?>
<?php echo zen_image_submit(BUTTON_IMAGE_CONTINUE_CHECKOUT, BUTTON_CONTINUE_ALT); ?>
</div>

 
</form>
</div>
