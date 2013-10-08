<?php

/**
 * This is the model class for table "store_menu".
 *
 * The followings are the available columns in table 'store_menu':
 * @property string $id
 * @property string $store_id
 * @property string $root
 * @property string $lft
 * @property string $rgt
 * @property integer $level
 * @property string $name
 * @property string $url
 * @property string $pic
 * @property string $position
 * @property integer $if_show
 * @property string $memo
 */
class StoreMenu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'store_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('store_id, lft, rgt, level', 'required'),
			array('level, if_show', 'numerical', 'integerOnly'=>true),
			array('store_id, root, lft, rgt', 'length', 'max'=>10),
			array('name', 'length', 'max'=>100),
			array('url, pic', 'length', 'max'=>255),
			array('position', 'length', 'max'=>45),
			array('memo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, store_id, root, lft, rgt, level, name, url, pic, position, if_show, memo', 'safe', 'on'=>'search'),
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
			'store_id' => 'Store',
			'root' => 'Root',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'level' => 'Level',
            'name' => '名称',
            'url' => 'Url',
            'pic' => '图片',
            'position' => '位置',
            'if_show' => '是否显示',
            'memo' => '备注',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('store_id',$this->store_id,true);
		$criteria->compare('root',$this->root,true);
		$criteria->compare('lft',$this->lft,true);
		$criteria->compare('rgt',$this->rgt,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('if_show',$this->if_show);
		$criteria->compare('memo',$this->memo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StoreMenu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function behaviors() {
        return array(
            'NestedSetBehavior' => array(
                'class' => 'comext.nested-set-behavior.NestedSetBehavior',
                'leftAttribute' => 'lft',
                'rightAttribute' => 'rgt',
                'levelAttribute' => 'level',
                'hasManyRoots' => true,
            ));
    }

    public function getChildMenu() {
        $menu = StoreMenu::model()->findByPk($this->id);
        $descendants = $menu->children()->findAll();
        foreach ($descendants as $model)
            $items[] = array('label' => F::t($model->name), 'url' => $model->url ? Yii::app()->request->baseUrl . '/' . $model->url : '#');

        return $items;
    }

    public function getChildCount() {
        $menu = StoreMenu::model()->findByPk($this->id);
        $descendants = $menu->children()->findAll();
        return count($descendants);
    }
}
