<?php
return array(
    //数据库连接参数
    'DB_HOST'   => 'localhost',
    'DB_NAME'   => 'think',         // 数据库名
    'DB_USER'   => 'root',          // 用户名
    'DB_PWD'    => '20091294',      // 密码
    'DB_PORT'   => '3308',          // 端口
    'DB_PREFIX' => 'hd_',           // 数据库表前缀
    
    'URL_MODEL' => 1,               //URL模式，1:表示采用PATHINFO模式，0：表示普通模式  2:REWRITE模式
    'URL_HTML_SUFFIX'   =>  '',     //去掉伪静态地址
    
    //模版文件后缀名
    'TMPL_TEMPLATE_SUFFIX' => '.html',
    
    //字符过滤
    'DEFAULT_FILTER' => 'htmlspecialchars',
    
    //点语法默认解析，只解析数组，分配变量到模板时候，点语法会判断你是数组还是对象，那么这里可以指定，我只解析数组。这样编译速度会变快
    'TMPL_VAR_IDENTIFY' => 'array',
);
?>