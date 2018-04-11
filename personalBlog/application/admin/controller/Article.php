<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Validate;
use think\Loader;
use app\admin\model\Article as ArticleModel;
class Article extends controller
{
    public function lst()
    {
    	// 分页输出列表 每页显示3条数据
		// $list = ArticleModel::paginate(3);

        // $list=db('article')->alias('a')->join('cate c','c.id=a.cateid')->field('a.id,a.title,a.pic,a.author,a.state,c.catename')->paginate(3);

        $list = ArticleModel::paginate(3);


		$this->assign('list',$list);
        return view('list');
    }
    
    public function add()
    {
    	//判断是否为post方法提交
    	if(request()->isPost()){
            // dump($_POST);die;

    		$data=[
                'title'=>input('title'),
                'author'=>input('author'),
                'desc'=>input('desc'),   
                'keywords'=>input('keywords'),   
                'content'=>input('content'),   
                'cateid'=>input('cateid'),   
                'time'=>time(), 
    		];
            //如果已经选择推荐
            if(input('state')=='on'){
                $data['state']=1;
            }
            //如果有图片上传
            if($_FILES['pic']['tmp_name']){
                // 获取表单上传文件 例如上传了001.jpg
                $file = request()->file('pic');
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                // 已经上传成功，我们要把文件的路径写进数据库
                $data['pic']='uploads/'.$info->getSaveName();
                // dump($data['pic']);die;
            }


    		$validate = Loader::validate('Article');
			if(!$validate->scene('add')->check($data)){
				$this->error($validate->getError()); die;
    		}

    		// if添加成功，就指向success页面
    		if(Db::name('article')->insert($data)){
    			return $this->success('添加文章成功！！','lst');
    		}else{
    			return $this->error('添加文章失败！！');
    		}
    		return;
    	}
        $cateres=db('cate')->select();
        $this->assign('cateres',$cateres);
        return view();
    }

    public function edit(){

        $id=input('id');
        $data=db('article')->find($id);

        //如果是提交过来的数据
        if(request()->isPost()){
            $arr=[
                'id'=>input('id'),
                'title'=>input('title'),
                'author'=>input('author'),
                'desc'=>input('desc'),   
                'keywords'=>input('keywords'), 
                'content'=>input('content'), 
                'cateid'=>input('cateid'), 

            ];
            //如果已经选择推荐
            // dump(input('state'));
            // dump(input('state')=='on'); die;
            if(input('state')=='on'){
                $arr['state']=1;
            }else{
                $arr['state']=0;
            }
            //如果有图片上传
            if($_FILES['pic']['tmp_name']){
                //删除原来的缩略图
                @unlink(SITE_URL.'/public/static/'.$data['pic']);
                // 获取表单上传文件 例如上传了001.jpg
                $file = request()->file('pic');
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                // 已经上传成功，我们要把文件的路径写进数据库
                $arr['pic']='uploads/'.$info->getSaveName();
                // dump($data['pic']);die;
            }
            //验证
            $validate = Loader::validate('Article');
            if(!$validate->scene('edit')->check($arr)){
                $this->error($validate->getError()); die;
            }
            // 更新数据表中的数据
            $edited=db('article')->update($arr);
            if($edited){
                return $this->success('修改文章信息成功！！','lst');
            }else{
                return $this->error('修改文章信息失败！！');
            }
            return;
        }
        $this->assign('data',$data);
        $cateres=db('cate')->select();
        $this->assign('cateres',$cateres);
        return $this->fetch();
    }

    public function del(){
        $id=input('id');
        
        // 根据主键删除
        
        //删除操作
        $deleted=db('article')->delete(input('id'));
        if($deleted){
            return $this->success('删除文章成功！！','lst');
        }else{
            return $this->error('删除文章失败！！');
        }

        
        
    }

}
