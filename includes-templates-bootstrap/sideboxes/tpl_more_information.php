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
 * @version $Id: tpl_more_information.php 2982 2006-02-07 07:56:41Z birdbrain $
 */
  $content = '';
  $content .= '<div class="list-group-flush sideBoxContent" id="' . str_replace('_', '-', $box_id . 'Content') . '">';

  for ($i=0; $i<sizeof($more_information); $i++) {
    $content .= $more_information[$i] . "\n" ;
  }

  $content .= '</div>';
?>