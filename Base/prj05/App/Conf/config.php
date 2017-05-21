<?php
/**
 * 该配置文件，前台和后台都可以用
 */
return array(
    //开启应用分组
	'APP_GROUP_LIST' => 'Index,Admin', //定义有哪些分组
    'DEFAULT_GROUP' =>  'Index',        //默认分组，就是http://localhost:8888/TPBase/Base/prj04/index.php默认打开的是前台还是后台
    
    //开启独立分组
    'APP_GROUP_MODE' =>  0,             //1：表示开启独立分组，0表示普通模式
    'APP_GROUP_PATH' =>  'Modules',     //独立分组文件夹名称
    
    //数据库连接参数
    'DB_HOST'   => 'localhost',
    'DB_NAME'   => 'think',         // 数据库名
    'DB_USER'   => 'root',          // 用户名
    'DB_PWD'    => '20091294',      // 密码
    'DB_PORT'   => '3308',          // 端口
    'DB_PREFIX' => 'hd_',           // 数据库表前缀
    
    //点语法默认解析，只解析数组。
    //分配变量到模板时候，点语法会判断你是数组还是对象，那么这里可以指定，我只解析数组。这样编译速度会变快
    'TMPL_VAR_IDENTIFY' => 'array',
    
    //模板路径连接符
    //减少模板文件目录深度，但是文件名要起成：Index_index.html。控制器_文件名.html
    'TMPL_FILE_DEPR'    =>  '_',
    
    //默认过滤函数,因为新版3.1.3中的I函数已经使用htmlspecialchars处理了，所以我们不需要在配置了
    //'DEFAULT_FILTER'    => 'htmlspecialchars',
    
    //自定义SESSION 使用数据库存储，不再是文件存储了
    'SESSION_TYPE'  =>  'Db',
    //'SESSION_TYPE'  =>  'Redis',
    
    'SESSION_AUTO_START'    => true,    //是否自动开启session，默认是自动开启的
    
    //SESSION前缀
    //'SESSION_PREFIX'    =>  'sess_',
    
    //REDIS服务器地址
    'REDIS_HOST'    =>  '127.0.0.1',
    
    //REDIS端口
    'REDIS_PORT'    =>  6379,
    
    //SESSION有效时间
    'SESSION_EXPIRE'    => 1440 ,
 
);
?>