<?php
include('./base.php');
$Que->save(['name'=>$_POST['name'],'sum'=>0,'sh'=>1]);

$queId = $Que->find(['name'=>$_POST['name']])['id'];

foreach ($_POST['opts'] as $key => $opt) {
    $Opt->save(['name'=>$opt,'sum'=>0,'parent'=>$queId]);
}

to('../back.php?do=que');
?>