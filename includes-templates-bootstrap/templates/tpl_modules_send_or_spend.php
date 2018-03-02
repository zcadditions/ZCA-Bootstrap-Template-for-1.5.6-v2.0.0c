<?php
/**
 * Module Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Template stub used to display Gift Certificates box
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_send_or_spend.php 2987 2006-02-07 22:30:30Z drbyte $
 */

  include(DIR_WS_MODULES . zen_get_module_directory('send_or_spend.php'));
?>
<!--bof send or spend card-->
<div id="sendOrSpend-card" class="card mb-3">
<h4 id="sendOrSpend-card-header" class="card-header">
<?php echo BOX_HEADING_GIFT_VOUCHER; ?>    
</h4>
  <div id="sendOrSpend-card-body" class="card-body p-3">
<p id="paragraph" class="content">
<?php echo TEXT_SEND_OR_SPEND; ?>  
</p>
<p id="paragraph-one" class="content">
<?php echo  TEXT_BALANCE_IS . $customer_gv_balance; ?> 
</p>

<div id="sendOrSpend-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo '<a href="' . zen_href_link(FILENAME_GV_SEND, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_SEND_A_GIFT_CERT , BUTTON_SEND_A_GIFT_CERT_ALT) . '</a>'; ?>
</div>
  </div>
</div>
<!--eof send or spend card-->