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
 * @version $Id: tpl_manufacturer_info.php 3429 2006-04-13 06:11:47Z ajeh $
 */
      if (zen_not_null($manufacturer_info_sidebox->fields['manufacturers_image']));
      
  echo '<div id="manufacturerInfo-centerBoxContents" class="centerBoxContents card mb-3 text-center">';
  echo '<h4 id="manufacturerInfo-centerBoxHeading" class="centerBoxHeading card-header">' . BOX_HEADING_MANUFACTURER_INFO . '</h4>';
  echo '<div id="manufacturerInfo-card-body" class="card-body p-3 text-center">';
  
  echo '<div class="text-center mb-3">' . zen_image(DIR_WS_IMAGES . $manufacturer_info_sidebox->fields['manufacturers_image'], $manufacturer_info_sidebox->fields['manufacturers_name']) . '</div>';

  echo '<ul class="list-group">';
      if (zen_not_null($manufacturer_info_sidebox->fields['manufacturers_url']))
  echo '<li class="list-group-item"><a href="' . zen_href_link(FILENAME_REDIRECT, 'action=manufacturer&manufacturers_id=' . $manufacturer_info_sidebox->fields['manufacturers_id']) . '" target="_blank">' . sprintf(BOX_MANUFACTURER_INFO_HOMEPAGE, $manufacturer_info_sidebox->fields['manufacturers_name']) . '</a></li>';
  echo '<li class="list-group-item"><a href="' . zen_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $manufacturer_info_sidebox->fields['manufacturers_id']) . '">' . BOX_MANUFACTURER_INFO_OTHER_PRODUCTS . '</a></li>';
  echo '</ul>';    


  echo '</div>';
  echo '</div>';
?>