<?php
include('./base.php');
$_POST['sh'] = 1;
$_POST['good'] = 0;

$News->save($_POST);
?>