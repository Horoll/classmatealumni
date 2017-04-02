<?php
namespace Home\Model;
use Think\Model;

class MessageModel extends Model{
    protected $_validate = array(
        array('message','require','留言内容不能为空',1),
        array('touser','require','不知道是写给谁的留言',1),
        array('fromuser','require','发送者不能为空',1),
    );
}

?>
