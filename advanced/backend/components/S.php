<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of S
 * 字符串处理类
 * @author Administrator
 */
class S {
    /**
     * 将用\n换行分开的字串 去掉每行收尾空格 去掉空格行
     * for example:
     * $str  = '★团购有效期至2013-10-31（过期无效）
                                                            //这里是空行
                0                                           //以0开头的行
                  fdfgdsfgsdfg                              //这行前面是空格
                ★预约电话 010—57111077 QQ: 2274127158 2642973057 1764845026 2271627063'
     * use like this : S::trimBlank($str)
     * result:
     * $str = ★团购有效期至2013-10-31（过期无效）
              0
              fdfgdsfgsdfg
              ★预约电话 010—57111077 QQ: 2274127158 2642973057 1764845026 2271627063 · 
     * @param type $str
     * @param type $add 默认在每行抬头添加一个点
     * @return string
     */
    public static function trimBlank($str,$add='•'){
        $arr = explode("\n", $str);
        foreach($arr as $a){
            $a = trim(trim($a),'　');
            if($a != ''){
                $new_str .= $add.' '.$a."\n";
            }
        }
        return $new_str;
    }
    
    /**
     * 将带有html标签的富文本内容，去掉标签，去掉空格
     * @param string $str
     * @return string
     */
    public static function stripTags($str){
        $new_str = strip_tags($str);
        $new_str = self::trimBlank($new_str);
        return $new_str;
    }
}

?>
