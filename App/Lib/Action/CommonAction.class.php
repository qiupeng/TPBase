<?php
	Class CommonAction extends Action{

		Public function _initialize () {  //自动运行的方法
			// echo 2;
			if (!isset($_SESSION['uid'])) {
				$this->redirect(GROUP_NAME . '/Login/index');
			}
		}
	}
?>