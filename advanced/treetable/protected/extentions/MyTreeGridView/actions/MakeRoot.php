<?php

class MakeRoot extends CAction {

    public function run($id) {
        $model = CActiveRecord::model($this->getController()->CQtreeGreedView['modelClassName'])->findByPk((int) $id);

        if (!is_null($model)) {
            try {
                $model->moveAsRoot();
            } catch (Exception $e) {
                Yii::app()->user->setFlash('CQTreeGridView', $e->getMessage());
            }
        }
        $this->getController()->redirect(array($this->getController()->CQtreeGreedView['adminAction']));
    }
}
?>
