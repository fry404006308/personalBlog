<?php
namespace app\admin\validate;

use think\Validate;
class Admin extends Validate
{
    protected $rule = [
        'username' => 'require|max:25',
        'password' => 'require|min:32',
    ];

    protected $message = [
        'username.require' => '名称必须',
        'username.max' => '名称最多不能超过25个字符',
        'password.require' => '密码必须',
        'password.min' => '密码最少32个字符',
    ];


    protected $scene = [
        'add' => ['username'=>'require','password'],
        'edit' => ['username'=>'require'],
    ];
}
