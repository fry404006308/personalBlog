<?php
namespace app\admin\validate;

use think\Validate;
class Article extends Validate
{
    protected $rule = [
        'title' => 'require|max:50',
        'cateid' => 'require',
    ];

    protected $message = [
        'title.require' => '文章名称必须填写',
        'title.max' => '文章名称最多不能超过50个字符',
        'cateid.require' => '文章所属栏目必须选择',
        
    ];


    protected $scene = [
        'add' => ['title'=>'require','cateid'],
        'edit' => ['title'=>'require','cateid'],
    ];





}
