Unzip and move the adGallery folder to your extensions folder.

Please look at the source to find all the options. The only required option is the imageList,
but many options exist. Any variable prefixed with ag is a match to the variables described here:

http://coffeescripter.com/code/ad-gallery/

Any other variables pertain to the widget itself inside the yii framework.

Example Usage:
	$this->widget('ext.adGallery.AdGallery',
			array(
				'imageList' => array(
					array(
						'image_url' => 'images/1.jpg',
						'thumb_url' => 'images/thumbs/t1.jpg',
						'title' => 'Test tile',
						'link' => 'http://www.google.com/',
						'alt' => 'Something something',
					),
					array(
						'image_url' => 'images/2.jpg',
						'title' => 'Test tile sdfjaskdf',
						'link' => 'http://www.msn.com/',
					),
					'images/3.jpg',
					'images/4.jpg',
					'images/5.jpg',
					'images/6.jpg',
					'images/7.jpg',
					'images/8.jpg',
					'images/9.jpg',
					'images/10.jpg',
					'images/11.jpg',
					'images/12.jpg',
				),
			)
		);