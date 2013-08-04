
<?php
$this->widget('xupload.XUpload', array(
    'url' => Yii::app()->createUrl("/admin/item/upload", array("parent_id" => 1)),
    'model' => $upload,
    'attribute' => 'file',
    'multiple' => true,
    'htmlOptions' => array('id'=>'item-form'),
));
//echo Yii::app()->getBasePath() . "/../upload/item/image".'<br />';
//echo 'http://img.'.F::sg('site', 'domain'). "/item/image";
//echo $_SESSION['store']['store_id'];
?>