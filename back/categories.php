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
            <a href="./add_category.php" class="inline-block my-8 text-lg font-medium bg-[#ff7d1a] p-2 text-white hover:text-black rounded-lg">Add Category</a>                        
            <div class="relative overflow-x-auto shadow-lg sm:rounded-lg mt-6">
                <table class="w-full text-sm text-center ">
                    <thead class="text-xs uppercase bg-[#ff7d1a] ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Category ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Icon
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Creation Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Operation
                            </th>                              
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      include('../database/conection.php');
                      $sql = 'SELECT * from category';
                      $statement = $connection -> query($sql);
                      $categories = $statement -> fetchAll(PDO::FETCH_ASSOC);
                      foreach($categories as $category){?>
                      <tr class="hover:bg-[#FFD3AC]">
                        <td class="px-6 py-4  font-medium"><?php echo $category['id_category'] ?></td>
                        <td class="px-6 py-4  font-medium"><?php echo $category['libell'] ?></td>
                        <td class="px-6 py-4  font-medium"><?php echo $category['description'] ?></td>
                        <td class="px-6 py-4  font-medium"><i class="fa-2x <?php echo $category['icon'] ?>" ></i></td>
                        <td class="px-6 py-4  font-medium"><?php echo $category['date_creation'] ?></td>
                        <td class="px-6 py-4 text-center">
                          <a href="./update_category.php?id=<?php echo $category['id_category'] ?>" class="font-medium me-2"><i class="fa-solid fa-pen-to-square fa-2x" style="color: green;"></i></a>
                          <a href="./delete_category.php?id=<?php echo $category['id_category'] ?>" class="font-medium" onclick="return deleteCategory(event)">
                            <span><i class="fa-solid fa-trash fa-2x" style="color: red;"></i></span>
                          </a>
                        </td>
                      </tr> 
                      <?php }?>
                    </tbody>
                </table>
            </div>
          </div>
        </section>
    </main>
</section>


<script>

function deleteCategory(event) {
    event.preventDefault();
    const anchor = event.target.closest('a');
    if (anchor) {
        Swal.fire({
            icon: 'warning',
            title: 'Are you sure you want to delete this category?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'The category has been deleted.',
                    showConfirmButton: false,
                    timer: 1000
                }).then(() => {
                    window.location.href = anchor.href;
                });
            }
        });
    }
}
</script>


<script src="../back/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

</body>
</html>

<?php 
}else{
    header('location: login.php');
}
?>