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
 * @version $Id: Author: DrByte  Sat Jan 9 13:13:41 2016 -0500 Modified in v1.5.5 $
 */
 include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_PRODUCT_LISTING));
?>
<div id="productsListing" class="listingCenterColumn">
<?php
// only show when there is something to submit and enabled
    if ($show_top_submit_button == true) {
?>

<div id="productsListing-btn-toolbarTop" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo zen_image_submit(BUTTON_IMAGE_ADD_PRODUCTS_TO_CART, BUTTON_ADD_PRODUCTS_TO_CART_ALT, 'id="submit1" name="submit1"'); ?>
</div>

<?php
    } // show top submit
?>

<?php if ( ($listing_split->number_of_rows > 0) && ( (PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3') ) ) {
?>

<div id="productsListing-topRow" class="row">

<div id="productsListing-topNumber" class="topNumber col-sm"><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></div>

<div id="productsListing-topLinks" class="topLinks col-sm"><?php echo TEXT_RESULT_PAGE . $listing_split->display_links($max_display_page_links, zen_get_all_get_params(array('page', 'info', 'x', 'y', 'main_page')), $paginateAsUL); ?></div>

</div>

<?php
}
?>

<?php
/**
 * load the list_box_content template to display the products
 */
if ($listing_layout_style == 'rows') {
  require($template->get_template_dir('tpl_tabular_display.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_tabular_display.php');
} else {
  require($template->get_template_dir('tpl_columnar_display.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_columnar_display.php');
}
?>     


<?php if ( ($listing_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3')) ) {
?>

<div id="productsListing-bottomRow" class="row">

<div id="productsListing-bottomNumber" class="bottomNumber col-sm"><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></div>
<div id="productsListing-bottomLinks" class="bottomLinks col-sm"><?php echo TEXT_RESULT_PAGE . $listing_split->display_links($max_display_page_links, zen_get_all_get_params(array('page', 'info', 'x', 'y')), $paginateAsUL); ?></div>

</div>

<?php
  }
?>

<?php
// only show when there is something to submit and enabled
    if ($show_bottom_submit_button == true) {
?>

<div id="productsListing-btn-toolbarBottom" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo zen_image_submit(BUTTON_IMAGE_ADD_PRODUCTS_TO_CART, BUTTON_ADD_PRODUCTS_TO_CART_ALT, 'id="submit2" name="submit1"'); ?>
</div>

<?php
    } // show_bottom_submit_button
?>


<?php
// if ($show_top_submit_button == true or $show_bottom_submit_button == true or (PRODUCT_LISTING_MULTIPLE_ADD_TO_CART != 0 and $show_submit == true and $listing_split->number_of_rows > 0)) {
  if ($show_top_submit_button == true or $show_bottom_submit_button == true) {
?>
</form>
<?php } ?>

</div>