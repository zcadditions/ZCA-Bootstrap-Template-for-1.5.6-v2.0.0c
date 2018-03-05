<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_product_reviews_info_default.php 2993 2006-02-08 07:14:52Z birdbrain $
 */
?>
<div id="productReviewsDefault" class="centerColumn">

<!--bof Product Name-->
<h1 id="productReviewsDefault-productName" class="productName"><?php echo $products_name; ?></h1>
<!--eof Product Name-->

  <div class="row">
    <div class="col-sm">
        
<!--bof Main Product Image -->
<?php
  if (zen_not_null($products_image)) {
   	/**
     * require the image display code
     */
?>  
<div id="productReviewsDefault-productMainImage" class="productMainImage text-center">
<?php require($template->get_template_dir('/tpl_modules_main_product_image.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_main_product_image.php'); ?>
</div>
<?php
        }
?>
<!--eof Main Product Image-->

<!--bof Product details list  -->
<ul id="productReviewsDefault-productDetailsList" class="productDetailsList list-group mb-3">
<li class="list-group-item"><?php echo TEXT_PRODUCT_MODEL . $products_model; ?></li>
</ul>
<!--eof Product details list -->

    </div>
    <div class="col-sm">
<!--bof products price card-->
<div id="productsPriceTop-card" class="card mb-3">
  <div id="productsPriceTop-card-body" class="card-body p-3">
<h2 id="productsPriceTop-productPriceTopPrice" class="productPriceTopPrice">
<?php echo $products_price; ?>
</h2>
  </div>
</div>
<!--eof products price card-->

<!--bof product links card-->      
<div id="productLinks-card" class="card mb-3">
<div id="productLinks-card-body" class="card-body">
<?php
        // more info in place of buy now
        if (zen_has_product_attributes($review->fields['products_id'] )) {
          //   $link = '<p>' . '<a href="' . zen_href_link(zen_get_info_page($review->fields['products_id']), 'products_id=' . $review->fields['products_id'] ) . '">' . MORE_INFO_TEXT . '</a>' . '</p>';
          $link = '';
        } else {
          $link= '<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action', 'reviews_id')) . 'action=buy_now') . '">' . zen_image_button(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT) . '</a>';
        }
        $the_button = $link;
        $products_link = '';
        echo zen_get_buy_now_button($review->fields['products_id'], $the_button, $products_link) . '<br />' . zen_get_products_quantity_min_units_display($review->fields['products_id']);
      ?>

<div class="p-1"></div>

<?php echo '<a href="' . zen_href_link(zen_get_info_page($_GET['products_id']), zen_get_all_get_params(array('reviews_id'))) . '">' . zen_image_button(BUTTON_IMAGE_GOTO_PROD_DETAILS , BUTTON_GOTO_PROD_DETAILS_ALT) . '</a>'; ?>

<div class="p-1"></div>

<?php echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, zen_get_all_get_params(array('reviews_id'))) . '">' . zen_image_button(BUTTON_IMAGE_WRITE_REVIEW, BUTTON_WRITE_REVIEW_ALT) . '</a>'; ?>

</div>
</div>
<!--eof product links card--> 

    </div>
  </div>

<?php
  if ($reviews_split->number_of_rows > 0) {
    if ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3')) {
?>

<div id="productReviewsDefault-topRow" class="row mb-3">
<div id="productReviewsDefault-topNumber" class="topNumber col-sm"><?php echo $reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS); ?></div>

<div id="productReviewsDefault-topLinks" class="topLinks col-sm"><?php echo TEXT_RESULT_PAGE . $reviews_split->display_links($max_display_page_links, zen_get_all_get_params(array('page', 'info', 'main_page')), $paginateAsUL); ?></div>
</div>

<?php
    }
    foreach ($reviewsArray as $reviews) {
?>

<!--bof products review card-->
<div id="productsReview<?php echo $reviews['id']; ?>-card" class="card mb-3">
  <div id="productsReview<?php echo $reviews['id']; ?>-card-header" class="card-header">
<?php echo sprintf(TEXT_REVIEW_DATE_ADDED, zen_date_short($reviews['dateAdded'])); ?>
  </div>
  <div id="productsReview<?php echo $reviews['id']; ?>-card-body"class="card-body">
<div id="productsReview<?php echo $reviews['id']; ?>-rating" class="rating text-center"> 
<h3 class="rating"><?php echo zen_image(DIR_WS_TEMPLATE_IMAGES . 'stars_' . $reviews['reviewsRating'] . '.gif', sprintf(TEXT_OF_5_STARS, $reviews['reviewsRating'])), sprintf(TEXT_OF_5_STARS, $reviews['reviewsRating']); ?></h3>     
  </div>      
    <blockquote class="blockquote mb-3">
<div id="productsReview<?php echo $reviews['id']; ?>-content" class="content"><?php echo zen_break_string(zen_output_string_protected(stripslashes($reviews['reviewsText'])), 60, '-<br />') . ((strlen($reviews['reviewsText']) >= 100) ? '...' : ''); ?></div>
      <footer class="blockquote-footer"><cite title="Source Title"><?php echo sprintf(TEXT_REVIEW_BY, zen_output_string_protected($reviews['customersName'])); ?></cite></footer>
    </blockquote>

<div id="productsReview<?php echo $reviews['id']; ?>-readReviews" class="float-right"> 
<?php echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . (int)$_GET['products_id'] . '&reviews_id=' . $reviews['id']) . '">' . zen_image_button(BUTTON_IMAGE_READ_REVIEWS , BUTTON_READ_REVIEWS_ALT) . '</a>'; ?>    
</div>  
  </div>
</div>
<!--eof products review card-->
<?php
    }
?>
<?php
  } else {
?>

<div id="productReviewsDefault-content" class="content">
<?php echo TEXT_NO_REVIEWS . (REVIEWS_APPROVAL == '1' ? '<br />' . TEXT_APPROVAL_REQUIRED: ''); ?>
</div>

<?php
  }

  if (($reviews_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>

<div id="productReviewsDefault-bottomRow" class="row">
<div id="productReviewsDefault-bottomNumber" class="bottomNumber col-sm"><?php echo $reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS); ?>
</div>
<div id="productReviewsDefault-bottomLinks" class="bottomLinks col-sm"><?php echo TEXT_RESULT_PAGE . $reviews_split->display_links($max_display_page_links, zen_get_all_get_params(array('page', 'info', 'main_page')), $paginateAsUL); ?></div>
</div>

<?php
  }
?>

</div>

