<div class="modal fade" id="add_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_problem_typeTitle">Add Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="save_info">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">Name <span style="color:red">*</span></label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" autocomplete="off">
                        <span id="error_name" class="text-danger error_field"></span>
                    </div>

                    <div class="form-group">
                        <label for="Email">Email<span style="color:red">*</span></label>
                        <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" autocomplete="off">
                        <span id="error_email" class="text-danger error_field"></span>
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Contact No.<span style="color:red">*</span></label>
                        <input type="phone" class="form-control" placeholder="Enter contact no" id="contact_no" name="contact_no" autocomplete="off">
                        <span id="error_contact_no" class="text-danger error_field"></span>
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Password<span style="color:red">*</span></label>
                        <input type="password" class="form-control" placeholder="Enter password" id="password" name="password" autocomplete="off">
                        <span id="error_password" class="text-danger error_field"></span>
                    </div>
                    <div class="form-group">
                        <label for="address">Address <span style="color:red">*</span></label>
                        <textarea type="text" class="form-control" placeholder="Enter Address" id="address" name="address" autocomplete="off"></textarea>
                        <span id="error_address" class="text-danger error_field"></span>
                    </div>

                    <div class="form-group">
                        <label>Status <span style="color:red">*</span></label>
                        <select class="form-control" name="status" id="status" style="width: 100%" autocomplete="off">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <span id="error_edit_status" class="text-danger error_field"></span>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" id="form_submission_button">Save</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\tilmedia_next_decade_mir_dohs\resources\views/backend/customer/customer_create_modal.blade.php ENDPATH**/ ?>