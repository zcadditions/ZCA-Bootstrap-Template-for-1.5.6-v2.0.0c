<?php
/**
 * Module Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Allows entry of new addresses during checkout stages
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: rbarbour zcadditions.com Fri Feb 26 00:03:33 2016 -0500 Modified in v1.5.5 $
 */
?>
<div id="checkoutNewAddress-card" class="card mb-3">
    <h4 id="checkoutNewAddress-card-header" class="card-header"><?php echo TITLE_PLEASE_SELECT; ?></h4>
    <div id="checkoutNewAddress-card-body" class="card-body p-3">
        <?php require $template->get_template_dir('tpl_modules_common_address_format.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_address_book_details.php'; ?>
    </div>
</div>
