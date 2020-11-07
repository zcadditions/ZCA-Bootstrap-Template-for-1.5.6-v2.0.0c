<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v3.0.0
 *
 * Loaded automatically by index.php?main_page=checkout_shipping_adresss.<br />
 * Allows customer to change the shipping address.
 *
 * @copyright Copyright 2003-2020 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Scott C Wilson 2020 Feb 15 Modified in v1.5.7 $
 */
?>
<div id="checkoutShippingAddressDefault" class="centerColumn">
    <h1 id="checkoutShippingAddressDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

    <?php if ($messageStack->size('checkout_address') > 0) echo $messageStack->output('checkout_address'); ?>

<?php
if ($process == false || $error == true) {
?>
<!--bof shipping address card-->
    <div id="shippingAddress-card" class="card mb-3">
        <h4 id="shippingAddress-card-header" class="card-header"><?php echo TITLE_SHIPPING_ADDRESS; ?></h4>
        <div id="shippingAddress-card-body" class="card-body p-3">
            <div class="row">
                <div id="shippingAddress-shipToAddress" class="shipToAddress col-sm-5">
                    <address><?php echo zen_address_label($_SESSION['customer_id'], $_SESSION['sendto'], true, ' ', '<br />'); ?></address>
                </div>
                <div class="col-sm-7">
                    <div id="shippingAddress-content" class="content"><?php if ($addresses_count < MAX_ADDRESS_BOOK_ENTRIES) echo TEXT_CREATE_NEW_SHIPPING_ADDRESS; ?></div>
                </div>
            </div>

        </div>
    </div>
<!--eof shipping address card-->
<?php
    if ($addresses_count < MAX_ADDRESS_BOOK_ENTRIES) {
      echo zen_draw_form('checkout_address', zen_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL'), 'post', 'class="group"');
        /**
         * require template to display new address form
         */
        require $template->get_template_dir('tpl_modules_checkout_new_address.php', DIR_WS_TEMPLATE, $current_page_base, 'templates'). '/tpl_modules_checkout_new_address.php';
?>
        <div id="addressBookEntries-btn-toolbar" class="btn-toolbar justify-content-between" role="toolbar">
            <?php echo TITLE_CONTINUE_CHECKOUT_PROCEDURE . '<br />' . TEXT_CONTINUE_CHECKOUT_PROCEDURE; ?>
            <?php echo zen_draw_hidden_field('action', 'submit') . zen_image_submit(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT); ?>
        </div>
    <?php echo '</form>'; ?>
<?php
    }
    if ($addresses_count > 1) {
?>
    <?php echo zen_draw_form('checkout_address_book', zen_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL'), 'post', 'class="group"'); ?>
<!--bof choose from your address book entries card-->
        <div id="addressBookEntries-card" class="card mb-3">
            <h4 id="addressBookEntries-card-header" class="card-header"><?php echo TABLE_HEADING_ADDRESS_BOOK_ENTRIES; ?></h4>
            <div id="addressBookEntries-card-body" class="card-body p-3">
<?php
        require $template->get_template_dir('tpl_modules_checkout_address_book.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_checkout_address_book.php';
?>
                <div id="addressBookEntries-btn-toolbar" class="btn-toolbar justify-content-between" role="toolbar">
                    <?php echo TITLE_CONTINUE_CHECKOUT_PROCEDURE . '<br />' . TEXT_CONTINUE_CHECKOUT_PROCEDURE; ?>
                    <?php echo zen_draw_hidden_field('action', 'submit') . zen_image_submit(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT); ?>
                </div>
            </div>
        </div>
<!--eof choose from your address book entries card-->
    <?php echo '</form>'; ?>
<?php
    }
}

if ($process == true) {
?>
    <div id="checkoutShippingAddressDefault-back-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar">
        <?php echo '<a href="' . zen_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?>
    </div>
<?php
}
?>
</div>