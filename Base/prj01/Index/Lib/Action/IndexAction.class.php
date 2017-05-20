<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
	    //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        // echo C('USERNAME'); //读取配置项用C()
       
        echo "这是我的前端应用的首页";
        //操作数据库
        $db = M('user');    //实例化模型表
        $result = $db->select();    //查询结果集
        dump($result);  //tp里面的打印函数
        
    }
    public function delete() {
        echo '这里是Index 控制器里面的删除方法...';
    }
    public function add() {
        echo '这里是Index 控制器里面的添加方法...';
    }
}