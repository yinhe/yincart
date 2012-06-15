<div id="KinSlideshow1" style="visibility:hidden;">
    <?php foreach($this->getAds() as $ad){
      echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/upload/ad/'.$ad->pic, '', array('width'=>990, 'height'=>'486')), $ad->url ? $ad->url : '#', array('target'=>'_blank'));  
    }
    ?>
</div>