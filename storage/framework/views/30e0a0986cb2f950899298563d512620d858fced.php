<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard | Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <link rel="shortcut icon" href="images/icons/favicon.html">
    <link rel="apple-touch-icon" href="images/icons/favicon-2.html">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.html">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.html">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <!--Loading bootstrap css-->
    <?php echo $__env->make('admin.common.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>

    <script>
        var siteurl = '<?= env('APP_URL'); ?>';
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
</head>
<body class=" ">
<div id="preloader"></div>
<div>
    <!--BEGIN BACK TO TOP-->
    <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!--END TOPBAR-->
    <div id="wrapper">
        <!--BEGIN SIDEBAR MENU-->
    <?php echo $__env->make('admin.common.leftsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!--END SIDEBAR MENU--><!--BEGIN CHAT FORM-->
    <?php echo $__env->make('admin.common.rightsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!--END CHAT FORM--><!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper">
            <!--BEGIN TITLE & BREADCRUMB PAGE-->
            <?php echo $__env->make('admin.common.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!--END TITLE & BREADCRUMB PAGE-->
            <!--BEGIN CONTENT-->
            <?php echo $__env->yieldContent('content'); ?>
            <!--END CONTENT-->
        </div>
        <!--BEGIN FOOTER-->
        <?php echo $__env->make('admin.common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!--END FOOTER--><!--END PAGE WRAPPER-->
    </div>
</div>
<?php echo $__env->make('admin.common.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.common.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldPushContent('scripts'); ?>;
</body>
</html>
