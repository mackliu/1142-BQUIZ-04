<?php 
session_start();

unset($_SESSION['admin']);
unset($_SESSION['mem']);

to("../index.php");