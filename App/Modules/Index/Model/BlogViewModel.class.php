<?php
	Class BlogViewModel extends ViewModel{
		Protected $viewFields = array(
		    //blog表要跟cate表关联，type：left为左关联，就是使用left join
			'blog' => array('id', 'title', 'time', 'click', 'summary', '_type' =>'LEFT'),
			'cate' => array('name', '_on' => 'blog.cid = cate.id'), //关联条件

		);

		Public function getAll($where, $limit){
			return $this->where($where)->limit($limit)->order('time DESC')->select();
		}
	}
?>