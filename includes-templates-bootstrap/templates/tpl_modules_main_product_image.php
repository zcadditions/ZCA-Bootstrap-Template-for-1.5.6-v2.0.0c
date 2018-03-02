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
?>
<?php require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_MAIN_PRODUCT_IMAGE)); ?>

<?php

require($template->get_template_dir('tpl_image.php',DIR_WS_TEMPLATE, $current_page_base,'modalboxes'). '/tpl_image.php');

  echo '<a data-toggle="modal" data-target=".image-modal-lg" href="#image-modal-lg">';

  echo zen_image($products_image_medium, $products_name, MEDIUM_IMAGE_WIDTH, MEDIUM_IMAGE_HEIGHT);
  
  echo '<div class="p-1"></div>';
 
  echo '<span class="imgLink">' . TEXT_CLICK_TO_ENLARGE . '</span></a>';
?>

