<div class="toolbar-wrapper">
    <div class="toolbar clearfix">
        <div class="span12 clearfix">
            <ul class="unstyled">
                <li class="search-field">
                    <form class="search" action="<?php echo Yii::app()->createUrl('/item/index') ?>">
                        <input type="image" src="<?php echo Yii::app()->theme->baseUrl ?>/media/icon-search.png" alt="Go" id="go">
                        <input type="text" name="keyword" class="search_box" placeholder="Search" value="" x-webkit-speech="">
                    </form>
                </li>
                <li><span class="icon-cart"></span>
                    <?php echo CHtml::link('Cart', array('/cart'), array('class' => 'cart')) ?>(<font style="color:red"><?php echo $this->getCount() ?></font>)
                </li>
                <li>
                    <?php if (Yii::app()->user->isGuest) { ?>
                        <?php echo CHtml::link('Login', array('/user/login')) ?>&nbsp;or&nbsp;<?php echo CHtml::link('Create a account', array('/user/registration')) ?>
                    <?php } else { ?>
                        Welcome, <?php echo Yii::app()->user->name ?>&nbsp;|&nbsp;<?php echo CHtml::link('Member Center', array('/member')) ?>&nbsp;|&nbsp;<?php echo CHtml::link('Logout', array('/user/logout')) ?>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>
</div>