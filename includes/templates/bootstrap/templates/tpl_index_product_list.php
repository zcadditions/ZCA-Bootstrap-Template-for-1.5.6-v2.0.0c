<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v3.0.0
 *
 * Loaded by main_page=index<br />
 * Displays product-listing when a particular category/subcategory is selected for browsing
 *
 * @package templateSystem
 * @copyright Copyright 2003-2019 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: mc12345678 2019 Apr 07 Modified in v1.5.6b $
 */
?>
<div id="indexProductList" class="centerColumn">
    <h1 id="indexProductList-pageHeading" class="pageHeading"><?php echo $current_categories_name; ?></h1>

    <div id="indexProductList-cat-wrap">
<?php
if (PRODUCT_LIST_CATEGORIES_IMAGE_STATUS == 'true') {
// categories_image
    if ($categories_image = zen_get_categories_image($current_category_id)) {
?>
        <div id="indexProductList-categoryImage" class="categoryImage"><?php echo zen_image(DIR_WS_IMAGES . $categories_image, '', CATEGORY_ICON_IMAGE_WIDTH, CATEGORY_ICON_IMAGE_HEIGHT); ?></div>
<?php
    }
} // categories_image
?>

<?php
// categories_description
if ($current_categories_description != '') {
?>
        <div id="indexProductList-content" class="content"><?php echo $current_categories_description;  ?></div>
<?php 
} // categories_description
?>
    </div>
<?php
$check_for_alpha = $listing_sql;
$check_for_alpha = $db->Execute($check_for_alpha);

if ($do_filter_list || isset($_GET['alpha_filter_id']) || ($check_for_alpha->RecordCount() > 0 && PRODUCT_LIST_ALPHA_SORTER == 'true')) {
    $form = zen_draw_form('filter', zen_href_link(FILENAME_DEFAULT), 'get') . '<label class="inputLabel">' .TEXT_SHOW . '</label>';
?>

<?php
    echo $form;
    echo zen_draw_hidden_field('main_page', FILENAME_DEFAULT);
?>
<?php
  // draw cPath if known
    if (empty($getoption_set)) {
        echo zen_draw_hidden_field('cPath', $cPath);
    } else {
    // draw manufacturers_id
        echo zen_draw_hidden_field($get_option_variable, $_GET[$get_option_variable]);
    }

  // draw music_genre_id
    if (isset($_GET['music_genre_id']) && $_GET['music_genre_id'] != '') {
        echo zen_draw_hidden_field('music_genre_id', $_GET['music_genre_id']);
    }

    // draw record_company_id
    if (isset($_GET['record_company_id']) && $_GET['record_company_id'] != '') {
        echo zen_draw_hidden_field('record_company_id', $_GET['record_company_id']);
    }

    // draw typefilter
    if (isset($_GET['typefilter']) && $_GET['typefilter'] != '') {
        echo zen_draw_hidden_field('typefilter', $_GET['typefilter']);
    }

    // draw manufacturers_id if not already done earlier
    if (!(isset($get_option_variable) && $get_option_variable == 'manufacturers_id') && !empty($_GET['manufacturers_id'])) {
        echo zen_draw_hidden_field('manufacturers_id', $_GET['manufacturers_id']);
    }

    // draw sort
    echo zen_draw_hidden_field('sort', $_GET['sort']);

    echo '<div id="indexProductList-filterRow" class="row">';
    // draw filter_id (ie: category/mfg depending on $options)
    if ($do_filter_list) {
        echo '<div class="col">';
        echo zen_draw_pull_down_menu('filter_id', $options, (isset($_GET['filter_id']) ? $_GET['filter_id'] : ''), 'onchange="this.form.submit()"');
        echo '</div>';
    } 
    echo '<div class="col">';
    // draw alpha sorter
    require DIR_WS_MODULES . zen_get_module_directory(FILENAME_PRODUCT_LISTING_ALPHA_SORTER);
    echo '</div>';
    echo '</div>';
    echo '</form>';
}
?>
<div class="p-3"></div>
<?php
/**
 * require the code for listing products
 */
require $template->get_template_dir('tpl_modules_product_listing.php', DIR_WS_TEMPLATE, $current_page_base, 'templates'). '/tpl_modules_product_listing.php';

//// bof: categories error
if ($error_categories) {
    // verify lost category and reset category
    $check_category = $db->Execute("SELECT categories_id FROM " . TABLE_CATEGORIES . " WHERE categories_id = '" . $cPath . "'");
    if ($check_category->RecordCount() == 0) {
        $new_products_category_id = '0';
        $cPath = '';
    }

    $show_display_category = $db->Execute(SQL_SHOW_PRODUCT_INFO_MISSING);
    while (!$show_display_category->EOF) {
        if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MISSING_FEATURED_PRODUCTS') {
            /**
             * display the Featured Products Center Box
             */
            require $template->get_template_dir('tpl_modules_featured_products.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_featured_products.php';
        }

        if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MISSING_SPECIALS_PRODUCTS') {
            /**
             * display the Special Products Center Box
             */
            require $template->get_template_dir('tpl_modules_specials_default.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_specials_default.php';
        }
        
        if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MISSING_NEW_PRODUCTS') {
            /**
             * display the New Products Center Box
             */
            require $template->get_template_dir('tpl_modules_whats_new.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_whats_new.php';
        }

        if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MISSING_UPCOMING') {
            require DIR_WS_MODULES . zen_get_module_directory('centerboxes/' . FILENAME_UPCOMING_PRODUCTS);
        }

        $show_display_category->MoveNext();
    }
} else {
    $show_display_category = $db->Execute(SQL_SHOW_PRODUCT_INFO_LISTING_BELOW);
    while (!$show_display_category->EOF) {
        if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_LISTING_BELOW_FEATURED_PRODUCTS') {
            /**
             * display the Featured Products Center Box
             */
            require $template->get_template_dir('tpl_modules_featured_products.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_featured_products.php';
        }
        if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_LISTING_BELOW_SPECIALS_PRODUCTS') {
            /**
             * display the Special Products Center Box
             */
            require $template->get_template_dir('tpl_modules_specials_default.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_specials_default.php';
        }
        if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_LISTING_BELOW_NEW_PRODUCTS') {
            /**
             * display the New Products Center Box
             */
            require $template->get_template_dir('tpl_modules_whats_new.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_whats_new.php';
        }

        if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_LISTING_BELOW_UPCOMING') {
            require DIR_WS_MODULES . zen_get_module_directory('centerboxes/' . FILENAME_UPCOMING_PRODUCTS);
        }
        $show_display_category->MoveNext();
    } // !EOF
} //// eof: categories
?>
</div>
