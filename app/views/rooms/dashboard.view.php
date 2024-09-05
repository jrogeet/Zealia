<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between items-center">
    <?php view('partials/nav.view.php')?>

    <main class="h-[41rem] w-[87.5rem] mt-32 mb-40">
        <span class="font-synebold text-5xl text-black1">Dashboard</span>
        <div class="h-[43.75rem] w-[87.5rem] border-black1 border-2 rounded-t-[1.25rem] mt-4">
            <div class="h-[3.75rem] border-black1 border-b-2 flex justify-between items-center px-5">
                <div class="flex justify-between gap-4">
                    <div class="flex justify-between h-[2.25rem] w-[4.875rem]">
                        <button class="bg-tiles h-[2.25rem] w-[2.25rem] border border-grey2 rounded-lg"></button>

                        <button class="bg-borger h-[2.25rem] w-[2.25rem] border border-grey2 rounded-lg"></button>
                    </div>

                    <input class="h-[2.25rem] w-[30rem] bg-white2 border border-grey2 text-grey1 font-synemed rounded-lg px-4" placeholder="Search Joined Room">
                </div>

                <div class="flex justify-between gap-4">
                    <input class="h-[2.25rem] w-[12.5rem] bg-white2 border border-grey2 font-synemed text-grey1 text-base px-4" placeholder="Enter room name">
                    <button class="bg-orange1 h-[2.25rem] w-[6.25rem] font-synesemi rounded-lg">Create</button>
                </div>
            </div>

            <!-- TILES  -->
            <!-- <div class="h-[39.76rem] w-full overflow-y-scroll overflow-x-hidden">
                <div class="flex flex-wrap gap-x-2.5 gap-y-10 min-h-[36rem] w-[84.5rem] m-4"> -->
                    <!--  ROOMS  -->
                    <!-- <div class="bg-white2 flex flex-col justify-between h-40 w-[27.625rem] p-6 rounded-2xl">
                        <div>   
                            <h1 class="font-synemed text-2xl">Room Name</h1>
                            <span class="text-grey2 text-base">Name of D. Professor</span>
                        </div>
                        <span class="text-grey2 text-base">123456</span>
                    </div>
                </div>
            </div> -->

            <div class="bg-green-400 h-full w-full overflow-y-scroll overflow-x-hidden">
                <table class="h-full w-full">
                    <thead class="bg-blue3 h-10 font-synereg text-xl">
                        <tr>
                            <th class="text-white1">Room Name</th>
                            <th class="text-white1">Instructor Name</th>
                            <th class="text-white1">Room Code</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>

                        </tr>
                    </tbody>
                </table>
           </div> 
            
        </div>
    </main>

    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>


</html>