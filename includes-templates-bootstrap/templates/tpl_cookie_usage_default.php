<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Loaded automatically by index.php?main_page=cookie_usage.<br />
 * Displays information page, if cookie only is set in admin and cookies disabled in users browser.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_cookie_usage_default.php 2540 2005-12-11 07:55:22Z birdbrain $
 */
?>
<div id="cookieUsageDefault" class="centerColumn">
    
<h1 id="cookieUsageDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<div id="cookieUsageDefault-content" class="content my-3"><?php echo TEXT_INFORMATION; ?></div>

<!--bof cookie privacy and security card-->
<div id="cookiePrivacy-card" class="card mb-3">
<h4 id="cookiePrivacy-card-header" class="card-header"><?php echo BOX_INFORMATION_HEADING; ?></h4>

<div id="cookiePrivacy-card-body" class="card-body p-3">

<p id="paragraph-one" class="content my-3"><?php echo BOX_INFORMATION; ?></p>

<p id="paragraph-two" class="content my-3"><?php echo TEXT_INFORMATION_2; ?></p>

<p id="paragraph-three" class="content my-3"><?php echo TEXT_INFORMATION_3; ?></p>

<p id="paragraph-four" class="content my-3"><?php echo TEXT_INFORMATION_4; ?></p>

<p id="paragraph-five" class="content my-3"><?php echo TEXT_INFORMATION_5; ?></p>

<div id="cookiePrivacy-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar">
<?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT) . '</a>'; ?>
</div>

</div>
    </div>
<!--eof cookie privacy and security card-->
</div>
