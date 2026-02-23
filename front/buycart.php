<?php 

if(!isset($_SESSION['mem'])){
  header("location:?do=login");
  exit();
}


