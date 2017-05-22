<?php 
	Class CommonAction extends Action{
		Public function _initialize(){    //会自动运行的方法，在其他方法运行时候，会自动先运行
// 			if (!isset($_SESSION['uid']) || !isset($_SESSION['username'])) { //检测不到session，就进入登入页面
// 				$this->redirect('Admin/Login/index');
// 			}

		    if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
		        $this->redirect('Admin/Login/index');
		    }
		    // echo C('NOT_AUTH_ACTION').'<br/>';
		    // p(explode(',',C('NOT_AUTH_ACTION')));
		    // echo MODULE_NAME .'<br/>'; //控制器的名称
		    // echo ACTION_NAME;die();    //当前操作方法的名称
		    
		    //不需要验证的方法
		    $notAuth = in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE'))) || in_array(ACTION_NAME,explode(',',C('NOT_AUTH_ACTION')));
		    if (C('USER_AUTH_ON') && !$notAuth) {
		        import('ORG.Util.RBAC');
		        // var_dump(RBAC::AccessDecision(GROUP_NAME));
		        RBAC::AccessDecision(GROUP_NAME) || $this->error('没有权限');
		    }
		}	
	}	
?>