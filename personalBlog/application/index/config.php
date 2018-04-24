<?php
return [
    // 视图输出字符串内容替换
    'view_replace_str' => [
        // '__PUBLIC__'=>SITE_URL.'/public/static/index',
        // '__IMG__'=>SITE_URL.'/public/static/',        
	    '__PUBLIC__'=>'/static/index',
        '__IMG__'=>'/static/',
    ],
    // 默认跳转页面对应的模板文件
    'dispatch_success_tmpl'  => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',
    'dispatch_error_tmpl'    => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',
];
