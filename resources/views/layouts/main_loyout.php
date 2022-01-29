<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Metronic | Managed Datatables</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/global/plugins/select2/select2.css"/>
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{url('/')}}/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/global/css/plugins.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
    <link href="{{url('/')}}/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
    <!-- END THEME STYLES -->

    <link href="{{url('/')}}/css/custom.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{url('/')}}/favicon.ico"/>
</head>
<!-- END HEAD -->

@yield('main')

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
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
<script type="text/javascript" src="{{url('/')}}/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{url('/')}}/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/layout3/scripts/layout.js" type="text/javascript"></script>


<script type="text/javascript"  src="{{url('/')}}/js/plugins/jquery.textchange.min.js"></script>
<script type="text/javascript"  src="{{url('/')}}/js/ajax_table.js"></script>
<script type="text/javascript"  src="{{url('/')}}/js/modal_delete.js"></script>

<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
    });
</script>
</body>
<!-- END BODY -->
</html>