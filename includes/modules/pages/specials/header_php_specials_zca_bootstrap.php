<?php
/**
 * Specials
 * 
 * BOOTSTRAP v3.0.0
 *
 * @package page
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: header_php.php 3000 2006-02-09 21:11:37Z wilt $
 *
 * zca_responsive_default BASE
 *
 */
// -----
// specials: Provide updated processing **ONLY IF** the ZCA bootstrap is the active template.
//
if (!(function_exists('zca_bootstrap_active') && zca_bootstrap_active())) {
    return;
}

//Removed call to define page & sorter dropdown. not included in this template
$listing_sql =
    "SELECT p.products_id, p.products_type, pd.products_name, p.products_image, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_model, 
            p.products_quantity, p.products_weight, p.product_is_call, p.product_is_always_free_shipping, p.products_qty_box_status, p.master_categories_id
       FROM (" . TABLE_PRODUCTS . " p
                LEFT JOIN " . TABLE_SPECIALS . " s 
                    ON p.products_id = s.products_id
                LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd 
                    ON p.products_id = pd.products_id
                   AND pd.language_id = :languageID
            )
      WHERE p.products_status = 1
        AND s.status = 1
      $order_by";

$listing_sql = $db->bindVars($listing_sql, ':languageID', $_SESSION['languages_id'], 'integer');

//check to see if we are in normal mode ... not showcase, not maintenance, etc
$show_submit = zen_run_normal();
$define_list = array(
    'PRODUCT_LIST_MODEL' => PRODUCT_LIST_MODEL,
    'PRODUCT_LIST_NAME' => PRODUCT_LIST_NAME,
    'PRODUCT_LIST_MANUFACTURER' => PRODUCT_LIST_MANUFACTURER,
    'PRODUCT_LIST_PRICE' => PRODUCT_LIST_PRICE,
    'PRODUCT_LIST_QUANTITY' => PRODUCT_LIST_QUANTITY,
    'PRODUCT_LIST_WEIGHT' => PRODUCT_LIST_WEIGHT,
    'PRODUCT_LIST_IMAGE' => PRODUCT_LIST_IMAGE,
);

asort($define_list);
$column_list = array();
foreach ($define_list as $key => $value) {
    if ($value > 0) {
        $column_list[] = $key;
    }
}
