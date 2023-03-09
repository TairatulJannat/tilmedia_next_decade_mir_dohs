<div class="modal fade" id="edit_model" tabindex="-1" role="dialog" aria-labelledby="edit_model" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" id="update_form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit @yield('title')</h5>
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

                    <div class="form-group hidden_field">
                        <label class="control-label required">Contact No</label>
                        <input class="form-control" type="text" name="contact_no" autocomplete="off" id="edit_contact_no">
                        <span id="error_edit_contact_no" class="text-danger error_field"></span>
                    </div>
                    <div class="form-group hidden_field">
                        <label class="control-label required">Email</label>
                        <input class="form-control" type="email" name="email" autocomplete="off" id="edit_email">
                        <span id="error_edit_email" class="text-danger error_field"></span>
                    </div>
                    <div class="form-group hidden_field">
                        <label class="control-label required">Address</label>
                        <textarea class="form-control" type="text" name="address" autocomplete="off" id="edit_address"></textarea>
                        <span id="error_edit_address" class="text-danger error_field"></span>
                    </div>

                    <div class="form-group">
                        <label class="required">Status</label>
                        <select name="status" class="form-control" id="edit_status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <span id="error_edit_status" class="text-danger error_field"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" id="form_submission_button">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>