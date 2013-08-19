<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SFM
 * 搜索表单模型
 * @author Administrator
 */
class SFM extends CFormModel{
    
    public function __construct($scenario = '') {
            parent::__construct($scenario);
            $attrs = $this->getAttributes();
            $attrkeys = array_keys($attrs);
            foreach ($attrs as $key => $value) {
                    $_p_data = Yii::app()->request->getParam(get_class($this));
                    if (isset($_p_data[$key])) {
                            $this->$key = $this->_filterWord($_p_data[$key]);
                    } elseif (Yii::app()->request->getParam($key) != null) {
                            $this->$key = $this->_filterWord(Yii::app()->request->getParam($key));
                    } elseif (isset($_FILES[$key])) {
                            $this->$key = $_FILES[$key];
                    }
            }
    }
    
    //过滤表单值 
    public function _filterWord($data, $htmlspecialchars = true) {
            if ($htmlspecialchars) {
                    $data = H::htmlspecialchars($data);
            }
            return $data;
    }
    
    //获取query对象
    public function getQuery(){
        
    }
}

?>
