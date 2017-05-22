<?php 
	/**
	 * 这是后台配置文件
	 */
	return array(
		'TMPL_PARSE_STRING' => array(
			// 将PUBLIC映射到这个路径下：
			'__PUBLIC__' => __ROOT__ . '/' . APP_NAME . '/Modules/' . GROUP_NAME . '/Tpl/Public',
		),
	    
	    //去掉伪静态后缀名
	    'URL_HTML_SUFFIX'  =>  '',
	    
	    //开启ThinkPHP追踪模式
	    //'SHOW_PAGE_TRACE'  => true,
	    
	    //指定超级管理员名称
	    'RBAC_SUPERADMIN' =>  'admin',
	    
	    //超级管理员识别
	    'ADMIN_AUTH_KEY'   =>  'superadmin',
	    
	    'USER_AUTH_ON' => true, //是否开启验证
	    
	    'USER_AUTH_TYPE' => 2, // 验证类型（1：登入验证 2：实时验证）
	    'USER_AUTH_KEY' => 'uid', //用户认证识别号
	    'NOT_AUTH_MODULE' => 'Index',//无需验证的模块（控制器）
	    'NOT_AUTH_ACTION' => 'addRoleHandle,addNodeHandle,setAccess,addUserHandle',//无需验证的动作方法
	    'RBAC_ROLE_TABLE' =>'hd_role',//角色名称
	    'RBAC_USER_TABLE' => 'hd_role_user',//角色与用户的中间表名称
	    'RBAC_ACCESS_TABLE' => 'hd_access', //权限表名称
	    'RBAC_NODE_TABLE' => 'hd_node', //节点表名称
	)
?>