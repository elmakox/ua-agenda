<script id="goal-template" type="text/x-handlebars-template">
    <tr>
        <td class="slide-count p-1 bg-light text-center" style="width: 30px; vertical-align: middle;">
            <span>@{{ id }}</span>
        </td>
        <td class="goal-fields">
            <div class="form-group">
                <input type="text" class="form-control" name="goal[@{{ id }}][title]" autocomplete="off" placeholder="Title of the goal">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="goal[@{{ id }}][body]" rows="3" placeholder="The goal"></textarea>
            </div>
        </td>
        <td class="slide-remove p-1 bg-light text-center" style="width: 12px; vertical-align: middle;">
            <button type="button" class="btn btn-sm btn-danger removeRow">
                <i class="feather-minus-circle"></i>
            </button>
        </td>
    </tr>
</script>