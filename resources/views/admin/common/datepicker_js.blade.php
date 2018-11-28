{!! HTML::script('resources/assets/admin/js/jquery.js')!!}
{!! HTML::script('resources/assets/admin/js/bootstrap.min.js')!!}
{!! HTML::script('resources/assets/admin/js/jquery.dcjqaccordion.2.7.js')!!}
{!! HTML::script('resources/assets/admin/js/jquery.scrollTo.min.js')!!}
{!! HTML::script('resources/assets/admin/js/jquery.nicescroll.js" type="text/javascript')!!}
{!! HTML::script('resources/assets/admin/js/respond.min.js')!!}

<!--this page plugins-->

{!! HTML::script('resources/assets/admin/assets/fuelux/js/spinner.min.js')!!}
{!! HTML::script('resources/assets/admin/assets/bootstrap-fileupload/bootstrap-fileupload.js')!!}
{!! HTML::script('resources/assets/admin/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js')!!}
{!! HTML::script('resources/assets/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js')!!}
{!! HTML::script('resources/assets/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}
{!! HTML::script('resources/assets/admin/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')!!}
{!! HTML::script('resources/assets/admin/assets/bootstrap-daterangepicker/moment.min.js')!!}
{!! HTML::script('resources/assets/admin/assets/bootstrap-daterangepicker/daterangepicker.js')!!}
{!! HTML::script('resources/assets/admin/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js')!!}
{!! HTML::script('resources/assets/admin/assets/bootstrap-timepicker/js/bootstrap-timepicker.js')!!}
{!! HTML::script('resources/assets/admin/assets/jquery-multi-select/js/jquery.multi-select.js')!!}
{!! HTML::script('resources/assets/admin/assets/jquery-multi-select/js/jquery.quicksearch.js')!!}


<!--summernote-->
{!! HTML::script('resources/assets/admin/assets/summernote/dist/summernote.min.js')!!}

<!--right slidebar-->
{!! HTML::script('resources/assets/admin/js/slidebars.min.js')!!}

<!--common script for all pages-->
{!! HTML::script('resources/assets/admin/js/common-scripts.js')!!}
<!--this page  script only-->
{!! HTML::script('resources/assets/admin/js/advanced-form-components.js')!!}

<script>

    jQuery(document).ready(function(){

        $('.summernote').summernote({
            height: 200,                 // set editor height

            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor

            focus: true                 // set focus to editable area after initializing summernote
        });
    });

</script>