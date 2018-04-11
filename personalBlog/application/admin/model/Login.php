<?php
namespace app\admin\model;

use think\Model;
use think\Db;
use think\Session;
use think\Request;
class Login extends Model
{
	//模型是处理数据的
    public function login($data){
        //验证验证码
        $captcha = new \think\captcha\Captcha();
        if (!$captcha->check($data['code'])) {
            return 4; 
        }
      
    	$user=DB::name('admin')->where('username','=',$data['username'])->find();
    	//如果用户存在我们就进行处理，否则不进行处理
    	if($user){
    		//密码正确和密码错误两种情况
    		if($user['password']==md5($data['password'])){
    			//写入session
    			Session::set('username',$user['username']);
    			Session::set('id',$user['id']);
    			return 1;//信息正确
    		}else{
    			return 0;//密码错误
    		}

    	}else{
    		return -1;//用户不存在
    	}

    }
}
