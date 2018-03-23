<?php
/**
 * Module Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Allows entry of new addresses during checkout stages
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: rbarbour zcadditions.com Fri Feb 26 00:03:33 2016 -0500 Modified in v1.5.5 $
 */
?>

<?php echo zen_draw_form('checkout_address', zen_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL'), 'post', 'class="group"'); ?>

<div id="checkoutNewPaymentAddress-card" class="card mb-3">
<h4 id="checkoutNewPaymentAddress-card-header" class="card-header"><?php echo TITLE_PLEASE_SELECT; ?></h4>
<div id="checkoutNewPaymentAddress-card-body" class="card-body p-3">

<div class="required-info text-right"><?php echo FORM_REQUIRED_INFORMATION; ?></div>



<?php
  if (ACCOUNT_GENDER == 'true') {
?>

<div class="custom-control custom-radio custom-control-inline">
<?php echo zen_draw_radio_field('gender', 'm', '1', 'id="gender-male"') . '<label class="custom-control-label radioButtonLabel" for="gender-male">' . MALE . '</label>'; ?>
</div>

<div class="custom-control custom-radio custom-control-inline">
<?php echo zen_draw_radio_field('gender', 'f', '', 'id="gender-female"') . '<label class="custom-control-label radioButtonLabel" for="gender-female">' . FEMALE . '</label>'; ?>
</div>
<div class="p-2"></div>

<?php
  }
?>

<label class="inputLabel" for="firstname"><?php echo ENTRY_FIRST_NAME; ?></label>
<?php echo zen_draw_input_field('firstname', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_firstname', '40') . ' id="firstname" placeholder="' . ENTRY_FIRST_NAME_TEXT . '"' . ((int)ENTRY_FIRST_NAME_MIN_LENGTH > 0 ? ' required' : '')); ?>
<div class="p-2"></div>

<label class="inputLabel" for="lastname"><?php echo ENTRY_LAST_NAME; ?></label>
<?php echo zen_draw_input_field('lastname', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_lastname', '40') . ' id="lastname" placeholder="' . ENTRY_LAST_NAME_TEXT . '"' . ((int)ENTRY_LAST_NAME_MIN_LENGTH > 0 ? ' required' : '')); ?>
<div class="p-2"></div>


<?php
  if (ACCOUNT_COMPANY == 'true') {
?>
<label class="inputLabel" for="company"><?php echo ENTRY_COMPANY; ?></label>
<?php echo zen_draw_input_field('company', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_company', '40') . ' id="company" placeholder="' . ENTRY_COMPANY_TEXT . '"' . (ACCOUNT_COMPANY == 'true' && (int)ENTRY_COMPANY_MIN_LENGTH != 0 ? ' required' : '')); ?>
<div class="p-2"></div>
<?php
  }
?>

<label class="inputLabel" for="street-address"><?php echo ENTRY_STREET_ADDRESS; ?></label>
  <?php echo zen_draw_input_field('street_address', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_street_address', '40') . ' id="street-address" placeholder="' . ENTRY_STREET_ADDRESS_TEXT . '"' . ((int)ENTRY_STREET_ADDRESS_MIN_LENGTH > 0 ? ' required' : '')); ?>
<div class="p-2"></div>

<?php
  if (ACCOUNT_SUBURB == 'true') {
?>
<label class="inputLabel" for="suburb"><?php echo ENTRY_SUBURB; ?></label>
<?php echo zen_draw_input_field('suburb', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_suburb', '40') . ' id="suburb" placeholder="' . ENTRY_SUBURB_TEXT . '"'); ?>
<div class="p-2"></div>
<?php
  }
?>

<label class="inputLabel" for="city"><?php echo ENTRY_CITY; ?></label>
<?php echo zen_draw_input_field('city', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_city', '40') . ' id="city" placeholder="' . ENTRY_CITY_TEXT . '"'. ((int)ENTRY_CITY_MIN_LENGTH > 0 ? ' required' : '')); ?>
<div class="p-2"></div>

<?php
  if (ACCOUNT_STATE == 'true') {
    if ($flag_show_pulldown_states == true) {
?>
<label class="inputLabel" for="stateZone" id="zoneLabel"><?php echo ENTRY_STATE; ?></label><?php if (zen_not_null(ENTRY_STATE_TEXT)) echo '<span class="alert">' . ENTRY_STATE_TEXT . '</span>';?>

<?php
      echo zen_draw_pull_down_menu('zone_id', zen_prepare_country_zones_pull_down($selected_country), $zone_id, 'id="stateZone"');
?>


<?php  } else { ?>

<label class="inputLabel" for="state" id="stateLabel"><?php echo $state_field_label; ?></label>
<?php
    echo zen_draw_input_field('state', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_state', '40') . ' id="state" placeholder="' . ENTRY_STATE_TEXT . '"');
    if ($flag_show_pulldown_states == false) {
      echo zen_draw_hidden_field('zone_id', $zone_name, ' ');
    }
?>

<?php
  }
}
?>
<div class="p-2"></div>

<label class="inputLabel" for="postcode"><?php echo ENTRY_POST_CODE; ?></label>
<?php echo zen_draw_input_field('postcode', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_postcode', '40') . ' id="postcode" placeholder="' . ENTRY_POST_CODE_TEXT . '"' . ((int)ENTRY_POSTCODE_MIN_LENGTH > 0 ? ' required' : '')); ?>
<div class="p-2"></div>

<label class="inputLabel" for="country"><?php echo ENTRY_COUNTRY; ?></label>
<?php echo zen_get_country_list('zone_country_id', $selected_country, 'id="country" placeholder="' . ENTRY_COUNTRY_TEXT . '"' . ($flag_show_pulldown_states == true ? 'onchange="update_zone(this.form);"' : '')); ?>

<div id="checkoutNewAddress-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo zen_draw_hidden_field('action', 'submit') . zen_image_submit(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT); ?>
</div>

</form>

</div>
    </div>

