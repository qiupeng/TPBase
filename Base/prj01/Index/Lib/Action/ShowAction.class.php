<?php
    // 在页面中输入地址：http://localhost:8888/TPBase/Base/prj01/index.php?m=Show&a=abc，就可以访问 到这个方法了
    
    class ShowAction extends Action {
        public function abc () {
            echo 'this is show action';
        }
        public function delete() {
            echo '这里是Show 控制器里面的删除方法...';
        }
        public function add() {
            echo '这里是Show 控制器里面的添加方法...';
        }
    }

?>