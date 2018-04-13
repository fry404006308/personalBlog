<?php
namespace app\admin\controller;

use app\admin\controller\Base;
use think\Db;
use think\Validate;
use think\Loader;
// use app\admin\model\Links as LinksModel;
class Tags extends Base
{
    public function lst()
    {
    	// 分页输出列表 每页显示3条数据
		$list = db('tags')->paginate(3);
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
    			'tagname'=>input('tagname'),

    		];

    		$validate = Loader::validate('Tags');
			if(!$validate->scene('add')->check($data)){
				$this->error($validate->getError()); die;
    		}

   //  		if (!$validate->check($data)) {
			// 	dump($validate->getError());
			// 	die;
			// }

    		// if添加成功，就指向success页面
    		if(Db::name('tags')->insert($data)){
    			return $this->success('添加Tag标签成功！！','lst');
    		}else{
    			return $this->error('添加Tag标签失败！！');
    		}
    		return;
    	}
        return view();
    }

    public function edit(){

        $id=input('id');
        $data=db('tags')->find($id);

        //如果是提交过来的数据
        if(request()->isPost()){
            $arr=[
                'id'=>input('id'),
                'tagname'=>input('tagname'),

            ];

            //验证
            $validate = Loader::validate('Tags');
            if(!$validate->scene('edit')->check($arr)){
                $this->error($validate->getError()); die;
            }
            // 更新数据表中的数据
            $edited=db('tags')->update($arr);
            if($edited){
                return $this->success('修改Tag标签信息成功！！','lst');
            }else{
                return $this->error('修改Tag标签信息失败！！');
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
        $deleted=db('tags')->delete(input('id'));
        if($deleted){
            return $this->success('删除Tag标签成功！！','lst');
        }else{
            return $this->error('删除Tag标签失败！！');
        }

        
        
    }

}
