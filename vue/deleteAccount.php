<?php 
    require('../database/conection.php');
    $id = $_GET['id'];
    $sql = "DELETE from userr where id_user=:id";
    $statement = $connection -> prepare($sql);
    $statement ->execute([':id'=>$id]);
    if($statement){
        session_start();
        session_unset();
        session_destroy();
        header('location:index.php');
    }else{
        echo 'error database';
}


?>