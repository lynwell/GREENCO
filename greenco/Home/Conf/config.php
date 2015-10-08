<?php
return array(
    //'配置项'=>'配置值'
        'LANG_SWITCH_ON'     =>     true,    //开启语言包功能        
        'LANG_AUTO_DETECT'     =>     true, // 自动侦测语言
        'DEFAULT_LANG'         =>     'zh-cn', // 默认语言        
        'LANG_LIST'            =>    'en-us,zh-cn,zh-tw', //必须写可允许的语言列表
        'VAR_LANGUAGE'     => 'l', // 默认语言切换变量
		'SHOW_PAGE_TRACE' =>true,
		//开启全局缓存
// 		'HTML_CACHE_ON'=>true,
// 		//全局缓存过期时间
// 		'HTML_CACHE_TIME'=>60,
// 		//缓存后缀
// 		'HTML_FILE_SUFFIX' => '.html',// 默认静态文件后缀
		//缓存规则
// 		'HTML_CACHE_RULES'=>array(
// 			//	'About:aboutUs'=>array('{:controller}/{:action}',60),
// 		),
		// 邮箱地址
		'MAIL_ADDRESS'=>'494886251@qq.com',
		// 邮箱SMTP服务器
		'MAIL_SMTP'=>'smtp.qq.com',
		// 邮箱登录帐号
		'MAIL_LOGINNAME'=>'494886251@qq.com',
		// 邮箱密码
		'MAIL_PASSWORD'=>'woyaokuaile',
		//编码
		'MAIL_CHARSET'=>'UTF-8',
		//邮箱认证
		'MAIL_AUTH'=>true,
		//true HTML格式 false TXT格式
		'MAIL_HTML'=>true,
		
		
		//静态缓存
		'HTML_CACHE_ON'     =>    true, // 开启静态缓存
		'HTML_CACHE_TIME'   =>    60,   // 全局静态缓存有效期（秒）
		'HTML_FILE_SUFFIX'  =>    '.html', // 设置静态缓存文件后缀
		'HTML_CACHE_RULES'  =>     array(  // 定义静态缓存规则
				// 定义格式1 数组方式
				'Index:'=>array('Index/{:action}_{lan}','600'),
		),
		
);