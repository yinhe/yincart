<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ARCates
 * 团购分类
 * @author Jiulong Zhang <kowloon29320@163.com>
 */
class ARCates extends DBGrouponCates{
    const LEVEL_ONE = 1;//一级分类
    const LEVEL_TWO = 2;//二级分类
    const LEVEL_THREE = 3;//三级分类
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    /**
     * 根据父ID和等级获取对应的分类信息
     * @param int $pid
     * @param int $level
     * @return array
     */
    public static function getCates($pid=0,$level=self::LEVEL_ONE){
        $query = new Query(Yii::app()->db);
        $query->from('groupon_cates');
        $query->select('id,name');
        $query->andWhere('pid=:pid AND level=:level', array(':pid'=>$pid,':level'=>$level));
        $cates = $query->queryAll();
        if(!empty($cates)){
            $cates = A::map($cates, 'id', 'name');
        }
        return $cates;
    }
    
    /**
     * 获取子分类的下拉选项
     * @param type $pid
     * @param type $level
     * @return type
     */
    public static function getChildOptionStr($pid,$level){
        $optionStr = CHtml::tag('option', array('value'=>''), '请选择');
        $cates = self::getCates($pid,$level);
        if(!empty($cates)){
            foreach($cates as $id=>$name){
                $optionStr .= CHtml::tag('option', array('value'=>$id), $name);
            }
        }
        return $optionStr;
    }
    
    /**
     * 根据分类id获取分类名
     * @param type $id
     * @param type $level
     * @return type
     */
    public static function getCateName($id,$level=null){
        $query = new Query(Yii::app()->db);
        $query->select('name');
        $query->from('groupon_cates');
        $query->andWhere('id=:id', array(':id'=>$id));
        if($level){
            $query->andWhere('level=:level',array(':level'=>$level));
        }
        $name = $query->queryScalar();
        return $name;
    }
}

?>
