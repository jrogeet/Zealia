<?php view('partials/head.view.php'); ?>

<body class="flex flex-col justify-between">
    <?php view('partials/nav.view.php')?>
    <main class="h-[735px] mt-32">
        <p>
            Signup Successful.
            Please check your email to activate your account.
        </p>

        <!-- search for the email -->
        <a href="https://mail.google.com/mail/u/1/#search/Zealia">
            <p>Check Email</p>
        </a>
    </main>

    <?php view('partials/footer.view.php'); ?>
</body>