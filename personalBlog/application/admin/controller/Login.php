<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Login as LoginModel;

class Login extends controller
{
    public function index()
    {
    	if(request()->isPost()){
    		$admin=new LoginModel();
    		$data=input('post.');
            $num=$admin->login($data);
    		if($num==4){
                $this->error('验证码错误');
            }
            else if($num==1){
                $this->success('成功登陆,正在为您跳转...','index/index');
            }else{
                $this->error('用户名或者密码错误');
            }
    	}
        return view('login');
    }
    

}
