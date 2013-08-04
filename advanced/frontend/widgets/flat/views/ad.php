<?php 

foreach($ads as $ad){
      $items[] = $ad ->getAd();   
    }

echo TbHtml::carousel($items); 