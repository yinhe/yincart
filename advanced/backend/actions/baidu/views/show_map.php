<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;}
#options{
    position: absolute;
    top:3px;
    left: 45px;
}
#keywords{
    margin:1px 5px 0 0;
}
.fields{ 

}
.fields label{

}
.fields input{

}
#res{
    background-color:#ffffff;position:absolute;left:0px;top:25px;width: 358px;font-family: arial,sans-serif; border: 1px solid rgb(153, 153, 153); font-size: 12px;
}
#res ol{
    list-style: none outside none; padding: 0pt; margin: 0pt;
}
#res li{
    margin: 2px 0pt; padding: 0pt 5px 0pt 3px; cursor: pointer; overflow: hidden; line-height: 17px;
}
#res .res_title{
    padding-left:10px;margin-right:3px
}

#res .res_desc{
    color:#666;
}

#res .res_title_text{
    color:#00c;text-decoration:underline
}
.hidden{
    display: none;
}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=D851d506d0e18f9dcc63bacc83cbd697"></script>
<?php // Yii::app()->clientScript->registerCoreScript('jquery');?>
<title>添加普通标注点</title>
</head>
<body>
<div id="allmap"></div>
<div id="options">
    <div class="fields">
        <input id="keywords" size="50" type="text" name="keywords"/><input type="button" class="btn btn-info" id="s_but" value="搜索"/>
        <div id="res" class="hidden">
            <ol id="res_list">

            </ol>
            <img id="close_res_pan" src="http://api.map.baidu.com/images/iw_close.gif" style="position: absolute; top: 0px;left: 344px; width: 12px; height: 12px; cursor: pointer; z-index: 10000;">
        </div>

    </div>
</div>
</body>
</html>
<script type="text/javascript">
// 百度地图API功能
var map = new BMap.Map("allmap");
var point = new BMap.Point(<?php echo $lng ?>, <?php echo $lat; ?>);
map.addControl(new BMap.NavigationControl());  
map.addControl(new BMap.OverviewMapControl());
map.centerAndZoom(point, 13);
map.setDefaultCursor('cell');
addMarker(map, point, '');
            
var txtMenuItem = [
    {
        text:'附近的公交',
        callback:function(p){
            map.clearOverlays();
            addMarker(map,p,0);
            if(parent.API)
                parent.API.map.show(p.lng , p.lat);
        }
    },
    {
        text:'放大',
        callback:function(){map.zoomOut()}
    },
    {
        text:'缩小',
        callback:function(){map.zoomIn()}
    },
    {
        text:'放置到最大级',
        callback:function(){map.zoomTo(18)}
    }
];
var menu = new BMap.ContextMenu();
for(var i=0; i < txtMenuItem.length; i++){
    menu.addItem(new BMap.MenuItem(txtMenuItem[i].text,txtMenuItem[i].callback,100));
}
map.addContextMenu(menu);

var res_template='<li class="res_item" data="{data}"><span class="res_title">{num}.</span><span class="res_title_text"><b>{title}</b></span><span class="res_desc"> - {desc}</span></li>';

var local = new BMap.LocalSearch(map, {  
    renderOptions: {map: map},
    onSearchComplete: function(results){
        $('#res_list').html('');
        // 判断状态是否正确
        if (local.getStatus() == BMAP_STATUS_SUCCESS){
            $('#res').removeClass('hidden');
            var s = [];

            for (var i = 0; i < results.getCurrentNumPois(); i ++){
                var html=res_template;
                html=html.replace('{num}',i+1);
                html=html.replace('{data}',results.getPoi(i).point.lng+','+results.getPoi(i).point.lat);
                html=html.replace('{title}',results.getPoi(i).title);
                html=html.replace('{desc}',results.getPoi(i).address);
                s.push(html);
            }
            $('#res_list').html(s.join(""));
        }
    }
});
$(document).ready(function(){

    $('#close_res_pan').click(function(){
        $('#res').toggleClass('hidden');
    });
    $('#s_but').click(function(){

        local.search($('#keywords').val());
    });

    $('#keywords').keypress(function(){
        local.search($('#keywords').val());
    });

    $('.res_item').live('click', function() {
        map.clearOverlays();
        var data=$(this).attr('data');
        var lnglat=data.split(',');
        addMarker(map,new BMap.Point(lnglat[0], lnglat[1]), 1);
        $('#res').toggleClass('hidden');
        if(parent.API)
            parent.API.map.show(lnglat[0] , lnglat[1]);
    });
    map.addEventListener("click", function(e){
        map.clearOverlays();
        addMarker(map,e.point, 0);

        if(parent.API)
            parent.API.map.show(e.point.lng , e.point.lat);
    });
});

function showMessage(map,point,title,message){
    var opts = {    
        width : 250,     // 信息窗口宽度  
        height: 100,     // 信息窗口高度 
        title : title  // 信息窗口标题  
    };
    var infoWindow = new BMap.InfoWindow(message, opts);  // 创建信息窗口对象  

    map.openInfoWindow(infoWindow, point);      // 打开信息窗口   
}
function addMarker(map,point, message){
    message=message+"";
    map.centerAndZoom(point);
    map.closeInfoWindow();
    var myIcon = new BMap.Icon("http://api.map.baidu.com/images/marker_red_sprite.png", new BMap.Size(46, 50), {
        anchor: new BMap.Size(20, 0)
    });

    if(message.length<2){
        var myGeo = new BMap.Geocoder();  
        // 根据坐标得到地址描述  
        myGeo.getLocation(point, function(result){

            if (result){
                var gjlocal = new BMap.LocalSearch(map, {
                    renderOptions:{ autoViewport:true},
                    onSearchComplete: function(results){
                        // if (gjlocal.getStatus() == BMAP_STATUS_SUCCESS){

                        var s = [];

                        for (var i = 0; i < results.getCurrentNumPois(); i ++){
                            if(results.getPoi(i).type==BMAP_POI_TYPE_BUSSTOP)
                                s.push(results.getPoi(i).address);
                        }
                        showMessage(map,point,'地址信息:',result.address+"<br>"+"公交线路:<br>"+s.join(","));
                        //}    
                    }
                });
                gjlocal.searchNearby("公交", point,1000);
            }  
        });  
    }else{
        showMessage(map,point,'地址信息',message);
    }

    // 创建标注对象并添加到地图  
    marker = new BMap.Marker(point, {icon: myIcon});
//    marker.enableDragging();  
//    marker.addEventListener("dragend", function(e){
//        var myGeo = new BMap.Geocoder(); 
//        var point=e.point;
//        // 根据坐标得到地址描述  
//        myGeo.getLocation(point, function(result){
//
//            if (result){
//                var gjlocal = new BMap.LocalSearch(map, {
//                    renderOptions:{ autoViewport:true},
//                    onSearchComplete: function(results){
//                        // if (gjlocal.getStatus() == BMAP_STATUS_SUCCESS){
//
//                        var s = [];
//
//                        for (var i = 0; i < results.getCurrentNumPois(); i ++){
//                            if(results.getPoi(i).type==BMAP_POI_TYPE_BUSSTOP)
//                                s.push(results.getPoi(i).address);
//                        }
//                        showMessage(map,point,'地址信息:',result.address+"<br>"+"公交线路:<br>"+s.join(","));
//                        //}    
//                    }
//                });
//                gjlocal.searchNearby("公交", point,1000);
//
//            }  
//        });  
//        if(parent.API)
//            parent.API.map.show(e.point.lng , e.point.lat);
//    });
    map.addOverlay(marker);  
} 
</script>