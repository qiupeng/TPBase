<?php 
	/**
	 * 后台：
	 */
	Class SystemAction extends CommonAction {
		//验证码设置视图
		Public function verify(){

			$this->display(); // => /blog0.2
		}
        
		//验证码设置
		Public function updateVerify(){
			// p($_POST);
			// echo APP_PATH;  // ./APP/
			// echo CONF_PATH; //./APP/Conf/
			// dump(F('verify', $_POST, CONF_PATH ));    //文件名称，写入的数据，文件所在的路径
			if (F('verify', $_POST, CONF_PATH )) {
				$this->success('修改成功',U(GROUP_NAME . '/System/verify'));
			} else {
				$this->error('修改失败，请修改', CONF_PATH . 'verify.php权限');
			}
		}
	}
?>