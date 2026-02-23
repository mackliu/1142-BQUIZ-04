<h2 class="ct">填寫資料</h2>
<form action="api/save_order.php" method="post">
<?php
$user=$Mem->find(['acc'=>$_SESSION['mem']]);
?>
<table class="all">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp"><?=$user['acc'];?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" value="<?=$user['name'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" value="<?=$user['email'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><input type="text" name="address" value="<?=$user['address'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡電話</td>
        <td class="pp"><input type="text" name="tel" value="<?=$user['tel'];?>"></td>
    </tr>

</table>

<table class="all">
   <tr class="tt ct">
    <td>商品名稱</td>
    <td>編號</td>
    <td>數量</td>
    <td>單價</td>
    <td>小計</td>
   </tr> 

<?php
    $sum=0;
    foreach($_SESSION['buycart'] as $id => $qt):
        $item=$Item->find($id);
?>

   <tr class="pp ct">
    <td><?=$item['name'];?></td>
    <td><?=$item['no'];?></td>
    <td><input type="number" value="<?=$qt;?>" style='width:35px'></td>
    <td><?=$item['price'];?></td>
    <td><?=$item['price'] * $qt;?></td>
   </tr> 

<?php

    $sum +=$item['price'] * $qt;
  endforeach;
?>

  </table>
  <div class="all tt ct">總價:<?=$sum;?></div>
  <input type="hidden" name="sum" value="<?=$sum;?>">
  <div class="ct">
    <input type="submit" value="確定送出">
    <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'">
  </div>
  </form>