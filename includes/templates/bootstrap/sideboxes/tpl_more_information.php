<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Drbyte Sun Jan 7 21:28:50 2018 -0500 Modified in v1.5.6 $
 */
  $content = '';
  $content .= '<div class="list-group-flush sideBoxContent" id="' . str_replace('_', '-', $box_id . 'Content') . '">';

  for ($i=0, $j=sizeof($more_information); $i<$j; $i++) {
    $content .= $more_information[$i] . "\n" ;
  }

  $content .= '</div>';
