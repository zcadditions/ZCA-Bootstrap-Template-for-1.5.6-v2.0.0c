<?php
/**
 * ZCA Bootstrap Colors
 *
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: init_bc_config.php
 */

    $bc_menu_title = 'ZCA Bootstrap Colors';
    $bc_menu_text = 'ZCA Bootstrap Colors';

    /* find if ZCA Bootstrap Colors Configuration Group Exists */
    $sql = "SELECT * FROM ".TABLE_CONFIGURATION_GROUP." WHERE configuration_group_title = '".$bc_menu_title."'";
    $original_config = $db->Execute($sql);

    if($original_config->RecordCount())
    {
        // if exists updating the existing ZCA Bootstrap Colors configuration group entry
        $sql = "UPDATE ".TABLE_CONFIGURATION_GROUP." SET 
                configuration_group_description = '".$bc_menu_text."' 
                WHERE configuration_group_title = '".$bc_menu_title."'";
        $db->Execute($sql);
        $sort = $original_config->fields['sort_order'];

    }else{
        /* Find max sort order in the configuation group table -- add 2 to this value to create the ZCA Bootstrap Colors configuration group ID */
        $sql = "SELECT (MAX(sort_order)+2) as sort FROM ".TABLE_CONFIGURATION_GROUP;
        $result = $db->Execute($sql);
        $sort = $result->fields['sort'];

        /* Create ZCA Bootstrap Colors configuration group */
        $sql = "INSERT INTO ".TABLE_CONFIGURATION_GROUP." (configuration_group_title, configuration_group_description, sort_order, visible) VALUES ('".$bc_menu_title."', '".$bc_menu_text."', ".$sort.", '1')";
        $db->Execute($sql);
   }

    /* Find configuation group ID of ZCA Bootstrap Colors */
    $sql = "SELECT configuration_group_id FROM ".TABLE_CONFIGURATION_GROUP." WHERE configuration_group_title='".$bc_menu_title."' LIMIT 1";
    $result = $db->Execute($sql);
        $bc_configuration_id = $result->fields['configuration_group_id'];

    /* Remove ZCA Bootstrap Colors items from the configuration table */
    $sql = "DELETE FROM ".DB_PREFIX."configuration WHERE configuration_group_id ='".$bc_configuration_id."'";
        $db->Execute($sql);

//-- ADD VALUES TO ZCA BOOTSTRAP COLORS CONFIGURATION GROUP (Admin > Configuration > ZCA Bootstrap Colors Configuration) --
/* ZCA Bootstrap Template BODY Colors */
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Body Text Color', 'ZCA_BODY_TEXT_COLOR', '#000000', 'Default:#000000', '".$bc_configuration_id."', 1, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Body Background Color', 'ZCA_BODY_BACKGROUND_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 2, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Body Breadcrumbs Background Color</b>', 'ZCA_BODY_BREADCRUMBS_BACKGROUND_COLOR', '#cccccc', 'Default:#cccccc', '".$bc_configuration_id."', 3, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Body Breadcrumbs Text Color</b>', 'ZCA_BODY_BREADCRUMBS_TEXT_COLOR', '#000000', 'Default:000000', '".$bc_configuration_id."', 4, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Body Breadcrumbs Link Color</b>', 'ZCA_BODY_BREADCRUMBS_LINK_COLOR', '#33b5e5', 'Default:33b5e5', '".$bc_configuration_id."', 5, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Body Breadcrumbs Link Color on Hover</b>', 'ZCA_BODY_BREADCRUMBS_LINK_COLOR_HOVER', '#0099CC', 'Default:#0099CC', '".$bc_configuration_id."', 6, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Body Products Base Price', 'ZCA_BODY_PRODUCTS_BASE_COLOR', '#000000', 'Default:#000000', '".$bc_configuration_id."', 7, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Body Products Normal Price', 'ZCA_BODY_PRODUCTS_NORMAL_COLOR', '#000000', 'Default:#000000', '".$bc_configuration_id."', 8, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Body Products Special Price', 'ZCA_BODY_PRODUCTS_SPECIAL_COLOR', '#ff0000', 'Default:#ff0000', '".$bc_configuration_id."', 9, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Body Products Price Discount Price', 'ZCA_BODY_PRODUCTS_DISCOUNT_COLOR', '#ff0000', 'Default:#ff0000', '".$bc_configuration_id."', 10, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Body Products Sale Price', 'ZCA_BODY_PRODUCTS_SALE_COLOR', '#ff0000', 'Default:#ff0000', '".$bc_configuration_id."', 11, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Body Products Free Price', 'ZCA_BODY_PRODUCTS_FREE_COLOR', '#0000ff', 'Default:#0000ff', '".$bc_configuration_id."', 12, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Body Form Placeholder</b>', 'ZCA_BODY_PLACEHOLDER', '#ff0000', 'Default:#ff0000', '".$bc_configuration_id."', 13, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
	
/* ZCA Bootstrap Template LINKS & BUTTONS Colors */		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('A Link Color', 'ZCA_BUTTON_LINK_COLOR', '#05a5cb', 'Default:#05a5cb', '".$bc_configuration_id."', 14, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('A Link Color on Hover', 'ZCA_BUTTON_LINK_COLOR_HOVER', '#0099CC', 'Default:#0099CC', '".$bc_configuration_id."', 15, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Button Text Color</b>', 'ZCA_BUTTON_TEXT_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 16, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Button Text Color on Hover</b>', 'ZCA_BUTTON_TEXT_COLOR_HOVER', '#cccccc', 'Default:#cccccc', '".$bc_configuration_id."', 17, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Button Color</b>', 'ZCA_BUTTON_COLOR', '#33b5e5', 'Default:#33b5e5', '".$bc_configuration_id."', 18, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Button Color on Hover</b>', 'ZCA_BUTTON_COLOR_HOVER', '#0099CC', 'Default:#0099CC', '".$bc_configuration_id."', 19, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Button Border Color</b>', 'ZCA_BUTTON_BORDER_COLOR', '#33b5e5', 'Default:#33b5e5', '".$bc_configuration_id."', 20, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Button Border Color on Hover</b>', 'ZCA_BUTTON_BORDER_COLOR_HOVER', '#0099CC', 'Default:#0099CC', '".$bc_configuration_id."', 21, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Pagination Button Text Color', 'ZCA_BUTTON_PAGEINATION_TEXT_COLOR', '#000000', 'Default:#000000', '".$bc_configuration_id."', 22, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Pagination Button Text Color on Hover', 'ZCA_BUTTON_PAGEINATION_TEXT_COLOR_HOVER', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 23, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Pagination Button Color', 'ZCA_BUTTON_PAGEINATION_COLOR', '#cccccc', 'Default:#cccccc', '".$bc_configuration_id."', 24, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Pagination Button Color on Hover', 'ZCA_BUTTON_PAGEINATION_COLOR_HOVER', '#0099CC', 'Default:#0099CC', '".$bc_configuration_id."', 25, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Pagination Button Border Color', 'ZCA_BUTTON_PAGEINATION_BORDER_COLOR', '#cccccc', 'Default:#cccccc', '".$bc_configuration_id."', 26, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Pagination Button Border Color on Hover', 'ZCA_BUTTON_PAGEINATION_BORDER_COLOR_HOVER', '#0099CC', 'Default:#0099CC', '".$bc_configuration_id."', 27, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Pagination Active Button Text Color', 'ZCA_BUTTON_PAGEINATION_ACTIVE_TEXT_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 28, NULL, now(), NULL, NULL)";
    $db->Execute($sql);	
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Pagination Active Button Color', 'ZCA_BUTTON_PAGEINATION_ACTIVE_COLOR', '#33b5e5', 'Default:#33b5e5', '".$bc_configuration_id."', 29, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		
		
/* ZCA Bootstrap Template HEADER Colors */
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Header Wrapper Background Color</b>', 'ZCA_HEADER_WRAPPER_BACKGROUND_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 30, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Header Tagline Text Color', 'ZCA_HEADER_TAGLINE_TEXT_COLOR', '#000000', 'Default:#000000', '".$bc_configuration_id."', 31, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
	
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Header Nav Bar Color</b>', 'ZCA_HEADER_NAV_BAR_BACKGROUND_COLOR', '#333333', 'Default:#333333', '".$bc_configuration_id."', 32, NULL, now(), NULL, NULL)";
    $db->Execute($sql);		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Header Nav Bar Link Color</b>', 'ZCA_HEADER_NAVBAR_LINK_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 33, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Header Nav Bar Link Color on Hover</b>', 'ZCA_HEADER_NAVBAR_LINK_COLOR_HOVER', '#cccccc', 'Default:#cccccc', '".$bc_configuration_id."', 34, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Header Nav Bar Button Text Color</b>', 'ZCA_HEADER_NAVBAR_BUTTON_TEXT_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 35, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Header Nav Bar Button Text Color on Hover</b>', 'ZCA_HEADER_NAVBAR_BUTTON_TEXT_COLOR_HOVER', '#cccccc', 'Default:#cccccc', '".$bc_configuration_id."', 36, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Header Nav Bar Button Color</b>', 'ZCA_HEADER_NAVBAR_BUTTON_COLOR', '#343a40', 'Default:#343a40', '".$bc_configuration_id."', 37, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Header Nav Bar Button Color on Hover</b>', 'ZCA_HEADER_NAVBAR_BUTTON_COLOR_HOVER', '#919aa1', 'Default:#919aa1', '".$bc_configuration_id."', 38, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Header Nav Bar Button Border Color</b>', 'ZCA_HEADER_NAVBAR_BUTTON_BORDER_COLOR', '#343a40', 'Default:#343a40', '".$bc_configuration_id."', 39, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Header Nav Bar Border Color on Hover</b>', 'ZCA_HEADER_NAVBAR_BUTTON_BORDER_COLOR_HOVER', '#919aa1', 'Default:#919aa1', '".$bc_configuration_id."', 40, NULL, now(), NULL, NULL)";
    $db->Execute($sql);		
		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Header Category Tabs Text Color', 'ZCA_HEADER_TABS_TEXT_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 41, NULL, now(), NULL, NULL)";
    $db->Execute($sql);	
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Header Category Tabs Text Color on Hover', 'ZCA_HEADER_TABS_TEXT_COLOR_HOVER', '#cccccc', 'Default:#cccccc', '".$bc_configuration_id."', 42, NULL, now(), NULL, NULL)";
    $db->Execute($sql);	
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Header Category Tabs Color', 'ZCA_HEADER_TABS_COLOR', '#33b5e5', 'Default:#33b5e5', '".$bc_configuration_id."', 43, NULL, now(), NULL, NULL)";
    $db->Execute($sql);	
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Header Category Tabs Color on Hover', 'ZCA_HEADER_TABS_COLOR_HOVER', '#0099CC', 'Default:#0099CC', '".$bc_configuration_id."', 44, NULL, now(), NULL, NULL)";
    $db->Execute($sql);	
		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Header EZ-Page Bar Background Color</b>', 'ZCA_HEADER_EZPAGE_BACKGROUND_COLOR', '#464646', 'Default:#464646', '".$bc_configuration_id."', 45, NULL, now(), NULL, NULL)";
    $db->Execute($sql);	
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Header EZ-Page Bar Link Color</b>', 'ZCA_HEADER_EZPAGE_LINK_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 46, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Header EZ-Page Bar Link Color on Hover</b>', 'ZCA_HEADER_EZPAGE_LINK_COLOR_HOVER', '#cccccc', 'Default:#cccccc', '".$bc_configuration_id."', 47, NULL, now(), NULL, NULL)";
    $db->Execute($sql);	
		
		
/* ZCA Bootstrap Template FOOTER Colors */	
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Footer Wrapper Text Color', 'ZCA_FOOTER_WRAPPER_TEXT_COLOR', '#000000', 'Default:#000000', '".$bc_configuration_id."', 48, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Footer Wrapper Background Color', 'ZCA_FOOTER_WRAPPER_BACKGROUND_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 49, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Footer EZ-Page Bar Background Color</b>', 'ZCA_FOOTER_EZPAGE_BACKGROUND_COLOR', '#464646', 'Default:#464646', '".$bc_configuration_id."', 50, NULL, now(), NULL, NULL)";
    $db->Execute($sql);	

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Footer EZ-Page Bar Link Color</b>', 'ZCA_FOOTER_EZPAGE_LINK_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 51, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Footer EZ-Page Bar Link Color on Hover</b>', 'ZCA_FOOTER_EZPAGE_LINK_COLOR_HOVER', '#cccccc', 'Default:#cccccc', '".$bc_configuration_id."', 52, NULL, now(), NULL, NULL)";
    $db->Execute($sql);	
		
		
		
/* ZCA Bootstrap Template SIDEBOXES Colors */	
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Sidebox Background Color', 'ZCA_SIDEBOX_BACKGROUND_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 53, NULL, now(), NULL, NULL)";
    $db->Execute($sql);	
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Sidebox Text Color', 'ZCA_SIDEBOX_TEXT_COLOR', '#000000', 'Default:#000000', '".$bc_configuration_id."', 54, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Sidebox Link Color', 'ZCA_SIDEBOX_LINK_COLOR', '#33b5e5', 'Default:#33b5e5', '".$bc_configuration_id."', 55, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Sidebox Link Color on Hover', 'ZCA_SIDEBOX_LINK_COLOR_HOVER', '#0099CC', 'Default:#0099CC', '".$bc_configuration_id."', 56, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Sidebox Link Background Color', 'ZCA_SIDEBOX_LINK_BACKGROUND_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 57, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Sidebox Link Background Color on Hover', 'ZCA_SIDEBOX_LINK_BACKGROUND_COLOR_HOVER', '#efefef', 'Default:#ffffff', '".$bc_configuration_id."', 58, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Sidebox Product Card Background Color</b>', 'ZCA_SIDEBOX_CARD_BACKGROUND_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 59, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Sidebox Product Card Background Color on Hover</b>', 'ZCA_SIDEBOX_CARD_BACKGROUND_COLOR_HOVER', '#efefef', 'Default:#efefef', '".$bc_configuration_id."', 60, NULL, now(), NULL, NULL)";
    $db->Execute($sql);		
		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Sidebox Header Background Color', 'ZCA_SIDEBOX_HEADER_BACKGROUND_COLOR', '#333333', 'Default:#333333', '".$bc_configuration_id."', 61, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Sidebox Header Text Color', 'ZCA_SIDEBOX_HEADER_TEXT_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 62, NULL, now(), NULL, NULL)";
    $db->Execute($sql);	
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Sidebox Header Link Color', 'ZCA_SIDEBOX_HEADER_LINK_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 63, NULL, now(), NULL, NULL)";
    $db->Execute($sql);			
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Sidebox Header Link Color on Hover', 'ZCA_SIDEBOX_HEADER_LINK_COLOR_HOVER', '#cccccc', 'Default:#cccccc', '".$bc_configuration_id."', 64, NULL, now(), NULL, NULL)";
    $db->Execute($sql);			
		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Sidebox Category Counts Color</b>', 'ZCA_SIDEBOX_COUNTS_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 65, NULL, now(), NULL, NULL)";
    $db->Execute($sql);			
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Sidebox Category Counts Background Color</b>', 'ZCA_SIDEBOX_COUNTS_BACKGROUND_COLOR', '#33b5e5', 'Default:33b5e5', '".$bc_configuration_id."', 66, NULL, now(), NULL, NULL)";
    $db->Execute($sql);	
		
/* ZCA Bootstrap Template CENTERBOXES Colors */	
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Centerbox Background Color', 'ZCA_CENTERBOX_BACKGROUND_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 67, NULL, now(), NULL, NULL)";
    $db->Execute($sql);	
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Centerbox Text Color', 'ZCA_CENTERBOX_TEXT_COLOR', '#000000', 'Default:#000000', '".$bc_configuration_id."', 68, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Centerbox Product Card Background Color</b>', 'ZCA_CENTERBOX_CARD_BACKGROUND_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 69, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('<b>Centerbox Product Card Background Color on Hover</b>', 'ZCA_CENTERBOX_CARD_BACKGROUND_COLOR_HOVER', '#efefef', 'Default:#efefef', '".$bc_configuration_id."', 70, NULL, now(), NULL, NULL)";
    $db->Execute($sql);	
		
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Centerbox Header Background Color', 'ZCA_CENTERBOX_HEADER_BACKGROUND_COLOR', '#333333', 'Default:#333333', '".$bc_configuration_id."', 71, NULL, now(), NULL, NULL)";
    $db->Execute($sql);
		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 
		VALUES ('Centerbox Header Text Color', 'ZCA_CENTERBOX_HEADER_TEXT_COLOR', '#ffffff', 'Default:#ffffff', '".$bc_configuration_id."', 72, NULL, now(), NULL, NULL)";
    $db->Execute($sql);

   if(file_exists(DIR_FS_ADMIN . DIR_WS_INCLUDES . 'auto_loaders/config.bc.php'))
    {
        if(!unlink(DIR_FS_ADMIN . DIR_WS_INCLUDES . 'auto_loaders/config.bc.php'))
	{
		$messageStack->add('The auto-loader file '.DIR_FS_ADMIN.'includes/auto_loaders/config.bc.php has not been deleted. For this module to work you must delete the '.DIR_FS_ADMIN.'includes/auto_loaders/config.bc.php file manually.  Before you post on the Zen Cart forum to ask, YES you are REALLY supposed to follow these instructions and delete the '.DIR_FS_ADMIN.'includes/auto_loaders/config.bc.php file.','error');
	};
    }

       $messageStack->add('ZCA Bootstrap Colors install completed!','success');

    // find next sort order in admin_pages table
    $sql = "SELECT (MAX(sort_order)+2) as sort FROM ".TABLE_ADMIN_PAGES;
    $result = $db->Execute($sql);
    $admin_page_sort = $result->fields['sort'];

	//-- Admin Menu for Wishlist Tools Menu
    zen_deregister_admin_pages('toolsZCABootstrapColors');
    zen_register_admin_page('toolsZCABootstrapColors',
        'BOX_TOOLS_ZCA_BOOTSTRAP_COLORS', 'FILENAME_ZCA_BOOTSTRAP_COLORS',
        '', 'tools', 'Y',
        $admin_page_sort);
