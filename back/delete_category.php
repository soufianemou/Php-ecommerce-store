<?php 
    require('../database/conection.php');
    $id = $_GET['id'];
    $sql = "DELETE from category where id_category=:id";
    $statement = $connection -> prepare($sql);
    $statement ->execute([':id'=>$id]);
    if($statement){              
        header('location:categories.php');
    }else{
        echo 'error database';
}


?>