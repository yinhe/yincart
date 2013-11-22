<div class="container">
    <?php
    $this->widget('xupload.XUpload', array(
        'url' => Yii::app()->createUrl("/mall/item/upload", array("token" => Yii::app()->request->csrfToken)),
        'model' => $upload,
        'attribute' => 'file',
        'multiple' => true,
        'htmlOptions' => array('id'=>'item-form'),
    ));
    //echo Yii::app()->getBasePath() . "/../upload/item/image".'<br />';
    //echo 'http://img.'.F::sg('site', 'domain'). "/item/image";
    //echo $_SESSION['store']['store_id'];
    if (!$model->isNewRecord) {
        $cri = new CDbCriteria(array(
            'condition'=>'item_id ='.$model->item_id,
            'order'=>'position'
        ));
        $images = ItemImg::model()->findAll($cri);
        foreach($images as $i) {
            echo CHtml::image('http://'.F::sg('site','imageDomain').'/store/'.$id.'/item/image/'.$i->url, '', array('style'=>'width:100px;padding-right:10px'));
        }
    }
    ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".delPicture").click(function () {
            var e = $(this);
            $.post("<?php echo Yii::app()->createUrl('/mall/item/upload') ?>", {"product_id":$(this).attr('data-id'), "picture_id":$(this).attr('data-picid'), "YII_CSRF_TOKEN": $('[name=YII_CSRF_TOKEN]').val()},
                function () {
                    e.parent().parent().remove();
                }, 'json');
        })
    })
</script>