<?php
// 前台首页控制器
class IndexAction extends Action {
    
    /**
     * 首页视图
     */
    public function index(){
        $this->assign('wish', M('wish')->select())->display();
    }
    
    /**
     * 发布愿望处理
     */
    public function handle(){
       //p(I('post.'));
       //判断是否是AJAX
       //$this->isAjax();
       
        if (!IS_AJAX) halt("页面不存在2");    //或者使用_404
        $data = array(
            'username' => I('username'),
            'content'  => I('content'),
            'time'     => time()    //发布时间取当前时间错
        );
        
        if ($id=M('wish')->data($data)->add()){
            $data['id']=$id;
            $data['content'] = replace_phiz($data['content']);
            $data['time']= date('y-m-d H:i',$data['time']);
            $data['status'] = 1; //代表插入成功
            $this->ajaxReturn($data,'json');
        } else {
            $this->ajaxReturn(array('status' =>0),'json');
        }
    }
}