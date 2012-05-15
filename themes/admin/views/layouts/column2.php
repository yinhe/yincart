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
		
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'<span class="icon icon-user">空间状态</span>',
			));
			?>
            Domains Used: 45/100
			<?php
			$this->widget('zii.widgets.jui.CJuiProgressBar', array(
				'value'=>45,
				'htmlOptions'=>array(
					'style'=>'height:10px;',
					'class'=>'shadowprogressbar'
				),
			));
			?>
            <br />
            Space Used: 95%
            <?php
			$this->widget('zii.widgets.jui.CJuiProgressBar', array(
				'value'=>95,
				'htmlOptions'=>array(
					'style'=>'height:10px;',
					'class'=>'shadowprogressbar'
				),
			));
			?>
            <br />
            Bandwidth Used: 10%
            <?php
			$this->widget('zii.widgets.jui.CJuiProgressBar', array(
				'value'=>10,
				'htmlOptions'=>array(
					'style'=>'height:10px;',
					'class'=>'shadowprogressbar'
				),
			));
			?>
            <br />
            Conversion rate: 25%            
            <?php
			$this->widget('zii.widgets.jui.CJuiProgressBar', array(
				'value'=>25,
				'htmlOptions'=>array(
					'style'=>'height:10px;',
					'class'=>'shadowprogressbar'
				),
			));
			?>
			<?php
			$this->endWidget();
		?>
		
		</div><!-- sidebar -->
	</div>
</div>
<div class="clear"></div>
<?php $this->endContent(); ?>