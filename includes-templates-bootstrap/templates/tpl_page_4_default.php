<?php
/**
 * tpl_page_4_default.php
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_page_4_default.php 3464 2006-04-19 00:07:26Z ajeh $
 */
?>
<div id="page4Default" class="centerColumn">
    
<h1 id="page4Default-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if (DEFINE_PAGE_4_STATUS >= 1 and DEFINE_PAGE_4_STATUS <= 2) { ?>
<div id="page4Default-defineContent" class="defineContent">
<?php
/**
 * load the html_define for the page_4 default
 */
  require($define_page);
?>
</div>
<?php } ?>

<div id="page4Default-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
<?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?>
</div>

</div>