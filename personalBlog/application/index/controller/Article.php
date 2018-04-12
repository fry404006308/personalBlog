<?php
namespace app\index\controller;

use app\index\controller\Base;
class Article extends Base
{
    public function index()
    {
    	$arid=input('arid');
    	$articleres=db('article')->find($arid);
    	//访问一次这个方法，说明文章被访问一次，让文章的click字段值加1
    	db('article')->where('id','=',$arid)->setInc('click');
    	$cateres=db('cate')->find($articleres['cateid']);

        //推荐
        $recres=db('article')->where(array('cateid'=>$cateres['id'],'state'=>1))->limit(8)->select();

        //执行相关文章函数ralate
        $ralateres=$this->ralate($articleres['keywords'],$articleres['id']);
    	$this->assign(array(
    		'articleres'=>$articleres,
    		'cateres'=>$cateres,
            'recres'=>$recres,
            'ralateres'=>$ralateres,
    	));


        return view();
    }


    //相关文章
    public function ralate($keywords,$id){
        $arr=explode(',',$keywords);
        static $ralateres= array();
        foreach ($arr as $k => $v) {
            //找相似关键词的文章
            $map['keywords']=['like','%'.$v.'%'];
            //自己相同的文章不能显示在这里,id不能相同
            $map['id']=['neq',$id];
            $tmp=db('article')->where($map)->order('id desc')->limit(8)->select();
            $ralateres=array_merge($ralateres,$tmp);
        }
        //给$ralateres去重，因为不同关键词匹配的时候可能匹配到重复文章
        // array_unique只能做一维的，所以我们用自己写的函数
        // $ralateres=arr_unique($ralateres);

        return $ralateres;
    }
}
