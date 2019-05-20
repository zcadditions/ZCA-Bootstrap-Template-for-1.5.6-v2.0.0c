<?php
/**
 * Module Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_specials_default.php 2935 2006-02-01 11:12:40Z birdbrain $
 */
  $zc_show_special_products = false;
  include(DIR_WS_MODULES . zen_get_module_directory('centerboxes/' . FILENAME_SPECIALS_INDEX));
?>

<!-- bof: specials -->
<?php if ($zc_show_special_products == true) { ?>

<div class="card mb-3">
  
<?php
  if ($title) {
  ?>

<?php echo $title; ?>

<?php
 }
 ?>
<div id="specialsCenterbox-card-body" class="card-body text-center">
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

<?php } ?>
<!-- eof: specials -->
