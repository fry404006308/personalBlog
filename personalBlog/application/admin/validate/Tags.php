<?php
namespace app\admin\validate;

use think\Validate;
class Tags extends Validate
{
    protected $rule = [
        'tagname' => 'require|max:50|unique:tags',
    ];

    protected $message = [
        'tagname.require' => 'Tag标签名称必须填写',
        'tagname.max' => 'Tag标签名称长度不得超过50个字符',
        'tagname.unique' => 'Tag标签名称唯一',
        
    ];


    protected $scene = [
        'add' => ['tagname'],
        'edit' => ['tagname'],
    ];





}
