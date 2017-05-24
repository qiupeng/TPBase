<?php 
	/**
	 * 
	 */
	Class CategoryAction extends CommonAction {

		//(无限极）分类列表视图
		Public function index(){
			// echo 1;
			import('Class.Category',APP_PATH);   //引用我们定义的无限极分类
			$cate = M('cate')->order('sort ASC')->select();
			// $cate =Category::getChilds($cate,4);
			// $cate = Category::getParents($cate,12);
			// $cate =Category::unlimitedForLayer($cate,'cate');
			$this->cate = Category::unlimitedForLevel($cate,'&nbsp;&nbsp;--');
			// p($cate);
			// die();
			// $this->cate = $cate;
			$this->display();
			// $this->assign('cate',$cate)->display();
		}

		// 添加分类视图
		Public function addCate(){
			// $pid = isset($_GET['pid']) ? $_GET['pid'] : 0;
			$this->pid = I('pid',0,'intval');
			$this->display(); 
		}

		//添加分类表单处理
		Public function runAddCate(){
			// p($_POST);
			if (M('cate')->add($_POST)) {
				$this->success('添加成功',U(GROUP_NAME . '/Category/index'));
			} else {
				$this->error('添加失败');
			}
		}

		//排序
		Public function sortCate(){
			// p($_POST);
			$db = M('cate');
			foreach ($_POST as $id =>$sort){
				$db->where(array('id'=>$id))->setField('sort',$sort);   //更新一个字段    
			}
			$this->redirect(GROUP_NAME . '/Category/index');
		}
	}
?>