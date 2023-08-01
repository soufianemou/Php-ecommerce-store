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
        $date_creation = date("y-m-d");
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        if(!empty($username) && !empty($pass) ){
            $sql = "INSERT into admin(username,pass,date_creation) values(:username,:pass,:date_creation)";
            $statement = $connection->prepare($sql);
            $statement ->execute([':username'=>$username, ':pass'=>$pass, ':date_creation'=>$date_creation]);
            if($statement){
                ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'the  <?php echo $username ?> admin has added successfully',
                        showConfirmButton: true
                    }).then(() => {            
                        window.location.href = 'admins.php';
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
    <main class="bg-[#eeeeee] w-[calc(100%-300px)]  absolute left-[300px] transition-all duration-700">
        <nav class="p-4 mb-4 sticky top-0 z-50"> 
            <div class="flex items-center justify-between p-3 bg-[#FFD3AC] rounded-xl shadow-md">
                <span class="cursor-pointer show" id="menu"><i class="fa-solid fa-bars fa-2x" ></i></span> 
                <h1 class="text-2xl font-bold text-[#FD4112] mt-2">Universe store</h1>
                <div><img src="../assets/img/user.png" width="50px" alt=""></div>
            </div>
        </nav>
        <section class="p-4 min-h-screen ">
            <a href="./admins.php" class="inline-block  my-6 text-lg font-medium bg-[#ff7d1a] p-2 text-white hover:text-black rounded-lg">Show Admins</a>                        

            <div class="p-3 text-center bg-[#FFD3AC] rounded-xl shadow-md mt-6 ">
                <h1 class="text-3xl font-bold">Add a new Admin</h1>                
                    <form  method="post" class="mt-10" id="form">
                        <div class="grid gap-4 sm:grid-cols-1 sm:gap-6">
                            <div class="">
                                <label for="username" class="block mb-2 text-sm font-medium ">Admin Username</label>
                                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-[#f99116] focus:border-[#f99116] block w-full p-2.5 ">
                            </div>
                            <div class="">
                                <label for="pass" class="block mb-2 text-sm font-medium ">Admin Password</label>
                                <input type="password" name="pass" id="pass" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-[#f99116] focus:border-[#f99116] block w-full p-2.5 ">
                            </div>
                        </div>
                        <input type="submit" name="submit" value="Add Admin" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center cursor-pointer bg-[#f99116] text-white hover:bg-[#FD4112] rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-primary-800">
                    </form>
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