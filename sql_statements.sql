-- SQL to update existing (side-box and side-column) descriptions
UPDATE configuration SET configuration_description = 'Width of the Left Column Boxes<br />px may be included<br />Default = 150px<br /><b>This configuration has no affect with the ZCA Responsive Components or ZCA Bootstrap Themes<b/>' WHERE configuration_key = 'BOX_WIDTH_LEFT';
UPDATE configuration SET configuration_description = 'Width of the Right Column Boxes<br />px may be included<br />Default = 150px<br /><b>This configuration has no affect with the ZCA Responsive Components or ZCA Bootstrap Themes<b/>' WHERE configuration_key = 'BOX_WIDTH_RIGHT';
UPDATE configuration SET configuration_description = 'Width of the Left Column<br />px may be included<br />Default = 150px<br /><br /><b>This configuration has no affect with the ZCA Responsive Components or ZCA Bootstrap Themes<b/>' WHERE configuration_key = 'COLUMN_WIDTH_LEFT';
UPDATE configuration SET configuration_description = 'Width of the Right Column<br />px may be included<br />Default = 150px<br /><b>This configuration has no affect with the ZCA Responsive Components or ZCA Bootstrap Themes<b/>' WHERE configuration_key = 'COLUMN_WIDTH_RIGHT';

-- SQL to add configs for CSS layout Grid
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES 
(NULL, 'Responsive Left Column Width', 'SET_COLUMN_LEFT_LAYOUT', '3', 'Set Width of Left Column<br />Default is <b>3</b>, Total columns <b>12</b>.<br />Responsive Left, Center & Right Column Width must = 12', 19, 200, NOW(), NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),'),
(NULL, 'Responsive Center Column Width', 'SET_COLUMN_CENTER_LAYOUT', '6', 'Set Width of Center Column<br />Default is <b>6</b>, Total columns <b>12</b>.<br />Responsive Left, Center & Right Column Width must = 12', 19, 201, NOW(), NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),'),
(NULL, 'Responsive Right Column Width', 'SET_COLUMN_RIGHT_LAYOUT', '3', 'Set Width of Right Column<br />Default is <b>3</b>, Total columns <b>12</b>.<br />Responsive Left, Center & Right Column Width must = 12', 19, 202, NOW(), NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),');

-- SQL to change config for use of CSS buttons to true (Yes)
UPDATE configuration SET configuration_value = 'Yes' WHERE configuration_key = 'IMAGE_USE_CSS_BUTTONS';
-- SQL to change config for Number of numbered pagination links to display.
UPDATE configuration SET configuration_value = '3' WHERE configuration_key = 'MAX_DISPLAY_PAGE_LINKS';
-- SQL to change config for Bread Crumbs Navigation Separator
UPDATE configuration SET configuration_value = '&nbsp;/&nbsp;' WHERE configuration_key = 'BREAD_CRUMBS_SEPARATOR';
-- SQL to change config for Categories Separator between the Category Name and Sub Categories
UPDATE configuration SET configuration_value = '&vdash;&nbsp;' WHERE configuration_key = 'CATEGORIES_SEPARATOR_SUBS';
-- SQL to change config for Categories Count Prefix & Suffix
UPDATE configuration SET configuration_value = '' WHERE configuration_key = 'CATEGORIES_COUNT_PREFIX';
UPDATE configuration SET configuration_value = '' WHERE configuration_key = 'CATEGORIES_COUNT_SUFFIX';
-- SQL to change config for Shipping Estimator Display Settings for Shopping Cart
UPDATE configuration SET configuration_value = '2' WHERE configuration_key = 'SHOW_SHIPPING_ESTIMATOR_BUTTON';

-- SQL to add configs to use columnar layout
DELETE FROM configuration WHERE configuration_key = 'PRODUCT_LISTING_LAYOUT_STYLE';
DELETE FROM configuration WHERE configuration_key = 'PRODUCT_LISTING_COLUMNS_PER_ROW';
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES 
(NULL, 'Listing Layout Style', 'PRODUCT_LISTING_LAYOUT_STYLE', 'columns', '<br /><br />Select the layout style:<br />Each product can be listed in its own row (rows option) or products can be listed in multiple columns per row (columns option)', 8, 200, NOW(), NULL, 'zen_cfg_select_option(array(''rows'',''columns''),'),
(NULL, 'Listing Columns Per Row', 'PRODUCT_LISTING_COLUMNS_PER_ROW', '2', '<br /><br />Select the number of columns of products to show in each row in the product listing. The default setting is 3.', 8, 201, NOW(), NULL , NULL);

-- SQL to add configs to use additional image modal carousel
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES 
(NULL, 'Use Bootstrap Additional Image Carousel', 'PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_SLIDE', '0', 'Default is <b>0</b>, Opens images in an individual modal, <b>1</b> opens images in a single modal with carousel.', 18, 202, NOW(), NULL, 'zen_cfg_select_option(array(\'0\', \'1\'),');

-- SQL to add configs to use Manufacturer & Notifications Sideboxes on Info Page
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES 
(NULL, 'Display the Manufacturer Sidebox on Info Page', 'PRODUCT_INFO_SHOW_MANUFACTURER_BOX', '1', 'Default is <b>1</b>, Displays on Info Page, <b>0</b> Does not Display.', 18, 203, NOW(), NULL, 'zen_cfg_select_option(array(\'0\', \'1\'),'),
(NULL, 'Display the Notifications Sidebox on Info Page', 'PRODUCT_INFO_SHOW_NOTIFICATIONS_BOX', '1', 'Default is <b>1</b>, Displays on Info Page, <b>0</b> Does not Display.', 18, 204, NOW(), NULL, 'zen_cfg_select_option(array(\'0\', \'1\'),');


-- SQL to display # of product per product listing page
UPDATE configuration SET configuration_value = '10' WHERE configuration_key = 'MAX_DISPLAY_PRODUCTS_LISTING';


-- SQL to update configs for Products Displayed per Center-box
UPDATE configuration SET configuration_value = '4' WHERE configuration_key = 'MAX_DISPLAY_SEARCH_RESULTS_FEATURED';
UPDATE configuration SET configuration_value = '4' WHERE configuration_key = 'MAX_DISPLAY_NEW_PRODUCTS';
UPDATE configuration SET configuration_value = '4' WHERE configuration_key = 'MAX_DISPLAY_SPECIAL_PRODUCTS_INDEX';


-- SQL to show "buy now" buttons instead of multi-select on product listing pages
UPDATE configuration SET configuration_value = '1' WHERE configuration_key = 'PRODUCT_LIST_PRICE_BUY_NOW';
UPDATE configuration SET configuration_value = '0' WHERE configuration_key = 'PRODUCT_LISTING_MULTIPLE_ADD_TO_CART';

-- SQL to show 2 products in the New Products Sidebox
UPDATE configuration SET configuration_value = '2' WHERE configuration_key = 'MAX_RANDOM_SELECT_NEW';
-- SQL to show 2 categories per row
UPDATE configuration SET configuration_value = '2' WHERE configuration_key = 'MAX_DISPLAY_CATEGORIES_PER_ROW';
-- SQL to show 2 per row for centerboxes
UPDATE configuration SET configuration_value = '2' WHERE configuration_key = 'SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS';
UPDATE configuration SET configuration_value = '2' WHERE configuration_key = 'SHOW_PRODUCT_INFO_COLUMNS_FEATURED_PRODUCTS';
UPDATE configuration SET configuration_value = '2' WHERE configuration_key = 'SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS';

























































