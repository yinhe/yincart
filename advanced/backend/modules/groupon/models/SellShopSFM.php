<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SellShopSFM
 * 分店列表搜索表单 
 * @author Jiulong Zhang <kowloon29320@163.com>
 */
class SellShopSFM extends SFM{
    public $biz_id;
    public $name;
    
    public function attributeLabels() {
        return array(
            'biz_id'=>'商家id',
            'name'=>'分店名'
        );
    }
    
    public function getQuery() {
        $query = new Query(Yii::app()->db);
        $query->select('id,biz_id,name,city_id,area_id,is_reservation');
        $query->from('groupon_biz_shop');
        if($this->biz_id){
            $query->andWhere('biz_id=:bid', array(':bid'=>$this->biz_id));
        }
        if($this->name){
            $query->andWhere(array('like','name','%'.$this->name.'%'));
        }
        
        return $query;
    }
    
    public function getFMConfig() {
        return array(
            'method' => 'get',
//            'title' => 'Formbuilder test form',
//            'showErrorSummary' => true,
            'elements' => array(
                'biz_id' => array(
                    'type' => 'text',
//                    'maxlength' => 32,
//                    'hint' => 'This is a hint',
//                    'placeholder' => 'title',
                    'class' => 'span1',
//                    'append' => '<i class="icon-search"></i>',
                ),
                'name' => array(
                    'type' => 'text',
//                    'maxlength' => 32,
//                    'hint' => 'This is a hint',
//                    'placeholder' => 'title',
                    'class' => 'span2',
//                    'append' => '<i class="icon-search"></i>',
                ),
//                'state' => array(
//                    'type' => 'dropdownlist',
//                    'class' => 'input-small',
//                    'prompt' => '请选择',
//                    'items' => ARGroupon::$states,
//                ),
            ),
            'buttons' => array(
                'submit' => array(
                    'type' => 'submit', //@see TbFormButtonElement::$TbButtonTypes
                    'layoutType' => 'primary', //@see TbButton->type
                    'label' => '搜 索',
                ),
            ),
        );
    }
    
    //商家信息
    public static function bizInfo($data){
        $str = '';
        $str .= Yii::app()->db->createCommand()->select('title')->from('groupon_biz')->where('id=:id',array(':id'=>$data['biz_id']))->queryScalar();
        $str .= '[<span style="color:green;">商家ID：'.$data['biz_id'].'</span>]';
        return $str;
    }
    
    //城市信息
    public static function cityInfo($data){
        $str = '';
        if($data['city_id'] == 0){
            $str .= '全国';
        }else{
            $str .= ARArea::getName($data['city_id']);
            $str .= ARArea::getName($data['area_id'], ARArea::GRADE_AREA);
        }
        return $str;
    }
}

?>
