<?php

/**
 * This is the model class for table "{{order_goods}}".
 *
 * The followings are the available columns in table '{{order_goods}}':
 * @property integer $rec_id
 * @property integer $order_id
 * @property integer $product_id
 * @property string $product_name
 * @property string $product_image
 * @property string $product_sn
 * @property integer $qty
 */
class OrderGoods extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderGoods the static model class
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
		return '{{order_goods}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, product_id, product_name, product_image, product_sn, qty', 'required'),
			array('order_id, product_id, qty', 'numerical', 'integerOnly'=>true),
			array('product_name', 'length', 'max'=>100),
			array('product_image', 'length', 'max'=>255),
			array('product_sn', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rec_id, order_id, product_id, product_name, product_image, product_sn, qty', 'safe', 'on'=>'search'),
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
			'rec_id' => 'Rec',
			'order_id' => 'Order',
			'product_id' => 'Product',
			'product_name' => 'Product Name',
			'product_image' => 'Product Image',
			'product_sn' => 'Product Sn',
			'qty' => 'Qty',
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

		$criteria->compare('rec_id',$this->rec_id);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('product_image',$this->product_image,true);
		$criteria->compare('product_sn',$this->product_sn,true);
		$criteria->compare('qty',$this->qty);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}