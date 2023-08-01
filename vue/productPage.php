

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

    <?php 
    require('../database/conection.php');
    $id = $_GET['id'];
    $sql = "SELECT * from product where id_product=:id";
    $statement = $connection -> prepare($sql);
    $statement->execute([':id'=>$id]);
    $product = $statement -> fetch(PDO::FETCH_ASSOC);
    
    ?>

    <!-- end men section  -->
    <section class=" min-h-[calc(100vh-153px)] md:mt-20">
        <div class="w-[100%] md:w-[80%] mx-auto grid grid-cols-1 md:grid-cols-2">
            <div class="w-[90%] p-5 md:p-0 md:flex flex-col justify-center items-center">
                <div class="" type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal">
                    <img src="../upload/<?php echo $product['image_product'] ?>" class="rounded-xl"  alt="" id="mainImg">
                </div>
            </div>
            <div class="w-[100%] p-5 ms-auto flex flex-col justify-center gap-2 md:gap-6">
                <h1 class="text-4xl md:text-5xl font-extrabold "><?php echo $product['libell'] ?></h1>
                <p class="text-[#b6bcc8] font-bold"><?php echo $product['description'] ?></p>
                <h2 id="result" class="font-bold text-3xl">$<?php echo $product['finalePrice'] ?> <span class="text-[#ff7d1a] bg-[#ffb784] px-2 rounded-lg text-sm ms-1 ">-<?php echo $product['discount'] ?>%</span></h2>
                <h2 id="prResult" class=" line-through text-[#b6bcc8]"><?php echo !empty($product['discount']) ?'$'. $product['price'] : ''; ?></h2>

                <?php 
                if(isset($_SESSION['userInfo'])){
                    $idUtilisatuer = $_SESSION['userInfo']['id_user'];
                $qt = $_SESSION['cart'][$idUtilisatuer][$product['id_product']] ?? 1;
                }
                    
                ?>
                <form class="flex gap-3 flex-col md:flex-row" action="add_cart.php" method="post">
                    <div class="flex justify-center">
                        <span class="px-4 py-2 text-[#ff7d1a] font-bold cursor-pointer bg-[#f2f2f2] rounded-l-lg" id="mins">-</span>
                        <input name="qt" class=" w-full text-center px-3 py-2 bg-[#f2f2f2] font-bold " id="qt" value="<?php echo $qt ?? 1; ?>"></input>
                        <span class="px-4 py-2 text-[#ff7d1a] font-bold cursor-pointer bg-[#f2f2f2] rounded-r-lg" id="add">+</span>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $product['id_product'] ?>">
                   <input style="background-color:#ff7d1a ;" class="cursor-pointer justify-center text-[#f2f2f2] font-bold py-2 rounded-lg w-full shadow-lg" type="submit" value="Add to Cart">
                </form>
                
            </div>
        </div>
        <!-- Main modal -->
        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full  overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-[500px] max-h-full">
                <!-- Modal content -->
                <div class="relative rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between rounded-t ">
                        <button type="button" class="text-gray-400 bg-transparent   rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center " data-modal-hide="defaultModal">
                            <img src="../assets/img/icon-close.png" alt="">
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="w-[80%] mx-auto">
                        <div class="">
                            <img src="../upload/<?php echo $product['image_product'] ?>" class="rounded-xl"  alt="" id="mainImgTwo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-14 mb-4">
          <img src="../assets/img/toppng.com-free-shipping-trust-badges-6339x1739.png" alt="">
        </div>
    </section>

<?php 
$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
?>

<?php 
include('../inc/footerFront.php')
?>


<script>
    function calc(){
        $('#add').click(()=>{
            $('#qt').val(+$('#qt').val() +1)
           
        })
        $('#mins').click(()=>{
            $('#qt').val(+$('#qt').val() -1)
            if(+$('#qt').val()<1 ){
                 $('#qt').val(1 )            
             }
        })

    }
    calc()
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>
