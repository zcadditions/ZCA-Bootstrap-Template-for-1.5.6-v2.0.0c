<?php
// -----
// product_reviews: Slight modification of the formatting of the 'products_model' and use of the template-specific
// splitPageResults formatting, if the ZCA Bootstrap template is installed and active.
//
if (zca_bootstrap_active()) {
    if ($review->fields['products_model'] != '') {
        $products_model = $review->fields['products_model'];
    } else {
        $products_model = '';
    }
    
    unset($reviews_split, $reviews, $reviewsArray);
    $reviews_split = new zca_splitPageResults($reviews_query_raw, MAX_DISPLAY_NEW_REVIEWS);
    $reviews = $db->Execute($reviews_split->sql_query);
    $reviewsArray = array();
    while (!$reviews->EOF) {
        $reviewsArray[] = array(
            'id' => $reviews->fields['reviews_id'],
            'customersName' => $reviews->fields['customers_name'],
            'dateAdded' => $reviews->fields['date_added'],
            'reviewsText' => $reviews->fields['reviews_text'],
            'reviewsRating' => $reviews->fields['reviews_rating']
        );
        $reviews->MoveNext();
    }
}
