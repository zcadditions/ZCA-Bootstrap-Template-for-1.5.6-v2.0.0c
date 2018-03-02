<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Loaded automatically by index.php?main_page=conditions.<br />
 * Displays conditions page.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_conditions_default.php 3464 2006-04-19 00:07:26Z ajeh $
 */
?>
<div id="conditionsDefault" class="centerColumn">
    
<h1 id="conditionsDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if (DEFINE_CONDITIONS_STATUS >= 1 and DEFINE_CONDITIONS_STATUS <= 2) { ?>
<div id="conditionsDefault-defineContent" class="defineContent">
<?php
/**
 * require the html_define for the conditions page
 */
  require($define_page);
?>
</div>
<?php } ?>

<div id="conditionsDefault-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
<?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?>
</div>

</div>
