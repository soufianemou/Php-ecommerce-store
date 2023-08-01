<?php 
    require('../database/conection.php');
    $id = $_GET['id'];
    $sql = "DELETE from admin where id=:id";
    $statement = $connection -> prepare($sql);
    $statement ->execute([':id'=>$id]);
    if($statement){              
        header('location:admins.php');
    }else{
        echo 'error database';
}


?>