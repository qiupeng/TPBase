<?php
    header("Content-type: text/html; charset=utf-8");   //设置编码

	define('APP_NAME', 'APP');//项目名称
	define('APP_PATH','./APP/');
	define('APP_DEBUG', TRUE);
	define('RUNTIME_PATH', APP_PATH.'Runtime/'); //定义编译目录位置
	include './ThinkPHP/ThinkPHP.php';
?>