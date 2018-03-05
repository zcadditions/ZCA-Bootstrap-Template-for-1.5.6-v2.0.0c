<?php
/**
 * Side Box Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_ezpages.php 2982 2006-02-07 07:56:41Z birdbrain $
 */
  $content = "";
  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="list-group-flush sideBoxContent">';

  for ($i=1, $n=sizeof($var_linksList); $i<=$n; $i++) { 
    $content .= '<a class="list-group-item list-group-item-action" href="' . $var_linksList[$i]['link'] . '">' . $var_linksList[$i]['name'] . '</a>' . "\n" ;
  } // end FOR loop

  $content .= '</div>';
?>