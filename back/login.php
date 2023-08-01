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
    

<!-- component -->
<div class="h-screen md:flex">
	<div
		class="relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-[#FF5A35] to-[#FFD3AC] i justify-around items-center hidden">
		<div>
			<h1 class="text-white font-bold text-4xl font-sans">Go Hard or Go Home</h1>
		</div>
		<div class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
		<div class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
		<div class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
		<div class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
	</div>
	<div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
		<form class="bg-white" method="post">
			<h1 class="text-gray-800 font-bold text-2xl mb-3">Hello Admin!</h1>
			<p class="text-sm font-normal text-gray-600 mb-12">Welcome Back</p>
			
			<div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                </svg>
                <input class="pl-2 outline-none border-none " type="text" name="username" id="" placeholder="Username" />
            </div>

            <div class="flex items-center border-2 py-2 px-3 rounded-2xl ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                        clip-rule="evenodd" />
                </svg>
                <input class="pl-2 outline-none border-none" type="password" name="pass" id="" placeholder="Password" />
            </div>

            <input type="submit" name="submit" class="cursor-pointer block w-full bg-indigo-600 mt-6 py-2 rounded-2xl text-white font-semibold mb-2" value="Login"></input>
            <span class="text-sm ml-2 hover:text-blue-500 cursor-pointer">Forgot Password ?</span>
		</form>
	</div>
</div>



<?php 
require('../database/conection.php');
if(isset($_POST['submit'])){
    date_default_timezone_set('Africa/Casablanca');
    $date = date('y-m-d');
    $username =  $_POST['username'];
    $pass = $_POST['pass'];
    if(!empty($username) && !empty($pass)){
        $sql ="SELECT username, pass from admin where username=:username and pass=:pass";
        $statement = $connection->prepare($sql);
        $statement->execute([':username'=>$username,':pass'=>$pass]);
        if($statement->rowCount()>=1){
            $_SESSION['admin']= $username;
            $_SESSION['adminpass']= $pass;
            ?>
            <script>
                Swal.fire({
                    title: `Welcome back <?php echo ucwords($_SESSION['admin'])  ?> `,
                    showConfirmButton: false,
                    timer: 1000
                }).then(() => {            
                    window.location.href = 'dashbord.php';
                });                    
            </script>      
            <?php 
        }else{
            ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Admin informations are not correct',
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







<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>


<script src="../back/js/app.js"></script>
</body>
</html>