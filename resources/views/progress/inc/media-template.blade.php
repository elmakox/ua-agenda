<script id="media-template" type="text/x-handlebars-template">
    <tr>
        <td class="slide-count p-1 bg-light text-center" style="width: 30px; vertical-align: middle;">
            <span>@{{ id }}</span>
        </td>
        <td>
            <div class="form-group">
                <select name="media[@{{ id }}][type]" id="media-type-@{{ id }}" class="form-control">
                    <option value="audio">Audio</option>
                    <option value="document">Document</option>
                    <option value="presentation">Presentation</option>
                    <option value="video">Video</option>
                </select>
            </div>
        </td>
        <td>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="media[@{{ id }}][url]" id="thumbnail-@{{ id }}" class="form-control" placeholder="Media">
                    <div class="input-group-append">
                        <button data-input="thumbnail-@{{ id }}" data-preview="holder" class="lfm btn btn-dark waves-effect waves-light" type="button">Choose a media</button>
                    </div>
                </div>
            </div>
        </td>
        <td class="slide-remove p-1 bg-light text-center" style="width: 12px; vertical-align: middle;">
            <button type="button" class="btn btn-sm btn-danger removeRow">
                <i class="feather-minus-circle"></i>
            </button>
        </td>
    </tr>
</script>