<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Tue Dec 29 12:22:34 2015 -0500 Modified in v1.5.5 $
 */
?>
<div id="timeOutDefault" class="centerColumn">

<?php
    if ($_SESSION['customer_id']) {
?>
<h1 id="timeOutDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE_LOGGED_IN; ?></h1>

<div id="timeOutDefault-content" class="content"><?php echo TEXT_INFORMATION_LOGGED_IN; ?></div>
<?php
  } else {
?>
<h1 id="timeOutDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<div id="timeOutDefault-content" class="content"><?php echo TEXT_INFORMATION; ?></div>

<?php echo zen_draw_form('login', zen_href_link(FILENAME_LOGIN, 'action=process', 'SSL')); ?>

<div id="login-card" class="card">
  <h2 id="login-card-header" class="card-header">
<?php echo HEADING_RETURNING_CUSTOMER; ?>
  </h2>
  <div id="login-card-body" class="card-body">
<label class="inputLabel" for="login-email-address"><?php echo ENTRY_EMAIL_ADDRESS; ?></label>
<?php echo zen_draw_input_field('email_address', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') . ' id="login-email-address" autocomplete="off"', 'email'); ?>
<div class="p-2"></div>

<label class="inputLabel" for="login-password"><?php echo ENTRY_PASSWORD; ?></label>
<?php echo zen_draw_password_field('password', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_password', 40) . ' id="login-password" autocomplete="off"'); ?>
<div class="p-2"></div>

<?php echo zen_draw_hidden_field('securityToken', $_SESSION['securityToken']); ?>

<div id="timeOutDefault-btn-toolbar" class="btn-toolbar justify-content-between my-3" role="toolbar">
    <?php echo '<a href="' . zen_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_PASSWORD_FORGOTTEN . '</a>'; ?>
<?php echo zen_image_submit(BUTTON_IMAGE_LOGIN, BUTTON_LOGIN_ALT); ?>
</div>

  </div>
</div>

</form>

<?php
 }
 ?>
</div>
