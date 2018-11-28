<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{!!Lang::get('messages.company_title')!!}  {!! $title !!}</title>
{!! HTML::style('resources/assets/admin/css/style.default.css') !!}
{!! HTML::style('resources/assets/admin/prettify/prettify.css') !!}
    <link href="resources/assets/admin/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="resources/assets/admin/css/bootstrap-reset.css" rel="stylesheet"/>
    <!--external css-->
    <link href="resources/assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="resources/assets/admin/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="resources/assets/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="resources/assets/admin/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="resources/assets/admin/assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="resources/assets/admin/assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="resources/assets/admin/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="resources/assets/admin/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="resources/assets/admin/assets/jquery-multi-select/css/multi-select.css" />

    <!--right slidebar-->
    <link href="resources/assets/admin/css/slidebars.css" rel="stylesheet">

    <!--  summernote -->
    <link href="resources/assets/admin/assets/summernote/dist/summernote.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="resources/assets/admin/css/style.css" rel="stylesheet">
    <link href="resources/assets/admin/css/style-responsive.css" rel="stylesheet" />


<!--[if lte IE 8]>{!! HTML::script('resources/assets/admin/js/excanvas.min.js') !!}<![endif]-->
</head>
<body>
@yield('main_content')
<script src="resources/assets/admin/js/jquery.js"></script>
<script src="resources/assets/admin/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="resources/assets/admin/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="resources/assets/admin/js/jquery.scrollTo.min.js"></script>
<script src="resources/assets/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="resources/assets/admin/js/respond.min.js" ></script>

<!--this page plugins-->

<script type="text/javascript" src="resources/assets/admin/assets/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="resources/assets/admin/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="resources/assets/admin/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="resources/assets/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="resources/assets/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="resources/assets/admin/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="resources/assets/admin/assets/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="resources/assets/admin/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="resources/assets/admin/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="resources/assets/admin/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="resources/assets/admin/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="resources/assets/admin/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>


<!--summernote-->
<script src="resources/assets/admin/assets/summernote/dist/summernote.min.js"></script>

<!--right slidebar-->
<script src="resources/assets/admin/js/slidebars.min.js"></script>

<!--common script for all pages-->
<script src="resources/assets/admin/js/common-scripts.js"></script>
<!--this page  script only-->
<script src="resources/assets/admin/js/advanced-form-components.js"></script>
<div id="confirm" class="modal hide fade">
  <div class="modal-body">
    Delete?
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
  </div>
</div>
</body>

</html>