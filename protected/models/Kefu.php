<?php

/**
 * This is the model class for table "{{kefu}}".
 *
 * The followings are the available columns in table '{{kefu}}':
 * @property integer $id
 * @property integer $type
 * @property string $nick_name
 * @property string $account
 * @property integer $if_show
 * @property integer $sort_order
 */
class Kefu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Kefu the static model class
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
		return '{{kefu}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, nick_name, account, if_show', 'required'),
			array('type, if_show, sort_order', 'numerical', 'integerOnly'=>true),
			array('nick_name', 'length', 'max'=>50),
			array('account', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, nick_name, account, if_show, sort_order', 'safe', 'on'=>'search'),
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
			'type' => '类型',
			'nick_name' => '昵称',
			'account' => '账号',
			'if_show' => '是否显示',
			'sort_order' => '排序',
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
		$criteria->compare('type',$this->type);
		$criteria->compare('nick_name',$this->nick_name,true);
		$criteria->compare('account',$this->account,true);
		$criteria->compare('if_show',$this->if_show);
		$criteria->compare('sort_order',$this->sort_order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}