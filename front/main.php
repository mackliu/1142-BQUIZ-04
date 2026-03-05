<?php 

$nav_str='';
$rows='';
if(isset($_GET['type']) && $_GET['type']!=0){
    $type=$Type->find($_GET['type']);
    if($type['big_id']==0){
        $nav_str=$type['name'];
        $rows=$Item->all(['sh'=>1,'big'=>$type['id']]);

    }else{
        $big=$Type->find($type['big_id']);
        $nav_str=$big['name'] . " > " . $type['name'];
        $rows=$Item->all(['sh'=>1,'mid'=>$type['id']]);
    }

}else{

    $nav_str="全部商品";
    $rows=$Item->all(['sh'=>1]);
}

?>
<style>
.pd{
    padding:5px;
}
.bl{
    border:1px solid white;
}
</style>
<h2><?=$nav_str;?></h2>
<?php 
foreach($rows as $row):
?>
<div class='pp'>
    <div class='pp ct'>
        <a href="?do=detail&id=<?=$row['id'];?>">
            <img src="upload/<?=$row['img'];?>" style="width:150px;">
        </a>
    </div>
    <div>
        <div><?=$row['name'];?></div>
        <div>
            價錢:<?=$row['price'];?>
            <a href="?do=buycart&id=<?=$row['id'];?>&qt=1">
                <img src="icon/0402.jpg" alt="">
            </a>
    </div>
        <div >規格:<?=$row['spec'];?></div>
        <div >簡介:<?=mb_substr($row['intro'],0,20);?>...</div>
    </div>
</div>

<?php
endforeach;
?>
