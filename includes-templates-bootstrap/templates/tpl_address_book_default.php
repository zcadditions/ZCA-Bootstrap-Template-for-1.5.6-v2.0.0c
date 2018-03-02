<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Loaded automatically by index.php?main_page=adress_book.<br />
 * Allows customer to manage entries in their address book
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_address_book_default.php 5369 2006-12-23 10:55:52Z drbyte $
 */
?>
<div id="addressBookDefault" class="centerColumn">

<h1 id="addressBookDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>
 
<?php if ($messageStack->size('addressbook') > 0) echo $messageStack->output('addressbook'); ?> 

<!--bof primary address card-->
<div id="primaryAddress-card" class="card mb-3">
<h4 id="primaryAddress-card-header" class="card-header"><?php echo PRIMARY_ADDRESS_TITLE; ?></h4>
<div id="primaryAddress-card-body" class="card-body p-3">
    
<div class="row">
    <div id="primaryAddress-content" class="content col-7">
<?php echo PRIMARY_ADDRESS_DESCRIPTION; ?>
    </div>

    <div id="primaryAddress-defaultAddress" class="defaultAddress col-5">
<address class="bg-success p-3 text-white"><?php echo zen_address_label($_SESSION['customer_id'], $_SESSION['customer_default_address_id'], true, ' ', '<br />'); ?></address>
    </div>
</div>

</div>
</div>
<!--bof primary address card-->

<!--bof address book entries card-->
<div id="addressBookEntries-card" class="card mb-3">
<h4 id="addressBookEntries-card-header" class="card-header"><?php echo ADDRESS_BOOK_TITLE; ?></h4>
<div id="addressBookEntries-card-body" class="card-body p-3">
    
<div class="required-info text-right"><?php echo sprintf(TEXT_MAXIMUM_ENTRIES, MAX_ADDRESS_BOOK_ENTRIES); ?></div>
<?php
/**
 * Used to loop thru and display address book entries
 */
  foreach ($addressArray as $addresses) {
      
if ($addresses['address_book_id'] == $_SESSION['customer_default_address_id']) {
          $primary_border = ' border-primary';
          $primary_background = ' bg-primary text-white';
          $primary_address = PRIMARY_ADDRESS;
} else {
          $primary_border = '';
          $primary_background = '';
          $primary_address = '';
}

?>

<!--bof address book single entries card-->
<div id="addressBookSingleEntryId<?php echo $addresses['address_book_id']; ?>-card" class="card mb-3 <?php echo $primary_border ; ?>">
<h4 id="addressBookSingleEntryId<?php echo $addresses['address_book_id']; ?>-card-header" class="card-header <?php echo $primary_background ; ?>"><?php echo zen_output_string_protected($addresses['firstname'] . ' ' . $addresses['lastname']); ?><?php echo $primary_address ; ?></h4>
<div id="addressBookSingleEntryId<?php echo $addresses['address_book_id']; ?>-card-body" class="card-body p-3">
    
<address><?php echo zen_address_format($addresses['format_id'], $addresses['address'], true, ' ', '<br />'); ?></address>

<div class="btn-toolbar justify-content-between" role="toolbar">
<?php echo '<a href="' . zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'edit=' . $addresses['address_book_id'], 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_EDIT_SMALL, BUTTON_EDIT_SMALL_ALT) . '</a>'; ?>
<?php echo '<a href="' . zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'delete=' . $addresses['address_book_id'], 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_DELETE_SMALL, BUTTON_DELETE_SMALL_ALT) . '</a>'; ?>
</div>

</div>
</div>
<!--eof address book single entry card-->
<?php
  }
?>
</div>
</div>
<!--eof address book entries card-->

<div id="addressBookDefault-btn-toolbar" class="btn-toolbar justify-content-between" role="toolbar">
<?php echo '<a href="' . zen_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?>
<?php
  if (zen_count_customer_address_book_entries() < MAX_ADDRESS_BOOK_ENTRIES) {
?>
   <?php echo '<a href="' . zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_ADD_ADDRESS, BUTTON_ADD_ADDRESS_ALT) . '</a>'; ?>
<?php
  }
?>
</div>
</div>
