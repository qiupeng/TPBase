<?php
	class MsgManageAction extends CommonAction{
		Public function index(){
			import('ORG.Util.Page'); //导入分页类
			
			$count = M('wish')->count(); //统计有多少条==select count(*) from hd_wish;
			$page = new Page($count,20); //参数，总共多少条，每页显示多少条
			// echo $page->firstRow; //0
			// echo $page->listRows; //10
			$limit = $page->firstRow.','.$page->listRows; //0,10
			$wish = M('wish')->order('time DESC')->limit($limit)->select();  //按照 time 倒叙
			// p($wish)
			$this->wish = $wish; //分配到模板
			$this->page = $page->show();//分配到模板，显示分页,
			$this->display();
		}
		Public function delete(){
			$id = I('id','','intval');
			// echo $id;
			// M('wish')->where(array('id'=>$id))->delete();
			//id为主键的话可以这么简写成如下：
			if(M('wish')->delete($id)) {
				$this->success('删除成功',U('Admin/MsgManage/index'));
			} else {
				$this->error('删除失败');
			}
		}
	}
?>