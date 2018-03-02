<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Sat Jan 9 13:13:41 2016 -0500 Modified in v1.5.5 $
 */
?>
<div id="specialsDefault" class="centerColumn">

<h1 id="specialsDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php
  if (($specials_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>

<div id="specialsDefault-topRow" class="row">
<div id="specialsDefault-topNumber" class="topNumber col-sm"><?php echo $specials_split->display_count(TEXT_DISPLAY_NUMBER_OF_SPECIALS); ?></div>

<div id="specialsDefault-topLinks" class="topLinks col-sm"><?php echo TEXT_RESULT_PAGE . $specials_split->display_links($max_display_page_links, zen_get_all_get_params(array('page', 'info', 'x', 'y', 'main_page')), $paginateAsUL); ?></div>
</div>

<?php
  } // split page
?>
<!-- bof: specials -->
<?php
/**
 * require the list_box_content template to display the products
 */
  require($template->get_template_dir('tpl_columnar_display.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_columnar_display.php');
?>
<!-- eof: specials -->
<?php
  if (($specials_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>

<div id="specialsDefault-bottomRow" class="row">
<div id="specialsDefault-bottomNumber" class="bottomNumber col-sm"><?php echo $specials_split->display_count(TEXT_DISPLAY_NUMBER_OF_SPECIALS); ?></div>
<div  id="specialsListing-bottomLinks" class="bottomLinks col-sm"><?php echo TEXT_RESULT_PAGE . $specials_split->display_links($max_display_page_links, zen_get_all_get_params(array('page', 'info', 'x', 'y', 'main_page')), $paginateAsUL); ?></div>
</div>

<?php
  } // split page
?>
</div>