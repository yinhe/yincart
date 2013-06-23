<?php

class DeleteNode extends CAction {

    public function run($id) {
        if( Yii::app()->request->isPostRequest)
        {
            $model = CActiveRecord::model($this->getController()->CQtreeGreedView['modelClassName'])->findByPk((int) $id);
            if($model===null) {
                $this->getController()->redirect(array($this->getController()->CQtreeGreedView['adminAction']));
            }
            if($model->tree->hasManyRoots==false && $model->isRoot()) {
                $this->getController()->redirect(array($this->getController()->CQtreeGreedView['adminAction']));
            }
            $model->deleteNode();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->getController()->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array($this->getController()->CQtreeGreedView['adminAction']));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }
}
?>
