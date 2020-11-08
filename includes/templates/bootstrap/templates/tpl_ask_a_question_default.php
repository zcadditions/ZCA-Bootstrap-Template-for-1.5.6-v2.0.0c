<?php
/**
 * BOOTSTRAP v3.0.0
 *
 * @copyright Copyright 2003-2020 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2020 Jun 23 Modified in v1.5.7 $
 */
?>
<div class="centerColumn" id="askAQuestion">

<?php echo zen_draw_form('ask_a_question', zen_href_link(FILENAME_ASK_A_QUESTION, 'action=send&pid=' . (int)$_GET['pid'], 'SSL')); ?>

<?php if (CONTACT_US_STORE_NAME_ADDRESS== '1') { ?>
    <address><?php echo nl2br(STORE_NAME_ADDRESS); ?></address>
<?php } ?>
    <h1><?php echo HEADING_TITLE . $product_details['products_name']; ?></h1>

<?php
if (isset($_GET['action']) && ($_GET['action'] == 'success')) {
?>
    <div class="content"><?php echo TEXT_SUCCESS; ?></div>

    <div class="btn-toolbar my-3" role="toolbar">
        <?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?>
    </div>

<?php
} else {
?>

<?php echo '<a href="' . zen_href_link(zen_get_info_page((int)$_GET['pid']), 'products_id=' . (int)$_GET['pid'], 'SSL') . '">' . zen_image(DIR_WS_IMAGES . $product_details['products_image'], $product_details['products_name'], IMAGE_PRODUCT_LISTING_WIDTH, IMAGE_PRODUCT_LISTING_HEIGHT) . '</a>'; ?>

    <div id="contactUsNoticeContent" class="definecontent">
<?php
/**
 * require html_define for the contact_us page
 */
require $define_page;
?>
    </div>

<?php if ($messageStack->size('contact') > 0) echo $messageStack->output('contact'); ?>

    <div id="contactUsForm" class="card">
        <h2 class="card-header"><?php echo FORM_TITLE; ?></h2>
        <div class="card-body">
            <div class="required-info text-right my-3"><?php echo FORM_REQUIRED_INFORMATION; ?></div>
<?php
// show dropdown if set
    if (!empty(CONTACT_US_LIST)) {
?>
            <label class="inputLabel" for="send-to"><?php echo SEND_TO_TEXT; ?></label><span class="alert"><?php echo ENTRY_REQUIRED_SYMBOL; ?></span>
            <?php echo zen_draw_pull_down_menu('send_to',  $send_to_array, 0, 'id="send-to"'); ?>
            <div class="p-2"></div>
<?php
    }
?>
            <label class="inputLabel" for="contactname"><?php echo ENTRY_NAME; ?></label>
            <?php echo zen_draw_input_field('contactname', $name, ' size="40" id="contactname" placeholder="' . ENTRY_REQUIRED_SYMBOL . '" autofocus required'); ?>
            <div class="p-2"></div>

            <label class="inputLabel" for="email-address"><?php echo ENTRY_EMAIL; ?></label>
            <?php echo zen_draw_input_field('email', ($email_address), ' size="40" id="email-address" autocomplete="off" placeholder="' . ENTRY_REQUIRED_SYMBOL . '" required', 'email'); ?>
            <div class="p-2"></div>

            <label class="inputLabel" for="telephone"><?php echo ENTRY_TELEPHONE; ?></label>
            <?php echo zen_draw_input_field('telephone', ($telephone), ' size="20" id="telephone" autocomplete="off" placeholder="' . ENTRY_REQUIRED_SYMBOL . '" required', 'telephone'); ?>
            <div class="p-2"></div>

            <label for="enquiry"><?php echo ENTRY_ENQUIRY; ?></label>
            <?php echo zen_draw_textarea_field('enquiry', '30', '7', $enquiry, 'id="enquiry" placeholder="' . ENTRY_REQUIRED_SYMBOL . '" required'); ?>

            <?php echo zen_draw_input_field($antiSpamFieldName, '', ' size="40" id="CUAS" style="visibility:hidden; display:none;" autocomplete="off"'); ?>
            
            <div class="btn-toolbar justify-content-end mt-3" role="toolbar">
                <?php echo zen_image_submit(BUTTON_IMAGE_SEND, BUTTON_SEND_ALT); ?>
            </div>
        </div>
    </div>

    <div class="btn-toolbar my-3" role="toolbar">
        <?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?>
    </div>
<?php
}
?>
<?php echo '</form>'; ?>
</div>
