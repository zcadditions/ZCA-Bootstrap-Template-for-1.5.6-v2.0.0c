<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9 (cindy@vinosdefrutastropicales.com).
// Copyright (C) 2017, Vinos de Frutas Tropicales.  All rights reserved.
//
?>

<div id="loginGuest" class="centerColumn">

<h1 id="loginGuest-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php 
if ($messageStack->size('login') > 0) {
    echo $messageStack->output('login');
}

$block_class = 'opc-block-' . $num_columns;
foreach ($column_blocks as $display_blocks) {
    if (count($display_blocks) > 0) {
?>
    <div class="opc-block <?php echo $block_class; ?>">
<?php
        foreach ($display_blocks as $current_block) {
            switch ($current_block) {
                // -----
                // Existing customer login
                //
                case 'L':
?>

<div class="card p-0 mb-3">
  <div class="card-header">
  <?php echo HEADING_RETURNING_CUSTOMER_OPC; ?>
  </div>
  <div class="card-body p-3">
<div id="returningCustomers-content" class="content"><?php echo TEXT_RETURNING_CUSTOMER_OPC; ?></div>

<?php 
echo zen_draw_form('login', zen_href_link(FILENAME_LOGIN, 'action=process' . (isset($_GET['gv_no']) ? '&gv_no=' . preg_replace('/[^0-9.,%]/', '', $_GET['gv_no']) : ''), 'SSL'), 'post', 'id="loginForm"'); 
?>
        <div class="opc-label"><?php echo ENTRY_EMAIL_ADDRESS; ?></div>
<?php 
                    echo zen_draw_input_field('email_address', '', 'size="18" id="login-email-address" autofocus placeholder="' . ENTRY_EMAIL_ADDRESS_TEXT . '"' . ((int)ENTRY_EMAIL_ADDRESS_MIN_LENGTH > 0 ? ' required' : ''), 'email'); 
?>

        <div class="opc-label"><?php echo ENTRY_PASSWORD; ?></div>
<?php 
                    echo zen_draw_password_field('password', '', 'size="18" id="login-password" autocomplete="off" placeholder="' . ENTRY_REQUIRED_SYMBOL . '"' . ((int)ENTRY_PASSWORD_MIN_LENGTH > 0 ? ' required' : '')); 
?>
<div class="p-3"></div>
<div id="returningCustomers-btn-toolbar" class="btn-toolbar justify-content-between" role="toolbar">
<?php echo '<a href="' . zen_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_PASSWORD_FORGOTTEN . '</a>'; ?>
<?php echo zen_image_submit(BUTTON_IMAGE_LOGIN, BUTTON_LOGIN_ALT); ?>
</div>

<?php        
                    echo '</form>';     
?>        
  </div>
</div>      
<?php

                    break;
                
                    // -----
                    // PayPal Express Checkout Shortcut Button
                    //
                    case 'P':
?>

<div class="card p-0 mb-3">
  <div class="card-body p-3">
<div id="newCustomers-content" class="content"><?php echo TEXT_NEW_CUSTOMER_INTRODUCTION_SPLIT; ?></div>      
        <div class="center"><?php require DIR_FS_CATALOG . DIR_WS_MODULES . 'payment/paypal/tpl_ec_button.php'; ?></div>
  </div>
</div>

<?php 
                    echo '<div class="p-3"></div>' . TEXT_NEW_CUSTOMER_POST_INTRODUCTION_DIVIDER . '<div class="p-3"></div>';
                    break;
                  
                // -----
                // Guest-checkout link
                //
                case 'G':
?>
<div class="card p-0 mb-3">
  <div class="card-header">
    <?php echo HEADING_GUEST_OPC; ?>
  </div>
  <div class="card-body p-3">
<div id="guest-content" class="content"><?php echo TEXT_GUEST_OPC; ?></div> 
<?php
                    if (!$guest_active) {
                    echo zen_draw_form('guest', zen_href_link(FILENAME_CHECKOUT_ONE, '', 'SSL'), 'post') . zen_draw_hidden_field('guest_checkout', 1);
?>
<div id="guest-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo zen_image_submit(BUTTON_IMAGE_CHECKOUT, BUTTON_CHECKOUT_ALT); ?>
</div>

        </form>
<?php
                    } else {
?>

<div id="guest-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<a href="<?php echo zen_href_link(FILENAME_CHECKOUT_ONE, '', 'SSL'); ?>" rel="nofollow"><?php echo zen_image_button(BUTTON_IMAGE_CHECKOUT, BUTTON_CHECKOUT_ALT); ?></a>
</div>


<?php
                    }
?>
  </div>
</div>

<div class="p-3"></div>

<?php
                    break;
                    
                // -----
                // Create/register account link.
                //
                case 'C':
?>
<div class="card p-0 mb-3">
  <div class="card-header">
<?php echo HEADING_NEW_CUSTOMER_OPC; ?>
  </div>
  <div class="card-body p-3">
        <div id="newOPCCustomer-content" class="content"><?php echo TEXT_NEW_CUSTOMER_OPC; ?></div>
<?php 
                    echo zen_draw_form('create', zen_href_link(FILENAME_CREATE_ACCOUNT, (isset($_GET['gv_no']) ? '&gv_no=' . preg_replace('/[^0-9.,%]/', '', $_GET['gv_no']) : ''), 'SSL'), 'post');
?>
<div id="newOPCCustomer-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo zen_image_submit(BUTTON_IMAGE_CREATE_ACCOUNT, BUTTON_CREATE_ACCOUNT_ALT); ?>
</div>
<?php 
                    echo '</form>';
?>
  </div>
</div>

<?php
                    break;
                    
                // -----
                // Account benefits display
                //
                case 'B':
?> 
<div class="card p-0 mb-3">
  <div class="card-header">
    <?php echo HEADING_ACCOUNT_BENEFITS_OPC; ?>
  </div>
  <div class="card-body p-3">
        <div class="opc-info"><?php echo TEXT_ACCOUNT_BENEFITS_OPC; ?></div>
<?php
                    for ($i = 1; $i < 5; $i++) {
                        $benefit_heading = "HEADING_BENEFIT_$i";
                        $benefit_text = "TEXT_BENEFIT_$i";
                        if (defined($benefit_heading) && constant($benefit_heading) != '' && defined($benefit_text) && constant($benefit_text) != '') {
?>
        <div class="opc-head"><?php echo constant($benefit_heading); ?></div>
        <div class="opc-info"><?php echo constant($benefit_text); ?></div>
<?php        
                        }
                    }      
 ?>       
  </div>
</div>

<?php

                    break;
                    
                // -----
                // Anything else, nothing to do.
                //
                default:
                    break;
            }
        }
?>
    </div>
<?php
    }
}
?>
    <br class="clearBoth" />
</div>
