<?php
/**
 * product_notifications sidebox - displays a box inviting the customer to sign up for notifications of updates to current product
 *
 * BOOTSTRAP v3.0.0
 * 
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: product_notifications.php 2993 2006-02-08 07:14:52Z birdbrain $
 */

// test if box should show
$show_product_notifications = false;
if (isset($_GET['products_id']) && zen_products_id_valid($_GET['products_id'])) {
    if (zen_is_logged_in() && !zen_in_guest_checkout()) {
        $check_query = 
            "SELECT customers_info_id
               FROM " . TABLE_CUSTOMERS_INFO . "
              WHERE customers_info_id = " . (int)$_SESSION['customer_id'] . "
                AND global_product_notifications = 1
              LIMIT 1";
        $check = $db->Execute($check_query);

        if (!$check->EOF) {
            $show_product_notifications = true;
        }
    } else {
        $show_product_notifications = true;
    }
}

if ($show_product_notifications) {
    if (isset($_GET['products_id'])) {
        $notification_exists = false;
        if (zen_is_logged_in() && !zen_in_guest_checkout()) {
            $check_query = 
                "SELECT customers_id
                   FROM " . TABLE_PRODUCTS_NOTIFICATIONS . "
                  WHERE products_id = " . (int)$_GET['products_id'] . "
                    AND customers_id = " . (int)$_SESSION['customer_id'] . "
                  LIMIT 1";
            $check = $db->Execute($check_query);

            $notification_exists = !$check->EOF;
        }

        if ($notification_exists) {
            require $template->get_template_dir('tpl_modules_yes_notifications.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_yes_notifications.php';
        } else {
            require $template->get_template_dir('tpl_modules_no_notifications.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_no_notifications.php';
        }
    }
}
