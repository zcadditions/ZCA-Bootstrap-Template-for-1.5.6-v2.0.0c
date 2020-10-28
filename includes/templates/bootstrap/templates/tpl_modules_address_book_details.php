<?php
/**
 * Module Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Displays address-book details/selection
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: rbarbour zcadditions.com Fri Feb 26 00:03:33 2016 -0500 Modified in v1.5.5 $
 */
?>
<!--bof address details card-->
<div id="addressDetails-card" class="card mb-3">
    <h4 id="addressDetails-card-header" class="card-header"><?php echo HEADING_TITLE; ?></h4>
    <div id="addressDetails-card-body" class="card-body p-3">
    <?php require $template->get_template_dir('tpl_modules_common_address_format.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_common_address_format.php'; ?>
    </div>
</div>
<!--eof address details card-->
