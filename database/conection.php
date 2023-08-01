<?php 

$servername = 'localhost'; 
$username = 'root';
$password = '';

try{  
    $connection = new PDO("mysql:host=$servername;dbname=shop",$username,$password);


}catch(PDOException $e){
    echo 'error'.$e->getMessage();
}

?>