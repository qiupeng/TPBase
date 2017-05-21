<?php 
	/**
	 * 后台登入控制器
	 */
    // 注意LoginAction不要写出IndexAction
	Class LoginAction extends Action {
		/**
		 * 登入视图
		 */
		Public function index(){
		    //var_dump(C('SESSION_AUTO_START'));    //是否自动开启session，默认是自动开启的
		    //echo session_id();
		    
		   //$_SESSION['username'] = 'admin';
		    
		   //echo $_SESSION['username'];
		    
		    //session_destroy();
		    //print_r(get_extension_funcs ('redis'));
		    
		    
		    //die();
 			$this->display();
		}
		Public function verify(){
			import('ORG.Util.Image');    //引入扩展包中的Imgae类
			Image::buildImageVerify(1,1,'png');  //验证码位数，验证码类型，图标类型
		}
		
		Public function login(){
		    if (!IS_POST) halt('页面不存在');
		    // echo $_SESSION['verify'];
		    // echo "<br/>";
		    // echo md5($_POST['code']);
		    // P($_POST);
		    if (I('code','','md5')!= session('verify')){
		        $this->error('验证码错误');
		    }
		    $username = I('username');
		    $pwd = I('password','','md5');
		    // $pwd = I('password');
		    $user = M('user')->where(array('username' =>$username))->find();  //如果查询不到，返回NULL
		    if (!$user || $user['password']!=$pwd){
		        $this->error('帐号或密码错误');
		    }
		    if ($user['lock']) $this->error('用户被锁定');
		    $data = array(
		        'id' => $user['id'], //自动把他作为where条件
		        'logintime' => time(),
		        'loginip' => get_client_ip(), //TP中的函数
		    );
		    M('user')->save($data);   //更新上一次的登入时间和登入ip
		    
		    //存储到session中
		    session('uid',$user['id']);
		    session('username',$user['username']);
		    session('logintime',date('Y-m-d H:i:s',$user['logintime']));
		    session('loginip',$user['loginip']);
		    
		    //跳转
		    $this->redirect('Admin/Index/index');
		    
		}
		
	}
?>