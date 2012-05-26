<?php

class ItemController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $parent;

    function init() {
        parent::init();
        //上一级 可支持无限级 分类
        //上一级 可支持无限级 分类
        $data = Category::model()->findAll(array('order' => 'sort_order asc, category_id asc'));
        $parent = CHtml::tag('option', array('value' => 0), '请选择分类');
        $this->parent = $parent . F::toTree($data, $model->category_id, 'category_id', 'parent_id', 'category_name', 1);
    }

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Item;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Item'])) {
            $model->attributes = $_POST['Item'];
            $model->item_sn = $_POST['Item']['item_sn'] == '' ? time() : $_POST['Item']['item_sn'];
            $img = CUploadedFile::getInstance($model, 'item_image');
            if ($img) {
                if ($img->size > 2000000) {
                    $img_size = ($img->size) / 1000;
                    echo '<script>alert("图片大小为' . $img_size . 'KB,请小于2M")</script>';
                } else {
                    $extensionName = explode('.', $img->getName());
                    $extensionName = $extensionName[count($extensionName) - 1];

                    $day_file = date('Y-m-d', time());
                    $path = dirname(Yii::app()->basePath) . '/upload/item';
                    F::do_mkdir($day_file, $path);
                    $time_path = date('Y', time()) . '/' . date('m', time()) . '/' . date('d', time()) . '/';
                    $dir = dirname(Yii::app()->basePath) . '/upload/item/' . $time_path;
                    $img_src = $dir . md5(time()) . '.' . $extensionName;
                    $img1 = md5(time()) . '.' . $extensionName;
                    $model->item_image = $time_path . $img1;
                }
            } else {
                echo '<script>alert("请上传图片.")</script>';
            }

            if ($model->save()) {
                $img->saveAs($img_src);
                $this->redirect(array('admin'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Item'])) {
            $model->attributes = $_POST['Item'];
            $item = Item::model()->findByPk($id);
            $img = $_FILES['Item']['name']['item_image'];
            if ($img !== '') {
                $img = CUploadedFile::getInstance($model, 'item_image');
                $extensionName = explode('.', $img->getName());
                $extensionName = $extensionName[count($extensionName) - 1];

                $day_file = date('Y-m-d', time());
                $path = dirname(Yii::app()->basePath) . '/upload/item';
                F::do_mkdir($day_file, $path);
                $time_path = date('Y', time()) . '/' . date('m', time()) . '/' . date('d', time()) . '/';
                $dir = dirname(Yii::app()->basePath) . '/upload/item/' . $time_path;
                $img_src = $dir . md5(time()) . '.' . $extensionName;
                $img1 = md5(time()) . '.' . $extensionName;
                $model->item_image = $time_path . $img1;
            } else {
                $model->item_image = $item->item_image;
            }

            if ($model->save()) {
                if ($img !== '') {
                    @unlink(dirname(Yii::app()->basePath) . '/upload/item/' . $item->item_image);
                    $img->saveAs($img_src);
                }
                $this->redirect(array('admin'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Item');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Item('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Item']))
            $model->attributes = $_GET['Item'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Item::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'item-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
