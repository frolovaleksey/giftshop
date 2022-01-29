jQuery(document).ready(function(){
    bb_a_year_init();

    bb_contract_relation_init();

    bb_select2_init();
    bb_multiple_select_init();
    bb_pay_source_init();
    bb_invoice_payer_init();
    bb_invoice_fields_init();
    //bb_arrival_table_init();
    bb_contracts_bills_openclose();
    bb_number_of_students_form_init();

    bb_insurance_var_form_init();
    bb_chekbox_table_init();
    bb_chekbox_table_select_buttons_init();
    bb_manager_commisoin_change_submit_init();
    bb_slavia_commisoin_change_submit_init();
    bb_a_year_summer_students_init();

    bb_summer_students_move_food_init();

    bb_payment_type_relation_init();

    bb_residence_form_init();
    collapse_init();

    bb_zalog_payment_form_alert_init();

    bb_submit_zalog_payment_init();

    //test();

    bb_group_change_init();

    bb_contract_acc_date_by_program_init();

    bb_accommodation_date_select_year_init();
    bb_accommodation_select_eur_hepler_init();

    bb_edit_ceil_init_triger = 0;

    bb_cashbox_sum_refresh_init();

    bb_exchange_rate_init();

    bb_balls_report_btn_init();

    bb_highlight_table_init();

    bb_commision_nopay_init();
});

var gsStatusCodes = {
    403: function(response) {
        bb_dont_have_perrmissions();
    },
    500: function(response) {
        bb_ajax_error();
    },
    422: function(response) {

        var errors = response['responseJSON']['errors'];

        var txt = '';
        for (var key in errors) {
            txt = txt + ajax_errors_keys[key] +':' + errors[key];
        }
        alert(txt);
    }
};



function test( ) {
    alert('test');
}

function bb_redirect_home() {
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    window.location.href = baseUrl;
}

function bb_commision_nopay_init() {
    var date = jQuery('#date');
    var currentDate = date.val();
    jQuery('#commision_nopay').change(function() {
        if(this.checked) {
            date.val('');
        }else{
            date.val(currentDate);
        }
    });
}

function bb_highlight_table_init() {
    jQuery(".highlight tr").click(function() {
        jQuery(this).toggleClass("bb_highlight");
    });
}

function pad (str, max) {
    str = str.toString();
    return str.length < max ? pad("0" + str, max) : str;
}

function bb_balls_report_btn_init() {
    var btn = jQuery('.balls_report_btn');

    if(btn.length == 0){
        return;
    }

    var a_year = jQuery('#a_year');
    var month = jQuery('#payment_date');
    var manager = jQuery('#user_id');

    updateText();

    a_year.bind('textchange', function () {
        updateText();
    });
    month.bind('textchange', function () {
        updateText();
    });
    manager.bind('textchange', function () {
        updateText();
    });

    function updateText(){
        var txt = btn.data('text');
        txt = txt + jQuery("#payment_date option:selected").text() + ' ' + jQuery("#a_year option:selected").text()  + ' ' + jQuery("#user_id option:selected").text() ;
        btn.html(  txt );
    }

}

function bb_contractcomment(button, request) {
    //console.log(button, request, request['action_url']);
    button.data('action_url', request['action_url']);
    button.data('method', request['method']);
    button.data('content', request['content']);
    var icon = button.find('i');

    if(request['content'] !== null){
        icon.removeClass('fa-comment-o');
        icon.addClass('fa-comment');
    }else{
        icon.removeClass('fa-comment');
        icon.addClass('fa-comment-o');
    }
}


function bb_find_in_table(input_id, table_id, td_num=1) {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById(input_id);
    filter = input.value.toUpperCase();
    table = document.getElementById(table_id);
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[td_num];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function bb_comm_note_amount_recount() {

    var amount = jQuery('.comm_note_amount');
    var balance = jQuery('.commission_balance');
    var commission_value = jQuery('.partner_commission_value').data('value');
    var sum = 0;

    amount.each(function (index) {
        sum = sum + Number(jQuery(this).html());
    });

    balance.html(commission_value - sum);
}

function bb_remove_class_hidden(selector) {
    jQuery(selector).removeClass('hidden');
}

function bb_reloadpage() {
    window.location.reload(false);
}

function bb_contract_relation_init() {
    var element1 = jQuery('#type');
    bb_relation_bloks_handler(element1);

    var element2 = jQuery('#filial_id');
    bb_relation_bloks_handler(element2);
}

function bb_submit_zalog_payment_init() {
    var form = jQuery('.zalog_payment');
    var button = jQuery('.submit_zalog_payment');

    button.on("click", function(event){
        form.submit();
    });

    let hidden = jQuery('.hidden_payment_method_type');

    if(hidden.length !==0 ){
        let exchange_czk = jQuery('.exchange_czk');
        let exchange_eur = jQuery('.exchange_eur');

        if(exchange_czk.length !==0 ){
            bb_zalog_payment_form_handle(exchange_czk);
        }

        if(exchange_eur.length !==0 ){
            bb_zalog_payment_form_handle(exchange_eur);
        }
    }
}

function bb_zalog_payment_form_alert_init(){

    var form = jQuery('.zalog_payment');
    var button = form.find('.submit_form');

    button.on('click', function(e){

        var payment_method_type = jQuery('#payment_method_type').val();

        if(payment_method_type == 'deposit_exchange_eur' || payment_method_type == 'deposit_exchange_czk'){
            var valid = true;

            if( payment_method_type == 'deposit_exchange_czk' ){
                var block = form.find('.exchange_czk');
            }else{
                var block = form.find('.exchange_eur');
            }

            var main_input = block.find('.main_input');
            var slave_input = block.find('.slave_input');
            var exchange_rate = block.data('exchange_rate');

            var counted_val = Math.round(main_input.val()/exchange_rate);
            var real_val = slave_input.val()*1;

            if(counted_val!==real_val){
                valid = false;
            }

            if(!valid) {
                jQuery('#modal_deposit_alert').modal();
                e.preventDefault();
            }
        }
    });
}

function bb_zalog_payment_form_handle( object ) {
    var form = jQuery('.zalog_payment');

    var main_input = jQuery(object).find('.main_input');
    var slave_input = jQuery(object).find('.slave_input');
    var exchange_rate = jQuery(object).data('exchange_rate');

    main_input.bind('textchange', function () {
        slave_input.attr('readonly', '');

        slave_input.val( Math.round(main_input.val()/exchange_rate) );
        slave_input.removeAttr('readonly');
    });
}

function bb_group_change_init() {
    var group_change = jQuery('.group_change');
    var group_change_select = jQuery('.group_change_select');
    var checkbox_indicator = jQuery('.group_change_checkbox_indicator');
    var checkbox_table_form = jQuery('#checkbox_table_form');


    group_change.on("click", function(event){
        event.preventDefault();
        checkbox_table_form.toggleClass('hidden');
        set_checkbox_indicator();
    });

    group_change_select.on("change", function(event){
        group_change_block_hidden();
        var value = jQuery(this).val();
        if(value!==''){
            jQuery('.'+ value).toggleClass('hidden');
        }
    });

    function group_change_block_hidden() {
        var group_change_block = jQuery('.group_change_block');
        group_change_block.addClass('hidden');
    }

    function set_checkbox_indicator() {

        var bb_td_checkbox = jQuery('.bb_td_checkbox');

        if(checkbox_table_form.hasClass('hidden')){
            checkbox_indicator.val('0');
            bb_td_checkbox.addClass('hidden');
        }else{
            checkbox_indicator.val('1');
            bb_td_checkbox.removeClass('hidden');
        }
    }
}


function bb_table_edit_checbox() {
    bb_edit_ceil_init_triger = 0;
    bb_edit_ceil_init();
    bb_chekbox_table_select_buttons_init();
    bb_highlight_table_init();
}

function collapse_init() {
    jQuery('[data-toggle="collapse"]').click(function () {

        if( jQuery(this).data('text_show') === undefined ){
            return;
        }

        if( jQuery(this).data('text_hide') === undefined ){
            return;
        }

        if (jQuery(this).hasClass("collapsed")) {
            jQuery(this).text(jQuery(this).data('text_hide'));
        } else {
            jQuery(this).text(jQuery(this).data('text_show'));
        }
    });
}

function bb_residence_form_init() {
    var residence_form = jQuery('.residence_form');
    var house_id = residence_form.find('#house_id');
    var accommodation = jQuery('input[name="accommodation_id"]');
    var data_holder = jQuery('.residence_prices_holder');
    var CZK_input = jQuery('#CZK');
    var EUR_input = jQuery('#EUR');
    var acc_date = jQuery('#acc_date');
    var house_price_url = jQuery('.house_price_url').data('house_price');

    house_id.on("change", function(event){

        CZK_input.attr('readonly', '');
        EUR_input.attr('readonly', '');

        data_holder.html('<img src="'+loader_url+'">');

        // For accomodation form
        var a_year = null;
        if(accommodation.length === 0){
            a_year = jQuery('#a_year').val();
        }

        var acc_date_val = null;
        if( acc_date.length !== 0 ){
            acc_date_val = acc_date.val();
        }else{
            acc_date_val = jQuery('#start').val();
        }

        var data = {
            house_id : jQuery(this).val(),
            acc_date : acc_date_val,
            acc_id : accommodation.val(),
            a_year : a_year,
        };

        jQuery.ajax({
            type: "POST",
            url: house_price_url,
            data: data,
            success: function (response) {
                var czk = response.czk;
                var eur = response.eur;

                CZK_input.val(czk);
                EUR_input.val(eur);

                CZK_input.removeAttr('readonly');
                EUR_input.removeAttr('readonly');

                data_holder.html('');
            },

            statusCode: {
                403: function(response) {
                    bb_dont_have_perrmissions();
                }
            },
        });
    });

}

function bb_payment_type_relation_init() {
    var element1 = jQuery('#payment_method_type');
    bb_relation_bloks_handler(element1);

    var element2 = jQuery('#currency');
    bb_relation_bloks_handler(element2);

    jQuery('*[data-select_relation_action]').each(function( index ) {
        bb_relation_bloks_handler(jQuery(this));
    });

}

function bb_relation_bloks_handler(element) {

    bb_relation_bloks_update(element);

    element.on("change", function(event){
        bb_relation_bloks_update(jQuery(this));
    });
}

function bb_relation_bloks_update(element) {
    var val = element.val();
    var name = element.attr('name');
    var rel_elements = jQuery('*[data-select_relation_name='+name+']');
    var rel_element = jQuery('*[data-select_relation_name='+name+'][data-select_relation_value_'+val+']');

    rel_elements.addClass('hidden')
    rel_element.removeClass('hidden');
}


function bb_summer_students_move_food_init(){
    var move_food = jQuery('input[name=move_food]');
    set_move_food_holder();

    move_food.change(function() {
        set_move_food_holder();
    });

    function set_move_food_holder(){
        var holder = jQuery('#move_food_holder');
        var checked = jQuery('input[name=move_food]:checked').val();
        if(checked == '1'){
            holder.show();
        }else{
            holder.hide();
        }
    }
}

function bb_a_year_summer_students_init() {
    var a_year = jQuery('#a_year_summer_students');
    var student = jQuery('#summer_students_student_id');

    student.data('table_url', a_year.val() );

    a_year.on("change", function(event){
        student.data('table_url', a_year.val() );
    });
}

function bb_chekbox_table_select_buttons_init() {
    var select_all = jQuery('.checkbox_table_select_all');
    var deselect_al = jQuery('.checkbox_table_deselect_all');

    select_all.on("click", function(event){
        event.preventDefault();

        var insurance = jQuery('.checkbox_tb_checbox');

        insurance.each(function( index ) {
            var current = jQuery(this);
            var tr = current.closest('tr');

            current.attr('checked','checked');
            current.parent('span').addClass('checked');
            tr.addClass('selected');
            chekbox_table_storage.push(current.val());
        });

        bb_checkbox_table_check_button();
    });

    deselect_al.on("click", function(event){
        event.preventDefault();
        deselect();
    });

    function deselect() {
        var insurance = jQuery('.checkbox_tb_checbox');

        insurance.each(function( index ) {
            var current = jQuery(this);
            var tr = current.closest('tr');

            current.removeAttr('checked');
            current.parent('span').removeClass('checked');
            tr.removeClass('selected');
            chekbox_table_storage.splice( chekbox_table_storage.indexOf(current.val()),1 );
        });

        bb_checkbox_table_check_button();
    }

    return {
        deselect: function() {
            deselect();
            return;
        }
    };
}


function bb_slavia_commisoin_change_submit_init() {
    var button = jQuery('.slavia_commisoin_change_submit');
    var form = jQuery('#checkbox_table_form');

    button.on("click", function(event){
        event.preventDefault();

        var action = button.data('action');
        form.attr('action', action);

        bb_chekbox_table_storage_submit();
    });
}


function bb_manager_commisoin_change_submit_init() {
    var button = jQuery('.manager_commisoin_change_submit');
    var form = jQuery('#checkbox_table_form');

    button.on("click", function(event){
        event.preventDefault();

        var action = button.data('action');
        var value = jQuery('#manager_com_value').val();

        form.append('<input type="hidden" name="manager_com_value" value="'+value+'"/>');
        form.attr('action', action);

        bb_chekbox_table_storage_submit();
    });
}


var chekbox_table_storage = [];


function bb_chekbox_table_storage_submit(){
    var form = jQuery('#checkbox_table_form');
    jQuery.each(chekbox_table_storage,function(index,value){
        /*form.append('<input type="hidden" name="insurance[]" value="'+value+'"/>');*/
        form.append('<input type="hidden" name="items_value[]" value="'+value+'"/>');
    });

    form.submit();
}

function bb_insurance_var_form_init() {
    var date = jQuery('#ins_var_date');
    var variable_symbol = jQuery('#variable_symbol');

    date.on('change', function () {
        var date_parts = date.val().split('.');
        var var_simbol_val =  '45'+date_parts[2]+date_parts[1]+date_parts[0];
        variable_symbol.val(var_simbol_val);
    });
}


function bb_chekbox_table_init(){
    var insurance = jQuery('.checkbox_tb_checbox');

    insurance.each(function( index ) {
        var current = jQuery(this);
        if( chekbox_table_storage.indexOf( current.val() ) !== -1 ){
            var tr = current.closest('tr');

            current.attr('checked','checked');
            current.parent('span').addClass('checked');
            tr.addClass('selected');
        }
    });

    bb_checkbox_table_check_button();

    insurance.on("change", function(event){
        event.preventDefault();

        var current = jQuery(this);
        var tr = current.closest('tr');

        if(current.attr('checked') === 'checked'){
            tr.addClass('selected');
            chekbox_table_storage.push(current.val());
            bb_checkbox_table_check_button();
        }else{
            tr.removeClass('selected');
            chekbox_table_storage.splice( chekbox_table_storage.indexOf(current.val()),1 );
            bb_checkbox_table_check_button();
        }

    });
}

function bb_checkbox_table_check_button() {
    var button = jQuery('.checkbox_table_button');

    if(chekbox_table_storage.length > 0){
        button.removeAttr('disabled');
    }else{
        button.attr('disabled', '');
    }
}



function bb_number_of_students_form_init() {
    var form = jQuery('#number_of_students_form');
    var action = form.attr('action');

    form.on("submit", function(event){
        event.preventDefault();

        var house_id = form.find('#house_id').val();
        var month = form.find('#month').val();
        var token = form.find('input[name="_token"]').val();
        var a_year = jQuery('select[name="a_year"]').val();

        var data;

        data = {
            'house_id':house_id,
            'month':month,
            '_token':token,
            'a_year':a_year
        };

        jQuery.ajax({
            type: "POST",
            url: action,
            data: data,
            success: function (request) {
                var number_fullm = request.number_fullm;
                var number_halfm = request.number_halfm;
                jQuery('.number_fullm').html(number_fullm);
                jQuery('.number_halfm').html(number_halfm);
                jQuery('.number_total').html(number_fullm+number_halfm);
            },

            statusCode: {
                403: function(response) {
                    bb_dont_have_perrmissions();
                }
            },
        });
    });
}

function bb_contracts_bills_openclose() {
    var toggle = jQuery('.openclose_toggle');
    toggle.on("click", function(event){
        event.preventDefault();

        var target = jQuery(this).data('target');
        var target_block = jQuery(target);
        if(target_block.hasClass('hidden')){
            target_block.removeClass('hidden');
            jQuery(this).find('.opencloce_close').removeClass('hidden');
            jQuery(this).find('.opencloce_open').addClass('hidden');
        }else{
            target_block.addClass('hidden');
            jQuery(this).find('.opencloce_close').addClass('hidden');
            jQuery(this).find('.opencloce_open').removeClass('hidden');
        }
    });
}

function bb_arrival_table_init() {

    popvers_tpl_init();

    // set template to popver and fill form fields
    function popvers_tpl_init(){
        var popover = jQuery("[data-toggle='popover']")
        popover.on('shown.bs.popover', function(){
            var popver_tpl = jQuery(this).siblings('.popver_tpl');
            var popover_obj = jQuery(this).siblings('.popover').find('.popover-content');

            popver_tpl.find('.arrival_control').each(function( index ) {
                var value = jQuery(this).val();
                var name = jQuery(this).attr('name');
                popover_obj.find('[name="'+name+'"]').val(value);
            });
        });
    }


    jQuery(document).on("click", ".popover .close_popver" , function(){
        jQuery(this).parents(".popover").popover('hide');
    });

    jQuery(document).on("click", ".popover .save_popver" , function(){
        var popover = jQuery(this).parents(".popover");
        var popver_tpl = popover.siblings('.popver_tpl');
        var popver_link = popover.siblings('.popovers');
        var callback = popver_link.data('callback');
        var next = popver_link.data('next');
        var tr = popover.closest('tr');

        var callback_text = '';

        var data = popover.find('.popover-content');
        var arrival_controls = data.find('.arrival_control');

        arrival_controls.each(function( index ) {
            var value = jQuery(this).val();
            var name = jQuery(this).attr('name');
            popver_tpl.find('[name="'+name+'"]').val(value);
        });

        // set table ceil text
        switch (callback) {
            case 'text':
                arrival_controls.each(function( index ) {
                    callback_text = callback_text + jQuery(this).val().trim();
                });

                if( popver_link.html().trim() != callback_text ){
                    if(callback_text==''){
                        callback_text = 'Empty';
                    }
                    popver_link.html(callback_text);
                    activate_save();
                }

                break;

            case 'bigdate':
                var day = pad(arrival_controls.filter('.day').val(),2);
                var month = pad(arrival_controls.filter('.month').val(),2);
                var year = arrival_controls.filter('.year').val();
                var hour = pad(arrival_controls.filter('.hour').val(), 2);
                var minute = pad(arrival_controls.filter('.minute').val(), 2);

                callback_text = (day+'.'+month+'.'+year+' '+hour+':'+minute).trim();

                if( popver_link.html().trim() != callback_text ){
                    if(callback_text==''){
                        callback_text = 'Empty';
                    }
                    popver_link.html(callback_text);
                    activate_save();
                }
                break;

            case 'comment':
                var arrival_comment = arrival_controls.filter('.arrival_comment').val();
                var callback_text = '<span class="popovers" data-trigger="hover" data-container="body" data-placement="right" data-html="true" data-content="'+arrival_comment+'"><i class="fa fa-comment"></i></span>';

                if( arrival_comment.trim() == ''){
                    callback_text = '<i class="fa fa-comment-o"></i>';
                }

                popver_link.html(callback_text);
                Metronic.init();
                activate_save();
                break;

            case 'arrival_place':
                var select = arrival_controls.filter('.arrival_place_id');
                var place_id = select.val();
                selec_text = select.find("option[value='"+place_id+"']").text();
                popver_link.html(selec_text);
                activate_save();
                break;

            case 'house':
                var select = arrival_controls.filter('.house');
                var place_id = select.val();
                selec_text = select.find("option[value='"+place_id+"']").text();
                popver_link.html(selec_text);
                activate_save();
                break;
        }

        popover.popover('hide');
        popvers_tpl_init();

        //open next popover
        tr.find('.'+next).popover('show');

        function activate_save() {
            var active_save = tr.find('.active_save');
            var inactive_save = tr.find('.inactive_save');
            active_save.removeClass('hidden');
            inactive_save.addClass('hidden');
        }



    });

    var arrival_save = jQuery('.arrival_save');

    arrival_save.unbind('click');
    arrival_save.on( 'click', function(event) {
        event.preventDefault();

        var save = jQuery(this);
        var url = save.data('url');
        var tr = save.closest('tr');

        var values = tr.find('.arrival_control');
        var data = {};

        values.each(function( index ) {
            var value = jQuery(this).val();
            var name = jQuery(this).attr('name');
            data[name]=value;
        });
        data['_method'] = save.data('method');

        jQuery.ajax({
            type:"POST",
            cache:false,
            url:url,
            data:data,
            success: function (request) {
                save.data('url', request['route']);
                save.data('method', 'PUT');

                var active_save = tr.find('.active_save');
                var inactive_save = tr.find('.inactive_save');
                active_save.addClass('hidden');
                inactive_save.removeClass('hidden');

                tr.stop().css("background-color", "green")
                    .animate({ backgroundColor: "#FFFFFF"}, 500);

                var accommodation = tr.find('.accommodation_td');
                accommodation.html('<a href="'+request['route_acc']+'" target="_blank"><i class="fa fa-external-link"></i></a>');

            },

            statusCode: {
                403: function(response) {
                    bb_dont_have_perrmissions();
                },
                500: function(response) {
                    bb_ajax_error();
                },
                422: function(response) {

                    var errors = response['responseJSON']['errors'];

                    var txt = '';
                    for (var key in errors) {
                        txt = txt + ajax_errors_keys[key] +':' + errors[key];
                    }
                    alert(txt);
                }
            },
        });
    });

}

function bb_invoice_fields_init(){

    init_table();

    // Table contract checkboxes
    var inv_type = jQuery('[data-inv_type]');
    inv_type.on( 'click', function(event) {
        event.preventDefault();

        var inv_type = jQuery(this).data('inv_type');
        var doc_type = jQuery(this).data('doc_type');
        var checkboxes = jQuery('.contract_to_invoice');

        checkboxes.each(function( index ) {
            if(jQuery(this).attr("checked") == 'checked') {

                var temp_text = jQuery(this).data('inv_type_'+inv_type);
                var temp_contract_id = jQuery(this).val();

                jQuery('.invoice-table tbody').append('<tr><td>'+temp_text+'</td><td><input class="form-control amout_field" name="'+doc_type+'_'+inv_type+'['+temp_contract_id+']" type="text" value=""></td><td><i class="icon-trash icon-large btn btn-danger remove-row"></i></td></tr>');
            }
        });

        init_table();
    });

    // Free text
    var free_add = jQuery('.free_add');
    free_add.on( 'click', function(event) {
        event.preventDefault();

        var free_amount_text = jQuery('#free_amount_text').val();
        var free_amount_value = jQuery('#free_amount_value').val();

        jQuery('.invoice-table tbody')
            .append('<tr><td>'+free_amount_text+'<input type="hidden" value="'+free_amount_text+'" name="free_amount_text[]"></td><td><input class="form-control amout_field" name="free_amount_value[]" type="text" value="'+free_amount_value+'"></td><td><i class="icon-trash icon-large btn btn-danger remove-row"></i></td></tr>');

        init_table();
        count_sum();
    });

    function init_table() {
        var remove = jQuery('.remove-row');
        var inputs = jQuery('.amout_field');

        // Removing row
        remove.on( 'click', function() {
            jQuery( this ).closest( 'tr' ).remove();
            count_sum();
        });

        inputs.bind('textchange', function () {
            count_sum();
        });
    }

    // Calculate total
    function count_sum() {
        var amout_fields = jQuery('.amout_field');
        var sum_holder = jQuery('.amount_sum');
        var sum = 0;

        amout_fields.each(function( index ) {
            if( jQuery(this).val() != '') {
                sum = sum + parseInt(jQuery(this).val());
            }
        });

        sum_holder.html(sum);
    }

}

function bb_invoice_payer_init() {
    var payer_type_select = jQuery('#payer_type');
    set_active_payer();

    payer_type_select.on('change', function(){
        set_active_payer();
    });

    function set_active_payer() {
        var payer_type_value = payer_type_select.val();
        var payers = jQuery('[data-payer]');
        var active_payer = jQuery('[data-payer="'+payer_type_value+'"]');

        payers.addClass('hidden');
        active_payer.removeClass('hidden');
    }
}

function bb_pay_source_init() {
    var source = jQuery('#source');
    var different_payer = jQuery("[name='different_payer']");
    var payer_holder = jQuery('#payer_holder');
    var different_payer_holder = jQuery('#different_payer_holder');

    set_different_payer_holder();
    set_payer_holder();

    source.on('change', function(){
        set_different_payer_holder();
        set_payer_holder();
    });

    different_payer.on('change', function(){
        set_payer_holder();
    });

    function set_different_payer_holder() {
        if( source.val() == 'cash'){
            different_payer_holder.removeClass('hidden');
        }else{
            different_payer_holder.addClass('hidden');
        }
    }

    function set_payer_holder() {
        if(jQuery("input[name='different_payer']:checked").val() == '1'){
            payer_holder.removeClass('hidden');
        }else{
            payer_holder.addClass('hidden');
        }
    }
}

function bb_select2_init() {
    jQuery('#programs_table').select2({
        placeholder: jQuery(this).data('placeholder'),
        allowClear: true
    });
}

function bb_multiple_select_init() {
    jQuery('.bb_multiple_select').select2({
        placeholder: jQuery(this).data('placeholder'),
        allowClear: true
    });
}



function bb_a_year_init() {
    var a_year = jQuery('#a_year');
    var a_year_end = jQuery('#a_year_end');

    set_a_year_end();

    a_year.bind('textchange', function () {
        set_a_year_end();
    });

    function set_a_year_end() {
        a_year_end.html( (a_year.val()*1)+1);
    }
}


function bb_dont_have_perrmissions(){
    alert('User does not have the right permissions.');
}

function bb_ajax_error(){
    alert('Internal error');
}

function bb_contract_acc_date_by_program_init(){
    $program = jQuery('#program_id');
    lock_cats = $program.data('lock_cats');
    $selectable_acc = jQuery('.selectable_acc');
    $unselectable_acc = jQuery('.unselectable_acc');

    set_unsel();

    $program.on("change", function(event){
        var value = jQuery(this).val();
        var selected = $(':selected', this);
        var optgroup = selected.closest('optgroup').attr('value');

        if( lock_cats.indexOf( Number(optgroup)) == -1 ){
            set_sel();
        }else{
            set_unsel();
        }

    });

    function set_sel() {
        $unselectable_acc.addClass('hidden');
        $selectable_acc.removeClass('hidden');
    }

    function set_unsel() {
        $selectable_acc.addClass('hidden');
        $unselectable_acc.removeClass('hidden');
    }

}

function bb_accommodation_date_select_year_init(){
    var form   = jQuery('.acc_date_form');
    var a_year = form.find('#a_year');
    var start  = form.find('#start');
    var end    = form.find('#end');

    a_year.on('change', function () {
        var year = a_year.val();

        var optgroups = start.find('optgroup');
        var start_option_0 = optgroups[0];
        var start_option_1 = optgroups[1];

        jQuery(start_option_0).attr('label', year);
        jQuery(start_option_1).attr('label', (year)*1 +1);

        var optgroups = end.find('optgroup');
        var end_option_0 = optgroups[0];
        var end_option_1 = optgroups[1];

        jQuery(end_option_0).attr('label', year);
        jQuery(end_option_1).attr('label', (year)*1 +1);
    });
}

function bb_accommodation_select_eur_hepler_init(){
    var price = jQuery('[name=CZK]');
    var prices = jQuery('.accommodation_prices').data('acc_prices');
    var price_eur = jQuery('.price_eur');

    if(prices === undefined){
        return;
    }

    set_eur();

    price.on('change', function () {
        set_eur();
    });

    function set_eur() {
        var price_czk = price.val();
        price_eur.html(prices[price_czk]);
    }
}

function bb_cashbox_sum_refresh_init(){

    var time = 1000 * 60;

    setTimeout(function() {
        jQuery('.refresh_btn').removeClass('btn-success').addClass('btn-danger');
    }, time);
}

function bb_exchange_rate_init(){
    var form        = jQuery('.exchange_form');
    var from        = form.find("[name='amount']");
    var to          = form.find("[name='to']");
    var currency    = form.find("[name='currency']").val();
    var rate_holder = form.find(".conversion_rate");
    var rate_actual = form.find(".conversion_rate_actual").data('rate');

    calculate_rate();

    from.bind('textchange', function () {
        calculate_rate();
    });

    to.bind('textchange', function () {
        calculate_rate();
    });

    function calculate_rate(){
        var rate = 0;
        if( currency == 'EUR'){
            rate = to.val()/from.val();
        }else{
            rate = from.val()/to.val();
        }
        rate_holder.html(rate);

        //console.log(rate, rate_actual, (rate/rate_actual), 100-((rate/rate_actual)*100) );

        if( (100-((rate/rate_actual)*100)) >3 || (100-((rate_actual/rate)*100)) >3 ){
            rate_holder.addClass('red');
        }else{
            rate_holder.removeClass('red');
        }
    }
}

function bbRefreshManagerBallsPoints(){
    var holderPoint = jQuery('.point_sum');
    var holderBall = jQuery('.ball_sum');
    var action = holderPoint.data('url');

    holderPoint.html('<img height="15" src="'+loader_url+'">');
    holderBall.html('<img height="15" src="'+loader_url+'">');

    jQuery.ajax({
        type: "GET",
        url: action,
        success: function (request) {
            holderPoint.html(request['point']);
            holderBall.html(request['ball']);
        },

        statusCode: {
            403: function(response) {
                bb_dont_have_perrmissions();
            }
        },
    });
}

jQuery('#modal_comment').on('show.bs.modal', function (event) {
    var button = jQuery(event.relatedTarget);
    var modal = jQuery(this);
    var action_url = button.data('action_url');
    var method = button.data('method');
    var callback = button.data('callback');

    var form = modal.find('.comment_form');
    var methodInput = form.find('[name="_method"]');



    if( method == 'POST'){
        methodInput.remove();
    }
    if( method == 'PUT'){
        if(methodInput.length == 0){
            form.append('<input type="hidden" name="_method" value="PUT">');
        }
    }

    form.attr('action',action_url);
    form.find('.comment').val(button.attr('data-content'));

    form.submit(function (e) {
        e.preventDefault();
        var data = jQuery('.comment_form').serializeArray();
        jQuery.ajax({
            type: "POST",
            url: action_url,
            data: data,
            success: function (request) {
                if( callback !== undefined ){
                    window[callback](button, request);
                }

                button.attr('data-content', form.find('.comment').val() );
                button.find('.popovers').attr('data-content', form.find('.comment').val() );
                modal.modal('hide');
            },

            statusCode: {
                403: function(response) {
                   bb_dont_have_perrmissions();
                }
            },
        });
    });
});

jQuery('#modal_comment').on('hide.bs.modal', function (event) {
    var modal = jQuery(this);
    var form = modal.find('.comment_form');
    form.unbind();
});

jQuery('#modal_status').on('show.bs.modal', function (event) {
    var modal = jQuery(this);
    var form = modal.find('.status_form');

    form.submit(function (e) {
        e.preventDefault();
        var data = jQuery('.status_form').serializeArray();
        jQuery.ajax({
            type: "POST",
            url: form.attr('action'),
            data: data,
            success: function (request) {
                jQuery('.status-label').html(request.status_id+' - '+request.name);
                modal.modal('hide');

                bb_reloadpage();
            },

            statusCode: {
                403: function(response) {
                    bb_dont_have_perrmissions();
                }
            },
        });
    });
});




