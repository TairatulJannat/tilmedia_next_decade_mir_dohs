<div class="modal fade" id="create_problem_type" tabindex="-1" role="dialog" aria-labelledby="create_problem_typeTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_problem_typeTitle">Add Problem Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Problem Type</label>
                        <input type="text" class="form-control" placeholder="Problem Type" name="name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">FAQ</label>
                        <input type="text" class="form-control" placeholder="FAQ" name="faq">
                    </div>

                    <div class="form-group">
                        <label>Problem Category</label>
                        <select class="form-control select2" name="problem_category" id="problem_category" style="width: 100%">
                            <option value="main" selected>Main Problem Category</option>
                            <option value="after_sell">After Sell Service Complain</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
