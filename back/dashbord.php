<?php 
session_start();
if(isset($_SESSION['admin'])){
  header('location:login.php');
}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <title>Dashbord</title>
</head>
<body>




<section class="min-h-screen w-full relative ">
    <?php 
        include("../inc/navAdmin.php");
        require('../database/conection.php');
    ?>
    <main class="bg-white w-[calc(100%-300px)] min-h-screen absolute left-[300px] transition-all duration-700">
        <nav class="p-4 mb-4 sticky top-0 z-50"> 
          <div class="flex items-center justify-between p-3 rounded-xl shadow-md bg-[#FFD3AC]">
            <span class="cursor-pointer show" id="menu"><i class="fa-solid fa-bars fa-2x" ></i></span>
            <h1 class="text-2xl font-bold text-[#FD4112] mt-2">Universe store</h1> 
            <div><img src="../assets/img/user.png" width="50px" alt=""></div>
          </div>
        </nav>
        <section class="p-4  min-h-screen">
          <div class=" flex justify-around flex-wrap ">
            <div class="flex justify-between items-center bg-[#FFD3AC] w-[200px] rounded-lg p-4 gap-4">
              <div>
                <h1 class="font-bold text-xl"><?php echo $connection->query("SELECT COUNT(*) FROM product")->fetchColumn(); ?></h1>
                <h2 class="font-bold text-xl">Products</h2>
              </div>
              <div>
                <img  src="../assets/img/boxes_3638933.png" alt="">
              </div>
            </div>

            <div class="flex justify-between items-center bg-[#FFD3AC] w-[200px] rounded-lg p-4 gap-4">
              <div>
                <h1 class="font-bold text-xl"><?php echo $connection->query("SELECT COUNT(*) FROM orderr")->fetchColumn(); ?></h1>
                <h2 class="font-bold text-xl">Orders:</h2>
              </div>
              <div>
                <img  src="../assets/img/options_718970.png" alt="">
              </div>
            </div>

            <div class="flex justify-between items-center bg-[#FFD3AC] w-[200px] rounded-lg p-4 gap-4">
              <div>
                <h1 class="font-bold text-xl"><?php echo $connection->query("SELECT COUNT(*) FROM userr")->fetchColumn(); ?></h1>
                <h2 class="font-bold text-xl">Clients</h2>
              </div>
              <div>
                <img  src="../assets/img/rating_1603811.png" alt="">
              </div>
            </div>

            <div class="flex justify-between items-center bg-[#FFD3AC] w-[200px] rounded-lg p-4 gap-4">
              <div>
                <h1 class="font-bold text-xl"><?php echo $connection->query("SELECT COUNT(*) FROM admin")->fetchColumn(); ?></h1>
                <h2 class="font-bold text-xl">Admins</h2>
              </div>
              <div>
                <img  src="../assets/img/classroom_3406165.png" alt="">
              </div>
            </div>

          </div>
          <div class=" grid grid-cols-2 mt-12">
            <?php 
              $top5 = "select p.libell, sum(o.quantity) AS total_quantity
              FROM order_line o
              inner join product p 
              on p.id_product = o.id_product
              GROUP by p.libell
              ORDER by total_quantity desc;";
              $statTop5 = $connection -> query($top5);
              $resulta3 = $statTop5 -> fetchAll(PDO::FETCH_ASSOC);

              $p0Name= $resulta3[0]['libell'];
              $p0Quantity= $resulta3[0]['total_quantity'];
              $p1Name= $resulta3[1]['libell'];
              $p1Quantity= $resulta3[1]['total_quantity'];
              $p2Name= $resulta3[2]['libell'];
              $p2Quantity= $resulta3[2]['total_quantity'];
              $p3Name= $resulta3[3]['libell'];
              $p3Quantity= $resulta3[3]['total_quantity'];
              $p4Name= $resulta3[4]['libell'];
              $p4Quantity= $resulta3[4]['total_quantity'];

              $categoriesPr ="SELECT c.libell, COUNT(p.id_product) AS product_count
              FROM category c
              INNER JOIN product p ON p.id_category = c.id_category
              GROUP BY c.libell 
              ORDER by product_count DESC;";

              $statCategories = $connection -> query($categoriesPr);
              $resulta4 = $statCategories -> fetchAll(PDO::FETCH_ASSOC);
              $category0 =$resulta4[0]['libell'];
              $category0count =$resulta4[0]['product_count'];
              $category1 =$resulta4[1]['libell'];
              $category1count =$resulta4[1]['product_count'];
              $category2 =$resulta4[2]['libell'];
              $category2count =$resulta4[2]['product_count'];           
              $category3 =$resulta4[3]['libell'];
              $category3count =$resulta4[3]['product_count'];
              $category4 =$resulta4[4]['libell'];
              $category4count =$resulta4[4]['product_count'];
              $category5 =$resulta4[5]['libell'];
              $category5count =$resulta4[5]['product_count'];
              $category6 =$resulta4[6]['libell'];
              $category6count =$resulta4[6]['product_count'];
              $category7 =$resulta4[7]['libell'];
              $category7count =$resulta4[7]['product_count'];                            
            ?>
            <div class=""><canvas id="myChart" height="200px" ></canvas></div>
            <div class=""><canvas id="myChart1" height="200px"></canvas></div>
                         
          </div>
        </section>
    </main>
</section>


<script>
  const ctx = document.getElementById('myChart');
  const ctx1 = document.getElementById('myChart1');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['<?php echo $p2Name ?>', '<?php echo $p0Name ?>', '<?php echo $p1Name ?>', '<?php echo $p4Name ?>', '<?php echo $p3Name ?>'],
      datasets: [{
        label: 'Top 5 Products',
        data: [
          <?php echo json_encode($p2Quantity) ?>,
          <?php echo json_encode($p0Quantity) ?>,
          <?php echo json_encode($p1Quantity) ?>,
          <?php echo json_encode($p4Quantity) ?>,
          <?php echo json_encode($p3Quantity) ?>
        ],
        backgroundColor: [
        '#fc2b47',
        '#f26d0f',
        '#ecf016',
        '#2e994a',
        '#1c88ed'
      ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  new Chart(ctx1, {
    type: 'doughnut',
    data: {
      labels: ['<?php echo $category0 ?>', '<?php echo $category1 ?>', '<?php echo $category2 ?>', '<?php echo $category3 ?>', '<?php echo $category4 ?>', '<?php echo $category5 ?>', '<?php echo $category6 ?>', '<?php echo $category7 ?>'],
      datasets: [{
        label: 'Top 5 Products',
        data: [
          <?php echo json_encode($category0count) ?>,
          <?php echo json_encode($category1count) ?>,
          <?php echo json_encode($category2count) ?>,
          <?php echo json_encode($category3count) ?>,
          <?php echo json_encode($category4count) ?>,
          <?php echo json_encode($category5count) ?>,
          <?php echo json_encode($category6count) ?>,
          <?php echo json_encode($category7count) ?>
        ],
        backgroundColor: [
          '#a500ff',
        '#fc2b47',
        '#f26d0f',
        '#2de0fc',
        '#2e994a',
        '#fc2dd9',
        '#ecf016',
        '#1c88ed'
      ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      
    }
  });
</script>

<script src="../back/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

</body>
</html>

