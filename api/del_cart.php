<?php 
session_start();
unset($_SESSION['buycart'][$_POST['id']]);