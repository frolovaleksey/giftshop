jQuery('#modal_delete').on('show.bs.modal', function (event) {
    var button = jQuery(event.relatedTarget);
    var recipient = button.data('del_url');
    var modal = jQuery(this);
    modal.find('.delete_form').attr('action',recipient);
})

jQuery('#modal_delete_file').on('show.bs.modal', function (event) {
    var button = jQuery(event.relatedTarget);
    var recipient = button.data('del_url');
    var redirect = button.data('redirect_url');
    var modal = jQuery(this);
    modal.find('.delete_form').attr('action',recipient);
    modal.find("input[name='redirect']").val(redirect);
})