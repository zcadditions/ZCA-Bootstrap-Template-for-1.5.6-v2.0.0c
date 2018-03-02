<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Loaded automatically by index.php?main_page=account_newsletters.<br />
 * Subscribe/Unsubscribe from General Newsletter
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_account_newsletters_default.php 2896 2006-01-26 19:10:56Z birdbrain $
 */
?>
<div id="accountNewslettersDefault" class="centerColumn">

<?php echo zen_draw_form('account_newsletter', zen_href_link(FILENAME_ACCOUNT_NEWSLETTERS, '', 'SSL')) . zen_draw_hidden_field('action', 'process'); ?>

<h1 id="accountNewslettersDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<!--bof general newsletter card-->
<div id="generalNewsletter-card" class="card mb-3">
<h4 id="generalNewsletter-card-header" class="card-header"><?php echo MY_NEWSLETTERS_GENERAL_NEWSLETTER; ?></h4>
<div id="generalNewsletter-card-body" class="card-body p-3">
    
<div class="custom-control custom-checkbox">
<?php echo zen_draw_checkbox_field('newsletter_general', '1', (($newsletter->fields['customers_newsletter'] == '1') ? true : false), 'id="newsletter"') . '<label class="custom-control-label" for="newsletter">' . MY_NEWSLETTERS_GENERAL_NEWSLETTER_DESCRIPTION . '</label>'; ?>
</div>

<div id="generalNewsletter-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo zen_image_submit(BUTTON_IMAGE_UPDATE, BUTTON_UPDATE_ALT); ?>
</div>

</div>
</div>
<!--eof general newsletter card-->


<div id="accountNewslettersDefault-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
<?php echo '<a href="' . zen_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?>
</div>

</form>
</div>