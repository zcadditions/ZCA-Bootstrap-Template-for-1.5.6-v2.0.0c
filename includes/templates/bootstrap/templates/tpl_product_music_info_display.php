<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=product_music_info.<br />
 * Displays details of a music product
 *
 * @package templateSystem
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: mc12345678 Thu Sep 21 10:37:10 2017 -0400 Modified in v1.5.6 $
 */
?>

<div id="productMusicInfo" class="centerColumn">

<!--bof Form start-->
<?php echo zen_draw_form('cart_quantity', zen_href_link(zen_get_info_page($_GET['products_id']), zen_get_all_get_params(array('action')) . 'action=add_product', $request_type), 'post', 'enctype="multipart/form-data"') . "\n"; ?>
<!--eof Form start-->

<?php if ($messageStack->size('product_info') > 0) echo $messageStack->output('product_info'); ?>

<!--bof Category Icon -->
<?php if ($module_show_categories != 0) {?>
<div id="productMusicInfo-productCategoryIcon" class="productCategoryIcon">
<?php
/**
 * display the category icons
 */
require($template->get_template_dir('/tpl_modules_category_icon_display.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_category_icon_display.php'); ?>
</div>
<?php } ?>
<!--eof Category Icon -->

<!--bof Prev/Next top position -->
<?php if (PRODUCT_INFO_PREVIOUS_NEXT == 1 or PRODUCT_INFO_PREVIOUS_NEXT == 3) { ?>
<div id="productMusicInfo-productPrevNextTop" class="productPrevNextTop">
<?php
/**
 * display the product previous/next helper
 */
require($template->get_template_dir('/tpl_products_next_previous.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_products_next_previous.php'); ?>
</div>
<?php } ?>
<!--eof Prev/Next top position-->

<!--bof Product Name-->
<h1 id="productMusicInfo-productName" class="productName"><?php echo $products_name; ?></h1>
<!--eof Product Name-->

<div id="productMusicInfo-displayRow" class="row">
   <div id="productMusicInfo-displayColLeft"  class="col-sm mb-3">

<!--bof Main Product Image -->
<?php
  if (zen_not_null($products_image)) {
  ?>
<div id="productMusicInfo-productMainImage" class="productMainImage pt-3 text-center">
<?php
/**
 * display the main product image
 */
   require($template->get_template_dir('/tpl_modules_main_product_image.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_main_product_image.php'); ?>
</div>
<?php
  }
?>
<!--eof Main Product Image-->

<!--bof Additional Product Images -->
<div id="productMusicInfo-productAdditionalImages" class="productAdditionalImages text-center">
<?php
/**
 * display the products additional images in a model carousel
 */
 
if (PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_POPUPS == 'Yes' && PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_SLIDE == '1') {

require($template->get_template_dir('tpl_bootstrap_images.php',DIR_WS_TEMPLATE, $current_page_base,'modalboxes'). '/tpl_bootstrap_images.php');

if ($num_images > 0) {
$buttonText = $num_images . TEXT_MULTIPLE_IMAGES; ?>
<div class="p-1"></div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bootstrap-slide-modal-lg"><?php echo $buttonText; ?></button>
<div class="p-3"></div>
<?php
}
?>

<?php
} else {

/**
 * display the products additional images in individual modal
 */
 
echo '<div class="p-3"></div>'; 
 
  require($template->get_template_dir('/tpl_modules_additional_images.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_additional_images.php');
  }
  ?>
</div>
<!--eof Additional Product Images -->

<!--bof Product description -->
<?php if ($products_description != '') { ?>
<div id="productMusicInfo-productDescription" class="productDescription mb-3"><?php echo stripslashes($products_description); ?>
</div>
<?php } ?>
<!--eof Product description -->

<!--bof Reviews button and count-->
<?php
  if ($flag_show_product_info_reviews == 1) {
    // if more than 0 reviews, then show reviews button; otherwise, show the "write review" button
    if ($reviews->fields['count'] > 0 ) { ?>
<div id="productMusicInfo-productReviewLink" class="productReviewLink mb-3"><?php echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS, zen_get_all_get_params()) . '">' . zen_image_button(BUTTON_IMAGE_REVIEWS, BUTTON_REVIEWS_ALT) . '</a>'; ?>
</div>

<p id="productMusicInfo-productReviewCount" class="productReviewCount"><?php echo ($flag_show_product_info_reviews_count == 1 ? TEXT_CURRENT_REVIEWS . ' ' . $reviews->fields['count'] : ''); ?></p>

<?php } else { ?>
<div id="productMusicInfo-productReviewLink" class="productReviewLink mb-3"><?php echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, zen_get_all_get_params(array())) . '">' . zen_image_button(BUTTON_IMAGE_WRITE_REVIEW, BUTTON_WRITE_REVIEW_ALT) . '</a>'; ?>
</div>

<?php
  }
}
?>
<!--eof Reviews button and count -->
</div>
  <div id="productMusicInfo-displayColRight"  class="col-sm mb-3">
<!--bof Product details list  -->
<?php if ( (($flag_show_product_info_model == 1 and $products_model != '') or ($flag_show_product_info_weight == 1 and $products_weight !=0) or ($flag_show_product_info_quantity == 1) or ($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name))) or $flag_show_product_music_info_artist == 1 or $flag_show_product_music_info_genre == 1) { ?>
<ul id="productMusicInfo-productDetailsList" class="productDetailsList list-group mb-3">
  <?php echo (($flag_show_product_info_model == 1 and $products_model !='') ? '<li class="list-group-item">' . TEXT_PRODUCT_MODEL . $products_model . '</li>' : '') . "\n"; ?>
  <?php echo (($flag_show_product_info_weight == 1 and $products_weight !=0) ? '<li class="list-group-item">' . TEXT_PRODUCT_WEIGHT .  $products_weight . TEXT_PRODUCT_WEIGHT_UNIT . '</li>'  : '') . "\n"; ?>
  <?php echo (($flag_show_product_info_quantity == 1) ? '<li>' . $products_quantity . TEXT_PRODUCT_QUANTITY . '</li>'  : '') . "\n"; ?>
  <?php echo (($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name)) ? '<li class="list-group-item">' . TEXT_PRODUCT_MANUFACTURER . $manufacturers_name . '</li>' : '') . "\n"; ?>
  <?php echo (($flag_show_product_music_info_artist == 1 and !empty($products_artist_name)) ? '<li class="list-group-item">' . TEXT_PRODUCT_ARTIST . $products_artist_name . '</li>' : '') . "\n"; ?>
  <?php echo (($flag_show_product_music_info_genre == 1 and !empty($products_music_genre_name)) ? '<li class="list-group-item">' . TEXT_PRODUCT_MUSIC_GENRE . $products_music_genre_name . '</li>' : '') . "\n"; ?>
</ul>

<?php
  }
?>
<!--eof Product details list -->

<?php
if ($flag_show_ask_a_question) {
?>
<!-- bof Ask a Question -->
<br>
<span id="productQuestions" class="">
<?php echo '<a href="' . zen_href_link(FILENAME_ASK_A_QUESTION, 'pid=' . $_GET['products_id'], 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_ASK_A_QUESTION, BUTTON_ASK_A_QUESTION_ALT) . '</a>'; ?>
</span>
<br class="clearBoth">
<br>
<!-- eof Ask a Question -->
<?php
}
?>

<!--bof Media Manager -->
<div id="productMusicInfo-mediaManager" class="mediaManager"><?php
/**
 * display the products related media clips
 */
 require($template->get_template_dir('/tpl_modules_media_manager.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_media_manager.php'); ?></div>
<!--eof Media Manager -->

<!--bof Attributes Module -->
<?php
  if ($pr_attr->fields['total'] > 0) {
?>

<!--bof Product Price block above Attributes -->
<?php if (zen_get_products_display_price((int)$_GET['products_id']) > '0') { ?>
<!--bof products price top card-->
<div id="productsPriceTop-card" class="card mb-3">
  <div id="productsPriceTop-card-body" class="card-body p-3">
<h2 id="productsPriceTop-productPriceTopPrice" class="productPriceTopPrice">
  <?php  
// base price
  if ($show_onetime_charges_description == 'true') {
    $one_time = TEXT_ONETIME_CHARGE_SYMBOL . TEXT_ONETIME_CHARGE_DESCRIPTION;
  } else {
    $one_time = '';
  }
  ?>

<?php
  echo $one_time . ((zen_has_product_attributes_values((int)$_GET['products_id']) and $flag_show_product_info_starting_at == 1) ? TEXT_BASE_PRICE : '') . zen_get_products_display_price((int)$_GET['products_id']);
?>
</h2>
  </div>
</div>
<!--eof products price top card-->
<?php } ?>
<!--eof Product Price block above Attributes -->

<div id="productMusicInfo-productAttributes" class="productAttributes">

<?php
/**
 * display the product atributes
 */
  require($template->get_template_dir('/tpl_modules_attributes.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_attributes.php'); ?>
</div>

<?php
  }
?>
<!--eof Attributes Module -->

<!--bof free ship icon  -->
<?php if(zen_get_product_is_always_free_shipping($products_id_current) && $flag_show_product_info_free_shipping) { ?>
<div id="productMusicInfo-productFreeShippingIcon" class="productFreeShippingIcon text-center m-3"><?php echo TEXT_PRODUCT_FREE_SHIPPING_ICON; ?></div>
<?php } ?>
<!--eof free ship icon  -->

<!--bof Quantity Discounts table -->
<?php
  if ($products_discount_type != 0) { ?>
<div id="productMusicInfo-productQuantityDiscounts" class="productQuantityDiscounts">
<?php
/**
 * display the products quantity discount
 */
 require($template->get_template_dir('/tpl_modules_products_quantity_discounts.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_products_quantity_discounts.php'); ?>
</div>
<?php
  }
?>
<!--eof Quantity Discounts table -->

<!--bof Product Price block -->
<?php if (zen_get_products_display_price((int)$_GET['products_id']) > '0') { ?>
<!--bof products price bottom card-->
<div id="productsPriceBottom-card" class="card mb-3">
  <div id="productsPriceBottom-card-body" class="card-body p-3">
<h2 id="productsPriceBottom-productPriceBottomPrice" class="productPriceBottomPrice">
  <?php  
// base price
  if ($show_onetime_charges_description == 'true') {
    $one_time = TEXT_ONETIME_CHARGE_SYMBOL . TEXT_ONETIME_CHARGE_DESCRIPTION;
  } else {
    $one_time = '';
  }
  ?>

<?php
  echo $one_time . ((zen_has_product_attributes_values((int)$_GET['products_id']) and $flag_show_product_info_starting_at == 1) ? TEXT_BASE_PRICE : '') . zen_get_products_display_price((int)$_GET['products_id']);
?>
</h2>
  </div>
</div>
<!--eof products price bottom card-->
<?php } ?>
<!--eof Product Price block -->

<!--bof Add to Cart Box -->
<?php
if (CUSTOMERS_APPROVAL == 3 and TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE_SHOWROOM == '') {
  // do nothing
} else {
?>
            <?php
    $display_qty = (($flag_show_product_info_in_cart_qty == 1 and $_SESSION['cart']->in_cart($_GET['products_id'])) ? '<p>' . PRODUCTS_ORDER_QTY_TEXT_IN_CART . $_SESSION['cart']->get_quantity($_GET['products_id']) . '</p>' : '');
            if ($products_qty_box_status == 0 or $products_quantity_order_max== 1) {
              // hide the quantity box and default to 1
              $the_button = '<input type="hidden" name="cart_quantity" value="1" />' . zen_draw_hidden_field('products_id', (int)$_GET['products_id']) . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT);
            } else {
              // show the quantity box
    $the_button = '<div class="input-group mb-3">';
    $the_button .= '<input class="form-control" type="text" name="cart_quantity" value="' . $products_get_buy_now_qty . '" />';
    $the_button .= '<div class="input-group-append">';

    
    if (zen_get_products_quantity_min_units_display((int)$_GET['products_id']) > '0') {
    $the_button .= '<div class="input-group-text">';
    $the_button .= zen_get_products_quantity_min_units_display((int)$_GET['products_id']);
    $the_button .= '</div>'; 
    }
    
    $the_button .= zen_draw_hidden_field('products_id', (int)$_GET['products_id']) . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT);
    $the_button .= '</div>';   
    $the_button .= '</div>';   
    
            }
    $display_button = zen_get_buy_now_button($_GET['products_id'], $the_button);
  ?>
  <?php if ($display_qty != '' or $display_button != '') { ?>
<!--bof add to cart card--> 
<div id="addToCart-card" class="card mb-3">
  <div id="addToCart-card-header" class="card-header"><?php echo PRODUCTS_ORDER_QTY_TEXT; ?></div>
  <div id="addToCart-card-body" class="card-body text-center">
    <?php
    
      echo $display_qty;
      echo $display_button;
            ?>
  </div>
</div>
<!--eof add to cart card--> 
  <?php } // display qty and button ?>
<?php } // CUSTOMERS_APPROVAL == 3 ?>
<!--eof Add to Cart Box-->

  </div>
</div>

<div id="productMusicInfo-moduledDisplayRow" class="row">
    <?php if (PRODUCT_INFO_SHOW_NOTIFICATIONS_BOX == '1') { ?>
<!--bof Products Notification Module-->
   <div id="productMusicInfo-moduleDisplayColLeft" class="col-sm">
<?php include(DIR_WS_MODULES . zen_get_module_directory('centerboxes/product_notifications.php')); ?>
</div>
<!--eof Products Notification Module-->
<?php } ?>

<?php if (PRODUCT_INFO_SHOW_MANUFACTURER_BOX == '1') { ?>
<!--bof Products Manufacturer Info Module-->
  <div id="productMusicInfo-moduleDisplayColRight" class="col-sm">
<?php include(DIR_WS_MODULES . zen_get_module_directory('centerboxes/manufacturer_info.php')); ?>
</div>
<!--eof Products Manufacturer Info Module-->
<?php } ?>
</div>

<!--bof Product date added/available-->

<?php
  if ($products_date_available > date('Y-m-d H:i:s')) {
    if ($flag_show_product_info_date_available == 1) {
?>
<p id="productMusicInfo-productDateAvailable" class="productDateAvailable text-center">
      <?php echo sprintf(TEXT_DATE_AVAILABLE, zen_date_long($products_date_available)); ?>
</p>
<?php
    }
  } else {
    if ($flag_show_product_info_date_added == 1) {
?>
<p id="productMusicInfo-productDateAdded" class="productDateAdded text-center">
    <?php echo sprintf(TEXT_DATE_ADDED, zen_date_long($products_date_added)); ?>
</p>
<?php
    } // $flag_show_product_info_date_added
  }
?>
<!--eof Product date added/available -->

<!--bof Product URL -->
<?php
  if (zen_not_null($products_url)) {
    if ($flag_show_product_info_url == 1) {
?>
<p id="productMusicInfo-productUrl" class="productUrl text-center">
        <?php echo sprintf(TEXT_MORE_INFORMATION, zen_href_link(FILENAME_REDIRECT, 'action=product&products_id=' . zen_output_string_protected($_GET['products_id']), 'NONSSL', true, false)); ?>
</p>
<?php
    } // $flag_show_product_info_url
  }
?>
<!--eof Product URL -->

<!--bof also purchased products module-->

<?php require($template->get_template_dir('tpl_modules_also_purchased_products.php', DIR_WS_TEMPLATE, $current_page_base,'centerboxes'). '/' . 'tpl_modules_also_purchased_products.php');?>

<!--eof also purchased products module-->

<!--bof Prev/Next bottom position -->
<?php if (PRODUCT_INFO_PREVIOUS_NEXT == 2 or PRODUCT_INFO_PREVIOUS_NEXT == 3) { ?>
<div id="productMusicInfo-productPrevNextBottom" class="productPrevNextBottom">
<?php
/**
 * display the product previous/next helper
 */
 require($template->get_template_dir('/tpl_products_next_previous.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_products_next_previous.php'); ?>
</div>
<?php } ?>
<!--eof Prev/Next bottom position -->

<!--bof Form close-->
    <?php echo '</form>'; ?>
<!--bof Form close-->
</div>


