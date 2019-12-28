(function($) {
    $.fn.button = function(action) {
        if (action === 'loading' && this.data('loading-text')) {
            this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
        }
        if (action === 'reset' && this.data('original-text')) {
            this.html(this.data('original-text')).prop('disabled', false);
        }
    };


}(jQuery));
function clearForm(form) {
    form.find('input:text, input:password, select, textarea, input[type="number"], input[type="date"]').val('');
    form.find('.form-error').hide();
    form.find('.form-group').removeClass('has-error');
    form.find('.form-group').removeClass('has-danger');
    form.find('.help-block').hide();
    form.find('input:radio, input:checkbox').prop('checked', false);
};

$(document).on('click', '.removeRow', function(){
    $(this).closest('tr').remove();
});