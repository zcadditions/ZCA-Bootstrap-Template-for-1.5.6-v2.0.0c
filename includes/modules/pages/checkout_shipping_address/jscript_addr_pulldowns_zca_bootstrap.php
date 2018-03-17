<?php
/**
 * jscript_addr_pulldowns
 *
 * handles pulldown menu dependencies for state/country selection
 *
 * @package page
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Wed Jan 6 12:47:43 2016 -0500 Modified in v1.5.5 $
 */
  // jscript_addr_pulldowns: Provide updated processing **ONLY IF** the ZCA bootstrap is the active template.
//
if (!zca_bootstrap_active()) {
    return;
}
?>
<script type="text/javascript"><!--

function update_zone(theForm) {
  // if there is no zone_id field to update, or if it is hidden from display, then exit performing no updates
  if (!theForm || !theForm.elements["zone_id"]) return;
  if (theForm.zone_id.type == "hidden") return;

  // set initial values
  var SelectedCountry = theForm.zone_country_id.options[theForm.zone_country_id.selectedIndex].value;
  var SelectedZone = theForm.elements["zone_id"].value;

  // reset the array of pulldown options so it can be repopulated
  var NumState = theForm.zone_id.options.length;
  while(NumState > 0) {
    NumState = NumState - 1;
    theForm.zone_id.options[NumState] = null;
  }
  // build dynamic list of countries/zones for pulldown
<?php echo zen_js_zone_list('SelectedCountry', 'theForm', 'zone_id'); ?>

  // if we had a value before reset, set it again
  if (SelectedZone != "") theForm.elements["zone_id"].value = SelectedZone;

}

  function hideStateField(theForm) {
    theForm.state.disabled = true;
    theForm.state.className = 'invisible';
    theForm.state.setAttribute('className', 'invisible');
    document.getElementById("stateLabel").className = 'invisible';
    document.getElementById("stateLabel").setAttribute('className', 'invisible');
    document.getElementById("stText").className = 'invisible';
    document.getElementById("stText").setAttribute('className', 'invisible');
    document.getElementById("stBreak").className = 'invisible';
    document.getElementById("stBreak").setAttribute('className', 'invisible');
  }

  function showStateField(theForm) {
    theForm.state.disabled = false;
    theForm.state.className = 'inputLabel visible';
    theForm.state.setAttribute('className', 'visible');
    document.getElementById("stateLabel").className = 'inputLabel visible';
    document.getElementById("stateLabel").setAttribute('className', 'inputLabel visible');
    document.getElementById("stText").className = 'alert alert-danger visible';
    document.getElementById("stText").setAttribute('className', 'alert alert-danger visible');
    document.getElementById("stBreak").className = 'clearfix visible';
    document.getElementById("stBreak").setAttribute('className', 'clearfix visible');
  }
//--></script>
