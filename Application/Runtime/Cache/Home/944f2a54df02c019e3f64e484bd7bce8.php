<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <style>
      .jumbotron{
       margin-top: 125px;
      }
    </style>
    <link href="/project/classmatealumni/Public/css/bootstrap.min.css" rel="stylesheet">
  </head>
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
        <h2>登录</h2>
        <form class="form-horizontal" action="<?php echo U('Login/index');?>" method="post">
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
            <div class="col-sm-2 col-sm-offset-3">
              <button type="submit" class="btn btn-lg btn-primary">
                登录
              </button>
            </div>
            <div class="col-sm-2">
              <a href="<?php echo U('Register/index');?>" class="btn btn-lg btn-default">
                去注册
              </a>
            </div>
          </div>
        </form>
      </div>
    </div>

    <script src="/project/classmatealumni/Public/js/jquery-1.5.1.js"></script>
    <script src="/project/classmatealumni/Public/js/bootstrap.min.js"></script>
  </body>
</html>