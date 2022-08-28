<?php
include('./base.php');
$res = $Admin->find(['acc'=>$_GET['acc']]);

if(!empty($res)){
    echo 1;
}else{
    echo 0;
}

// echo $res;
?>