<?php
namespace app\admin\model;

use think\Model;
class Article extends Model
{
    public function cate()
	{
		//多篇文章属于一个栏目
		return $this->belongsTo('cate','cateid');
	}
}
