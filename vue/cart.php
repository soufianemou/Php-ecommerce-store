<?php 
session_start();
if(isset($_SESSION['user'])){?>
<?php 
// this code for empty the cart of the user
if(isset($_POST['Clear'])){
    $id_user = $_SESSION['userInfo']['id_user'];
    $_SESSION['cart'][$id_user] = [];
    header('location:cart.php');
}

?>


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

    <title>universe store</title>
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
                $id_user = $_SESSION['userInfo']['id_user'];    
                $total = isset($_SESSION['cart'][$id_user]) ? count($_SESSION['cart'][$id_user]):0
                 ?>
                <div class="flex items-center gap-8 relative">
                    <a href="cart.php" id="icon-Card"><i class="fa-solid fa-cart-shopping fa-2x"></i>(<?php echo $total ?>)</a>
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
    <!-- end header -->


    <section class="w-[80%] mx-auto min-h-[calc(100vh-100px)]">
        <div class="mt-[100px] overflow-x-auto">
            <?php 
                require('../database/conection.php');
                $id_user = $_SESSION['userInfo']['id_user'];
                if(isset($_SESSION['cart'])){
                    $cart = $_SESSION['cart'][$id_user];
                    $idProducts = array_keys($cart);
                    $idProducts = implode(',',$idProducts);

                }
                if(empty($cart)){
                    ?>
                    <section class="w-[80%] mx-auto">
                        <h1 class="text-white bg-yellow-300 p-5 rounded-lg text-4xl">Your cart is empty</h1>       
                    </section>
                    <?php  
                }else{
                    $sql = "SELECT * FROM product WHERE id_product  in ($idProducts)";
                    $statement = $connection -> prepare($sql);
                    $statement->execute();
                    $products = $statement -> fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                    if(isset($_SESSION['userInfo']['id_user'])){
                        $id_user = $_SESSION['userInfo']['id_user'];    
                        $total = isset($_SESSION['cart'][$id_user]) ? count($_SESSION['cart'][$id_user]):0;
                    }
                    ?>
                    <h1 class="text-2xl font-bold">Your cart (<?php echo $total ?>)</h1>
                    <table class="w-full text-sm text-center mt-8">
                        <thead class="text-xs uppercase bg-[#ff7d1a] ">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Product Image</th>
                                <th scope="col" class="px-6 py-3">Product Name</th>
                                <th scope="col" class="px-6 py-3">Quantity</th>
                                <th scope="col" class="px-6 py-3">Price</th>                         
                                <th scope="col" class="px-6 py-3">Tolal</th>                         
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $Total=0;
                        foreach($products as $product){?>
                            <tr class="hover:bg-[#FFD3AC]">
                                <td class=" py-4  font-medium"><?php echo $product['id_product'] ?></td>
                                <td class=" py-4  font-medium"><img width="80px" src="../upload/<?php echo $product['image_product'] ?>" alt=""></td>
                                <td class=" py-4  font-medium"><?php echo $product['libell'] ?></td>
                                <td class=" py-4  font-medium">
                                <?php 
                                    if(isset($_SESSION['userInfo'])){
                                    $idUtilisatuer = $_SESSION['userInfo']['id_user'];
                                    $qt = $_SESSION['cart'][$idUtilisatuer][$product['id_product']] ?? 1;
                                    $piceTotal = $product['price'] *  $qt;
                                    $Total = $Total + $piceTotal;
                                    }  
                                    ?>
                                    
                                    <form class="flex gap-3 flex-col md:flex-row" action="add_cart.php" method="post">
                                        <div class="flex justify-center">
                                            <span class="px-4 py-2 text-[#ff7d1a] font-bold cursor-pointer bg-[#f2f2f2] rounded-l-lg mins" id="">-</span>
                                            <input name="qt" class=" w-full text-center px-3 py-2 bg-[#f2f2f2] font-bold  qt" id="" value="<?php echo $qt ?? 1; ?>"></input>
                                            <span class="px-4 py-2 text-[#ff7d1a] font-bold cursor-pointer bg-[#f2f2f2] rounded-r-lg add" id="">+</span>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $product['id_product'] ?>">
                                        <input style="background-color:#ff7d1a ;" class="cursor-pointer justify-center text-[#f2f2f2] font-bold px-4 rounded-lg shadow-lg" type="submit" value="Update">
                                        <input style="background-color:red ;" formaction="delete_cart.php" class="cursor-pointer justify-center text-[#f2f2f2] font-bold px-4 rounded-lg shadow-lg" type="submit" value="Delete">
                                    </form>
                                </td>
                                <td class=px-6 py-4  font-medium"><?php echo $product['price'] ?>$</td>
                                <td class=" py-4  font-medium"><?php echo ($product['price'] *  $qt )?>$</td>
                            </tr> 
                        <?php }?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" class="px-6 py-3 text-xl">Total for pay :</th>
                                <td colspan="2" class="px-6 py-3"></td>
                                <th colspan="2" class="text-2xl py-3"><?php echo $Total ?>$</th>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td >
                                    <form action="cart.php" class="flex gap-3" method="post" id="form">
                                        <input type="submit" class="text-lg font-bold bg-[green] text-white  rounded-lg p-2 cursor-pointer"name="Validate"  value="Validate the order">
                                        <input type="submit" class="text-lg font-bold bg-[red] text-white rounded-lg p-2 cursor-pointer " name="Clear"  value="Clear the basket">
                                    </form>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <?php
                } 
            ?>
        </div>
    </section>

<?php 
if(isset($_POST['Validate'])){
    $_SESSION['order'] = true;
    $sql = "INSERT into order_line(id_product,id_orderr,price,quantity,total) values";
    $total =0;
    $priceProduct= [];
    foreach($products as $product){
        $idProduct = $product['id_product'] ;
        $price = $product['price'] ;
        $qty = $cart[$idProduct];
        $total+=$qty*$price;
        $priceProduct[$idProduct]= [
            'idProduct'=>$idProduct,
            'price'=>$price,
            'total'=>$qty*$price,
            'qty'=>$qty
        ];
    }
    $statement = $connection->prepare('INSERT into orderr(id_user,total) values(:id_user,:total)');
    $statement ->execute([':id_user'=>$id_user ,':total'=>$total]);
    $idOrder = $connection->lastInsertId();
    $args =[];
    
    foreach($priceProduct as $product){
        $id_product = $product['idProduct'];
        $sql .= "(:id_product$id_product,'$idOrder',:price$id_product, :qty$id_product, :total$id_product),";
    }
    $sql = substr($sql,0,-1);
    $sqls = $connection->prepare($sql);

    foreach($priceProduct as $product){
        $id_product = $product['idProduct'];
        $sqls ->bindParam(':id_product'.$id_product,$product['idProduct']);
        $sqls ->bindParam(':price'.$id_product,$product['price']);
        $sqls ->bindParam(':qty'.$id_product,$product['qty']);
        $sqls ->bindParam(':total'.$id_product,$product['total']);
    }
    $inserted = $sqls ->execute();
    if($inserted){
        ?>
        <script>
        Swal.fire({
            icon: 'success',
            title: "Your order has been successfully placed. The total amount charged is <?php echo $total ?>$ .",
        }).then(()=>{
            window.location.href = 'cart.php';
        })
        </script>
        <?php 
        $_SESSION['cart'][$id_user] = [];
    }

}
?>
    

<?php 
include('../inc/footerFront.php')
?>

<script>

    function calc() {
        $('.add').click(function() {
            const inputElement = $(this).siblings('.qt');
            inputElement.val(+inputElement.val() + 1);
        });

        $('.mins').click(function() {
            const inputElement = $(this).siblings('.qt');
            inputElement.val(Math.max(+inputElement.val() - 1, 1));
        });
    }
    calc()
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>

<?php 
}else{
    header('location:login.php');
}

?>