<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo ($UserInfo['username']); ?></title>
    <link href="/project/classmatealumni/Public/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #main{
            margin-top: 50px;
        }
        .media{
            padding: 15px;
        }
        .media-body{
            padding-left: 15px;
            font-size: 18px;
        }
        #addmessage{
            height: 150px;
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
                <li><a href="<?php echo U('User/Index');?>"><span class="glyphicon glyphicon-user"></span> <?php echo ($UserName); ?></a></li>
                <li><a href="<?php echo U('Login/logout');?>"><span class="glyphicon glyphicon-share"></span> 退出</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" id="main">
    <div class="page-header">
        <h1>
            个人主页
            <small>--<?php echo ($UserInfo['username']); ?></small>
        </h1>
    </div>
    <!-- 标签页：选项卡 默认：ul.nav.nav-tabs 胶囊式：ul.nav.nav-pills -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#userinfo" data-toggle="tab">个人信息</a></li>
        <li><a href="#album" data-toggle="tab">个人照</a></li>
        <li><a href="#messageboard" data-toggle="tab">留言板</a></li>
    </ul>

    <div class="tab-content" style="padding: 10px;">
        <div class="tab-pane fade in active" id="userinfo">
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">个人信息</li>
                <li class="list-group-item">姓名：<?php echo ($UserInfo['name']); ?></li>
                <li class="list-group-item">班级：<?php echo ($UserInfo['classname']); ?></li>
                <li class="list-group-item">个人爱好：<?php echo ($UserInfo['hobby']); ?></li>
                <li class="list-group-item">签名：<?php echo ($UserInfo['sign']); ?></li>
            </ul>
        </div>

        <div class="tab-pane fade" id="album">
            <h2 class="page-header">个人照</h2>
            <div class="jumbotron">
                <div class="row">
                    <?php if(is_array($PhotoPath)): foreach($PhotoPath as $key=>$path): ?><div class="col-xs-12 col-md-4 col-sm-6">
                            <div class="thumbnail">
                                <img src="/project/classmatealumni/Public/img/studentphoto/<?php echo ($path); ?>">
                            </div>
                        </div><?php endforeach; endif; ?>
                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="messageboard">
            <h2 class="page-header">留言板</h2>

            <ul class="media-list">
                <?php if(is_array($MessageInfo)): foreach($MessageInfo as $key=>$msg): ?><div class="well well-lg">
                        <li class="media">
                            <div class="media-left">
                                <a href="<?php echo U('User/guest?username='.$msg['fromuser'])?>" class="btn btn-default btn-lg" data-toggle="tooltip" title="去看看<?php echo ($msg["fromuser"]); ?>的主页">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <?php echo ($msg["fromuser"]); ?>
                                </a>
                            </div>
                            <div class="media-body">
                                <p><?php echo ($msg["message"]); ?></p>
                            </div>
                        </li>
                    </div><?php endforeach; endif; ?>
            </ul>

            <form action="<?php echo U('User/addmessage');?>" method="post">
                <div class="form-group">
                    <label for="addmessage">留言</label>
                    <input type="hidden" name="touser" value="<?php echo ($UserInfo['username']); ?>">
                    <textarea name="message" id="addmessage" class="form-control" rows="10" placeholder="给ta写点什么吧..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">发表留言</button>
            </form>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="/project/classmatealumni/Public/js/bootstrap.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</body>
</html>