<?php
return [
    // +----------------------------------------------------------------------
    // | 模板设置
    // +----------------------------------------------------------------------

    'template'               => [
        // 模板后缀
        'view_suffix'  => 'htm',
    ],


    // 视图输出字符串内容替换
    'view_replace_str' => [
        '__PUBLIC__'=>SITE_URL.'/public/static/admin',
    ],
    // 默认跳转页面对应的模板文件
    'dispatch_success_tmpl'  => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',
    'dispatch_error_tmpl'    => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',
];
