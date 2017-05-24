<?php 
	/**
	 * 后台首页控制器
	 */
	Class IndexAction extends CommonAction {
		//首页视图
		Public function index(){
			// echo __ROOT__;
			$this->display();
		}
		
		//退出登入
		Public function logout(){
			session_unset();
			session_destroy();
			$this->redirect(GROUP_NAME . '/Login/index');
		}
	}
?>