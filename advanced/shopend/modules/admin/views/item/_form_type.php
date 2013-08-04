<?php
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.form.js', CClientScript::POS_END);
?>
<script type="text/javascript">
    $(document).ready(function() {
	$("#Item_category_id").change(function() {
	    $("#item_prop_values").show();
	    var Tid = $("#Item_category_id").select().val();
//           var Tid = $("#Item_category_id  option:selected").val();
//5(178918267)友情提示
	    $.ajax
		    ({
			type: "POST",
			data: "category_id=" + Tid,
			url: "<?php echo Yii::app()->createUrl('/admin/item/getPropValues') ?>",
			dataType: 'html',
			success: function(results)
			{
			    $("#item_prop_values").empty();
			    $(results).appendTo("#item_prop_values");
			}
		    });

	});
//返源<pizigou@vip.qq.com>友情提示
	if ($("#Item_category_id").find("option:selected").val() > 0) {
//		alert($("#Item_category_id").find("option:selected").val());
	    $("#item_prop_values").show();
	    var Tid = $("#Item_category_id").find("option:selected").val();
//           var Tid = $("#Item_category_id  option:selected").val();
//5(178918267)友情提示
	    $.ajax
		    ({
			type: "POST",
			data: "category_id=" + Tid + "&item_id=<?php echo $model->item_id ?>",
			url: "<?php echo Yii::app()->createUrl('/admin/item/getPropValues') ?>",
			dataType: 'html',
			success: function(results)
			{
			    $("#item_prop_values").empty();
			    $(results).appendTo("#item_prop_values");
			}
		    });
	}
    });
</script>
<style>
    table{width:100%}
    td{height:25px;}
</style>
<script type="text/javascript">
//author:54xiaosu(87753586) 
//函数说明：合并指定表格（表格id为_w_table_id）指定列（列数为_w_table_colnum）的相同文本的相邻单元格
//参数说明：_w_table_id 为需要进行合并单元格的表格的id。如在HTMl中指定表格 id="data" ，此参数应为 #data
//参数说明：_w_table_colnum 为需要合并单元格的所在列。为数字，从最左边第一列为1开始算起。
    function _w_table_rowspan(_w_table_id, _w_table_colnum) {
	_w_table_firsttd = "";
	_w_table_currenttd = "";
	_w_table_SpanNum = 0;
	_w_table_Obj = $(_w_table_id + " tr td:nth-child(" + _w_table_colnum + ")");
	_w_table_Obj.each(function(i) {
	    if (i == 0) {
		_w_table_firsttd = $(this);
		_w_table_SpanNum = 1;
	    } else {
		_w_table_currenttd = $(this);
		if (_w_table_firsttd.text() == _w_table_currenttd.text()) {
		    _w_table_SpanNum++;
		    _w_table_currenttd.hide(); //remove();
		    _w_table_firsttd.attr("rowSpan", _w_table_SpanNum);
		} else {
		    _w_table_firsttd = $(this);
		    _w_table_SpanNum = 1;
		}
	    }
	});
    }
//函数说明：合并指定表格（表格id为_w_table_id）指定行（行数为_w_table_rownum）的相同文本的相邻单元格
//参数说明：_w_table_id 为需要进行合并单元格的表格id。如在HTMl中指定表格 id="data" ，此参数应为 #data
//参数说明：_w_table_rownum 为需要合并单元格的所在行。其参数形式请参考jQuery中nth-child的参数。
//          如果为数字，则从最左边第一行为1开始算起。
//          "even" 表示偶数行
//          "odd" 表示奇数行
//          "3n+1" 表示的行数为1、4、7、10.......
//参数说明：_w_table_maxcolnum 为指定行中单元格对应的最大列数，列数大于这个数值的单元格将不进行比较合并。
//          此参数可以为空，为空则指定行的所有单元格要进行比较合并。
    function _w_table_colspan(_w_table_id, _w_table_rownum, _w_table_maxcolnum) {
	if (_w_table_maxcolnum == void 0) {
	    _w_table_maxcolnum = 0;
	}
	_w_table_firsttd = "";
	_w_table_currenttd = "";
	_w_table_SpanNum = 0;
	$(_w_table_id + " tr:nth-child(" + _w_table_rownum + ")").each(function(i) {
	    _w_table_Obj = $(this).children();
	    _w_table_Obj.each(function(i) {
		if (i == 0) {
		    _w_table_firsttd = $(this);
		    _w_table_SpanNum = 1;
		} else if ((_w_table_maxcolnum > 0) && (i > _w_table_maxcolnum)) {
		    return "";
		} else {
		    _w_table_currenttd = $(this);
		    if (_w_table_firsttd.text() == _w_table_currenttd.text()) {
			_w_table_SpanNum++;
			_w_table_currenttd.hide(); //remove();
			_w_table_firsttd.attr("colSpan", _w_table_SpanNum);
		    } else {
			_w_table_firsttd = $(this);
			_w_table_SpanNum = 1;
		    }
		}
	    });
	});
    }

    var a;

    function fff(array) {
	var ar = a;
	a = new Array();
	for (var i = 0; i < ar.length; i++) {
	    for (var j = 0; j < array.length; j++) {
		var v = a.push(ar[i] + "_" + array[j]);
	    }
	}
    }

    function buildSkuTable() {

	$('#sku').find('tbody').empty();

	for (var i = 0; i < array.length; i++) {
	    if (array[i].length < 1) {
		return;
	    }
	}

	a = array[0];

	for (var i = 1; i < array.length; i++) {
	    fff(array[i]);
	}

	var body = '';

	for (var k = 0; k < a.length; k++) {
	    body += '<tr>';
	    var arr = a[k].split('_');
	    for (var i = 0; i < arr.length; i++) {
		var arr2 = arr[i].split(';');
		body += '<td><input value="' + arr2[0] + '" type="hidden" name="Item[skus][table]['+k+'][props][]">' + arr2[1] + '</td>';
	    }
	    body += '<td><input label="price" class="skus" value="" type="text" name="Item[skus][table]['+k+'][price]"></td><td><input label="quantity" class="skus" value="" type="text" name="Item[skus][table]['+k+'][quantity]"></td><td><input label="outer_id" class="skus" value="" type="text" name="Item[skus][table]['+k+'][outer_id]"></td><td class="operation"><i class="glyphicon glyphicon-cog"></i></td></tr>';
	}

	$('#sku').find('tbody').html(body);

	for (var i = array.length; i >= 1; i--) {
	    _w_table_rowspan("#sku", i);
	}

    }

    var array = new Array();
    jQuery(document).ready(function($) {		    

	$(document).on('click', '.change', function() {
	    
	    
	    $('.sku-map').show();
	    //建立sku表格内容
	    array = new Array();
	    array_props = new Array();
	    $('span').filter('[id*="Item_skus_checkbox_"]').each(function() {
		var $that = $(this);
		var newArray = new Array();
		$(this).find('.change').filter(':checked').each(function() {
		    newArray.push($(this).val()+";"+$(this).next().text());
		});
		array.push(newArray);
	    });
	    buildSkuTable();

//轻飘如羽/鸟人等友情提示
////	$.post(
////		"<?php echo Yii::app()->createUrl('/admin/item/getItemSpec') ?>",
////		$('#item-form').serialize(), function(data) {
////	    $('#output').html(data);
////	});
//生成sku提示内容
	    var tmp = null;
	    var count = 0;
	    $('input[class=change]:checked').each(function() {
		if (tmp === null) {
		    tmp = $(this);
		    count = 1;
		}

		if (tmp.attr('name') !== $(this).attr('name')) {
		    count++;
		}
	    });

	    if (count < 2) {
		//显示
		$("#output").after('<div class="alert alert-info">您需要选择所有的销售属性，才能组合成完整的规格信息。</div>');
		if ($('input[class=change]:checked').length >= 1) {
		    $(".alert").remove();
		    $("#output").after('<div class="alert alert-info">您需要选择所有的销售属性，才能组合成完整的规格信息。</div>');
		}
		if ($('input[class=change]:checked').length === 0) {
		    $(".alert").remove();
		}
	    } else {
		$(".alert").remove();
	    }

	});
    });

</script>
<div class="row" style='margin-bottom:10px'>
    <?php echo $form->labelEx($model, 'category_id', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->dropDownList($model, 'category_id', $model->attrCategory(3)); ?>
    </div>
    <?php echo $form->error($model, 'category_id'); ?>
</div>

<div class="row" style='margin-bottom:10px'>
    <div id="item_prop_values" style="display:none">

    </div>
</div>