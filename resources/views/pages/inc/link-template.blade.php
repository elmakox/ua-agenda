<script id="link-template" type="text/x-handlebars-template">
    <tr>
        <td class="slide-count p-1 bg-light text-center" style="width: 30px; vertical-align: middle;">
            <span>@{{ id }}</span>
        </td>
        <td>
            <div class="form-group">
                <input type="text" class="form-control" name="link[@{{ id }}][title]" autocomplete="off" placeholder="Title of the link">
            </div>
        </td>
        <td>
            <div class="form-group">
                <select class="form-control" name="link[@{{ id }}][link]" id="link-@{{ id }}">
                    <option value="internal">Internal</option>
                    <option value="external">External</option>
                </select>
            </div>
        </td>
        <td class="slide-remove p-1 bg-light text-center" style="width: 12px; vertical-align: middle;">
            <button type="button" class="btn btn-sm btn-danger removeRow">
                <i class="feather-minus-circle"></i>
            </button>
        </td>
    </tr>
</script>