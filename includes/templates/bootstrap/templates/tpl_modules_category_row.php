<?php
/**
 * index category_row.php
 *
 * Prepares the content for displaying a category's sub-category listing in grid format.  
 * Once the data is prepared, it calls the standard tpl_list_box_content template for display.
 *
 * @package page
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_category_row.php 2986 2006-02-07 22:27:29Z drbyte $
 */
require(DIR_WS_MODULES . zen_get_module_directory('category_row.php')); ?>

<div class="card mb-3">
  
<div id="subCategory-card-body" class="card-body text-center">
<?php
if (is_array($list_box_contents) > 0 ) {
 for($row=0, $n=sizeof($list_box_contents); $row<$n; $row++) {
    $params = "";
    //if (isset($list_box_contents[$row]['params'])) $params .= ' ' . $list_box_contents[$row]['params'];
?>

<div class="card-deck text-center">
<?php
    for($col=0, $j=sizeof($list_box_contents[$row]); $col<$j; $col++) {
      $r_params = "";
      if (isset($list_box_contents[$row][$col]['params'])) $r_params .= ' ' . (string)$list_box_contents[$row][$col]['params'];
     if (isset($list_box_contents[$row][$col]['text'])) {
?>
    <?php echo '<div' . $r_params . '>' . $list_box_contents[$row][$col]['text'] .  '</div>'; ?>
<?php
      }
    }
?>
</div>


<?php
  }
}
 ?>
</div>
</div>
