<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }

    //管理员列表
    public function admin_list(){

        $this->display();
    }
    //管理员添加
    public function admin_add(){

        $this->display();
    }
}