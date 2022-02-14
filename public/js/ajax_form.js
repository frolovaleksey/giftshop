jQuery(document).ready(function(){
    bb_ajax_form_init();
});

function bb_ajax_form_init() {

    var forms = jQuery('[bb_ajax]');

    forms.each(function( index ) {

        jQuery(this).submit(function(e) {
            e.preventDefault();
            var $form = jQuery(this);
            var msg_block = $form.find('.invalid-feedback');

            var submit_btn = $form.find(':submit');
            var submit_btn_text = submit_btn.html();

            submit_btn.html(submit_btn_text + '<img height="15" src="'+loader_url+'">');

            jQuery.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: $form.serialize(),

                success: function (request) {

                    var callback = $form.attr('bb_ajax_callback');

                    submit_btn.html(submit_btn_text);

                    $form[0].reset();

                    if( callback !== undefined ){
                        window[callback](request);
                    }
                },

                statusCode: {
                    403: function(response) {
                        bb_dont_have_perrmissions();
                    },
                    422: function(response) {

                        submit_btn.html(submit_btn_text);

                        var errors = response['responseJSON']['errors'];

                        jQuery.each(errors, function( index ) {
                            var input =  jQuery( "input[name='"+index+"']" );
                            input.parent().parent('.form-group').addClass('has-error');

                            var textarea =  jQuery( "textarea[name='"+index+"']" );
                            textarea.parent().parent('.form-group').addClass('has-error');
                        });


                        msg_block.html('');
                        for (var key in errors) {
                            var input = $form.find('input[name="' + key + '"]');
                            input.append(errors[key]);

                            /*
                            var textarea = $form.find('textarea[name="' + key + '"]');
                            textarea.after(errors[key]);
                             */
                        }
                    }
                },
            });

        });
    });
}

function gs_comment_save(request) {
    var comment_table = jQuery('#admin_comment_table');
    bb_ajax_tables['admin_comment_table'].send_request(  comment_table.attr('bb-url') );
    jQuery('#add_comment').modal('hide');
}

