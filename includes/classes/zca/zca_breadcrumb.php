<?php
/**
 * breadcrumb Class.
 *
 * @package classes
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Sat Oct 17 22:52:38 2015 -0400 Modified in v1.5.5 $
 */
// ----
// Modified for use by the ZCA-Bootstrap template.
//
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

/**
 * breadcrumb Class.
 * Class to handle page breadcrumbs
 *
 * @package classes
 */
// -----
// Provides a modified version of the breadcrumb "trail" formatting; instantiated by
// /includes/init_includes/init_zca_bootstrap.php if the 'bootstrap' template is the
// currently-active template.
//
// Note that the built-in breadcrumb class is created at CP 160.
//
// Other than some PSR-2 reformatting, the specific changes are marked by bof/eof comments.
//
class zca_breadcrumb extends breadcrumb
{
    function trail($separator = '&nbsp;&nbsp;') 
    {
        $trail_string = '';

        for ($i=0, $n=sizeof($this->_trail); $i<$n; $i++) {
//    echo 'breadcrumb ' . $i . ' of ' . $n . ': ' . $this->_trail[$i]['title'] . '<br />';
            $skip_link = false;
            if ($i==($n-1) && DISABLE_BREADCRUMB_LINKS_ON_LAST_ITEM =='true') {
                $skip_link = true;
            }
            if (isset($this->_trail[$i]['link']) && zen_not_null($this->_trail[$i]['link']) && !$skip_link ) {
                // this line simply sets the "Home" link to be the domain/url, not main_page=index?blahblah:
                if ($this->_trail[$i]['title'] == HEADER_TITLE_CATALOG) {
                    
//-bof-zca_bootstrap  *** 1 of 1 ***
//                    $trail_string .= '  <a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">' . $this->_trail[$i]['title'] . '</a>';
                    $trail_string .= '<li><a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">' . $this->_trail[$i]['title'] . '</a></li>';
                } else {
//                    $trail_string .= '  <a href="' . $this->_trail[$i]['link'] . '">' . $this->_trail[$i]['title'] . '</a>';
                    $trail_string .= '<li><a href="' . $this->_trail[$i]['link'] . '">' . $this->_trail[$i]['title'] . '</a></li>';
//-eof-zca_bootstrap  *** 1 of 1 ***

                }
            } else {
                $trail_string .= $this->_trail[$i]['title'];
            }

            if (($i+1) < $n) {
                $trail_string .= $separator;
            }
            $trail_string .= "\n";
        }
        return $trail_string;
  }

}
