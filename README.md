# TPBase
ThinkPHP基础学习

## Blog项目
> 后台地址访问路径：
	[http://127.0.0.1:8888/TPBase/index.php/Admin]()

## 主要内容
1. 独立分组如何建目录
2. <span style="color:red;">登入功能<span>：redirect(__ GROUP __);
	
		__ GROUP __：TPBase/index.php/Admin
		redirect()：ThinkPHP中的跳转函数

3. 公共控制器的新建位置：App/Lib/Action/CommonAction.php
	
		我们新建公共控制器：CommonAction
		自动运行的方法：_initialize(),这个可以用来判断session是否存在，然后才可以进入index
4. redirect() 和 $this->redirect()的区别？
	
		redirect()是一个函数，参数为url地址
		而$this->redirect()：是类方法，参数用U()函数的那种方式,例如：
		$this->redirect(GROUP_NAME . '/Login/index');

5. mysql 函数
	
		SELECT md5("hsy");	<br>
		select unix_timestamp(now()) 
		
		加索引
		alter table hd_cate add index pid(pid);

6. 分组名称获取：GROUP_NAME
	
		href="{:U(GROUP_NAME . '/Blog/index')}"

7. Conf路径常量：CONF_PATH

8. F():函数，写入文件
	
		F('verify', $_POST, CONF_PATH )	//文件名称，写入的数据，文件所在的路径

9. <span style="color:red;">验证码设置功能</span>
	
		使用F()函数来实现，动态的修改verfiy的配置文件

10. 退出功能
	
		session_unset();
		session_destroy();
		$this->redirect(GROUP_NAME . '/Login/index');

11. 操作数据库方法
	
		> 更新一个字段:setField
			$db->where(array('id'=>$id))->setField('sort',$sort);     
		> 多对多关联模型
			。 ThinkPHP中多对多的关联模型插入是有问题的，他每次插入的时候，会把副表清空在插入副表数据
			。 读取是没有问题的 
			。 他删除也是有问题的，当我们删除一条记录的时候，他会把副表全部删除
			
		> 
12. PHP函数
	
		> str_repeat()
		> array_merge()
		> self::unlimitedForLevel, 这里的self是什么意思
		> json_encode
		> extract()
13. UEditor插件使用
		
		下载地址：http://ueditor.baidu.com/website/index.html
		如何使用：
		<script type="text/javascript">
			window.UEDITOR_HOME_URL = '__ROOT__/Data/Ueditor/';
			window.onload = function(){
				window.UEDITOR_CONFIG.initialFrameWidth = 1130;
				window.UEDITOR_CONFIG.initialFrameHeight = 600;
				window.UEDITOR_CONFIG.imageUrl = "{:U(GROUP_NAME . '/Blog/upload')}";  
		        window.UEDITOR_CONFIG.imagePath = '__ROOT__/Uploads/';
				UE.getEditor('content');
			}
		</script>
		<js file='__ROOT__/Data/Ueditor/ueditor.config.js'/>
		<js file='__ROOT__/Data/Ueditor/ueditor.all.min.js'/>
		
		百度编辑器，图片上传，默认是传入到：Ueditor/php/ 会自动建立一个upload文件夹
14. 常量
		
		ACTION_NAME：当前的方法名称
		
15. 引入公共模板

		<include file='Common:right'/>

16. 自定义标签库

17. Appach 配置
		
		http://www.cnblogs.com/tianguook/p/3726457.html
		AllowOverride All
18. Wideget使用 以及 与自定义标签的区别
	
		传参数：{:W('New',array('limit' => 5))}	
		
19. 视图模型
	
	视图模型和关联模型的区别
	视图模型只发送一条sql
	关联模型发送多条sql，来组合一个数组

20、代码高亮插件：
		
		引入插件的js和css文件，然后调用一下就可以了
		
		<link rel="stylesheet" href="__ROOT__/Data/Ueditor/third-party/
				SyntaxHighlighter/shCoreDefault.css" />
		<script type="text/javascript" src='__ROOT__/Data/Ueditor/third-party/
				SyntaxHighlighter/shCore.js'></script>
		
		<script type="text/javascript">
			SyntaxHighlighter.all(); //调用Uedirot的插件，使代码高亮显示
		</script>

21、代码强制换行的css
	
		<div class='content' style="word-break: break-all">

22、静态缓存

23、动态缓存
	
	> 首先：安装memcached扩展
		http://www.thinkphp.cn/topic/30267.html
		
	> memcached
	http://blog.csdn.net/cn_yaojin/article/details/51943794
	http://jingyan.baidu.com/article/c85b7a640fbfd5003bac9500.html

	memcached -d install
	memcached -d start
	telnet 127.0.0.1 11211 
	stats (输入的时候看不到字符)

	> memcache命令行
	http://www.cnblogs.com/wayne173/p/5652034.html
	http://blog.csdn.net/qq_30739519/article/details/51103558
	http://blog.csdn.net/axzywan/article/details/6531580
	
	//清空计数器
	stats reset

	stats items
	stats cachedump 12 1
	


## PHP代码自动格式

	依次点击Window->Preferences->PHP->Editor->Save Actions，在Save Actions界面中， 
	勾选复选框Format source code。Apply后试试是不是已经保存代码是就会自动格式化代码了。

