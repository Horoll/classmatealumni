<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(cookie('username')){
            $IsLogined = 1;
            $UserName = cookie('username');
            $this->assign('Username',$UserName);
        }else{
            $IsLogined = 0;
        }


        $User = D('User');
        $UserInfo=$User->where(1)->select();

        $Addresslist = D('Addresslist');
        $StudentInfo = $Addresslist->where(1)->select();

        $this->assign('IsLogined',$IsLogined);
        $this->assign('UserInfo',$UserInfo);
        $this->assign('StudentInfo',$StudentInfo);

        $this->display();
    }
}