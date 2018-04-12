<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
class Base extends Controller
{
    public function _initialize()
    {
    	//得到栏目数据，并且分配
    	$cates = Db::name('cate')->order('id asc')->select(); 
    	$this->assign('cates',$cates);

    	//执行处理右边的热门点击和推荐阅读
    	$this->right();
    }

    //处理右边的热门点击和推荐阅读
    public function right(){
    	//热门点击
    	$clicks=db('article')->order('click desc')->limit(4)->select();
    	//推荐
    	$recs=db('article')->where('state','=',1)->order('click desc')->limit(4)->select();
    	$this->assign(array(
    		'clicks'=>$clicks,
    		'recs'=>$recs,
    	));
    }

}
