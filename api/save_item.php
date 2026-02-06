<?php include_once "db.php";
$Item->save($_POST);

to("../admin.php?do=th");