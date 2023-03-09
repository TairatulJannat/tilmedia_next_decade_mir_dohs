<div class="modal fade" id="add_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_problem_typeTitle">Add Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="save_info" autocomplete="off">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Name <span>*</span></label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" autocomplete="off">
                            <span id="error_name" class="text-danger error_field"></span>
                        </div>

                        <div class="form-group">
                            <label for="email">Email address <span>*</span></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" autocomplete="off">
                            <span id="error_email" class="text-danger error_field"></span>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter phone number">
                            <span id="error_mobile" class="text-danger error_field"></span>
                        </div>

                        <div class="form-group">
                            <label for="password">Password <span>*</span></label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            <span id="error_password" class="text-danger error_field"></span>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control" style="width: 100%;">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <span id="error_status" class="text-danger error_field"></span>
                        </div>
                        <div class="form-group">
                            <label class="required">Role</label>
                            <select name="role_id" id="role_id" class="form-control select2">
                                <option value="" selected>Please select your role</option>
                                {{-- <option value="">-- Please Select --</option> --}}
                                @foreach ($roles as $role)
                                <option value=" {{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <span id="error_role_id" class="text-danger error_field"></span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>