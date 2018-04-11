<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
class Base extends Controller
{
    public function _initialize()
    {
    	//得到数据，并且分配
    	$cateres = Db::name('cate')->order('id asc')->select(); 
    	$this->assign('cateres',$cateres);
    }
}
