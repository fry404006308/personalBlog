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
    	$this->assign(array(
    		'articleres'=>$articleres,
    		'cateres'=>$cateres,
    	));


        return view();
    }
}
