<style type="text/css">
    #filter
    {
        height:auto;
        margin-left:auto;
        margin-right:auto;
    }

    #filter dl
    {
        padding:0;
        margin-top:0;
        margin-bottom:0;
        clear:both;
        padding:4px 0;        
    }

    #filter dt,dd
    {
        display:block;
        float:left;
        width:auto;
        padding:0;
        margin:3px 0;                       
    }

    #filter dt
    {
        height:14px;
        padding-bottom:4px;
        font-weight:bold;
        color:#333333;            
    }

    #filter dd
    {
        color:#005AA0;
        margin-right:8px;
    }

    #filter a
    {
        cursor:pointer;
    }

    #filter a:hover {
        background-color:#b94a48;
        color:#FFFFFF;
        cursor:pointer;
        text-decoration:none;
        display: inline;
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        /*font-size: 12px;*/
        /*font-weight: bold;*/
        height: auto;
        line-height: 14px;
        text-shadow: rgba(0, 0, 0, 0.247059) 0px -1px 0px;
        white-space: nowrap;
        width: auto;
    }

    .selecting{
        text-decoration: none;
        color: #FFF;
        background-color: #b94a48;
    }

    .selected
    {

    }
</style>
<script type="text/javascript">
    $(function() {
        //选中filter下的所有a标签，为其添加hover方法，该方法有两个参数，分别是鼠标移上和移开所执行的函数。
        $("#filter a").hover(
                function() {
                    $(this).addClass("selecting");
                },
                function() {
                    $(this).removeClass("selecting");
                }
        );


        //选中filter下所有的dt标签，并且为dt标签后面的第一个dd标签下的a标签添加样式seled。(感叹jquery的强大)
        $("#filter dt+dd a").attr("class", "label label-important"); /*注意：这儿应该是设置(attr)样式，而不是添加样式(addClass)，
         不然后面通过$("#filter a[class='seled']")访问不到class样式为seled的a标签。*/

        //为filter下的所有a标签添加单击事件
        $("#filter a").click(function() {
            $(this).parents("dl").children("dd").each(function() {
                $(this).children("div").children("a").removeClass("label label-important");
//                $(this).find("a").removeClass("selected");
            });

            $(this).attr("class", "label label-important");

//            alert(RetSelecteds()); //返回选中结果
        });
//        alert(RetSelecteds()); //返回选中结果
    });

    function RetSelecteds() {
        var result = "";
        $("#filter a[class='label']").each(function() {
            result += $(this).html() + "\n";
        });
        return result;
    }
</script>
<div class="nav btn-group background-color-4 block">
	    <div class="table-cell">
		<div class="btn btn-small arrow-left-white-large background-color-hover-6"></div>
	    </div>
	    <div class="table-cell full-width">
		<div class="btn btn-large cursor-default"><?php echo $model->name ?></div>
	    </div>
	    <div class="table-cell">
		<div class="btn btn-small no-border arrow-right-white-large background-color-hover-6"></div>
	    </div>
</div>
<div class="catalog-content">
    <?php if($model) {?>
<div class="filter_menu box">
    <div id="filter"> 
        <!-- 分类 -->
        <dl>
            <dt><span class="filter_list_tit">分类：</span></dt>
            <dd><div><a><span>全部</span></a></div></dd>
            <?php
            $childs = $model->children()->findAll();
            foreach ($childs as $c) {
                ?>
                <dd><div><a><span><?php echo CHtml::link($c->name, array('/catalog/index', 'key'=>$c->url)) ?></span></a></div></dd>
            <?php } ?>
        </dl>

        <?php
        $cri = new CDbCriteria(array(
            'condition' => 'is_sale_prop = 1 and category_id = '.$model->id,
            'order' => 'sort_order asc'
        ));
        $props = ItemProp::model()->findAll($cri);

        foreach ($props as $p) {
            ?>
            <!-- <?php echo $p->prop_name ?> -->
            <dl class="clearfix">
                <dt><span class="filter_list_tit"><?php echo $p->prop_name ?>：</span></dt>
                <dd><div><a><span>全部</span></a></div></dd>
                <?php
                $cri = new CDbCriteria(array(
                    'condition' => 'prop_id =' . $p->prop_id,
                ));
                $values = PropValue::model()->findAll($cri);
                foreach ($values as $v) {
                    ?>
                    <dd><div><a><span><?php echo $v->value_name ?></span></a></div></dd>
                    <?php
                }
                ?>
            </dl>                        
            <?php
        }
        ?>
<!--        <div class="reset">
            <div><a onclick="javascript:RetSelecteds();">重置所有筛选条件</a></div>
        </div>-->
    </div>
</div>
    <?php }else{
    echo '找不到这个分类';
    }
    ?>
</div>