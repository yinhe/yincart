<?php

/**
* AdGallery
*
* Uses ad-gallery from here http://coffeescripter.com/code/ad-gallery/
* Makes a gallery for you that displays several images
*
* Example Usage: (Please note, all config options are optional, only a list of images is necessary)
* 	$this->widget('ext.adGallery.AdGallery',
*			array(
*				'imageList' => array(
*					array(
*						'image_url' => 'images/1.jpg',
*						'thumb_url' => 'images/thumbs/t1.jpg',
*						'title' => 'Test tile',
*						'link' => 'http://www.google.com/',
*						'alt' => 'Something something',
*					),
*					array(
*						'image_url' => 'images/2.jpg',
*						'title' => 'Test tile sdfjaskdf',
*						'link' => 'http://www.msn.com/',
*					),
*					'images/3.jpg',
*					'images/4.jpg',
*					'images/5.jpg',
*					'images/6.jpg',
*					'images/7.jpg',
*					'images/8.jpg',
*					'images/9.jpg',
*					'images/10.jpg',
*					'images/11.jpg',
*					'images/12.jpg',
*				),
*			)
*		);
*
* @author Corey Tisdale
* @copyright Copyright &copy; 2010
*
*/

class AdGallery extends CWidget
{
	/****** widget options ******/
	
	/**
	* @boolean whether or not to show the widget
	*/
	public $visible				= true;
	
	/**
	* @string the url of a css file to load instead of the default
	*/
	public $cssFile				= null;
	
	/**
	* @string the css class of the container div
	*/
	public $cssClass			= 'adGallery';
	
	/**
	* @string the css id of the container div
	*/
	public $cssId				= null; //will be automatically set if not provided
	
	/**
	* @array the list of images to render. Can be in one of
	* two formats (you can mix formats in one array):
	*
	* Simple:
	* array(
	*	  'image/url/1.jpg',
	*	  'image/url/2.jpg',
	* )
	*
	* or
	*
	* Detailed:
	* array(
	*	  array(
	*		'thumb_url' => 'image/thumb/1.jpg', //optional, smaller thumb to load before big image
	*		'image_url' => 'image/big/1.jpg',
	*		'title' => 'Some title here', //optional, will display on top of big image
	*		'link' => 'http://my.place.com/link', //optional, will go here when big image clicked on
	*	  ),
	*	  array(
	*		'thumb_url' => 'image/thumb/2.jpg', //optional, smaller thumb to load before big image
	*		'image_url' => 'image/big/2.jpg',
	*		'title' => 'Some other title here', //optional, will display on top of big image
	*		'link' => 'http://my.place.com/link2', //optional, will go here when big image clicked on
	*	  ),
	* )
	*/
	public $imageList			= array();

	/******* widget private vars *******/
	private $baseUrl			= null;
	private $defaultCssFile		= '/lib/jquery.ad-gallery.css'; //Only used if $cssFile is null (if css file was not overriden by user)
	private $jsFiles			= array(
									'/lib/jquery.ad-gallery.min.js',
								);

	/******* ad-gallery Options *******/
	/**
	* @string the url of the image to use when images are loading
	*/
	public $agLoaderImage					= '/lib/loader.gif'; //Not customizable at the moment, could be soon
	
	/**
	* @integer the width of the gallery big image in pixels
	*/
	public $agWidth							= 450;
	
	/**
	* @integer the height of the gallery big image in pixels
	*/
	public $agHeight						= 300;

	/**
	* @integer the width of the gallery thumb image in pixels. Null means use actual image size
	*/
	public $agThumbWidth					= null;
	
	/**
	* @integer the height of the gallery thumb image in pixels. Null means use actual image size
	*/
	public $agThumbHeight					= 75;

	/**
	* @float A value between 0 and 1 that dictates how opaque thumbnails will be. 1 removes fade effect
	*/
	public $agThumbOpacity					= 0.7; // Opacity that the thumbs fades to/from, (1 removes fade effect)
	
	/**
	* @integer the index of the gallery images to start at
	*/
	public $agStartAtIndex					= 0; // Which image should be displayed at first? 0 is the first image
	
	/**
	* @string Either false for default positioning or a jQuery object representing where to put the description
	*/
	public $agDescriptionWrapper			= 'false'; // Either false (string value 'false', not boolean false)or a jQuery object, if you want the image descriptions	to be placed somewhere else than on top of the image
	
	/**
	* @string String values 'true' or 'false' (not boolean true or false). Determinse whether or not to animate in first image
	*/
	public $agAnimateFirstImage				= 'false'; // Should first image just be displayed, or animated in?
	
	/**
	* @integer the animation speed for the effects between images
	*/
	public $agAnimationSpeed				= 400; // Which ever effect is used to switch images, how long should it take?
	
	/**
	* @string String values 'true' or 'false' (not boolean true or false). Whether or not to allow navigation by clicking the sides of the image
	*/
	private $agDisplayNextAndPrev			= 'true'; // Can you navigate by clicking on the left/right on the image?

	/**
	* @string String values 'true' or 'false' (not boolean true or false) If you are allowed to scroll through the thumb list
	*/
	public $agDisplayBackAndForward			= 'true'; // Are you allowed to scroll the thumb list?

	/**
	* @integer How many images to scroll at a time. If 0, it jumps the width of the container
	*/
	public $agScrollJump					= 0; // If 0, it jumps the width of the container
	
	/**
	* @string String values 'true' or 'false' (not boolean true or false). Whether or not to enable the slide show
	*/
	public $agSlideShowEnable				= 'true';
	
	/**
	* @string String values 'true' or 'false' (not boolean true or false) Whether to auto start slideshow
	*/
	public $agSlideShowAutoStart			= 'false';
	
	/**
	* @integer the speed in miliseconds between slides in the slideshow
	*/
	public $agSlideShowSpeed				= 5000;
	
	/**
	* @string The label for the link to start the slideshow
	*/
	public $agSlideShowStartLabel			= 'Start';
	
	/**
	* @string String The label for the link to stop the slideshow
	*/
	public $agSlideShowStopLabel			= 'Stop';
	
	/**
	* @string String values 'true' or 'false' (not boolean true or false) Whether or not to stop the slideshow on scroll
	*/
	public $agSlideShowStopOnScroll			= 'true';
	
	/**
	* @string The prefix for the countdown timer
	*/
	public $agSlideShowCountdownPrefix		= '(';
	
	/**
	* @string The suffix for the countdown timer
	*/
	public $agSlideShowCountdownSuffix		= ')';
	
	/**
	* @string The callback function for the slideshow start
	*/
	public $agSlideShowOnStart				= null;
	
	/**
	* @string The callback function for the slideshow stop
	*/
	public $agSlideShowOnStop				= null;
	
	/**
	* @string The effect for changing images. Can be 'slide-hori' or 'slide-vert', 'resize', 'fade', 'none' or false
	*/
	public $agEffect						= 'fade'; //'slide-hori' or 'slide-vert', 'resize', 'fade', 'none' or false
	
	/**
	* @string String values 'true' or 'false' (not boolean true or false) Whether to move between images with the keyboard
	*/
	public $agEnableKeyboardMove			= 'false'; // Move to next/previous image with keyboard arrows?
	
	/**
	* @string String values 'true' or 'false' (not boolean true or false) Whether you can go from the last image to the first and visa versa
	*/
	public $agCycle							= 'true'; // If set to false, you can't go from the last image to the first, and vice versa
	
	/**
	* @string The javascript callback function for the init event of the gallery
	*/
	public $agCallbacksInit					= null;
	
	/**
	* @string The javascript callback function for before each image is visible
	*/
	public $agCallbacksBeforeImageVisible	= null;
	
	/**
	* @string The javascript callback function for after each image is visible
	*/
	public $agCallbacksAfterImageVisible	= null;

	/**
	* Initialize the widget
	*/
	public function init()
	{
		// Don't do anything if I'm not visible
		if(!$this->visible) {
			return;
		}
		
		//If we have no images, just don't do anything
		if( !is_array($this->imageList) || count($this->imageList) === 0 ) {
			$this->visible = false;
			return;
		}
		
		//Set css Id
		if(is_null($this->cssId))
			$this->cssId = 'adGallery' . $this->getId();

		//Publish assets
		$this->publishAssets();
		$this->registerCSSFiles();
		$this->registerClientScripts();

		parent::init();
	}
	
	
	/**
	* Publishes the assets
	*/
	public function publishAssets()
	{
		$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
		$this->baseUrl = Yii::app()->getAssetManager()->publish($dir);
	}
	
	/**
	* Registers the external javascript files
	*/
	public function registerClientScripts()
	{
		// add the css
		if ($this->baseUrl === '')
			throw new CException(Yii::t('AdGallery', 'baseUrl must be set. This is done automatically by calling publishAssets()'));

		// add the core script
		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		
		//Register the main script files
		foreach($this->jsFiles as $jsFile) {
			$galleryJsFile = $this->baseUrl . $jsFile;
			$cs->registerScriptFile($galleryJsFile, CClientScript::POS_HEAD);
		}

		//Register the widget-specific script on ready
		$js = $this->generateOnloadJavascript();
		$cs->registerScript('adGallery'.$this->getId(), $js, CClientScript::POS_READY);
	}
	
	protected function generateOnloadJavascript() {
		//Gallery javascript
		$js = "\$('#{$this->cssId}').adGallery({
				loader_image: '{$this->baseUrl}{$this->agLoaderImage}',
				width: {$this->agWidth},
				height: {$this->agHeight},
				thumb_opacity: {$this->agThumbOpacity},
				start_at_index: {$this->agStartAtIndex},
				description_wrapper: {$this->agDescriptionWrapper},
				animate_first_image: {$this->agAnimateFirstImage},
				animation_speed: {$this->agAnimationSpeed},
				display_next_and_prev: {$this->agDisplayNextAndPrev},
				display_back_and_forward: {$this->agDisplayBackAndForward},
				scroll_jump: {$this->agScrollJump},
				slideshow: {
					enable: {$this->agSlideShowEnable},
					autostart: {$this->agSlideShowAutoStart},
					speed: {$this->agSlideShowSpeed},
					start_label: '{$this->agSlideShowStartLabel}',
					stop_label: '{$this->agSlideShowStopLabel}',
					stop_on_scroll: {$this->agSlideShowStopOnScroll},
					countdown_prefix: '{$this->agSlideShowCountdownPrefix}',
					countdown_sufix: '{$this->agSlideShowCountdownSuffix}',\n";
					
				if(!is_null($this->agSlideShowOnStart))
					$js .= "onStart: {$this->agSlideShowOnStart},\n";

				if(!is_null($this->agSlideShowOnStop))
					$js .= "onStop: {$this->agSlideShowOnStop},\n";

		$js .= "},
				effect: '{$this->agEffect}',
				enable_keyboard_move: {$this->agEnableKeyboardMove},
				cycle: {$this->agCycle},
				callbacks: {\n";
				
				if(!is_null($this->agCallbacksInit))
					$js .= "init: {$this->agCallbacksInit},\n";

				if(!is_null($this->agCallbacksAfterImageVisible))
					$js .= "afterImageVisible: {$this->agCallbacksAfterImageVisible},\n";

				if(!is_null($this->agCallbacksBeforeImageVisible))
					$js .= "beforeImageVisible: {$this->agCallbacksBeforeImageVisible},\n";

		$js .= "}
			});";
			
		if(!is_null($this->agThumbHeight) || !is_null($this->agThumbWidth)) { //Only set the thumb size if they are overridden, otherwise let them be whatever
			$js .= " \$('#{$this->cssId} .ad-thumbs img').each(function(index) { ";
			
			if( !is_null($this->agThumbHeight) )
				$js .= " \$(this).height({$this->agThumbHeight}); ";
				
			if( !is_null($this->agThumbWidth) )
				$js .= " \$(this).height({$this->agThumbWidth}); ";
				
			$js .= " }); ";
		}
		
		$js .= " \$('#{$this->cssId} .ad-thumbs').each(function(index) { \$(this).height(\$('#{$this->cssId} .ad-thumbs img').outerHeight(true)); }); "; //Sometimes the image thumb container load funny
		$js .= " \$('#{$this->cssId} .ad-gallery').each(function(index) { $(this).width({$this->agWidth}); }); "; //Takes care of the height in Chrome
		$js .= " \$('#{$this->cssId} .ad-image-wrapper').each(function(index) { $(this).width({$this->agWidth}); }); "; //Heard from community ad-image-wrapper should be larger as well
		
		return $js;
	}

	/**
	* Registers the external CSS files
	*/
	public function registerCssFiles()
	{
		if ($this->baseUrl === '')
			throw new CException(Yii::t('AdGallery', 'baseUrl must be set. This is done automatically by calling publishAssets()'));

		$cs=Yii::app()->getClientScript();

		//Register the user's css if it was set, or the default if it was not
		if(is_null($this->cssFile))
			$url=$this->baseUrl.$this->defaultCssFile;
		else
			$url = $this->cssFile;

		$cs->registerCssFile($url,'screen, projector');
	}

	/**
	* Run the widget
	*/
	public function run()
	{
		if(!$this->visible)
			return

		//Render AdGallery template
		$this->getViewFile('adGallery'); //Why do I have to do this? Unkown but rendering the file doesn't work unless I call this
		$this->render('adGallery',
			array(
				'imageList' => $this->imageList
			)
		);
		parent::run();
	}
}