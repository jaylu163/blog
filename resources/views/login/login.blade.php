<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
   <!-- Font Awesome -->
  <link rel="stylesheet" href="/css/font-awesome/font-awesome.min.css">
 <!-- Ionicons -->
  <link rel="stylesheet" href="/css/Ionicons/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/dist/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#">管理系统</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">登录系统</p>
           <form action="/authenticate" method="post">
            <div class="form-group has-feedback">
                <input name="username" type="text" class="form-control" placeholder="请输入用户名或邮箱">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="请输入密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            {!! csrf_field() !!}
            <div class="container-form">
                
                {!! QrCode::encoding('UTF-8')->size(200)->margin(1)->generate($createSecret["codeurl"]); !!}
                <br />如果图片无法显示或者无法扫描，请在手机登录器中手动输入(我估计时间不够...):
                <font color="#FF6666">{{ $createSecret["secret"] }}</font>
                    <input name="onecode" type="text" class="form-control" placeholder="请输入扫描后手机显示的6位验证码" value="{{ old('onecode') }}" />
                    <input type="hidden" name="google" value="{{ $createSecret['secret'] }}"  />
                    <br />
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" id="sub-click">登录</button>
                </div>
                <!-- /.col -->
            </div>
        <!-- /.social-auth-links -->
        </form>
        <a href="#">忘记密码</a>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="/plugins/jquery/jquery-2.2.3.min.js"></script>
<!--layer弹框提示-->
<script src="/js/layer/layer.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/js/bootstrap/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
   /*     // ajax登录
        $('#sub-click').click(function(){
            var data = {
                name:$("input[name='username']").val(),
                password:$("input[name='password']").val(),
                code:$("input[name='onecode']").val(),
                google:$("input[name='google']").val()
            }
            
            $.post('/authenticate',data,function(data){
               
                if(data.code==0 && data.data.token){
            
                   localStorage.setItem('token', data.data.token);
                   $.ajax({
                        url: "/index/main",
                        data: {},
                        type: "GET",
                            beforeSend: function(xhr){
                                xhr.setRequestHeader('Authorization', "Bearer "+data.data.token);
                            },//这里设置header
                            success: function() {
                                //window.location.href="/index/main";
                            }
                    });
                   
                }else{
                    console.log(data.data.msg);
                    layer.msg('不开心,密码错误', {icon: 5});
                }
            });
        })
*/
    });
</script>
</body>
</html>
