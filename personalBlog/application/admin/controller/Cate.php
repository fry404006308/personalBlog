<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Validate;
use think\Loader;
use app\admin\model\Cate as CateModel;
class Cate extends controller
{
    public function lst()
    {
    	// 分页输出列表 每页显示3条数据
		$list = CateModel::paginate(3);
		$this->assign('list',$list);
        return view('list');
    }
    
    public function add()
    {
    	//判断是否为post方法提交
    	if(request()->isPost()){
    		// dump(input('post.'));
    		// 如果提交消息成功，我们就添加消息到数据库

    		$data=[
    			'catename'=>input('catename'),	
    		];

    		$validate = Loader::validate('Cate');
			if(!$validate->scene('add')->check($data)){
				$this->error($validate->getError()); die;
    		}

    		// if添加成功，就指向success页面
    		if(Db::name('cate')->insert($data)){
    			return $this->success('添加栏目成功！！','lst');
    		}else{
    			return $this->error('添加栏目失败！！');
    		}
    		return;
    	}
        return view();
    }

    public function edit(){

        $id=input('id');
        $data=db('cate')->find($id);

        //如果是提交过来的数据
        if(request()->isPost()){
            $arr=[
                'id'=>input('id'),
                'catename'=>input('catename'),
            ];

            //验证
            $validate = Loader::validate('Cate');
            if(!$validate->scene('edit')->check($arr)){
                $this->error($validate->getError()); die;
            }
            // 更新数据表中的数据
            $edited=db('cate')->update($arr);
            if($edited!==false){
                return $this->success('修改栏目信息成功！！','lst');
            }else{
                return $this->error('修改栏目信息失败！！');
            }
            return;
        }
        $this->assign('data',$data);
        return $this->fetch();
    }

    public function del(){
        $id=input('id');
        //初始化栏目不能删除
        // 根据主键删除

        //删除操作
        $deleted=db('cate')->delete(input('id'));
        if($deleted){
            return $this->success('删除栏目成功！！','lst');
        }else{
            return $this->error('删除栏目失败！！');
        }

        
        
    }

}
