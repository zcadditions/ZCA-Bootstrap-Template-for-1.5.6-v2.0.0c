<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Displays the FAQ pages for the Gift-Certificate/Voucher system.<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_gv_faq_default.php 4859 2006-10-28 20:11:48Z drbyte $
 */
?>

<div id="gvFaqDefault" class="centerColumn">
    
<?php
// only show when there is a GV balance
  if ($customer_has_gv_balance ) {
?>

<?php require($template->get_template_dir('tpl_modules_send_or_spend.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_send_or_spend.php'); ?>

<?php
  }
?>

<!--bof gift certificate faq card-->
<div id="giftCertificateFaq-card" class="card mb-3">
<h4 id="giftCertificateFaq-card-header" class="card-header"><?php echo HEADING_TITLE; ?></h4>
<div id="giftCertificateFaq-card-body" class="card-body p-3"> 

<div id="giftCertificateFaq-content" class="content"><?php echo TEXT_INFORMATION; ?></div>

<h2 id="giftCertificateFaq-subHeading" class="pageSubHeading"><?php echo SUB_HEADING_TITLE; ?></h2>

<div id="giftCertificateFaq-content-two" class="content"><?php echo SUB_HEADING_TEXT; ?></div>

<div id="giftCertificateFaq-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
<?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?>
</div>

</div>
    </div>
<!--eof gift certificate faq card-->

<!--bof please enter your gift certificate redemption code card-->
<div id="giftCertificateRedemption-card" class="card">
  <h4 id="giftCertificateRedemption-card-header" class="card-header">
<?php echo TEXT_GV_REDEEM_INFO; ?>
  </h4>
  <div id="giftCertificateRedemption-card-body" class="card-body">
      
<form action="<?php echo zen_href_link(FILENAME_GV_REDEEM, '', 'NONSSL', false); ?>" method="get">
<?php echo zen_draw_hidden_field('main_page',FILENAME_GV_REDEEM) . zen_draw_hidden_field('goback','true') . zen_hide_session_id(); ?>      
      
<label class="inputLabel" for="lookup-gv-redeem"><?php echo TEXT_GV_REDEEM_ID; ?></label>
<?php echo zen_draw_input_field('gv_no', $_GET['gv_no'], 'size="18" id="lookup-gv-redeem"');?>

<div id="giftCertificateRedemption-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
<?php echo zen_image_submit(BUTTON_IMAGE_REDEEM, BUTTON_REDEEM_ALT); ?>
</div>

</form>

  </div>
</div>
<!--eof please enter your gift certificate redemption code card-->


</div>