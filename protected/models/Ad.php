<?php

/**
 * This is the model class for table "{{ad}}".
 *
 * The followings are the available columns in table '{{ad}}':
 * @property integer $ad_id
 * @property integer $position_id
 * @property integer $media_type
 * @property string $ad_name
 * @property string $ad_link
 * @property string $ad_code
 * @property integer $start_time
 * @property integer $end_time
 * @property string $link_man
 * @property string $link_email
 * @property string $link_phone
 * @property integer $click_count
 * @property integer $enabled
 */
class Ad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ad the static model class
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
		return '{{ad}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ad_code', 'required'),
			array('position_id, media_type, start_time, end_time, click_count, enabled', 'numerical', 'integerOnly'=>true),
			array('ad_name, link_man, link_email, link_phone', 'length', 'max'=>60),
			array('ad_link', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ad_id, position_id, media_type, ad_name, ad_link, ad_code, start_time, end_time, link_man, link_email, link_phone, click_count, enabled', 'safe', 'on'=>'search'),
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
			'ad_id' => '广告ID',
			'position_id' => '位置ID',
			'media_type' => '媒介类型',
			'ad_name' => '广告名称',
			'ad_link' => '广告链接',
			'ad_code' => '广告代码',
			'start_time' => '开始时间',
			'end_time' => '结束时间',
			'link_man' => '联系人',
			'link_email' => '联系EMAIL',
			'link_phone' => '联系电话',
			'click_count' => '点击次数',
			'enabled' => '是否可用',
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

		$criteria->compare('ad_id',$this->ad_id);
		$criteria->compare('position_id',$this->position_id);
		$criteria->compare('media_type',$this->media_type);
		$criteria->compare('ad_name',$this->ad_name,true);
		$criteria->compare('ad_link',$this->ad_link,true);
		$criteria->compare('ad_code',$this->ad_code,true);
		$criteria->compare('start_time',$this->start_time);
		$criteria->compare('end_time',$this->end_time);
		$criteria->compare('link_man',$this->link_man,true);
		$criteria->compare('link_email',$this->link_email,true);
		$criteria->compare('link_phone',$this->link_phone,true);
		$criteria->compare('click_count',$this->click_count);
		$criteria->compare('enabled',$this->enabled);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}