<?php

/**
 * @property $id
 * @property $page_id
 * @property $menu_id
 * @property $root
 * @property $left
 * @property $right
 * @property $level
 * @property $title
 * @property $url
 * @property $module_url
 * @property $module_id
 * @property $is_active
 */
class MenuSection extends CActiveRecord {

        const PAGE_SIZE = 100;

        public $parentId = 0;
        public $url_info;

        public function name() {
	return 'Menu Section';
        }

        public static function model($className = __CLASS__) {
	return parent::model($className);
        }

        public function tableName() {
	return 'menu_sections';
        }

        public function rules() {
	return array(
	    array(
	        'menu_id, title, url, is_active',
	        'required'
	    ),
	    array('level, sort_order', 'numerical', 'integerOnly' => true),
	    array(
	        'title, url',
	        'length',
	        'max' => 200
	    ),
	    array(
	        'url_info, module_url',
	        'length',
	        'max' => 300
	    ),
	    array(
	        'module_id',
	        'length',
	        'max' => 64
	    ),
	    array(
	        'id, parentId, menu_id,  is_active',
	        'numerical',
	        'integerOnly' => true
	    ),
	);
        }

        public function relations() {
	return array(
	    'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
	    'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
	);
        }

        public function behaviors() {
	return CMap::mergeArray(parent::behaviors(), array(
	            'tree' => array(
		'class' => 'application.components.activeRecordBehaviors.NestedSetBehavior',
		'leftAttribute' => 'left',
		'rightAttribute' => 'right',
		'levelAttribute' => 'level',
		'hasManyRoots' => true,
	            )
	));
        }

        public function search($root) {
	$alias = $this->getTableAlias();

	$criteria = new CDbCriteria;
	$criteria->compare('id', $this->id, true);
	$criteria->compare('page_id', $this->page_id, true);

	// $criteria->compare('menu_id', $this->menu_id, true);   

	$criteria->compare('title', $this->title, true);
	$criteria->compare('url', $this->url, true);
	$criteria->compare('module_url', $this->module_url, true);
	$criteria->compare('module_id', $this->module_id, true);
	$criteria->compare('is_active', $this->is_active, true);

	if ($root > 0)
	        $criteria->addCondition($alias . '.root = ' . $root);

	$criteria->order = $this->tree->hasManyRoots ? '`' . $this->tree->rootAttribute . '`, `' . $this->tree->leftAttribute . '`' : '`' . $this->tree->leftAttribute . '`';


	return new CActiveDataProvider(get_class($this), array(
	    'criteria' => $criteria,
	    'pagination' => array(
	        'pageSize' => self::PAGE_SIZE
	    )
	));
        }

        public function getNbspTitle() {
	return str_repeat("&nbsp;", ($this->level - 2) * 5) . $this->title;
        }

        public function getSpaceTitle() {
	return str_repeat(' ', ($this->level - 1) * 4) . $this->title;
        }

        public static function getHtmlTree($root_id) {
	$models = self::model()->findByPk($root_id)->descendants()->findAll();

	$level = 0;
	$res = '';

	foreach ($models as $n => $item) {
	        if ($item->level == $level) {
		$res .= CHtml::closeTag('li') . "\n";
	        } else if ($item->level > $level) {
		$res .= CHtml::openTag('ul', array('class' => 'depth_' . $item->level)) . "\n";
	        } else {
		$res .= CHtml::closeTag('li') . "\n";

		for ($i = $level - $item->level; $i; $i--) {
		        $res .= CHtml::closeTag('ul') . "\n";
		        $res .= CHtml::closeTag('li') . "\n";
		}
	        }

	        $res .= CHtml::openTag('li', array(
		    'id' => 'items_' . $item->id,
		    'class' => 'depth_' . $item->level
	        ));
	        $res .= CHtml::tag('div', array(), CHtml::encode($item->title) . '<a class="drag icon-sortable"></a>');
	        $level = $item->level;
	}

	for ($i = $level; $i; $i--) {
	        $res .= CHtml::closeTag('li') . "\n";
	        $res .= CHtml::closeTag('ul') . "\n";
	}

	return $res;
        }

        public static function printULTree() {

	$criteria = new CDbCriteria();
	$criteria->order = "`root`,`left`";

	$categories = ProductCategories::model()->findAll($criteria);
	$level = 0;

	foreach ($categories as $n => $category) {

	        if ($category->level == $level)
		echo CHtml::closeTag('li') . "\n";
	        else if ($category->level > $level)
		echo CHtml::openTag('ul') . "\n";
	        else {
		echo CHtml::closeTag('li') . "\n";

		for ($i = $level - $category->level; $i; $i--) {
		        echo CHtml::closeTag('ul') . "\n";
		        echo CHtml::closeTag('li') . "\n";
		}
	        }

	        echo CHtml::openTag('li', array('id' => 'node_' . $category->id, 'rel' => $category->title));
	        echo CHtml::openTag('a', array('href' => '#'));
	        echo CHtml::encode($category->title);
	        echo CHtml::closeTag('a');

	        $level = $category->level;
	}

	for ($i = $level; $i; $i--) {
	        echo CHtml::closeTag('li') . "\n";
	        echo CHtml::closeTag('ul') . "\n";
	}
        }

        public static function printULTree_noAnchors() {

	$criteria = new CDbCriteria();
	$criteria->order = "`left`";

	$categories = ProductCategories::model()->findAll($criteria);
	$level = 0;

	foreach ($categories as $n => $category) {
	        if ($category->level == $level)
		echo CHtml::closeTag('li') . "\n";
	        else if ($category->level > $level)
		echo CHtml::openTag('ul') . "\n";
	        else {         //if $category->level<$level
		echo CHtml::closeTag('li') . "\n";

		for ($i = $level - $category->level; $i; $i--) {
		        echo CHtml::closeTag('ul') . "\n";
		        echo CHtml::closeTag('li') . "\n";
		}
	        }

	        echo CHtml::openTag('li');
	        echo CHtml::encode($category->title);
	        $level = $category->level;
	}

	for ($i = $level; $i; $i--) {
	        echo CHtml::closeTag('li') . "\n";
	        echo CHtml::closeTag('ul') . "\n";
	}
        }

        public static function getOption($rid = NULL) {
	$output = array();
	if (is_null($rid)) {
	        $categorys = self::model()->roots()->findAll();
	        foreach ($categorys as $n => $category) {
		$output[$category->id] = $category->title;
		$categories = $category->descendants()->findAll();
		foreach ($categories as $cat) {
		        $output[$cat->id] = str_repeat('-', $cat->level) . $cat->title;
		}
	        }
	} else {
	        $category = self::model()->findByPk($rid);
	        if (is_null($category))
		return array();
	        $output = array();
	        $output[$category->id] = $category->title;
	        $categories = $category->descendants()->findAll();
	        foreach ($categories as $cat) {
		$output[$cat->id] = str_repeat('-', $cat->level) . $cat->title;
	        }
	}
	return $output;
        }

        public static function get_tree($rid = NULL, $iconArr = array('┃ ', '┣━', '┗━')) {

	$output = array();
	if (is_null($rid)) {

	        $roots = self::model()->roots()->findAll();
	        foreach ($roots as $category) {
		$number = $category->level;

		$output[] = array("id" => $category->id, "root_id" => $category->root, "parentid" => 0, "menu_id" => $category->menu_id, "page_id" => $category->page_id, "title" => $category->title, "spacer" => "", "url" => $category->url, "module_url" => $category->module_url, "module_id" => $category->module_id, "sort_order" => $category->sort_order, "is_active" => $category->is_active);

		$categories = $category->descendants()->findAll();
		foreach ($categories as $cat) {

		        $key = ''; //分隔符 前置分隔符

		        if ($number == $cat->level) {
			$key .= $iconArr[1];
		        } else {
			$key .= $iconArr[2];
		        }

		        $pa = $cat->parent()->find();
		        // print_r($cat->attributes);
		        // print_r($pa->attributes);

		        $icon = $key . str_repeat('-', $cat->level - 1);
		        $output[] = array("id" => $cat->id, "root_id" => $cat->root, "parentid" => $pa->id, "menu_id" => $cat->menu_id, "page_id" => $cat->page_id, "title" => $cat->title, "spacer" => $icon, "url" => $cat->url, "module_url" => $cat->module_url, "module_id" => $cat->module_id, "sort_order" => $cat->sort_order, "is_active" => $cat->is_active);

		        $number = ($cat->level > $number) ? $cat->level : $number;
		}
	        }
	} else {
	        $category = self::model()->findByPk($rid);
	        $pa = $category->parent()->find();
	        if (is_null($category))
		return array();
	        $output = array();
	        $output[] = array("id" => $category->id, "root_id" => $category->root, "parentid" => $pa->id, "menu_id" => $category->menu_id, "page_id" => $category->page_id, "title" => $category->title, "spacer" => "", "url" => $category->url, "module_url" => $category->module_url, "module_id" => $category->module_id, "sort_order" => $category->sort_order, "is_active" => $category->is_active);
	        $number = $category->level;
	        $categories = $category->descendants()->findAll();

	        foreach ($categories as $cat) {

		$key = ''; //分隔符 前置分隔符

		if ($number == $cat->level) {
		        $key .= $iconArr[1];
		} else {
		        $key .= $iconArr[2];
		}
		$pa = $cat->parent()->find();
		$icon = $key . str_repeat('-', $cat->level - 1);
		$output[] = array("id" => $cat->id, "root_id" => $cat->root, "parentid" => $pa->id, "menu_id" => $cat->menu_id, "page_id" => $cat->page_id, "title" => $cat->title, "spacer" => $icon, "url" => $cat->url, "module_url" => $cat->module_url, "module_id" => $cat->module_id, "sort_order" => $cat->sort_order, "is_active" => $cat->is_active);

		$number = ($cat->level > $number) ? $cat->level : $number;
	        }
	}
	return $output;
        }

        public function getTreeRecursive($route = "#", $cid = "id") {

	$tree = array();

	$criteria = new CDbCriteria;
	$criteria->order = '`root`, `left`';
	$criteria->condition = '`level` = 1';
	$categories = self::model()->findAll($criteria);

	foreach ($categories as $n => $category) {

	        $url = ($route == "#") ? "#" : array($route, $cid => $category->id);
	        $category_r = array(
	            'label' => $category->title,
	            'url' => $url,
	            'itemOptions' => array('class' => 'topNav'),
	            'template' => '<i class="icon-list ca-icon"></i> {menu}',
	            'submenuOptions' => array('class' => 'subNav'),
	            'level' => $category->level,
	        );
	        $tree[$n] = $category_r;

	        $children = $category->children()->findAll();
	        if ($children)
		$tree[$n]['items'] = $this->getChildren($children, $route, $cid);
	}
	return $tree;
        }

        private function getChildren($children, $route = "#", $cid = "id") {
	$result = array();
	foreach ($children as $i => $child) {

	        $url = ($route == "#") ? "#" : array($route, $cid => $child->id);

	        $category_r = array(
	            'label' => $child->title,
	            'template' => '<i class="icon-double-angle-right ca-icon"></i> {menu}',
	            'url' => $url,
	        );
	        $result[$i] = $category_r;
	        $new_children = $child->children()->findAll();
	        if ($new_children) {
		$result[$i]['items'] = $this->getChildren($new_children);
	        }
	}
	return $result_items = $result;
        }

        protected function formatJstree() {
	$categories = $this->descendants()->findAll();
	$level = 0;
	$parent = 0;
	$data = array();
	foreach ($categories as $n => $category) {
	        $node = array(
	            'data' => "{$category->title}",
	            'attr' => array('id' => "category_id_{$category->id}")
	        );
	        if ($category->level == $level) {
		$data[$parent]["children"][] = $node;
	        } else if ($level != 0 && $category->level > $level) {
		if (!isset($data[$n]["children"])) {
		        $data[$n]["children"] = array();
		}
		$data[$parent]["children"][] = $node;
	        } else {
		$data[] = $node;
		$parent = $n;
	        }
	        $level = $category->level;
	}
	return $data;
        }

}