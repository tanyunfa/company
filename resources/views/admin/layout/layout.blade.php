<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>@yield('title')</title>
    
    <link rel="shortcut icon" href="favicon.ico"> <link href="/admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/admin/css/animate.min.css" rel="stylesheet">
    <link href="/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    @yield('css')

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    @yield('content')
</div>
<script src="/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/admin/js/content.min.js?v=1.0.0"></script>
<script src="/admin/js/plugins/layer/layer.min.js"></script>
<script src="/admin/js/plugins/iCheck/icheck.min.js"></script>
<script src="/admin/js/admin.js"></script>
@yield('js')
</body>
</html>
