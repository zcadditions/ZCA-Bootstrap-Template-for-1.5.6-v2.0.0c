<?php
/**
 * jscript_addr_pulldowns_zca_bootstrap
 *
 * handles pulldown menu dependencies for state/country selection
 *
 * @package page
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Scott C Wilson Sat Oct 27 01:31:20 2018 -0400 Modified in v1.5.6 $
 */
$zca_address_pages = array(
    FILENAME_CREATE_ACCOUNT, 
    FILENAME_LOGIN, 
    FILENAME_SHOPPING_CART, 
    FILENAME_CHECKOUT_PAYMENT_ADDRESS, 
    FILENAME_CHECKOUT_SHIPPING_ADDRESS,
    FILENAME_ADDRESS_BOOK_PROCESS,
    FILENAME_POPUP_SHIPPING_ESTIMATOR,
);
if (!isset($_GET['main_page']) || !in_array($_GET['main_page'], $zca_address_pages)) {
    return;
}
?>
<script>
jQuery(document).ready(function () {
    <?php echo zca_js_zone_list('c2z'); ?>
    var textPleaseSelect = '<?php echo BOOTSTRAP_PLEASE_SELECT; ?>';
    
    // -----
    // Initialize the display for the dropdown vs. hand-entry of the state fields.  If the initially-selected
    // country doesn't have zones, the dropdown will contain only 1 element ('Type a choice below ...').
    //
    initializeStateZones = function() 
    {
        if (jQuery('#stateZone > option').length == 1) {
            jQuery('#stateZone, #stateZone+span, #stateZone+span+br, #stateZone+br').hide();
        } else {
            jQuery('#state, #state+span, #stBreak, #stateLabel').hide();
            jQuery('#stateZone').show();
        }
    }
    initializeStateZones();
    
    // -----
    // Monitor the address block for changes to the selected country.
    //
    jQuery(document).on('change', '#country', function(event) 
    {
        updateCountryZones(jQuery('#country option:selected').val());
    });
    
    // -----
    // This function provides the processing needed when a country has been changed.  It makes
    // use of the c2z (countries-to-zones) array, built and provided by the jscript_main.php's
    // processing.  The value for "textPleaseSelect" is set there, too.
    //
    function updateCountryZones(selected_country)
    {
        var countryHasZones = false;
        var countryZones = '<option selected="selected" value="0">' + textPleaseSelect + '</option>';
        jQuery.each(jQuery.parseJSON(c2z), function(country_id, country_zones) {
            if (selected_country == country_id) {
                countryHasZones = true;
                jQuery.each(country_zones, function(zone_id, zone_name) {
                    countryZones += "<option value='" + zone_id + "'>" + zone_name + "</option>";
                });
            }
        });
        if (countryHasZones) {
            jQuery('#stateZone').html(countryZones);
            jQuery('#stateZone, #stateZone+span, #stateZone+span+br, #stateZone+br').show();
            jQuery('#state, #state+span, #stBreak, #stateLabel').hide();
        } else {
            jQuery('#stateZone, #stateZone+span').hide();
            jQuery('#state, #state+span, #stBreak, #stateLabel').show();
        }
    }
});
</script>
