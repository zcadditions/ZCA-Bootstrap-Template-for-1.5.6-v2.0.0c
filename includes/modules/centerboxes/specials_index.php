<?php
/**
 * specials_products module
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package modules
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: specials_products.php 6424 2007-05-31 05:59:21Z ajeh $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

// initialize vars
$categories_products_id_list = '';
$list_of_products = '';
$specials_products_query = '';
$display_limit = '';

if ( (($manufacturers_id > 0 && $_GET['filter_id'] == 0) || $_GET['music_genre_id'] > 0 || $_GET['record_company_id'] > 0) || (!isset($new_products_category_id) || $new_products_category_id == '0') ) {
  $specials_products_query = "select p.products_id, p.products_image, pd.products_name, p.master_categories_id
                           from (" . TABLE_PRODUCTS . " p
                           left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id
                           left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id )
                           where p.products_id = s.products_id
                           and p.products_id = pd.products_id
                           and p.products_status = '1' and s.status = 1
                           and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'";
} else {
  // get all products and cPaths in this subcat tree
  $productsInCategory = zen_get_categories_products_list( (($manufacturers_id > 0 && $_GET['filter_id'] > 0) ? zen_get_generated_category_path_rev($_GET['filter_id']) : $cPath), false, true, 0, $display_limit);

  if (is_array($productsInCategory) && sizeof($productsInCategory) > 0) {
    // build products-list string to insert into SQL query
    foreach($productsInCategory as $key => $value) {
      $list_of_products .= $key . ', ';
    }
    $list_of_products = substr($list_of_products, 0, -2); // remove trailing comma
    $specials_products_query = "select distinct p.products_id, p.products_image, pd.products_name, p.master_categories_id
                             from (" . TABLE_PRODUCTS . " p
                             left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id
                             left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id )
                             where p.products_id = s.products_id
                             and p.products_id = pd.products_id
                             and p.products_status = '1' and s.status = '1'
                             and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                             and p.products_id in (" . $list_of_products . ")";
  }
}
if ($specials_products_query != '') $specials_products = $db->ExecuteRandomMulti($specials_products_query, MAX_DISPLAY_SPECIAL_PRODUCTS_INDEX);

$row = 0;
$col = 0;
$list_box_contents = array();
$title = '';

$num_products_count = ($specials_products_query == '') ? 0 : $specials_products->RecordCount();

// show only when 1 or more
if ($num_products_count > 0) {
  if ($num_products_count < SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS || SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS == 0 ) {
    $col_width = floor(100/$num_products_count);
  } else {
    $col_width = floor(100/SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS);
  }

  $list_box_contents = array();
  while (!$specials_products->EOF) {

    if (!isset($productsInCategory[$specials_products->fields['products_id']])) $productsInCategory[$specials_products->fields['products_id']] = zen_get_generated_category_path_rev($specials_products->fields['master_categories_id']);
    
/** bof products price */
    $products_price = zen_get_products_display_price($specials_products->fields['products_id']);

$specials_products_price = '<div id="specialsCenterbox-price" class="centerBoxContentsItem-price text-center">' . $products_price . '</div>';
/** eof products price */

/** bof products name */
    $specials_products->fields['products_name'] = zen_get_products_name($specials_products->fields['products_id']);   
    
$specials_products_name = '<div id="specialsCenterbox-name" class="centerBoxContentsItem-name text-center"><a href="' . zen_href_link(zen_get_info_page($specials_products->fields['products_id']), 'cPath=' . $productsInCategory[$specials_products->fields['products_id']] . '&products_id=' . $specials_products->fields['products_id']) . '">' . $specials_products->fields['products_name'] . '</a></div>';
/** eof products name */

/** bof products image */
if ($specials_products->fields['products_image'] == '' and PRODUCTS_IMAGE_NO_IMAGE_STATUS == 0) {
$specials_products_image = '';
} else {
$specials_products_image = '<div id="specialsCenterbox-image" class="centerBoxContentsItem-image text-center"><a href="' . zen_href_link(zen_get_info_page($specials_products->fields['products_id']), 'cPath=' . $productsInCategory[$specials_products->fields['products_id']] . '&products_id=' . $specials_products->fields['products_id']) . '">' . zen_image(DIR_WS_IMAGES . $specials_products->fields['products_image'], $specials_products->fields['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a></div>';
}
/** eof products image */  
    
    $list_box_contents[$row][$col] = array('params' => 'id="specials-centerBoxContents" class="centerBoxContents card mb-3 p-3 text-center"',
    'text' => $specials_products_image . $specials_products_name . $specials_products_price);

    $col ++;
    if ($col > (SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS - 1)) {
      $col = 0;
      $row ++;
    }
    $specials_products->MoveNextRandom();
  }

  if ($specials_products->RecordCount() > 0) {
    $title = '<h4 id="specialsCenterbox-card-header" class="centerBoxHeading card-header">' . sprintf(TABLE_HEADING_SPECIALS_INDEX, strftime('%B')) . '</h4>';
    $zc_show_specials = true;
  }
}
?>