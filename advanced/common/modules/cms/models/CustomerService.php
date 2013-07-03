<?php

/**
 * This is the model class for table "{{customer_service}}".
 *
 * The followings are the available columns in table '{{customer_service}}':
 * @property integer $id
 * @property integer $type
 * @property string $nick_name
 * @property string $account
 * @property integer $is_show
 * @property integer $sort_order
 */
class CustomerService extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return customer_service the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{customer_service}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('type, nick_name, account, is_show', 'required'),
            array('category_id, type, is_show, sort_order', 'numerical', 'integerOnly' => true),
            array('nick_name', 'length', 'max' => 50),
            array('account', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, type, nick_name, account, is_show, sort_order', 'safe', 'on' => 'search'),
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
            'id' => 'ID',
            'category_id' => '分类',
            'type' => '类型',
            'nick_name' => '昵称',
            'account' => '账号',
            'is_show' => '是否显示',
            'sort_order' => '排序',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('type', $this->type);
        $criteria->compare('nick_name', $this->nick_name, true);
        $criteria->compare('account', $this->account, true);
        $criteria->compare('is_show', $this->is_show);
        $criteria->compare('sort_order', $this->sort_order);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getShow() {
        echo $this->is_show == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getType() {
        switch ($this->type) {
            case 1:
                return 'QQ';
                break;
            case 2:
                return '阿里旺旺';
                break;
            case 3:
                return 'Skype';
                break;
            default:
                break;
        }
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
    public function attrCategory($id, $returnAttr = false, $index = null, $level = 1)
    {
        $data = array();
        $category = Category::model()->findByPk($id);
        $descendants = $category->descendants()->findAll();
        foreach ($descendants as $k1 => $child)
        {
            $string = '  ';
            $string .= str_repeat('  ', $child->level - $level);
            if ($child->isLeaf() && !$child->next()->find())
            {
                $string .= '';
            }
            else
            {
                $string .= '';
            }
            $string .= '' . $child->name;
            
            $data[$child->id] = $string;
            
        }
        if ($returnAttr !== false)
        {
            is_null($index) && $index = $this->category_id;
            $rs = empty($data[$index]) ? null : $data[$index];
        }
        else
        {
            $rs = $data;
        }

        return $rs;
    }
    
    /**
     * 类型
     * 
     * @param type $returnAttr false则返回分类列表，true则返回该对象的分类值
     * @param type $index 结合$returnAttr使用。如果$returnAttr为true，
     *              若指定$index，则返回指定$index对应的值，否则返回当前对象对应的分类值
     * @return mixed
     */
    public function attrType($returnAttr = false, $index = null)
    {
        $data = array(
            '1' => 'QQ', 
            '2' => '阿里旺旺',
            '3' => 'Skype'
        );
        
        if ($returnAttr !== false)
        {
            is_null($index) && $index = $this->type;
            $rs = empty($data[$index]) ? null : $data[$index];
        }
        else
        {
            $rs = $data;
        }

        return $rs;
    }
    
    /**
     * 显示
     * 
     * @param type $returnAttr false则返回分类列表，true则返回该对象的分类值
     * @param type $index 结合$returnAttr使用。如果$returnAttr为true，
     *              若指定$index，则返回指定$index对应的值，否则返回当前对象对应的分类值
     * @return mixed
     */
    public function attrShow($returnAttr = false, $index = null)
    {
        $data = array(
            '1' => '是', 
            '0' => '否'
        );
        
        if ($returnAttr !== false)
        {
            is_null($index) && $index = $this->type;
            $rs = empty($data[$index]) ? null : $data[$index];
        }
        else
        {
            $rs = $data;
        }

        return $rs;
    }

}