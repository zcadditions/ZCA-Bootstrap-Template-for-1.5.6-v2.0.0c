<?php
// -----
// site_map: Update the site-map array, adding classes to the parent/child entries.
//
if (function_exists('zca_bootstrap_active') && zca_bootstrap_active()) {
    require DIR_WS_CLASSES . 'zca/zca_site_map.php';
    $zen_SiteMapTree = new zca_SiteMapTree;
    $zen_SiteMapTree->setParentStartEndStrings('<ul class="list-group">');
    $zen_SiteMapTree->setChildStartString('<li class="list-group-item">');
}
