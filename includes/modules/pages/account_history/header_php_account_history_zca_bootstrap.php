<?php
// -----
// account_history: Use the template-specific splitPageResults formatting, if the ZCA Bootstrap template is installed and active.
//
if (zca_bootstrap_active() && $accountHasHistory) {
    $history_split = new zca_splitPageResults($history_query_raw, MAX_DISPLAY_ORDER_HISTORY);
    $history = $db->Execute($history_split->sql_query);

    $accountHistory = array();
    while (!$history->EOF) {
        $products_query = "SELECT count(*) AS count
                           FROM   " . TABLE_ORDERS_PRODUCTS . "
                           WHERE  orders_id = :ordersID";

        $products_query = $db->bindVars($products_query, ':ordersID', $history->fields['orders_id'], 'integer');
        $products = $db->Execute($products_query);

        if (zen_not_null($history->fields['delivery_name'])) {
            $order_type = TEXT_ORDER_SHIPPED_TO;
            $order_name = $history->fields['delivery_name'];
        } else {
            $order_type = TEXT_ORDER_BILLED_TO;
            $order_name = $history->fields['billing_name'];
        }
        $extras = array(
            'order_type' => $order_type,
            'order_name' => $order_name,
        '   product_count' => $products->fields['count']
        );
        $accountHistory[] = array_merge($history->fields, $extras);
        $history->moveNext();
    }
}
