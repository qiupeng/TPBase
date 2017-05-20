# PRJ01项目内容笔记

## 主要内容：
1. 建立了两个单入口文件，index.php admin.php 分别对应于前台和后台
2. 建立了think数据库，建立了表hd_user.
3. 使用tp框架，连接了数据库，并操作了数据表user，打印出了结果集。
4. 建立了公共的配置文件Conf/config.php，使前台和后台可以公用，我们把数据库的连接配置放在里面


### 知识点

1、MVC模式：

	单入口文件，然后通过 Controller(控制器)，来决定是调用： Model(数据库操作)/ view(视图)

2、建立一个单入口文件
	index.php
	
	然后会自动生成Index文件夹

3、首页控制器
	Index -- Lib -- Action -- IndexAction.class.php
	
	然后我们在该目录下建立ShowAction.class.php,里面建立一个公共方法abc()
	在页面中输入地址：http://localhost:8888/TPBase/Base/prj01/index.php?m=Show&a=abc，就可以访问 到这个方法了.
	m指定调用哪个控制器，a指定调用哪个方法
	
4、用数组打印：$_GET
	print_r($_GET);	
	
	Array
	(
	    [m] => Show
	    [a] => abc
	)
    
5、阻止程序运行：die();

6、读取配置C('DB_HOST');

7、数据库相关操作
	
    $db = M('user');    //实例化模型表
    $result = $db->select();    //查询结果集
    dump($result);  //tp里面的打印函数
	