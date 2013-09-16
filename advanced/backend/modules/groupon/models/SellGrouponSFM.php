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
    public $status;//项目审核状态

    public function attributeLabels() {
        return array(
            'id'=>'团购ID',
            'title'=>'团购标题',
            'state'=>'上线状态',
            'status'=>'审核状态',
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
                'status'=>array(
                    'type'=>'dropdownlist',
                    'class'=>'input-small',
                    'prompt'=>'请选择',
                    'items'=>  ARGroupon::$status,
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
        return H::image('http://img.yincart.com/'.$data['image'], $data['short_title'], array('width'=>100));
    }
    
    public static function bizInfo($data){
        $biz = ARBiz::model()->findByPk($data['biz_id']);
        if($biz == null){
            return '该商品没有对应商家';
        }
        $str = $biz->title.'<span style="color:teal;">[商户ID：'.$biz->id.']</span>';
        return $str;
    }
    
    public static function cateInfo($data){
        $str = '';
        $str .= '一级分类：'.ARCates::getCateName($data['cate_1_id'], ARCates::LEVEL_ONE).'<br />';
        $str .= '二级分类：'.ARCates::getCateName($data['cate_2_id'],  ARCates::LEVEL_TWO).'<br />';
        if($data['cate_3_id'] > 0){
            $str .= '三级分类：'.ARCates::getCateName($data['cate_3_id'], ARCates::LEVEL_THREE);
        }
        return $str;
    }
    
    public static function priceInfo($data){
        $str = '';
        $str .= '团购价：'.$data['price'].'<br />';
        $str .= '市场价：'.$data['market_price'];
        return $str;
    }
     
    public static function timeInfo($data){
        $str = '';
        $str .= '开始时间：'.date('Y-m-d',$data['begin_time']).'<br />';
        $str .= '结束时间：'.date('Y-m-d',$data['end_time']).'<br />';
        $str .= '过期时间：'.date('Y-m-d',$data['expire_time']);
        return $str;
    }
    
    public static function statusInfo($data){
        $str = '';
        $str .= '审核状态：'.ARGroupon::$status[$data['examine_status']].'<br />';
        $now = time();
        //如果开始时间小于当前，结束时间大于当前
        if(($data['begin_time'] < $now) && ($data['begin_time'] > $now)){
            $str .= CHtml::tag('span', array('style'=>'color:teal;'), '在线');
        }  elseif ($data['begin_time'] > $now) {
            $str .= CHtml::tag('span', array('style'=>'color:green;'), '等待上线');
        }  elseif ($data['end_time'] < $now) {
            $str .= CHtml::tag('span', array('style'=>'color:red;'), '已下线');
        }
        return $str;
    }
}

?>
