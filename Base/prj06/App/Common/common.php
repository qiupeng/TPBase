<?php
function p ($array){
    //四个参数的说明：第一个是打印的数组，第二个可以为1或者true，就代表的输出
    //第三个参数：要输出的标签，格式化；第四个参数: 0 代表用print_r 来打印
    /*
     *格式化打印数组
     */
    dump($array,1,'<pre>',0);
}

/**
 * 发布内容表情替换
 */
function replace_phiz($content){
    preg_match_all('/\[.*?\]/is',$content,$arr); // 正则表达式，匹配他有没有表情
    if ($arr[0]) {
        $phiz=F('phiz','','./Data/');
        //p($phiz);
        foreach ($arr[0] as $v){
            foreach ($phiz as $key => $value){
                if ($v=='[' . $value . ']') {
                    $content = str_replace($v,'<img src="'.__ROOT__ . '/Public/Images/phiz/' . $key . '.gif"/>',$content);
                    break;
                }
//                 continue;
            }
        }
    }
    return $content;
}
?>