<div class="modal fade" id="package_model" tabindex="-1" role="dialog" aria-labelledby="edit_model" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" id="customer_package_form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit @yield('title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="customer_id" id="customer_id">
                <div class="modal-body">
                    <div class="form-group hidden_field">
                        <label class="control-label required">Name</label>
                        <input class="form-control" type="text" name="name" disabled autocomplete="off" id="customer_pac_name">
                        <span id="error_edit_name" class="text-danger error_field"></span>
                    </div>
                    <input type="hidden" id="edit_id" name="edit_id">
                    
                    <div class="form-group hidden_field">
                        <label class="control-label required">Package</label>
                        <select class="form-control" name="package_id" id="package_id">
                        
                        </select>
                        <span id="error_edit_contact_no" class="text-danger error_field"></span>
                    </div>
                    <div class="form-group hidden_field">
                        <label class="control-label required">Connection To</label>
                        <input class="form-control" type="date" name="connection_to" autocomplete="off" id="connection_to">
                        <span id="error_edit_name" class="text-danger error_field"></span>
                    </div>
                    <div class="form-group hidden_field">
                        <label class="control-label required">Connection From</label>
                        <input class="form-control" type="date" name="connection_from" autocomplete="off" id="connection_from">
                        <span id="error_edit_name" class="text-danger error_field"></span>
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