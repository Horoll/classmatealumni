<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>注册</title>

    <!-- Bootstrap -->
    <link href="/project/classmatealumni/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
    .jumbotron{
        margin-top: 125px;
    }
</style>
<body>
    <div class="container">

        <!-- 响应式导航条 -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">&nbsp;同学录系统</a>
                    <button class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo U('Index/index');?>"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="jumbotron col-md-8 col-md-offset-2">
            <h2>注册</h2>
            <form class="form-horizontal" action="<?php echo U('Register/register');?>" method="post">
                <div class="form-group">
                    <label class="col-sm-3 control-label">帐号</label>
                    <div class="col-sm-4">
                        <input type="text" placeholder="username" class="form-control" name="username">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">密码</label>
                    <div class="col-sm-4">
                        <input type="password" placeholder="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">验证码</label>
                    <div class="col-sm-2">
                        <input type="text" placeholder="verify" class="form-control" name="verify">
                    </div>
                    <div class="col-sm-1">
                        <img src="<?php echo U('Register/verify');?>" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-1 col-sm-offset-3">
                        <button type="submit" class="btn btn-lg btn-primary">
                            注册
                        </button>
                    </div>
                    <div class="col-sm-2 col-sm-offset-1">
                        <a href="<?php echo U('Login/login');?>" class="btn btn-lg btn-default">去登录</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/project/classmatealumni/Public/js/bootstrap.min.js"></script>
</body>
</html>