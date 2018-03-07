<?php
/**
 * config.zca_bootstrap.php
 *
 * @package initSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @author ZCAdditions.com, ZCA Bootstrap Template Initialization
 */
	
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

// -----
// Loading at CP#161, since the built-in breadcrumbs are instantiated at CP#160 and
// used at CP#170 by init_add_crumbs.php.
//
$autoLoadConfig[161][] = array(
    'autoType' => 'init_script',
    'loadFile' => 'init_zca_bootstrap.php'
);

// -----
// Load, and instantiate, the template's observer-class.
//
$autoLoadConfig[200][] = array(
    'autoType' => 'class',
    'loadFile' => 'observers/ZcaBootstrapObserver.php'
);
$autoLoadConfig[200][] = array(
    'autoType' => 'classInstantiate',
    'className' => 'ZcaBootstrapObserver',
    'objectName' => 'zcaBootstrap'
);
