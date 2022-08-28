<?php
include('./base.php');
$res = $Admin->find(['acc'=>$_GET['acc'],'pw'=>$_GET['pw']]);

if(!empty($res)) {
    $_SESSION['user'] = $_GET['acc'];
    echo 1;
}else{
    
    echo 0;
}


?>