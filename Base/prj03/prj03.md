# PRJ03项目内容笔记
> 访问地址：[http://localhost:8888/TPBase/Base/prj03/](http://localhost:8888/TPBase/Base/prj03/)

## 一、主要内容
* URL_MODEL和 URL_HTML_SUFFIX 含义
* TP中生成URL地址的方法：U() 函数
* 在模板中使用使用U()函数：{:U()}
* 了解 $_POST
* 常量：THINK_VERSION ，ThinkPHP的版本号
* 获取表单请求的参数方法I(),他会自动判断你是post还是get，所以这个两种方式都可以用它获取
* _404()方法 、halt()方法 和 htmlspecialchars()方法
* 操作数据库的方法：M('wish') data() add() delete()
* 分配变量到模板，在模板中使用分配过来的变量用：{$a}
* TP的模板引擎中foreach
* 在TP模板引擎中使用函数：使用竖线：|，等号为传参.
* 还有一种使用函数是：{:函数名()}


## 二、知识点
> 1、自动加载函数库

		<!-- foreach 中你可以指定key，默认为$key -->
		<!-- 会被解析成：<?php foreach ($wish as $key => $v)  ?> 
		<?php endforeach; >-->

		