<a href="{{ route('progress.edit', $data->id) }}" class="btn btn-sm btn-outline-info editPageBtn"><i class="feather-edit-2"></i> Edit</a>
<button type="button" data-loading-text="<span class='spinner-border spinner-border-sm mr-1'></span> Loading..." class="btn btn-sm btn-outline-danger deleteBtn" data-route="{{ route('progress.destroy', $data->id) }}"><i class="feather-trash-2"></i> Delete</button>