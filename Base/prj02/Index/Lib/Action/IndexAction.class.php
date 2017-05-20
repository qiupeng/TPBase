<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        //dump($_SERVER);
        //var_dump($_SERVER);
        
        //load('@.function'); //临时加载,只对当前方法内有效
        //p($_SERVER);
        //echo __ROOT__;  //  /TPBase/Base/prj02
        
        //var_dump(defined('__ROOT__'));    //检查常量是否存在,
        $this->display();   //显示模板
    }
    
    public function show () {
        p($_SERVER);
    }
}