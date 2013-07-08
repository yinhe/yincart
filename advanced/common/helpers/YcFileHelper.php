<?php

/**
 * 文件处理类
 * 
 */
class YcFileHelper extends CFileHelper
{
    public static function getSavePath($file, $cate = NULL)
    {
        $cate = is_null($cate) ? '' : $cate . '/';
        //$dir = str_pad(abs(crc32($file)) % 102400, 4, '0', STR_PAD_LEFT);
        $dir = date('Ymd');
        self::mkdir($cate . $dir);
        return $cate . $dir . '/' . $file;
    }
    
    /**
     * 创建目录（如果该目录的上级目录不存在，会先创建上级目录）
     * 依赖于 Yii::getpathofalias("root") 常量，且只能创建 Yii::getpathofalias("root") 目录下的目录
     * 目录分隔符必须是 / 不能是 \
     * 
     * @param type $absolutePath 绝对路径
     * @param type $mode 目录权限
     */
    public static function mkdir($absolutePath, $mode = 0777)
    {
        if (is_dir($absolutePath))
        {
            return true;
        }
        $rootPath = Yii::getPathOfAlias("root");
        $relativePath = str_replace($rootPath, '', $absolutePath);
        $eachPath = explode('/', $relativePath);
        $curPath = $rootPath; // 当前循环处理的路径
        foreach ($eachPath as $path)
        {
            if ($path)
            {
                $curPath = $curPath . '/' . $path;
                if (!is_dir($curPath))
                {
                    if (@mkdir($curPath, $mode))
                    {
                        fclose(fopen($curPath . '/index.htm', 'w'));
                    }
                    else
                    {
                        return false;
                    }
                }
            }
        }
        return true;
    }
    
    /**
     * 通过文件名获取文件的后缀
     * 
     * @param type $fileName 
     */
    public static function getFilenameExtension($fileName)
    {
        $fileNameArr = explode('.', $fileName);
        return $fileNameArr[count($fileNameArr) - 1];
    }
    
    /**
     * 删除文件
     * 
     * @param string $file 
     */
    public function deleteFile($file)
    {
        $file = Yii::getPathOfAlias("root") . '/' . $file;
        is_file($file) && @unlink($file);
    }
    
}

