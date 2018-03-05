<?php
/**
 * jscript to load images in modalboxes/tpl_image_additional.php
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */
?>


     <script type="text/javascript">
$(document).ready(function () {
    $('img').on('click', function () {
        var image = $(this).attr('src');
        //alert(image);
        $('#myModal').on('show.bs.modal', function () {
            $(".showimage").attr("src", image);
        });
    });
});
    </script>