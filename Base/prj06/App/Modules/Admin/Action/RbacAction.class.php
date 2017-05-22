<?php
	class RbacAction extends CommonAction{
		//用户列表
		Public function index(){
			// field(array('id','usernmae','logintime','loginip','lock'))
		    //只关联一个表的话写成：relation(true)就可以了。多个表的话，需要指定
		    //除了password不要之外全都要 field('password',true)
			$this->user = D('UserRelation')->field('password',true)->relation(true)->select();
			// p($result);
			// die();
			$this->display();
		}	
		//角色列表
		Public function role(){
			$this->role = M('role')->select();
			$this->display();
		}
		
		//节点列表
		Public function node(){
			// $this->node =M('node')->order('sort')->select();
			// $this->display();
			//$node = M('node')->order('sort')->select();
			//p($node);
			$field=array('id','name','title','pid'); //表示只读取这个四个字段
			$node = M('node')->field($field)->order('sort')->select();
			$this->node = node_merge($node);
			// p($node);
			// die();
			// p($this->node);
			$this->display(); 
		}
		//添加用户
		Public function addUser(){
			$this->role = M('role')->select();

			$this->display();
		}

		//添加用户表单处理
		Public function addUserHandle(){
			// p($_POST);
			$user = array(
				'username' => I('username'),
				'password' => I('password','','md5'),
				'logintime' =>  time(),
				'loginip' => get_client_ip()
			);

			//所属角色
			$role =array();
			if ($uid = M('user')->add($user)) {
				foreach ($_POST['role_id'] as $v) {
					$role[] = array(
						'role_id' =>$v,
						'user_id' =>$uid
					);
				}

				//添加用户角色
				M('role_user')->addAll($role);
				$this->success('添加成功',U('Admin/Rbac/index'));
			} else{
				$this->error('添加失败');
			}
		}

		//添加角色
		Public function addRole(){
			$this->display();
		}
		//添加角色表单处理
		Public function addRoleHandle(){
			// p($_POST);
			if (M('role')->add($_POST)){
				$this->success('添加成功',U('Admin/Rbac/role'));
			} else{
				$this->error('添加失败');
			}
		}
		
		//添加节点
		Public function addNode(){
			// p($_GET);
			$this->pid =I('pid',0,'intval'); //默认值为0，有的时候取值，否则取0
			$this->level = I('level',1,'intval');
			switch ($this->level) {
				case 1:
					$this->type = '应用';
					break;
				case 2:
					$this->type = '控制器';
					break;
				case 3:
					$this->type = '动作方法';
					break;
			}
			$this->display();
		}
		//添加节点表单处理
		Public function addNodeHandle(){
			if (M('node')->add($_POST)){
				$this->success('添加成功',U('Admin/Rbac/node'));
			} else{
				$this->error('添加失败');
			}
		}

		//配置权限
		Public function access(){
			$rid = I('rid',0,'intval');
			// echo $rid;
			$field = array('id','name','title','pid');
			$node = M('node')->order('sort')->field($field)->select();

			//原有权限
			// $access = M('access')->where(array('role_id'=>$rid))->select();
			// p($access);die();
			$access = M('access')->where(array('role_id'=>$rid))->getField('node_id',true);  //getField,第二个参数为true表示组成一维数组
			// p($access);die();
			// p($node);
			// p($access);
			// die();
			$this->node = node_merge($node,$access);
			// p($node);die();
			$this->rid = $rid;
			
			$this->display();

		}
		//修改权限
		Public function setAccess(){
			// p($_POST);
			$rid = I('rid',0,'intval');
			$db=M('access');

			//清空原权限
			$db->where(array('role_id' => $rid))->delete();

			//组全新权限
			$data = array();
			foreach ($_POST['access'] as $v){    //access:  节点id_LevelId
				$tmp = explode('_', $v);
				// p($tmp);
				$data[]= array(
					'role_id' => $rid,
					'node_id' => $tmp[0],
					'level' => $tmp[1]
				);
			}
			// p($data);
			// $result = $db->addAll($data);
			// p($result);

			//插入新权限
			if ($db->addAll($data)) {    //返回受影响的条数
				$this->success('修改成功',U('Admin/Rbac/role'));
			}else{
				$this->error('修改失败');
			}
		}
	}
?>