<?php
// -----
// product_reviews_info: Slight modification of the formatting of the 'products_model', if the ZCA Bootstrap template
// is installed and active.
//
if (function_exists('zca_bootstrap_active') && zca_bootstrap_active()) {
    if ($review_info->fields['products_model'] != '') {
        $products_model = $review_info->fields['products_model'];
    } else {
        $products_model = '';
    }
}
