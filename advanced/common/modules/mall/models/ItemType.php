<?php

/**
 * This is the model class for table "item_type".
 *
 * The followings are the available columns in table 'item_type':
 * @property integer $type_id
 * @property string $name
 * @property integer $enabled
 */
class ItemType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('name', 'required'),
			array('enabled', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('type_id, name, enabled', 'safe', 'on'=>'search'),
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
			'type_id' => 'ID',
			'name' => '名称',
			'enabled' => '启用',
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

		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('enabled',$this->enabled);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /**
     * 是否允许
     * 
     * @param type $returnAttr false则返回分类列表，true则返回该对象的分类值
     * @param type $index 结合$returnAttr使用。如果$returnAttr为true，
     *              若指定$index，则返回指定$index对应的值，否则返回当前对象对应的分类值
     * @return mixed
     */
    public function attrEnabled($returnAttr = false, $index = null)
    {
        $data = array(
            '1' => '是', 
            '0' => '否'
        );
        
        if ($returnAttr !== false)
        {
            is_null($index) && $index = $this->enabled;
            $rs = empty($data[$index]) ? null : $data[$index];
        }
        else
        {
            $rs = $data;
        }

        return $rs;
    }
}
