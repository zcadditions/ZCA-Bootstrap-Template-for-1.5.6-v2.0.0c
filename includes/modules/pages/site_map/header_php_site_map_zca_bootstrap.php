<?php
// -----
// site_map: Update the site-map array, adding classes to the parent/child entries.
//
if (zca_bootstrap_active()) {
    $zen_SiteMapTree->setParentStartEndStrings('<ul class="list-group">');
    $zen_SiteMapTree->setChildStartString('<li class="list-group-item">');
}
