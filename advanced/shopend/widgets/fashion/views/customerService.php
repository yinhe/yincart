<?php
$category = Category::model()->findByPk('55');
$service_category = $category->children()->findAll();
foreach ($service_category as $sc) {
    ?>
    <?php echo $sc->name . ': ' ?>

    <?php
    $cri = new CDbCriteria(array(
        'condition' => 'category_id =' . $sc->id
    ));
    $CustomerService = CustomerService::model()->findAll($cri);
    foreach ($CustomerService as $cs) {
        if ($cs->type == 1) {
            ?>
            <?php echo $cs->nick_name ?><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $cs->account ?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $cs->account ?>:45" alt="点击这里给我发消息" title="点击这里给我发消息"></a>

        <?php } elseif ($cs->type == 2) { ?>
            <?php echo $cs->nick_name ?><a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $cs->account ?>&siteid=cntaobao&status=2&charset=utf-8"><img border="0" src="http://amos.alicdn.com/realonline.aw?v=2&uid=<?php echo $cs->account ?>&site=cntaobao&s=2&charset=utf-8" alt="点击这里给我发消息" /></a>

        <?php } elseif ($cs->type == 3) { ?>
            <!--<a href="callto://<?php echo $cs->account ?>"><img src="http://goodies.skype.com/graphics/skypeme_btn_small_white.gif" border="0"></a>-->
            <!--<a href="callto://<?php echo $cs->account ?>"><img src="http://goodies.skype.com/graphics/skypeme_btn_small_darkgrey.gif" border="0"></a>-->
            <?php echo $cs->nick_name ?><a href="skype:<?php echo $cs->account ?>?call" on-click="return skypeCheck();"><img src=http://mystatus.skype.com/smallclassic/<?php echo $cs->account ?> style="border: none;" alt="Call me!" /></a>
        <?php }
    } ?>
    </ul>
<?php } ?>