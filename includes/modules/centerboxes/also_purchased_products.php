<?php
/**
 * also_purchased_products module
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package modules
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Thu Aug 13 14:06:53 2015 -0400 Modified in v1.5.5 $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}
if (isset($_GET['products_id']) && SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS > 0 && MIN_DISPLAY_ALSO_PURCHASED > 0) {

  $also_purchased_products = $db->ExecuteRandomMulti(sprintf(SQL_ALSO_PURCHASED, (int)$_GET['products_id'], (int)$_GET['products_id']), MAX_DISPLAY_ALSO_PURCHASED);

  $num_products_ordered = $also_purchased_products->RecordCount();

  $row = 0;
  $col = 0;
  $list_box_contents = array();
  $title = '';

  // show only when 1 or more and equal to or greater than minimum set in admin
  if ($num_products_ordered >= MIN_DISPLAY_ALSO_PURCHASED && $num_products_ordered > 0) {
    if ($num_products_ordered < SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS) {
      $col_width = floor(100/$num_products_ordered);
    } else {
      $col_width = floor(100/SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS);
    }

    while (!$also_purchased_products->EOF) {
      $also_purchased_products->fields['products_name'] = zen_get_products_name($also_purchased_products->fields['products_id']);
      
/** bof products price */
    $products_price = zen_get_products_display_price($also_purchased_products->fields['products_id']);

$also_purchased_products_price = '<div id="alsoPurchasedCenterbox-price" class="centerBoxContentsItem-price text-center">' . $products_price . '</div>';
/** eof products price */

/** bof products name */
    $also_purchased_products->fields['products_name'] = zen_get_products_name($also_purchased_products->fields['products_id']);    
    
$also_purchased_products_name = '<div id="alsoPurchasedCenterbox-name" class="centerBoxContentsItem-name text-center"><a href="' . zen_href_link(zen_get_info_page($also_purchased_products->fields['products_id']), 'cPath=' . $productsInCategory[$also_purchased_products->fields['products_id']] . '&products_id=' . $also_purchased_products->fields['products_id']) . '">' . $also_purchased_products->fields['products_name'] . '</a></div>';
/** eof products name */

/** bof products image */
if ($also_purchased_products->fields['products_image'] == '' and PRODUCTS_IMAGE_NO_IMAGE_STATUS == 0) {
$also_purchased_products_image = '';
} else {
$also_purchased_products_image = '<div id="alsoPurchasedCenterbox-image" class="centerBoxContentsItem-image text-center"><a href="' . zen_href_link(zen_get_info_page($also_purchased_products->fields['products_id']), 'cPath=' . $productsInCategory[$also_purchased_products->fields['products_id']] . '&products_id=' . $also_purchased_products->fields['products_id']) . '">' . zen_image(DIR_WS_IMAGES . $also_purchased_products->fields['products_image'], $also_purchased_products->fields['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a></div>';
}
/** eof products image */      
      
      $list_box_contents[$row][$col] = array('params' => 'id="alsoPurchased-centerBoxContents" class="centerBoxContents card mb-3 p-3 text-center"',
      'text' => $also_purchased_products_image . $also_purchased_products_name . $also_purchased_products_price);

      $col ++;
      if ($col > (SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS - 1)) {
        $col = 0;
        $row ++;
      }
      $also_purchased_products->MoveNextRandom();
    }
  }
  if ($also_purchased_products->RecordCount() > 0 && $also_purchased_products->RecordCount() >= MIN_DISPLAY_ALSO_PURCHASED) {
    $title = '<h4 id="alsoPurchasedCenterbox-card-header" class="centerBoxHeading card-header">' . TEXT_ALSO_PURCHASED_PRODUCTS . '</h4>';
    $zc_show_also_purchased = true;
  }
}
