<?php echo $form->fileFieldRow($img, 'url', array('name' => 'ItemImg[url0]', 'hint'=>'商品主图，必须上传一张')); ?>
<?php echo $form->fileFieldRow($img, 'url', array('name' => 'ItemImg[url1]')); ?>
<?php echo $form->fileFieldRow($img, 'url', array('name' => 'ItemImg[url2]')); ?>
<?php echo $form->fileFieldRow($img, 'url', array('name' => 'ItemImg[url3]')); ?>
<?php echo $form->fileFieldRow($img, 'url', array('name' => 'ItemImg[url4]')); ?>
<?php 

Yii::app()->clientScript->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/swfupload/swfupload.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/swfupload/swfupload.queue.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/swfupload/fileprogress.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/swfupload/handlers.js');

Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/js/swfupload/css/upload.css');
?>
<script type="text/javascript">
var upload_img;


$(function() {
	$( "#sortable" ).sortable();
	$( "#sortable" ).disableSelection();

	$('.item-img-del').click(function(){
		var $_this = $(this);

		if (confirm('你确定要进行删除？')) {
			$_this.parents('li').remove();
			return false;

			$.ajax({
				url: '<?php echo $this->createUrl('mall/itemImgDel');?>',
				type: 'get',
				dataType: 'json',
				async: false,
				data: {
					'id': $_this.parents('li').attr('data-id')
				},
				success: function(rs) {
					try {
						if (rs.status) {
							$_this.parents('li').remove();
						} else {
							
						}
					} catch (ex) {
						
					}
				},
				error: function() {
					
				}
			});
		}
		

		return false;
	});

	/**
	 *
	 *
	 */
	upload_img = new SWFUpload({
        // Backend Settings
		upload_url: '<?php echo $this->createUrl('item/upload');?>',
		

        // File Upload Settings
        file_size_limit : "512",	// TODO 这里限制上传大小最多为512K
        file_types : "*.jpg;*.gif",
        file_types_description : "Image Files",
        file_upload_limit : "30",
        file_queue_limit : "30",

        // Event Handler Settings (all my handlers are in the Handler.js file)
        file_dialog_start_handler : fileDialogStart,
        file_queued_handler : fileQueued,
        file_queue_error_handler : fileQueueError,
        file_dialog_complete_handler : fileDialogComplete,
        upload_start_handler : uploadStart,
        upload_progress_handler : uploadProgress,
        upload_error_handler : uploadError,
        upload_success_handler : uploadSuccessContentImg,
        upload_complete_handler : uploadComplete,

        // Button Settings
		button_image_url : "<?php echo Yii::app()->request->baseUrl;?>/js/swfupload/icon.png",
        button_text: '选择图片',
        button_placeholder_id : "spanButtonPlaceholder",
        button_width: 55,
        button_height: 20,
        button_cursor : SWFUpload.CURSOR.HAND,
        
        // Flash Settings
        flash_url : "<?php echo Yii::app()->request->baseUrl;?>/js/swfupload/swfupload.swf",

        custom_settings : {
            progressTarget : "fsUploadProgress"
        },
		
		post_params : {
            "YII_CSRF_TOKEN" : "<?php echo Yii::app()->request->csrfToken;?>",
            "YII_CSRF_TOKEN_DATA" : "<?php echo session_id(); ?>"
		},

        // Debug Settings
        debug: false
    });
});
</script>
<style>
#sortable li {
list-style-type: none;
margin: 3px 3px 3px 0;
text-align: center;
cursor: pointer;
}
</style>
<div class="row-fluid">
	<div class="span5"></div>
	<div class="span7">
		<span id="spanButtonPlaceholder">上传图片</div>
		<div class="fieldset flash" id="fsUploadProgress"></div>
	</div>
</div>
<ul id="sortable">
	<li class="span2" data-id="1">
		<div><img src="<?php echo Yii::app()->baseUrl;?>/upload/ad/20130429/20130429113116_16789.jpg" width="70" height="70"></div>
		<div><a href="javascript:;" class="item-img-del">删除</a></div>
	</li>
	<li class="span2" data-id="1">
		<div><img src="<?php echo Yii::app()->baseUrl;?>/upload/ad/20130429/20130429113116_16789.jpg" width="70" height="70"></div>
		<div><a href="javascript:;" class="item-img-del">删除</a></div>
	</li>
	<li class="span2" data-id="1">
		<div><img src="<?php echo Yii::app()->baseUrl;?>/upload/ad/20130429/20130429113116_16789.jpg" width="70" height="70"></div>
		<div><a href="javascript:;" class="item-img-del">删除</a></div>
	</li>
	<li class="span2" data-id="1">
		<div><img src="<?php echo Yii::app()->baseUrl;?>/upload/ad/20130429/20130429113116_16789.jpg" width="70" height="70"></div>
		<div><a href="javascript:;" class="item-img-del">删除</a></div>
	</li>
	<li class="span2" data-id="1">
		<div><img src="<?php echo Yii::app()->baseUrl;?>/upload/ad/20130429/20130429113116_16789.jpg" width="70" height="70"></div>
		<div><a href="javascript:;" class="item-img-del">删除</a></div>
	</li>
	<li class="span2" data-id="1">
		<div><img src="<?php echo Yii::app()->baseUrl;?>/upload/ad/20130429/20130429113116_16789.jpg" width="70" height="70"></div>
		<div><a href="javascript:;" class="item-img-del">删除</a></div>
	</li>
	<li class="span2" data-id="1">
		<div><img src="<?php echo Yii::app()->baseUrl;?>/upload/ad/20130429/20130429113116_16789.jpg" width="70" height="70"></div>
		<div><a href="javascript:;" class="item-img-del">删除</a></div>
	</li>
	<li class="span2" data-id="1">
		<div><img src="<?php echo Yii::app()->baseUrl;?>/upload/ad/20130429/20130429113116_16789.jpg" width="70" height="70"></div>
		<div><a href="javascript:;" class="item-img-del">删除</a></div>
	</li>
	<li class="span2" data-id="1">
		<div><img src="<?php echo Yii::app()->baseUrl;?>/upload/ad/20130429/20130429113116_16789.jpg" width="70" height="70"></div>
		<div><a href="javascript:;" class="item-img-del">删除</a></div>
	</li>
</ul>
