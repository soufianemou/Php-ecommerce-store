<?php 
$cuurentPage = $_SERVER['PHP_SELF'];
?>


<aside class="bg-[#FFD3AC] w-[300px] h-screen fixed flex flex-col justify-between ">
    <div class="w-[85%] mx-auto  text-center p-3 ">
        
        <ul class="flex flex-col gap-4 mt-20 " id="list1">
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/dashbord.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3 rounded-xl font-medium flex "><a href="./dashbord.php" class="flex items-center gap-5"><img src="../assets/img/home.png" alt="">Dashbord</a></li>
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/orders.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3 rounded-xl font-medium flex "><a href="./orders.php" class="flex items-center gap-5"><img src="../assets/img/orders.png" alt="">Orders</a></li>
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/categories.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3 rounded-xl font-medium flex "><a href="./categories.php" class="flex items-center gap-5"><img src="../assets/img/categories.png" alt="">List of  categorie</a></li>
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/add_category.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3 rounded-xl font-medium flex "><a href="./add_category.php" class="flex items-center gap-5"><img src="../assets/img/addCategory.png" alt="">Add categories</a></li>
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/products.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3 rounded-xl font-medium flex "><a href="./products.php" class="flex items-center gap-5"><img src="../assets/img/product.png" alt="">List of products</a></li>
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/add_product.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3 rounded-xl font-medium flex "><a href="./add_product.php" class="flex items-center gap-5"><img src="../assets/img/addProduct.png" alt="">Add product</a></li>
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/admins.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3 rounded-xl font-medium flex "><a href="./admins.php" class="flex items-center gap-5"><img src="../assets/img/adminlist.png" alt="">List of Admin</a></li>
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/add_admin.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3 rounded-xl font-medium flex "><a href="./add_admin.php" class="flex items-center gap-5"><img src="../assets/img/addAdmin.png" alt="">Add Admin</a></li>
        </ul>
        <ul class="flex flex-col gap-5 mt-20 hidden" id="list2">
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/dashbord.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3  rounded-xl font-medium flex w-12"><a href="./dashbord.php" class="flex items-center gap-5 "><img src="../assets/img/home.png" alt=""></a></li>
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/orders.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3 rounded-xl font-medium flex w-12"><a href="./orders.php" class="flex items-center gap-5"><img src="../assets/img/orders.png" alt=""></a></li>
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/categories.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3 rounded-xl font-medium flex w-12"><a href="./categories.php" class="flex items-center gap-5"><img src="../assets/img/categories.png" alt=""></a></li>
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/add_category.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3 rounded-xl font-medium flex w-12"><a href="./add_category.php" class="flex items-center gap-5"><img src="../assets/img/addCategory.png" alt=""></a></li>
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/products.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3 rounded-xl font-medium flex w-12"><a href="./products.php" class="flex items-center gap-5"><img src="../assets/img/product.png" alt=""></a></li>
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/add_product.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3 rounded-xl font-medium flex w-12"><a href="./add_product.php" class="flex items-center gap-5"><img src="../assets/img/addProduct.png" alt=""></a></li>
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/admins.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3 rounded-xl font-medium flex w-12"><a href="./admins.php" class="flex items-center gap-5"><img src="../assets/img/adminlist.png" alt=""></a></li>
            <li class="text-white text-lg <?php echo $cuurentPage==="/new_ecomerce/back/add_admin.php"? 'bg-[#FD4112]':'bg-[#F99116]' ?> hover:bg-[#FD4112] p-3 rounded-xl font-medium flex w-12"><a href="./add_admin.php" class="flex items-center gap-5"><img src="../assets/img/addAdmin.png" alt=""></a></li>
        </ul>
    </div>
    <div class="w-[85%] mx-auto mb-10 p-3">
        <a href="./logOut.php" id="but1" class="text-white hover:bg-[#FD4112] font-medium text-lg bg-[#F99116] py-2 rounded-xl px-4 flex items-center gap-5"><img src="../assets/img/log-out_3596149.png" alt=""> LogOut</a>
        <a href="./logOut.php" id="but2" class="hidden text-white hover:bg-[#FD4112] font-medium text-lg bg-[#F99116] p-3 rounded-xl  w-12 block"><img src="../assets/img/log-out_3596149.png" alt=""></a>
    </div>  
</aside>