<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between items-center">
    <?php view('partials/nav.view.php')?>
    <main class="flex flex-col h-[50rem] w-[87.5rem] mt-20">
        <div class="flex h-8 my-6">
            <div class="max-w-[64rem] truncate">
                <span class="font-synebold text-3xl text-black1 mr-1">Room Name that the instructor gave crazy newjeans ditto lalala young posse</span>
            </div>
            
            <button class="h-4 w-4 rounded bg-grey2"></button>
        </div>


        <div class="flex justify-between">
            <!-- Class List & Requests -->
           <div class="h-[37.5rem] w-[18.75rem] border border-black1 rounded-xl">
                <!-- Tabs -->
                <div class="flex">
                    <button class="bg-blue3 h-[2.81rem] w-[9.37rem] font-synereg text-white1 border border-black1 rounded-tl-xl">Students</button>
                    <button class="bg-blue2 h-[2.81rem] w-[9.37rem] font-synereg text-black1 border border-black1 rounded-tr-xl">Join Requests</button>
                </div>

                <!-- List -->
                <div class="hidden h-[34.5rem] overflow-y-auto overflow-x-hidden rounded-b-xl">
                    <div class="flex justify-between h-[3.75rem] bg-blue1 border border-black1 p-4">
                        <span class="text-base font-synereg">Surname, First Name</span>

                        <button class="h-6 w-6 bg-red1 rounded">

                        </button>
                    </div>

                </div>

                <!-- Requests -->
                <div class="h-[34.5rem] overflow-y-auto overflow-x-hidden rounded-b-xl">
                    <div class="flex justify-between items-center h-20 px-2 bg-blue1 border border-black1">
                        <div class="w-52 flex flex-col">
                            <span class="font-synereg text-base">Surname, First Name</span>
                            <span class="font-synereg text-sm text-grey2">0123456789</span>
                            <div class="truncate">
                                <span class="font-synereg text-sm text-grey2">studentsemail@student.fatima.edu.ph</span>
                            </div>
                        </div>

                        <div class="flex h-6 w-16 justify-evenly">
                            <button class="h-6 w-6 bg-green1 rounded"></button>
                            <button class="h-6 w-6 bg-red1 rounded"></button>
                        </div>
                    </div>
                    
                </div>
           </div>

           <!-- Groups Area -->
           <div class="h-[37.5rem] w-[67.5rem] border border-black1 rounded-xl">
                <div class="flex flex-col">
                    <span class="text-4xl">You haven't grouped the class yet.</span>
                    <button></button>
                </div>
            </div>
        </div>
    </main>
    <?php view('partials/footer.view.php')?>
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>