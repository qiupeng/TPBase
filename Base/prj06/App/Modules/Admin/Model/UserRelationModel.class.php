<?php
	// echo "I love you";
	/**
	* 用户与角色关联模型
	*/
	class UserRelationModel extends RelationModel
	{
		//定义主表名称
		Protected $tableName = 'user';

		//定义关联关系
		Protected $_link = array(
			'role' => array( //role为要关联的表的名称
				'mapping_type' => MANY_TO_MANY, //多对多关系， HAS_ONE HAS_MANY
				'foreign_key'=>'user_id',//外键，主表在中间表中的字段
				'relation_key'=>'role_id',//副表在中间表中的字段名称
				'relation_table'=>'hd_role_user',//指定中间表名称，默认为：hd_user_role
				'mapping_fields'=>'id,name,remark'  //只读取副表中的指定字段
			)
		);
	}
?>