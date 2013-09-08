<?php

/**
 * This is the model class for table "groupon_cates".
 *
 * The followings are the available columns in table 'groupon_cates':
 * @property string $id
 * @property string $name
 * @property string $ename
 * @property string $pid
 * @property integer $level
 * @property string $path
 * @property integer $is_hot
 */
class DBGrouponCates extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DBGrouponCates the static model class
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
		return 'groupon_cates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, ename', 'required'),
			array('level, is_hot', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>32),
			array('ename', 'length', 'max'=>20),
			array('pid', 'length', 'max'=>10),
			array('path', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, ename, pid, level, path, is_hot', 'safe', 'on'=>'search'),
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
			'ename' => 'Ename',
			'pid' => 'Pid',
			'level' => 'Level',
			'path' => 'Path',
			'is_hot' => 'Is Hot',
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
		$criteria->compare('ename',$this->ename,true);
		$criteria->compare('pid',$this->pid,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('is_hot',$this->is_hot);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}