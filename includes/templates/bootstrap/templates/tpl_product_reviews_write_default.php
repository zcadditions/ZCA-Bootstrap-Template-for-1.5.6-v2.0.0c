<?php
/**
 * Page Template
 *
 * BOOTSTRAP v3.0.0
 *
 * @copyright Copyright 2003-2020 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2019 Jul 15 Modified in v1.5.7 $
 */
?>
<div id="productReviewsWriteDefault" class="centerColumn">
    
<?php echo zen_draw_form('product_reviews_write', zen_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, 'action=process&products_id=' . $_GET['products_id'], 'SSL'), 'post', 'onsubmit="return checkForm(product_reviews_write);"'); ?>

<!--bof Product Name-->
<h1 id="productReviewsWriteDefault-productName" class="productName"><?php echo $products_name; ?></h1>
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
<div id="productReviewsWriteDefault-productMainImage" class="productMainImage text-center">
<?php require($template->get_template_dir('/tpl_modules_main_product_image.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_main_product_image.php'); ?>
</div>
<?php
        }
?>
<!--eof Main Product Image-->

<?php
if (!empty($products_model)) {
?>
<!--bof Product details list  -->
<ul id="productReviewsWriteDefault-productDetailsList" class="productDetailsList list-group mb-3">
<li class="list-group-item"><?php echo TEXT_PRODUCT_MODEL . $products_model; ?></li>
</ul>
<!--eof Product details list -->
<?php
}
?>
    </div>
    <div class="col-sm">
<!--bof Product Price block -->
<div id="productsPriceTop-card" class="card mb-3">
  <div id="productsPriceTop-card-body" class="card-body p-3">
<h2 id="productsPriceTop-productPriceTopPrice" class="productPriceTopPrice">
<?php echo $products_price; ?>
</h2>
  </div>
</div>
<!--eof Product Price block -->

<!--bof product links card-->
<div id="productLinks-card" class="card mb-3">
<div id="productLinks-card-body" class="card-body">

<?php echo '<a href="' . zen_href_link(zen_get_info_page($_GET['products_id']), zen_get_all_get_params()) . '">' . zen_image_button(BUTTON_IMAGE_GOTO_PROD_DETAILS , BUTTON_GOTO_PROD_DETAILS_ALT) . '</a>'; ?>

<div class="p-1"></div>

<?php echo '<a href="' . zen_href_link(FILENAME_REVIEWS) . '">' . zen_image_button(BUTTON_IMAGE_REVIEWS, BUTTON_REVIEWS_ALT) . '</a>'; ?>

</div>
</div>
<!--eof product links card-->
    </div>
  </div>

<!--bof products review write card-->
<div id="productsReviewWrite-card" class="card">
  <div id="productsReviewWrite-card-header" class="card-header">
<?php echo SUB_TITLE_FROM, zen_output_string_protected($customer->fields['customers_firstname'] . ' ' . $customer->fields['customers_lastname']); ?>
  </div>
  <div id="productsReviewWrite-card-body" class="card-body">
<?php if ($messageStack->size('review_text') > 0) echo $messageStack->output('review_text'); ?>      
     
<div class="text-center p-3"><?php echo SUB_TITLE_RATING; ?></div>      

<div class="custom-control custom-radio custom-control-inline">
<?php echo zen_draw_radio_field('rating', '1', '', 'id="rating-1" class="custom-control-input"'); ?>
<?php echo '<label class="custom-control-label" for="rating-1">' . zen_image($template->get_template_dir(OTHER_IMAGE_REVIEWS_RATING_STARS_ONE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . OTHER_IMAGE_REVIEWS_RATING_STARS_ONE, OTHER_REVIEWS_RATING_STARS_ONE_ALT) . '</label> '; ?>
</div>
<div class="custom-control custom-radio custom-control-inline">
<?php echo zen_draw_radio_field('rating', '2', '', 'id="rating-2" class="custom-control-input"'); ?>
<?php echo '<label class="custom-control-label" for="rating-2">' . zen_image($template->get_template_dir(OTHER_IMAGE_REVIEWS_RATING_STARS_TWO, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . OTHER_IMAGE_REVIEWS_RATING_STARS_TWO, OTHER_REVIEWS_RATING_STARS_TWO_ALT) . '</label>'; ?>
</div>
<div class="custom-control custom-radio custom-control-inline">
<?php echo zen_draw_radio_field('rating', '3', '', 'id="rating-3" class="custom-control-input"'); ?>
<?php echo '<label class="custom-control-label" for="rating-3">' . zen_image($template->get_template_dir(OTHER_IMAGE_REVIEWS_RATING_STARS_THREE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . OTHER_IMAGE_REVIEWS_RATING_STARS_THREE, OTHER_REVIEWS_RATING_STARS_THREE_ALT) . '</label>'; ?>
</div>
<div class="custom-control custom-radio custom-control-inline">
<?php echo zen_draw_radio_field('rating', '4', '', 'id="rating-4" class="custom-control-input"'); ?>
<?php echo '<label class="custom-control-label" for="rating-4">' . zen_image($template->get_template_dir(OTHER_IMAGE_REVIEWS_RATING_STARS_FOUR, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . OTHER_IMAGE_REVIEWS_RATING_STARS_FOUR, OTHER_REVIEWS_RATING_STARS_FOUR_ALT) . '</label>'; ?>
</div>
<div class="custom-control custom-radio custom-control-inline">
<?php echo zen_draw_radio_field('rating', '5', '', 'id="rating-5" class="custom-control-input"'); ?>
<?php echo '<label class="custom-control-label" for="rating-5">' . zen_image($template->get_template_dir(OTHER_IMAGE_REVIEWS_RATING_STARS_FIVE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . OTHER_IMAGE_REVIEWS_RATING_STARS_FIVE, OTHER_REVIEWS_RATING_STARS_FIVE_ALT) . '</label>'; ?>
</div>

<label id="textArea-label" for="review-text"><?php echo SUB_TITLE_REVIEW; ?></label>

<?php echo zen_draw_textarea_field('review_text', 60, 5, '', 'id="review-text"'); ?>
<?php echo zen_draw_input_field($antiSpamFieldName, '', ' size="60" id="RAS" style="visibility:hidden; display:none;" autocomplete="off"'); ?>

<div id="productsReviewWrite-reviewsWriteNotice"><?php echo TEXT_NO_HTML . (REVIEWS_APPROVAL == '1' ? '<br />' . TEXT_APPROVAL_REQUIRED: ''); ?></div>

<div id="productsReviewWrite-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo zen_image_submit(BUTTON_IMAGE_SUBMIT, BUTTON_SUBMIT_ALT); ?>
</div>

  </div>
</div>
<!--eof products review write card-->
</form>
</div>

