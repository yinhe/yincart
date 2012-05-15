<?php

/**
 * This is the model class for table "{{product_pinpai}}".
 *
 * The followings are the available columns in table '{{product_pinpai}}':
 * @property string $pp_id
 * @property string $pp_name
 * @property integer $sort_order
 */
class Pinpai extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pinpai the static model class
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
		return '{{product_pinpai}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pp_name', 'required'),
			array('sort_order', 'numerical', 'integerOnly'=>true),
			array('pp_name', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pp_id, pp_name, sort_order', 'safe', 'on'=>'search'),
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
			'pp_id' => 'Pp',
			'pp_name' => 'Pp Name',
			'sort_order' => 'Sort Order',
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

		$criteria->compare('pp_id',$this->pp_id,true);
		$criteria->compare('pp_name',$this->pp_name,true);
		$criteria->compare('sort_order',$this->sort_order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}