<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=checkout_payment.<br />
 * Displays the allowed payment modules, for selection by customer.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: mc12345678 Tue May 8 00:42:18 2018 -0400 Modified in v1.5.6 $
 */
?>
<?php echo $payment_modules->javascript_validation(); ?>
<div id="checkoutPayment" class="centerColumn">
    
<div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
</div>

<?php echo zen_draw_form('checkout_payment', zen_href_link(FILENAME_CHECKOUT_CONFIRMATION, '', 'SSL'), 'post'); ?>
<?php echo zen_draw_hidden_field('action', 'submit'); ?>

<h1 id="checkoutPaymentDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if ($messageStack->size('redemptions') > 0) echo $messageStack->output('redemptions'); ?>
<?php if ($messageStack->size('checkout') > 0) echo $messageStack->output('checkout'); ?>
<?php if ($messageStack->size('checkout_payment') > 0) echo $messageStack->output('checkout_payment'); ?>

<?php // ** BEGIN PAYPAL EXPRESS CHECKOUT **
      if (!$payment_modules->in_special_checkout()) {
      // ** END PAYPAL EXPRESS CHECKOUT ** ?>

<div class="card-columns">    
    
<!--bof billing address card-->    
<div id="billingAddress-card" class="card mb-3">
<h4 id="billingAddress-card-header" class="card-header">
<?php echo TITLE_BILLING_ADDRESS; ?></h4>    
    
<div id="billingAddress-card-body" class="card-body p-3">

<div class="row">
<div id="billingAddress-billToAddress" class="billToAddress col-sm-5">
<address><?php echo zen_address_label($_SESSION['customer_id'], $_SESSION['billto'], true, ' ', '<br />'); ?></address>    
      </div>
  <div class="col-sm-7">
<?php echo TEXT_SELECTED_BILLING_DESTINATION; ?>
<?php if (MAX_ADDRESS_BOOK_ENTRIES >= 2) { ?>
<div id="billingAddress-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar">
<?php echo '<a href="' . zen_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_CHANGE_ADDRESS, BUTTON_CHANGE_ADDRESS_ALT) . '</a>'; ?>
</div>
<?php } ?>
      </div>
</div>
</div>
</div>      
<!--eof billing address card-->

<?php // ** BEGIN PAYPAL EXPRESS CHECKOUT **
      }
      // ** END PAYPAL EXPRESS CHECKOUT ** ?>


<!--bof your total card--> 
<div id="yourTotal-card" class="card mb-3">
<h4 id="yourTotal-card-header" class="card-header">
<?php echo TEXT_YOUR_TOTAL; ?></h4> 

<div id="yourTotal-card-body" class="card-body p-3">

<?php
  if (MODULE_ORDER_TOTAL_INSTALLED) {
    $order_totals = $order_total_modules->process();
?>
<div class="table-responsive">
<table id="shoppingCartDefault-cartTableDisplay" class="cartTableDisplay table table-bordered">
<?php $order_total_modules->output(); ?>
      </table>
</div>

<?php
  }
?>
</div>  
</div>  
<!--eof your total card--> 

<?php
  $selection =  $order_total_modules->credit_selection();
  if (sizeof($selection)>0) {
    for ($i=0, $n=sizeof($selection); $i<$n; $i++) {
            if (isset($_GET['credit_class_error_code']) && ($_GET['credit_class_error_code'] == (isset($selection[$i]['id'])) ? $selection[$i]['id'] : 0)) {
?>
<div class="alert alert-danger" role="alert"><?php echo zen_output_string_protected($_GET['credit_class_error']); ?></div>

<?php
      }
      for ($j=0, $n2=(isset($selection[$i]['fields']) ? sizeof($selection[$i]['fields']) : 0); $j<$n2; $j++) {
?>

<!--bof discount coupon card-->
<div id="discountCoupon-card" class="card mb-3">
<h4 id="discountCoupon-card-header" class="card-header">
<?php echo $selection[$i]['module']; ?></h4> 

<div id="discountCoupon-card-body" class="card-body p-3">

<?php echo $selection[$i]['redeem_instructions']; ?>

<div id="discountCoupon-gvBal"><?php echo (isset($selection[$i]['checkbox'])) ? $selection[$i]['checkbox'] : ''; ?></div>

<label class="inputLabel"<?php echo ($selection[$i]['fields'][$j]['tag']) ? ' for="'.$selection[$i]['fields'][$j]['tag'].'"': ''; ?>><?php echo $selection[$i]['fields'][$j]['title']; ?></label>
<?php echo $selection[$i]['fields'][$j]['field']; ?>
</div>  
</div>
<!--eof discount coupon card-->
<?php
      }
    }
?>

<?php
    }
?>

<?php // ** BEGIN PAYPAL EXPRESS CHECKOUT **
      if (!$payment_modules->in_special_checkout()) {
      // ** END PAYPAL EXPRESS CHECKOUT ** ?>

<!--bof payment method card-->      
<div id="paymentMethod-card" class="card mb-3">
<h4 id="paymentMethod-card-header" class="card-header">
<?php echo TABLE_HEADING_PAYMENT_METHOD; ?></h4> 

<div id="paymentMethod-card-body" class="card-body p-3">      

<?php
  if (SHOW_ACCEPTED_CREDIT_CARDS != '0') {
?>

<?php
    if (SHOW_ACCEPTED_CREDIT_CARDS == '1') {
      echo TEXT_ACCEPTED_CREDIT_CARDS . zen_get_cc_enabled();
    }
    if (SHOW_ACCEPTED_CREDIT_CARDS == '2') {
      echo TEXT_ACCEPTED_CREDIT_CARDS . zen_get_cc_enabled('IMAGE_');
    }
?>
<div class="p-3"></div>
<?php } ?>

<?php
  $selection = $payment_modules->selection();

  if (sizeof($selection) > 1) {
?>
<div id="paymentMethod-content" class="content"><?php echo TEXT_SELECT_PAYMENT_METHOD; ?></div>
<?php
  } elseif (sizeof($selection) == 0) {
?>
<div id="paymentMethod-content-one" class="content"><?php echo TEXT_NO_PAYMENT_OPTIONS_AVAILABLE; ?></div>

<?php
  }
?>

<?php
  $radio_buttons = 0;
  for ($i=0, $n=sizeof($selection); $i<$n; $i++) {
?><div id="paymentMethodsOption-card" class="card mb-3">
<?php
    if (sizeof($selection) > 1) {
        if (empty($selection[$i]['noradio'])) {
 ?>
<div id="paymentMethodsOption-card-header" class="card-header">
<div class="custom-control custom-radio custom-control-inline">
<?php echo zen_draw_radio_field('payment', $selection[$i]['id'], ($selection[$i]['id'] == $_SESSION['payment'] ? true : false), 'id="pmt-'.$selection[$i]['id'].'"'); ?>
<?php   } ?>
<?php
    } else {

?>
<?php echo zen_draw_hidden_field('payment', $selection[$i]['id'], 'id="pmt-'.$selection[$i]['id'].'"'); ?>
<?php
    }
?>


<label for="pmt-<?php echo $selection[$i]['id']; ?>" class="custom-control-label radioButtonLabel"><?php echo $selection[$i]['module']; ?></label>
</div>
</div>
<?php
    if (defined('MODULE_ORDER_TOTAL_COD_STATUS') && MODULE_ORDER_TOTAL_COD_STATUS == 'true' and $selection[$i]['id'] == 'cod') {
?>
<div class="alert alert-danger" role="alert"><?php echo TEXT_INFO_COD_FEES; ?></div>
<?php
    } else {
      // echo 'WRONG ' . $selection[$i]['id'];
?>
<?php
    }
?>

<?php
    if (isset($selection[$i]['error'])) {
?>
    <div><?php echo $selection[$i]['error']; ?></div>

<?php
    } elseif (isset($selection[$i]['fields']) && is_array($selection[$i]['fields'])) {
?>

<div id="paymentMethodsOption-card-body" class="ccInfo card-body p-3">
<?php
      for ($j=0, $n2=sizeof($selection[$i]['fields']); $j<$n2; $j++) {
?>

<label <?php echo (isset($selection[$i]['fields'][$j]['tag']) ? 'for="'.$selection[$i]['fields'][$j]['tag'] . '" ' : ''); ?>class="inputLabelPayment"><?php echo $selection[$i]['fields'][$j]['title']; ?></label><?php echo $selection[$i]['fields'][$j]['field']; ?>
<div class="p-2"></div>
<?php
      }
?>
</div>

<?php
    }
    $radio_buttons++;
?>

</div>
<?php
  }
?>

</div>

</div>
<!--eof payment method card--> 

<?php // ** BEGIN PAYPAL EXPRESS CHECKOUT **
      } else {
        ?><input type="hidden" name="payment" value="<?php echo $_SESSION['payment']; ?>" /><?php
      }
      // ** END PAYPAL EXPRESS CHECKOUT ** ?>

<!--bof order comments card--> 
<div id="orderComments-card" class="card mb-3">
    <h4 id="orderComments-card-header" class="card-header"><?php echo TABLE_HEADING_COMMENTS; ?></h4>

<div id="orderComments-card-body" class="card-body p-3">
<?php echo zen_draw_textarea_field('comments', '45', '3'); ?>
</div>
</div>
<!--eof order comments card--> 

<?php
  if (DISPLAY_CONDITIONS_ON_CHECKOUT == 'true') {
?>
<!--bof conditions card--> 
<div id="conditions-card" class="card mb-3">
    <h4 id="conditions-card-header" class="card-header"><?php echo TABLE_HEADING_CONDITIONS; ?></h4>
<div id="conditions-card-body" class="card-body p-3">
<?php echo TEXT_CONDITIONS_DESCRIPTION;?>

<div class="custom-control custom-checkbox">
<?php echo zen_draw_checkbox_field('conditions', '1', false, 'id="conditions"') . '<label class="custom-control-label checkboxLabel" for="conditions">' . TEXT_CONDITIONS_CONFIRM . '</label>'; ?>
</div>

</div>
</div>
<!--eof conditions card--> 
<?php
  }
?>

</div>    
    
<div id="paymentSubmit" class="btn-toolbar justify-content-between" role="toolbar">
<?php echo TITLE_CONTINUE_CHECKOUT_PROCEDURE . '<br />' . TEXT_CONTINUE_CHECKOUT_PROCEDURE; ?>
<?php echo zen_image_submit(BUTTON_IMAGE_CONTINUE_CHECKOUT, BUTTON_CONTINUE_ALT, 'onclick="submitFunction('.zen_user_has_gv_account($_SESSION['customer_id']).','.$order->info['total'].')"'); ?>
</div>

</form>

<?php require($template->get_template_dir('tpl_coupon_help.php',DIR_WS_TEMPLATE, $current_page_base,'modalboxes'). '/tpl_coupon_help.php'); ?>

<?php require($template->get_template_dir('tpl_cvv_help.php',DIR_WS_TEMPLATE, $current_page_base,'modalboxes'). '/tpl_cvv_help.php'); ?>
</div>
