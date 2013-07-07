<?php

/**
 * YcImageHelper
 *
 * 图片处理类 
 * 
 */
class YcImageHelper
{
    /**
     * 根据域名配置，返回不同域名的图片绝对地址 
     *
     * @param mixed $path 
     * @static
     * @access public
     * @return string
     */
    public static function getImageUrl($path)
    {
        static $index = 0;
        $rs = $path;
        $domainsImg = Yii::app()->params['domainsImg'];
        if (is_array($domainsImg) && count($domainsImg))
        {
            $rs = $domainsImg[$index] . '/' . $path;

            count($domainsImg) == ++$index && $index = 0;;
        }
        return $rs;
    }
}
