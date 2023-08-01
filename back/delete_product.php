<?php 
    require('../database/conection.php');
    $id = $_GET['id'];
    $sql = "DELETE from product where id_product=:id";
    $statement = $connection -> prepare($sql);
    $statement ->execute([':id'=>$id]);
    if($statement){              
        header('location:products.php');
    }else{
        echo 'error database';
}


?>