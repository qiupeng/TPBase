<?php
    //定义一个单入口文件
    
    header("Content-type: text/html; charset=utf-8");   //设置编码
    
    //定义以下几个常量
    define('APP_NAME', 'App');    //项目名称
    define('APP_PATH','./App/');  //项目路径，后面必须要加上斜线
    define('APP_DEBUG', TRUE);      //在开发阶段，我们一般都要开启调试模式,这个可以保证我们的更改会是及时性的
    //define('RUNTIME_PATH', APP_PATH.'Runtime/'); //定义编译目录位置，否则TP3.1.3中，会出现在D盘根目录
    include '../../ThinkPHP/ThinkPHP.php';          //引入ThinkPHP核心文件

    
?>