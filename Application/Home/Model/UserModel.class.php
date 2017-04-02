<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/7
 * Time: 9:09
 */

namespace Home\Model;
use Think\Model;

class UserModel extends Model{

    protected $_validate = array(
        array('username','require','用户名必须填写'),
        array('username','','帐号名称已经存在！',1,'unique'),
    );

    protected $_auto = array(
        array('password','md5',3,'function'),
    );
}