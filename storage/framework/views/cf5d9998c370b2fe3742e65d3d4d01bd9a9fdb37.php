<div class="modal fade" id="settop_assign_modal" tabindex="-1" role="dialog" aria-labelledby="edit_model" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" id="customer_settopbox_form">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title">Edit <?php echo $__env->yieldContent('title'); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="settop_customer_id" id="settop_customer_id">
                <div class="modal-body">
                    <div class="form-group hidden_field">
                        <label class="control-label required">Name</label>
                        <input class="form-control" type="text" name="name" disabled autocomplete="off" id="settop_customer_name">
                        <span id="" class="text-danger error_field"></span>
                    </div>






                    <div class="form-group">
                        <label class="control-label required">Settop Box</label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%; color:blue" name="set_top_box_id[]" id="set_top_box_id">

                        </select>
                    </div>

                    
                    
                    

                    
                        <div class="form-group">
                            <label class="control-label required">Multiple</label>
                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;"  name="set_top_box_id" id="set_top_box_id">  
                            </select>
                        </div>
                      

                    <div class="form-group">
                        <label class="required">Customer Box status</label>
                        <select name="device_status" class="form-control" id="device_status">
                            <!-- <option>-please select-</option> -->
                            <option value="1">Assigned</option>
                            <option value="0">Unassigned</option>
                        </select>

                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" id="form_submission_button">Update</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\tilmedia_next_decade_mir_dohs\resources\views/backend/customer/customer_setTopBox_modal.blade.php ENDPATH**/ ?>