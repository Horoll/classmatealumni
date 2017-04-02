<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/18
 * Time: 8:13
 */

namespace Home\Controller;
use App\User;
use Think\Controller;

class UserController extends CheckLogin
{
    public function index(){
        $UserName = cookie('username');
        $condition['username'] = $UserName;
        $map['touser'] = $UserName;
        $User = D('User');
        $Message = D('Message');

        $UserInfo = $User->where($condition)->find();
        $MessageInfo = $Message->where($map)->select();

        $end = strpos(dirname(__FILE__),'Application');
        $PhotoDir = substr(dirname(__FILE__),0,$end).'Public/img/studentphoto/'.$UserName.'/';
        $FileName=scandir($PhotoDir);
        $PhotoPath=[];
        foreach ($FileName as $Name){
            if($Name=='.' || $Name=='..'){
                continue;
            }
            array_push($PhotoPath,$UserName.'/'.$Name);
        }

        $this->assign('UserName',$UserName);
        $this->assign('UserInfo',$UserInfo);
        $this->assign('MessageInfo',$MessageInfo);
        $this->assign('PhotoPath',$PhotoPath);
        $this->display();
    }
    public function changeinfo(){
        $condition['username'] = cookie('username');
        $data['name'] = I('post.name');
        $data['classname'] = I('post.classname');
        $data['hobby'] = I('post.hobby');
        $data['sign'] = I('post.sign');
        $data['User'] = D('User');
        $User = D('User');
        if($User->where($condition)->save($data)){
            $this->success('个人信息修改成功！','../User/index');
        }else{
            $this->error('个人信息修改失败','../User/index');
        }
    }
    public function deletemessage(){
        $Message = D('Message');
        $MessageId = I('post.messageid');
        $condition['id']=$MessageId;
        if($Message->where($condition)->delete()){
            $this->success('删除留言成功',U('User/index'),1);
        }else{
            $this->error('删除留言失败'.$Message->getError(),'',2);
        }
    }
    public function guest(){
        if(!I('get.username')){
            $this->error('没有此用户');
        }
        $User = D('User');
        $condition['username']=I('get.username');
        if($UserInfo=$User->where($condition)->find()){

            //显示这个用户所有的留言
            $Message = D('Message');
            $map['touser'] = I('get.username');
            $MessageInfo = $Message->where($map)->select();

            //找到这个用户所有的照片
            $end = strpos(dirname(__FILE__),'Application');
            $PhotoDir = substr(dirname(__FILE__),0,$end).'Public/img/studentphoto/'.I('get.username').'/';
            $FileName=scandir($PhotoDir);
            $PhotoPath=[];
            foreach ($FileName as $Name){
                if($Name=='.' || $Name=='..'){
                    continue;
                }
                array_push($PhotoPath,I('get.username').'/'.$Name);
            }


            $this->assign('MessageInfo',$MessageInfo);
            $this->assign('UserName',cookie('username'));
            $this->assign('UserInfo',$UserInfo);
            $this->assign('PhotoPath',$PhotoPath);
            $this->display();
        }else{
            $this->error('没有此用户');
        }
    }
    public function addmessage(){
        $Message = D('message');
        $data['touser'] = I('post.touser');
        $data['message'] = I('post.message');
        $data['fromuser'] = cookie('username');

        if($Message->create($data)){
            $Message->add();
            $this->success('留言成功',U('User/guest?username='.$data['touser']),1);
        }else{
            $this->error('留言失败：'.$Message->getError(),2);
        }
    }
}