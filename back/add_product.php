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

    <title>Dashbord</title>
</head>
<body>



<?php 
    require('../database/conection.php');
    if(isset($_POST['submit'])){
        date_default_timezone_set("Africa/Casablanca");
        $date_creation = date("y-m-d h:i:s");
        $libell = $_POST['libell'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $date =date("dmyhis");   
        $image_product = "product".$date.".jpg";
        move_uploaded_file($_FILES["image_product"]["tmp_name"],'../upload/' . $image_product);
        $gender = $_POST['gender'];
        $is_accessory	 = $_POST['is_accessory'];
        $id_category = $_POST['category'];

        // if(!empty($libell) && !empty($price) && !empty($discount) && !empty($description) && !empty($gender) && !empty($is_accessory) && !empty($category) && !empty($image_product)){
        if(true){
            $sql = "INSERT into product(libell,description,price,discount,date_creation,image_product,gender,is_accessory,id_category) values(:libell,:description,:price,:discount,:date_creation,:image_product,:gender,:is_accessory,:id_category)";
            $statement = $connection->prepare($sql);
            $statement ->execute([':libell'=>$libell, ':description'=>$description, ':price'=>$price, ':discount'=>$discount ,':date_creation'=>$date_creation ,':image_product'=>$image_product ,':gender'=>$gender, ':is_accessory'=>$is_accessory,':id_category'=>$id_category]);
            if($statement){
                ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: '<?php echo $libell ?> has added successfully',
                        showConfirmButton: true
                    }).then(() => {            
                        window.location.href = 'products.php';
                    });                    
                    </script>             
                <?php 
            }else{
                ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Something went wrong!!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
                <?php 
            }
        }else{
            ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'All fields are required',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
            <?php
        }
    }
?>









<section class="min-h-screen w-full relative ">
<?php 
        include("../inc/navAdmin.php");
    ?>
    <main class="bg-white w-[calc(100%-300px)] min-h-screen absolute left-[300px] transition-all duration-700">
        <nav class="p-4 mb-4 sticky top-0"> 
          <div class="flex items-center justify-between p-3 bg-[#FFD3AC] rounded-xl shadow-md">
            <span class="cursor-pointer show" id="menu"><i class="fa-solid fa-bars fa-2x" ></i></span>
            <h1 class="text-2xl font-bold text-[#FD4112] mt-2">Universe store</h1> 
            <div><img src="../assets/img/user.png" width="50px" alt=""></div>
          </div>
        </nav>
        <section class="p-4 min-h-screen ">
            <a href="./products.php" class="inline-block  my-6 text-lg font-medium bg-[#ff7d1a] p-2 text-white hover:text-black rounded-lg">Show Products</a>                        

            <div class="p-3 text-center bg-[#FFD3AC] rounded-xl shadow-md mt-6 ">
                <h1 class="text-3xl font-bold">Add a new Product</h1>                
                <form  method="post" class="mt-10" id="form" enctype="multipart/form-data">
                    <div class="grid gap-4 sm:grid-cols-1 sm:gap-6">
                        <div class="">
                            <label for="libell" class="block mb-2 text-sm font-medium ">Product Name</label>
                            <input type="text" name="libell" id="libell" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-[#f99116] focus:border-[#f99116] block w-full p-2.5 ">
                        </div>
                        <div class="">
                            <label for="description" class="block mb-2 text-sm font-medium  ">Description of Product</label>
                            <textarea id="description" name="description" rows="8" class="block p-2.5 w-full text-sm  bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#f99116] focus:border-[#f99116] focus:border-primary-500 " ></textarea>
                        </div>
                        <div class="">
                            <label for="Price" class="block mb-2 text-sm font-medium ">Price of Product</label>
                            <input type="number" name="price" id="Price" min="0" step="0.1" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-[#f99116] focus:border-[#f99116] block w-full p-2.5 " >
                        </div>
                        <div class="">
                            <label for="discount" class="block mb-2 text-sm font-medium ">discount of Product</label>
                            <input type="number" name="discount" id="discount" min="0" max="90" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-[#f99116] focus:border-[#f99116] block w-full p-2.5 " >
                        </div>
                        <div class="">
                            <label for="image_product" class="block mb-2 text-sm font-medium ">Image of Product</label>
                            <input id="image_product" name="image_product" class="block w-full text-sm  border border-gray-300 rounded-lg bg-white cursor-pointer focus:ring-[#f99116] focus:border-[#f99116]" type="file">
                        </div>
                        <div class="">  
                            <label for="gender" class="block mb-2 text-sm font-medium ">For who ?</label>
                            <select id="gender" name="gender" class="bg-white border border-gray-300 text-sm rounded-lg block w-full p-2.5 focus:ring-[#f99116] focus:border-[#f99116]">
                                <option value="men">Men</option>
                                <option value="women">Women</option>
                                <option value="both">Both</option>
                            </select>
                        </div>                            
                        <div class="">
                            <label for="is_accessory" class="block mb-2 text-sm font-medium ">Is Accessory ?</label>
                            yes <input id="yes" type="radio" value="yes" name="is_accessory" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                            no  <input checked id="no" type="radio" value="no" name="is_accessory" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        </div>
                        
                        <?php 
                            include('../database/conection.php');
                            $sql = "select * from category order by libell ";
                            $statement = $connection -> prepare($sql);
                            $statement -> execute();
                            $categories = $statement -> fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="">
                            <label for="se_category "  class="block mb-2 text-sm font-medium">Category of Product</label>
                            <select id="se_category " class="bg-white border border-gray-300 text-sm rounded-lg block w-full p-2.5 focus:ring-[#f99116] focus:border-[#f99116]"  name="category">
                                <?php 
                                foreach($categories as $category){
                                    echo '<option value="'.$category['id_category'] .'">'.$category['libell'] .'</option>' ;
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Add Product" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center cursor-pointer bg-[#f99116] text-white hover:bg-[#FD4112] rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-primary-800">
                </form>
            </div>
        </section>
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