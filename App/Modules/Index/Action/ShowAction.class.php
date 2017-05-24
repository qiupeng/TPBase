<?php
	Class ShowAction extends Action{
		Public function index(){
			$id = (int)$_GET['id'];
			M('blog')->where(array('id' => $id))->setInc('click');
			$field = array('id','title', 'time', 'click', 'content', 'cid');
			$this->blog = M('blog')->field($field)->find($id);
			
			$cid = $this->blog['cid'];
			import('Class.Category', APP_PATH);
			$cate = M('cate')->order('sort')->select();
			$this->parent = Category::getParents($cate, $cid);
			//p($parent);
			$this->display();
		}

		Public function clickNum(){
			$id = (int) $_GET['id'];
			$where = array('id' => $id);
			$click = M('blog')->where($where)->getField('click');
			M('blog')->where($where)->setInc('click');   //制定哪个字段加1 setInc('click',2) 这个是加2 setDec 是减1
			echo 'document.write('. $click .')';
		}
	}
?> 