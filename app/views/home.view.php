<?php view('partials/head.view.php'); ?>

<body class="flex flex-col justify-center overflow-x-hidden">

    <?php if(isset($notifications)){
        view('partials/nav.view.php', ['notifications' => $notifications]);
    } elseif (! isset($notifications)) {
        view('partials/nav.view.php');
    }
    ?>

    <div class="self-center flex flex-col w-web justify-center text-white">
        <section class="relative  flex justify-center items-end">
            <!-- <div> -->
                <img class=" h-168 z-20 select-none" src="assets/images/Header-Computer-Merge.png">
            <!-- </div> -->

            <div class="absolute z-50 right-24 break-words h-80 w-64 mb-4">
                <h1 class="text-4xl">01 / 03</h1>
                <p class="text-base font-semibold">
                    Zealia Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Architecto, temporibus. Distinctio, maxime nulla beatae quibusdam sequi doloremque, 
                    temporibus id placeat non eveniet quos nostrum vitae iusto laborum nesciunt rem tempore.
                </p>
            </div>
        </section>

        <section class="h-192">

        </section>

        <section class="h-192">

        </section>    
    </div>


    


    <!-- <img class="w-auto" src="assets/images/background.png"> -->
    <script src="assets/js/shared-scripts.js"></script>
</body>

<style>
    <?php include base_path('public/assets/css/shared-styles.css'); ?>
</style>
</html>