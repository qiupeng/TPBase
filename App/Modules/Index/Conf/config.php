<?php
	return array(
		'APP_AUTOLOAD_PATH' => '@.TagLib', //自动载入，@当前应用项目
		'TAGLIB_BUILD_IN' => 'Cx,Hd', //载入标签库Hd，必须要加上Cx，因为Cx是ThinkPHP的核心标签库
		
		//开启静态缓存
		'HTML_CACHE_ON' => true,
		'HTML_CACHE_RULES' => array(  //定义静态缓存的规则
			'Show:index' => array('{:module}_{:action}_{id}', 20),   //缓存文件的名称 生成20秒，写成0的话，表示永久
		),
        
		//开启动态缓存方式
		'DATA_CACHE_TYPE' => 'file',  //默认是文件缓存

		//开启动态缓存方式Memcache
// 		'DATA_CACHE_TYPE' => 'Memcache',
// 		'MEMCACHE_HOST' => '127.0.0.1',
// 		'MEMCACHE_PORT' => 11211,

		//开启动态缓存方式Redis
// 		'DATA_CACHE_TYPE' => 'Redis',
// 		'REDIS_HOST' => '127.0.0.1',
// 		'REDIS_PORT' => 6379,
	);
?>