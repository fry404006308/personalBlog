<?php
namespace app\admin\validate;

use think\Validate;
class Links extends Validate
{
    protected $rule = [
        'title' => 'require|max:50',
        'url' => 'require',
    ];

    protected $message = [
        'title.require' => '链接名称必须填写',
        'title.max' => '链接名称最多不能超过50个字符',
        'url.require' => '链接地址必须填写',
        
    ];


    protected $scene = [
        'add' => ['title'=>'require','url'],
        'edit' => ['title'=>'require','url'],
    ];





}
