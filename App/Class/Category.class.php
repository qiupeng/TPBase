<?php
	//无限极分类
	Class Category{
		// 1、组合一维数组
		Static Public function unlimitedForLevel($cate, $html = '--', $pid = 0, $level = 0){
			// echo 1;
			$arr = array();
			foreach ($cate as $v) {
				if ($v['pid'] == $pid) {
					$v['level'] =$level+1;
					$v['html'] = str_repeat($html, $level);
					$arr[] = $v;
					$arr = array_merge($arr,self::unlimitedForLevel($cate,$html,$v['id'],$level+1));
				}
			}
			return $arr;
		}

		// 2、组合多维数组
		Static Public function unlimitedForLayer($cate,$name = 'child', $pid = 0){
			$arr = array();
			foreach($cate as $v){
				if($v['pid'] == $pid){
					$v[$name] = self::unlimitedForLayer($cate, $name, $v['id']);
					$arr[] = $v;
					
				}
			}
			return $arr;
		}

		// 3、传递一个子分类的ID返回所有的父级分类
		Static Public function getParents ($cate, $id){
			$arr = array();
			foreach($cate as $v){
				if($v['id'] == $id){
					
					$arr = array_merge($arr, self::getParents($cate, $v['pid']));
					$arr[] = $v;
				}
			}
			return $arr;
		}

		// 4、传递一个父级分类ID返回所有子分类的ID
		Static Public function getChildsId($cate, $pid){
			$arr = array();
			foreach($cate as $v){
				if($v['pid'] == $pid){
					$arr[] = $v['id'];
					$arr = array_merge($arr, self::getChildsId($cate, $v['id']));
 				}
			}
			return $arr;
		}
		// 5、传递一个父级分类ID返回所有子分类
		Static Public function getChilds($cate, $pid){
			$arr = array();
			foreach($cate as $v){
				if($v['pid'] == $pid){
					$arr[] = $v;
					$arr = array_merge($arr, self::getChildsId($cate, $v['id']));
 				}
			}
			return $arr;
		}

	}
?>