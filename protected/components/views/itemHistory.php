<ul>
<?php 
if ($this->getItems()) {
//    echo '1';
    exit;
    foreach ($this->getItems() as $item){
        
?>
    <li><div class="i-img"><?php echo $item->getRecentThumb() ?></div><div class="i-name"><?php echo $item->getTitle() ?></div></li>
<?php }}else{
    echo '<div style="padding:20px">没有商品浏览记录!</div>';
} ?>    
</ul>
