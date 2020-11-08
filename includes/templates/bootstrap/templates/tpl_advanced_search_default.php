<?php
/**
 * Page Template
 *
 * BOOTSTRAP v3.0.0
 *
 * Loaded automatically by index.php?main_page=advanced_search.<br />
 * Displays options fields upon which a product search will be run
 *
 * @copyright Copyright 2003-2020 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2020 May 16 Modified in v1.5.7 $
 */
?>
<div id="advancedSearchDefault" class="centerColumn">
    
<?php echo zen_draw_form('advanced_search', zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', $request_type, false), 'get', 'onsubmit="return check_form(this);"') . zen_hide_session_id(); ?>
<?php echo zen_draw_hidden_field('main_page', FILENAME_ADVANCED_SEARCH_RESULT); ?>

<h1 id="addressBookDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE_1; ?></h1>

<div id="advancedSearchDefault-helpLink" class="helpLink float-right p-3">
    <a data-toggle="modal" href="#searchHelpModal"><?php echo TEXT_SEARCH_HELP_LINK; ?></a>

<?php require($template->get_template_dir('tpl_search_help.php',DIR_WS_TEMPLATE, $current_page_base,'modalboxes'). '/tpl_search_help.php'); ?>
</div>

<div class="clearfix"></div>

<?php if ($messageStack->size('search') > 0) echo $messageStack->output('search'); ?>

<!--bof choose your search terms card-->
<div id="searchTerms-card" class="card mb-3
">
  <h4 id="searchTerms-card-header" class="card-header">
<?php echo HEADING_SEARCH_CRITERIA; ?>
  </h4>
  <div id="searchTerms-card-body" class="card-body">
<?php echo zen_draw_input_field('keyword', $sData['keyword'], 'placeholder="' . KEYWORD_FORMAT_STRING . '" autofocus aria-label="' . KEYWORD_FORMAT_STRING . '"'); ?>

<div class="custom-control custom-checkbox mt-3">
<?php echo zen_draw_checkbox_field('search_in_description', '1', $sData['search_in_description'], 'id="search-in-description"') . '<label class="custom-control-label" for="search-in-description">' . TEXT_SEARCH_IN_DESCRIPTION . '</label>'; ?>
</div>
  </div>
</div>
<!--eof choose your search terms card-->

<!--bof limit to category card-->
<div id="limitToCategory-card" class="card mb-3
">
  <h4 id="limitToCategory-card-header" class="card-header">
<?php echo ENTRY_CATEGORIES; ?>
  </h4>
  <div id="limitToCategory-card-body" class="card-body">
<?php echo zen_draw_pull_down_menu('categories_id', zen_get_categories(array(array('id' => '', 'text' => TEXT_ALL_CATEGORIES)), '0' ,'', '1'), $sData['categories_id'], 'id="searchCategoryId" aria-label="' . PLEASE_SELECT . '"'); ?>

<div class="custom-control custom-checkbox mt-3">
<?php echo zen_draw_checkbox_field('inc_subcat', '1', $sData['inc_subcat'], 'id="inc-subcat"'); ?><label class="custom-control-label" for="inc-subcat"><?php echo ENTRY_INCLUDE_SUBCATEGORIES; ?></label>
</div>
  </div>
</div>
<!--eof limit to category card-->

<!--bof limit to manufacturer card-->
<div id="limitToManufacturer-card" class="card mb-3
">
  <h4 id="limitToManufacturer-card-header" class="card-header">
<?php echo ENTRY_MANUFACTURERS; ?>
  </h4>
  <div id="limitToManufacturer-card-body" class="card-body">
    <?php echo zen_draw_pull_down_menu('manufacturers_id', zen_get_manufacturers(array(array('id' => '', 'text' => TEXT_ALL_MANUFACTURERS)), PRODUCTS_MANUFACTURERS_STATUS), $sData['manufacturers_id'], 'id="searchMfgId" aria-label="' . PLEASE_SELECT . '"'); ?>
  </div>
</div>
<!--eof limit to manufacturer card-->

<!--bof search by price range card-->
<div id="priceRange-card" class="card mb-3
">
  <h4 id="priceRange-card-header" class="card-header">
<?php echo ENTRY_PRICE_RANGE; ?>
  </h4>
  <div id="priceRange-card-body" class="card-body">
<label class="inputLabel" for="entryPriceFrom" id="entryPriceFromLabel"><?php echo ENTRY_PRICE_FROM; ?></label>
    <?php echo zen_draw_input_field('pfrom', $sData['pfrom'], 'id="entryPriceFrom"'); ?>
<div class="p-2"></div>
<label class="inputLabel" for="entryPriceTo" id="entryPriceToLabel"><?php echo ENTRY_PRICE_TO; ?></label>
    <?php echo zen_draw_input_field('pto', $sData['pto'], 'id="entryPriceTo"'); ?>
  </div>
</div>
<!--eof search by price range card-->

<!--bof search by date added card-->
<div id="dateAdded-card" class="card mb-3">
  <h4 id="dateAdded-card-header" class="card-header">
<?php echo ENTRY_DATE_RANGE; ?>
  </h4>
  <div id="dateAdded-card-body" class="card-body">
<label class="inputLabel" for="entryDateFrom" id="eentryDateFromLabel"><?php echo ENTRY_DATE_FROM; ?></label>
    <?php echo zen_draw_input_field('dfrom', $sData['dfrom'], 'placeholder="' . DOB_FORMAT_STRING . '" onfocus="RemoveFormatString(this, \'' . DOB_FORMAT_STRING . '\')" id="entryDateFrom"'); ?>
<div class="p-2"></div>
<label class="inputLabel" for="entryDateTo" id="entryDateToLabel"><?php echo ENTRY_DATE_TO; ?></label>
    <?php echo zen_draw_input_field('dto', $sData['dto'], 'placeholder="' . DOB_FORMAT_STRING . '" onfocus="RemoveFormatString(this, \'' . DOB_FORMAT_STRING . '\')" id="entryDateTo"'); ?>
  </div>
</div>
<!--eof search by date added card-->

<div id="advancedSearchDefault-btnToolbar" class="btn-toolbar justify-content-between" role="toolbar">
<?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?>
<?php echo zen_image_submit(BUTTON_IMAGE_SEARCH, BUTTON_SEARCH_ALT); ?>
</div>


</form>
</div>