<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between overflow-x-hidden">
    <?php view('partials/nav.view.php'); ?>

    <main class="h-[30rem] mt-20 text-center flex flex-col justify-center items-center p-4">
        <p class="font-synebold text-3xl mb-5">
            Signup Successful.
            Please check your email to activate your account.
        </p>
        <!-- search for the email -->
        <a href="https://mail.google.com/mail/u/1/#search/Zealia">
            <p class="bg-blue3 p-2 rounded-lg text-white1 font-synemed text-xl">Check Email</p>
        </a>
    </main>

    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>