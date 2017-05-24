<?php

	class BlogRelationModel extends RelationModel{
		protected $tableName = 'blog';

		protected $_link = array(
			'attr' => array(
				'mapping_type' => MANY_TO_MANY,
				'mapping_name' => 'attr',
				'foreign_key' => 'bid',
				'relation_foreign_key' => 'aid',
				'relation_table' => 'hd_blog_attr',
			),
			'cate' => array(
				'mapping_type' => BELONGS_TO, //用多的关联一的 ，HAS_ONE(一对一), HAS_MANY(一对多)
				'foreign_key' => 'cid',
				'mapping_fields' => 'name', //只读取一个字段，*代表所有字段
				'as_fields' => 'name:cate', //使用别名cate放在外层。

			)
		);
		public function getBlogs($type = 0){
			$field = array('del');
			$where = array('del' => $type);
			return $this->field($field,true)->where($where)->relation(true)->select();
		}
	}
?>