<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between overflow-x-hidden">
    <?php view('partials/nav.view.php'); ?>

    <main class="h-[30rem] mt-20 text-center flex flex-col justify-center items-center p-4">
        <p class="font-clashbold text-3xl mb-5">
            Account activated successfully
        </p>
        <p>
            You can now 
        </p>
        <!-- search for the email -->
        <a href="/login">
            <p class="bg-blue3 p-2 rounded-lg text-white1 font-satoshimed text-xl">Login</p>
        </a>
    </main>

    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>