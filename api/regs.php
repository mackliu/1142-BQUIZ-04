<?php include_once "db.php";

$Mem->save($_POST);
to("../admin.php?do=mem");