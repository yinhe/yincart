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
class Ad extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @return FlashAd the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{ad}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, pic, theme, sort_order', 'required'),
            array('sort_order', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 100),
            array('pic', 'file',
                'types' => 'jpg, gif, png',
                'maxSize' => 1024 * 1024 * 2, // 2MB
                'tooLarge' => '文件超过 2MB. 请上传小一点儿的文件.',
                'allowEmpty' => false,
                'on' => 'create'
            ),
            array('pic', 'file',
                'types' => 'jpg, gif, png',
                'maxSize' => 1024 * 1024 * 2, // 2MB
                'tooLarge' => '文件超过 2MB. 请上传小一点儿的文件.',
                'allowEmpty' => true,
                'on' => 'update'
            ),
            array('url', 'length', 'max' => 50),
            array('content', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, pic, url, sort_order', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => '标题',
            'pic' => '图片',
            'url' => 'Url地址',
            'theme' => '主题',
            'content' => '内容',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('pic', $this->pic, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('sort_order', $this->sort_order);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getImage()
    {
        $img_url = 'http://' . F::sg('site', 'imageDomain') . '/core/ad/' . $this->pic;
        return CHtml::image(F::baseUrl() . $img_url, $this->title, array('style' => 'width:600px;height:300px'));
    }

    public function getAd()
    {
        $ad = array(
            'image' => Yii::app()->request->hostInfo . Yii::app()->baseUrl . '/../../upload/ad/' . $this->pic,
            'label' => $this->title,
            'caption' => ''
        );
        return $ad;
    }


}