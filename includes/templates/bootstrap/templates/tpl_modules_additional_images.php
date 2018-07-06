<?php
/**
 * Module Template:
 * Loaded by product-type template to display additional product images.
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_additional_images.php 3215 2006-03-20 06:05:55Z birdbrain $
 */
require DIR_WS_MODULES . zen_get_module_directory('additional_images.php');
 	
    if (ZCA_PHOTOSWIPE_STATUS == 'true') {

echo '<div class="my-gallery row mx-auto" itemscope itemtype="http://schema.org/ImageGallery">';

if (is_array($list_box_contents) > 0 ) {
 for($row=0;$row<sizeof($list_box_contents);$row++) {
    $params = "";

    for($col=0;$col<sizeof($list_box_contents[$row]);$col++) {
      $r_params = "";
      if (isset($list_box_contents[$row][$col]['params'])) $r_params .= ' ' . (string)$list_box_contents[$row][$col]['params'];
     if (isset($list_box_contents[$row][$col]['text'])) {

echo $list_box_contents[$row][$col]['text'];

      }
    }
  }
}

echo '</div><div class="clearfix"></div>';

    } else {
        
if ($flag_show_product_info_additional_images != 0 && $num_images > 0) {
    if (PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_POPUPS == 'Yes') {
        require $template->get_template_dir('tpl_image_additional.php', DIR_WS_TEMPLATE, $current_page_base, 'modalboxes') . '/tpl_image_additional.php';
        require $template->get_template_dir('tpl_columnar_display.php', DIR_WS_TEMPLATE, $current_page_base, 'common') . '/tpl_columnar_display.php';
    } else {
?>
<div id="productAdditionalImages">
<?php
        require $template->get_template_dir('tpl_columnar_display.php', DIR_WS_TEMPLATE, $current_page_base,'common') . '/tpl_columnar_display.php';
?>
</div>
<?php
    }
}
    }
