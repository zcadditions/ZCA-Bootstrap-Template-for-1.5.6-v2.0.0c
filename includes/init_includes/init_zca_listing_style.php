<?php
/**
 *
 * BOOTSTRAP v1.0.BETA
 * 
 * @package initSystem
 * @copyright Copyright 2003-2011 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 *
 */

if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

if($_GET['style_changer']=='columns') $_SESSION['PRODUCT_LISTING_LAYOUT_STYLE'] = 'columns';
if($_GET['style_changer']=='rows') $_SESSION['PRODUCT_LISTING_LAYOUT_STYLE'] = 'rows';

?>