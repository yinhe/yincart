<?php

/**
 * This is the model class for table "groupon_biz_shop".
 *
 * The followings are the available columns in table 'groupon_biz_shop':
 * @property string $id
 * @property string $biz_id
 * @property string $name
 * @property string $service_tel
 * @property string $address
 * @property string $travel_info
 * @property string $open_time
 * @property string $province_id
 * @property string $city_id
 * @property string $area_id
 * @property string $cbd_id
 * @property string $lnglat
 * @property integer $is_reservation
 * @property string $create_time
 * @property string $update_time
 */
class DBGrouponBizShop extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBGrouponBizShop the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'groupon_biz_shop';
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
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
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
			'name' => 'Name',
			'service_tel' => 'Service Tel',
			'address' => 'Address',
			'travel_info' => 'Travel Info',
			'open_time' => 'Open Time',
			'province_id' => 'Province',
			'city_id' => 'City',
			'area_id' => 'Area',
			'cbd_id' => 'Cbd',
			'lnglat' => 'Lnglat',
			'is_reservation' => 'Is Reservation',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('biz_id',$this->biz_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('service_tel',$this->service_tel,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('travel_info',$this->travel_info,true);
		$criteria->compare('open_time',$this->open_time,true);
		$criteria->compare('province_id',$this->province_id,true);
		$criteria->compare('city_id',$this->city_id,true);
		$criteria->compare('area_id',$this->area_id,true);
		$criteria->compare('cbd_id',$this->cbd_id,true);
		$criteria->compare('lnglat',$this->lnglat,true);
		$criteria->compare('is_reservation',$this->is_reservation);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}