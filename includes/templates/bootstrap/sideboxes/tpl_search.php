<?php
/**
 * Side Box Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Fri Feb 26 00:22:54 2016 -0500 Modified in v1.5.5 $
 */
  $content = "";
  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent text-center p-3">';
  $content .= zen_draw_form('quick_find', zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', $request_type, false), 'get');
  $content .= zen_draw_hidden_field('main_page',FILENAME_ADVANCED_SEARCH_RESULT);
  $content .= zen_draw_hidden_field('search_in_description', '1') . zen_hide_session_id();

  if (strtolower(IMAGE_USE_CSS_BUTTONS) == 'yes') {
    $content .= zen_draw_input_field('keyword', '', 'placeholder="' . SEARCH_DEFAULT_TEXT . '"') . '<br />' . zen_image_submit (BUTTON_IMAGE_SEARCH,HEADER_SEARCH_BUTTON);
    $content .= '<div class="p-1"></div><a href="' . zen_href_link(FILENAME_ADVANCED_SEARCH) . '">' . BOX_SEARCH_ADVANCED_SEARCH . '</a>';
  } else {
    $content .= zen_draw_input_field('keyword', '', 'maxlength="100" placeholder="' . SEARCH_DEFAULT_TEXT . '" onfocus="if (this.value == \'' . SEARCH_DEFAULT_TEXT . '\') this.value = \'\';" onblur="if (this.value == \'\') this.value = \'' . SEARCH_DEFAULT_TEXT . '\';"') . '<br /><input type="submit" value="' . HEADER_SEARCH_BUTTON . '" style="width: 50px" />';
    $content .= '<br /><a href="' . zen_href_link(FILENAME_ADVANCED_SEARCH) . '">' . BOX_SEARCH_ADVANCED_SEARCH . '</a>';
  }

  $content .= "</form>";
  $content .= '</div>';
