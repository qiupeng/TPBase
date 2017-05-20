# PRJ02项目内容笔记
> 访问地址：[http://localhost:8888/TPBase/Base/prj02/](http://localhost:8888/TPBase/Base/prj02/)

## 一、主要内容
* 自定义函数库
* 扩展函数库
* 临时加载函数
* 模板显示
* __ PUBLIC __
* __ ROOT __


## 二、知识点
> 1、自动加载函数库

	在Index/Common中建立函数。必须以common.php为名才会被自动加载进来.

> 2、扩展函数库

	那么如果是扩展函数库，如何被自动加载进来呢？
	我们需要在Index/Conf/config.php中加上如下的配置即可。

	'LOAD_EXT_FILE'  => 'function'	
> 3、临时加载函数

	我们可以在某个方法内，如果要使用到某个函数的时候，可以临时加载fuction.php
	这样便可以调用到function中定义的函数了。
	
	load('@.function'); //临时加载,只对当前方法内有效

> 4、两种方式访问控制器中的方法
	
	例如：我们要访问Index控制器中的show方法？
		我们便可以使用底下的两种方式来访问
		http://localhost:8888/TPBase/Base/prj02/Index.php/Index/show
		http://localhost:8888/TPBase/Base/prj02/Index.php?m=Index&a=show

> 5、__ PUBLIC __
	
	__PUBLIC__: 如果没有被手动映射的话，会被自动解析成  /项目/Public/
	
	那么如何手动映射呢？
	在Index/Conf/config.php 中，增加如下配置即可。
	
	'TMPL_PARSE_STRING' =>  array(
        '__PUBLIC__' => __ROOT__ . '/' . APP_NAME . '/Tpl/Public'  //将__PUBLIC__ 映射到一个新的地址
    )

> 6、__ ROOT __

	__ROOT__：是一个常量，为项目的根目录
	var_dump(defined('__ROOT__'));    //检查常量是否存在，用defined()函数

> 7、显示模板

	在IndexAction控制器中index方法里面，我们使用： $this->display();   //显示模板
	系统会自动去找：Index/Tpl/Index/index.html
	