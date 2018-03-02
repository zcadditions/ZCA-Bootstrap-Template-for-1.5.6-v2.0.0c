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
 * @version $Id: Author: DrByte  Sat Oct 17 21:59:27 2015 -0400 Modified in v1.5.5 $
 */
?>
<div id="sslCheckDefault" class="centerColumn">

<h1 id="sslCheckDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<div id="sslCheckDefault-content" class="content"><?php echo TEXT_INFORMATION; ?></div>

<h2 id="sslCheckDefault-pageSubHeading" class="pageSubHeading"><?php echo BOX_INFORMATION_HEADING; ?></h2>

<div id="sslCheckDefault-content-one" class="content"><?php echo BOX_INFORMATION; ?></div>

<p id="paragraph-one" class="content"><?php echo TEXT_INFORMATION_2; ?></p>
<p id="paragraph-two" class="content"><?php echo TEXT_INFORMATION_3; ?></p>
<p id="paragraph-three" class="content"><?php echo TEXT_INFORMATION_4; ?></p>
<p id="paragraph-four" class="content"><?php echo TEXT_INFORMATION_5; ?></p>

<div id="sslCheckDefault-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo '<a href="' . zen_href_link(FILENAME_LOGIN, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT) . '</a>'; ?>
</div>

</div>