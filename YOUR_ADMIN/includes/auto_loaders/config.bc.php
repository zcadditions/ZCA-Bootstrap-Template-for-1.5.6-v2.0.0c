<?php
/*
 * config.bc.php
 *
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version Author: rbarbour (ZCAdditions.com)  7/01/2018 06:00 AM Modified ZCA-BS-COLORS
 * 
 */

if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
} 

$autoLoadConfig[999][] = array(
  'autoType' => 'init_script',
  'loadFile' => 'init_bc_config.php'
);
