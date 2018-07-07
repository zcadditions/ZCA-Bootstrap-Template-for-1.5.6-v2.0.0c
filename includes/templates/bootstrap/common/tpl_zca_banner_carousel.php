 <?php
/**
 * 
 * ZCA Homepage Carousel
 * Plugin Template
 * 
 * BOOTSTRAP PRO
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */


    $content = "";
// select banners_group to be used
  $new_banner_search = $find_banners;

// secure pages
  switch ($request_type) {
    case ('SSL'):
      $my_banner_filter=" and banners_on_ssl= " . "1 ";
      break;
    case ('NONSSL'):
      $my_banner_filter='';
      break;
  }

  $sql = "select banners_id from " . TABLE_BANNERS . " where status = 1 " . $new_banner_search . $my_banner_filter . " order by banners_sort_order";
  $banners = $db->Execute($sql);

// if no active banner in the specified banner group then the box will not show
  $banner_cnt = 0;

    $content .= '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">';  
    $content .= '<ol class="carousel-indicators">';  
    $content .= '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';  
    $content .= '<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>';  
    $content .= '<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>';  
    $content .= '</ol>';  
    $content .= '<div class="carousel-inner rounded ">';  
  
  while (!$banners->EOF) {
    $banner_cnt++;
    $banner = $show_banner;
    
    if ($banner_cnt == '1') {
    $addBannerClass = 'active';    
    } else {
    $addBannerClass = '';   
    }
 
    $content .= '<div class="carousel-item '.$addBannerClass.'">';  
    $content .= zen_display_banner('static', $banners->fields['banners_id']);
    $content .= '</div>';  
  
    $banners->MoveNext();
  }

    $content .= '</div>';
    $content .= '<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">';
    $content .= '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
    $content .= '<span class="sr-only">Previous</span>';
    $content .= '</a>';
    $content .= '<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">';
    $content .= '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
    $content .= '<span class="sr-only">Next</span>';
    $content .= '</a>';
    $content .= '</div>';

echo $content;
?> 
