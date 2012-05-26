<?php

/**
 * This is the model class for table "{{ad_position}}".
 *
 * The followings are the available columns in table '{{ad_position}}':
 * @property integer $position_id
 * @property string $position_name
 * @property integer $ad_width
 * @property integer $ad_height
 * @property string $position_desc
 * @property string $position_style
 */
class AdPosition extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdPosition the static model class
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
		return '{{ad_position}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('position_name, ad_width, ad_height', 'required'),
			array('ad_width, ad_height', 'numerical', 'integerOnly'=>true),
			array('position_name', 'length', 'max'=>60),
			array('position_desc', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('position_id, position_name, ad_width, ad_height, position_desc, position_style', 'safe', 'on'=>'search'),
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
			'position_id' => '位置ID',
			'position_name' => '广告位名称',
			'ad_width' => '位置宽度',
			'ad_height' => '位置高度',
			'position_desc' => '广告位描述',
			'position_style' => '广告位模板',
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

		$criteria->compare('position_id',$this->position_id);
		$criteria->compare('position_name',$this->position_name,true);
		$criteria->compare('ad_width',$this->ad_width);
		$criteria->compare('ad_height',$this->ad_height);
		$criteria->compare('position_desc',$this->position_desc,true);
		$criteria->compare('position_style',$this->position_style,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}