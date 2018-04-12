<?php
namespace app\index\controller;

use app\index\controller\Base;
class Cate extends Base
{
    public function index()
    {
    	$cateid=input('cateid');
    	$articleres=db('article')->where(array('cateid'=>$cateid))->paginate(1);
    	$this->assign('articleres',$articleres); 
        return view();
    }
}
