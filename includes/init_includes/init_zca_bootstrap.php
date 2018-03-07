<?php
/**
 * 
 * init_zca_bootstrap.php
 *
 * @package initSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: rbarbour zcadditions.com Sun Dec 13 16:32:43 2015 -0500 New in v1.5.5 $
 */
 
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

// -----
// This module provides the initialization required for the ZCA Bootstrap template,
// if that template is the currently-active template.
//
// First, load the plugin's function-file; it has a common function that identifies
// whether/not the template is active.  If the template's not active, simply return
// since no further initialization is needed.
//
require DIR_WS_FUNCTIONS . 'zca_bootstrap_functions.php';
if (!zca_bootstrap_active()) {
    return;
}

// -----
// The template's active, so continue with the initialization ...
//
// First, load the modified version of the breadcrumb class and replace the
// breadcrumb-class instance with this modified version.
//
require DIR_WS_CLASSES . 'zca/zca_breadcrumb.php';
unset($breadcrumb);
$breadcrumb = new zca_breadcrumb();

// -----
// Next, load the modified message_stack class and replace the $messageStack
// instantiation with that version.
//
require DIR_WS_CLASSES . 'zca/zca_message_stack.php';
unset($messageStack);
$messageStack = new zca_messageStack();

// -----
// Next, load the modified version of the splitPagesResult class adapted for
// use by this template.
//
require DIR_WS_CLASSES . 'zca/zca_split_page_results.php';
