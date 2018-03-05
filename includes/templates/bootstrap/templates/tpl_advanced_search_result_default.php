<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Loaded automatically by index.php?main_page=advanced_search_result.<br />
 * Displays results of advanced search
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Sun Dec 13 16:25:20 2015 -0500 Modified in v1.5.5 $
 */
?>
<div id="advancedSearchResultDefault" class="centerColumn">

<h1 id="advancedSearchResultDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>
  

<?php
  if ($do_filter_list || PRODUCT_LIST_ALPHA_SORTER == 'true') {
  $form = zen_draw_form('filter', zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT), 'get');

?>
<?php echo $form; ?>
<?php
/* Redisplay all $_GET variables, except currency */
  echo zen_post_all_get_params('currency');
  echo '<div id="advancedSearchResultDefault-sorterRow" class="row mb-3">';
  require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_PRODUCT_LISTING_ALPHA_SORTER));
     echo '</div>';
?>
</form>
<?php
  }
?>
<?php
/**
 * Used to collate and display products from advanced search results
 */
 require($template->get_template_dir('tpl_modules_product_listing.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_product_listing.php');
?>

</div>