<?php
include('./base.php');
$user = $Admin->find(['acc'=>$_POST['acc']]);

if(empty($user)){

    $Admin->save(['acc'=>$_POST['acc'],'pw'=>$_POST['pw'],'email'=>$_POST['email']]);

    echo 1;
}else{
    echo 0;
}

?>