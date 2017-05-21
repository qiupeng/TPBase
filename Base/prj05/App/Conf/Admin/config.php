<?php 
	/**
	 * 这是后台配置文件
	 */
	return array(
		'TMPL_PARSE_STRING' => array(
			// 将PUBLIC映射到这个路径下：
			'__PUBLIC__' => __ROOT__ . '/' . APP_NAME . '/Tpl/Admin/Public',
		),
	    
	    //去掉伪静态后缀名
	    'URL_HTML_SUFFIX'  =>  '',
	)
?>