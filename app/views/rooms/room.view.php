<?php view('partials/head.view.php'); ?>

<body class="flex flex-col justify-between mx-auto items-center overflow-x-hidden min-h-auto h-screen w-[96rem] bg-white1">
    <?php view('partials/nav.view.php')?>
    
    <main class="min-h-[40rem] flex flex-col justify-between w-[87.5rem]  mt-20 bg-red-400">
        <!-- Head: Room Name, Code, Instructor -->
        <div class="w-full h-20 mt-10 border-b-2 border-black">
            <h2 class="text-4xl font-clashbold"><?= $room_info['room_name'] ?></h2>
            <div class="flex justify-between w-full">
                <span class="text-xl font-satoshireg">Room Code: <?= $room_info['room_code'] ?></span>
                <span class="text-xl font-satoshireg">Instructor: Pnagalan</span>
            </div>
        </div>

        <!-- Body -->
         <div class="flex justify-between w-full">
            <!-- Group -->
            <div class="flex flex-col h-[32rem] w-3/12 bg-blue-400">
                
            </div>

            <!-- Kanban -->
            <div class="flex flex-col w-9/12 h-[32rem] bg-green-400">
                
            </div>
            
         </div>
    </main>

    <?php view('partials/footer.view.php')?>

    <script src="assets/js/shared-scripts.js"></script>
    <script src="assets/js/grouping.js"></script>
    <script src="assets/js/fetch/fetch.js"></script>

    <!-- FETCHING -->
    
</body>
</html>
