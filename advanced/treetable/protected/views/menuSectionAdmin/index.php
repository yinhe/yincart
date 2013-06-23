<?php

$this->tabs = array(

	 array('label'=>t('Menu control'), 'url'=> $this->createUrl('/content/menuAdmin/index')),
	 array('label'=>t('Manage'), 'url'=>$this->createUrl("admin"),'active'=>true),	 
     //array('label'=>t('Add a section'), 'url'=> $this->createUrl('create')),	
);



$this->widget('ext.MyTreeGridView.MyTreeGridView', array(
		 'id' => 'menuSection-grid',
		 'dataProvider' =>$dataProvider,		 
		 'ajaxUpdate' => false,
		 'columns' => array(
                'id',
				array(
				   'class' => 'ext.myExt.MyEditableColumn',
				   'name' => 'title',		   
				   'headerHtmlOptions' => array('style' => 'width: 350px'),
				   'editable' => array(                  
						  'url'   => $this->createUrl("/content/menuSectionAdmin/ajaxEdit"),
						  'placement'  => 'right',						  
						  'options' => array(
							'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
						),
					  )               
				),
				
				'url',
				
				array(					
					'header'=> t('Add Sub Content'),
					'value' => 'CHtml::link("Add",Yii::app()->createUrl("/content/menuSectionAdmin/createSub",array("menu_id"=>$data["menu_id"],"root_id"=>$data["root_id"],"father_id"=>$data["id"])),array("target"=>"_blank","class"=>"btn btn-primary"))',
					'type'  => 'raw'
				),
				
				array(
					'name'  => 'page_id',
					'header'=> t('Page Content'),
					'value' => '(is_null($data["page_id"]))? CHtml::link("Create",Yii::app()->createUrl("/content/pageAdmin/create",array("cate_id"=>$data["id"])),array("target"=>"_blank","class"=>"btn btn-success")):CHtml::link("Update",Yii::app()->createUrl("/content/pageAdmin/update",array("id"=>$data["page_id"])),array("target"=>"_blank","class"=>"btn btn-success"))',
					'type'  => 'raw'
				),
			
					
				array(
				   'class' => 'ext.myExt.MyEditableColumn',
				   'name' => 'sort_order',
				   'headerHtmlOptions' => array('style' => 'width: 110px'),
				   'editable' => array(                  
						  'url'   => $this->createUrl("/content/menuSectionAdmin/ajaxEdit"),
						  'placement'  => 'right',						 
						  'options' => array(
							'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
						),
					  )               
				),
				
				array( 
					  'class' =>  'ext.myExt.MyEditableColumn',
					  'name' => 'is_active',
					  'value'=>'($data["is_active"] == 1)?"Enable":"Disable"',            
					  'headerHtmlOptions' => array('style' => 'width: 60px'),
					  'editable' => array(
						  'type'    => 'select',
						  'url'     => $this->createUrl("/content/menuSectionAdmin/ajaxEdit"),
						  'source'  => array(0 => t('Disable'), 1 => t('Enable')),
						  'options' => array(
							'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
						),
					  )
				 ), 
		 
			   array(
				   'class' => 'bootstrap.widgets.TbButtonColumn',
				   'template' => '{view}{update}{delete}',
				   'buttons'=>array(
					'view' => array(
					  'label'=>'View',
					  'icon'=>'eye-open',
					  'url'=>'Yii::app()->createUrl("/content/menuSectionAdmin/view", array("id" => $data["id"]))',					
					  'htmlOptions'=>array('data-title'=>'View', 'data-content'=>'View', 'rel'=>'popover')
					  ),
							  
							  
					'update' => array(
						'label'=>'Update',
						'icon'=>'pencil',
						'url'=>'Yii::app()->createUrl("/content/menuSectionAdmin/update", array("id" => $data["id"]))',
						'htmlOptions'=>array('data-title'=>'Update', 'data-content'=>'Update', 'rel'=>'popover'),
				),
			  
			  'delete' => array(
				  'label'=>'Delete',
				  'icon'=>'trash',
				  'url'=>'Yii::app()->createUrl("/content/menuSectionAdmin/delete", array("id" => $data["id"]))',
				  'htmlOptions'=>array('data-title'=>'Delete', 'data-content'=>'Delete', 'rel'=>'popover')
				  ),
			  
			),
			   ),
		   ),
	  ));
	  
	
