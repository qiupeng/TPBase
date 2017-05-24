<?php
	Class UrlWidget extends Widget{
		Public function render ($data){
			$field = array('id', 'name', 'url');
			$data['url'] = M('url')->field($field)->limit(5)->select();
			return $this->renderFile('', $data);
		}
	}
?>