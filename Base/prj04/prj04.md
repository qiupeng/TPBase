# PRJ04项目内容笔记
> 访问前台：[http://localhost:8888/TPBase/Base/prj04/](http://localhost:8888/TPBase/Base/prj04/)

> 访问后台：[http://localhost:8888/TPBase/Base/prj04/index.php/Admin]()


## 一、主要内容

* 应用分组的好处：配置文件、函数库共用
* 应用分组中，公共配置文件，前台和后台独立的配置文件如何建立
* 应用分组中，前台和后台控制器如何建立
* 常量：$GLOBALS 和 $_SERVER
* 应用分组中，公共函数库，前台和后台独立的函数库如何建立。


## 二、知识点
> 1、应用分组的好处？
	
	优点：
		1) 配置文件、函数库 共用方便
		2）不需要单独的建立两个单入口文件，只需要建立一个就可以了

> 2、应用分组中，公共配置文件，前台和后台独立的配置文件如何建立？

	在App/Conf 文件夹下
		config.php便为公共配置文件
		Admin/config.php: 后台独立配置文件
		Index/config.php: 前台独立配置文件

> 3、应用分组中，前台和后台控制器如何建立？

	在App/Lib/Action/文件夹下
	分别建立两个文件夹：Index 和 Admin
	然后在这个两个文件夹中建立控制器即可。

> 4、常量：$GLOBALS 和 $_SERVER？

	$GLOBALS：一个包含了全部变量的全局组合数组。变量的名字就是数组的键。
	$_SERVER： 是一个包含了诸如头信息(header)、路径(path)、以及脚本位置(script locations)等等信息的数组。这个数组中的项目由 Web 服务器创建。

> 5、应用分组中，公共函数库，前台和后台独立的函数库如何建立？

	在App/Common文件夹下
		common.php：便是公共函数库。名字一定要是common这样才会被自动加载
		Admin/function.php：后台函数库，名字一定要是function，才会被自动加载
		Index/function.php：前台函数库，名字一定要是function，才会被自动加载