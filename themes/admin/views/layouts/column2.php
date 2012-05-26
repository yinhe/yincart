<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="grid_13">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="grid_3 last">
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'<span class="icon icon-sitemap_color">操作选项</span>',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
		</div><!-- sidebar -->
	</div>
</div>
<div class="clear"></div>
<?php $this->endContent(); ?>