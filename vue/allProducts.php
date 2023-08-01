
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
    
<?php 
include('../inc/navFront.php')
?>



<!-- start men section  -->
<section class="py-10 my-8">
        <div class="w-[80%] mx-auto ">
            <h2 class="text-center text-6xl my-14 text-[#FD4112] font-bold tracking-widest underline">All Products</h2>
            <div class="grid grid-cols-3 gap-4 ">    
            <?php 
                require('../database/conection.php');
                $sql = "SELECT * FROM product";
                $statement = $connection -> query($sql);
                $mens = $statement -> fetchAll(PDO::FETCH_ASSOC);
                foreach($mens as $men){?>
                    <div class=" shadow-lg border border-1 p-2 relative rounded-xl bg-[white]">                
                        <a href="./productPage.php?id=<?php echo $men['id_product'] ?>" class="">
                        <span class="bg-[red] text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded z-10 absolute left-2 top-2">-<?php echo $men['discount'] ?>%</span>
                        <img src="../upload/<?php echo $men['image_product'] ?>" alt="" class=" rounded-t-lg mx-auto w-[100%]">
                        <h3 class="font-bold text-md  my-3 text-center"><?php echo $men['libell'] ?></h3>
                            <div class="flex items-center justify-around">
                                <span class="text-2xl font-bold ">$<?php echo $men['finalePrice'] ?></span>
                                <button  class="text-black hover:text-white bg-[#FFD3AC] hover:bg-[#FD4112] font-bold rounded-md text-xl px-5 py-2.5 text-center ">Buy</button>
                            </div>
                        </a>                   
                    </div>
                <?php }?>
                </div>             
            </div>
        </div>
</section>
    <!-- end men section  -->
<section class="w-[80%] mx-auto text-center my-12">
<nav aria-label="Page navigation ">
  <ul class="inline-flex -space-x-px text-sm">
    <li>
      <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight  bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">1</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight  bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">2</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-3 h-8  border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 ">3</a>
    </li>
    <li>
  </ul>
</nav>
</section>




<?php 
include('../inc/footerFront.php')
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>
