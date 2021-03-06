<?php

class ItemController extends Controller {

    public function actionIndex() {
        $id = $_REQUEST['category_id'];
        $price = $_REQUEST['price'];
        $category = Category::model()->findByPk($id);

        if ($id) {
            $category = Category::model()->findByPk($id);
            $childs = $category->descendants()->findAll();
            $ids = array($id);
            foreach ($childs as $child)
                $ids[] = $child->id;
            $cid = implode(',', $ids);
            $condition = $id ? 'is_show = 1 and category_id in (' . $cid . ')' : 'is_show = 1';
        }
        if ($price) {
            if ($price && $id) {
                $catmodel = new Category();
                $ids = $catmodel->getMeChildsId($id);
                $cid = implode(',', $ids);
                $condition = $id ? 'is_show = 1 and  shop_price=' . $price . ' and category_id in (' . $cid . ')' : 'is_show = 1';
            }
        }
        $keyword = $_REQUEST['keyword'];
        if ($keyword) {
            $condition = $keyword ? 'is_show = 1 and title like' . "'%$keyword%'" . 'or sn like' . "'%$keyword%'" : 'is_show = 1';
        }

        $criteria = new CDbCriteria(array(
            'condition' => $condition,
            'order' => 'sort_order asc, item_id desc'
        ));
        $count = Item::model()->count($criteria);
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = 20;
        $pages->applyLimit($criteria);
        $items = Item::model()->findAll($criteria);
        $this->render('index', array(
            'items' => $items,
            'pages' => $pages,
            'keyword' => $keyword,
            'category' => $category
        ));
    }

    public function actionList($key) {
        $category = Category::model()->findByPk(3);
        $descendants = $category->children()->findAll();
        $this->render('list', array(
            'categories' => $descendants,
            'key' => $key
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $model = $this->loadModel($id);

        /* 记录浏览历史 */

        if (isset(Yii::app()->request->cookies['history'])) {
            $history = explode(',', Yii::app()->request->cookies['history']->value);
            array_unshift($history, $id);
            $history = array_unique($history);

            while (count($history) > 5) {
                array_pop($history);
            }

            $cookie = new CHttpCookie('history', implode(',', $history));
            $cookie->expire = F::gmtime() + 3600 * 24 * 30;
            Yii::app()->request->cookies['history'] = $cookie;
        } else {
            $cookie = new CHttpCookie('history', $id);
            $cookie->expire = F::gmtime() + 3600 * 24 * 30;
            Yii::app()->request->cookies['history'] = $cookie;
        }

        /* 更新点击次数 */
        $model->click_count = $model->click_count + 1;
        $model->save();
        $this->render('view', array(
            'model' => $model,
        ));
    }

    public function actionClearHistory() {
        unset(Yii::app()->request->cookies['history']);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     * @return mixed
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Item::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}