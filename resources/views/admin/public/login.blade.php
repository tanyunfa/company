<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - 登录</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/admin/css/animate.min.css" rel="stylesheet">
    <link href="/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">MT</h1>
            </div>
            <h3>欢迎使用 yfcms</h3>

            <form class="m-t" action="javascript:;" id="login-form">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="用户名" >
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="密码" >
                </div>
                <div class="form-group clearfix">
                    <input type="text" class="form-control" name="captcha" placeholder="验证码" style="float: left; width: 170px">
                    <img src="{{captcha_src()}}" id="captcha" alt="" style="width: 130px;height: 34px;cursor: pointer;">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" id="login-btn">登 录</button>
                <input type="hidden" value="{{csrf_token()}}" name="_token">
                
            </form>
        </div>
    </div>
    <script src="/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/admin/js/plugins/layer/layer.min.js"></script>
    <script type="text/javascript">
        $(function () {
            var captcha = $("#captcha").attr('src');
            $("#captcha").click(function () {
                $("#captcha").attr('src', captcha + '&_=' + Math.random());
            })
            $("#login-btn").click(function () {
                var url = '/admin/public/check';
                var data = $('#login-form').serialize();
                console.log(data);
                $.post(url,data,function (result) {
                    console.log(result);
                })
            })
        })
    </script>
</body>
</html>
