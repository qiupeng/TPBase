<?php
	class BlogAction extends CommonAction{
		//博文列表
		public function index(){
			// echo 1;
			// $field = array('id','title','content','time','click');
			$field = array('del');
			$where = array('del' => 0);
			//relation(true)：关联所有的表，如果我只想关联一个表用relation('cate')
			$this->blog =D('BlogRelation')->field($field,true)->where($where)->relation(true)->select();
			// p($blog);die();
			$this->display();
		}

		//删除或者还原->到回收站
		public function toTrach(){
			$type = (int) $_GET['type'];
			$msg = $type ? '删除' : '还原';
			// $id = (int) $_GET['id'];
			// echo $id;
			$update =array(
				'id' => (int) $_GET['id'],
				'del' => $type
			);
			//M('blog')->where(array('id' =>(int) $_GET['id']))->save($update);
			//M('blog')->where(array('id' =>(int) $_GET['id']))->setField('del',1);
			if(M('blog')->save($update)){
				$this->success($msg . '成功',U(GROUP_NAME . '/Blog/index'));
			} else {
				$this->error($msg . '失败');
			};
		}

		//回收站
		public function trach(){
			$this->blog = D('BlogRelation')->getBlogs(1);
			// p($blog);
			$this->display('index');
			
		}

		public function delete(){
			$id = (int) $_GET['id'];
			// echo $id;
			if (M('blog')->delete($id)) {
				M('blog_attr')->where(array('bid' =>$id))->delete();
				$this->success('删除成功',U(GROUP_NAME . '/Blog/trach'));
			} else {
				$this->error('删除失败');
			}
		}

		//添加博文
		public function blog(){
			//博文所属分类
			import('Class.Category',APP_PATH);
			$cate = M('cate')->order('sort')->select();
			$this->cate = Category::unlimitedForLevel($cate);
			// p($cate);

			//博文属性
			$this->attr = M('attr')->select();
			// p($attr);
			$this->display();
		}

		//添加博文表单处理
		public function addBlog(){
			// p($_POST);
			// D('BlogRelation');
			$data = array(
				'title' => $_POST['title'],
				'content' => $_POST['content'],
				'summary' => $_POST['summary'],
				'time' => time(),
				'click' => (int) $_POST['click'],
				'cid' => (int) $_POST['cid'],
			);
			if ($bid = M('blog')->add($data)) {
				if (isset($_POST['aid'])) {
					$sql = 'INSERT INTO ' . C('DB_PREFIX') . 'blog_attr (bid,aid) VALUES';
					foreach ($_POST['aid'] as $v){
						$sql .= '('.$bid.','.$v.'),';
					}
					echo $sql;
					$sql= rtrim($sql,','); //去掉最后一个逗号 INSERT INTO hd_blog_attr (bid,aid) VALUES(9,1),(9,2),
					M('blog_attr')->query($sql);
				}
				// echo $sql;
				$this->success('添加成功',U(GROUP_NAME . '/Blog/index'));
			} else {
				$this->error('添加失败');
			}
			// if (isset($_POST['aid'])) {
			// 	foreach ($_POST['aid'] as $v){
			// 		$data['attr'][]=$v;
			// 	}
			// }
			// p($data);
			// D('BlogRelation')->relation(true)->add($data);
			// $this->display();
		}

		//编辑器图片上传处理
		public function upload(){
			// echo 111;
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload->autoSub = true; //改变一两项的方法
			$upload->subType = 'date';   //子目录创建方式，配合dateFormat的使用
			$upload->dateFormat = 'Ym';
			// $info = $upload->upload('./Uploads/');
			// p($info);
			if ($upload->upload('./Uploads/')) { //参数为上传文件的保存路径，上传成功返回1
				$info = $upload->getUploadFileInfo();
				// import('ORG.Util.Image');
				// Image::water('./Uploads/' . $info[0]['savename'], './Data/logo.png');
				// p($info);
				import('Class.Image',APP_PATH);
				Image::water('./Uploads/' . $info[0]['savename']);  //加水印
				echo json_encode(array( //上传成功之后向浏览器返回的json
					'url' => $info[0]['savename'], //保存后的路径
					'title' => htmlspecialchars($_POST['pictitle'], ENT_QUOTES),
					'original' => $info[0]['name'],    //原文件名
					'state' => 'SUCCESS'
					));
			} else {
				echo json_encode(array(
					'state' => $upload->getErrorMsg()
					));
			}
			/*$config =   array(
	        'maxSize'           =>  -1,    // 上传文件的最大值
	        'supportMulti'      =>  true,    // 是否支持多文件上传
	        'allowExts'         =>  array(),    // 允许上传的文件后缀 留空不作后缀检查
	        'allowTypes'        =>  array(),    // 允许上传的文件类型 留空不做检查
	        'thumb'             =>  false,    // 使用对上传图片进行缩略图处理
	        'imageClassPath'    =>  'ORG.Util.Image',    // 图库类包路径
	        'thumbMaxWidth'     =>  '',// 缩略图最大宽度
	        'thumbMaxHeight'    =>  '',// 缩略图最大高度
	        'thumbPrefix'       =>  'thumb_',// 缩略图前缀
	        'thumbSuffix'       =>  '',
	        'thumbPath'         =>  '',// 缩略图保存路径
	        'thumbFile'         =>  '',// 缩略图文件名
	        'thumbExt'          =>  '',// 缩略图扩展名        
	        'thumbRemoveOrigin' =>  false,// 是否移除原图
	        'thumbType'         =>  1, // 缩略图生成方式 1 按设置大小截取 0 按原图等比例缩略
	        'zipImages'         =>  false,// 压缩图片文件上传
	        'autoSub'           =>  false,// 启用子目录保存文件
	        'subType'           =>  'hash',// 子目录创建方式 可以使用hash date custom
	        'subDir'            =>  '', // 子目录名称 subType为custom方式后有效
	        'dateFormat'        =>  'Ymd',
	        'hashLevel'         =>  1, // hash的目录层次
	        'savePath'          =>  '',// 上传文件保存路径
	        'autoCheck'         =>  true, // 是否自动检查附件
	        'uploadReplace'     =>  false,// 存在同名是否覆盖
	        'saveRule'          =>  'uniqid',// 上传文件命名规则
	        'hashType'          =>  'md5_file',// 上传文件Hash规则函数名
	        );
			$upload = new UploadFile($config);*/
			

			/*		
			$title = htmlspecialchars($_POST['pictitle'], ENT_QUOTES);
			* {
		     *   'url'      :'a.jpg',   //保存后的文件路径
		     *   'title'    :'hello',   //文件描述，对图片来说在前端会添加到title属性上
		     *   'original' :'b.jpg',   //原始文件名
		     *   'state'    :'SUCCESS'  //上传状态，成功时返回SUCCESS,其他任何值将原样返回至图片上传框中
		     * }*/
		}
	}
?>