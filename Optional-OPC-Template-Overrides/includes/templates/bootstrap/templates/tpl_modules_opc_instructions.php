<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9 (cindy@vinosdefrutastropicales.com).
// Copyright (C) 2013-2017, Vinos de Frutas Tropicales.  All rights reserved.
//
if (TEXT_CHECKOUT_ONE_INSTRUCTIONS != '') {
?>
  <div id="instructions">
<div id="opcInstructions-card" class="card p-0 mb-3">
<?php
    if (TEXT_CHECKOUT_ONE_INSTRUCTION_LABEL != '') {
?>
  <h4 class="card-header">
    <?php echo TEXT_CHECKOUT_ONE_INSTRUCTION_LABEL; ?>
  </h4>
<?php
    }
?>
  <div class="card-body p-3">
<div id="opcInstructions-content" class="content py-3"><?php echo TEXT_CHECKOUT_ONE_INSTRUCTIONS; ?></div>
  </div>
</div>
      

  </div>
<?php
}