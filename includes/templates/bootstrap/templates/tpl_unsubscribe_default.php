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
 * @version $Id: tpl_unsubscribe_default.php 2540 2005-12-11 07:55:22Z birdbrain $
 */
?>

<div id="unsubscribeDefault" class="centerColumn">

<?php if (!isset($_GET['action']) || ($_GET['action'] != 'unsubscribe')) { ?>

<h1 id="unsubscribeDefault-pageheading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php echo ($unsubscribe_address=='') ? UNSUBSCRIBE_TEXT_NO_ADDRESS_GIVEN : UNSUBSCRIBE_TEXT_INFORMATION; ?>

<div id="unsubscribeDefault-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo '<a href="' . zen_href_link(FILENAME_UNSUBSCRIBE, 'addr=' . $unsubscribe_address . '&action=unsubscribe', 'NONSSL') . '">' . zen_image_button(BUTTON_IMAGE_UNSUBSCRIBE, BUTTON_UNSUBSCRIBE) . '</a>'; ?>
</div>


<?php } elseif (isset($_GET['action']) && ($_GET['action'] == 'unsubscribe')) { ?>

<h1 id="unsubscribeDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php echo $status_display; ?>

<div id="unsubscribeDefault-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo '<a href="' . zen_href_link(FILENAME_DEFAULT, '', 'NONSSL') . '">' . zen_image_button(BUTTON_IMAGE_CONTINUE_SHOPPING, BUTTON_CONTINUE_SHOPPING_ALT) . '</a>'; ?>
</div>

<?php } else {
        zen_redirect(FILENAME_DEFAULT,'','NONSSL');
   }
?>
</div>