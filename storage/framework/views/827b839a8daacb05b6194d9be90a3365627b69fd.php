<div class="modal fade" id="add_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_problem_typeTitle">Add SetTopBox</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="save_info" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="box_name">Box Name <span style="color:brown">*</span></label>
                            <input type="text" name="box_name" class="form-control" id="box_name" placeholder="Enter box_name" autocomplete="off">
                            <span id="error_box_name" class="text-danger error_field"></span>
                        </div>

                        <div class="form-group">
                            <label for="sc_id">Sc_id <span style="color:brown">*</span></label>
                            <input type="number" name="sc_id" class="form-control" id="sc_id" placeholder="Enter sc_id" autocomplete="off">
                            <span id="error_sc_id" class="text-danger error_field"></span>
                        </div>

                        <div class="form-group">
                            <label for="stb_id">Stb_id<span style="color:brown">*</span></label>
                            <input type="number" name="stb_id" class="form-control" id="stb_id" placeholder="Enter stb_id" autocomplete="off">
                            <span id="error_stb_id" class="text-danger error_field"></span>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="device_status" id="status" class="form-control" style="width: 100%;">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <span id="error_status" class="text-danger error_field"></span>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\tilmedia_next_decade_mir_dohs\resources\views/backend/setTopBox/setTopBox_create.blade.php ENDPATH**/ ?>