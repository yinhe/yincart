

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

    <!-- Example row of columns -->
    <div class="row">
        <div class="col-lg-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div>
    </div>


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
