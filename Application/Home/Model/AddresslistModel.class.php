<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/18
 * Time: 14:57
 */

namespace Home\Model;
use Think\Model;

class AddresslistModel extends Model{

    protected $_validate = array(
        array('studentname','require','学生姓名必须填写',1),
        array('studentname','','该学生已经存在！',1,'unique'),
        array('tel','number','电话号码只能是数字',2),
        array('qq','number','qq只能是数字',2)
    );
}