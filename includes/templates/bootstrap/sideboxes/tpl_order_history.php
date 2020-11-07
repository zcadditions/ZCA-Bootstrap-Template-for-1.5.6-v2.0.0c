<?php
/**
 * Side Box Template
 *
 * BOOTSTRAP v3.0.0
 *
 * @copyright Copyright 2003-2020 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2020 Jun 19 Modified in v1.5.7 $
 */
$content = "";
$content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">' . "\n";


$content .= '<ul class="list-group list-group-flush">';
foreach ($customer_orders as $row) {
    $content .= '<li class="list-group-item d-flex justify-content-between align-items-center">';
    $content .= '<a href="' . zen_href_link(zen_get_info_page($row['id']), 'products_id=' . $row['id']) . '">' . $row['name'] . '</a>';
    $content .= '&nbsp;&nbsp;';
    $content .= '<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=cust_order&pid=' . $row['id']) . '"><i class="fas fa-cart-plus"></i></a>';
    $content .= '</li>' . "\n" ;
}
$content .= '</ul>' . "\n" ;
$content .= '</div>';
