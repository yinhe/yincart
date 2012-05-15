<?php

/**
 * This is the model class for table "{{orders}}".
 *
 * The followings are the available columns in table '{{orders}}':
 * @property integer $order_id
 * @property string $order_sn
 * @property integer $user_id
 * @property string $user_name
 * @property string $email
 * @property string $address
 * @property string $postcode
 * @property string $tel_no
 * @property string $content
 */
class Orders extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Orders the static model class
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
		return '{{orders}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_sn, user_id, user_name, email, address, postcode, tel_no', 'required'),
			array('order_id, user_id', 'numerical', 'integerOnly'=>true),
			array('order_sn, tel_no', 'length', 'max'=>20),
			array('user_name, email', 'length', 'max'=>40),
			array('address', 'length', 'max'=>200),
			array('postcode', 'length', 'max'=>10),
                        array('email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('order_id, order_sn, user_id, user_name, email, address, postcode, tel_no, content', 'safe', 'on'=>'search'),
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
                    'goods' => array(self::HAS_MANY, 'OrderGoods', 'order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'order_id' => '订单ID',
			'order_sn' => '订单编号',
			'user_id' => '用户ID',
			'user_name' => '姓名',
			'email' => 'Email',
			'address' => '收货地址',
			'postcode' => '邮政编码',
			'tel_no' => '电话号码',
			'content' => '备注',
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

		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('order_sn',$this->order_sn,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('tel_no',$this->tel_no,true);
		$criteria->compare('content',$this->content,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}