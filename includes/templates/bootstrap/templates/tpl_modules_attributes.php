<?php
/**
 * Module Template
 *
 * BOOTSTRAP v3.0.0
 *
 * Template used to render attribute display/input fields
 *
 * @copyright Copyright 2003-2020 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2019 Jul 25 Modified in v1.5.7 $
 */
?>
<!--bof attributes card-->
<div id="attributes-card" class="card mb-3">
<?php if ($zv_display_select_option > 0) { ?>
<h4 id="attributes-card-header" class="card-header"><?php echo TEXT_PRODUCT_OPTIONS; ?></h4>
<?php } // show please select unless all are readonly ?>

<div id="attributes-card-body" class="card-body p-3">
<?php
    for($i=0, $j=sizeof($options_name); $i<$j; $i++) {
?>

<?php
  if ($options_comment[$i] != '' and $options_comment_position[$i] == '0') {
?>

<h5><?php echo $options_comment[$i]; ?></h5>
<?php
  }
?>

<!--bof attribute options card-->
<div id="attributeOptions<?php echo $options_html_id[$i]; ?>-card" class="card mb-3">
<h4 id="attributeOptions<?php echo $options_html_id[$i]; ?>-card-header" class="card-header optionName"><?php echo $options_name[$i]; ?></h4>
<div id="attributeOptions<?php echo $options_html_id[$i]; ?>-card-body" class="card-body p-3">
<?php echo "\n" . $options_menu[$i]; ?>



<?php if ($options_comment[$i] != '' and $options_comment_position[$i] == '1') { ?>
    <div><?php echo $options_comment[$i]; ?></div>
<?php } ?>

<div class="row text-center">
<?php
if (!empty($options_attributes_image[$i])) {
?>
<?php echo $options_attributes_image[$i]; ?>
<?php
}
?>
</div>
</div>
</div>
<!--eof attribute options card-->

<?php
    }
?>


<?php
  if ($show_onetime_charges_description) {
?>
    <div><?php echo TEXT_ONETIME_CHARGE_SYMBOL . TEXT_ONETIME_CHARGE_DESCRIPTION; ?></div>
<?php } ?>


<?php
  if ($show_attributes_qty_prices_description) {
?>
    <div><?php echo zen_image(DIR_WS_TEMPLATE_ICONS . 'icon_status_green.gif', TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK, 10, 10) . '&nbsp;' . '<a data-toggle="modal" href="#attributesQtyPricesModal">' . TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK . '</a>'; ?></div>
    
<?php require($template->get_template_dir('tpl_attributes_qty_prices.php',DIR_WS_TEMPLATE, $current_page_base,'modalboxes'). '/tpl_attributes_qty_prices.php'); ?>    
<?php } ?>
</div>
</div>
<!--eof attributes card-->
