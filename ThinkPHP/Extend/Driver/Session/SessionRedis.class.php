<?php 


defined('THINK_PATH') or exit();

class SessionRedis{

    // 用于保存REDIS的连接对象
    Private $redis;
    
    // SESSION有效时间
    Private $expire;
    
    /**
     * 打开Session 
     */
    public function open($savePath, $sessName) { 
        //$this->expire = C('SESSION_EXPIRE')? C('SESSION_EXPIRE'):ini_get('session.gc_maxlifetime'); //session的有效时间
        //$this->redis = new Redis(); //new Redis;
        //return $this->redis->connect(C('REDIS_HOST'),C('REDIS_PORT')); //连接Redis
        
        $this->expire = C('SESSION_EXPIRE') ? C('SESSION_EXPIRE') : ini_get('session.gc_maxlifetime');
        $this->redis = new Redis();
        return $this->redis->connect(C('REDIS_HOST'), C('REDIS_PORT'));
    } 

    /**
     * 关闭Session 
     * @access public 
     */
   public function close() {
       return $this->redis->close(); 
   } 

    /**
     * 读取Session 
     * @access public 
     * @param string $sessID 
     */
   public function read($id) { 
       $id = C('SESSION_PREFIX') . $id;
       $data = $this->redis->get($id);
       return $data ? $data : ''; //返回里面的数据
   } 

    /**
     * 写入Session 
     * @access public 
     * @param string $sessID 
     * @param String $sessData  
     */
   public function write($id,$data) { 
       // $redis = new Redis();
       // $redis->connect('127.0.0.1',6379);
       // $redis->set(‘test’,'hello world!');
       // echo $redis->get('test');
       $id = C('SESSION_PREFIX') . $id;
       /* echo $id;
        echo '<br/>';
        echo $data; */
       // $data = addslashes($data); //不写入数据库的不需要转义
       return $this->redis->set($id, $data, $this->expire); //写入
   } 

    /**
     * 删除Session 
     * @access public 
     * @param string $sessID 
     */
   public function destroy($id) { 
       $id = C('SESSION_PREFIX') . $id;
       return $this->redis->delete($id);
   } 

    /**
     * Session 垃圾回收
     * @access public 
     * @param string $sessMaxLifeTime 
     */
   public function gc($sessMaxLifeTime) { 
       return  true; 
   } 

    /**
     * 打开Session 
     * @access public 
     */
    public function execute() {
        session_set_save_handler(array(&$this,"open"), 
                         array(&$this,"close"), 
                         array(&$this,"read"), 
                         array(&$this,"write"), 
                         array(&$this,"destroy"), 
                         array(&$this,"gc")); 
    }
}
