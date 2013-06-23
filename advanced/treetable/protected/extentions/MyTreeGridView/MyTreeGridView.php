<?php
/**
 * CTreeGridView class file.
 *
 * Used:
 * YiiExt - http://code.google.com/p/yiiext/
 * treeTable - http://plugins.jquery.com/project/treeTable
 * jQuery ui - http://jqueryui.com/
 *
 * @author quantum13
 * @link http://quantum13.ru/
 */


Yii::import('bootstrap.widgets.TbGridView');


class MyTreeGridView extends TbGridView
{
	
	
	 /**
     * @var string the base script URL for all treeTable view resources (e.g. javascript, CSS file, images).
     * Defaults to null, meaning using the integrated grid view resources (which are published as assets).
     */
    public $baseTreeTableUrl;
	public $sortAction ="#";

    

    /**
     * Initializes the tree grid view.
     */
    public function init()
    {
        parent::init();
        if($this->baseTreeTableUrl===null)
            $this->baseTreeTableUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.extensions.MyTreeGridView.treeTable'));
    
    }

    /**
     * Registers necessary client scripts.
     */
    public function registerClientScript()
    {
        parent::registerClientScript();

        $cs=Yii::app()->getClientScript();
        $cs->registerScriptFile($this->baseTreeTableUrl.'/javascripts/jquery.treeTable.js',CClientScript::POS_END);
        
	
        $cs->registerCssFile($this->baseTreeTableUrl.'/stylesheets/jquery.treeTable.css');

        $cs->registerScript('treeTable', '
            $(document).ready(function()  {
              $("#'.$this->getId().' .items").treeTable();
			  
			   $(".items input:checkbox").change(function() {
				  checkChildNodes($(this).closest("tr"), $(this).attr("checked"));
			  });
    
			  function checkChildNodes(node, checked) {
				  $(".items .child-of-" + node.attr("id")).each(function() {
					  var checkbox = $(this).find("input:checkbox");
					  if (checked)
						  checkbox.attr("checked", "checked");
					  else
						  checkbox.removeAttr("checked");
				  
					  checkChildNodes($(this), checked);
				  });
			  }   
            });
			
            ');
			$csrf_token_name = Yii::app()->request->csrfTokenName;
			$csrf_token = Yii::app()->request->csrfToken;
			
			 $str_js = "
				  var fixHelper = function(e, ui) {
					  ui.children().each(function() {
						  $(this).width($(this).width());
					  });
					  return ui;
				  };
				  function installSortable() {
					$('#".$this->getId()." table.items tbody').sortable({
						forcePlaceholderSize: true,
						forceHelperSize: true,
						items: 'tr',
						update : function () {
							serial = $('#".$this->getId()." table.items tbody').sortable('serialize', {key: 'items[]', attribute: 'class'}) + '&{$csrf_token_name}={$csrf_token}';
							$.ajax({
								'url': '" . $this->sortAction . "',
								'type': 'post',
								'data': serial,
								'success': function(data){
								},
								'error': function(request, status, error){
									alert('We are unable to set the sort order at this time.  Please try again in a few minutes.');
								}
							});
						},
						helper: fixHelper
					}).disableSelection();
				  }
				  
				  installSortable();
				  
				  function reInstallSortable(id, data) {
					  installSortable();
				  }
				  
			  ";
			
		 $cs->registerScript('treeTable2',  $str_js);
			
    }
	
	
	

    /**
     * Renders the data items for the grid view.
     */
    public function renderItems() {

        if(Yii::app()->user->hasFlash('MyTeeGridView')) {
            print '<div style="background-color:#ffeeee;padding:7px;border:2px solid #cc0000;">'. Yii::app()->user->getFlash("MyTreeGridView") . '</div>';
        }
        parent::renderItems();
    }


	
	public function renderTableRow($row)
    {
        $model=$this->dataProvider->data[$row];
        $parentClass = $model["parentid"]
                       ?'child-of-'.$model["parentid"].' '
                       :'';

        echo '<tr style="display:none;" class="before" id="before-'.$model[$this->dataProvider->keyField].'"><td style="padding:0;"><div style="height:3px;"></div></td></tr>';

        if($this->rowCssClassExpression!==null)
        {
            echo '<tr id="'.$model[$this->dataProvider->keyField].'" class="'.$parentClass.$this->evaluateExpression($this->rowCssClassExpression,array('row'=>$row,'data'=>$model)).'">';
        }
        else if(is_array($this->rowCssClass) && ($n=count($this->rowCssClass))>0)
            echo '<tr id="'.$model[$this->dataProvider->keyField].'" class="'.$parentClass.$this->rowCssClass[$row%$n].'">';
        else
            echo '<tr id="'.$model[$this->dataProvider->keyField].'" class="'.$parentClass.'">';
        foreach($this->columns as $column) {
            $column->renderDataCell($row);
        }

        echo "</tr>\n";
        echo '<tr style="display:none;" class="after" id="after-'.$model[$this->dataProvider->keyField].'"><td style="padding:0;"><div style="height:3px;"></div></td></tr>';
       
    }
}
