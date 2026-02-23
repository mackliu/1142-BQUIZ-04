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
print_r($_SESSION['buycart']);



}




