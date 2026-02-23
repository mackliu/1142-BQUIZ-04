<?php 

if(isset($_GET['id'])){
    $_SESSION['buycart'][$_GET['id']]=$_GET['qt'];
}

if(!isset($_SESSION['mem'])){
  header("location:?do=login");
  exit();
}

if(empty($_SESSION['buycart'])){
    echo "<h2 class='ct'>購物車內沒有商品</h2>";
}else{
?>
<h2 class="ct"><?=$_SESSION['mem'];?> 的購物車</h2>
<table class="all">
   <tr class="tt ct">
    <td>編號</td>
    <td>商品名稱</td>
    <td>數量</td>
    <td>庫存量</td>
    <td>單價</td>
    <td>小計</td>
    <td>刪除</td>
   </tr> 

<?php
    foreach($_SESSION['buycart'] as $id => $qt):
        $item=$Item->find($id);
?>

   <tr class="pp ct">
    <td><?=$item['no'];?></td>
    <td><?=$item['name'];?></td>
    <td><input type="number" value="<?=$qt;?>" style='width:35px'></td>
    <td><?=$item['stock'];?></td>
    <td><?=$item['price'];?></td>
    <td><?=$item['price'] * $qt;?></td>
    <td>
        <a href="#" onclick="delItem(<?=$id;?>)">
        <img src="icon/0415.jpg" alt="">
    </a>
    </td>
   </tr> 



<?php
  endforeach;
?>

  </table>
  <div class="ct">
      <img src="icon/0411.jpg" onclick="location.href='index.php'">
      <img src="icon/0412.jpg" onclick="location.href='?do=checkout'">
  </div>
<?php
}
?>



<script>
function delItem(id){
    $.post("api/del_cart.php",{id},()=>{
        location.href="?do=buycart";
    })
}
</script>
