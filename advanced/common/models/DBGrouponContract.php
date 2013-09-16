<?php

/**
 * This is the model class for table "groupon_contract".
 *
 * The followings are the available columns in table 'groupon_contract':
 * @property string $id
 * @property string $name
 * @property string $biz_id
 * @property string $sign_time
 * @property string $online_time
 * @property string $end_time
 * @property string $create_id
 * @property integer $if_billing
 * @property integer $examine_status
 * @property string $examine_id
 * @property string $examine_reason
 * @property string $create_time
 * @property string $update_time
 */
class DBGrouponContract extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBGrouponContract the static model class
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
		return 'groupon_contract';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('biz_id', 'required'),
			array('if_billing, examine_status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('biz_id, sign_time, online_time, end_time, create_id, examine_id, create_time, update_time', 'length', 'max'=>10),
			array('examine_reason', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, biz_id, sign_time, online_time, end_time, create_id, if_billing, examine_status, examine_id, examine_reason, create_time, update_time', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'biz_id' => 'Biz',
			'sign_time' => 'Sign Time',
			'online_time' => 'Online Time',
			'end_time' => 'End Time',
			'create_id' => 'Create',
			'if_billing' => 'If Billing',
			'examine_status' => 'Examine Status',
			'examine_id' => 'Examine',
			'examine_reason' => 'Examine Reason',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('biz_id',$this->biz_id,true);
		$criteria->compare('sign_time',$this->sign_time,true);
		$criteria->compare('online_time',$this->online_time,true);
		$criteria->compare('end_time',$this->end_time,true);
		$criteria->compare('create_id',$this->create_id,true);
		$criteria->compare('if_billing',$this->if_billing);
		$criteria->compare('examine_status',$this->examine_status);
		$criteria->compare('examine_id',$this->examine_id,true);
		$criteria->compare('examine_reason',$this->examine_reason,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}