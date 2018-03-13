<?php
/**
 * New Modal for popup_image_additional carousel
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */
?>
<!-- Modal -->
<!-- BOOTSTRAP -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
          <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bootStrapImagesModalLabel"><?php echo $products_name; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<div class="container">

    <!-- main slider carousel -->
    <div class="row">
        <div class="col-lg-8 offset-lg-2" id="slider">
                <div id="myCarousel" class="carousel slide">
                    <!-- main slider carousel items -->
                    <div class="carousel-inner text-center">
                      
<?php
require(DIR_WS_MODULES . zen_get_module_directory('bootstrap_main_image.php'));
?>                        
    <div class="active item carousel-item" data-slide-number="0">
<?php echo zen_image($products_image_large); ?>
    </div>
                      
<?php
require(DIR_WS_MODULES . zen_get_module_directory('bootstrap_slide_additional_images.php'));
?>                        
    <?php
    if ($flag_show_product_info_additional_images != 0 && $num_images > 0) {

if (is_array($list_box_contents) > 0 ) {
 for($row=0;$row<sizeof($list_box_contents);$row++) {
    $params = "";

    for($col=0;$col<sizeof($list_box_contents[$row]);$col++) {
      $r_params = "";
      if (isset($list_box_contents[$row][$col]['params'])) $r_params .= ' ' . (string)$list_box_contents[$row][$col]['params'];
     if (isset($list_box_contents[$row][$col]['text'])) {

echo '<div' . $r_params . '>' . $list_box_contents[$row][$col]['text'] .  '</div>';

      }
    }

  }
}


    }
    ?>                          
                     
<div id="carousel-btn-toolbar" class="btn-toolbar justify-content-between p-3" role="toolbar">
<a class="carousel-control left pt-3" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
<a class="carousel-control right pt-3" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>
</div>                    

                        

                    </div>
                    <!-- main slider carousel nav controls -->


                    <ul class="carousel-indicators list-inline mx-auto justify-content-center py-3">
                         <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel">
<?php
require(DIR_WS_MODULES . zen_get_module_directory('bootstrap_main_image.php'));
?>
<?php echo zen_image($products_image_large); ?>

                            </a>
                        </li>                   
                      
<?php
require(DIR_WS_MODULES . zen_get_module_directory('bootstrap_additional_images.php'));
?>                        
    <?php
    if ($flag_show_product_info_additional_images != 0 && $num_images > 0) {

if (is_array($list_box_contents) > 0 ) {
 for($row=0;$row<sizeof($list_box_contents);$row++) {
    $params = "";

    for($col=0;$col<sizeof($list_box_contents[$row]);$col++) {
      $r_params = "";
      if (isset($list_box_contents[$row][$col]['params'])) $r_params .= ' ' . (string)$list_box_contents[$row][$col]['params'];
     if (isset($list_box_contents[$row][$col]['text'])) {

echo '<li' . $r_params . '>' . $list_box_contents[$row][$col]['text'] .  '</li>';

      }
    }

  }
}


    }
    ?>                      
                     
                    </ul>
            </div>
        </div>

    </div>
    <!--/main slider carousel-->
</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
