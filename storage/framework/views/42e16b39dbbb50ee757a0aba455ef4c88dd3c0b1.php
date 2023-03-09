<div class="modal fade" id="edit_model" tabindex="-1" role="dialog" aria-labelledby="edit_model" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" id="update_form">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title">Edit <?php echo $__env->yieldContent('title'); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group hidden_field">
                        <label class="control-label required">Name</label>
                        <input class="form-control" type="text" name="name" autocomplete="off" id="edit_name">
                        <span id="error_edit_name" class="text-danger error_field"></span>
                    </div>
                    <input type="hidden" id="edit_id" name="edit_id">

                    <div class="form-group">
                        <label for="monthly_bill">Monthly Bill<span>*</span></label>
                        <input type="number" name="monthly_bill" class="form-control" id="edit_monthly_bill" placeholder="Enter Monthly Bill" autocomplete="off">
                        <span id="error_edit_monthly_bill" class="text-danger error_field"></span>
                    </div>
                    <div class="form-group">
                        <label for="validity_days">Validity Days<span>*</span></label>
                        <input type="number" name="validity_days" class="form-control" id="edit_validity_days" placeholder="Enter Validity Days" autocomplete="off">
                        <span id="error_edit_monthly_bill" class="text-danger error_field"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" id="form_submission_button">Update</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\tilmedia_next_decade_mir_dohs\resources\views/backend/package/package_edit.blade.php ENDPATH**/ ?>