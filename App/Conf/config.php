<?php
return array(

	// 数据库配置
	'DB_HOST' => '127.0.0.1',
    'DB_PORT' => '3308',
	'DB_USER' => 'root',
	'DB_PWD' => '20091294',
	'DB_NAME' => 'blog',
	'DB_PREFIX' => 'hd_',
	
	// 分组配置：
	'APP_GROUP_LIST' =>'Index,Admin',//开启分组;定义项目分组
	'DEFAULT_GROUP' => 'Index',//默认分组就是默认的是前台还是其他
	'APP_GROUP_MODE' => 1,
	'APP_GROUP_PATH' => 'Modules',

	//载入其他配置文件，注意不要加空格
	'LOAD_EXT_CONFIG' => 'verify,water',

	'SHOW_PAGE_TRACE' => true, //开启显示调试模式

	//2 的话不需要写index.php ; 1 的话需要
	'URL_MODEL' =>2,
	'URL_ROUTER_ON' => true, //开启路由
	'URL_ROUTE_RULES' => array(    //定义路由规则
		//'c/:id' => 'Index/List/index' //冒号代表的是get请求的参数
		//正则表达式： \d 代表数字
		'/^c_(\d+)$/' => 'Index/List/index?id=:1',    //:1代表 原子组里面的数字
		'/^s_(\d+)$/' => 'Index/Show/index?id=:1'
	)

);
?>