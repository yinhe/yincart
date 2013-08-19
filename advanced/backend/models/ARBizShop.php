<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ARBizShop
 * 商家分店模型类
 * @author Administrator
 */
class ARBizShop extends DBGrouponBizShop{
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
   /**
    * @return array validation rules for model attributes.
    */
   public function rules()
   {
           // NOTE: you should only define rules for those attributes that
           // will receive user inputs.
           return array(
                   array('biz_id, name, service_tel', 'required'),
                   array('address, travel_info, open_time,lnglat', 'required','on'=>'sell'),
                   array('is_reservation', 'numerical', 'integerOnly'=>true),
                   array('biz_id, province_id, city_id, area_id, cbd_id, create_time, update_time', 'length', 'max'=>10),
                   array('name, service_tel', 'length', 'max'=>128),
                   array('address, travel_info, open_time', 'length', 'max'=>255),
                   array('lnglat', 'length', 'max'=>64),
                   // The following rule is used by search().
                   // Please remove those attributes that should not be searched.
                   array('id, biz_id, name, service_tel, address, travel_info, open_time, province_id, city_id, area_id, cbd_id, lnglat, is_reservation, create_time, update_time', 'safe', 'on'=>'search'),
           );
   }
   
   /**
    * @return array customized attribute labels (name=>label)
    */
    public function attributeLabels()
    {
           return array(
                   'id' => 'ID',
                   'biz_id' => 'Biz',
                   'name' => '分店名',
                   'service_tel' => '预约电话',
                   'address' => '地址',
                   'travel_info' => '公交信息',
                   'open_time' => '营业时间',
                   'province_id' => '省份',
                   'city_id' => '城市',
                   'area_id' => '区域',
                   'cbd_id' => '商圈',
                   'lnglat' => '经纬度',
                   'is_reservation' => '是否需要预约',
                   'create_time' => 'Create Time',
                   'update_time' => 'Update Time',
           );
    }
}

?>
