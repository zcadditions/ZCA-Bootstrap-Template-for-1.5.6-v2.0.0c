<?php
// -----
// product_reviews_write: Slight modification of the formatting of the 'products_model', if the ZCA Bootstrap template
// is installed and active.
//
if (zca_bootstrap_active()) {
    if ($product_info->fields['products_model'] != '') {
        $products_model = $product_info->fields['products_model'];
    } else {
        $products_model = '';
    }
}
