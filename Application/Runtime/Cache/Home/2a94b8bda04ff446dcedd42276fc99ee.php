<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>同学录系统</title>
    <link href="/project/classmatealumni/Public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico" media="screen" />
    <style>
      body{
        font-family: "Helvetica Neue",Helvetica Arial,"Microsoft Yahei UI","Microsoft YaHei",SimHei,"\5BBB\4F53",simsun,sans-serif
      }

      #myCarousel{
        margin: 50px 0 0 0;
      }

      /*轮播图居中*/
      .carousel-inner img{
        margin: 0 auto;
      }

      #title h1{
        font-size: 45px;
        font-weight: bold;
        text-align: center;
      }

      #classablum{
        margin-top: 25px;
      }
      .jumbotron a{
        text-decoration: none;
      }
      .thumbnail:hover{
        box-shadow:0px 0px 20px #333;
      }
      #footer{
        background-color: #A6A6A6;
        border-top: 1px solid #ccc;
        padding: 10px;
        text-align: center;
      }
      .caption p{
        font-size: 16px;
      }
    </style>
  </head>
  <body>
    
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
            <?php if(($IsLogined == 1)): ?><li><a href="<?php echo U('User/index');?>"><span class="glyphicon glyphicon-user"></span> <?php echo ($Username); ?></a></li>
              <li><a href="<?php echo U('Manage/index');?>"><span class="glyphicon glyphicon-leaf"></span> 管理</a></li>
              <li><a href="<?php echo U('Login/logout');?>"><span class="glyphicon glyphicon-share"></span> 退出</a></li>
              <?php else: ?>
              <li><a href="<?php echo U('Login/login');?>"><span class="glyphicon glyphicon-tags"></span> 登录</a></li>
              <li><a href="<?php echo U('Register/index');?>"><span class="glyphicon glyphicon-pencil"></span> 注册</a></li><?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- 响应式轮播图 -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators"  id="tab1">
        <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active" style="background-color: rgb(80,90,150)">
          <img src="/project/classmatealumni/Public/img/slide1.png" alt="slide1">
        </div>
        <div class="item" style="background-color: rgb(80,90,150)">
          <img src="/project/classmatealumni/Public/img/slide2.png" alt="slide2">
        </div>
        <div class="item" style="background-color: rgb(80,90,150)">
          <img src="/project/classmatealumni/Public/img/slide3.png" alt="slide3">
        </div>
      </div>
      <a href="#myCarousel" data-slide="prev" class="carousel-control left">
        <!-- &lsaquo; -->
        <span class="glyphicon glyphicon-chevron-left"></span>  
      </a>
      <a href="#myCarousel" data-slide="next" class="carousel-control right">
        <!-- &rsaquo; -->
        <span class="glyphicon glyphicon-chevron-right"></span> 
      </a>
    </div>

    <div id="title" class="page-header">
      <h1> 班级同学录 <br>
      <small>—— 记录大学生活的点点滴滴</small>
      </h1>
    </div>

    <div id="classablum">
      <div class="container">
        <div class="jumbotron">
          <h2>班级相册</h2><br>
          <div class="row">
            <?php if(is_array($UserInfo)): foreach($UserInfo as $key=>$info): ?><a href="<?php echo U('User/guest?username='.$info['username'])?>">
                <div class="col-xs-6 col-md-3 col-sm-4">
                  <div class="thumbnail">
                    <?php
 $end = strpos(dirname(__FILE__),'Application'); $HeaderDir = substr(dirname(__FILE__),0,$end).'Public/img/studentphoto/'.$info['username'].'/header.jpg'; if(is_file($HeaderDir)){?>
                    <img src="/project/classmatealumni/Public/img/studentphoto/<?php echo $info['username']?>/header.jpg">
                    <?php }else{?>
                    <img src="/project/classmatealumni/Public/img/student.png">
                    <?php }?>
                    <div class="caption">
                      <h4><?php echo ($info["name"]); ?></h4>
                      <p><?php echo ($info["classname"]); ?></p>
                      <p><?php echo ($info["sign"]); ?></p>
                    </div>
                </div>
              </a>
            </div><?php endforeach; endif; ?>
          </div>
        </div>
      </div>
    </div>

    <div id="addresslist">
      <div class="container">
        <div class="well table-responsive">
          <h2>班级通讯录</h2><br>
          <table class="table table-striped table-hover">
            <thead class="success">
              <th>姓名</th>
              <th>电话</th>
              <th>qq</th>
            </thead>
            <tbody>
              <?php if(is_array($StudentInfo)): foreach($StudentInfo as $key=>$info): ?><tr>
                  <td><?php echo ($info["studentname"]); ?></td>
                  <td><?php echo ($info["qq"]); ?></td>
                  <td><?php echo ($info["tel"]); ?></td>
                </tr><?php endforeach; endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <footer id="footer">
      <div class="container">
        <h3><p>班级同学录</p></h3>
      </div>
    </footer>

    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="/project/classmatealumni/Public/js/bootstrap.min.js"></script>
  </body>
</html>