<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Display information related to GV redemption (could be redemption details, or an error message)
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_gv_redeem_default.php 4155 2006-08-16 17:14:52Z ajeh $
 */
?>
<div id="gvRedeemDefault" class="centerColumn">
    
<h1 id="gvRedeemDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<div id="gvRedeemDefault-content" class="content"><?php echo sprintf($message, $_GET['gv_no']); ?></div>

<div id="gvRedeemDefault-content-one" class="content"><?php echo TEXT_INFORMATION; ?></div>

<div id="gvFaqDefault-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo '<a href="' . ($_GET['goback'] == 'true' ? zen_href_link(FILENAME_GV_FAQ) : zen_href_link(FILENAME_DEFAULT)) . '">' . zen_image_button(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT) . '</a>'; ?>
</div>

</div>