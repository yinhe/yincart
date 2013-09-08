<?php
    $this->breadcrumbs = array(
        '团购列表'=>array('groupon/index'),
        '添加团购项目'
    );
?>
<h1>添加团购项目</h1>

<?php 
    $this->renderPartial('_form',array(
        'model'=>$model,
    ));
?>