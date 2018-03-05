<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_privacy_default.php 3464 2006-04-19 00:07:26Z ajeh $
 */
?>
<div id="privacyDefault" class="centerColumn">
    
<h1 id="privacyDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if (DEFINE_PRIVACY_STATUS >= 1 and DEFINE_PRIVACY_STATUS <= 2) { ?>
<div id="privacyDefault-defineContent" class="defineContent">
<?php
/**
 * require the html_define for the privacy page
 */
  require($define_page);
?>
</div>
<?php } ?>

<div id="privacyDefault-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
<?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?>
</div>

</div>