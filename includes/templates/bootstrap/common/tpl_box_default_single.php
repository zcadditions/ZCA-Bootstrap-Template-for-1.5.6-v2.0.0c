<?php
/**
 * Common Template - tpl_box_default_single.php
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_box_default_single.php 2975 2006-02-05 19:33:51Z birdbrain $
 */

// choose box images based on box position
  if ($title_link) {
    $title = '<a href="' . zen_href_link($title_link) . '">' . $title . BOX_HEADING_LINKS . '</a>';
  }
//
?>
<!--// bof: <?php echo $box_id; ?> //-->
<div id="<?php echo str_replace('_', '-', $box_id ) . '-singleBoxCard'; ?>" class="singleBoxCard card mb-3">
    

<h4 id="<?php echo str_replace('_', '-', $box_id) . '-singleBoxHeading'; ?>" class="singleBoxHeading card-header"><?php echo $title; ?></h4>

<?php echo $content; ?>

</div>
<!--// eof: <?php echo $box_id; ?> //-->

