<?php 
session_start();
if(true){
?>

<?php 
include('../database/conection.php');
$idOrder = $_GET['id_order'];
$sql = 'SELECT o.*, u.fname AS fname, u.lname AS lname FROM orderr o INNER JOIN userr u ON o.id_user = u.id_user WHERE o.id = :id ORDER BY o.date_creation DESC';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $idOrder]);
$order = $statement -> fetch(PDO::FETCH_ASSOC);


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

    <title>Order | number <?php echo $idOrder ?></title>
</head>
<body>



<section class="min-h-screen w-full relative ">
    <?php 
        include("../inc/navAdmin.php");
    ?>
    <main class="bg-white w-[calc(100%-300px)] min-h-screen absolute left-[300px] transition-all duration-700">
        <nav class="p-4 mb-4 sticky top-0 z-50"> 
          <div class="flex items-center justify-between p-3 bg-[#FFD3AC] rounded-xl shadow-md">
            <span class="cursor-pointer show" id="menu"><i class="fa-solid fa-bars fa-2x" ></i></span>
            <h1 class="text-2xl font-bold text-[#FD4112] mt-2">Universe store</h1> 
            <div><img src="../assets/img/user.png" width="50px" alt=""></div>
          </div>
        </nav>
        <section class="p-4 bg-white min-h-screen ">
          <div class="p-3">   
            <div class="relative overflow-x-auto sm:rounded-lg mt-6">
                <div class="flex justify-between">
                    <h1 class="font-bold text-4xl mb-6">Detaill Order:</h1>
                    <a href="./orders.php" class="inline-block  my-6 text-lg font-medium bg-[#ff7d1a] p-2 text-white hover:text-black rounded-lg">Go back</a>

                </div>
                <table class="w-full text-sm text-center ">
                    <thead class="text-xs uppercase bg-[#ff7d1a] ">
                        <tr>
                            <th scope="col" class="px-6 py-3">Order ID</th>
                                
                            
                            <th scope="col" class="px-6 py-3">
                                Full Name
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
                                Invoice
                            </th>                              
                        </tr>
                    </thead>
                      <tbody>
                      <tr class="hover:bg-[#FFD3AC]">
                        <td class=" py-4  font-medium"><?php echo $order['id'] ?></td>
                        <td class=" py-4  font-medium"><?php echo $order['fname'].' '.$order['lname'] ?></td>
                        <td class=" py-4  font-medium"><?php echo $order['id_user'] ?></td>
                        <td class=" py-4  font-medium"><?php echo $order['total'] ?>$</td>
                        <td class="px-6 py-4  font-medium"><?php echo $order['date_creation'] ?></td>
                        <td><a href="" class=""><i class="fa-solid fa-file-invoice fa-3x" style="color: mediumseagreen;"></i></a></td>
                      </tr> 
                    </tbody>
                </table>
                
                <h1 class="font-bold text-4xl mt-14 my-6">Products of The Order:</h1>
                <table class="w-full text-sm text-center ">
                    <thead class="text-xs uppercase bg-[#ff7d1a] ">
                        <tr>
                            <th scope="col" class="px-6 py-3">Order ID</th>
                            <th scope="col" class="px-6 py-3">Product ID</th>
                            <th scope="col" class="px-6 py-3">Product Name</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">quantity</th>
                            <th scope="col" class="px-6 py-3">Total</th>  
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        include('../database/conection.php');
                        $sql_order_line = 'select ol.*,p.libell,p.image_product
                        from order_line ol
                        INNER join product p
                        on ol.id_product = p.id_product where id_orderr =:id_orderr';
                        $statement = $connection->prepare($sql_order_line);
                        $statement->execute([':id_orderr' => $idOrder]);
                        $lineOrders = $statement -> fetchAll(PDO::FETCH_OBJ);
                        foreach($lineOrders as $lineOrder){?>
                        <tr class="hover:bg-[#FFD3AC]">
                            <td class=" py-4  font-medium"><?php echo $order['id'] ?></td>
                            <td class="px-6 py-4  font-medium"><?php echo $lineOrder->id ?></td>
                            <td class="px-6 py-4  font-medium"><?php echo $lineOrder->libell ?></td>
                            <td class="px-6 py-4  font-medium"><?php echo $lineOrder->price ?>$</td>
                            <td class="px-6 py-4  font-medium">x<?php echo $lineOrder->quantity ?></td>
                            <td class="px-6 py-4  font-medium"><?php echo $lineOrder->total ?>$</td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
          </div>
        </section>
    </main>
</section>



<script src="../back/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

</body>
</html>

<?php 
}else{
    header('location: login.php');
}
?>