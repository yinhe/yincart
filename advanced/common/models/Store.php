<?php

/**
 * This is the model class for table "store".
 *
 * The followings are the available columns in table 'store':
 * @property integer $store_id
 * @property integer $user_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $domain
 * @property integer $type
 * @property integer $years
 * @property string $theme
 * @property integer $start_time
 * @property integer $end_time
 * @property string $introduction
 * @property integer $create_time
 * @property integer $update_time
 */
class Store extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'store';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		        array('name, email, password', 'required'),
			array('store_id, user_id, type, years, start_time, end_time, create_time, update_time', 'numerical', 'integerOnly'=>true),
			array('name, email', 'length', 'max'=>100),
			array('password', 'length', 'max'=>32),
			array('domain', 'length', 'max'=>200),
			array('theme', 'length', 'max'=>50),
			array('introduction', 'safe'),
		        array('email', 'email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('store_id, user_id, name, email, password, domain, type, years, theme, start_time, end_time, introduction, create_time, update_time', 'safe', 'on'=>'search'),
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
            'owner'=>array(self::BELONGS_TO, 'User', 'user_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'store_id' => 'Store',
			'user_id' => '用户',
			'name' => '店铺名',
			'email' => '邮箱',
			'password' => '密码',
			'domain' => '域名',
			'type' => '类型',
			'years' => '年限',
			'theme' => '主题',
			'start_time' => 'Start Time',
			'end_time' => 'End Time',
			'introduction' => '介绍',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('store_id',$this->store_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('domain',$this->domain,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('years',$this->years);
		$criteria->compare('theme',$this->theme,true);
		$criteria->compare('start_time',$this->start_time);
		$criteria->compare('end_time',$this->end_time);
		$criteria->compare('introduction',$this->introduction,true);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Store the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function beforeSave() {
	if (parent::beforeSave()) {
	    if ($this->isNewRecord) {
		$this->start_time = $this->create_time = $this->update_time = time();
	    }
	    else
		$this->update_time = time();
	    return true;
	}
	else
	    return false;
    }
}
