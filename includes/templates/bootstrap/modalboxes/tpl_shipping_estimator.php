<!-- Modal -->
<div class="modal fade" id="shippingEstimatorModal" tabindex="-1" role="dialog" aria-labelledby="shippingEstimatorModalLabel" aria-hidden="true">
    
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo 'Shipping Estimator'; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      <?php require(DIR_WS_MODULES . zen_get_module_directory('shipping_estimator.php')); ?>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>