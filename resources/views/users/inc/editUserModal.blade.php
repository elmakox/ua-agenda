<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('users.store') }}" method="POST" id="editUserForm">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit user</h5>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editname">Name</label>
                        <input type="text" id="editname" name="name" class="form-control" placeholder="Name" required>
                        <span class="help-block name-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="editemail">Email</label>
                        <input type="email" id="editemail" name="email" class="form-control" placeholder="Email" required>
                        <span class="help-block email-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="editpassword">Password</label>
                        <input type="password" id="editpassword" name="password" class="form-control" placeholder="Password">
                        <span class="help-block password-error"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" data-loading-text="<span class='spinner-border spinner-border-sm mr-1'></span> Loading..." class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>