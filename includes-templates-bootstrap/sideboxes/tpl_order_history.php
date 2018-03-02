<?php
/**
 * Side Box Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2011 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_order_history.php 18695 2011-05-04 05:24:19Z drbyte $
 */
  $content = "";
  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">' . "\n";

  $content .= '<ul class="list-group list-group-flush">';
  for ($i=1; $i<=sizeof($customer_orders); $i++) {

        
        $content .= '<li class="list-group-item d-flex justify-content-between align-items-center"><a href="' . zen_href_link(zen_get_info_page($customer_orders[$i]['id']), 'products_id=' . $customer_orders[$i]['id']) . '">' . $customer_orders[$i]['name'] . '</a>&nbsp;&nbsp;<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=cust_order&pid=' . $customer_orders[$i]['id']) . '"><i class="fas fa-cart-plus"></i></a></li>' . "\n" ;
        
  }
  $content .= '</ul>';
  $content .= '</div>';
?>