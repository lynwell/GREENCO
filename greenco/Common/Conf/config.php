<?php
return array(
		//'配置项'=>'配置值'
		//数据库配置信息
		'DB_TYPE'   => 'mysql', // 数据库类型
		'DB_HOST'   => 'greenco3306.mysql.rds.aliyuncs.com', // 服务器地址
		'DB_NAME'   => 'greenco', // 数据库名
		'DB_USER'   => 'lsy', // 用户名
		'DB_PWD'    => '1isongyang', // 密码
		'DB_PORT'   => 3306, // 端口
		'DB_PREFIX' => '', // 数据库表前缀

		//资源路径设置
		'SRC_ROOT'=>URL.'/src',
		'IMG_ROOT'=>URL.'/src/img',
		'JS_ROOT'=>URL.'/src/js',
		'COM_TP'=>'../Public',
		//多语言网址
		'ZH_URL'=>'http://www.greenco.com.cn',
		'EN_URL'=>'http://www.greenco.cn',
		'ES_URL'=>'http://spanish.greenco.cn',
		
		//
		'Index_ROOT'=>URL.'/Index',
		'ABOUT_ROOT'=>URL.'/About',
		'PROD_ROOT'=>URL.'/PROD',
		'NEWS_ROOT'=>URL.'/News',
		'CONTACT_ROOT'=>URL.'/Contact',
		//伪静态
		'URL_HTML_SUFFIX'=>'html',
		//memcache缓存设置
		//'DATA_CACHE_TYPE' => 'Memcache',
		//memcache服务器地址和端口，这里为本机
		//'MEMCACHE_HOST' => 'tcp://127.0.0.1:11211', 
		//'DATA_CACHE_TIME' => '3600' ,
		
		
		//域名绑定
		'APP_SUB_DOMAIN_DEPLOY'   =>    1, // 开启子域名或者IP配置
		'APP_SUB_DOMAIN_RULES'    =>    array(
				'www.greenco.com.cn'=>array('Home','lan=zh-cn'),
				'www.greenco.cn'=>array('Home','lan=en-us'),
				'spanish.greenco.cn'=>array('Home','lan=es'),
				'test.greenco.cn'=>array('Home','lan=en-us'),
				'test.greenco.com.cn'=>array('Home','lan=en-us'),
				'admin.greenco.cn'=>array('Admin',''),
				/* 域名部署配置
				 *格式1: '子域名或泛域名或IP'=> '模块名[/控制器名]';
		*格式2: '子域名或泛域名或IP'=> array('模块名[/控制器名]','var1=a&var2=b&var3=*');
		*/
		),
		

		
);
