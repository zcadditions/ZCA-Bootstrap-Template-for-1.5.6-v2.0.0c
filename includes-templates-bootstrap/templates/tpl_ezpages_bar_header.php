<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 * 
 * Displays EZ-Pages Header-Bar content.<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_ezpages_bar_header.php 3377 2006-04-05 04:43:11Z ajeh $
 */

  /**
   * require code to show EZ-Pages list
   */
  include(DIR_WS_MODULES . zen_get_module_directory('ezpages_bar_header.php'));
?>
<?php if (sizeof($var_linksList) >= 1) { ?>
<div id="ezpagesBarHeader" class="ezpagesBar rounded">
<ul class="nav nav-pills">
<?php for ($i=1, $n=sizeof($var_linksList); $i<=$n; $i++) {  ?>
  <li class="nav-item"><a class="nav-link" href="<?php echo $var_linksList[$i]['link']; ?>"><?php echo $var_linksList[$i]['name']; ?></a></li>
<?php } // end FOR loop ?>
</ul>
</div>
<?php } ?>
