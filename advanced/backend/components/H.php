<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of H
 * 公共HTML小助手
 * @author Administrator
 */
class H extends CHtml{
    
    //生成url链接
    static public function url($url, $show_domain=false) {
        
        $url = self::normalizeUrl($url);
        if ($show_domain) {
            if (strpos($url, 'http://' . DOMAIN . '/') === false) {
                $url = 'http://' . DOMAIN . $url;
            }
        }
        return $url;
    }
    
    //组合xml标签
    public static function xmlTag($tag,$content=false, array $htmlOptions=array(), $closeTag=true)
    {
        return parent::tag($tag,$htmlOptions,$content,$closeTag);
    }
    
    //过滤表单提交值
    public static function htmlspecialchars($data) {
        if (is_string($data)) {
            $data = strip_tags($data, "<img><br><a><div><table><th><td><tr><p><b><h><h1><h2>");
            $data = str_replace(array(
                '<script',
                '</script'
                    ), array(
                '<noting',
                '</noting'
                    ), $data);
            // $data=htmlspecialchars($data);
            return $data;
        } elseif (is_array($data)) {
            foreach ($data as $key => $val) {
                $data[$key] = self::htmlspecialchars($val);
            }
            return $data;
        } elseif (is_numeric($data)) {
            return $data;
        } elseif (is_object($data)) {
            $attr = get_object_vars($data);
            foreach ($attr as $key => $val) {
                $data->$key = self::htmlspecialchars($val);
            }
            return $data;
        } else {
            return $data;
        }
    }
}

?>
