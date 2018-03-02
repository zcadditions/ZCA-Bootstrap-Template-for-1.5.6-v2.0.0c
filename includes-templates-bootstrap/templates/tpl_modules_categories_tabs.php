<?php
/**
 * Module Template - categories_tabs
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Template stub used to display categories-tabs output
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_categories_tabs.php 3395 2006-04-08 21:13:00Z ajeh $
 */

  include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_CATEGORIES_TABS));
?>
<?php if (CATEGORIES_TABS_STATUS == '1' && sizeof($links_list) >= 1) { ?>
<div id="categoriesTabs" class="d-none d-lg-block">
<nav class="nav nav-pills nav-fill" id="navCatTabs">
<?php for ($i=0, $n=sizeof($links_list); $i<$n; $i++) { ?>
  <?php echo $links_list[$i];?>
<?php } ?>
</nav>
</div>
<?php } ?>