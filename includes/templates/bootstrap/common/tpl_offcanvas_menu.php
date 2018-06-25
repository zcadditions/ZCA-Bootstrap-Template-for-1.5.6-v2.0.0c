<?php
/**
 * Template for Mobile Header Drop Down
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */
 ?>


      <li class="nav-item dropdown d-lg-none">
        <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo BOX_HEADING_CATEGORIES; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="categoryDropdown">
<?php

	echo '<ul class="m-0 p-0">';

	$categories_tab_query = "SELECT c.categories_id, cd.categories_name FROM ".TABLE_CATEGORIES." c, ".TABLE_CATEGORIES_DESCRIPTION . " cd WHERE c.categories_id=cd.categories_id AND c.parent_id= '0' AND cd.language_id='" . (int)$_SESSION['languages_id'] . "' AND c.categories_status='1' ORDER BY c.sort_order, cd.categories_name;";
	$categories_tab = $db->Execute($categories_tab_query);

	while (!$categories_tab->EOF) 
	{
	// currently selected category

		echo '<li><a class="dropdown-item" href="'.zen_href_link(FILENAME_DEFAULT,'cPath=' . (int)$categories_tab->fields['categories_id']).'">'; 
		if((int)$cPath == $categories_tab->fields['categories_id']) 
		 echo '<span class="category-subs-selected">'.$categories_tab->fields['categories_name'].'</span>';
		else 
		 echo $categories_tab->fields['categories_name'];

		echo '</a></li>';

		$categories_tab->MoveNext();
	}
	echo '</ul>';


  if (SHOW_CATEGORIES_BOX_SPECIALS == 'true') {
   $show_this = $db->Execute("select s.products_id from " . TABLE_SPECIALS . " s where s.status= 1 limit 1");
   if ($show_this->RecordCount() > 0) {
    echo '<div class="dropdown-divider"></div><a class="dropdown-item" href="'.zen_href_link(FILENAME_SPECIALS) . '">' . CATEGORIES_BOX_HEADING_SPECIALS.'</a>';

    }
  }

      
if (SHOW_CATEGORIES_BOX_PRODUCTS_NEW == 'true') {
      // display limits
//    $display_limit = zen_get_products_new_timelimit();
      $display_limit = zen_get_new_date_range();

      $show_this = $db->Execute("select p.products_id
                                 from " . TABLE_PRODUCTS . " p
                                 where p.products_status = 1 " . $display_limit . " limit 1");
      if ($show_this->RecordCount() > 0) { 

    echo '<div class="dropdown-divider"></div><a class="dropdown-item" href="'.zen_href_link(FILENAME_PRODUCTS_NEW) . '">' . CATEGORIES_BOX_HEADING_WHATS_NEW.'</a>';
 
    }
  } 

if (SHOW_CATEGORIES_BOX_FEATURED_PRODUCTS == 'true') {
       $show_this = $db->Execute("select products_id from " . TABLE_FEATURED . " where status= 1 limit 1");
       if ($show_this->RecordCount() > 0) { 

    echo '<div class="dropdown-divider"></div><a class="dropdown-item" href="'.zen_href_link(FILENAME_FEATURED_PRODUCTS) . '">' . CATEGORIES_BOX_HEADING_FEATURED_PRODUCTS.'</a>';

    }
  }

if (SHOW_CATEGORIES_BOX_PRODUCTS_ALL == 'true') {
   echo '<div class="dropdown-divider"></div><a class="dropdown-item" href="'.zen_href_link(FILENAME_PRODUCTS_ALL) . '">' . CATEGORIES_BOX_HEADING_PRODUCTS_ALL.'</a>';
 }   

?>
        </div>
      </li>
      

      
      <li class="nav-item dropdown d-lg-none">
        <a class="nav-link dropdown-toggle" href="#" id="infoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo BOX_HEADING_INFORMATION; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="infoDropdown">
<?php

	echo '<ul class="m-0 p-0">';

if (DEFINE_SHIPPINGINFO_STATUS <= 1) {
        echo '<li><a class="dropdown-item" href="'.zen_href_link(FILENAME_SHIPPING) . '">'. BOX_INFORMATION_SHIPPING.'</a></li>';
}
if (DEFINE_PRIVACY_STATUS <= 1) {
        echo '<li><a class="dropdown-item" href="'.zen_href_link(FILENAME_PRIVACY) . '">'. BOX_INFORMATION_PRIVACY.'</a></li>';
}
if (DEFINE_CONDITIONS_STATUS <= 1) {
        echo '<li><a class="dropdown-item" href="'.zen_href_link(FILENAME_CONDITIONS) . '">'. BOX_INFORMATION_CONDITIONS.'</a></li>';
}
if (!empty($external_bb_url) && !empty($external_bb_text)) { // forum/bb link
        echo '<li><a class="dropdown-item" href="'.external_bb_url.'" target="_blank">'. external_bb_text.'</a></li>';
}
if (DEFINE_SITE_MAP_STATUS <= 1) {
        echo '<li><a class="dropdown-item" href="'.zen_href_link(FILENAME_SITE_MAP) . '">'. BOX_INFORMATION_SITE_MAP.'</a></li>';
}
if (MODULE_ORDER_TOTAL_GV_STATUS == 'true') {
        echo '<li><a class="dropdown-item" href="'.zen_href_link(FILENAME_GV_FAQ) . '">'. BOX_INFORMATION_GV.'</a></li>';
}
if (DEFINE_DISCOUNT_COUPON_STATUS <= 1 && MODULE_ORDER_TOTAL_COUPON_STATUS == 'true') {
        echo '<li><a class="dropdown-item" href="'.zen_href_link(FILENAME_DISCOUNT_COUPON) . '">'. BOX_INFORMATION_DISCOUNT_COUPONS.'</a></li>';
}
if (SHOW_NEWSLETTER_UNSUBSCRIBE_LINK == 'true') {
        echo '<li><a class="dropdown-item" href="'.zen_href_link(FILENAME_UNSUBSCRIBE) . '">'. BOX_INFORMATION_UNSUBSCRIBE.'</a></li>';
}
if (DEFINE_PAGE_2_STATUS <= 1) {
        echo '<li><a class="dropdown-item" href="'.zen_href_link(FILENAME_PAGE_2) . '">'. BOX_INFORMATION_PAGE_2.'</a></li>';
}
if (DEFINE_PAGE_3_STATUS <= 1) {
        echo '<li><a class="dropdown-item" href="'.zen_href_link(FILENAME_PAGE_3) . '">'. BOX_INFORMATION_PAGE_3.'</a></li>';
}
if (DEFINE_PAGE_4_STATUS <= 1) {
        echo '<li><a class="dropdown-item" href="'.zen_href_link(FILENAME_PAGE_4) . '">'. BOX_INFORMATION_PAGE_4.'</a></li>';
}

	echo '</ul>';


?>
        </div>
      </li>  
<?php
  // test if sidebox should display
  if (EZPAGES_STATUS_SIDEBOX == '1' or (EZPAGES_STATUS_SIDEBOX== '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) {
 ?>
      <li class="nav-item dropdown d-lg-none">
        <a class="nav-link dropdown-toggle" href="#" id="ezpagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo BOX_HEADING_EZPAGES; ?>
        </a>
        <div class="dropdown-menu mb-2" aria-labelledby="ezpagesDropdown">
<?php

	echo '<ul class="m-0 p-0">';
	
if (isset($var_linksList)) {
      unset($var_linksList);
    }
    $page_query = $db->Execute("select * from " . TABLE_EZPAGES . " where status_sidebox = 1 and sidebox_sort_order > 0 order by sidebox_sort_order, pages_title");
    if ($page_query->RecordCount()>0) {
      $title =  BOX_HEADING_EZPAGES;
      $box_id =  'ezpages';
      $rows = 0;
      while (!$page_query->EOF) {
        $rows++;
        $page_query_list_sidebox[$rows]['id'] = $page_query->fields['pages_id'];
        $page_query_list_sidebox[$rows]['name'] = $page_query->fields['pages_title'];
        $page_query_list_sidebox[$rows]['altURL']  = "";
        switch (true) {
          // external link new window or same window
          case ($page_query->fields['alt_url_external'] != ''):
          $page_query_list_sidebox[$rows]['altURL']  = $page_query->fields['alt_url_external'];
          break;
          // internal link new window
          case ($page_query->fields['alt_url'] != '' and $page_query->fields['page_open_new_window'] == '1'):
          $page_query_list_sidebox[$rows]['altURL']  = (substr($page_query->fields['alt_url'],0,4) == 'http') ?
          $page_query->fields['alt_url'] :
          ($page_query->fields['alt_url']=='' ? '' : zen_href_link($page_query->fields['alt_url'], '', ($page_query->fields['page_is_ssl']=='0' ? 'NONSSL' : 'SSL'), true, true, true));
          break;
          // internal link same window
          case ($page_query->fields['alt_url'] != '' and $page_query->fields['page_open_new_window'] == '0'):
          $page_query_list_sidebox[$rows]['altURL']  = (substr($page_query->fields['alt_url'],0,4) == 'http') ?
          $page_query->fields['alt_url'] :
          ($page_query->fields['alt_url']=='' ? '' : zen_href_link($page_query->fields['alt_url'], '', ($page_query->fields['page_is_ssl']=='0' ? 'NONSSL' : 'SSL'), true, true, true));
          break;
        }

        // if altURL is specified, use it; otherwise, use EZPage ID to create link
        $page_query_list_sidebox[$rows]['link'] = ($page_query_list_sidebox[$rows]['altURL'] =='') ?
        zen_href_link(FILENAME_EZPAGES, 'id=' . $page_query->fields['pages_id'] . ($page_query->fields['toc_chapter'] > 0 ? '&chapter=' . $page_query->fields['toc_chapter'] : ''), ($page_query->fields['page_is_ssl']=='0' ? 'NONSSL' : 'SSL')) :
        $page_query_list_sidebox[$rows]['altURL'];
        $page_query_list_sidebox[$rows]['link'] .= ($page_query->fields['page_open_new_window'] == '1' ? '" target="_blank' : '');
        $page_query->MoveNext();
      }

      $title_link = false;

      $var_linksList = $page_query_list_sidebox;

    }

  for ($i=1, $n=sizeof($var_linksList); $i<=$n; $i++) { 
    echo '<li><a class="dropdown-item" href="' . $var_linksList[$i]['link'] . '">' . $var_linksList[$i]['name'] . '</a></li>';
  } // end FOR loop

	echo '</ul>';


?>
        </div>
      </li>  
<?php
} // test for display
 ?>     
      
