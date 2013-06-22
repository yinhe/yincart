<?php

//打印并高亮函数
function dump($target,$bool=true){
    static $i = 0;
    if($i==0){
        header('content-type:text/html;charset=utf-8');
    }
    CVarDumper::dump($target, 10, true); 
    $i++;
    if($bool){
       exit; 
    }else{
        echo '<br />';
    }
}

?>
