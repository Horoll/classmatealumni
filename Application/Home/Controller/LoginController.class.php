<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/2/27
 * Time: 16:07
 */

namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller
{
    public function index(){
        $username=I('post.username','default');
        $password=I('post.password','default');
        $User = D('User');
        $map['username'] = $username;
        $data=$User->where($map)->find();

        if(!empty($data) && $data['password'] == md5($password)){
            cookie('username',$username);
            cookie('password',$data['password']);
            $this->success('登录成功','../Index/index',1);
        }elseif(!empty($data) && $data['password'] != md5($password)){
            $this->error('密码输入错误！','Login/login',3);
        }else{
            $this->error('帐号不存在！','Login/login',3);
        }
    }
    public function login(){
        $this->display();
    }
    public function logout(){
        cookie('username',null);
        cookie('password',null);
        $this->success('已退出登录','../Index/index');
    }
}