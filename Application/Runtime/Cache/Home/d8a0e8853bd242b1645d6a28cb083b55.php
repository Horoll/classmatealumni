<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理</title>
    <link href="/project/classmatealumni/Public/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .page-header{
            margin-top: 75px;
        }
        #main .nav{
            margin-top: 75px;
        }
        #main .nav li{
            border: 2px solid rgb(238,238,238);
            border-radius: 5px;
        }
        .message-well{
            position: relative;
        }
        #deletemessage{
            position: relative;
            left: 90%;
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

<div class="container">
    <div class="page-header">
        <h1>
            后台管理
            <small>后台管理</small>
        </h1>
    </div>
</div>


<div class="container" id="main">
    <ul class="nav nav-pills nav-stacked col-md-2">
        <li class="active"><a href="#address" data-toggle="tab">通讯录</a></li>
        <li><a href="#account" data-toggle="tab">帐号</a></li>
        <li><a href="#message" data-toggle="tab">留言板</a></li>
        <li><a href="#" data-toggle="tab">关于</a></li>
        <li><a href="#" data-toggle="tab">禁用</a></li>
    </ul>

    <div class="tab-content" style="padding: 10px;">
        <div class="tab-pane fade in active" id="address">
            <!--响应式表格-->
            <div class="table-responsive">
                <h2>通讯录管理</h2>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <th>姓名</th>
                    <th>电话</th>
                    <th>QQ</th>
                    </thead>
                    <tbody>
                    <?php if(is_array($StudentInfo)): foreach($StudentInfo as $key=>$info): ?><tr>
                            <form id="student<?php echo ($info["id"]); ?>" class="studentinfo" method="post">
                                <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
                                <td><input type="text" name="studentname" value="<?php echo ($info["studentname"]); ?>" class="form-control"></td>
                                <td><input type="text" name="tel" value="<?php echo ($info["tel"]); ?>" class="form-control"></td>
                                <td><input type="text" name="qq" value="<?php echo ($info["qq"]); ?>" class="form-control"></td>
                                <td><input type="button" value="修改" class="form-control btn-info" onclick="changeinfo('student<?php echo ($info["id"]); ?>','studentinfo')"></td>
                                <td><input type="button" value="删除" class="form-control btn-danger" onclick="deleteinfo('student<?php echo ($info["id"]); ?>','studentinfo')"></td>
                            </form>
                        </tr><?php endforeach; endif; ?>
                    <tr class="success">
                        <form action="<?php echo U('Manage/addinfo');?>" method="post">
                            <td><input type="text" name="studentname" placeholder="添加学生姓名" class="form-control"></td>
                            <td><input type="text" name="tel" placeholder="电话" class="form-control"></td>
                            <td><input type="text" name="qq" placeholder="qq" class="form-control"></td>
                            <td><input type="submit" value="添加" class="form-control btn-warning"></td>
                        </form>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="account">
            <h2>帐号管理</h2>
            <!--响应式表格-->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <th>用户名</th>
                    <th>姓名</th>
                    <th>班级</th>
                    <th>个人爱好</th>
                    <th>签名</th>
                    </thead>
                    <tbody>
                    <?php if(is_array($UserInfo)): foreach($UserInfo as $key=>$info): ?><tr>
                            <form id="user<?php echo ($info["id"]); ?>" class="userinfo" action="<?php echo U('Manage/deleteuser');?>" method="post">
                                <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
                                <td><?php echo ($info["username"]); ?></td>
                                <td><?php echo ($info["name"]); ?></td>
                                <td><?php echo ($info["classname"]); ?></td>
                                <td><?php echo ($info["hobby"]); ?></td>
                                <td><?php echo ($info["sign"]); ?></td>
                                <td><input type="submit" value="删除" class="form-control btn-danger"></td>
                            </form>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="message">
            <h2>留言管理</h2>
            <div class="container">
                <ul class="media-list col-md-10 col-offset-2">
                    <?php if(is_array($MessageInfo)): foreach($MessageInfo as $key=>$msg): ?><div class="well well-lg message-well">
                            <li class="media">
                                <div class="media-left">
                                    <a href="<?php echo U('User/guest?username='.$msg['fromuser'])?>" class="btn btn-default btn-lg" data-toggle="tooltip" title="去看看<?php echo ($msg["fromuser"]); ?>的主页">
                                        发送人：<?php echo ($msg["fromuser"]); ?>
                                    </a>
                                    <a href="<?php echo U('User/guest?username='.$msg['touser'])?>" class="btn btn-default btn-lg" data-toggle="tooltip" title="去看看<?php echo ($msg["touser"]); ?>的主页">
                                        接收人：<?php echo ($msg["touser"]); ?>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <p><?php echo ($msg["message"]); ?></p>
                                </div>
                            </li>
                            <form action="<?php echo U('Manage/deletemessage');?>" method="post">
                                <input type="hidden" name="messageid" value="<?php echo ($msg['id']); ?>">
                                <button type="submit" id="deletemessage" class="btn btn-danger">删除</button>
                            </form>
                        </div><?php endforeach; endif; ?>
                </ul>
            </div>
        </div>
        <div class="tab-pane fade" id="React">

        </div>
    </div>
</div>


<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="/project/classmatealumni/Public/js/bootstrap.min.js"></script>
<script>
    function changeinfo(formid,formclass){
        switch (formclass){
            case 'studentinfo':
                formaction="<?php echo U('Manage/changeinfo');?>";
        }
        document.getElementById(formid).action=formaction;
        document.getElementById(formid).submit();
    }
    function deleteinfo(formid,formclass){
        switch (formclass){
            case 'studentinfo':
                formaction="<?php echo U('Manage/deleteinfo');?>";
        }
        document.getElementById(formid).action=formaction;
        document.getElementById(formid).submit();
    }
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</body>
</html>