<?php
namespace app\admin\controller;

use think\Controller;
class Base extends Controller
{
    //这个类里面的其它方法在执行之前必须先执行这个方法
    public function _initialize(){
        if(!session('username')){
            return $this->error('请先登录系统！！','login/index');
        }
    }
}
