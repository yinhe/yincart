<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
<div class="col-span-12">
    <div class="catalog background-color-0">
	<?php $this->widget('widgets.square.WCatalog') ?>
    </div>
</div>
<?php echo $content; ?>
</div>
<?php $this->endContent(); ?>