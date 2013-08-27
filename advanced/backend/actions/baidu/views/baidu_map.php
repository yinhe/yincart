
<div style="width:620px;">
    <iframe src="<?php echo $this->createUrl('/groupon/ajax/showmap',array('lat'=>$lat,'lng'=>$lng));?>" width="620px" height="500px"></iframe>    
</div>

<script>
    var API={};
    API.map={};
    API.map.show=function(lng , lat){
        var res={
            x:lng,
            y:lat
        };
       setgooglemapclick(null,res);
    };
	function setgooglemapclick(overlay, latlng) {
	
		jQuery('#inputlonglat').val(latlng.y+','+latlng.x);
	};
</script>