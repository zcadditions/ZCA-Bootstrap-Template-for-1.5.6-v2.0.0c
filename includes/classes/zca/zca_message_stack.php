<?php
/**
 * messageStack Class.
 *
 * @package classes
 * @copyright Copyright 2003-2017 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id:  Aug 2017 Modified in v1.5.6 $
 */
// ----
// Modified for use by the ZCA-Bootstrap template.
//
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}
/**
 * messageStack Class.
 * This class is used to manage messageStack alerts
 *
 * @package classes
 */
// -----
// Provides a modified version of the $messageStack formatting; instantiated by
// /includes/init_includes/init_zca_bootstrap.php if the 'bootstrap' template is the
// currently-active template.
//
// Note that the built-in messageStack class is created at CP 130.
//
// Other than some PSR-2 reformatting, the specific changes are marked by bof/eof comments.
//
class zca_messageStack extends messageStack 
{
    function add($class, $message, $type = 'error') 
    {
        global $template, $current_page_base;
        $message = trim($message);
        $duplicate = false;
        if (strlen($message) > 0) {
//-bof-zca_bootstrap  *** 1 of 1 ***
            if ($type == 'error') {
//                $theAlert = array('params' => 'class="messageStackError larger"', 'class' => $class, 'text' => zen_image($template->get_template_dir(ICON_IMAGE_ERROR, DIR_WS_TEMPLATE, $current_page_base,'images/icons'). '/' . ICON_IMAGE_ERROR, ICON_ERROR_ALT) . '  ' . $message);
                $theAlert = array('params' => 'class="alert alert-danger"', 'class' => $class, 'text' => zen_image($template->get_template_dir(ICON_IMAGE_ERROR, DIR_WS_TEMPLATE, $current_page_base,'images/icons'). '/' . ICON_IMAGE_ERROR, ICON_ERROR_ALT) . '  ' . $message);
            } elseif ($type == 'warning') {
//                $theAlert = array('params' => 'class="messageStackWarning larger"', 'class' => $class, 'text' => zen_image($template->get_template_dir(ICON_IMAGE_WARNING, DIR_WS_TEMPLATE, $current_page_base,'images/icons'). '/' . ICON_IMAGE_WARNING, ICON_WARNING_ALT) . '  ' . $message);
                $theAlert = array('params' => 'class="alert alert-warning"', 'class' => $class, 'text' => zen_image($template->get_template_dir(ICON_IMAGE_WARNING, DIR_WS_TEMPLATE, $current_page_base,'images/icons'). '/' . ICON_IMAGE_WARNING, ICON_WARNING_ALT) . '  ' . $message);
            } elseif ($type == 'success') {
//                $theAlert = array('params' => 'class="messageStackSuccess larger"', 'class' => $class, 'text' => zen_image($template->get_template_dir(ICON_IMAGE_SUCCESS, DIR_WS_TEMPLATE, $current_page_base,'images/icons'). '/' . ICON_IMAGE_SUCCESS, ICON_SUCCESS_ALT) . '  ' . $message);
                $theAlert = array('params' => 'class="alert alert-success"', 'class' => $class, 'text' => zen_image($template->get_template_dir(ICON_IMAGE_SUCCESS, DIR_WS_TEMPLATE, $current_page_base,'images/icons'). '/' . ICON_IMAGE_SUCCESS, ICON_SUCCESS_ALT) . '  ' . $message);
            } elseif ($type == 'caution') {
//                $theAlert = array('params' => 'class="messageStackCaution larger"', 'class' => $class, 'text' => zen_image($template->get_template_dir(ICON_IMAGE_WARNING, DIR_WS_TEMPLATE, $current_page_base,'images/icons'). '/' . ICON_IMAGE_WARNING, ICON_WARNING_ALT) . '  ' . $message);
                $theAlert = array('params' => 'class="alert alert-warning"', 'class' => $class, 'text' => zen_image($template->get_template_dir(ICON_IMAGE_WARNING, DIR_WS_TEMPLATE, $current_page_base,'images/icons'). '/' . ICON_IMAGE_WARNING, ICON_WARNING_ALT) . '  ' . $message);
            } else {
//                $theAlert = array('params' => 'class="messageStackError larger"', 'class' => $class, 'text' => $message);
                $theAlert = array('params' => 'class="alert alert-danger"', 'class' => $class, 'text' => $message);
            }
//-eof-zca_bootstrap  *** 1 of 1 ***

            for ($i=0, $n=count($this->messages); $i<$n; $i++) {
                if ($theAlert['text'] == $this->messages[$i]['text'] && $theAlert['class'] == $this->messages[$i]['class']) {
                    $duplicate = true;
                }
            }
            if (!$duplicate) {
                $this->messages[] = $theAlert;
            }
        }
    }
}
