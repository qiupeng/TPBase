<?php 
	Class CommonAction extends Action{
		Public function _initialize(){    //会自动运行的方法，在其他方法运行时候，会自动先运行
			if (!isset($_SESSION['uid']) || !isset($_SESSION['username'])) { //检测不到session，就进入登入页面
				$this->redirect('Admin/Login/index');
			}
		}	
	}	
?>