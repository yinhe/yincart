<?php

class ItemController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/mall';

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
                'actions' => array('create', 'update', 'getPropValues', 'bulk'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'getPropValues', 'bulk', 'upload', 'itemImgDel'),
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
     * actionUpload 
     * 
     * @access public
     * @return void
     */
	public function actionUpload()
    {
        $rs = array(
			'status' => 0,
            'msg' => '',
            'data' => array(),
        );
		//ini_set('post_max_size','1024M');  
        //ini_set('upload_max_filesize','1024M');
        //set_time_limit(0);
		
        if (is_array($_FILES) && count($_FILES))
        {
            foreach ($_FILES as $k1 => $v1)
            {
                if ($v1['error'] == 0)
                {
                    $ext = '';
                    if(($pos=strrpos($v1['name'], '.'))!==false)
                    {
                        $ext = strtolower((string)substr($v1['name'], $pos+1));
                    }
                    
                    $path = 'upload/item/image/'.date("Ymd");
                    YcFileHelper::mkdir($path);
                    $data = $path . '/' . date('YmdHis', time()).'_'.md5(YcStringHelper::randString()) . '.' . $ext;
                    $mv = move_uploaded_file($v1['tmp_name'], Yii::getPathOfAlias("root") . '/' . $data);
                    if ($mv)
					{
						$index = 0; 
						if (!empty($_POST['item_id']))
						{
							//找到最大排序的图片
							$criteria = new CDbCriteria;
							$criteria->compare('item_id', $_POST['item_id']);
							$criteria->order = 'position DESC';
							$itemImgTmp = ItemImg::model()->find($criteria);
							if (!empty($itemImgTmp))
							{
								$index = $itemImgTmp->position+1;
							}
						}

                        $itemImg = new ItemImg;
                        $itemImg->item_id = empty($_POST['item_id']) ? '' : $_POST['item_id'];
                        $itemImg->url = $data;
                        $itemImg->position = $index;
                        $itemImg->create_time = time();

                        if ($itemImg->save())
                        {
                            $rs = array(
                                'status' => 1,
                                'msg' => '',
                                'data' => array(
                                    'img_id' => $itemImg->img_id,
                                    'url' => YcImageHelper::getImageUrl($data),
                                ),
                            );
                        }
                    }
                    else
                    {
                        $rs['msg'] = '保存文件时出错';
                    }
                }
            }
        }

        echo YcStringHelper::jsonEncode($rs);
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

        if (!empty($_GET['img_id']))
        {
            $model = ItemImg::model()->find('img_id = :img_id', array(':img_id'=>$_GET['img_id']));
            if (!empty($model))
            {
                if ($model->delete())
                {
                    $path = Yii::getPathOfAlias("root") . '/' . $model->url;
					@unlink($path);

					//对其它图片进行重新排序
					if (!empty($model->item_id))
					{
						$criteria = new CDbCriteria;
						$criteria->compare('t.item_id', $model->item_id);
						$criteria->order = 'position DESC';
						$models = ItemImg::model()->findAll($criteria);

						foreach ($models as $k1 => $v1)
						{
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
            }
            else
            {
                $rs['msg'] = '数据不存在';
            }
        }

        echo YcStringHelper::jsonEncode($rs);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
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
					foreach ($_POST['ItemImg'] as $k1 => $v1)
					{
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
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
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
					foreach ($_POST['ItemImg'] as $k1 => $v1)
					{
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
        $model = Item::model()->with(array('image'=>array('order'=>'position ASC')))->findByPk($id);
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

//批量操作
    public function actionBulk() {
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
            if ('delete' == $_POST['act']) {//批量删除
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
            } elseif ('if_show' == $_POST['act']) {//批量上架
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
            } elseif ('un_show' == $_POST['act']) {//批量下架
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
            } elseif ('is_promote' == $_POST['act']) {//批量特价
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
            } elseif ('un_promote' == $_POST['act']) {//取消特价
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
            } elseif ('is_new' == $_POST['act']) {//批量新品
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
            } elseif ('un_new' == $_POST['act']) {//取消新品
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
            } elseif ('hot' == $_POST['act']) {//批量推荐
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
            } elseif ('un_hot' == $_POST['act']) {//取消推荐
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
            } elseif ('best' == $_POST['act']) {//批量精品
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
            } elseif ('un_best' == $_POST['act']) {//取消精品
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
            } elseif ('discount' == $_POST['act']) {//批量折扣
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
            } elseif ('un_discount' == $_POST['act']) {//取消折扣
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
    public function actionGetPropValues() {
        $type_id = $_POST['type_id'] ? $_POST['type_id'] : NULL;
        $item_id = $_POST['item_id'] ? $_POST['item_id'] : NULL;
        $props_list = Item::model()->findByPk($item_id);
        $props_arr = explode(';', $props_list->props);
        foreach ($props_arr as $k => $v) {
            $newarr[] = explode(':', $v);
        }
        foreach ($newarr as $k => $v) {
                $v_arr = explode(',', $v[1]);
                $arr[$v[0]] = $v_arr;
        }
//        $arr = array('3'=>'106', '1'=>'78', '2'=>'82');
//        echo '<h5>关键属性</h5>';
        $cri = new CDbCriteria(array('condition' => 'is_key_prop=1 and type_id =' . $type_id));
        $props = ItemProp::model()->findAll($cri);
        foreach ($props as $p) {
            echo "<div class=\"control-group \">";
            echo "<label class=\"control-label\">" . $p->prop_name . "</label><div class=\"controls\">";
            echo $p->getPropOptionValues($p->prop_name, $arr[$p->prop_id]);
            echo '</div></div>';
        }
//        echo '<h5>销售属性</h5>';
        $cri = new CDbCriteria(array(
            'condition' => 'is_sale_prop=1 and type_id =' . $type_id,
        ));
        $props = ItemProp::model()->findAll($cri);
        foreach ($props as $p) {
            echo "<div class=\"control-group \">";
            echo "<label class=\"control-label\">" . $p->prop_name . "</label><div class=\"controls\">";
//            echo "<input id=\"ytTestForm_inlineCheckboxes\" type=\"hidden\" name=\"pid_" . $p->prop_id . "\" value=\"\">";
//            foreach ($p->getPropArrayValues() as $k => $v) {
//                echo "<label class=\"checkbox inline\">";
//                echo "<input id=\"pid_" . $p->prop_id . "_" . $k . "\" type=\"checkbox\" name=\"pid_" . $p->prop_id . "[]\" value=\"0\">";
//                echo "<label>" . $v . "</label></label>";
//            }
            echo $p->getPropCheckBoxListValues($p->prop_name, $arr[$p->prop_id]);
            echo '</div></div>';
        }
//        echo '<h5>非关键属性</h5>';

        $cri = new CDbCriteria(array(
            'condition' => 'is_key_prop=0 and is_sale_prop=0 and type_id =' . $type_id,
        ));
        $props = ItemProp::model()->findAll($cri);

        foreach ($props as $p) {
            echo "<div class=\"control-group \">";
            echo "<label class=\"control-label\">" . $p->prop_name . "</label><div class=\"controls\">";
            echo $p->type == 'optional' ? $p->getPropOptionValues($p->prop_name, $arr[$p->prop_id]) : $p->getPropTextFieldValues($p->prop_name, $arr[$p->prop_id][0]);
            echo '</div></div>';
        }
    }

}
