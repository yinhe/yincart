<?php

class MenuSectionAdminController extends SAdminController {

        public function actionIndex() {

	$iconArr = array('│ ', '├─ ', '└─ ');

	$rawData = MenuSection::get_tree(NULL, $iconArr);
	//print_r( $rawData);	
	$dataProvider = new CArrayDataProvider($rawData, array(
	    'pagination' => array(
	        'pageSize' => 100
	    ),
	    'keyField' => 'id', // PRIMARY KEY attribute of $list member objects
	    'id' => 'dtd'      // ID of the data provider itself
	        )
	);

	$this->render('index', array(
	    'dataProvider' => $dataProvider,
	));
        }

        public function loadModel($id) {
	$model = MenuSection::model()->findByPk($id);
	if ($model === null)
	        $this->pageNotFound();
	return $model;
        }

        public function loadMenuModel($menu_id) {
	$menu = Menu::model()->findByPk((int) $menu_id);
	if (!$menu) {
	        show_404();
	}
	return $menu;
        }

        public function actionUpdate($id) {
	$model = $this->loadModel($id);

	if ($model->parent()->find() === null)
	        $model->parentId = null;
	else
	        $model->parentId = $model->parent()->find()->id;


	$form = new BaseForm('content.MenuSectionForm', $model);
	$this->performAjaxValidation($model);

	if ($form->submitted('submit')) {

	        if ($model->saveNode(false)) {
		Yii::app()->user->setFlash('success', t("Update sucessfully!"));
	        } else {

		Yii::app()->user->setFlash('warning', t("Failed to update!"));
	        }

	        $this->redirect($this->createUrl("index", array('menu_id' => $model->menu_id)));
	}

	$this->render('update', array(
	    'model' => $model,
	    'form' => $form
	));
        }

        public function actionCreate() {


	$menu_id = isset($_GET['menu_id']) ? (int) $_GET['menu_id'] : 0;
	$root_id = isset($_GET['root_id']) ? (int) $_GET['root_id'] : 0;

	$menu = $this->loadMenuModel($menu_id);

	/* $criteria = new CDbCriteria();
	  $criteria->compare('menu_id', $menu->id);
	 */
	$model = new MenuSection();
	$model->menu_id = $menu->id;
	$model->root = $root_id;


	$form = new BaseForm('content.MenuSectionForm', $model);

	// $this->performAjaxValidation($model);

	if ($form->submitted('submit') && $model->validate()) {
	        print_r($_POST);

	        if ($model->parentId == 0) {
		$model->saveNode();
	        } else {

		$parent = MenuSection::model()->findByPk($model->parentId);
		$model->appendTo($parent);
	        }

	        $this->redirect(array("index",
	            'menu_id' => $menu_id
	        ));
	}

	$this->render('create', array(
	    'model' => $model,
	    'menu' => $menu,
	    'form' => $form,
	));
        }

        public function actionCreateSub() {

	$menu_id = isset($_GET['menu_id']) ? (int) $_GET['menu_id'] : 0;
	$root_id = isset($_GET['root_id']) ? (int) $_GET['root_id'] : 0;
	$father_id = isset($_GET['father_id']) ? (int) $_GET['father_id'] : 0;
	$menu = $this->loadMenuModel($menu_id);

	/* $criteria = new CDbCriteria();
	  $criteria->compare('menu_id', $menu->id);
	 */
	$model = new MenuSection();
	$model->menu_id = $menu->id;
	$model->root = $root_id;
	$model->parentId = (int) $father_id;


	$form = new BaseForm('content.MenuSectionForm', $model);

	// $this->performAjaxValidation($model);

	if ($form->submitted('submit') && $model->validate()) {

	        if ($model->parentId == 0) {
		$model->saveNode();
	        } else {

		$parent = MenuSection::model()->findByPk($model->parentId);
		$model->appendTo($parent);
	        }

	        $this->redirect(array("index",
	            'menu_id' => $menu_id
	        ));
	}

	$this->render('create', array(
	    'model' => $model,
	    'menu' => $menu,
	    'form' => $form,
	));
        }

        public function actionView($menu_id) {
	$model = MenuSection::model();

	$links = $model->findAllByAttributes(array('menu_id' => $menu_id));

	$this->render('view', array(
	    'links' => $links,
	    'meta' => $model->meta()
	));
        }

        public function actionDelete($id) {
	$this->loadModel($id)->deleteNode();
        }

        public function actionAjaxEdit() {

	if (!Yii::app()->request->isAjaxRequest) {
	        exit();
	}


	$id = intval($_POST["pk"]);
	$name = $_POST["name"];
	$value = $_POST["value"];

	$model = $this->loadModel($id);
	$model->detachBehavior('tree');

	$model->$name = $value;

	$model->save();

	Yii::app()->end();
        }

}
