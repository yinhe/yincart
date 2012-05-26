<?php

/**
 * This is the model class for table "{{items}}".
 *
 * The followings are the available columns in table '{{items}}':
 * @property integer $item_id
 * @property integer $category_id
 * @property integer $brand_id
 * @property string $item_name
 * @property string $item_sn
 * @property string $unit
 * @property integer $stock
 * @property string $min_number
 * @property string $market_price
 * @property string $shop_price
 * @property string $props
 * @property string $props_name
 * @property string $prop_imgs
 * @property string $item_image
 * @property string $item_imgs
 * @property string $item_desc
 * @property integer $is_show
 * @property integer $is_promote
 * @property integer $is_new
 * @property integer $is_hot
 * @property integer $is_best
 * @property string $click_count
 * @property integer $sort_order
 * @property integer $create_time
 * @property integer $update_time
 * @property string $language
 */
class Item extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Item the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{items}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('item_name, unit, min_number, item_image, item_desc, language', 'required'),
            array('category_id, brand_id, stock, is_show, is_promote, is_new, is_hot, is_best, sort_order, create_time, update_time', 'numerical', 'integerOnly' => true),
            array('item_name', 'length', 'max' => 800),
            array('item_sn', 'length', 'max' => 120),
            array('unit, currency', 'length', 'max' => 20),
            array('min_number', 'length', 'max' => 100),
            array('market_price, shop_price', 'length', 'max' => 10),
            array('item_image', 'length', 'max' => 255),
            array('click_count', 'length', 'max' => 11),
            array('language', 'length', 'max' => 45),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('item_id, category_id, brand_id, item_name, item_sn, unit, stock, min_number, market_price, shop_price, props, props_name, prop_imgs, item_image, item_imgs, item_desc, is_show, is_promote, is_new, is_hot, is_best, click_count, sort_order, create_time, update_time, language', 'safe', 'on' => 'search'),
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
            'brand' => array(self::BELONGS_TO, 'Brand', 'brand_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'item_id' => 'ID',
            'category_id' => '分类',
            'brand_id' => '品牌',
            'item_name' => '商品名称',
            'item_sn' => '商品编号',
            'unit' => '计量单位',
            'stock' => '总库存',
            'min_number' => '最少订货量',
            'market_price' => '零售价',
            'shop_price' => '批发价',
            'currency' => '货币',
            'props' => '商品属性',
            'props_name' => '属性名称',
            'prop_imgs' => '属性图片',
            'item_image' => '商品图片',
            'item_imgs' => '商品图集',
            'item_desc' => '商品描述',
            'is_show' => '上架',
            'is_promote' => '促销',
            'is_new' => '新品',
            'is_hot' => '热销',
            'is_best' => '精品',
            'click_count' => '浏览次数',
            'sort_order' => '排序',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'language' => '语言',
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

        $criteria->compare('item_id', $this->item_id);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('brand_id', $this->brand_id);
        $criteria->compare('item_name', $this->item_name, true);
        $criteria->compare('item_sn', $this->item_sn, true);
        $criteria->compare('unit', $this->unit, true);
        $criteria->compare('stock', $this->stock);
        $criteria->compare('min_number', $this->min_number, true);
        $criteria->compare('market_price', $this->market_price, true);
        $criteria->compare('shop_price', $this->shop_price, true);
        $criteria->compare('props', $this->props, true);
        $criteria->compare('props_name', $this->props_name, true);
        $criteria->compare('prop_imgs', $this->prop_imgs, true);
        $criteria->compare('item_image', $this->item_image, true);
        $criteria->compare('item_imgs', $this->item_imgs, true);
        $criteria->compare('item_desc', $this->item_desc, true);
        $criteria->compare('is_show', $this->is_show);
        $criteria->compare('is_promote', $this->is_promote);
        $criteria->compare('is_new', $this->is_new);
        $criteria->compare('is_hot', $this->is_hot);
        $criteria->compare('is_best', $this->is_best);
        $criteria->compare('click_count', $this->click_count, true);
        $criteria->compare('sort_order', $this->sort_order);
        $criteria->compare('create_time', $this->create_time);
        $criteria->compare('update_time', $this->update_time);
        $criteria->compare('language', $this->language, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getShow() {
        echo $this->is_show == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getPromote() {
        echo $this->is_promote == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getNew() {
        echo $this->is_new == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getHot() {
        echo $this->is_hot == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getBest() {
        echo $this->is_best == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
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
    
    public function getName(){
        return CHtml::link($this->item_name, array('/item/view', 'id' => $this->item_id));
    }

    public function getListThumb() {
        $img = '/upload/item/' . $this->item_image;
        $img_thumb = Yii::app()->request->baseUrl . ImageHelper::thumb(150, 150, $img, array('method' => 'resize'));
        $img_thumb_now = CHtml::image($img_thumb, $this->item_name);
        return CHtml::link($img_thumb_now, array('/item/view', 'id' => $this->item_id));
    }

    public function getImage() {
        $img = '/upload/item/' . $this->item_image;
        $img_thumb = Yii::app()->request->baseUrl . ImageHelper::thumb(310, 310, $img, array('method' => 'resize'));
        $img_thumb_now = CHtml::image($img_thumb, $this->item_name);
        return $img_thumb_now;
    }

    public function getSmallThumb() {
        $img = '/upload/item/' . $this->item_image;
        $img_thumb = Yii::app()->request->baseUrl . ImageHelper::thumb(40, 40, $img, array('method' => 'resize'));
        $img_thumb_now = CHtml::image($img_thumb, $this->item_name);
        return CHtml::link($img_thumb_now, array('/item/view', 'id' => $this->item_id));
    }
    
    public function getRecentThumb() {
        $img = '/upload/item/' . $this->item_image;
        $img_thumb = Yii::app()->request->baseUrl . ImageHelper::thumb(50, 50, $img, array('method' => 'resize'));
        $img_thumb_now = CHtml::image($img_thumb, $this->item_name);
        return CHtml::link($img_thumb_now, array('/item/view', 'id' => $this->item_id));
    }
    
    public function getRecommendThumb() {
        $img = '/upload/item/' . $this->item_image;
        $img_thumb = Yii::app()->request->baseUrl . ImageHelper::thumb(80, 80, $img, array('method' => 'resize'));
        $img_thumb_now = CHtml::image($img_thumb, $this->item_name);
        return CHtml::link($img_thumb_now, array('/item/view', 'id' => $this->item_id));
    }

}