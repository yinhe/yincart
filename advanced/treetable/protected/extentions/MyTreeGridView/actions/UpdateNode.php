<?php

class UpdateNode extends CAction {

    public function run($id) {
        $model = CActiveRecord::model($this->getController()->CQtreeGreedView['modelClassName'])->findByPk((int) $id);
        if($model===null) {
            $this->getController()->redirect(array($this->getController()->CQtreeGreedView['adminAction']));
        }

        if(isset($_POST[$this->getController()->CQtreeGreedView['modelClassName']]))
        {
            $model->attributes = $_POST[$this->getController()->CQtreeGreedView['modelClassName']];
            if($model->saveNode()) {
                $this->getController()->redirect(array($this->getController()->CQtreeGreedView['adminAction']));
            }
        }

        $this->getController()->render('update',array(
            'model'=>$model,
        ));
    }
}
?>
