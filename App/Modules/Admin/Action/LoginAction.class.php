<?php 
	/**
	 * 后台登入控制器
	 */
	Class LoginAction extends Action {
		//登入页面视图
		Public function index(){

			$this->display(); // => /blog0.2
		}

		// 登入表单操作
		Public function login(){
			// p($_POST);
			if(!IS_POST) halt('页面不存在');
			if (I('code', '' , 'strtolower') != session('verify')) { //将验证码全部转为小写
				$this->error('验证码错误');
			}
			$db = M('user');
			$user = $db->where(array('username' => I('username')))->find();
			// p($user);
			if (!$user || $user['password'] != I('password','','md5')) {
				$this->error('账号或密码错误');
			};

			//更新最后一次登入时间和登入IP
			$data = array(
				'id' => $user['id'],
				'logintime' => time(),
				'loginip' => get_client_ip()
			);
			$db->save($data);

			session('uid',$user['id']);
			session('username',$user['username']);
			session('logintime',date('Y-m-d H:i:s',$user['logintime']));
			session('loginip',$user['loginip']);
			// p($_SESSION);
			//echo __GROUP__;  //  /TPBase/index.php/Admin
			redirect(__GROUP__);
		}

		//验证码
		Public function verify(){
			// import('ORG.Util.Image');
			// import('Class.Image');
			// import('@.Class.Image');
			import('Class.Image',APP_PATH);
			Image::verify();
		}
		
	}
?>