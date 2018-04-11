<?php
namespace app\admin\validate;

use think\Validate;
class Admin extends Validate
{
    protected $rule = [
        'username' => 'require|max:25|unique:admin',
        'password' => 'require|min:32',
    ];

    protected $message = [
        'username.require' => '管理员名称必须填写',
        'username.max' => '管理员名称最多不能超过25个字符',
        'password.require' => '管理员密码必须填写',
        'password.min' => '管理员密码最少32个字符',
    ];


    protected $scene = [
        'add' => ['username'=>'require|unique:admin','password'],
        'edit' => ['username'=>'require|unique:admin'],
    ];
}
