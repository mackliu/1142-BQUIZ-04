<h2 class="ct">填寫資料</h2>
<form action="api/save_order.php" method="post">
<?php
$user=$Mem->find(['acc'=>$_SESSION['mem']]);
?>
<div class="all">
    <div>
        登入帳號:<?=$user['acc'];?>
    </div>
    <div>
        姓名:<input type="text" name="name" value="<?=$user['name'];?>">
    </div>
    <div>
        電子信箱:<input type="text" name="email" value="<?=$user['email'];?>">
    </div>
    <div>
        聯絡地址:<input type="text" name="address" value="<?=$user['address'];?>">
    </div>
    <div>
       聯絡電話:<input type="text" name="tel" value="<?=$user['tel'];?>">
    </div>

</div>

<div class="all">

<?php
    $sum=0;
    foreach($_SESSION['buycart'] as $id => $qt):
        $item=$Item->find($id);
?>

   <div>
    <div>商品名稱:<?=$item['name'];?></div>
    <div>編號:<?=$item['no'];?></div>
    <div>數量:<input type="number" value="<?=$qt;?>" style='width:35px'></div>
    <div>單價:<?=$item['price'];?></div>
    <div>小計:<?=$item['price'] * $qt;?></div>
    </div> 

<?php

    $sum +=$item['price'] * $qt;
  endforeach;
?>

</div>
  <div class="all tt ct">總價:<?=$sum;?></div>
  <input type="hidden" name="sum" value="<?=$sum;?>">
  <div class="ct">
    <input type="submit" value="確定送出">
    <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'">
  </div>
  </form>