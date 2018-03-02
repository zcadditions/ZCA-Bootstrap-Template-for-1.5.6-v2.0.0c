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
 * @version $Id: tpl_modules_order_totals.php 2993 2006-02-08 07:14:52Z birdbrain $
 */
 ?>
<?php 
/**
 * Displays order-totals modules' output
 */
  for ($i=0; $i<$size; $i++) { ?>

    <tr>
<td colspan="2" class="text-right bg-white">
<?php echo $GLOBALS[$class]->output[$i]['title']; ?>
</td>
<td class="text-left bg-white">
<?php echo $GLOBALS[$class]->output[$i]['text']; ?>
</td> 
    </tr>
<?php } ?>