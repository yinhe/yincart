<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SellBizSFM
 * 销售--商家搜索表单
 * @author Administrator
 */
class SellBizSFM extends SFM{
    
    public $id;
    public $title;
    public $status;//审核状态
    
    public function attributeLabels() {
        return array(
            'id'=>'商家ID',
            'title'=>'商家店名',
            'status'=>'审核状态',
        );
    }
    
    public function getQuery() {
        $query = new Query(Yii::app()->db);
        $query->from('groupon_biz');
        $query->andWhere('display='.ARBiz::DISPLAY);
        if($this->id){
            $query->andWhere('id=:id',array(':id'=>trim($this->id)));
        }
        if($this->title){
            $query->andWhere(array('like','title','%'.$this->title.'%'));
        }
        if($this->status){
            $query->andWhere('examine_status=:status', array(':status'=>$this->status));
        }
        
        $query->order('id desc');
        return $query;
    }
    
    public function getFMConfig(){
        return array(
            'method'=>'get',
//            'title' => 'Formbuilder test form',
//            'showErrorSummary' => true,
            'elements' => array(
                'id' => array(
                    'type' => 'text',
//                    'maxlength' => 32,
//                    'hint' => 'This is a hint',
//                    'placeholder' => 'title',
                    'class' => 'span1',
//                    'append' => '<i class="icon-search"></i>',
                ),
                'title' => array(
                    'type' => 'text',
//                    'maxlength' => 32,
//                    'hint' => 'This is a hint',
//                    'placeholder' => 'title',
                    'class' => 'span2',
//                    'append' => '<i class="icon-search"></i>',
                ),
                'status'=>array(
                    'type'=>'dropdownlist',
                    'class'=>'input-small',
                    'prompt'=>'请选择',
                    'items'=>  ARBiz::$status,
                ),
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
    
    //获取审核信息
    public function examineInfo($data){
        $status = ARBiz::$status[$data['examine_status']];
        $info = '状态：'.$status.'<br />';
        if(!empty($data['examine_id'])){
            $name = Yii::app()->db->createCommand()->select('username')->from('admin_user')->where('id=:id',array(':id'=>$data['examine_id']))->queryScalar();
            $info .= '审核人：'.$name.'<br />';
        }
        if(!empty($data['examine_reason'])){
            $info .= '驳回原因：'.$data['examine_reason'].'<br />';
        }
        return $info;
    }
}

?>
