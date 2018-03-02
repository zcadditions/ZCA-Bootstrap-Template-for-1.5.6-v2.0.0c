<?php
/**
 * Module Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Fri Jan 8 13:28:51 2016 -0500 Modified in v1.5.5 $
 */
/**
 * require the downloads module
 */
  require(DIR_WS_MODULES . zen_get_module_directory('downloads.php'));
?>

<?php
// download is available
  if ($downloads->RecordCount() > 0) {
?>

<!--bof downloads card-->
<div id="downloads-card" class="card mb-3">
<h4 id="downloads-card-header" class="card-header">
    <?php echo HEADING_DOWNLOAD; ?></h4>
<div id="downloads-card-body" class="card-body p-3">

<div class="table-responsive">
<table id="downloads-downloadTableDisplay" class="table table-bordered">

  <tr>
      <th scope="col" id="downloadTableDisplay-productsHeading"><?php echo TABLE_HEADING_PRODUCT_NAME; ?></th>
      <th scope="col" id="downloadTableDisplay-byteSizeHeading"><?php echo TABLE_HEADING_BYTE_SIZE; ?></th>
      <th scope="col" id="downloadTableDisplay-filenameHeading"><?php echo TABLE_HEADING_DOWNLOAD_FILENAME; ?></th>
      <th scope="col" id="downloadTableDisplay-dateHeading"><?php echo TABLE_HEADING_DOWNLOAD_DATE; ?></th>
      <th scope="col" id="downloadTableDisplay-countHeading"><?php echo TABLE_HEADING_DOWNLOAD_COUNT; ?></th>
      <th scope="col" id="downloadTableDisplay-buttonHeading">&nbsp;</th>
          </tr>

<?php
    while (!$downloads->EOF) {
// MySQL 3.22 does not have INTERVAL
      list($dt_year, $dt_month, $dt_day) = explode('-', $downloads->fields['date_purchased_day']);
      $download_timestamp = mktime(23, 59, 59, $dt_month, $dt_day + $downloads->fields['download_maxdays'], $dt_year);
      $download_expiry = date('Y-m-d H:i:s', $download_timestamp);

      $is_downloadable = ( (file_exists(DIR_FS_DOWNLOAD . $downloads->fields['orders_products_filename']) && (($downloads->fields['download_count'] > 0 && $download_timestamp > time()) || $downloads->fields['download_maxdays'] == 0)) ) ? true : false;
      $zv_filesize = filesize (DIR_FS_DOWNLOAD . $downloads->fields['orders_products_filename']);
      if ($zv_filesize >= 1024) {
        $zv_filesize = number_format($zv_filesize/1024/1024,2);
        $zv_filesize_units = TEXT_FILESIZE_MEGS;
      } else {
        $zv_filesize = number_format($zv_filesize);
        $zv_filesize_units = TEXT_FILESIZE_BYTES;
      }
?>
          <tr>
<!-- left box -->
<?php
// The link will appear only if:
// - Download remaining count is > 0, AND
// - The file is present in the DOWNLOAD directory, AND EITHER
// - No expiry date is enforced (maxdays == 0), OR
// - The expiry date is not reached

//      if ( ($downloads->fields['download_count'] > 0) && (file_exists(DIR_FS_DOWNLOAD . $downloads->fields['orders_products_filename'])) && ( ($downloads->fields['download_maxdays'] == 0) || ($download_timestamp > time())) ) {
      if  ($is_downloadable) {
?>
      <td class="productsCell"><?php echo '<a href="' . zen_href_link(FILENAME_DOWNLOAD, 'order=' . $last_order . '&id=' . $downloads->fields['orders_products_download_id']) . '">' . $downloads->fields['products_name'] . '</a>'; ?></td>
<?php } else { ?>
      <td class="productsCell"><?php echo $downloads->fields['products_name']; ?></td>
<?php
      }
?>
      <td class="byteSizeCell"><?php echo $zv_filesize . $zv_filesize_units; ?></td>
      <td class="filenameCell"><?php echo $downloads->fields['orders_products_filename']; ?></td>
      <td class="dateCell"><?php echo ($downloads->fields['download_maxdays'] == 0 ? TEXT_DOWNLOADS_UNLIMITED : zen_date_short($download_expiry)); ?></td>
      <td class="countCell text-center"><?php echo ($downloads->fields['download_maxdays'] == 0 ? TEXT_DOWNLOADS_UNLIMITED_COUNT : $downloads->fields['download_count']); ?></td>
      <td class="buttonCell text-center"><?php echo ($is_downloadable) ? '<a href="' . zen_href_link(FILENAME_DOWNLOAD, 'order=' . $last_order . '&id=' . $downloads->fields['orders_products_download_id']) . '">' . zen_image_button(BUTTON_IMAGE_DOWNLOAD, BUTTON_DOWNLOAD_ALT) . '</a>' : '&nbsp;'; ?></td>
    </tr>
<?php
    $downloads->MoveNext();
    }
?>
  </table>
</div>

</div>
</div>
<!--eof downloads card-->


<?php
// old way
//    if (!strstr($PHP_SELF, FILENAME_ACCOUNT_HISTORY_INFO)) {
// new way
      if (!($_GET['main_page']==FILENAME_ACCOUNT_HISTORY_INFO)) {
?>
<p><?php printf(FOOTER_DOWNLOAD, '<a href="' . zen_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . HEADER_TITLE_MY_ACCOUNT . '</a>'); ?></p>
<?php } else { ?>
<?php
// other pages if needed
      }
?>

<?php
} // $downloads->RecordCount() > 0
?>

<?php
// download is not available yet
if ($downloads_check_query->RecordCount() > 0 and $downloads->RecordCount() < 1) {
?>
<!--bof downloads hold card-->
<div id="downloadsHold-card" class="card mb-3">
<div id="downloadsHold-card-body" class="card-body p-3">
<?php echo DOWNLOADS_CONTROLLER_ON_HOLD_MSG ?>
</div>
</div>
<!--eof downloads hold card-->
<?php
}
?>
