<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/18
 * Time: 14:18
 */

namespace Home\Controller;
use Think\Controller;

class ManageController extends CheckLogin
{
    public function index(){
        $UserName = cookie('username');
        $this->assign('UserName',$UserName);

        $AddressList = D('Addresslist');
        $StudentInfo=$AddressList->where(1)->select();
        $this->assign('StudentInfo',$StudentInfo);

        $User = D('User');
        $UserInfo=$User->where(1)->select();
        $this->assign('UserInfo',$UserInfo);

        $Message = D('Message');
        $MessageInfo = $Message->where(1)->select();
        $this->assign('MessageInfo',$MessageInfo);

        $this->display();
    }

    public function changeinfo(){
        $AddressList = D('Addresslist');
        if($AddressList->create()){
            $AddressList->save();
            $this->success('修改学生信息成功',U('Manage/index'),1);
        }else{
            $this->error('修改失败：'.$AddressList->getError(),'',2);
        }
    }
    public function deleteinfo(){
        $AddressList = D('Addresslist');
        $condition['id']=I('post.id');
        if($AddressList->where($condition)->delete()){
            $this->success('删除学生信息成功',U('Manage/index'),1);
        }else{
            $this->error('删除失败'.$AddressList->getError(),'',2);
        }
    }

    public function addinfo(){
        $AddressList = D('Addresslist');
        $data['studentname']=I('post.studentname');
        $data['tel']=I('post.tel');
        $data['qq']=I('post.qq');
        if($AddressList->create($data)){
            $AddressList->add();
            $this->success('添加学生信息成功',U('Manage/index'),1);
        }else{
            $this->error('添加失败：'.$AddressList->getError(),'',2);
        }
    }

    public function deleteuser(){
        $User = D('User');
        $condition['id']=I('post.id');
        if($User->where($condition)->delete()){
            $this->success('删除成功',U('Manage/index'),1);
        }else{
            $this->error('删除失败'.$User->getError(),'',2);
        }
    }

    public function deletemessage(){
        $Message = D('Message');
        $MessageId = I('post.messageid');
        $condition['id']=$MessageId;
        if($Message->where($condition)->delete()){
            $this->success('删除留言成功',U('Manage/index'),1);
        }else{
            $this->error('删除留言失败'.$Message->getError(),'',2);
        }
    }
}