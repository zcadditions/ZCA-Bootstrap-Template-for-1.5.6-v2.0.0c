<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9 (cindy@vinosdefrutastropicales.com).
// Copyright (C) 2013-2017, Vinos de Frutas Tropicales.  All rights reserved.
//
if (DISPLAY_CONDITIONS_ON_CHECKOUT == 'true') {
?>
<!--bof conditions block -->
<div id="opcConditions-card" class="card p-0 mb-3">
  <h4 class="card-header">
  <?php echo TABLE_HEADING_CONDITIONS; ?>
  </h4>
  <div class="card-body p-3">
<div id="coditions-content" class="content py-3">
    <?php echo TEXT_CONDITIONS_DESCRIPTION; ?>
</div>
      <div class="custom-control custom-checkbox">
      <?php echo zen_draw_checkbox_field('conditions', '1', false, 'id="conditions"'); ?><label class="custom-control-label checkboxLabel" for="conditions"><?php echo TEXT_CONDITIONS_CONFIRM; ?></label>
      </div>
  </div>
</div>
<!--eof conditions block -->
<?php
}