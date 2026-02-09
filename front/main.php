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

<h2><?=$nav_str;?></h2>
<?php 
foreach($rows as $row):
?>
<div class='pp' style="display:flex;width:70%;margin:2px auto">
    <div class='pp ct' style="width:40%;padding:10px;border:1px solid white">
        <a href="?do=detail&id=<?=$row['id'];?>">
            <img src="upload/<?=$row['img'];?>" style="width:150px;height:120px;">
        </a>
    </div>
    <div style="width:60%">
        <div class="ct tt" style='padding:5px 2px;border:1px solid white'><?=$row['name'];?></div>
        <div class="pp" style='padding:5px 2px;border:1px solid white'>
            價錢:<?=$row['price'];?>
            <a href="?do=buycart&id=<?=$row['id'];?>&qt=1" style="float:right">
                <img src="icon/0402.jpg" alt="">
            </a>
    </div>
        <div class="pp" style='padding:5px 2px;border:1px solid white'>規格:<?=$row['spec'];?></div>
        <div class="pp" style='padding:5px 2px;' >簡介:<?=mb_substr($row['intro'],0,20);?>...</div>
    </div>
</div>

<?php
endforeach;
?>
