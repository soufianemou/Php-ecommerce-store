<?php 
session_start();
if(true){
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

    <title>Orders</title>
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
            <div class="relative overflow-x-auto shadow-lg sm:rounded-lg mt-6">
                <table class="w-full text-sm text-center ">
                    <thead class="text-xs uppercase bg-[#ff7d1a] ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Order ID
                            </th>
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
                                Status
                            </th>                              
                            <th scope="col" class="px-6 py-3">
                                Operation
                            </th>                              
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      include('../database/conection.php');
                      $sql = 'select o.*, u.fname as fname, u.lname as lname FROM orderr o INNER join userr u on o.id_user = u.id_user order by o.date_creation desc';
                      $statement = $connection -> query($sql);
                      $orders = $statement -> fetchAll(PDO::FETCH_ASSOC);
                      foreach($orders as $order){?>
                      <tr class="hover:bg-[#FFD3AC]">
                        <td class="px-6 py-4  font-medium"><?php echo $order['id'] ?></td>
                        <td class="px-6 py-4  font-medium"><?php echo $order['fname'].' '.$order['lname'] ?></td>
                        <td class="px-6 py-4  font-medium"><?php echo $order['id_user'] ?></td>
                        <td class="px-6 py-4  font-medium"><?php echo $order['total'] ?>$</td>
                        <td class="px-6 py-4  font-medium"><?php echo $order['date_creation'] ?></td>
                        <td class="px-6 py-4  font-medium">
                            <?php if($order['valid'] == 0):?>
                                <span class="bg-red-100 text-red-800 text-xs font-bold mr-2 px-2.5 py-1 rounded-full">Invalid</span>
                            <?php else:?>
                                <span class="bg-green-100 text-green-800 text-xs font-bold mr-2 px-2.5 py-1 rounded-full">Valid</span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 text-center">
                            <?php if($order['valid'] == 0):?>
                            <a href="valid_order.php?id=<?php echo $order['id'] ?>&valid=1" class="font-medium bg-green-500 text-white px-3 p-2 rounded-lg">Validate</a>
                            <?php else:?>
                            <a href="valid_order.php?id=<?php echo $order['id'] ?>&valid=0" class="font-medium bg-red-500 text-white px-4 p-2 rounded-lg">Cancel</a>
                            <?php endif; ?> 
                            <a href="order.php?id_order=<?php echo $order['id'] ?>" class="font-medium bg-green-500 text-white px-4 ms-2 p-2 rounded-lg"><i class="fa-solid fa-info"></i></a>
                        </td>
                      </tr> 
                      <?php }?>
                    </tbody>
                </table>
            </div>
          </div>
          <!-- bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full -->
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