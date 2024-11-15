<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between overflow-x-hidden">
    <?php view('partials/nav.view.php'); ?>

    <main class="mt-20 text-center flex flex-col items-center p-4">
        <h1 class="text-[18rem] font-clashbold">403</h1>
        <h1 class="mb-4">You're not allowed here chief :)</h1>
        <a class="bg-orange1 w-40 h-10 p-4 rounded-lg border border-black1 flex justify-center items-center" href="/">Go back Home</a>
    </main>

    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>