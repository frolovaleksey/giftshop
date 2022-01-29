jQuery(document).ready(function(){
    gsNodeFieldsInit();
});



function gsNodeFieldsInit() {
    let nodeForm = jQuery('.node_form');
    if(nodeForm.length == 0){
        return;
    }

    let template = nodeForm.find('[name="template"]');
    if(template.length == 0){
        return;
    }

    let fields = nodeForm.find('.fields');
    if(fields.length == 0){
        return;
    }

    template.change(function() {
        getFields();
    });

    function getFields(){
        let data = {
            '_token': nodeForm.find('input[name="_token"]').val(),
            'tpl' : template.val(),
        };

        fields.html(
            '<div class="form-group"><div class="control-label col-md-3"></div><div class="col-md-4"><img src="'+loader_url+'"></div>'
        );

        jQuery.ajax({
            type: "POST",
            url: fields.data('get_fields'),
            data: data,
            success: function (response) {
                fields.html(response);
            },

            statusCode: gsStatusCodes
        });
    }
}


