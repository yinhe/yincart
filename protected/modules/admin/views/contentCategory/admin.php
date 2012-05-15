<?php
$this->breadcrumbs = array(
    '内容分类' => array('index'),
    '管理',
);

$this->menu = array(
    array('label' => '创建内容分类', 'url' => array('create')),
);

Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/lib/jqeasyui/jquery-1.7.2.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/lib/jqeasyui/jquery.easyui.min.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/lib/jqeasyui/themes/default/easyui.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/lib/jqeasyui/themes/icon.css');
?>
	<script>
		function editNode(){
			var node = $('#tt').treegrid('getSelected');
			if (node){
				$('#tt').treegrid('beginEdit',node.id);
			}
		}
		function saveNode(){
			var node = $('#tt').treegrid('getSelected');
			if (node){
				$('#tt').treegrid('endEdit',node.id);
			}
		}
		function cancelNode(){
			var node = $('#tt').treegrid('getSelected');
			if (node){
				$('#tt').treegrid('cancelEdit',node.id);
			}
		}
	</script>

<h1>内容分类</h1>
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'article-category-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
//                'category_id',
                'parent_id',
                'category_name',
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{update}{delete}'
                ),
            ),
        ));
        
        $c = ContentCategory::model()->findAllByAttributes(array('parent_id'=>0));
        $c = ContentCategory::model()->findAll();
        
foreach($c as $cc){
//   $returnArr = array();
//    $cc->getTree($c,$returnArr);
//   $items[] = $returnArr ;
//   $ccc = $cc->getMeChildsId($cc->category_id);
   $childs = $cc->getChildsId($cc->category_id);
   $rows[] = array('id'=>$cc->category_id, 'name'=>$cc->category_name, 'sort_order'=>$cc->sort_order, $childs !==0 ? "'__parentId'=>$cc->parent_id" : "'_parentId'=>0");
   
}
$myjson = CJSON::encode(array('rows'=>$rows));
//print_r($items);
        
//        var_dump($c->getArray(0));
//$b = CJSON::decode(Yii::app()->request->baseUrl .'/lib/jqeasyui/treegrid_data3.json');
//
//var_dump($b);
//var_dump(Yii::app()->request->baseUrl .'/lib/jqeasyui/treegrid_data3.json');
//print_r($b);

        ?>

<?php
//$this->widget(
//    'CTreeView',
//    array('url' => array('/admin/contentCategory/ajaxFillTree'))
//);
?>

	<div style="margin:10px 0">
		<a href="javascript:editNode()" class="easyui-linkbutton">Edit</a>
		<a href="javascript:saveNode()" class="easyui-linkbutton">Save</a>
		<a href="javascript:cancelNode()" class="easyui-linkbutton">Cancel</a>
	</div>
	
	<table id="tt" title="TreeGrid" class="easyui-treegrid" style="width:700px;height:auto"
			url=<?php echo $myjson ?> idField="id" treeField="name"
			pagination="false" fitColumns="true">
		<thead>
			<tr>
				<th field="code" rowspan="2" width="150" editor="text">name</th>
<!--				<th colspan="2">Group Fields</th>-->
			</tr>
			<tr>
				<th field="name" width="200" editor="text">sort_order</th>
			</tr>
		</thead>
	</table>