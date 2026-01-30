<?php
include_once "db.php";

$Bot->save($_POST);

to("../admin.php?do=bot");