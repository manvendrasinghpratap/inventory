<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset('public/adminfolder/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/adminfolder/vendors/bower_components/animate.css/animate.min.css') }}">
        <!-- App styles -->
        <link href="{{ asset('public/adminfolder/css/app.min.css') }}" rel="stylesheet"> 
    </head>

    <body data-sa-theme="1">
        <style>
    .login__block{
        max-width:50% !important;
    }
</style>
        <div class="login">
            <!-- Login -->
            <div class="login__block active" id="l-login">
                <div class="login__block__header">
                    <i class="zmdi zmdi-account-circle"></i>
                    {{ config('app.app_login_heading')}}
                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-register" href="#">Create an account</a>
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="#">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>


        </div>
        @include('admin.common.olderiewarningmessage')       

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="{{ asset('public/adminfolder/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('public/adminfolder/vendors/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('public/adminfolder/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

        <!-- App functions and actions -->
        <script src="{{ asset('public/adminfolder/js/app.min.js') }}"></script>
    </body>

</html>