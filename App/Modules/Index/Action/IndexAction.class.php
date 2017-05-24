<?php
	Class IndexAction extends Action{
		Public function index(){
			if(!$list = S('index_list')){    //读取缓存
				$list = M('cate')->where(array('pid' => 0))->field(array('id', 'name'))->order('sort')->select();
				//p($topCate);
				import('Class.Category', APP_PATH);
				$cate = M('cate')->order('sort')->select();
				$db = M('blog');
				$field = array('id', 'title', 'time');

				foreach ($list as $k =>$v){
					//p($v['id']);
					$cids = Category::getChildsId($cate, $v['id']);
					$cids[] = $v['id'];
					//p($cids);
					$where = array('cid' => array('IN', $cids), 'del' => 0);
					$list[$k]['blog'] = $db->field($field)->where($where)->order('time DESC')->select();
				}

				S('index_list', $list, 10); //使用缓存,第三个参数为缓存的有效时间
			}
			 // $topCate = cache('index_list');
			
			
			//p($topCate);
			$this->topCate = $list;
			$this->display();
		}
	}
?>