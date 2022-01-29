<?php  $script_date = '03112020'; ?>

<script>
    var loader_url = '{{url('/')}}/img/ajax-loading.gif';
</script>
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{url('/')}}/global/plugins/respond.min.js"></script>
<script src="{{url('/')}}/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="{{url('/')}}/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{url('/')}}/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{url('/')}}/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/global/plugins/jquery-validation/js/additional-methods.min.js"></script>

<script type="text/javascript" src="{{url('/')}}/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="{{url('/')}}/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>

<script type="text/javascript" src="{{url('/')}}/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="{{url('/')}}/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{url('/')}}/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/layout3/scripts/layout.js" type="text/javascript"></script>

<script type="text/javascript" src="{{url('/')}}/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="{{url('/')}}/admin/pages/scripts/components-pickers.js"></script>


<script type="text/javascript"  src="{{url('/')}}/js/plugins/jquery.textchange.min.js"></script>
<script type="text/javascript"  src="{{url('/')}}/js/plugins/jquery.openclose.js"></script>

<script type="text/javascript"  src="{{url('/')}}/js/main.js?v={{$script_date}}"></script>
<script type="text/javascript"  src="{{url('/')}}/js/ajax_table.js?v={{$script_date}}"></script>
<script type="text/javascript"  src="{{url('/')}}/js/modal_delete.js?v={{$script_date}}"></script>
<script type="text/javascript"  src="{{url('/')}}/js/nodeFields.js?v={{$script_date}}"></script>




<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        ComponentsPickers.init();
    });
</script>
</body>
<!-- END BODY -->
</html>
