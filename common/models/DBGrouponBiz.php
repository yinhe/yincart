<?php

/**
 * This is the model class for table "groupon_biz".
 *
 * The followings are the available columns in table 'groupon_biz':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $title
 * @property string $license_photo
 * @property string $contact
 * @property string $phone
 * @property string $mobile
 * @property string $bank_user
 * @property string $bank_name
 * @property string $bank_child
 * @property string $bank_no
 * @property string $create_id
 * @property integer $examine_status
 * @property string $examine_id
 * @property string $examine_reason
 * @property string $create_time
 * @property string $update_time
 * @property integer $display
 */
class DBGrouponBiz extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBGrouponBiz the static model class
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
		return 'groupon_biz';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('examine_status, display', 'numerical', 'integerOnly'=>true),
			array('username, password, contact, bank_no', 'length', 'max'=>32),
			array('title, license_photo, bank_name, bank_child, examine_reason', 'length', 'max'=>128),
			array('phone, bank_user', 'length', 'max'=>18),
			array('mobile', 'length', 'max'=>11),
			array('create_id, examine_id, create_time, update_time', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, title, license_photo, contact, phone, mobile, bank_user, bank_name, bank_child, bank_no, create_id, examine_status, examine_id, examine_reason, create_time, update_time, display', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'title' => 'Title',
			'license_photo' => 'License Photo',
			'contact' => 'Contact',
			'phone' => 'Phone',
			'mobile' => 'Mobile',
			'bank_user' => 'Bank User',
			'bank_name' => 'Bank Name',
			'bank_child' => 'Bank Child',
			'bank_no' => 'Bank No',
			'create_id' => 'Create',
			'examine_status' => 'Examine Status',
			'examine_id' => 'Examine',
			'examine_reason' => 'Examine Reason',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'display' => 'Display',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('license_photo',$this->license_photo,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('bank_user',$this->bank_user,true);
		$criteria->compare('bank_name',$this->bank_name,true);
		$criteria->compare('bank_child',$this->bank_child,true);
		$criteria->compare('bank_no',$this->bank_no,true);
		$criteria->compare('create_id',$this->create_id,true);
		$criteria->compare('examine_status',$this->examine_status);
		$criteria->compare('examine_id',$this->examine_id,true);
		$criteria->compare('examine_reason',$this->examine_reason,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('display',$this->display);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}