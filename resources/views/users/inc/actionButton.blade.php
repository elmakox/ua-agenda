<button type="button" data-loading-text="<span class='spinner-border spinner-border-sm mr-1'></span> Loading..." class="btn btn-sm btn-outline-info editUserBtn" data-route="{{ route('users.edit', $data->id) }}"><i class="feather-edit-2"></i> Edit</button>
@if(Auth::user()->id != $data->id)
<button type="button" data-loading-text="<span class='spinner-border spinner-border-sm mr-1'></span> Loading..." class="btn btn-sm btn-outline-danger deleteUserBtn" data-route="{{ route('users.destroy', $data->id) }}"><i class="feather-trash-2"></i> Delete</button>
@endif