<?php
/**
 * Module Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Wed Jan 6 12:47:43 2016 -0500 Modified in v1.5.5 $
 */
require DIR_WS_MODULES . zen_get_module_directory(FILENAME_MAIN_PRODUCT_IMAGE);

if (ZCA_PHOTOSWIPE_STATUS == 'true') {

echo '<div class="my-gallery row mx-auto" itemscope itemtype="http://schema.org/ImageGallery"><figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="card col-md p-3">';

echo '<a href="' . zca_photoswipe($products_image_large, '', LARGE_IMAGE_WIDTH, LARGE_IMAGE_HEIGHT) . '" itemprop="contentUrl" data-size="1024x1024">';

echo '<img src="' . zca_photoswipe($products_image_medium, '', MEDIUM_IMAGE_WIDTH, MEDIUM_IMAGE_HEIGHT) . '" itemprop="thumbnail" alt="Image description" class="mx-auto d-block" style="width:' .  MEDIUM_IMAGE_WIDTH . 'px;" /></a>';
      
echo '<figcaption itemprop="caption description"><?php echo addslashes($products_name); ?></figcaption></figure></div>';  

 	} else {

if (PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_POPUPS == 'Yes') {
    require $template->get_template_dir('tpl_image.php', DIR_WS_TEMPLATE, $current_page_base, 'modalboxes'). '/tpl_image.php';

    echo '<a data-toggle="modal" data-target=".image-modal-lg" href="#image-modal-lg">';

    echo zen_image($products_image_medium, $products_name, MEDIUM_IMAGE_WIDTH, MEDIUM_IMAGE_HEIGHT);
  
    echo '<div class="p-1"></div>';
 
    echo '<span class="imgLink">' . TEXT_CLICK_TO_ENLARGE . '</span></a>';
} else {
?>
<div id="productMainImage" class="centeredContent back">
<script><!--
document.write('<?php echo '<a href="javascript:popupWindow(\\\'' . zen_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $_GET['products_id']) . '\\\')">' . zen_image(addslashes($products_image_medium), addslashes($products_name), MEDIUM_IMAGE_WIDTH, MEDIUM_IMAGE_HEIGHT) . '<br /><span class="imgLink">' . TEXT_CLICK_TO_ENLARGE . '</span></a>'; ?>');
//--></script>
<noscript>
<?php
  echo '<a href="' . zen_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $_GET['products_id']) . '" target="_blank">' . zen_image($products_image_medium, $products_name, MEDIUM_IMAGE_WIDTH, MEDIUM_IMAGE_HEIGHT) . '<br /><span class="imgLink">' . TEXT_CLICK_TO_ENLARGE . '</span></a>';
?>
</noscript>
</div>
<?php
}
 	}
