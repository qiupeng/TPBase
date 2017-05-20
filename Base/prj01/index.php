<?php
    //定义一个单入口文件
    
    
    
    //http://localhost:8888/TPBase/Base/prj01/index.php?m=Show&a=abc
    
    //echo '<pre>';
    //print_r($_GET);
    /*
    $control = isset($_GET['m']) ? $_GET['m'] : 'Index';    //如果get请求中存在m就去m，否则默认为Index
    $action = isset($_GET['a']) ? $_GET['a'] : 'index';
    $obj = new $control();
    $obj->$action();   //调用类中的方法
    
    class Index {
        function index () {
            echo 'this is Index index';
        }
    }
    die();
    */
    header("Content-type: text/html; charset=utf-8");   //设置编码
    
    //定义以下几个常量
    define('APP_NAME', 'Index');    //项目名称
    define('APP_PATH','./Index/');  //项目路径，后面必须要加上斜线
    define('APP_DEBUG', TRUE);      //在开发阶段，我们一般都要开启调试模式,这个可以保证我们的更改会是及时性的
    define('RUNTIME_PATH', APP_PATH.'Runtime/'); //定义编译目录位置，否则TP3.1.3中，会出现在D盘根目录
    include '../../ThinkPHP/ThinkPHP.php';          //引入ThinkPHP核心文件

    
?>