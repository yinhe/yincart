<?php

/**
 * This is the model class for table "friend_link".
 *
 * The followings are the available columns in table 'friend_link':
 * @property integer $link_id
 * @property integer $category_id
 * @property string $title
 * @property string $pic
 * @property string $url
 * @property string $memo
 * @property integer $sort_order
 * @property string $language
 * @property integer $create_time
 * @property integer $update_time
 */
class FriendLink extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
	return 'friend_link';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
	// NOTE: you should only define rules for those attributes that
	// will receive user inputs.
	return array(
	    array('title, url', 'required'),
	    array('category_id, sort_order, create_time, update_time', 'numerical', 'integerOnly' => true),
	    array('title', 'length', 'max' => 100),
	    array('pic', 'file',
		'types' => 'jpg, gif, png',
		'maxSize' => 1024 * 1024 * 2, // 2MB
		'tooLarge' => '文件超过 2MB. 请上传小一点儿的文件.',
		'allowEmpty' => true,
		'on' => 'create'
	    ),
	    array('pic', 'file',
		'types' => 'jpg, gif, png',
		'maxSize' => 1024 * 1024 * 2, // 2MB
		'tooLarge' => '文件超过 2MB. 请上传小一点儿的文件.',
		'allowEmpty' => true,
		'on' => 'update'
	    ),
	    array('url', 'length', 'max' => 200),
	    array('language', 'length', 'max' => 45),
	    // The following rule is used by search().
	    // @todo Please remove those attributes that should not be searched.
	    array('link_id, category_id, title, pic, url, memo, sort_order, language, create_time, update_time', 'safe', 'on' => 'search'),
	);
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
	// NOTE: you may need to adjust the relation name and the related
	// class name for the relations automatically generated below.
	return array(
	    'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
	);
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
	return array(
	    'link_id' => 'ID',
	    'category_id' => '分类',
	    'title' => '标题',
	    'pic' => '图片',
	    'url' => '地址',
	    'memo' => '备注',
	    'sort_order' => '排序',
	    'language' => '语言',
	    'create_time' => '创建时间',
	    'update_time' => '更新时间',
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
    public function search() {
	// @todo Please modify the following code to remove attributes that should not be searched.

	$criteria = new CDbCriteria;
	$criteria->order = 'link_id desc, sort_order asc';

	$criteria->compare('link_id', $this->link_id);
	$criteria->compare('category_id', $this->category_id);
	$criteria->compare('title', $this->title, true);
	$criteria->compare('pic', $this->pic, true);
	$criteria->compare('url', $this->url, true);
	$criteria->compare('memo', $this->memo, true);
	$criteria->compare('sort_order', $this->sort_order);
	$criteria->compare('language', $this->language, true);
	$criteria->compare('create_time', $this->create_time);
	$criteria->compare('update_time', $this->update_time);

	return new CActiveDataProvider($this, array(
	    'criteria' => $criteria,
	));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return FriendLink the static model class
     */
    public static function model($className = __CLASS__) {
	return parent::model($className);
    }

    public function beforeSave() {
	if (parent::beforeSave()) {
	    if ($this->isNewRecord) {
		$this->create_time = $this->update_time = time();
	    }
	    else
		$this->update_time = time();
	    return true;
	}
	else
	    return false;
    }

    /**
     * 分类属性
     * 
     * @param int $id 分类ID
     * @param type $returnAttr false则返回分类列表，true则返回该对象的分类值
     * @param type $index 结合$returnAttr使用。如果$returnAttr为true，
     *              若指定$index，则返回指定$index对应的值，否则返回当前对象对应的分类值
     * @param type $level 层级
     * @return mixed
     */
    public function attrCategory($id, $returnAttr = false, $index = null, $level = 1) {
	$data = array();
	$category = Category::model()->findByPk($id);
	$descendants = $category->descendants()->findAll();
	foreach ($descendants as $k1 => $child) {
	    $string = '  ';
	    $string .= str_repeat('  ', $child->level - $level);
	    if ($child->isLeaf() && !$child->next()->find()) {
		$string .= '';
	    } else {
		$string .= '';
	    }
	    $string .= '' . $child->name;

	    $data[$child->id] = $string;
	}
	if ($returnAttr !== false) {
	    is_null($index) && $index = $this->category_id;
	    $rs = empty($data[$index]) ? null : $data[$index];
	} else {
	    $rs = $data;
	}

	return $rs;
    }

}
