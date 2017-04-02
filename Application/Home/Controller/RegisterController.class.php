<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/2/27
 * Time: 16:12
 */

namespace Home\Controller;
use Think\Controller;

class RegisterController extends Controller
{
    public function index(){
        $this->display();
    }

    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 18;
        $Verify->length = 4;
        $Verify->entry(1);
    }

    public function register(){
        $verify = I('post.verify');
        if(!check_code($verify,1))
            $this->error('验证码输入错误','',2);

        $User = D('User');
        if(!$User->create()){
            $this->error('注册失败，'.$User->getError(),'',2);
        }else{
            $User->add();
            $this->success('注册成功，马上登录',U('Login/login'));
        }
    }
}