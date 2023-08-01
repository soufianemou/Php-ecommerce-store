<?php 
session_start();
if(isset($_SESSION['user'])){
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
    $email =$_SESSION['user'] ;
    $pass= $_SESSION['pass'];
    require('../database/conection.php');

    $sql = "SELECT * from userr where email=:email and pass=:pass";
    $statement = $connection -> prepare($sql);
    $statement->execute(['email'=>$email,'pass'=>$pass]);
    $user = $statement -> fetch(PDO::FETCH_ASSOC);

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
                                <li><a href="#" class="block px-4 py-2 hover:bg-[#FFD3AC] text-xl font-bold"><i class="fa-solid fa-cart-flatbed"></i>&nbsp; My orders</a></li>
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
                            <li><a href="#" class=" text-xl font-bold">Men</a></li>                                           
                            <li><a href="#" class=" text-xl font-bold">Women</a></li>                            
                            <li><a href="#" class=" text-xl font-bold">Accessoires</a></li>                                        
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
                                <li><a href="#" class="block px-4 py-2 hover:bg-[#FFD3AC] text-xl font-bold"><i class="fa-solid fa-cart-flatbed"></i>&nbsp; My orders</a></li>
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
    <!--end header-->

<?php 
require('../database/conection.php');
$id = $_GET['id'];
if(isset($_POST['update'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $adress1 = $_POST['adress1'];
    $adress2 = $_POST['adress2'];
    $zipcode = $_POST['zipcode'];

    if((!empty($fname) && !empty($lname) && !empty($email) && !empty($numero) && !empty($country) && !empty($city) && !empty($adress1))){

        $sql = "UPDATE userr set fname=:fname, lname=:lname ,email=:email ,numero=:numero, country=:country, city=:city, adress1=:adress1, adress2=:adress2, zipcode=:zipcode  where id_user=:id";
        $statement = $connection->prepare($sql);
        $statement ->execute([':fname'=>$fname, ':lname'=>$lname, ':email'=>$email, ':numero'=>$numero, 'country'=>$country, 'city'=>$city,'adress1'=>$adress1, 'adress2'=>$adress2, 'zipcode'=>$zipcode ,':id'=>$id]);
        if($statement){
            ?>
            <script>
                Swal.fire({
                icon: 'success',
                title: 'success',
                text: 'Information has updated',
                showConfirmButton: false,
                timer: 1000
            }).then(() => {            
                window.location.href = 'profile.php';
            });
            </script>
            <?php 
        }else{
            ?>
            <script>
            Swal.fire({
                icon: 'error',
                title: 'error',
                text: 'Something went wrong !!',
            })
            </script>
            <?php 
        }      
    }else{
        ?>
        <script>
        Swal.fire({
            icon: 'error',
            title: 'error',
            text: 'Information are required !!',
        })
        </script>
        <?php 
    }
}

?>

<?php 
require('../database/conection.php');
$id = $_GET['id'];
$sql = "SELECT * from userr where id_user=:id";
$statement = $connection -> prepare($sql);
$statement->execute(['id'=>$id]);
$user = $statement -> fetch(PDO::FETCH_ASSOC);
?>

<section class="min-h-screen mt-12">
    <div class="w-[80%] mx-auto ">
        <!-- <div class="text-center bg-[#F5F6FA] px-4 pt-20 py-8 rounded-xl">
            <div class="my-8">
                <img src="../assets/img/user.png" alt="" width="100px"  class="mx-auto">
            </div>
            <h2 class="font-bold text-lg">soufiane mouahhidi</h2>
            <h2 class="mt-2 mb-12 font-bold text-md">mouahhidisoufiane3@gmail.com</h2>
            <button class="bg-[red] py-2 px-4 rounded-lg text-white font-bold text-xl">Delete account</button>
        </div> -->
        <form action="" class="bg-[#F5F6FA] col-span-3 grid grid-cols-1 md:grid-cols-2 p-4  rounded-xl" method="post">
            <div class=" mx-auto py-4">
                <h2 class="text-xl font-bold mb-4">Personal Details :</h2>
                <label for="firstname" class="block font-bold  ">First Name :</label>
                <input type="text" id="firstname" name="fname" value="<?php echo $user['fname'] ?>"  class="shadow-md  my-6 rounded-xl w-[270px] border-none focus:ring focus:ring-[#FD4112]">

                <label for="lastname" class="block font-bold ">Last Name :</label> 
                <input type="text" id="lastname" name="lname" value="<?php echo $user['lname'] ?>" class="shadow-md  my-6 rounded-xl w-[270px] border-none focus:ring focus:ring-[#FD4112]">

                <label for="email" class="block font-bold " >Email :</label> 
                <input type="email" id="email" name="email" value="<?php echo $user['email'] ?>" class="shadow-md  my-6 rounded-xl w-[270px] border-none focus:ring focus:ring-[#FD4112]">

                <label for="num" class="block font-bold ">Phone :</label> 
                <input type="text" id="num" name="numero" value="<?php echo $user['numero'] ?>"  class="shadow-md my-6 rounded-xl w-[270px] border-none focus:ring focus:ring-[#FD4112]">

            </div>
            <div class="mx-auto py-4">
                <h2 class="text-xl font-bold mb-4">Adress Details :</h2>
                <label for="country" class="block font-bold ">Country</label>      
                <select id="country" name="country" class="my-6 rounded-xl w-[270px] border-none focus:ring focus:ring-[#FD4112] p-2">
                    <?php
                    $countries = array(
                        "Afghanistan", "Åland Islands", "Albania", "Algeria", "American Samoa", "Andorra",
                        "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia",
                        "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh",
                        "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia",
                        "Bosnia and Herzegovina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory",
                        "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon",
                        "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile",
                        "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo",
                        "Congo, The Democratic Republic of The", "Cook Islands", "Costa Rica", "Cote D'ivoire",
                        "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica",
                        "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea",
                        "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland",
                        "France", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon",
                        "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada",
                        "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-bissau", "Guyana",
                        "Haiti", "Heard Island and Mcdonald Islands", "Holy See (Vatican City State)", "Honduras",
                        "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran, Islamic Republic of",
                        "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey",
                        "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of",
                        "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao People's Democratic Republic",
                        "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein",
                        "Lithuania", "Luxembourg", "Macao", "Macedonia, The Former Yugoslav Republic of",
                        "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands",
                        "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of",
                        "Moldova, Republic of", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco",
                        "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles",
                        "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island",
                        "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Palestinian Territory, Occupied",
                        "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland",
                        "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda",
                        "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Pierre and Miquelon",
                        "Saint Vincent and The Grenadines", "Samoa", "San Marino", "Sao Tome and Principe",
                        "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia",
                        "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and The South Sandwich Islands",
                        "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard and Jan Mayen", "Swaziland", "Sweden",
                        "Switzerland", "Syrian Arab Republic", "Taiwan", "Tajikistan", "Tanzania, United Republic of",
                        "Thailand", "Timor-leste", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia",
                        "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine",
                        "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands",
                        "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Viet Nam", "Virgin Islands, British",
                        "Virgin Islands, U.S.", "Wallis and Futuna", "Western Sahara", "Yemen", "Zambia", "Zimbabwe"
                    );                
                    foreach ($countries as $country) {
                        $selected = ($user['country'] === $country) ? 'selected' : '';
                        echo '<option value="' . htmlspecialchars($country) . '" ' . $selected . '>' . htmlspecialchars($country) . '</option>';
                    }
                        ?>
                </select>
                <label for="city" class="block font-bold ">City :</label> 
                <input type="text" id="city" name="city" value="<?php echo $user['city'] ?>" class="shadow-md my-6 rounded-xl w-[270px]  border-none focus:ring focus:ring-[#FD4112]">
                <label for="adress1" class="block font-bold ">Adress 1 :</label>         
                <input type="text" id="adress1" name="adress1" value="<?php echo $user['adress1'] ?>" class="shadow-md my-6 rounded-xl w-[270px]  border-none focus:ring focus:ring-[#FD4112]">
                <label for="adress2" class="block font-bold ">Adress 2 :</label>         
                <input type="text" id="adress2" name="adress2" value="<?php echo $user['adress2'] ?>" class="shadow-md my-6 rounded-xl w-[270px]  border-none focus:ring focus:ring-[#FD4112]">
                <label for="zipcode" class="block font-bold ">Zip code:</label> 
                <input type="text" id="zipcode" name="zipcode" value="<?php echo $user['zipcode'] ?>" class="shadow-md my-6 rounded-xl w-[270px]  border-none focus:ring focus:ring-[#FD4112]">
                
                <div class="text-center md:text-end mt-5">
                    <a href="./profile.php" class="font-bold text-lg rounded-xl w-[150px]  bg-[yellow] px-5 py-4 me-2"><i class="fa-solid fa-arrow-left"></i>&nbsp; Back </a>    
                    <input type="submit" id="submit" name="update" class="font-bold text-lg rounded-xl w-[150px]  bg-[#FD4112] hover:bg-[#FEBB86] px-4 py-3 cursor-pointer" value="Update"></input>
                </div>
            </div>
            
            
        </form>
        

</section>





<?php 
include('../inc/footerFront.php')
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>

<?php 
}else{
    header('location:login.php');
}
?>