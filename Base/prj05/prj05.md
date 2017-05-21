# PRJ05项目内容笔记
> 访问前台：[http://localhost:8888/TPBase/Base/prj05/](http://localhost:8888/TPBase/Base/prj05/)

> 访问后台：[http://localhost:8888/TPBase/Base/prj05/index.php/Admin]()

> 后台登入：[http://localhost:8888/TPBase/Base/prj05/index.php/Admin/Login]()

> 访问hadnle方法：[http://localhost:8888/TPBase/Base/prj05/Index.php/Index/Index/handle]()


## 一、主要内容

* 应用分组中，如何建立模板  以及配置项 TMPL_FILE_DEPR的含义？
* 定制错误页面，配置项 TMPL_EXCEPTION_FILE 的含义
* halt() 和 _404()方法
* 是否是Ajax提交：IS_AJAX 或者 $this->isAjax()
* isset()函数、str_replace
* var_export()、file_put_contents()函数
* TP中的F()方法：把要给数组写到文件中，然后还可以读取
* import('ORG.Util.Image')
* 存到session中的验证码是进过了md5加密后的
* 没有登入，不让进入index
* 退出功能
* session会存到D:\wamp\tmp，以文件的形式保存
* 自定义session 数据库存储：
* 自定义用redis处理session
* wampserver 安装redis扩展：http://www.thinkphp.cn/topic/7789.html
* thinkphp使用redis存储session：
* 自学：memcached windows
* 在TP中，css和js新的引入方法：

	<css file='__PUBLIC__/Css/public.css'/>

	<js file='__PUBLIC__/JS/jquery-1.7.2.min.js' />
* 分页显示功能
* 删除帖子功能
* iframe框架
* APP_GROUP_PATH  和 APP_GROUP_MODE 配置项，APP_GROUP_PATH默认为Modules
* 独立分组模式APP_GROUP_MODE = 1
* 

## 二、知识点
> 1、str_replace 函数
	

	把字符串 "Hello world!" 中的字符 "world" 替换为 "Shanghai"：
	<?php
		echo str_replace("world","Shanghai","Hello world!");
	?>

> 2、自定义session数据库存储

	ThinkPHP/Extend/Driver/Session/SessionDb.class.php
	
	进入mysql控制台：
	use think;
	
	CREATE TABLE hd_session (
		session_id varchar(255) NOT NULL,
		session_expire int(11) NOT NULL,
		session_data blob,
		UNIQUE KEY `session_id` (`session_id`)
	);


> 3、redis的安装
	
	安装：https://jingyan.baidu.com/article/f25ef2546119fd482c1b8214.html
		http://os.51cto.com/art/201403/431103.htm
		http://www.cnblogs.com/woider/p/6489913.html

	下载网址：https://github.com/ServiceStack/redis-windows
	cd D:\Program Files (x86)\redis
	redis-server.exe  redis.windows.conf
	
	redis的命令
	redis-cli.exe 打开客户端
	
	查看所有的变量
	keys *
	
	设置变量：set age 21
	得到变量：get age
	清空：flushall

	$redis = new Redis();
    $redis->connect('127.0.0.1',6379);
    $redis->set('test','hello world!');
    echo $redis->get("test");
	
	注意点：
	把这个文件 ThinkPHP/Extend/Driver/Session/SessionDb.class.php 复制一份
	在这个基础之上改。这样定义我们的SessionRedis.class.php
	为什么这么建立，找到：ThinkPHP/Common/function.php中的session方法，就可以知道原因了