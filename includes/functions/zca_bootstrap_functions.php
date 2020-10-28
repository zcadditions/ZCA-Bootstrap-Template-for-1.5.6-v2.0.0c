<?php
/**
 * @author ZCAdditions.com, ZCA Bootstrap Template
 */
 
// -----
// This function returns a boolean value indicating whether (true) or not (false)
// the ZCA bootstrap template is the currently-active template.  The definition is
// present in the template's /includes/languages/english/extra_definitions/zca_bootstrap_id.php,
//
function zca_bootstrap_active()
{
    return (defined('IS_ZCA_BOOTSTRAP_TEMPLATE'));
}

function zca_js_zone_list($varname = 'c2z')
{
    $countries = $GLOBALS['db']->Execute(
        "SELECT DISTINCT zone_country_id
           FROM " . TABLE_ZONES . "
                INNER JOIN " . TABLE_COUNTRIES . "
                    ON countries_id = zone_country_id
                   AND status = 1
       ORDER BY zone_country_id"
    );
    
    $c2z = array();
    while (!$countries->EOF) {
        $current_country_id = $countries->fields['zone_country_id'];
        $c2z[$current_country_id] = array();

        $states = $GLOBALS['db']->Execute(
            "SELECT zone_name, zone_id
               FROM " . TABLE_ZONES . "
              WHERE zone_country_id = $current_country_id
           ORDER BY zone_name"
        );
        while (!$states->EOF) {
            $c2z[$current_country_id][$states->fields['zone_id']] = $states->fields['zone_name'];
            $states->MoveNext();
        }
        $countries->MoveNext();
    }
    
    if (count($c2z) == 0) {
        $output_string = '';
    } else {
        $output_string = 'var ' . $varname . ' = \'' . addslashes(json_encode($c2z)) . '\';' . PHP_EOL;
    }
    return $output_string;
}
