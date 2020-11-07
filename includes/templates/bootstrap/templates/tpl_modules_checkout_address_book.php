<?php
/**
 * tpl_modules_checkout_address_book.php
 * 
 * BOOTSTRAP v3.0.0
 *
 * @package templateSystem
 * @copyright Copyright 2003-2009 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_checkout_address_book.php 13799 2009-07-08 02:08:33Z drbyte $
 */
?>
<?php
/**
 * require code to get address book details
 */
require DIR_WS_MODULES . zen_get_module_directory('checkout_address_book.php');
while (!$addresses->EOF) {
    if ($addresses->fields['address_book_id'] == $_SESSION['sendto']) {
        $primary_border = ' border-primary';
        $primary_background = ' bg-primary text-white';
        $primary_address = BOOTSTRAP_CURRENT_ADDRESS;
    } else {
        $primary_border = '';
        $primary_background = '';
        $primary_address = '';
    }
?>
<!--bof address book single entries card-->
<div id="addressBookSingleEntryId<?php echo $addresses->fields['address_book_id']; ?>-card" class="card mb-3 <?php echo $primary_border ; ?>">
    <h4 id="addressBookSingleEntryId<?php echo $addresses->fields['address_book_id']; ?>-card-header" class="card-header <?php echo $primary_background ; ?>">
        <div class="custom-control custom-radio custom-control-inline">
            <?php echo zen_draw_radio_field('address', $addresses->fields['address_book_id'], '', 'id="name-' . $addresses->fields['address_book_id'] . '"'); ?>

            <label for="name-<?php echo $addresses->fields['address_book_id']; ?>" class="custom-control-label"><?php echo zen_output_string_protected($addresses->fields['firstname'] . ' ' . $addresses->fields['lastname']); ?><?php echo $primary_address ; ?></label>
        </div>
    </h4>
    <div id="addressBookSingleEntryId<?php echo $addresses->fields['address_book_id']; ?>-card-body" class="card-body p-3">
        <address><?php echo zen_address_format(zen_get_address_format_id($addresses->fields['country_id']), $addresses->fields, true, ' ', '<br />'); ?></address>
    </div>
</div>
<!--eof address book single entry card-->
<?php
    $addresses->MoveNext();
}
