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
