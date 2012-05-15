<?php

/**
 * This is the model class for table "{{flash_ad}}".
 *
 * The followings are the available columns in table '{{flash_ad}}':
 * @property integer $id
 * @property string $title
 * @property string $pic
 * @property string $url
 * @property integer $sort_order
 */
class FlashAd extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FlashAd the static model class
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
		return '{{flash_ad}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, pic, url, sort_order', 'required'),
			array('sort_order', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
                        array('pic', 'file', 'types'=>'jpg, gif, png'),
			array('url', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, pic, url, sort_order', 'safe', 'on'=>'search'),
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
			'pic' => 'Pic',
			'url' => 'Url',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('sort_order',$this->sort_order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}