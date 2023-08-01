<?php 
$id = $_GET['id'];
$valid = $_GET['valid'];

require('../database/conection.php');
$sql = "UPDATE orderr set valid=:valid  where id=:id";
$statement = $connection->prepare($sql);
$statement ->execute(['valid'=>$valid,':id'=>$id]);
header("location:orders.php")

?>