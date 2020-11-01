<?php 
require DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . zca_get_language_dir('info_shopping_cart.php') . 'info_shopping_cart.php'; 
?>

<!-- Modal -->
<div class="modal fade" id="cartHelpModal" tabindex="-1" role="dialog" aria-labelledby="cartHelpModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartHelpModalLabel"><?php echo HEADING_TITLE_CART_MODAL; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo MODAL_CLOSE; ?>"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h2><?php echo SUB_HEADING_TITLE_1; ?></h2>
                <p><?php echo SUB_HEADING_TEXT_1; ?></p>
                <h2><?php echo SUB_HEADING_TITLE_2; ?></h2>
                <p><?php echo SUB_HEADING_TEXT_2; ?></p>
                <h2><?php echo SUB_HEADING_TITLE_3; ?></h2>
                <p><?php echo SUB_HEADING_TEXT_3; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo MODAL_CLOSE; ?></button>
            </div>
        </div>
    </div>
</div>
