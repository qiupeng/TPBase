<?php 
    //后台函数库，文件名一定要起成function.php，这样才会被自动加载进来.
    
/*
 * 递归然后重组节点信息为多位数组
 * @param [type]  $node [要处理的节 点数组]
 * @param integer $pid  [父级ID]
 * @param [type]        [description]
 */
function node_merge($node,$access=null,$pid = 0){
    //echo 1111;
    $arr = array();
    // p($node);
    foreach ($node as $v){
        if(is_array($access)){
            $v['access'] = in_array($v['id'], $access)?1:0; //有权限的设置成1，没有设置为0
        }
        if ($v['pid'] == $pid){
            $v['child'] = node_merge($node,$access,$v['id']);
            $arr[] = $v;
        }
    }
    return $arr;
}
?>