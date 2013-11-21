<?php

class ItemController extends Controller
{

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/mall';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            array('auth.filters.AuthFilter'),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * actionUpload
     *
     * @access public
     * @return void
     */
    public function actionUpload($token)
    {
        Yii::import("xupload.models.XUploadForm");
        //Here we define the paths where the files will be stored temporarily
        $path = realpath(Yii::app()->getBasePath() . "/../upload/store") . "/0/";
        $publicPath = 'http://' . F::sg('site', 'imageDomain') . "/store/0/";

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $ymd = date("Ymd");
        $path .= $ymd . '/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        //This is for IE which doens't handle 'Content-type: application/json' correctly
        header('Vary: Accept');
        if (isset($_SERVER['HTTP_ACCEPT']) && (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
            header('Content-type: application/json');
        } else {
            header('Content-type: text/plain');
        }

        //Here we check if we are deleting and uploaded file
        if (isset($_GET["_method"])) {
            if ($_GET["_method"] == "delete") {
                if ($_GET["file"][0] !== '.') {
                    $file = $path . $_GET["file"];
                    if (is_file($file)) {
                        unlink($file);
                    }
                }
                echo json_encode(true);
            }
        } else {
            $model = new XUploadForm;
            $model->file = CUploadedFile::getInstance($model, 'file');
            //We check that the file was successfully uploaded
            if ($model->file !== null) {
                $file_array = array('jpg', 'png', 'gif');
                if (!in_array($model->file->getExtensionName(), $file_array)) {
//                    header('HTTP/1.1 status 400 acceptFileTypes');
                    echo json_encode(array(
                        array("error" => 'acceptFileTypes'),
                    ));
                    return;
                }
                //Grab some data
                $model->mime_type = $model->file->getType();
                $model->size = $model->file->getSize();
                $model->name = $model->file->getName();
                //(optional) Generate a random name for our file

                $filename = date("YmdHis") . '_' . rand(10000, 99999);
                $filename .= "." . $model->file->getExtensionName();
                //$filename =  $ymd . '/' . $filename;

                if ($model->validate()) {
                    //Move our file to our temporary dir
                    $model->file->saveAs($path . $filename);
                    chmod($path . $filename, 0777);
                    //here you can also generate the image versions you need
                    //using something like PHPThumb
                    //Now we need to save this path to the user's session

                    $userImages = Yii::app()->cache->get('images_' . $token);

                    $userImages = $userImages ? $userImages : array();

                    $userImages[] = array(
                        "path" => $path . $filename,
                        //the same file or a thumb version that you generated
                        "thumb" => $path . $filename,
                        "filename" => $filename,
                        "url" => $ymd . '/' . $filename,
                        'size' => $model->size,
                        'mime' => $model->mime_type,
                        'name' => $model->name,
                    );
                    Yii::app()->cache->set('images_' . $token, $userImages, 60 * 60 * 2);

                    //Now we need to tell our widget that the upload was succesfull
                    //We do so, using the json structure defined in
                    //https://github.com/blueimp/jQuery-File-Upload/wiki/Setup
                    echo json_encode(array(array(
                        "name" => $model->name,
                        "type" => $model->mime_type,
                        "size" => $model->size,
                        "url" => $publicPath . $ymd . '/' . $filename,
                        "thumbnail_url" => $publicPath . $ymd . '/' . "$filename",
                        "delete_url" => $this->createUrl("upload", array(
                                "_method" => "delete",
                                "file" => $filename
                            )),
                        "delete_type" => "POST"
                    )));
                } else {
                    //If the upload failed for some reason we log some data and let the widget know
                    echo json_encode(array(
                        array("error" => $model->getErrors('file'),
                        )));
                    Yii::log("XUploadAction: " . CVarDumper::dumpAsString($model->getErrors()), CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction"
                    );
                }
            } else {
                throw new CHttpException(500, "Could not upload file");
            }
        }
    }

    public function actionDelPicture()
    {
        $model = ProductPictures::model()->findByAttributes(array('img_id' => $_POST['img_id'], 'store_id' => 0));
        if ($model)
            $model->delete();
    }

    /**
     * actionItemImgDel
     *
     * @access public
     * @return void
     */
    public function actionItemImgDel()
    {
        $rs = array(
            'status' => 0,
            'msg' => '',
            'data' => array(),
        );

        if (!empty($_GET['img_id'])) {
            $model = ItemImg::model()->find('img_id = :img_id', array(':img_id' => $_GET['img_id']));
            if (!empty($model)) {
                if ($model->delete()) {
                    $path = Yii::getPathOfAlias("root") . '/upload/item/image/' . $model->url;
                    @unlink($path);

                    //对其它图片进行重新排序
                    if (!empty($model->item_id)) {
                        $criteria = new CDbCriteria;
                        $criteria->compare('t.item_id', $model->item_id);
                        $criteria->order = 'position DESC';
                        $models = ItemImg::model()->findAll($criteria);

                        foreach ($models as $k1 => $v1) {
                            $model->position = $k1;
                            $model->save();
                        }
                    }

                    $rs = array(
                        'status' => 1,
                        'msg' => '',
                        'data' => array(),
                    );
                }
            } else {
                $rs['msg'] = '数据不存在';
            }
        }

        echo YcStringHelper::jsonEncode($rs);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        Yii::import("xupload.models.XUploadForm");
        $upload = new XUploadForm;
        $model = new Item('create');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $action = 'item';
        if (isset($_POST['Item'])) {
            $model->attributes = $_POST['Item'];
            $model->sn = 'YC' . date('Ymd') . mt_rand(10000, 99999);
            if ($_POST['Item']['props']) {
                foreach ($_POST['Item']['props'] as $key => $value) {
                    $p = ItemProp::model()->findByPk($key);

                    if ($p->type == 'multiCheck') {
                        $values = implode($value, ',');
                        $p_arr[] = $key . ':' . $values;
                        foreach ($value as $kk => $vv) {
                            $v = PropValue::model()->findByPk($vv);
                            $value_name[] = $v->value_name;
                        }
                        $value_names = implode($value_name, ',');
                        $v_arr[] = $p->prop_name . ':' . $value_names;
                    } elseif ($p->type == 'optional') {
                        $p_arr[] = $key . ':' . $value;
                        $v = PropValue::model()->findByPk($value);
                        $v_arr[] = $p->prop_name . ':' . $v->value_name;
                    } elseif ($p->type == 'input') {
                        //如果是文本框输入的话 不纳入搜索
                        //也就不纳入到props里 只保存到prop_names里
                        $p_arr[] = $key . ':' . $value;
                        $v_arr[] = $p->prop_name . ':' . $value;
                    }
                }
                $props = implode($p_arr, ';');
                $model->props = $props;
                $props_name = implode($v_arr, ';');
                $model->props_name = $props_name;
            }
            if ($model->save()) {
                if (isset($_POST['ItemImg']) && count($_POST['ItemImg'])) {
                    foreach ($_POST['ItemImg'] as $k1 => $v1) {
                        $modelTmp = ItemImg::model()->find('img_id = :img_id', array(':img_id' => $v1));
                        $modelTmp->item_id = $model->item_id;
                        $modelTmp->position = $k1;
                        $modelTmp->save();
                    }
                }
                $this->redirect(array('view', 'id' => $model->item_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'upload' => $upload,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        Yii::import("xupload.models.XUploadForm");
        $upload = new XUploadForm;
        $model = $this->loadModel($id);

        $model->scenario = 'update';
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $action = 'item';
        if (isset($_POST['Item'])) {
            $model->attributes = $_POST['Item'];

            if ($_POST['Item']['props']) {
                foreach ($_POST['Item']['props'] as $key => $value) {
                    $p = ItemProp::model()->findByPk($key);

                    if ($p->type == 'multiCheck') {
                        $values = implode($value, ',');
                        $p_arr[] = $key . ':' . $values;
                        foreach ($value as $kk => $vv) {
                            $v = PropValue::model()->findByPk($vv);
                            $value_name[] = $v->value_name;
                        }
                        $value_names = implode($value_name, ',');
                        $v_arr[] = $p->prop_name . ':' . $value_names;
                    } elseif ($p->type == 'optional') {
                        $p_arr[] = $key . ':' . $value;
                        $v = PropValue::model()->findByPk($value);
                        $v_arr[] = $p->prop_name . ':' . $v->value_name;
                    } elseif ($p->type == 'input') {
                        //如果是文本框输入的话 不纳入搜索
                        //也就不纳入到props里 只保存到prop_names里
                        $p_arr[] = $key . ':' . $value;
                        $v_arr[] = $p->prop_name . ':' . $value;
                    }
                }
                $props = implode($p_arr, ';');
                $model->props = $props;
                $props_name = implode($v_arr, ';');
                $model->props_name = $props_name;
            }
            if ($model->save()) {
                if (isset($_POST['ItemImg']) && count($_POST['ItemImg'])) {
                    foreach ($_POST['ItemImg'] as $k1 => $v1) {
                        $model = ItemImg::model()->find('img_id = :img_id', array(':img_id' => $v1));
                        $model->position = $k1;
                        $model->save();
                    }
                }
                $this->redirect(array('view', 'id' => $model->item_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'upload' => $upload,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $model = $this->loadModel($id);
            $images = ItemImg::model()->findAllByAttributes(array('item_id' => $id));
            foreach ($images as $k => $v) {
                $img = $v['url'];
// we only allow deletion via POST request
                ItemImg::model()->deleteAllByAttributes(array('item_id' => $id));
                @unlink(dirname(Yii::app()->basePath) . '/upload/item/image/' . $img);
            }
            $model->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Item');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Item('search');
        $model->unsetAttributes(); // clear any default values
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
    public function loadModel($id)
    {
        $model = Item::model()->with(array('image' => array('order' => 'position ASC')))->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'item-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

//批量操作
    public function actionBulk()
    {
//        print_r($_POST);

        $ids = $_POST['item-grid_c0'];
//        print_r($ids);
//        exit;
        $count = count($ids);
        if ($count == 0) {
            echo '<script>alert("请至少选择1个项目.")</script>';
            echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
            die;
        } elseif ($count > 0 && NULL == $_POST['act']) {
            echo '<script>alert("请选择操作类型.")</script>';
            echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
            die;
        } else {
            if ('delete' == $_POST['act']) { //批量删除
                if ($count == 1) {
                    $item = Item::model()->findByPk($ids);
                    $images = ItemImg::model()->findAllByAttributes(array('item_id' => $item->item_id));
                    foreach ($images as $k => $v) {
                        $img = $v['url'];
// we only allow deletion via POST request
                        ItemImg::model()->deleteAllByAttributes(array('item_id' => $item->item_id));
                        @unlink(dirname(Yii::app()->basePath) . '/upload/item/image/' . $img);
                    }

                    Item::model()->deleteByPk($ids);
                    echo '<script>alert("删除成功.")</script>';
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $item = Item::model()->findAllByPk($ids);
                    foreach ($item as $i) {
                        $images = ItemImg::model()->findAllByAttributes(array('item_id' => $i->item_id));
                        foreach ($images as $k => $v) {
                            $img = $v['url'];
// we only allow deletion via POST request
                            ItemImg::model()->deleteAllByAttributes(array('item_id' => $i->item_id));
                            @unlink(dirname(Yii::app()->basePath) . '/upload/item/image/' . $img);
                        }
                    }
                    Item::model()->deleteAllByAttributes(array('item_id' => $ids));
                    echo '<script>alert("删除成功.")</script>';
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('if_show' == $_POST['act']) { //批量上架
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_show" => 1));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_show" => 1), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('un_show' == $_POST['act']) { //批量下架
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_show" => 0));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_show" => 0), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('is_promote' == $_POST['act']) { //批量特价
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_promote" => 1));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_promote" => 1), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('un_promote' == $_POST['act']) { //取消特价
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_promote" => 0));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_promote" => 0), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('is_new' == $_POST['act']) { //批量新品
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_new" => 1));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_new" => 1), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('un_new' == $_POST['act']) { //取消新品
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_new" => 0));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_new" => 0), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('hot' == $_POST['act']) { //批量推荐
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_hot" => 1));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_hot" => 1), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('un_hot' == $_POST['act']) { //取消推荐
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_hot" => 0));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_hot" => 0), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('best' == $_POST['act']) { //批量精品
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_best" => 1));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_best" => 1), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('un_best' == $_POST['act']) { //取消精品
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_best" => 0));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_best" => 0), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('discount' == $_POST['act']) { //批量折扣
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_discount" => 1));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_discount" => 1), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('un_discount' == $_POST['act']) { //取消折扣
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_discount" => 0));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_discount" => 0), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            }
        }
    }

    /**
     * ajax 成功后一般返回json数据
     * 然后jquery读取出来
     * 在写个function, 转为html
     */
    public function actionGetPropValues()
    {
        $category_id = $_POST['category_id'] ? $_POST['category_id'] : NULL;
        $item_id = $_POST['item_id'] ? $_POST['item_id'] : NULL;
        $item = Item::model()->findByPk($item_id);
        $props_arr = CJSON::decode($item->props, TRUE);
        $skus_arr = CJSON::decode($item->skus, TRUE);
//	$props_arr = explode(';', $props_list->props);
//	foreach ($props_arr as $k => $v) {
//	    $arr[] = explode(':', $v);
//	    if(is_array($arr)){
//
//	    }
//	}
//	foreach ($newarr as $k => $v) {
//	    $v_arr = explode(',', $v[1]);
//	    $arr[$v[0]] = $v_arr;
//	}
//        $arr = array('3'=>'106', '1'=>'78', '2'=>'82');
//	关键属性
        $cri = new CDbCriteria(array('condition' => 'is_key_prop=1 and category_id =' . $category_id));
        $props = ItemProp::model()->findAll($cri);
        foreach ($props as $p) {
            echo '<div class="row">';
            if ($p->must == 1) {
                echo '<label class="span2 control-label" for="">' . $p->prop_name . '<span class="required">*</span></label>';
            } else {
                echo '<label class="span2 control-label" for="">' . $p->prop_name . '</label>';
            }
            echo '<div class="span10">';
            if ($p->type == 'input') {
                echo $p->getPropTextFieldValues($p->prop_name, $props_arr[$p->prop_id]);
            } elseif ($p->type == 'optional') {
                echo $p->getPropOptionValues($p->prop_name, $props_arr[$p->prop_id]);
            } elseif ($p->type == 'multiCheck') {
                echo $p->getPropCheckBoxListValues($p->prop_name, $props_arr[$p->prop_id]);
            }
            echo '</div>';
            echo '</div>';
        }

//	非关键属性

        $cri = new CDbCriteria(array(
            'condition' => 'is_key_prop=0 and is_sale_prop=0 and category_id =' . $category_id,
        ));
        $props = ItemProp::model()->findAll($cri);

        foreach ($props as $p) {
            echo '<div class="row">';
            if ($p->must == 1) {
                echo '<label class="span2 control-label" for="">' . $p->prop_name . '<span class="required">*</span></label>';
            } else {
                echo '<label class="span2 control-label" for="">' . $p->prop_name . '</label>';
            }
            echo '<div class="span9">';
            if ($p->type == 'input') {
                echo $p->getPropTextFieldValues($p->prop_name, $props_arr[$p->prop_id][0]);
            } elseif ($p->type == 'optional') {
                echo $p->getPropOptionValues($p->prop_name, $props_arr[$p->prop_id]);
            } elseif ($p->type == 'multiCheck') {
                echo $p->getPropCheckBoxListValues($p->prop_name, $props_arr[$p->prop_id]);
            }
            echo '</div>';
            echo '</div>';
        }

        //销售属性
        $cri = new CDbCriteria(array(
            'condition' => 'is_sale_prop=1 and category_id =' . $category_id,
        ));
        $props = ItemProp::model()->findAll($cri);

        if ($props) {
            echo '<div class="row">';
            echo '<label class="span2 control-label" for="">商品规格</label>';
            echo '<div class="span9">';
            echo '<div class="sku-wrap">';
            $ii = 0;
            foreach ($props as $p) {

                echo '<div class="sku-group"><label class="sku-head">' . $p->prop_name . '</label>';
                echo '<div class="sku-box  sku-color">';
                if ($p->type == 'multiCheck') {
                    echo $p->getPropCheckBoxListValues($p->prop_name, $skus_arr['checkbox'][$p->prop_id], 'change', 'skus', 'checkbox');
                }

                $thead .= '<th> <span id="thop_' . $ii . '">' . $p->prop_name . '</span></th>';
                $ii++;
                echo '</div></div>';
            }

            echo '<p id="output"></p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo <<<EOF
	    <div class="row" style='margin-bottom:10px' style="visibility:hidden">
	    <div class="span2">&nbsp;</div>
	    <div class="span9" style="padding-left:0">
	    <div class="sku-map">
	    <table id="sku" class="table table-bordered">
	    <thead>
	    <tr>
		{$thead}
		<th>价格</th><th>数量</th><th>商家编码</th><th>操作</th></tr>
	    </thead>
	    <tbody>
	    </tbody>
	    </table>
	    </div>
	</div>
    </div>
EOF;
        }
    }

    public function actionAjaxGetSkus()
    {

        if (!Yii::app()->request->isAjaxRequest) {
            exit();
        }

        $id = $_POST["item_id"];
        $skus = Sku::getSkusData($id);

        echo CJSON::encode($skus, true);

        Yii::app()->end();
    }
}
