<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Validate;
use think\Loader;
use app\admin\model\Admin as AdminModel;
class Admin extends controller
{
    public function lst()
    {
    	// 分页输出列表 每页显示3条数据
		$list = AdminModel::paginate(3);
		$this->assign('list',$list);
        return view('list');
    }
    public function add()
    {
    	//判断是否为post方法提交
    	if(request()->isPost()){
    		// dump(input('post.'));
    		// 如果提交消息成功，我们就添加消息到数据库
    		
   //  		// 服务器端对数据进行验证
   //  		$validate = new Validate([
			// 	'username' => 'require|max:25',
			// 	'password' => 'require|min:32'
			// ]);
    		// 1、接收传递过来的数据
    		

    		

    		$data=[
    			'username'=>input('username'),
    			'password'=>input('password'),
    		];

    		$validate = Loader::validate('Admin');
			if(!$validate->scene('add')->check($data)){
				$this->error($validate->getError()); die;
    		}

   //  		if (!$validate->check($data)) {
			// 	dump($validate->getError());
			// 	die;
			// }

    		// if添加成功，就指向success页面
    		if(Db::name('admin')->insert($data)){
    			return $this->success('添加管理员成功！！','lst');
    		}else{
    			return $this->error('添加管理员失败！！');
    		}
    		return;
    	}
        return view();
    }
}
