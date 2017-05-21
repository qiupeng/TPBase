<?php
// 前台控制器首页
class IndexAction extends Action {
    
    /*
     *首页视图
     */
    public function index(){
        //生成URL地址的方法U()函数,一般我们只用前两个参数就可以了。
        //U('[分组/模块/操作]?参数' [,'参数','伪静态后缀','是否跳转','显示域名'])，具体可以参考手册
        //echo U('Index/index',array('aid' => 1, 'uid' => 10), '', 0, true);  //  /TPBase/Base/prj03/index.php/Index/index.html   URL_MODEL=1
                                //  /TPBase/Base/prj03/index.php?m=Index&a=index    URL_MODEL=0
                                //  /TPBase/Base/prj03/Index/index.html     URL_MODEL=2
        
        ///查询数据库里的记录
        //$wish = M('wish')->select();
        //p($wish);
        
        //两种方式分配到模板
        //$this->assign('a', 111);    //分配到模板
        //$this->a = 111;
        
        //$this->assign('a', 121)->display();   //链式使用
        
        ///$this->display();   //不传参数的时候，默认为index.html。如果部位index的时候，需要你自己传入
        
        $this->assign('wish', M('wish')->select())->display();
    }
    
    /*
     *表单处理
     */
    public function handle(){
        
       
        //echo THINK_VERSION; //ThinkPHP版本
        
        // $username = $this->_post('username');
        // echo $username;
        
        //新方法，获取表单请求的参数方法I(),他会自动判断你是post还是get，所以这个两种方式都可以用它获取
        //$username = I('username');  //默认不会用htmlspecialchars()过滤，这样的话，会导致脚本被注入执行，例如我前台写入了<script>alert(1111)</script>
        // $username = I('username', '', 'htmlspecialchars');  
        //echo $username;
        
        //htmlspecialchars()
        //p($_POST);
        if (!IS_POST) halt('页面不存在');    //判断是否通过post提交的方式进入的，或者使用$this->isPost()
        
       // _404('页面不存在', U('Index/index'));    //第二个参数为跳转地址，U方法中如果为当前控制器可以不用写
       
        
        $data = array(
            'username' => I('username','','htmlspecialchars'),
            'content' => I('content','','htmlspecialchars'),
            'time' => time()
        );
        
        //M方法:参数为去掉前缀的表名
        //M('wish') // 就相当于 new Model('wish') //实例化wish模型
        
        ////插入数据库
        if (M('wish')->data($data)->add()) {    //向表里插入数据，插入成功会返回插入成功的表id  data($data):创建数据对象
            $this->success('发布成功','index'); //在本控制器的话可以省略写Index/ 是跳转地址
        } else {
            $this->error('发布失败，请重试...'); //后退到首页
        }
        
        //删除数据库里的记录
        //$result = M('wish')->where('id > 0')->delete();  //tp中规定：当执行delete的时候，必须要加上where条件。这里是删除id>0的记录
        //$result = M('wish')->where(array('id' => array('gt', 0)))->delete();    //gt 是大于 ，lt 是小于， eq为等于。返回受影响的条数
        //var_dump($result);
        
        
        
        
    }
}