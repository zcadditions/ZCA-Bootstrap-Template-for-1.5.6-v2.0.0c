<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9 (cindy@vinosdefrutastropicales.com).
// Copyright (C) 2013-2017, Vinos de Frutas Tropicales.  All rights reserved.
//
// Note: This formatting has changed in v2.0.0+ of OPC, in support of the guest-checkout path.
// The $enabled_payment_modules variable must be handled using foreach, since numerical keys
// might have been removed if the payment method is not supported for guest-checkout!!
//
?>
<!--bof payment-method choices -->
<?php
// -----
// Don't display the payment-method block if there is no shipping method available.
//
if ($shipping_module_available) {
?>
  <div id="checkoutPaymentMethod">
<div id="opcPaymentChoices-card" class="card p-0 mb-3">
  <h4 class="card-header">
 <?php echo TABLE_HEADING_PAYMENT_METHOD; ?>
  </h4>
  <div class="card-body p-3">

<?php 
    // ** BEGIN PAYPAL EXPRESS CHECKOUT **
    if (!$payment_modules->in_special_checkout()) {
    // ** END PAYPAL EXPRESS CHECKOUT ** 
        if (SHOW_ACCEPTED_CREDIT_CARDS != '0') {
            if (SHOW_ACCEPTED_CREDIT_CARDS == '1') {
                echo TEXT_ACCEPTED_CREDIT_CARDS . zen_get_cc_enabled();
          
            } elseif (SHOW_ACCEPTED_CREDIT_CARDS == '2') {
                echo TEXT_ACCEPTED_CREDIT_CARDS . zen_get_cc_enabled('IMAGE_');
          
            }
?>
      <div class="p-3"></div>
<?php 
    } 

        $selection = $enabled_payment_modules;
        $num_selections = count($selection);

        if ($num_selections > 1) {
?>
<div id="opcPaymentChoices-content" class="content py-3"><?php echo TEXT_SELECT_PAYMENT_METHOD; ?></div>
<?php
        } elseif ($num_selections == 0) {
?>
<div id="opcPaymentChoices-content-one" class="content py-3"><?php echo TEXT_NO_PAYMENT_OPTIONS_AVAILABLE; ?></div>

<?php
        }

        $radio_buttons = 0;

        foreach ($selection as $current_method) {
         echo '<div class="custom-control custom-radio">'; 
            $payment_id = $current_method['id'];
            if ($num_selections > 1) {
                if (empty($current_method['noradio'])) {
                    echo zen_draw_radio_field('payment', $payment_id, ($payment_id == $_SESSION['payment'] ? true : false), 'id="pmt-' . $payment_id . '"');
                }
            } else {
                echo zen_draw_hidden_field('payment', $payment_id, 'id="pmt-' . $payment_id . '"');
            }
?>
      <label for="pmt-<?php echo $payment_id; ?>" class="custom-control-label radioButtonLabel"><?php echo $current_method['module']; ?></label>
      </div>
<?php
            if (defined('MODULE_ORDER_TOTAL_COD_STATUS') && MODULE_ORDER_TOTAL_COD_STATUS == 'true' and $payment_id == 'cod') {
?>
      <div class="alert alert-danger" role="alert"><?php echo TEXT_INFO_COD_FEES; ?></div>
<?php
            }
?>
      <div class="p-3"></div>

<?php
            if (isset($current_method['error'])) {
?>
     <div class="alert alert-danger" role="alert"><?php echo $current_method['error']; ?></div>

<?php
            } elseif (isset($current_method['fields']) && is_array($current_method['fields'])) {
?>

      <div class="ccinfo">
<?php
                foreach ($current_method['fields'] as $current_field) {
?>
        <label <?php echo (isset($current_field['tag']) ? 'for="' . $current_field['tag'] . '" ' : ''); ?>class="inputLabelPayment"><?php echo $current_field['title']; ?></label><?php echo $current_field['field']; ?>
        <div class="p-3"></div>
<?php
                }
?>
      </div>
      <div class="p-3"></div>
<?php
            }
            $radio_buttons++;

        }
    // ** BEGIN PAYPAL EXPRESS CHECKOUT **
    } else {
?>
    <div id="opcPaymentChoices-content-two" class="content py-3"><?php echo ${$_SESSION['payment']}->title; ?></div>
    <input type="hidden" name="payment" value="<?php echo $_SESSION['payment']; ?>" />
<?php
    }
    // ** END PAYPAL EXPRESS CHECKOUT **
?>
</div>
 </div>
  </div>
<?php
}  //-Shipping-method available, display payment block.
?>
  <div class="p-3"></div>
<!--eof payment-method choices -->
