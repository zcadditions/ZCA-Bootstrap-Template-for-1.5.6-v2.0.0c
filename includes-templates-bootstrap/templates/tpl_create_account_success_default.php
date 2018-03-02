<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Loaded automatically by index.php?main_page=create-account_success.<br />
 * Displays confirmation that a new account has been created.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_create_account_success_default.php 4886 2006-11-05 09:01:18Z drbyte $
 */
?>
<div id="createAccountSuccessDefault" class="centerColumn">
    
<h1 id="createAccountSuccessDefault-heading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<div id="createAccountSuccessDefault-content" class="content"><?php echo TEXT_ACCOUNT_CREATED; ?></div>

<!--bof address details card-->
<div id="addressDetails-card" class="card mb-3">
<h2 id="addressDetails-card-header" class="card-header"><?php echo PRIMARY_ADDRESS_TITLE; ?></h2>

<div id="addressDetails-card-body" class="card-body p-3">
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

<div class="btn-toolbar justify-content-between my-3" role="toolbar">
<?php echo '<a href="' . zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'delete=' . $addresses['address_book_id'], 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_DELETE, BUTTON_DELETE_ALT) . '</a>'; ?>
<?php echo '<a href="' . zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'edit=' . $addresses['address_book_id'], 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_EDIT_SMALL, BUTTON_EDIT_SMALL_ALT) . '</a>'; ?>
</div>

</div>
</div>
<!--eof address book single entry card-->
<?php
  }
?>
</div>
</div>
<!--bof address details card-->


<div id="createAccountSuccessDefault-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar">
<?php echo '<a href="' . $origin_href . '">' . zen_image_button(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT) . '</a>'; ?>
</div>


</div>
