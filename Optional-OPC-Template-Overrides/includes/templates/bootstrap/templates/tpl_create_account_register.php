<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9 (cindy@vinosdefrutastropicales.com).
// Copyright (C) 2017-2018, Vinos de Frutas Tropicales.  All rights reserved.
//
?>

<div class="centerColumn" id="createAccountRegister">

<?php
echo zen_draw_form('create_account', zen_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL'), 'post', 'onsubmit="return check_register_form();"') . zen_draw_hidden_field('action', 'register') . zen_draw_hidden_field('email_pref_html', 'email_format'); 
?>

<div id="createAccountRegister-content" class="content"><?php echo sprintf(TEXT_INSTRUCTIONS, zen_href_link(FILENAME_LOGIN, '', 'SSL')); ?></div>

<?php
if ($messageStack->size('create_account') > 0) {
    echo $messageStack->output('create_account');
}
?>

<div class="required-info text-right py-3"><?php echo FORM_REQUIRED_INFORMATION; ?></div>

<?php
if (DISPLAY_PRIVACY_CONDITIONS == 'true') {
?>

<!--bof privacy statement card-->
<div id="privacyStatement-card" class="card mb-3">
<h4 id="privacyStatement-card-header" class="card-header"><?php echo TABLE_HEADING_PRIVACY_CONDITIONS; ?></h4>
<div id="privacyStatement-card-body" class="card-body p-3">
<div id="privacyStatement-content" class="content"><?php echo TEXT_PRIVACY_CONDITIONS_DESCRIPTION;?></div>

<div class="custom-control custom-checkbox">
<?php echo zen_draw_checkbox_field('privacy_conditions', '1', false, 'id="privacy"') . '<label class="custom-control-label" for="privacy">' . TEXT_PRIVACY_CONDITIONS_CONFIRM . '</label>'; ?>
</div>

</div>
</div>
<!--eof privacy statement card-->

<?php
}
?>

    <div id="opc-ca-outer">
        <div id="opc-ca-left">
            
<!--bof address details card-->
<div id="addressDetails-card" class="card mb-3">
<h4 id="addressDetails-card-header" class="card-header"><?php echo 'Account Details'; ?></h4>
<div id="addressDetails-card-body" class="card-body p-3">            
            
            
<?php
if (ACCOUNT_COMPANY == 'true') {
?>
<label class="inputLabel" for="company"><?php echo ENTRY_COMPANY; ?></label>
<?php echo zen_draw_input_field('company', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_company', '40') . ' id="company" placeholder="' . ENTRY_COMPANY_TEXT . '"'. (ACCOUNT_COMPANY == 'true' && (int)ENTRY_COMPANY_MIN_LENGTH != 0 ? ' required' : '')); ?>
<div class="p-2"></div>
<?php
}

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
<?php echo zen_draw_input_field('lastname', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_lastname', '40') . ' id="lastname" placeholder="' . ENTRY_LAST_NAME_TEXT . '"'. ((int)ENTRY_LAST_NAME_MIN_LENGTH > 0 ? ' required' : '')); ?>
<div class="p-2"></div>

<label class="inputLabel" for="telephone"><?php echo ENTRY_TELEPHONE_NUMBER; ?></label>
<?php echo zen_draw_input_field('telephone', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_telephone', '40') . ' id="telephone" placeholder="' . ENTRY_TELEPHONE_NUMBER_TEXT . '"' . ((int)ENTRY_TELEPHONE_MIN_LENGTH > 0 ? ' required' : ''), 'tel'); ?>
<div class="p-2"></div>
<?php
if (ACCOUNT_DOB == 'true') {
?>
<label class="inputLabel" for="dob"><?php echo ENTRY_DATE_OF_BIRTH; ?></label>
<?php echo zen_draw_input_field('dob','', 'id="dob" placeholder="' . ENTRY_DATE_OF_BIRTH_TEXT . '"' . (ACCOUNT_DOB == 'true' && (int)ENTRY_DOB_MIN_LENGTH != 0 ? ' required' : '')); ?>
<div class="p-2"></div>
<?php
}

if ($display_nick_field == true) {
?>
<label class="inputLabel" for="nickname"><?php echo ENTRY_NICK; ?></label>
<?php echo zen_draw_input_field('nick','','id="nickname" placeholder="' . ENTRY_NICK_TEXT . '"'); ?>
<div class="p-2"></div>
<?php
}
?>
</div>
    </div>
<!--eof address details card-->

        </div>
        
        <div id="opc-ca-right">
            
<!--bof login details card-->
<div id="loginDetails-card" class="card mb-3">
<h4 id="loginDetails-card-header" class="card-header"><?php echo TABLE_HEADING_LOGIN_DETAILS; ?></h4>
<div id="loginDetails-card-body" class="card-body p-3">            
            
            <label class="inputLabel" for="email-address"><?php echo ENTRY_EMAIL_ADDRESS; ?></label>
<?php
$email_field_length = zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40');
$email_required = ((int)ENTRY_EMAIL_ADDRESS_MIN_LENGTH > 0 ? ' required' : '');
echo zen_draw_input_field('email_address', '', $email_field_length . ' id="email-address" placeholder="' . ENTRY_EMAIL_ADDRESS_TEXT . '"' . $email_required, 'email'); 
?>
<div class="p-2"></div>

            <label class="inputLabel" for="email-address-confirm"><?php echo ENTRY_EMAIL_ADDRESS_CONFIRM; ?></label>
<?php 
echo zen_draw_input_field('email_address_confirm', '', $email_field_length . ' id="email-address-confirm" placeholder="' . ENTRY_EMAIL_ADDRESS_TEXT . '"' . $email_required, 'email'); 
?>
<div class="p-2"></div>

<label class="inputLabel"><?php echo ENTRY_EMAIL_FORMAT; ?></label>
<div class="custom-control custom-radio custom-control-inline">
<?php echo zen_draw_radio_field('email_format', 'HTML', ($email_format == 'HTML' ? true : false),'id="email-format-html"') . '<label class="custom-control-label" for="email-format-html">' . ENTRY_EMAIL_HTML_DISPLAY . '</label>'; ?> 
</div>
<div class="custom-control custom-radio custom-control-inline">
<?php echo zen_draw_radio_field('email_format', 'TEXT', ($email_format == 'TEXT' ? true : false), 'id="email-format-text"') . '<label class="custom-control-label" for="email-format-text">' . ENTRY_EMAIL_TEXT_DISPLAY . '</label>'; ?>
</div>
<div class="p-2"></div>

            <label class="inputLabel" for="password-new"><?php echo ENTRY_PASSWORD; ?></label>
<?php
$password_field_length = zen_set_field_length(TABLE_CUSTOMERS, 'customers_password', '20');
$password_required = ((int)ENTRY_PASSWORD_MIN_LENGTH > 0 ? ' required' : '');
echo zen_draw_password_field('password', '', $password_field_length . ' id="password-new" autocomplete="off" placeholder="' . ENTRY_PASSWORD_TEXT . '"'. $password_required); 
?>
<div class="p-2"></div>

            <label class="inputLabel" for="password-confirm"><?php echo ENTRY_PASSWORD_CONFIRMATION; ?></label>
<?php 
echo zen_draw_password_field('confirmation', '', $password_field_length . ' id="password-confirm" autocomplete="off" placeholder="' . ENTRY_PASSWORD_CONFIRMATION_TEXT . '"'. $password_required); 
?>
<div class="p-2"></div>
<?php
if (ACCOUNT_NEWSLETTER_STATUS != 0) {?>
<div class="custom-control custom-checkbox">
<?php echo zen_draw_checkbox_field('newsletter', '1', $newsletter, 'id="newsletter-checkbox"') . '<label class="custom-control-label" for="newsletter-checkbox">' . ENTRY_NEWSLETTER . '</label>' . (zen_not_null(ENTRY_NEWSLETTER_TEXT) ? '<span class="alert">' . ENTRY_NEWSLETTER_TEXT . '</span>': ''); ?>
</div>
            <div class="p-2"></div>
<?php 
} 

if (CUSTOMERS_REFERRAL_STATUS == 2) {
?>
        <label class="inputLabel" for="customers_referral"><?php echo ENTRY_CUSTOMERS_REFERRAL; ?></label>
<?php echo zen_draw_input_field('customers_referral', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_referral', '15') . ' id="customers_referral"'); ?>
        <div class="p-2"></div>
<?php 
} 
?>
</div>
</div>
<!--eof login details card-->

        </div>
    </div>
    <div class="buttonRow"><?php echo zen_image_submit(BUTTON_IMAGE_SUBMIT, BUTTON_SUBMIT_REGISTER_ALT); ?></div>
  </form>
</div>
