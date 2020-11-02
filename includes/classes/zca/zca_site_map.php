<?php
/**
 * site_map.php
 *
 * @package general
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Drbyte Mon Nov 5 09:42:04 2018 -0500 Modified in v1.5.6 $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}
/**
 * site_map.php
 *
 * @package general
 */
// -----
// Extend the base Zen Cart class, adding methods to allow the bootstrap styling
// to be added.
//
class zca_SiteMapTree extends zen_SiteMapTree 
{
    public function setParentStartEndStrings($start, $end = "</ul>\n")
    {
        $this->parent_group_start_string = $start;
        $this->parent_group_end_string = $end;
    }
    public function setChildStartString($start, $end = "</li>\n")
    {
        $this->child_start_string = $start;
        $this->child_end_string = $end;
    }
}
