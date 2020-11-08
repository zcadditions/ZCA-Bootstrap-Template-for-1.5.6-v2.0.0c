<?php
/**
 * Module Template:
 * Loaded by product-type template to display additional product images.
 * 
 * BOOTSTRAP v3.0.0
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_additional_images.php 3215 2006-03-20 06:05:55Z birdbrain $
 */
require DIR_WS_MODULES . zen_get_module_directory('additional_images.php');

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
