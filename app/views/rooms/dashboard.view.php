<?php view('partials/head.view.php'); ?>

<body class=" bg-white1 flex flex-col justify-between items-center">
    <?php view('partials/nav.view.php')?>

    <main class="h-[41rem] w-[87.5rem] mt-32 bg-red-400">
        <span class="font-synebold text-5xl text-black1">Dashboard</span>
        <div class="h-[43.75rem] w-[87.5rem] border-black1 border-2 rounded-t-[1.25rem] mt-4">
            <div class="h-[3.75rem] border-black1 border-b-2 flex">
                <div class="flex h-[2.25rem] w-[4.875rem] bg-green-400">
                    <button class="bg-tiles h-[2.25rem]">

                    </button>

                    <button class="bg-borger ">

                    </button>
                </div>

                <input class="" placeholder="Search Joined Room">

                <div>

                </div>
            </div>

            <div class="">
                
            </div>
        </div>
    </main>

    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>


</html>