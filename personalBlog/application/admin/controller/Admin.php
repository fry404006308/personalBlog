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
    			'password'=>md5(input('password')),
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

    public function edit(){

        $id=input('id');
        $data=db('admin')->find($id);

        //如果是提交过来的数据
        if(request()->isPost()){
            $arr=[
                'id'=>input('id'),
                'username'=>input('username'),
                //如果接收到密码，并且它不为空，说明我们要修改密码
            ];

            if(input('password')){
                $arr['password']=md5(input('password'));
            }else{
                //如果为空则表示原来的密码不变
                $arr['password']=$data['password'];
            }
            //验证
            $validate = Loader::validate('Admin');
            if(!$validate->scene('edit')->check($arr)){
                $this->error($validate->getError()); die;
            }
            // 更新数据表中的数据
            $edited=db('admin')->update($arr);
            if($edited!==false){
                return $this->success('修改管理员信息成功！！','lst');
            }else{
                return $this->error('修改管理员信息失败！！');
            }
            return;
        }
        $this->assign('data',$data);
        return $this->fetch();
    }

    public function del(){
        $id=input('id');
        //初始化管理员不能删除
        // 根据主键删除
        if($id!=1){
            //删除操作
            $deleted=db('admin')->delete(input('id'));
            if($deleted){
                return $this->success('删除管理员成功！！','lst');
            }else{
                return $this->error('删除管理员失败！！');
            }
        }else{
            return $this->error('初始化管理员不能删除！！');
        }
        
        
    }

}
