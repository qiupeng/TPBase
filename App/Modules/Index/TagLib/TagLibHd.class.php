<?php
	import('TagLib'); // 引入这个类,新版本可以去掉
	/**
	 * 自定义标签库
	 */
	Class TagLibHd extends TagLib{
		//自定义表标签的属性
		//attr：定义属性。close：闭合标签(默认为:1) 独立标签(0)
		Protected $tags = array(
			'nav' => array('attr' => 'order', 'close' => 1),
		    'hot' =>  array('attr' => 'limit', 'close' => 1)
		);

		//注意这里必须加上'_ ' ,$content: 是标签里的内容
		Public function _nav ($attr, $content){
			$attr = $this->parseXmlAttr($attr);  //将字符串 变成数组
			/// <<< ：是定界符 ，$会被当初一个字符串，所以要转意一下
			$str = <<<str
<?php
					\$_nav_cate = M('cate')->order("{$attr['order']}")->select();
					import('Class.Category', APP_PATH);
					\$_nav_cate = Category::unlimitedForLayer(\$_nav_cate);
					foreach(\$_nav_cate as \$_nav_cate_v):
						extract(\$_nav_cate_v);
					\$url = U('/c_' . \$id);
?>
str;
			$str .= $content;
			$str .= '<?php endforeach;?>';
			return $str;
		}
		
		public function _hot ($attr, $content) {
		    $attr = $this->parseXmlAttr($attr);  
		    $limit = $attr['limit'];
		    $str = '<?php ';
		    $str .= '$field = array("id", "title", "click");';
		    $str .= '$_hot_blog = M("blog")->field($field)->limit(' . $limit . ')->order("click desc")->select();';
		    $str .= 'foreach ($_hot_blog as $_hot_value):';
		    $str .= 'extract($_hot_value);';
		    $str .= '$url = U("/s_" . $id);?>';
		    $str .= $content;
		    $str .= '<?php endforeach ?>';
		    
		    return $str;
		}
	}
?>