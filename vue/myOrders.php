
<?php 
session_start();
if(isset($_SESSION['user'])){?>  


<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9d4783e555.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>My Orders</title>
</head>
<body class="font-[Exo]"> 

<!--start first nav -->
<nav class="bg-[#212529]">
        <div class="hidden lg:flex w-[80%] mx-auto text-xl justify-between h-8 items-center font-bold text-white">
            <div class="">
                <span class="duration-1000 hover:text-orange-600">+212663451109</span>
                <span class="ml-7 duration-1000 hover:text-orange-600">mouahhidisoufiane3@gmail.com</span>
            </div>
            <div class="flex gap-4">
                <span><i class="fa-brands fa-facebook pe-1 cursor-pointer duration-1000 hover:text-orange-600"></i></span>
                <span><i class="fa-brands fa-instagram pe-1 cursor-pointer duration-1000 hover:text-orange-600"></i></span>
                <span><i class="fa-brands fa-linkedin pe-1 cursor-pointer duration-1000 hover:text-orange-600"></i></span>
                <span><i class="fa-brands fa-github pe-1 cursor-pointer duration-1000 hover:text-orange-600"></i></span>
            </div>           
            <div >
                <img src="../assets/img/morocco.png" alt="">
            </div>
        </div>
    </nav>
    <!--end first nav -->
    <?php 
    if(!empty($_SESSION['user']) ){
        $email =$_SESSION['user'] ;
        $pass= $_SESSION['pass'];
        require('../database/conection.php');

        $sql = "SELECT * from userr where email=:email and pass=:pass";
        $statement = $connection -> prepare($sql);
        $statement->execute(['email'=>$email,'pass'=>$pass]);
        $user = $statement -> fetch(PDO::FETCH_ASSOC);
    }
    ?>

    <!--start header -->
    <header class="bg-[#FFD3AC] w-full sticky top-0 z-50 shadow-sm">
        <div class="w-[80%]  mx-auto ">
            <nav class="flex items-center justify-between py-4 ">               
                <button class="lg:hidden" id="menu"><i class="fa-solid fa-bars fa-2x"></i></button>                              
                <h2 class="text-4xl font-bold text-[#FD4112] border-b-4 border-black"><a href="../vue/index.php">Universe store</a></h2>                              
                <ul class="gap-3 lg:gap-5 md:ms-auto ps-14 md:ps-7 me-3 hidden lg:flex">
                    <li class="hover:underline  hover:underline-offset-[12px] decoration-[#ff7d1a] decoration-4 text-xl font-bold "><a href="../vue/menCollection.php">Men</a></li>                                           
                    <li class="hover:underline  hover:underline-offset-[12px] decoration-[#ff7d1a] decoration-4 text-xl font-bold "><a href="../vue/womenCollection.php">Women</a></li>                            
                    <li class="hover:underline  hover:underline-offset-[12px] decoration-[#ff7d1a] decoration-4 text-xl font-bold "><a href="../vue/accessories.php">Accessories</a></li>    
                </ul>
                
                <ul class=" items-center hidden lg:flex">
                <?php 
                    if(isset($_SESSION['user'])){
                        ?>
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class=" ms-5  bg-[#FFD3AC] font-bold rounded-lg text-xl px-3 py-2 text-center inline-flex items-center " type="button">welcome, <?php echo $user['fname'] ?> &nbsp;<i class="fa-solid fa-chevron-up"></i></button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden bg-white  rounded-lg shadow w-44 ">
                            <ul class="py-2 text-sm " aria-labelledby="dropdownDefaultButton">
                            <li><a href="../vue/profile.php" class="block px-4 py-2 hover:bg-[#FFD3AC] text-xl font-bold"><i class="fa-solid fa-user"></i>&nbsp; Profile</a></li>
                            <li><a href="../vue/myOrders.php" class="block px-4 py-2 hover:bg-[#FFD3AC] text-xl font-bold"><i class="fa-solid fa-cart-flatbed"></i>&nbsp; My orders</a></li>
                            <li class="bg-[#FD4112] text-center  px-3 py-1 mt-1 text-xl text-white rounded duration-500 mx-2 hover:text-[#FEBB86]"><a href="../vue/logOut.php" >Log Out</a></li>                
                            </ul>
                        <div>
                        <?php 
                    }else{
                        ?>
                        <li class="bg-[#FD4112]  px-3 py-1 text-xl text-white rounded duration-500 mx-2 hover:text-[#FEBB86]"><a href="../vue/signUp.php" >Sign Up</a></li>
                        <li class="bg-[#FD4112]  px-3 py-1 text-xl text-white rounded duration-500 mx-2 hover:text-[#FEBB86]"><a href="../vue/login.php">Login</a></li>
                        <?php
                    }
                ?> 
                </ul>     
                <?php
                if(isset($_SESSION['userInfo']['id_user'])){
                    $id_user = $_SESSION['userInfo']['id_user'];    
                    $total = isset($_SESSION['cart'][$id_user]) ? count($_SESSION['cart'][$id_user]):0;
                }
                 ?>
                <div class="flex items-center gap-8 relative">
                    <a href="cart.php" id="icon-Card"><i class="fa-solid fa-cart-shopping fa-2x"></i>(<?php echo $total ??'' ?>)</a>
                </div>
            </nav>
            <nav class="h-screen z-40 bg-[#FFD3AC]  ps-[35px] pt-[20px] w-[250px] sm:w-[430px] fixed top-0 left-[-450px] shadow-lg transition-all duration-700" id="nav2">               
                <div>
                    <button id="close"><i class="fa-regular fa-circle-xmark fa-2x hover:shadow-lg rounded-full" style="color: #69707d;"></i></button>
                    <ul class=" flex flex-col gap-10 mt-14 ">
                        <li><a href="../vue/menCollection.php" class=" text-xl font-bold">Men</a></li>                                           
                        <li><a href="../vue/womenCollection.php" class=" text-xl font-bold">Women</a></li>                            
                        <li><a href="../vue/accessories.php" class=" text-xl font-bold">Accessoires</a></li>                                        
                    </ul>
                    <ul class="flex mt-8">
                <?php 
                    if(isset($_SESSION['user'])){
                        ?>
                        <button id="dropdownDefaultButton2" data-dropdown-toggle="dropdown2" class=" bg-[#FFD3AC] font-bold rounded-lg text-xl py-2 text-center inline-flex items-center " type="button">welcome, <?php echo $user['fname'] ?> &nbsp;<i class="fa-solid fa-chevron-up"></i></button>
                        <!-- Dropdown menu -->
                        <div id="dropdown2" class="z-40 hidden bg-white  rounded-lg shadow w-44 ">
                            <ul class="py-2 text-sm " aria-labelledby="dropdownDefaultButton2">
                            <li><a href="../vue/profile.php" class="block px-4 py-2 hover:bg-[#FFD3AC] text-xl font-bold"><i class="fa-solid fa-user"></i>&nbsp; Profile</a></li>
                            <li><a href="../vue/myOrders.php" class="block px-4 py-2 hover:bg-[#FFD3AC] text-xl font-bold"><i class="fa-solid fa-cart-flatbed"></i>&nbsp; My orders</a></li>
                            <li class="bg-[#FD4112] text-center  px-3 py-1 mt-1 text-xl text-white rounded duration-500 mx-2 hover:text-[#FEBB86]"><a href="../vue/logOut.php" >Log Out</a></li>                
                            </ul>
                        <div>                        
                        <?php 
                    }else{
                        ?>
                        <li class="bg-[#FD4112]  px-4 py-2 text-white rounded duration-1000  hover:text-[#FEBB86] text-xl"><a href="../vue/login.php" >Sign Up</a></li>
                        <li class="bg-[#FD4112]  px-4 py-2 text-white rounded duration-1000 mx-2 hover:text-[#FEBB86] text-xl"><a href="../vue/login.php">Login</a></li>
                        <?php
                    }
                ?>
                </div>
            </nav>
            <hr class="border-1 " style="border-top: 1px solid #FD4112;"  >
        </div>
    </header>
    <!--end header-->

<section class="min-h-screen w-full relative ">

<?php 
include('../database/conection.php');
$idUser = $_SESSION['userInfo']['id_user'];
$sql = 'SELECT COUNT(*) AS num_orders FROM orderr WHERE id_user = :id_user;';
$statement = $connection->prepare($sql);
$statement->execute([':id_user' => $id_user]);
$result = $statement->fetch(PDO::FETCH_ASSOC);


if(isset($order['id'])){
    $idOrder = $order['id'];

}

?>


<section class="w-[80%] mx-auto min-h-[calc(100vh-350px)] mt-16">
    <section class="p-4 bg-white min-h-screen ">
            <div class="p-3">   
                <div class="relative overflow-x-auto  sm:rounded-lg mt-6">
                <?php if($result >0){?>
                    <h1 class="font-bold text-4xl mb-16">Your Order (<?php echo $result['num_orders'] ?>):</h1>
                    <table class="w-full text-sm text-center ">
                        <thead class="text-xs uppercase bg-[#ff7d1a] ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Order ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    ID User
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date of Order
                                </th>                             
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>                              
                                <th scope="col" class="px-6 py-3">
                                    Invoice
                                </th>                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql = 'SELECT o.*, u.fname AS fname, u.lname AS lname FROM orderr o INNER JOIN userr u ON o.id_user = u.id_user WHERE o.id_user = :id_user ORDER BY o.date_creation DESC;';
                            $statement = $connection->prepare($sql);
                            $statement->execute([':id_user' => $idUser]);
                            $orders = $statement -> fetchAll(PDO::FETCH_ASSOC);
                            foreach($orders as $order){?>
                            <tr class="hover:bg-[#FFD3AC]">
                                <td class=" py-4  font-bold"><?php echo $order['id'] ?></td>
                                <td class=" py-4  font-bold"><?php echo $order['fname'].' '.$order['lname'] ?></td>
                                <td class=" py-4  font-bold"><?php echo $order['total'] ?>$</td>
                                <td class="px-6 py-4  font-bold"><?php echo $order['date_creation'] ?></td>
                                <td class="px-6 py-4  font-bold">
                                    <?php if($order['valid'] == 0):?>
                                        <span class="bg-red-100 text-red-800 text-xs font-bold mr-2 px-2.5 py-1 rounded-full">in process</span>
                                    <?php else:?>
                                        <span class="bg-green-100 text-green-800 text-xs font-bold mr-2 px-2.5 py-1 rounded-full">Accepted</span>
                                    <?php endif; ?>
                                </td>
                                <?php if($order['valid'] == 1):?>
                                <td class="py-2"><a href="../vue/userInvoice.php?id_order=<?php echo $order['id'] ?>" class=""><i class="fa-solid fa-file-invoice fa-3x" style="color: mediumseagreen;"></i></a></td>
                                <?php else:?>
                                    <td class="py-2">...</td>
                                <?php endif; ?>
                            </tr>
                            <?php }?> 
                        </tbody>
                    </table>
                    
                </div>
                <?php }else{ ?>
                    <h1 class="text-3xl font-bold">You have no Orders</h1>
                <?php } ?>

            </div>
    </section>
</section>


<?php 
   require('../inc/footerFront.php') 
?>

<script src="../back/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

</body>
</html>

<?php 
}else{
    header('location:login.php');
}

?>