jQuery(document).ready(function(){
    bb_ajax_tables = [];

    bb_sort_init();
    bb_clean_modal_init();
    bb_ajax_exel_handler_init();
});

function bb_sort_init() {
    var sorthover          = jQuery('[bb-sort_block]');

    sorthover.each(function( index ) {
        var key;
        var key_i=1;

        if( jQuery(this).attr('id') !== undefined ){
            key = jQuery(this).attr('id');
        }else{
            key = 'edit_table_'+key_i;
            key_i++;
        }
        //bb_sort_item_init(jQuery(this));
        bb_ajax_tables[key] = bb_sort_item_init(jQuery(this));
    });

    //console.log(bb_ajax_tables);

    var sorthover_ins          = jQuery('[bb-sort_block_ins]');
    bb_sort_item_init(sorthover_ins);
}

function bb_sort_item_init(sorthover) {

    var search             = sorthover.find('[bb-search]');
    var search_group       = sorthover.find('[bb-sg]');
    var search_strong      = sorthover.find('[bb-sgs]');
    var search_special_sg  = sorthover.find('[bb-special_sg]');
    var order              = sorthover.find('[bb-order]');
    var special_order      = sorthover.find('[bb-special_order]');
    var cahnge             = sorthover.find('[bb-cahnge]');
    var per_page           = sorthover.find('[bb-per_page]');
    var date               = sorthover.find('.date-picker');
    var special_select     = sorthover.find('.special_select');

    var base_url           = sorthover.attr('bb-url');
    var data_holder        = sorthover.find('[bb-data_holder]');
    var search_button      = sorthover.find('[bb-search_button]');


    var noautoload         = sorthover.attr('bb-noautoload');
    var callback           = sorthover.attr('bb-callback');

    var reset_options      = sorthover.find('[bb-reset_options]');


    if( base_url === undefined ){
        return;
    }

    reset_options.on( "click", function(  ) {

        //jQuery(this).after('<img src="'+loader_url+'">');
        //location.reload();

        cahnge.each(function( index ) {
            var input = jQuery(this);
            var default_val = input.attr('bb-default');

            if( default_val !== undefined ){
                if(input.hasClass('bb_multiple_select')){
                    var input_id = input.attr('id');
                    var multiple_select = jQuery('#s2id_'+input_id);
                    multiple_select.find('.select2-search-choice').remove();
                }
                input.val(default_val);
            }

        });

        cahnge.unbind('textchange');
        cahnge.bind('textchange', function () {
            search_handler(this);
        });

        bb_send_request();
    });


    url = base_url;

    if( noautoload === undefined ){
        bb_send_request();
    }

    bb_pagination_init();

    // pagination
    function bb_pagination_init() {

        var paginationhover  = sorthover.find('[bb-paginaion]');
        var pagination       = sorthover.find('.pagination');
        var pagination_links = pagination.find('.page-item');

        pagination_links.on( "click", function( event ) {

            event.preventDefault();

            var link = jQuery(this).find('a');
            url = link.attr('href');

            // send request to server
            bb_send_request();
        });
    }


    date.change(function () {
        search_handler(this);
    });

    special_select.change(function () {
        search_handler(this);
    });

    // https://zurb.com/playground/jquery-text-change-custom-event
    cahnge.bind('textchange', function () {
        search_handler(this);
    });

    function search_handler(obj){

        var paramentr = jQuery(obj);

        if( paramentr.attr('bb-search') !== undefined ){
            search_group.val('');
            search_special_sg.val('');
        }

        if( paramentr.attr('bb-sg') !== undefined ){
            search.val('');
        }

        if( paramentr.attr('bb-special_sg') !== undefined ){
            search.val('');
        }

        url = base_url;
        bb_send_request();
    }

    order.on( "click", function(  ) {
        order_handler(this);
    });

    special_order.on( "click", function(  ) {
        order_handler(this);
    });

    function order_handler(obj){
        // set active
        var paramentr = jQuery(obj);
        var parametr_name = paramentr.attr('bb-name');
        var parent = paramentr.closest('[bb-group]');
        var order = paramentr.attr('bb-sort');

        var related_parametrs = jQuery(parent).find("[active]");
        related_parametrs.removeAttr('active');

        related_parametrs.removeClass('sorting_desc');
        related_parametrs.removeClass('sorting_asc');
        related_parametrs.attr('bb-sort', '');

        paramentr.attr('active', 'asc');

        if( order == 'asc' ){
            paramentr.attr('bb-sort', 'desc');
            paramentr.addClass('sorting_desc');
        }else{
            paramentr.attr('bb-sort', 'asc');
            paramentr.addClass('sorting_asc');
        }

        url = base_url;
        bb_send_request();
    }

    search_button.on( "click", function(  ) {
        url = base_url;
        bb_send_request();
    });

    function bb_sort_prepare_data() {

        elements_order = order.filter('[active]');
        elements_special_order = special_order.filter('[active]');

        var data = {};

        elements_order.each(function( index ) {
            if( jQuery(this).attr('bb-sort') ){
                data[ 'order[' + jQuery(this).attr('bb-name') + ']' ] = jQuery(this).attr('bb-sort');
            }
        });

        elements_special_order.each(function( index ) {
            if( jQuery(this).attr('bb-sort') ){
                data[ 'special_order[' + jQuery(this).attr('bb-name') + ']' ] = jQuery(this).attr('bb-sort');
            }
        })

        search.each(function( index ) {
            if( jQuery(this).val() != ''){
                data[jQuery(this).attr('name')] = jQuery(this).val();
            }
        });

        search_group.each(function( index ) {
            if( jQuery(this).val() != '') {
                data[ 'sg[' +  jQuery(this).attr('name')  + ']'] = jQuery(this).val();
            }
        });

        search_special_sg.each(function( index ) {
            if( jQuery(this).val() != '') {
                data[ 'special_sg[' +  jQuery(this).attr('name')  + ']'] = jQuery(this).val();
            }
        });

        search_strong.each(function( index ) {
            if( jQuery(this).val() != '') {
                data[ 'sgs[' +  jQuery(this).attr('name')  + ']'] = jQuery(this).val();
            }
        });


        per_page.each(function( index ) {
            data[jQuery(this).attr('name')] = jQuery(this).val();
        });

        return data;
    }

    function bb_send_request( specialUrl=false ) {

        var data = bb_sort_prepare_data();

        var requestUrl = url;
        if( specialUrl ){
            var requestUrl = specialUrl;
        }

        // loader
        data_holder.html('<tr style="height: '+data_holder.height()+'px; "><td colspan="100%" class="tb_loader"><img src="'+loader_url+'"></td></tr>');

        jQuery.ajax({
            type:"GET",
            cache:false,
            url:requestUrl,
            data:data,
            success: function (request) {

                var data_holder_req = jQuery(request).find('[bb-data_holder]');
                data_holder.html(data_holder_req.html());

                var pagination_req = jQuery(request).find('.pagination-block');
                var paginationhover  = sorthover.find('[bb-paginaion]');
                paginationhover.html(pagination_req);

                bb_pagination_init();

                bb_init_choice();

                Metronic.init();

                bb_arrival_table_init();

                bb_chekbox_table_init();

                if( callback !== undefined ){
                    window[callback]();
                }

                //jQuery('body').modalmanager('removeLoading');
            },

            statusCode: {
                403: function(response) {
                    bb_dont_have_perrmissions();
                }
            },
        });
    }

    function bb_send_special_request( specialUrl=false, callbackFnc, obj ) {

        var data = bb_sort_prepare_data();

        var requestUrl = url;
        if( specialUrl ){
            var requestUrl = specialUrl;
        }

        jQuery.ajax({
            type:"GET",
            cache:false,
            url:requestUrl,
            data:data,
            success: function(result) {
                if( callback !== undefined ) {
                    window[callbackFnc](result, obj);
                }
            },

            statusCode: {
                403: function(response) {
                    bb_dont_have_perrmissions();
                }
            },
        });
    }

    // Choise from modal table
    function bb_init_choice() {
        var choice = jQuery('[data-choice]');
        var modal  = jQuery('#modal_table');

        choice.on( "click", function( event ) {

            event.preventDefault();

            var id = jQuery(this).data('id');
            var text = jQuery(this).data('text');
            var callback = jQuery(this).data('callback');

            if( callback !== undefined ){
                window[callback](this);
            }


            jQuery('#'+bb_button_input).val(id);

            if(bb_button_span_class!== undefined){
                jQuery('.'+bb_button_span_class).html( text+' - id='+id );
            }else{
                jQuery('#'+bb_button_span).html( text+' - id='+id );
            }

            var attr = bb_modal_button.attr('data-contract_related');
            if (typeof attr !== typeof undefined && attr !== false) {
                var url = bb_modal_button.attr('data-student_contracts');
                get_contracts(url, id, attr);
            }

            modal.modal('hide');
        });
    }

    function get_contracts(url, id, select) {
        jQuery.ajax({
            type:"GET",
            cache:false,
            url:url,
            data:{'student_id':id},
            success: function (request) {

                jQuery('#'+select)
                    .find('option')
                    .remove();

                jQuery.each(request, function(index, value) {
                    //console.log(index, value);
                    jQuery('#'+select)
                        .append(jQuery("<option></option>")
                            .attr("value", index)
                            .text(value));
                });
            },

            statusCode: {
                403: function(response) {
                    bb_dont_have_perrmissions();
                }
            },
        });
    }

    return {
        send_request: function() {
            bb_send_request();
            return;
        },
        send_special_request: function(url, callbackFnc, obj) {
            return bb_send_special_request(url, callbackFnc, obj);
        },
    };
}

function bb_clean_modal_init() {
    var clean = jQuery('[data-clean]');

    clean.on( "click", function( event ) {

        event.preventDefault();

        var clean_input = jQuery(this).data('clean_input');
        var clean_span = jQuery(this).data('clean_span');
        var clean_span_class = jQuery(this).data('clean_span_class');

        if( clean_span_class !== undefined){
            jQuery('.'+clean_span_class).html('');
        }else{
            jQuery('#'+clean_span).html('');
        }


        jQuery('#'+clean_input).val('');

    });
}


function bb_ajax_exel_handler_init() {
    var holder = jQuery('.get_exel_holder');
    var btn = holder.find('.exel_button');
    var data = holder.find('.exel_button_data');
    btn.on( "click", function( event ) {
        event.preventDefault();

        data.html('<img src="'+loader_url+'">');
        bb_ajax_tables['partner_table'].send_special_request(btn.attr('href'), 'bb_ajax_exel_handler_callback', holder);
    });
}

function bb_ajax_exel_handler_callback(url, obj){
    var data = obj.find('.exel_button_data');
    data.html('<a target="_blank" href="'+url+'">Download file</a>');
}
