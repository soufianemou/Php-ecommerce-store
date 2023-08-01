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
            <a href="./admins.php" class="inline-block  my-6 text-lg font-medium bg-[#ff7d1a] p-2 text-white hover:text-black rounded-lg"><i class="fa-solid fa-arrow-left"></i> &nbsp; Back</a>                        

            <?php 
                require('/xampp/htdocs/new_ecomerce/database/conection.php');
                $id = $_GET['id'];
                $sql = "SELECT * from admin where id=:id";
                $statement = $connection -> prepare($sql);
                $statement->execute(['id'=>$id]);
                $admin = $statement -> fetch(PDO::FETCH_ASSOC);
                ?>
            
            <div class="p-3 text-center bg-[#FFD3AC] rounded-xl shadow-md mt-6 ">
                <h1 class="text-3xl font-bold">Update the <?php echo $admin['username'] ?> admin</h1>                
                    <form  method="post" class="mt-10" id="form">
                        <div class="grid gap-4 sm:grid-cols-1 sm:gap-6">
                            <div class="">
                                <label for="username" class="block mb-2 text-sm font-medium ">Admin Username</label>
                                <input type="text" name="username" id="username" value="<?php echo $admin['username'] ?>" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-[#f99116] focus:border-[#f99116] block w-full p-2.5 ">
                            </div>
                            <div class="">
                                <label for="pass" class="block mb-2 text-sm font-medium ">Admin password</label>
                                <input type="text" name="pass" id="pass" value="<?php echo $admin['pass'] ?>" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-[#f99116] focus:border-[#f99116] block w-full p-2.5 " >
                            </div> 
                        </div>
                        <input type="submit" name="update" value="Update admin" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center cursor-pointer bg-[#f99116] text-white hover:bg-[#FD4112] rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-primary-800">
                    </form>
            </div>
        </section>
    </main>
</section>

<?php 
   
    if(isset($_POST['update'])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        if(!empty($username) && !empty($pass)){
            $sql = "UPDATE admin set username=:username, pass=:pass  where id=:id";
            $statement = $connection->prepare($sql);
            $statement ->execute([':username'=>$username, ':pass'=>$pass, ':id'=>$id]);
            if($statement){
                ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'the Admin information has updated successfully',
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



<script src="../back/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

</body>
</html>

<?php 
}else{
    header('location: login.php');
}
?> hover:bg-[#FD4112]