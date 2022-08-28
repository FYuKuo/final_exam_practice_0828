<?php
include('./base.php');

$res = $Admin->find(['email'=>$_GET['email']]);

if(!empty($res)){
    echo "您的密碼為:".$res['pw'];
}else{
    echo '查無此資料';
}

?>