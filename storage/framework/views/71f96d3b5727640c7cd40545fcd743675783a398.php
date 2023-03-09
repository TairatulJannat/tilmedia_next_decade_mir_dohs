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
                        <label class="control-label required">Box Name </label>
                        <input class="form-control" type="text" name="box_name" autocomplete="off" id="edit_box_name">
                        <span id="error_edit_box_name" class="text-danger error_field"></span>
                    </div>
                    <input type="hidden" id="edit_id" name="edit_id">

                    <div class="form-group hidden_field">
                        <label class="control-label required">Sc_id</label>
                        <input class="form-control" type="number" name="sc_id" autocomplete="off" id="edit_sc_id">
                        <span id="error_edit_sc_id" class="text-danger error_field"></span>
                    </div>
                    <div class="form-group hidden_field">
                        <label class="control-label required">Stb_id</label>
                        <input class="form-control" type="number" name="stb_id" autocomplete="off" id="edit_stb_id">
                        <span id="error_edit_stb_id" class="text-danger error_field"></span>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="device_status" id="status" class="form-control" style="width: 100%;">
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <span id="error_status" class="text-danger error_field"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" id="form_submission_button">Update</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\tilmedia_next_decade_mir_dohs\resources\views/backend/setTopBox/setTopBox_edit.blade.php ENDPATH**/ ?>