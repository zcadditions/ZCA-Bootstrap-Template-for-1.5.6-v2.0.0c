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
 * @version $Id: Author: DrByte  Fri Feb 26 00:03:33 2016 -0500 Modified in v1.5.5 $
 */
?>
<div id="loginDefault" class="centerColumn">

<h1 id="loginDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if ($messageStack->size('login') > 0) echo $messageStack->output('login'); ?>


<?php if ( USE_SPLIT_LOGIN_MODE == 'True' || $ec_button_enabled) { ?>
<!--BOF PPEC split login- DO NOT REMOVE-->

<!--bof new customers card-->
<div id="newCustomers-card" class="card mb-3">
  <h4 id="newCustomers-card-header" class="card-header">
<?php echo HEADING_NEW_CUSTOMER_SPLIT; ?>
  </h4>
  <div id="newCustomers-card-body" class="card-body">

<?php // ** BEGIN PAYPAL EXPRESS CHECKOUT ** ?>
<?php if ($ec_button_enabled) { ?>
<div id="newCustomers-content" class="content"><?php echo TEXT_NEW_CUSTOMER_INTRODUCTION_SPLIT; ?></div>

  <div class="text-center"><?php require(DIR_FS_CATALOG . DIR_WS_MODULES . 'payment/paypal/tpl_ec_button.php'); ?></div>
<hr />
<?php echo TEXT_NEW_CUSTOMER_POST_INTRODUCTION_DIVIDER; ?>
<?php } ?>
<?php // ** END PAYPAL EXPRESS CHECKOUT ** ?>
<div id="newCustomers-content-one" class="content"><?php echo TEXT_NEW_CUSTOMER_POST_INTRODUCTION_SPLIT; ?></div>

<?php echo zen_draw_form('create', zen_href_link(FILENAME_CREATE_ACCOUNT, (isset($_GET['gv_no']) ? '&gv_no=' . preg_replace('/[^0-9.,%]/', '', $_GET['gv_no']) : ''), 'SSL')); ?>

<div id="newCustomers-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo zen_image_submit(BUTTON_IMAGE_CREATE_ACCOUNT, BUTTON_CREATE_ACCOUNT_ALT, 'name="registrationButton"'); ?>
</div>

<?php echo '</form>'; ?>
</div>
</div>
<!--eof new customers card-->

<!--bof returning customers card-->
<div id="returningCustomers-card" class="card mb-3">
  <h4 id="returningCustomers-card-header" class="card-header">
<?php echo HEADING_RETURNING_CUSTOMER_SPLIT; ?>
  </h4>
  <div id="returningCustomers-card-body" class="card-body">

<div id="returningCustomers-content" class="content"><?php echo TEXT_RETURNING_CUSTOMER_SPLIT; ?></div>

<div class="p-3"></div>

<?php echo zen_draw_form('loginForm', zen_href_link(FILENAME_LOGIN, 'action=process' . (isset($_GET['gv_no']) ? '&gv_no=' . preg_replace('/[^0-9.,%]/', '', $_GET['gv_no']) : ''), 'SSL'), 'post', 'id="loginForm"'); ?>
<label class="inputLabel" for="login-email-address"><?php echo ENTRY_EMAIL_ADDRESS; ?></label>
<?php echo zen_draw_input_field('email_address', '', 'size="18" id="login-email-address" autofocus placeholder="' . ENTRY_EMAIL_ADDRESS_TEXT . '"' . ((int)ENTRY_EMAIL_ADDRESS_MIN_LENGTH > 0 ? ' required' : ''), 'email'); ?>
<div class="p-2"></div>

<label class="inputLabel" for="login-password"><?php echo ENTRY_PASSWORD; ?></label>
<?php echo zen_draw_password_field('password', '', 'size="18" id="login-password" autocomplete="off" placeholder="' . ENTRY_REQUIRED_SYMBOL . '"' . ((int)ENTRY_PASSWORD_MIN_LENGTH > 0 ? ' required' : '')); ?>
<div class="p-2"></div>

<div id="returningCustomers-btn-toolbar" class="btn-toolbar justify-content-between" role="toolbar">
<?php echo '<a href="' . zen_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_PASSWORD_FORGOTTEN . '</a>'; ?>
<?php echo zen_image_submit(BUTTON_IMAGE_LOGIN, BUTTON_LOGIN_ALT); ?>
</div>
<?php echo '</form>'; ?>

</div>
</div>
<!--eof returning customers card-->

<div class="p-3"></div>
<!--EOF PPEC split login- DO NOT REMOVE-->
<?php } else { ?>
<!--BOF normal login-->
<?php
  if ($_SESSION['cart']->count_contents() > 0) {
?>

<?php echo TEXT_VISITORS_CART; ?><a data-toggle="modal" href="#cartHelpModal"><?php echo TEXT_MORE_INFO; ?></a>

<?php require($template->get_template_dir('tpl_info_shopping_cart.php',DIR_WS_TEMPLATE, $current_page_base,'modalboxes'). '/tpl_info_shopping_cart.php'); ?>

<?php
  }
?>


<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo HEADING_RETURNING_CUSTOMER; ?></a>
    <a class="nav-item nav-link" id="nav-create-tab" data-toggle="tab" href="#nav-create" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo HEADING_NEW_CUSTOMER; ?></a>
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
<?php echo zen_draw_form('login', zen_href_link(FILENAME_LOGIN, 'action=process' . (isset($_GET['gv_no']) ? '&gv_no=' . preg_replace('/[^0-9.,%]/', '', $_GET['gv_no']) : ''), 'SSL'), 'post', 'id="loginForm"'); ?>

<div class="p-3"></div>

<label class="inputLabel" for="login-email-address"><?php echo ENTRY_EMAIL_ADDRESS; ?></label>
<?php echo zen_draw_input_field('email_address', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') . ' id="login-email-address" autofocus placeholder="' . ENTRY_EMAIL_ADDRESS_TEXT . '"' . ((int)ENTRY_EMAIL_ADDRESS_MIN_LENGTH > 0 ? ' required' : ''), 'email'); ?>
<div class="p-2"></div>

<label class="inputLabel" for="login-password"><?php echo ENTRY_PASSWORD; ?></label>
<?php echo zen_draw_password_field('password', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_password', 40) . ' id="login-password" autocomplete="off" placeholder="' . ENTRY_REQUIRED_SYMBOL . '"' . ((int)ENTRY_PASSWORD_MIN_LENGTH > 0 ? ' required' : '')); ?>
<div class="p-2"></div>
<?php echo zen_draw_hidden_field('securityToken', $_SESSION['securityToken']); ?>

<div id="loginDefault-btn-toolbar" class="btn-toolbar justify-content-between" role="toolbar">
<?php echo '<a href="' . zen_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_PASSWORD_FORGOTTEN . '</a>'; ?>
<?php echo zen_image_submit(BUTTON_IMAGE_LOGIN, BUTTON_LOGIN_ALT); ?>
</div>

<?php echo '</form>'; ?>
  </div>
  
  
  <div class="tab-pane fade" id="nav-create" role="tabpanel" aria-labelledby="nav-create-tab">
<?php echo zen_draw_form('create_account', zen_href_link(FILENAME_CREATE_ACCOUNT, (isset($_GET['gv_no']) ? '&gv_no=' . preg_replace('/[^0-9.,%]/', '', $_GET['gv_no']) : ''), 'SSL'), 'post', 'onsubmit="return check_form(create_account);" id="createAccountForm"') . zen_draw_hidden_field('action', 'process') . zen_draw_hidden_field('email_pref_html', 'email_format'); ?>

<div class="p-3"></div>

<div id="loginDefault-content" class="content"><?php echo TEXT_NEW_CUSTOMER_INTRODUCTION; ?></div>

<?php require($template->get_template_dir('tpl_modules_create_account.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_create_account.php'); ?>

<div id="loginDefault-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
    <?php echo zen_image_submit(BUTTON_IMAGE_SUBMIT, BUTTON_SUBMIT_ALT); ?>
</div>
<?php echo '</form>'; ?>
      </div>
</div>


<div class="p-3"></div>

<!--EOF normal login-->
<?php } ?>
</div>
