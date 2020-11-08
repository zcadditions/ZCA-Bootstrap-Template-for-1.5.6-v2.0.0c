<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v3.0.0
 *
 * Display information related to GV redemption (could be redemption details, or an error message)
 *
 * @copyright Copyright 2003-2020 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2020 Oct 30 Modified in v1.5.7a $
 */
?>
<div id="gvRedeemDefault" class="centerColumn">
    
<h1 id="gvRedeemDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<div id="gvRedeemDefault-content" class="content"><?php echo sprintf($message, $_GET['gv_no']); ?></div>

<div id="gvRedeemDefault-content-one" class="content"><?php echo TEXT_INFORMATION; ?></div>

<?php
$link = zen_href_link(FILENAME_DEFAULT);
if (isset($_GET['goback']) && $_GET['goback'] == 'true') $link = zen_href_link(FILENAME_GV_FAQ);
?>
<div id="gvFaqDefault-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo '<a href="' . $link . '">' . zen_image_button(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT) . '</a>'; ?>
</div>

</div>