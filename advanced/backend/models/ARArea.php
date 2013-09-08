<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ARArea
 * 城市Model
 * @author Administrator
 */
class ARArea extends Area{
    const GRADE_PROVINCE = 1;//省
    const GRADE_CITY = 2;//市
    const GRADE_AREA = 3;//区
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    /**
     * 获取子市区的键值对列表
     * @param int/null $pid 父ID
     * @param int $grade 等级
     * @return array
     */
    public static function getAreas($pid=null,$grade=self::GRADE_PROVINCE){
        $key = 'arealist_'.$grade.'_'.$pid;
        $areas = Yii::app()->cache->get($key);
//        dump($areas);
        if($areas === false){
            $query = new Query(Yii::app()->db);
            $query->select('id,name');
            $query->from('area');
            if($pid == null){
                $query->andWhere('parent_id is null');
            }else{
                $query->andWhere('parent_id=:pid', array(':pid'=>$pid));
            }
            $areas = $query->queryAll();
            if(!empty($areas)){
                $areas = A::map($areas, 'id', 'name');
            }
            Yii::app()->cache->set($key, $areas, 60*60*24);
        }
//        dump($areas);
        return $areas;
    }
    
    /**
     * 得到子市区的下拉选项
     * @param int $pid
     * @param int $grade
     * @return $optionStr
     */
    public static function getChildOptionStr($pid,$grade){
        $optionStr .= CHtml::tag('option', array('value' => ''), '请选择', true);
        if($pid){
            $data = self::getAreas($pid,$grade);
            if(!empty($data)){
                foreach ($data as $value => $name) {
                    $optionStr .= CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
                }
            }
        }
        
        return $optionStr;
    }
    
    //根据id和级别获取分类
    static public function getName($id,$grade=self::GRADE_CITY){
        return Yii::app()->db->createCommand()->select('name')->from('area')->where('id=:id and grade=:grade',array(':id'=>$id,':grade'=>$grade))->queryScalar();
    }
}

?>
