<?php
/**
 *
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */

function zca_photoswipe($src, $alt = '', $width = '', $height = '', $parameters = '') {
  global $template_dir;
  
  //auto replace with defined missing image
  if ($src == DIR_WS_IMAGES and PRODUCTS_IMAGE_NO_IMAGE_STATUS == '1') {
    $src = DIR_WS_IMAGES . PRODUCTS_IMAGE_NO_IMAGE;
  }

  if ((empty($src) || ($src == DIR_WS_IMAGES)) && (IMAGE_REQUIRED == 'false')) {
    return false;
  }

  // if not in current template switch to template_default
  if (!file_exists($src)) {
    $src = str_replace(DIR_WS_TEMPLATES . $template_dir, DIR_WS_TEMPLATES . 'template_default', $src);
  }

  // hook for handle_image() function such as Image Handler etc
  if (function_exists('handle_image')) {
    $newimg = handle_image($src, $alt, $width, $height, $parameters);
    list($src, $alt, $width, $height, $parameters) = $newimg; 
  }

  $image = zen_output_string($src);

  return $image;
}
?>
