<?php include_once "db.php";

$_GET['acc'];

if($Mem->count(['acc'=>$_GET['acc']])>0){
    echo 1;
}else{
    echo 0;
}