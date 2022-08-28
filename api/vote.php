<?php
include('./base.php');
$que = $Que->find($_POST['id']);
$que['sum']++;
$Que->save($que);

$opt = $Opt->find($_POST['opt']);
$opt['sum']++;
$Opt->save($opt);
?>