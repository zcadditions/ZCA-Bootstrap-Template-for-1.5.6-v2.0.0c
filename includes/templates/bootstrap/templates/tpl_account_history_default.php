<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Loaded automatically by index.php?main_page=account_history.<br />
 * Displays all customers previous orders
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Sat Jan 9 13:13:41 2016 -0500 Modified in v1.5.5 $
 */
?>
<div id="accountHistoryDefault" class="centerColumn">

<h1 id="accountHistoryDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php
  if ($accountHasHistory === true) {
    foreach ($accountHistory as $history) {
?>
<!--bof order history card-->
<div id="order<?php echo $history['orders_id']; ?>-card" class="card mb-3">
<h4 id="order<?php echo $history['orders_id']; ?>-card-header" class="card-header"><?php echo TEXT_ORDER_NUMBER . $history['orders_id']; ?></h4>
<div id="order<?php echo $history['orders_id']; ?>-card-body" class="card-body p-3">

<div class="row">
    <div class="col-sm text-right">
<?php echo TEXT_ORDER_STATUS . $history['orders_status_name']; ?>    
    </div>
</div>

<div class="row">
    <div class="col-sm">
<?php echo '<strong>' . TEXT_ORDER_DATE . '</strong> ' . zen_date_long($history['date_purchased']); ?>
    </div>
    <div class="col-sm">
<?php echo '<strong>' . TEXT_ORDER_PRODUCTS . '</strong> ' . $history['product_count']; ?>
    </div>
</div>    

<div class="row">
    <div class="col-sm">
<?php echo '<strong>' . $history['order_type'] . '</strong> ' . zen_output_string_protected($history['order_name']); ?> 
    </div>
    <div class="col-sm">
<?php echo '<strong>' . TEXT_ORDER_COST . '</strong> ' . strip_tags($history['order_total']); ?> 
    </div>
</div>  

<div id="order<?php echo $history['orders_id']; ?>-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo '<a href="' . zen_href_link(FILENAME_ACCOUNT_HISTORY_INFO, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . 'order_id=' . $history['orders_id'], 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_VIEW_SMALL, BUTTON_VIEW_SMALL_ALT) . '</a>'; ?>
</div>

    
</div>
</div>
<!--eof order history card-->
<?php
    }
?>

<div id="accountHistoryDefault-bottomRow" class="row">
<div id="accountHistoryDefault-bottomNumber" class="bottomNumber col-sm"><?php echo $history_split->display_count(TEXT_DISPLAY_NUMBER_OF_ORDERS); ?>
</div>
<div id="accountHistoryDefault-bottomLinks" class="bottomLinks col-sm"><?php echo TEXT_RESULT_PAGE . $history_split->display_links($max_display_page_links, zen_get_all_get_params(array('page', 'info', 'x', 'y', 'main_page')), $paginateAsUL); ?></div>
</div>


<?php
  } else {
?>
<div id="noAccountHistoryDefault" class="centerColumn">
    <div id="noAccountHistoryDefault-content" class="content">
<?php echo TEXT_NO_PURCHASES; ?>
    </div>
</div>
<?php
  }
?>

<div id="accountHistoryDefault-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
    <?php echo '<a href="' . zen_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?>
</div>


</div>