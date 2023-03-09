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
                    <?php echo csrf_field(); ?>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Name <span>*</span></label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" autocomplete="off">
                            <span id="error_name" class="text-danger error_field"></span>
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug<span>*</span></label>
                            <input type="slug" name="slug" class="form-control" id="slug" placeholder="Enter slug" autocomplete="off">
                            <span id="error_slug" class="text-danger error_field"></span>
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
</div><?php /**PATH C:\xampp\htdocs\tilmedia_next_decade_mir_dohs\resources\views/backend/role/role_create.blade.php ENDPATH**/ ?>