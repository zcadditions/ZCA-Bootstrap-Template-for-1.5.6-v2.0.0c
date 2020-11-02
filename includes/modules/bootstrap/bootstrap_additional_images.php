<?php
/**
 * additional_images module
 * 
 * BOOTSTRAP v3.0.0
 *
 * Prepares list of additional product images to be displayed in template
 *
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Wed Jan 6 12:47:43 2016 -0500 Modified in v1.5.5 $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}
$zco_notifier->notify('NOTIFY_MODULES_ADDITIONAL_PRODUCT_IMAGES_START');

if (!defined('IMAGE_ADDITIONAL_DISPLAY_LINK_EVEN_WHEN_NO_LARGE')) define('IMAGE_ADDITIONAL_DISPLAY_LINK_EVEN_WHEN_NO_LARGE', 'Yes');

$images_array = array();

// do not check for additional images when turned off
if ($products_image != '' && $flag_show_product_info_additional_images) {
    $products_image_pathinfo = pathinfo($products_image);

    $products_image_extension = '.' . $products_image_pathinfo['extension'];
    $products_image_base = $products_image_pathinfo['filename'];

    // -----
    // If the image is *not* in the /images directory root, additional images use
    // a trailing underscore for identification, e.g. for myimage.jpg additional images
    // are myimage_1.jpg, myimage_2.jpg, etc.
    //
    if ($products_image_pathinfo['dirname'] != '.') {
        $products_image_base .= '_';
        $products_image_directory = DIR_WS_IMAGES . $products_image_pathinfo['dirname'] . '/';
    } else {
        $products_image_directory = DIR_WS_IMAGES;
    }
    
    // Check for additional matching images
    $products_image_match_array = array();
    if ($dir = @dir($products_image_directory)) {
        while ($file = $dir->read()) {
            if (!is_dir($products_image_directory . $file)) {
                // -----
                // Some additional-image-display plugins (like Fual Slimbox) have some additional checks to see
                // if the file is "valid"; this notifier "accommodates" that processing, providing these parameters:
                //
                // $p1 ... (r/o) ... An array containing the variables identifying the current image.
                // $p2 ... (r/w) ... A boolean indicator, set to true by any observer to note that the image is "acceptable".
                //
                $current_image_match = false;
                $GLOBALS['zco_notifier']->notify(
                    'NOTIFY_MODULES_ADDITIONAL_IMAGES_FILE_MATCH',
                    array(
                        'file' => $file,
                        'file_extension' => $file_extension,
                        'products_image' => $products_image,
                        'products_image_base' => $products_image_base
                    ),
                    $current_image_match
                );
                if ($current_image_match || substr($file, strrpos($file, '.')) == $file_extension) {
                    if ($current_image_match || preg_match('/' . preg_quote($products_image_base, '/') . '/i', $file) == 1) {
                        if ($current_image_match || $file != $products_image) {
                            if ($products_image_base . str_replace($products_image_base, '', $file) == $file) {
                                $images_array[] = $file;
                            }
                        }
                    }
                }
            }
        }
        if (count($images_array) > 0) {
            sort($images_array);
        }
        $dir->close();
    }
}

$zco_notifier->notify('NOTIFY_MODULES_ADDITIONAL_PRODUCT_IMAGES_LIST', NULL, $images_array);

// Build output based on images found
$num_images = count($images_array);
$list_box_contents = array();
$title = '';

if ($num_images > 0) {
    $row = 0;
    $col = 0;
    if ($num_images < IMAGES_AUTO_ADDED || IMAGES_AUTO_ADDED == 0 ) {
        $col_width = floor(100 / $num_images);
    } else {
        $col_width = floor(100 / IMAGES_AUTO_ADDED);
    }

    for ($i = 0; $i < $num_images; $i++) {
        $file = $images_array[$i];
        $products_image_large = str_replace(DIR_WS_IMAGES, DIR_WS_IMAGES . 'large/', $products_image_directory) . str_replace($products_image_extension, '', $file) . IMAGE_SUFFIX_LARGE . $products_image_extension;

        // -----
        // This notifier lets any image-handler know the current image being processed, providing the following parameters:
        //
        // $p1 ... (r/o) ... The current product's name
        // $p2 ... (r/w) ... The (possibly updated) filename (including path) of the current additional image.
        //
        $GLOBALS['zco_notifier']->notify('NOTIFY_MODULES_ADDITIONAL_IMAGES_GET_LARGE', $products_name, $products_image_large);

        $flag_has_large = file_exists($products_image_large);
        $products_image_large = ($flag_has_large ? $products_image_large : $products_image_directory . $file);
        $flag_display_large = (IMAGE_ADDITIONAL_DISPLAY_LINK_EVEN_WHEN_NO_LARGE == 'Yes' || $flag_has_large);
        $base_image = $products_image_directory . $file;
        $thumb_slashes = zen_image(addslashes($base_image), addslashes($products_name), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT);
        
        // -----
        // This notifier lets any image-handler "massage" the name of the current thumbnail image name (with appropriate
        // slashes for javascript/jQuery display):
        //
        // $p1 ... (n/a) ... An empty array, not applicable.
        // $p2 ... (r/w) ... A reference to the "slashed" thumbnail image name.
        //
        $GLOBALS['zco_notifier']->notify('NOTIFY_MODULES_ADDITIONAL_IMAGES_THUMB_SLASHES', array(), $thumb_slashes);

        $thumb_regular = zen_image($base_image, $products_name, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT);
        $large_link = zen_href_link(FILENAME_POPUP_IMAGE_ADDITIONAL, 'pID=' . $_GET['products_id'] . '&pic=' . $i . '&products_image_large_additional=' . $products_image_large);

        $slideNumber = $i + 1; 
        $thumb = '<a id="carousel-selector-' . $slideNumber . '" data-slide-to="' . $slideNumber . '" data-target="#myCarousel">';
        $thumb .= $thumb_regular;    
        $thumb .= '</a>';

        // List Box array generation:
        $list_box_contents[$row][$col] = array(
            'params' => 'class="list-inline-item"',
            'text' => "\n      " . $thumb
        );
        $col++;
        if ($col > (IMAGES_AUTO_ADDED -1)) {
            $col = 0;
            $row++;
        }
    } // end for loop
} // endif

$zco_notifier->notify('NOTIFY_MODULES_ADDITIONAL_PRODUCT_IMAGES_END');
