<?php
$row=$Item->find($_GET['id']);
?>

<h2 class="ct"><?=$row['name'];?></h2>


<div>
    <div>
        <a href="?do=detail&id=<?=$row['id'];?>">
            <img src="upload/<?=$row['img'];?>">
        </a>
    </div>
    <div>
        <div>
            分類:<?=$Type->find($row['big'])['name'];?> > <?=$Type->find($row['mid'])['name'];?>
        </div>
        <div>編號:<?=$row['no'];?></div>
        <div>
            價錢:<?=$row['price'];?>
        </div>
        <div>簡介:<?=$row['intro'];?>...</div>
        <div>庫存量:<?=$row['stock'];?></div>
    </div>
</div>
<div>
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