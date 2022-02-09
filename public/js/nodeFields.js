jQuery(document).ready(function(){
    gsNodeFieldsInit();
    gsRepeaterFieldsInit();
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
            'obj' : nodeForm.find('.form_obj').data('form_obj'),
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

function gsRepeaterFieldsInit() {

    let nodeForm = jQuery('.node_form');
    if(nodeForm.length == 0){
        return;
    }

    let repeaterAdd = nodeForm.find('.repeater_add');

    repeaterAdd.each(function( index ) {
        initRepeater(jQuery(this));
    });

    function initRepeater(repeaterAdd){
        let url = repeaterAdd.data('get_repeater_fields');
        let holder = repeaterAdd.parent('.repeater_holder');
        let fieldsHolder = holder.find('.repeater_fields_holder');
        let repeaterLoader = holder.find('.repeater_loader');

        var items_holder = '.repeater_fields_holder';

        jQuery( items_holder ).sortable({
            stop: function () {
                //console.log('stop');
            }
        });

        deleteBlocksInit();

        repeaterAdd.on( 'click', function(event) {
            event.preventDefault();
            getFields();
        });


        function deleteBlocksInit() {
            let repeaterDelete = holder.find('.delete_repeater_block');

            repeaterDelete.unbind('click');

            repeaterDelete.on( 'click', function(event) {
                event.preventDefault();
                let target = jQuery(this.closest('.repeater_block'));

                target.hide('slow', function(){ target.remove(); });
            });
        }

        function getFields(){
            let data = {
                '_token': nodeForm.find('input[name="_token"]').val(),
                'obj' : nodeForm.find('.form_obj').data('form_obj'),
            };

            repeaterLoader.show();

            jQuery.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function (response) {
                    fieldsHolder.append(response);
                    repeaterLoader.hide();
                    deleteBlocksInit();
                },

                statusCode: gsStatusCodes
            });
        }
    }


}



