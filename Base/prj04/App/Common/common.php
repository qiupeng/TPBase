<?php
function p ($array){
    //四个参数的说明：第一个是打印的数组，第二个可以为1或者true，就代表的输出
    //第三个参数：要输出的标签，格式化；第四个参数: 0 代表用print_r 来打印
    /*
     *格式化打印数组
     */
    dump($array,1,'<pre>',0);
}
?>