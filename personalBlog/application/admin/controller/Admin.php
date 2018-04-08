<?php
namespace app\admin\controller;

use think\Controller;
class Admin extends controller
{
    public function lst()
    {
        return view('list');
    }
    public function add()
    {
        return view();
    }
}
