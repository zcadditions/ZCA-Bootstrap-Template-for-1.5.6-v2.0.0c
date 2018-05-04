<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9 (cindy@vinosdefrutastropicales.com).
// Copyright (C) 2013-2018, Vinos de Frutas Tropicales.  All rights reserved.
//
?>
<!--bof billing-address block -->
 <div id="checkoutOneBillto"<?php echo ($flagDisablePaymentAddressChange) ? ' class="opc-base"' : ''; ?>>

<div id="opcBillingAddress-card" class="card p-0">
  <h4 class="card-header mb-3">
  <?php echo TITLE_BILLING_ADDRESS; ?>
  </h4>
  <div class="card-body p-3">   
        
<?php
$opc_address_type = 'bill';
$opc_disable_address_change = $flagDisablePaymentAddressChange;
require $template->get_template_dir('tpl_modules_opc_address_block.php', DIR_WS_TEMPLATE, $current_page_base, 'templates'). '/tpl_modules_opc_address_block.php';

if (!$flagDisablePaymentAddressChange) {
    $cancel_title = 'title="' . BUTTON_CANCEL_CHANGES_TITLE . '"';
    $save_title = 'title="' . BUTTON_SAVE_CHANGES_TITLE . '"';
    $show_add_address = $_SESSION['opc']->showAddAddressField();
    $parameters = ($show_add_address) ? '' : ' class="invisible"';
?>
<?php
    if ($show_add_address) {
?>
           <div class="custom-control custom-checkbox">
                <?php echo zen_draw_checkbox_field("add_address['bill']", '1', false, 'id="opc-add-bill"' . $parameters); ?>

                <label class="custom-control-label" for="opc-add-bill" title="<?php echo TITLE_ADD_TO_ADDRESS_BOOK; ?>"><?php echo TEXT_ADD_TO_ADDRESS_BOOK; ?></label>
           </div>
<?php
    }
?>
            
            <div class="p-3"></div>
            
<div id="opcBillingAddress-btn-toolbar" class="btn-toolbar justify-content-center" role="toolbar">
<span id="opc-bill-cancel" class="p-1"><?php echo zen_image_button(BUTTON_IMAGE_CANCEL, BUTTON_CANCEL_CHANGES_ALT, $cancel_title); ?></span>
<span id="opc-bill-save" class="p-1"><?php echo zen_image_button(BUTTON_IMAGE_UPDATE, BUTTON_SAVE_CHANGES_ALT, $save_title); ?></span>
</div>            

<?php 
} 
?>
        </div>
        </div>
        
      <div class="opc-overlay<?php echo ($flagDisablePaymentAddressChange) ? ' active' : ''; ?>"></div>

    </div>
<!--eof billing-address block -->
