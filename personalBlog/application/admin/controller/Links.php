<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Validate;
use think\Loader;
use app\admin\model\Links as LinksModel;
class Links extends controller
{
    public function lst()
    {
    	// 分页输出列表 每页显示3条数据
		$list = LinksModel::paginate(3);
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
    			'title'=>input('title'),
    			'url'=>input('url'),
                'desc'=>input('desc'),
    		];

    		$validate = Loader::validate('Links');
			if(!$validate->scene('add')->check($data)){
				$this->error($validate->getError()); die;
    		}

   //  		if (!$validate->check($data)) {
			// 	dump($validate->getError());
			// 	die;
			// }

    		// if添加成功，就指向success页面
    		if(Db::name('links')->insert($data)){
    			return $this->success('添加链接成功！！','lst');
    		}else{
    			return $this->error('添加链接失败！！');
    		}
    		return;
    	}
        return view();
    }

    public function edit(){

        $id=input('id');
        $data=db('links')->find($id);

        //如果是提交过来的数据
        if(request()->isPost()){
            $arr=[
                'id'=>input('id'),
                'title'=>input('title'),
                'url'=>input('url'),
                'desc'=>input('desc'),   
            ];

            //验证
            $validate = Loader::validate('Links');
            if(!$validate->scene('edit')->check($arr)){
                $this->error($validate->getError()); die;
            }
            // 更新数据表中的数据
            $edited=db('links')->update($arr);
            if($edited){
                return $this->success('修改链接信息成功！！','lst');
            }else{
                return $this->error('修改链接信息失败！！');
            }
            return;
        }
        $this->assign('data',$data);
        return $this->fetch();
    }

    public function del(){
        $id=input('id');
        
        // 根据主键删除
        
        //删除操作
        $deleted=db('links')->delete(input('id'));
        if($deleted){
            return $this->success('删除链接成功！！','lst');
        }else{
            return $this->error('删除链接失败！！');
        }

        
        
    }

}
