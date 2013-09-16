<?php

/**
 * This is the model class for table "groupon_attach".
 *
 * The followings are the available columns in table 'groupon_attach':
 * @property string $id
 * @property string $relation_id
 * @property string $relation_type
 * @property string $file_name
 * @property string $file_path
 * @property string $title
 * @property integer $create_time
 */
class DBGrouponAttach extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBGrouponAttach the static model class
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
		return 'groupon_attach';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('relation_id', 'required'),
			array('create_time', 'numerical', 'integerOnly'=>true),
			array('relation_id', 'length', 'max'=>10),
			array('relation_type', 'length', 'max'=>8),
			array('file_name, file_path, title', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, relation_id, relation_type, file_name, file_path, title, create_time', 'safe', 'on'=>'search'),
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
			'relation_id' => 'Relation',
			'relation_type' => 'Relation Type',
			'file_name' => 'File Name',
			'file_path' => 'File Path',
			'title' => 'Title',
			'create_time' => 'Create Time',
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
		$criteria->compare('relation_id',$this->relation_id,true);
		$criteria->compare('relation_type',$this->relation_type,true);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('file_path',$this->file_path,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}