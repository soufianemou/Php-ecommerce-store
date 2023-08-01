<?php 
include('../inc/navFront.php')
?>

    <!-- start section home  -->
    <section class="bg-[#FFD3AC]  pb-10 pt-16" id="home">
        <div class="lg:grid grid-cols-2 gap-4 w-[80%] mx-auto">
            <div class="text-center">
                <span class="text-[red] mb-2 font-bold">New collection</span>
                <h1  class="text-[red] border-b-4 border-[red] text-7xl font-bold mb-5"><span>Sale 20% OFF </span></h1>
                <h1 class="font-bold text-4xl mb-4">On Everything</h1>
                <p class="leading-relaxed font-bold text-xl">At universe store, we offer a wide range of high-quality of sport equipment. Whether you're , we've got you covered. we have everything you need to excel in your favorite sport and enhance your performance .</p>
                <div class="d-flex justify-content-center my-12">
                    <a href="./allProducts.php" class="bg-[#FD4112] font-bold text-2xl p-3 rounded-md text-white hover:text-[#FFD3AC] shadow-lg">View collection</a>
                </div>
            </div>
            <div class="flex justify-center items-center mt-5  lg:mt-0">
                <img src="../assets/img/new.jpg" alt="" class="w-full md:w-[70%] lg:w-[100%]">
            </div>
        </div>
    </section>
    <!-- end section home  -->


    <!-- start section why us  -->
    <section class="bg-[#FFD3AC] pt-3 pb-10">
        <h2 class="text-center my-10 text-5xl font-bold underline underline-offset-4 ">why shop with us</h2>
        <div class="grid grid-cols-1 w-[80%] mx-auto md:grid-cols-2 lg:grid-cols-4">
            <div class="shadow-lg w-[70%] lg:w-[90%] mx-auto flex flex-col text-center border-2  border-[#FD4112] p-3 mb-5 rounded-md cursor-pointer transition-all duration-500 hover:bg-[#FD4112] hover:text-white hover:scale-110" >
                <div class="my-3"><i class="fa-solid fa-3x  fa-star"></i></div>
                <h4 class="font-black text-xl">BEST QUALITY</h4>
                <p class="my-2">Shall open divide a one</p>
            </div>
            <div class="shadow-lg w-[70%] lg:w-[90%] mx-auto flex flex-col text-center border-2  border-[#FD4112] p-3 mb-5 rounded-md cursor-pointer transition-all duration-500 hover:bg-[#FD4112] hover:text-white hover:scale-110" >
                <div class="my-3"><i class="fa-solid fa-3x  fa-truck"></i></div>
                <h4 class="font-black text-xl">FREE DELIVERY</h4>
                <p class="my-2">Shall open divide a one</p>
            </div>
            <div class="shadow-lg w-[70%] lg:w-[90%] mx-auto flex flex-col text-center border-2  border-[#FD4112] p-3 mb-5 rounded-md cursor-pointer transition-all duration-500 hover:bg-[#FD4112] hover:text-white hover:scale-110" >
                <div class="my-3"><i class="fa-solid fa-3x  fa-wallet"></i></div>
                <h4 class="font-black text-xl">SECURE PAYEMENT</h4>
                <p class="my-2">Shall open divide a one</p>
            </div>
            <div class="shadow-lg w-[70%] lg:w-[90%] mx-auto flex flex-col text-center border-2  border-[#FD4112] p-3 mb-5 rounded-md cursor-pointer transition-all duration-500 hover:bg-[#FD4112] hover:text-white hover:scale-110" >
                <div class="my-3"><i class="fa-solid fa-3x  fa-headphones"></i></div>
                <h4 class="font-black text-xl">ALWAYS SUPPORT</h4>
                <p class="my-2">Shall open divide a one</p>
            </div>
            
        </div>

    </section>
    <!-- end section why us  -->


    <!-- start men section  -->
    <section class="py-10 ">
        <div class="w-[80%] mx-auto ">
            <h2 class="text-center text-4xl my-8 text-[#FD4112] font-bold tracking-widest">Men Collection</h2>
            <div class="grid grid-cols-4 gap-3 ">
                <div class="col-span-2 relative">
                    <img src="../assets/img/gabin-vallet-a0totlIZMxM-unsplash (1).jpg" alt="" class="h-full">
                    <a href="./menCollection.php" class="bg-[yellow] py-2 px-6 absolute bottom-5 left-[36%] font-bold text-xl rounded-lg hover:scale-110">Discover</a>
                </div>
                <div class="col-span-2 grid grid-cols-2 gap-2 ">
                <?php 
                require('../database/conection.php');
                $sql = "SELECT * FROM product where gender in ('men') LIMIT 4";
                $statement = $connection -> query($sql);
                $mens = $statement -> fetchAll(PDO::FETCH_ASSOC);
                foreach($mens as $men){?>
                    <div class=" shadow-lg border border-1 p-2 relative rounded-xl bg-[white]">                
                        <a href="./productPage.php?id=<?php echo $men['id_product'] ?>" class="">
                        <span class="bg-[red] text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded z-10 absolute left-2 top-2">-<?php echo $men['discount'] ?>%</span>
                        <img src="../upload/<?php echo $men['image_product'] ?>"  alt="" class=" rounded-t-lg mx-auto w-[100%]">
                        <h3 class="font-bold text-md  my-3 text-center"><?php echo $men['libell'] ?></h3>
                            <div class="flex items-center justify-around">
                                <span class="text-2xl font-bold ">$<?php echo $men['finalePrice'] ?></span>
                                <button  class="text-black hover:text-white bg-[#FFD3AC] hover:bg-[#FD4112] font-bold rounded-md text-xl px-5 py-2.5 text-center ">Buy</button>
                            </div>
                        </a>                   
                    </div>
                <?php }?>
                </div>             
            </div>
        </div>

    </section>
    <!-- end men section  -->


    <!-- start carousel section  -->
        <section class="my-10">
            <div class="w-[100%] mx-auto">            
                <div id="controls-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden md:h-[500px]">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <a href="../vue/category.php?id=4"><img src="../assets/img/v1.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2    " alt="..."></a>
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                            <a href="../vue/category.php?id=3"><img src="../assets/img/basketball.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."></a>
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <a href="../vue/category.php?id=7"><img src="../assets/img/Cyclisme.jpg"  class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."></a>
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <a href="../vue/category.php?id=6"><img src="../assets/img/Swimming.jpg " class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."></a>
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <a href="../vue/category.php?id=5"><img src="../assets/img/football.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."></a>
                        </div>
                        <!-- Item 6 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <a href="../vue/category.php?id=1"><img src="../assets/img/fitness.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."></a>
                        </div>
                        <!-- Item 7 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <a href="../vue/category.php?id=2"><img src="../assets/img/running.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."></a>
                        </div>
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>

            </div>
        </section>
    <!-- end carousel section  -->


    <!-- start women section  -->
        <section class="py-10 ">
            <div class="w-[80%] mx-auto ">
                <h2 class="text-center text-4xl my-8 text-[#FD4112] font-bold tracking-widest">women Collection</h2>
                <div class="grid grid-cols-4 gap-3 ">  
                    <div class="col-span-2 grid grid-cols-2 gap-2 ">
                    <?php 
                        require('../database/conection.php');
                        $sql = "SELECT * FROM product where gender in ('women') LIMIT 4";
                        $statement = $connection -> query($sql);
                        $women = $statement -> fetchAll(PDO::FETCH_ASSOC);
                        foreach($women as $woman){?>
                            <div class=" shadow-lg border border-1 p-2 relative rounded-xl bg-[white]">                
                                <a href="./productPage.php?id=<?php echo $woman['id_product'] ?>" class="">
                                <span class="bg-[red] text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded z-10 absolute left-2 top-2">-<?php echo $woman['discount'] ?>%</span>
                                <img src="../upload/<?php echo $woman['image_product'] ?>"  alt="" class=" rounded-t-lg mx-auto w-[100%]">
                                <h3 class="font-bold text-md  my-3 text-center"><?php echo $woman['libell'] ?></h3>
                                    <div class="flex items-center justify-around">
                                        <span class="text-2xl font-bold ">$<?php echo $woman['finalePrice'] ?></span>
                                        <button  class="text-black hover:text-white bg-[#FFD3AC] hover:bg-[#FD4112] font-bold rounded-md text-xl px-5 py-2.5 text-center ">Buy</button>
                                    </div>
                                </a>                   
                            </div>
                    <?php }?>
                    </div>  
                    <div class="col-span-2 relative">
                        <img src="../assets/img/women.jpg" alt="" class="h-full">
                        <a href="./womenCollection.php" class="bg-[yellow] py-2 px-6 absolute bottom-5 left-[36%] font-bold text-xl rounded-lg hover:scale-110">Discover</a>
                    </div>           
                </div>
            </div>

        </section>
    <!-- end men section  -->



    <!-- start section about us -->
    <section class="bg-[#ff5a35] pb-7 md:pb-0" id="about">
        <div class="w-[80%] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div class="order-2">

                <img src="../assets/img/Lovepik_com-401041727-sports-training-population-elements.png" alt="" class="order-2">   
            </div>
            <div class="flex flex-col items-center justify-center order-1 lg:order-3">
                <h2 class="text-4xl my-6 lg:my-3 ">About Us</h2>
                <p class="text-xl text-center text-white ">Welcome to Universe Store, your ultimate destination for all your sports equipment needs. At Universe Store, we are passionate about helping athletes and sports enthusiasts reach their full potential.
                    At Universe Store, we're passionate about fueling your sports journey. With a vast selection of equipment and a welcoming environment, we empower athletes of all levels to reach their full potential. Join us and explore the world of sports as we inspire greatness together.
                </p>
            </div>
        </div>
    </section>
    <!-- end section about us -->


    <!-- start section contact us -->
    <section class="bg-[#FFD3AC] py-10 " id="contact">
        <div class="grid grid-cols-1 md:grid-cols-2 w-[80%] mx-auto">
            <form action="" method="post" class="flex flex-col justify-center items-center mb-3">
                <h2 class="text-3xl">Contact Us</h2>
                <input type="text" placeholder="Full name" class="shadow-lg my-6 rounded-xl w-80 border-none focus:ring focus:ring-[#FD4112]">
                <input type="email" placeholder="Email" class="shadow-lg rounded-xl w-80 border-none focus:ring focus:ring-[#FD4112]">
                <textarea name="" id="" placeholder="Your message"  class="shadow-lg my-6 p-4 rounded-xl w-80 border-none focus:ring focus:ring-[#FD4112]" ></textarea>
                <input type="submit" value="Submit" class="shadow-lg rounded-xl bg-[#FD4112] hover:bg-[#FEBB86] px-4 py-2 cursor-pointer">
            </form>
            <img src="../assets/img/Contact_us_re_4qqt.png" alt="" class=" ">
        </div>
    </section>
    <!-- start section contact us -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

<?php 
include('../inc/footerFront.php')
?>

<script src="../assets/js/main.js"></script>
</body>
</html>