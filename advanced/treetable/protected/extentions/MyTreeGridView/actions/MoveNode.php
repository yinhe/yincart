<?php

class MoveNode extends CAction {

    public function run($action, $to, $id) {
        $to = CActiveRecord::model($this->getController()->CQtreeGreedView['modelClassName'])->findByPk((int) $to);
        $moved = CActiveRecord::model($this->getController()->CQtreeGreedView['modelClassName'])->findByPk((int) $id);

        if (!is_null($to) && !is_null($moved)) {
            try {
                switch ($action) {
                    case 'child':
                        $moved->moveAsLast($to);
                        break;
                    case 'before':
                        if($to->isRoot()) {
                            $moved->moveAsRoot();
                        } else {
                            $moved->moveBefore($to);
                        }
                        break;
                    case 'after':
                        if($to->isRoot()) {
                            $moved->moveAsRoot();
                        } else {
                            $moved->moveAfter($to);
                        }
                        break;
                }
            } catch (Exception $e) {
                Yii::app()->user->setFlash('CQTreeGridView', $e->getMessage());
            }
        }
        $this->getController()->redirect(array($this->getController()->CQtreeGreedView['adminAction']));
    }
}
?>
