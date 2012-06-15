<?php

/**
 * This is the model class for table "{{content_category}}".
 *
 * The followings are the available columns in table '{{content_category}}':
 * @property integer $category_id
 * @property integer $parent_id
 * @property string $name
 */
class ContentCategory extends CActiveRecord {
    
    
    /**
     +------------------------------------------------
     * 生成树型结构所需要的2维数组
     +------------------------------------------------
     * @author yangyunzhou@foxmail.com
     +------------------------------------------------
     * @var Array
     */
    var $arr = array();
 
    /**
     +------------------------------------------------
     * 生成树型结构所需修饰符号，可以换成图片
     +------------------------------------------------
     * @author yangyunzhou@foxmail.com
     +------------------------------------------------
     * @var Array
     */
    var $icon = array('│','├',' └');
 
    /**
    * @access private
    */
    var $ret = '';

    /**
     * Returns the static model of the specified AR class.
     * @return ArticleCat the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{content_category}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('parent_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('category_id, parent_id, name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'parent' => array(self::BELONGS_TO, 'ContentCategory', 'parent_id'),
            'childs' => array(self::HAS_MANY, 'ContentCategory', 'parent_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'category_id' => 'ID',
            'parent_id' => '上一级',
            'name' => '分类',
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

        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
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
        if (!is_array($id)) {
            $id = array($id);
        }
        $id = implode(', ', $id);
        $models = ContentCategory::model()->findAll('parent_id in (' . $id . ')');
        if ($models) {
            foreach ($models as $model) {
                $ids[] = $model->category_id;
            }
            $ids = array_merge($ids, ContentCategory::getChildsId($ids));
            return $ids;
        } else {
            return $ids;
        }
    }

    /**
     * 获得指定id的所有后代，含指定id
     * @param mixed $id 指定id, 有可能是array
     * @return array 所有后代的和指定id的一维数组
     */
    function getMeChildsId($id) {
        if (!is_array($id)) {
            $id = array($id);
        }
        return array_merge($id, ContentCategory::getChildsId($id));
    }

    public function getListed() {
        $subitems = array();
        if ($this->childs)
            foreach ($this->childs as $child) {
                $subitems[] = $child->getListed();
            }
        $returnarray = array('label' => $this->name, 'url' => array('contentCategory/view', 'id' => $this->category_id));
        if ($subitems != array())
            $returnarray = array_merge($returnarray, array('items' => $subitems));
        return $returnarray;
    }
    
    /**
    * 得到子级数组
    * @param int
    * @return array
    */
    function get_child($myid)
    {
        $a = $newarr = array();
        if(is_array($this->arr))
        {
            foreach($this->arr as $id => $a)
            {
                if($a['parent_id'] == $myid) $newarr[$id] = $a;
            }
        }
        return $newarr ? $newarr : false;
    }
    
    /**
     +------------------------------------------------
     * 格式化数组
     +------------------------------------------------
     * @author yangyunzhou@foxmail.com
     +------------------------------------------------
     */
    function getArray($myid=0, $sid=0, $adds='')
    {
        $number=1;
        $child = $this->get_child($myid);
        if(is_array($child)) {
            $total = count($child);
            foreach($child as $id=>$a) {
                $j=$k='';
                if($number==$total) {
                    $j .= $this->icon[2];
                } else {
                    $j .= $this->icon[1];
                    $k = $adds ? $this->icon[0] : '';
                }
                $spacer = $adds ? $adds.$j : '';
                @extract($a);
                $a['name'] = $spacer.' '.$a['name'];
                $this->ret[$a['category_id']] = $a;
                $fd = $adds.$k.'&nbsp;';
                $this->getArray($id, $sid, $fd);
                $number++;
            }
        }
 
        return $this->ret;
    }
    
    function getJson()
    {
        $subitems = array();
        if ($this->childs)
            foreach ($this->childs as $child) {
                $subitems[] = $this->getJson();
            }
        $returnarray = array('id'=>$this->category_id, 'name'=>$this->name, 'order'=>'sort_order');
        if ($subitems != array())
            $returnarray = array_merge($returnarray, $subitems);
        
        $returnjson = CJSON::encode($returnarray);
        return $returnarray;
    }
    
    function getTree($node, &$returnArr) {

        $children = $node->childs;

        if (!empty($children))
            foreach ($children as $child) {
                $childArr =  array('id'=>$this->category_id, 'name'=>$this->name, 'order'=>'sort_order');
                $childArr['children'] = array();

                $returnArr[] = $childArr;

                self::getTree($child, $childArr['children']);
            }
        return;
    }
    
    function getMyJson(){
        $data=array();
        
        if ($this->childs)
            foreach ($this->childs as $child) {
//                $data[]=>array('p'=>$this->parent_id,'c'=>$this->name,'id'=>$this->category_id);
            }
echo CJSON::encode($data);
        
    }

}