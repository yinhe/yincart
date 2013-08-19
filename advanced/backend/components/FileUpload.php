<?php

/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/

/**
* Description of FileUpload
* 文件上传处理类
* @author Administrator
*/
class FileUpload {
    public $instance; //文件上传实例
    public $type;//允许的类型
    public $size;//允许的大小（KB）
    public $target; //文件上传的目标路径
    private $_errors = array();
    public $filename;

    public function __construct($name,$target,$type='*',$size='2048') {
        if(is_array($name)){
            $this->instance = CUploadedFile::getInstance($name[0], $name[1]);
        }else{
            $this->instance = CUploadedFile::getInstanceByName($name);
        }
        $this->type = $type;
        $this->target = $target;
        $this->setSize($size);
    }

    //判断文件实例是否存在
    public function isNull() {
//        dump($this->instance);
        if($this->instance == null){
            return true;
        }
        return false;
    }

    //设置允许的文件上传大小，并转为字节单位
    protected function setSize($size){
        $this->size = $size*1204;
    }

        //主函数，验证并保存图片
    public function save(){
        //检查类型
        if(!$this->checkType()){
            return false;
        }
        //检查大小
        if(!$this->checkSize()){
            return false;
        }
        //生成新文件的路径
        $file = $this->getFileName();
        //保存
        if($this->instance->saveAs($file)){
            $this->filename = $file;
            return $file;
        }else{
            $this->addError('upload', '文件上传失败');
            return false;
        }
    }

    //检查文件类型
    protected function checkType(){
        $ext = $this->instance->extensionName;
        if($this->type == '*'){
            return true;
        }elseif(in_array($ext, $this->type)){
            return true;
        }else{
            $this->addError('type', '文件类型不支持');
            return false;
        }
    }

    protected function checkSize(){
        $size = $this->instance->size;
        if($this->size  < $size){
            //如果上传的文件大于允许的文件大小
            $this->addError('size', '上传的文件大小超过了'.$this->size.'KB');
            return false;
        }else{
            return true;
        }
    }

    //获取新的文件名
    protected function getFileName(){
        //生成随机名
        $name = $this->randName();
        //生成目录
        $dir = $this->makeDir();
        //生成新的文件名路径
        $filename = $dir.$name.'.'.$this->instance->extensionName;
        return $filename;
    }

    //生成随机名
    protected function randName(){
        return time().rand(10000, 99999);
    }

    //设置目录
    protected function makeDir(){
        $dir = $this->target.'/'.date('Y').'/'.date('m').'/';
        if(!is_dir($dir)){
            @mkdir($dir, '0777', true);
        }
        return $dir;
    }

    //获取某一个错误信息
    public function getError($name=false){
        if(!$name){
            return $this->getErrors();
        }elseif(isset ($this->_errors[$name])){
            return $this->_errors[$name];
        }else{
            return null;
        }
    }

    //获取所有的错误信息
    public function getErrors(){
        return $this->_errors;
    }

    //添加错误信息
    private function addError($name,$msg){
        $this->_errors[$name] = $msg;
    }

}

?>
