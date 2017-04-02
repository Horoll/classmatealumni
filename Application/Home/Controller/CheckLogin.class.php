<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/18
 * Time: 10:42
 */

namespace Home\Controller;
use Think\Controller;

class CheckLogin extends Controller
{
    protected $UserName;
    public function __construct()
    {
        parent::__construct();
        if(!cookie('username')){
            $this->error('您还没有登录',U('Index/index'));
        }else{
            $this->UserName = cookie('username');
        }
    }
}