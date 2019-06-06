<?php
/**
 * specials_index.php module
 *
 * @package modules
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: lat9 2019 Jan 06 Modified in v1.5.6b $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

// initialize vars
$categories_products_id_list = array();
$list_of_products = '';
$special_products_query = '';

$display_limit = '';

if ( (($manufacturers_id > 0 && empty($_GET['filter_id'])) || !empty($_GET['music_genre_id']) || !empty($_GET['record_company_id'])) || empty($new_products_category_id) ) {
  $special_products_query = "SELECT p.products_id, p.products_image, pd.products_name, p.master_categories_id, p.product_is_call
                           FROM (" . TABLE_PRODUCTS . " p
                           LEFT JOIN " . TABLE_SPECIALS . " s ON p.products_id = s.products_id
                           LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd ON p.products_id = pd.products_id )
                           WHERE p.products_id = s.products_id
                           AND p.products_id = pd.products_id
                           AND p.products_status = 1 AND s.status = 1
                           AND pd.language_id = " . (int)$_SESSION['languages_id'];
} else {
  // get all products and cPaths in this subcat tree
  $productsInCategory = zen_get_categories_products_list( (($manufacturers_id > 0 && !empty($_GET['filter_id'])) ? zen_get_generated_category_path_rev($_GET['filter_id']) : $cPath), false, true, 0, $display_limit);

  if (is_array($productsInCategory) && sizeof($productsInCategory) > 0) {
    // build products-list string to insert into SQL query
    foreach($productsInCategory as $key => $value) {
      $list_of_products .= $key . ', ';
    }
    $list_of_products = substr($list_of_products, 0, -2); // remove trailing comma

    $special_products_query = "SELECT DISTINCT p.products_id, p.products_image, pd.products_name, p.master_categories_id, p.product_is_call
                             FROM (" . TABLE_PRODUCTS . " p
                             LEFT JOIN " . TABLE_SPECIALS . " s ON p.products_id = s.products_id
                             LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd ON p.products_id = pd.products_id )
                             WHERE p.products_id = s.products_id
                             AND p.products_id = pd.products_id
                             AND p.products_status = 1 AND s.status = 1
                             AND pd.language_id = " . (int)$_SESSION['languages_id'] . "
                             AND p.products_id in (" . $list_of_products . ")";
  }
}

if ($special_products_query != '') $special_products = $db->ExecuteRandomMulti($special_products_query, MAX_DISPLAY_SPECIAL_PRODUCTS_INDEX);

$row = 0;
$col = 0;
$list_box_contents = array();
$title = '';

$num_products_count = ($special_products_query == '') ? 0 : $special_products->RecordCount();

// show only when 1 or more
if ($num_products_count > 0) {
  if ($num_products_count < SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS || SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS == 0 ) {
    $col_width = floor(100/$num_products_count);
  } else {
    $col_width = floor(100/SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS);
  }
  
  $list_box_contents = array();
  while (!$special_products->EOF) {
    $products_price = zen_get_products_display_price($special_products->fields['products_id']);
    if (!isset($productsInCategory[$special_products->fields['products_id']])) $productsInCategory[$special_products->fields['products_id']] = zen_get_generated_category_path_rev($special_products->fields['master_categories_id']);

    $zco_notifier->notify('NOTIFY_MODULES_SPECIALS_INDEX_B4_LIST_BOX', array(), $specials_index->fields, $products_price);

    $list_box_contents[$row][$col] = array('params' => 'class="centerBoxContents card mb-3 p-3 text-center" id="centerBoxContentsNew"',
    'text' => (($special_products->fields['products_image'] == '' and PRODUCTS_IMAGE_NO_IMAGE_STATUS == 0) ? '' : '<a href="' . zen_href_link(zen_get_info_page($special_products->fields['products_id']), 'cPath=' . $productsInCategory[$special_products->fields['products_id']] . '&products_id=' . $special_products->fields['products_id']) . '">' . zen_image(DIR_WS_IMAGES . $special_products->fields['products_image'], $special_products->fields['products_name'], IMAGE_PRODUCT_NEW_WIDTH, IMAGE_PRODUCT_NEW_HEIGHT) . '</a><br />') . '<a href="' . zen_href_link(zen_get_info_page($special_products->fields['products_id']), 'cPath=' . $productsInCategory[$special_products->fields['products_id']] . '&products_id=' . $special_products->fields['products_id']) . '">' . $special_products->fields['products_name'] . '</a><br />' . $products_price);

    $col ++;
    if ($col > (SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS - 1)) {
      $col = 0;
      $row ++;
    }
    $special_products->MoveNextRandom();
  }

  if ($special_products->RecordCount() > 0) {
    if (!empty($new_products_category_id)) {
      $category_title = zen_get_categories_name((int)$new_products_category_id);
      $title = '<h4 id="specialCenterbox-card-header" class="centerBoxHeading card-header">' . sprintf(TABLE_HEADING_SPECIALS_INDEX, strftime('%B')) . ($category_title != '' ? ' - ' . $category_title : '' ) . '</h4>';
    } else {
      $title = '<h4 id="specialCenterbox-card-header" class="centerBoxHeading card-header">' . sprintf(TABLE_HEADING_SPECIALS_INDEX, strftime('%B')) . '</h4>';
    }
    $zc_show_special_products = true;
  }
}
