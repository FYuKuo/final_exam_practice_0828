<?php
include('./base.php');
foreach ($_POST['del'] as $key => $id) {

    $Admin->del($id);

}
?>