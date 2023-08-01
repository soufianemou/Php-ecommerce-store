
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
        require('../inc/navFront.php')
    ?>

<!-- start section login  -->
<section class="gradient-form h-screen bg-[#FFD3AC]">
  <div class="container h-full p-10 shadow-xl">
    <div class="g-6 flex h-full flex-wrap items-center justify-center ">
        <div class="w-full shadow-lg">
            <div class="block rounded-lg bg-whitqe ">
                <div class="g-0 lg:flex lg:flex-wrap">
                <!-- Left column container-->
                    <div class="px-4 md:px-0 lg:w-6/12">
                        <div class="md:mx-6 md:p-12">
                            <form   method="post">
                            <p class="my-6 text-xl text-center">Please login to your account</p>
                            <!--Username input-->
                            <div class="relative mb-4" data-te-input-wrapper-init>
                                <input type="email" name="email" placeholder="Email"  class="shadow-md rounded-xl focus:ring focus:ring-[#FD4112] peer block min-h-[auto] w-full rounded border-0 px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none   "/>
                            </div>
                            <!--Password input-->
                            <div class="relative mb-4" data-te-input-wrapper-init>
                                <input type="password" name="pass" placeholder="Password" class="shadow-md rounded-xl focus:ring focus:ring-[#FD4112] peer block min-h-[auto] w-full rounded border-0 px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none   "/> 
                            </div>
                            <!--Submit button-->
                            <div class="mb-12 pb-1 pt-1 text-center">
                                <input type="submit" name="submit" class="shadow-lg w-full rounded-xl bg-[#FD4112] hover:bg-[#FEBB86] px-4 py-2 cursor-pointer" value="Login"></input>
                            </div>
                            <!--Register button-->
                            <div class="flex items-center justify-between pb-6">
                                <p class="mb-0 mr-2">Don't have an account?</p>
                                <a href="./signUp.php" class="rounded border-2  px-6 pb-[6px] pt-2">Register</a>
                            </div>
                            </form>
                        </div>
                    </div>
                <!-- Right column container with background and description-->
                    <div class="flex items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none" style="background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593)">
                        <div class="px-4 py-6  md:mx-4 md:p-0">
                            <img src="../assets/img/undraw_secure_login_pdn4 (1).png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</section> 
<!-- end section login  -->



<?php 
    require('../database/conection.php');
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        if(!empty($email) && !empty($pass)){
            $sql ="SELECT * from userr where email=:email and pass=:pass";
            $statement = $connection->prepare($sql);
            $statement->execute([':email'=>$email,':pass'=>$pass]);
            if($statement->rowCount()>=1){
                $_SESSION['user']= $email;
                $_SESSION['pass']= $pass;
                $_SESSION['userInfo'] = $statement->fetch(PDO::FETCH_ASSOC);
                if(isset($_SESSION['redirect_url'])){
                    $redirect_url = $_SESSION['redirect_url'];
                    $desired_part = basename($redirect_url);
                }else{
                    $desired_part = 'index.php';
                }
                
                ?>
                <script>
                    Swal.fire({
                        title: 'Welcome',
                        showConfirmButton: false,
                        timer: 1000
                    }).then(() => {  
                        
                        window.location.href = '<?php echo "$desired_part" ?>';
                    });                    
                </script>      
                <?php 
                // header('location:index.php');
            }else{
                ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Your informations are not correct',
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







<?php 
include('../inc/footerFront.php')
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>


<script src="../assets/js/main.js"></script>
</body>
</html>