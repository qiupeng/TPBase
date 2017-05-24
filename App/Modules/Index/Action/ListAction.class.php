<?php
	Class ListAction extends Action{
		Public function index(){
			import('ORG.Util.Page');
			import('Class.Category', APP_PATH);
			$id = (int)$_GET['id'];
			$cate = M('cate')->order('sort')->select();
			
			$cids = Category::getChildsId($cate, $id);
			$cids[] = $id;
			
			$where = array('cid' => array('IN', $cids), 'del' => 0);
			$count = M('blog')->where($where)->count();
			//echo $count;
			$page = new Page($count, 10);
			$limit = $page->firstRow . ',' . $page->listRows;
			//p($limit);
			//$this->blog = D('BlogView')->where(array('cid' => array('IN', $cids), 'del' => 0))->limit($limit)->select();
			$this->blog = D('BlogView')->getAll($where, $limit);
			$this->page = $page->show();
			$this->display();
			
		}
	}
?>