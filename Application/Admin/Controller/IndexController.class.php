<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }

    //管理员列表
    public function admin_list(){
        $m_admin = D('Admin');
        $admin_list = $m_admin->select();

        $this->assign("admin_list",$admin_list);
        $this->display();
    }
    //管理员添加
    public function admin_add(){

        $this->display();
    }
    //管理员添加提交
    public function admin_add_post(){
        if(IS_POST){
            $post_data = $_POST;
            $m_admin = D('Admin');

            if(!$post_data["username"]){
                $result = array(
                    "status" => false,
                    "message" => "用户名不能为空"
                );
            } elseif(!$post_data["password"]){
                $result = array(
                    "status" => false,
                    "message" => "密码不能为空"
                );
            } elseif(!$post_data["phone"]){
                $result = array(
                    "status" => false,
                    "message" => "手机号不能为空"
                );
            } elseif($post_data["password2"] != $post_data["password2"]){
                $result = array(
                    "status" => false,
                    "message" => "密码和重复密码不一致"
                );
            } else {
                //查询手机号是否注册过
                $phone_find = $m_admin->where(array('phone'=> $post_data['phone']))->find();
                if(!$phone_find){
                    $add_data = array(
                        "username" => $post_data["username"],
                        "password" => md5($post_data["password"]),
                        "phone" => $post_data["phone"],
                        "email" => $post_data["email"],
                        "create_time" => time()
                    );
                    $add_result = $m_admin->add($add_data);
                    if ($add_result) {
                        $result = array(
                            "status" => true
                        );
                    } else {
                        $result = array(
                            "status" => false,
                            "message" => "添加失败"
                        );
                    }
                } else {
                    $result = array(
                        "status" => false,
                        "message" => "该手机号已注册"
                    );
                }
            }

            $this->ajaxReturn($result);
        }
    }

    //管理员修改
    public function admin_edit(){
        $id = $_GET['id'];
        $m_admin = D('Admin');
        //获取管理员数据
        $admin_data = $m_admin->where(array('id'=> $id))->find();

        $this->assign("admin_data",$admin_data);
        $this->display();
    }

    //管理员修改提交
    public function admin_edit_post(){
        print_r($_POST);exit;
    }

    //管理员删除
    public function admin_del(){
        $list = $_POST['list_two'];
        $m_admin = M('Admin');
        foreach($list as $key=>$value){
            $result = $m_admin->where(array('id'=>$value))->delete();
        }

        if($result){
            $return = array(
                "status" => true
            );
        } else {
            $return = array(
                "status" => false,
                "message" => "删除失败"
            );
        }

        $this->ajaxReturn($return);
    }

}