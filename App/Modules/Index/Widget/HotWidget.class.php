<?php
	Class HotWidget extends Widget{
		//他会自动运行render这个方法
		Public function render ($data){
			// echo "111";
			//热门博文
			$field = array('id', 'title', 'click');
			$data['blog'] = M('blog')->field($field)->order('click DESC')->limit(5)->select();
			return $this->renderFile('', $data); //第一个参数为空，默认为调的是Hot.html
		}
	}
?>