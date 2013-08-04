

<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	<li data-target="#myCarousel" data-slide-to="1"></li>
	<li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
	<div class="item active">
	    <?php echo CHtml::image(F::themeUrl().'/assets/img/bg-intro.jpg')?>
	    <div class="container">
		<div class="carousel-caption">
		    <h1>Example headline.</h1>
		    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		    <p><a class="btn btn-large btn-primary" href="#">Sign up today</a></p>
		</div>
	    </div>
	</div>
<!--	<div class="item">
	    <img data-src="holder.js/1500x500/auto/#777:#7a7a7a/text:Second slide" alt="">
	    <div class="container">
		<div class="carousel-caption">
		    <h1>Another example headline.</h1>
		    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		    <p><a class="btn btn-large btn-primary" href="#">Learn more</a></p>
		</div>
	    </div>
	</div>
	<div class="item">
	    <img data-src="holder.js/1500x500/auto/#777:#7a7a7a/text:Third slide" alt="">
	    <div class="container">
		<div class="carousel-caption">
		    <h1>One more for good measure.</h1>
		    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		    <p><a class="btn btn-large btn-primary" href="#">Browse gallery</a></p>
		</div>
	    </div>
	</div>-->
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div><!-- /.carousel -->

<div class="container sign-up">
    
    <form class="form-inline" action="<?php echo Yii::app()->createUrl('/site/createStore')?>" method="post" id='store-form'>
	<input name="Store[name]" class="input-large" type="text" placeholder="Your Store Name">
	<input name="Store[email]" class="input-large" type="text" placeholder="Email">
	<input name="Store[password]" class="input-large" type="password" placeholder="Password">
	<button type="submit" class="btn btn-success btn-large ">Create your store now</button>
    </form>
</div>

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
	<div class="col-lg-4">
	    <?php //echo CHtml::image(F::baseUrl().'/images/rocket.jpg', '',array('class'=>'thumbnail', 'style'=>'width:140px;height:140px;display:inline')) ?>
	    <h2>快速创建网上商城</h2>
	    <p>在这里，您可以快速创建您的网上商城，让您抢占市场的先机，比对手更迅速占领市场。只需要几分钟便完成您的商城创建。简单，快捷，并且功能强大</p>
	    <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
	</div><!-- /.col-lg-4 -->
	<div class="col-lg-4">
	    <?php //echo CHtml::image(F::baseUrl().'/images/sale.jpg', '',array('class'=>'thumbnail', 'style'=>'width:140px;height:140px;display:inline')) ?>
	    <h2>强大的营销平台</h2>
	    <p>以往的独立商城往往需要花费很多资金在营销推广上，在这里，你可以直接推送自己的产品到我们的分销平台，成千上万的顾客将为您创造更多的销售业绩。</p>
	    <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
	</div><!-- /.col-lg-4 -->
	<div class="col-lg-4">
	    <?php //echo CHtml::image(F::baseUrl().'/images/extension.jpg', '',array('class'=>'thumbnail', 'style'=>'width:140px;height:140px;display:inline')) ?>
	    <h2>海量的主题应用市场</h2>
	    <p>模板皮肤看腻了，功能不够强大？我们引入了第三方开发平台，在这里有众多的主题皮肤和应用插件供你选择，你将找到自己喜爱的皮肤和符合您需求的应用扩展。</p>
	    <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
	</div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="featurette">
	<img class="featurette-image img-circle pull-right" data-src="holder.js/512x512">
	<h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
	<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
    </div>

    <hr class="featurette-divider">

    <div class="featurette">
	<img class="featurette-image img-circle pull-left" data-src="holder.js/512x512">
	<h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
	<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
    </div>

    <hr class="featurette-divider">

    <div class="featurette">
	<img class="featurette-image img-circle pull-right" data-src="holder.js/512x512">
	<h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
	<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->


</div><!-- /.container -->
