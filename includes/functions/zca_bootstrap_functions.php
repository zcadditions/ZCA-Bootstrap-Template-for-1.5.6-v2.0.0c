<?php
/**
 * @author ZCAdditions.com, ZCA Bootstrap Template
 */
 
// -----
// This function returns a boolean value indicating whether (true) or not (false)
// the ZCA bootstrap template is the currently-active template.
//
function zca_bootstrap_active()
{
    return (isset($GLOBALS['template_dir']) && $GLOBALS['template_dir'] == 'bootstrap');
}
