<?php
$row=$Item->find($_GET['id']);
?>

<h2 class="ct"><?=$row['name'];?></h2>


<div class='pp all' style="display:flex;margin:2px auto">
    <div class='pp ct' style="width:60%;padding:10px;border:1px solid white">
        <a href="?do=detail&id=<?=$row['id'];?>">
            <img src="upload/<?=$row['img'];?>" style="width:150px;height:120px;">
        </a>
    </div>
    <div style="width:40%">
        <div class="pp" style='padding:5px;border:1px solid white'>
            分類:<?=$Type->find($row['big'])['name'];?> > <?=$Type->find($row['mid'])['name'];?>
        </div>
        <div style='padding:5px;border:1px solid white'>編號:<?=$row['no'];?></div>
        <div class="pp" style='padding:5px;border:1px solid white'>
            價錢:<?=$row['price'];?>
        </div>
        <div class="pp" style='padding:5px;' >簡介:<?=$row['intro'];?>...</div>
        <div class="pp" style='padding:5px;border:1px solid white'>庫存量:<?=$row['stock'];?></div>
    </div>
</div>
<div class="all tt ct">
    購買數量:
    <input type="number" name="qt" id="qt" value='1'>
    <a href="#" onclick="buy()">
        <img src="icon/0402.jpg">
    </a>
</div>
<script>
    function buy(){
        let qt=$("#qt").val();
        location.href=`?do=buycart&id=<?=$_GET['id'];?>&qt=${qt}`
    }
</script>