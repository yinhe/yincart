<?php

/**
 * This is the model class for table "{{menu}}".
 *
 * The followings are the available columns in table '{{menu}}':
 * @property integer $menu_id
 * @property integer $parent_id
 * @property string $name
 * @property string $en_name
 * @property string $menu_url
 * @property string $sort_order
 */
class Menu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Menu the static model class
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
		return '{{menu}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, name', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('name, en_name, sort_order', 'length', 'max'=>50),
			array('menu_url', 'length', 'max'=>255),
                        array('type', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('menu_id, parent_id, name, en_name, menu_url, sort_order', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'Menu', 'parent_id'),
			'childs' => array(self::HAS_MANY, 'Menu', 'parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'menu_id' => '菜单ID',
			'parent_id' => '上一级',
			'name' => '菜单名字',
			'en_name' => '英文名字',
			'menu_url' => '菜单链接地址',
			'sort_order' => '排序',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function AdminMenuSearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $criteria->condition = "type = 'admin'";
                $criteria->order = 'sort_order asc, menu_id asc';

		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('en_name',$this->en_name,true);
		$criteria->compare('menu_url',$this->menu_url,true);
		$criteria->compare('sort_order',$this->sort_order,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function MainMenuSearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $criteria->condition = "type = 'middle'";
                $criteria->order = 'sort_order asc, menu_id asc';

		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('en_name',$this->en_name,true);
		$criteria->compare('menu_url',$this->menu_url,true);
		$criteria->compare('sort_order',$this->sort_order,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function BottomMenuSearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $criteria->condition = "type = 'bottom'";
                $criteria->order = 'sort_order asc, menu_id asc';

		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('en_name',$this->en_name,true);
		$criteria->compare('menu_url',$this->menu_url,true);
		$criteria->compare('sort_order',$this->sort_order,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
                /**
         * 获取指定id的所有后代，不含指定id
         * @param type $id 指定id, 有可能是array
         * @return type 所有后代id的一维数组
         */
        public static function getChildsId($id) {
            
		$data = array();
                $ids = array();
                if(!is_array($id)) { 
                    $id = array($id); 
                 }
                $id = implode(', ', $id);
                $models = Menu::model()->findAll('parent_id in (' . $id.')');
                if($models){
                foreach( $models as $model) {
                    $ids[] = $model->category_id;
                }
                $ids = array_merge($ids, Menu::getChildsId($ids));
                  return $ids;
                }else{
                  return $ids;  
                }
	}
        
        /**
        * 获得指定id的所有后代，含指定id
        * @param mixed $id 指定id, 有可能是array
        * @return array 所有后代的和指定id的一维数组
        */
        function getMeChildsId($id) {
        if(!is_array($id)) { $id = array($id); }
        return array_merge($id, Menu::getChildsId($id));
        }
        
        
        public  function getListed() {
		$subitems = array();
		if($this->childs) foreach($this->childs as $child) {
			$subitems[] = $child->getListed();
		}
                $url = $this->menu_url ? Yii::app()->request->baseUrl.'/'.$this->menu_url : '#';
                if(Yii::app()->language == 'en_us'){
		$returnarray = array('label' => $this->en_name, 'url'=>$url);
                }else{
                $returnarray = array('label' => $this->name, 'url'=>$url);    
                }
                
		if($subitems != array()) $returnarray = array_merge($returnarray, array('items' => $subitems));
		return $returnarray;
	}
        
        public  function getSingleListed() {
                $requestUri = Yii::app()->request->requestUri;
                
		$subitems = array();
                $url = $this->menu_url ? Yii::app()->request->baseUrl.'/'.$this->menu_url : '#';
                
                if(Yii::app()->language == 'en_us'){
		$returnarray = array('label' => $this->en_name, 'url'=>$url);
                }else{
                $returnarray = array('label' => $this->name, 'url'=>$url, 'linkOptions'=>$requestUri == $url ? array('class'=>'current') : '');    
                }
                
		if($subitems != array()) $returnarray = array_merge($returnarray, array('items' => $subitems));
		return $returnarray;
	}
}