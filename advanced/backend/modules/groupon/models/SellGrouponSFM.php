<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SellGrouponSFM
 * 销售团购表单搜索模型
 * @author Administrator
 */
class SellGrouponSFM extends SFM{
    public $id;
    public $title;
    public $state;//项目上线状态


    public function attributeLabels() {
        return array(
            'id'=>'团购ID',
            'title'=>'团购标题',
            'state'=>'上线状态',
        );
    }
    
    // return the formbuilder config
    public function getFMConfig()
    {
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
                'state'=>array(
                    'type'=>'dropdownlist',
                    'class'=>'input-small',
                    'prompt'=>'请选择',
                    'items'=>  ARGroupon::$states,
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

    public function getQuery() {
        $query = new Query(Yii::app()->db);
        $query->from('groupon as g');
        if($this->id){
            $query->andWhere('g.id=:id', array(':id'=>$this->id));
        }
        if($this->title){
            $query->andWhere(array('like','g.title','%'.$this->title.'%'));
        }
        if($this->state){
            $now = time();
            switch ($this->state) {
                case 'online':
                    //在线
                    $query->andWhere('g.begin_time<=:time and g.end_time>=:time', array(':time'=>$now));

                    break;
                case 'offline':
                    //下线
                    $query->andWhere('g.end_time<:time', array(':time'=>$now));
                    break;
                case 'beonline':
                    //即将上线
                    $query->andWhere('g.begin_time>:time', array(':time'=>$now));
                    break;
                default:
                    break;
            }
        }
        return $query;
    }
    
    static public function imageInfo($data){
        return H::image($data['image'], $data['short_title'], array('width'=>100));
    }
}

?>
