<?php
//前台配置项
$config = array(
    //'配置项'=>'配置值'
   'LOAD_EXT_FILE'  => 'function',
    'TMPL_PARSE_STRING' =>  array(
        '__PUBLIC__' => __ROOT__ . '/' . APP_NAME . '/Tpl/Public',   //将__PUBLIC__ 映射到一个新的地址
        '__UPLOAD__' => __ROOT__ . '/Uploads'
    )
    
);

return array_merge(include './Conf/config.php', $config);   //路径，是以单入口文件为参考
?>