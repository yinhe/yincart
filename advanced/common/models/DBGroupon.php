<?php

/**
 * This is the model class for table "groupon".
 *
 * The followings are the available columns in table 'groupon':
 * @property string $id
 * @property string $title
 * @property string $short_title
 * @property string $sms_title
 * @property string $image
 * @property string $cate_1_id
 * @property string $cate_2_id
 * @property string $cate_3_id
 * @property string $biz_id
 * @property string $contract_id
 * @property double $price
 * @property double $market_price
 * @property double $cost
 * @property string $begin_time
 * @property string $end_time
 * @property string $expire_time
 * @property string $per_number
 * @property string $once_number
 * @property string $begin_number
 * @property string $now_number
 * @property string $pre_number
 * @property integer $max_number
 * @property integer $display
 * @property string $sort
 * @property integer $is_copy
 * @property integer $examine_status
 * @property string $examine_id
 * @property string $examine_reason
 * @property string $create_id
 * @property string $create_time
 * @property string $update_time
 */
class DBGroupon extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBGroupon the static model class
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
		return 'groupon';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, short_title, sms_title, cate_1_id, cate_2_id, biz_id, contract_id', 'required'),
			array('max_number, display, is_copy, examine_status', 'numerical', 'integerOnly'=>true),
			array('price, market_price, cost', 'numerical'),
			array('title', 'length', 'max'=>255),
			array('short_title', 'length', 'max'=>18),
			array('sms_title, cate_1_id, cate_2_id, cate_3_id, biz_id, contract_id, begin_time, end_time, expire_time, per_number, once_number, begin_number, now_number, pre_number, sort, examine_id, create_id, create_time, update_time', 'length', 'max'=>10),
			array('image, examine_reason', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, short_title, sms_title, image, cate_1_id, cate_2_id, cate_3_id, biz_id, contract_id, price, market_price, cost, begin_time, end_time, expire_time, per_number, once_number, begin_number, now_number, pre_number, max_number, display, sort, is_copy, examine_status, examine_id, examine_reason, create_id, create_time, update_time', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'short_title' => 'Short Title',
			'sms_title' => 'Sms Title',
			'image' => 'Image',
			'cate_1_id' => 'Cate 1',
			'cate_2_id' => 'Cate 2',
			'cate_3_id' => 'Cate 3',
			'biz_id' => 'Biz',
			'contract_id' => 'Contract',
			'price' => 'Price',
			'market_price' => 'Market Price',
			'cost' => 'Cost',
			'begin_time' => 'Begin Time',
			'end_time' => 'End Time',
			'expire_time' => 'Expire Time',
			'per_number' => 'Per Number',
			'once_number' => 'Once Number',
			'begin_number' => 'Begin Number',
			'now_number' => 'Now Number',
			'pre_number' => 'Pre Number',
			'max_number' => 'Max Number',
			'display' => 'Display',
			'sort' => 'Sort',
			'is_copy' => 'Is Copy',
			'examine_status' => 'Examine Status',
			'examine_id' => 'Examine',
			'examine_reason' => 'Examine Reason',
			'create_id' => 'Create',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('short_title',$this->short_title,true);
		$criteria->compare('sms_title',$this->sms_title,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('cate_1_id',$this->cate_1_id,true);
		$criteria->compare('cate_2_id',$this->cate_2_id,true);
		$criteria->compare('cate_3_id',$this->cate_3_id,true);
		$criteria->compare('biz_id',$this->biz_id,true);
		$criteria->compare('contract_id',$this->contract_id,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('market_price',$this->market_price);
		$criteria->compare('cost',$this->cost);
		$criteria->compare('begin_time',$this->begin_time,true);
		$criteria->compare('end_time',$this->end_time,true);
		$criteria->compare('expire_time',$this->expire_time,true);
		$criteria->compare('per_number',$this->per_number,true);
		$criteria->compare('once_number',$this->once_number,true);
		$criteria->compare('begin_number',$this->begin_number,true);
		$criteria->compare('now_number',$this->now_number,true);
		$criteria->compare('pre_number',$this->pre_number,true);
		$criteria->compare('max_number',$this->max_number);
		$criteria->compare('display',$this->display);
		$criteria->compare('sort',$this->sort,true);
		$criteria->compare('is_copy',$this->is_copy);
		$criteria->compare('examine_status',$this->examine_status);
		$criteria->compare('examine_id',$this->examine_id,true);
		$criteria->compare('examine_reason',$this->examine_reason,true);
		$criteria->compare('create_id',$this->create_id,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}