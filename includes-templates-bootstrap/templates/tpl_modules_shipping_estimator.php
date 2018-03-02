<?php
/**
 * Module Template - for shipping-estimator display
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Wed Jan 6 16:47:38 2016 -0500 Modified in v1.5.5 $
 */
?>
<div id="shippingEstimator-content" class="content">
    
<?php echo zen_draw_form('estimator', zen_href_link($show_in . '#view', '', $request_type), 'post'); ?>
<?php echo zen_draw_hidden_field('scid', $selected_shipping['id']); ?>
<?php echo zen_draw_hidden_field('action', 'submit'); ?>
<?php
  if($_SESSION['cart']->count_contents()) {
    if ($_SESSION['customer_id']) {
?>

<div id="shippingEstimator-card" class="card mb-3">
<h2 id="shippingEstimator-card-header" class="card-header"><?php echo CART_SHIPPING_OPTIONS; ?></h2>
<div id="shippingEstimator-card-body" class="card-body p-3">

<?php if (!empty($totalsDisplay)) { ?>
<div id="shippingEstimator-cartTotalsDisplay" class="cartTotalsDisplay text-center font-weight-bold p-3"><?php echo $totalsDisplay; ?></div>
<?php } ?>

<?php
    // only display addresses if more than 1
      if ($addresses->RecordCount() > 1){
?>
<label class="inputLabel" for="seAddressPulldown"><?php echo CART_SHIPPING_METHOD_ADDRESS; ?></label>

<?php echo zen_draw_pull_down_menu('address_id', $addresses_array, $selected_address, 'onchange="return shipincart_submit();" id="seAddressPulldown"'); ?>
<?php
      }
?>

<div><?php echo CART_SHIPPING_METHOD_TO; ?></div>
<address><?php echo zen_address_format($order->delivery['format_id'], $order->delivery, 1, ' ', '<div class="p-1"></div>'); ?></address>


<?php
    } else {
?>

<div id="shippingEstimator-card" class="card mb-3">
<h2 id="shippingEstimator-card-header" class="card-header"><?php echo CART_SHIPPING_OPTIONS; ?></h2>
<div id="shippingEstimator-card-body" class="card-body p-3">

<?php if (!empty($totalsDisplay)) { ?>
<div id="shippingEstimator-cartTotalsDisplay" class="cartTotalsDisplay text-center font-weight-bold p-3"><?php echo $totalsDisplay; ?></div>
<?php } ?>
<?php
      if($_SESSION['cart']->get_content_type() != 'virtual'){
?>

<label class="inputLabel" for="country"><?php echo ENTRY_COUNTRY; ?></label>
<?php echo zen_get_country_list('zone_country_id', $selected_country, 'id="country" onchange="update_zone(this.form);"'); ?>
<div class="p-2"></div>

<a name="view"></a>
<label class="inputLabel" for="stateZone" id="zoneLabel"><?php echo ENTRY_STATE; ?></label>
<?php echo zen_draw_pull_down_menu('zone_id', zen_prepare_country_zones_pull_down($selected_country), $state_zone_id, 'id="stateZone"');?>
<div class="p-1"></div>

<label class="inputLabel" for="state" id="stateLabel"><?php echo $state_field_label; ?></label>
<?php echo zen_draw_input_field('state', $selectedState, zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_state', '40') . ' id="state"') .'&nbsp;<span class="alert" id="stText">&nbsp;</span>'; ?>
<div class="p-1"></div>

<?php
        if(CART_SHIPPING_METHOD_ZIP_REQUIRED == "true"){
?>
<label class="inputLabel"><?php echo ENTRY_POST_CODE; ?></label>
<?php echo  zen_draw_input_field('zip_code', $zip_code, 'size="7"'); ?>

<?php
        }
?>

<div id="shippingEstimator-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo  zen_image_submit(BUTTON_IMAGE_UPDATE, BUTTON_UPDATE_ALT); ?>
</div>

<?php
      }
    }
    if($_SESSION['cart']->get_content_type() == 'virtual'){
?>
<?php echo CART_SHIPPING_METHOD_FREE_TEXT .  ' ' . CART_SHIPPING_METHOD_ALL_DOWNLOADS; ?>
<?php
    }elseif ($free_shipping==1) {
?>
<?php echo sprintf(FREE_SHIPPING_DESCRIPTION, $currencies->format(MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER)); ?>
<?php
    }else{
?>

<table id="shippingEstimator-shippingTableDisplay" class="table table-bordered">

<?php if ($_SESSION['customer_id'] < 1 ){ ?>
    <tr>
      <td colspan="2" id="shippingTableDisplay-address">
        <?php echo CART_SHIPPING_QUOTE_CRITERIA; ?><br />
        <?php echo '<address>' . zen_get_zone_name($selected_country, $state_zone_id, '') . ($selectedState != '' ? ' ' . $selectedState : '') . ' ' . $order->delivery['postcode'] . ' ' . zen_get_country_name($order->delivery['country_id']) . '</address>'; ?>
      </td>
    </tr>
<?php } ?>
     <tr>
       <th scope="col" id="shippingTableDisplay-methodsHeading"><?php echo CART_SHIPPING_METHOD_TEXT; ?></th>
       <th scope="col" id="shippingTableDisplay-ratesHeading"><?php echo CART_SHIPPING_METHOD_RATES; ?></th>
     </tr>
<?php
      for ($i=0, $n=sizeof($quotes); $i<$n; $i++) {
        if(sizeof($quotes[$i]['methods'])==1){
          // simple shipping method
          $thisquoteid = $quotes[$i]['id'].'_'.$quotes[$i]['methods'][0]['id'];
?>
     <tr class="<?php echo $extra; ?>">
<?php
          if($quotes[$i]['error']){
?>
         <td colspan="2"><?php echo $quotes[$i]['module']; ?>&nbsp;(<?php echo $quotes[$i]['error']; ?>)</td>
       </tr>
<?php
          }else{
            if($selected_shipping['id'] == $thisquoteid){
?>
         <td class="methodsCell"><?php echo $quotes[$i]['module']; ?>&nbsp;(<?php echo $quotes[$i]['methods'][0]['title']; ?>)</td>
         <td class="ratesCell"><?php echo $currencies->format(zen_add_tax($quotes[$i]['methods'][0]['cost'], $quotes[$i]['tax'])); ?></td>
       </tr>
<?php
            }else{
?>
          <td class="methodsCell"><?php echo $quotes[$i]['module']; ?>&nbsp;(<?php echo $quotes[$i]['methods'][0]['title']; ?>)</td>
          <td class="ratesCell"><?php echo $currencies->format(zen_add_tax($quotes[$i]['methods'][0]['cost'], $quotes[$i]['tax'])); ?></td>
       </tr>
<?php
            }
          }
        } else {
          // shipping method with sub methods (multipickup)
          for ($j=0, $n2=sizeof($quotes[$i]['methods']); $j<$n2; $j++) {
            $thisquoteid = $quotes[$i]['id'].'_'.$quotes[$i]['methods'][$j]['id'];
?>
    <tr class="<?php echo $extra; ?>">
<?php
            if($quotes[$i]['error']){
?>
         <td colspan="2"><?php echo $quotes[$i]['module']; ?>&nbsp;(<?php echo $quotes[$i]['error']; ?>)</td>
       </tr>
<?php
            }else{
              if($selected_shipping['id'] == $thisquoteid){
?>
         <td class="methodsCell"><?php echo $quotes[$i]['module']; ?>&nbsp;(<?php echo $quotes[$i]['methods'][$j]['title']; ?>)</td>
         <td class="ratesCell"><?php echo $currencies->format(zen_add_tax($quotes[$i]['methods'][$j]['cost'], $quotes[$i]['tax'])); ?></td>
       </tr>
<?php
              }else{
?>
        <td class="methodsCell"><?php echo $quotes[$i]['module']; ?>&nbsp;(<?php echo $quotes[$i]['methods'][$j]['title']; ?>)</td>
        <td class="ratesCell"><?php echo $currencies->format(zen_add_tax($quotes[$i]['methods'][$j]['cost'], $quotes[$i]['tax'])); ?></td>
      </tr>
<?php
              }
            }
          }
        }
      }
?>
</table>



<?php
   }
  }
?>
</div>
</div>

</form>
</div>