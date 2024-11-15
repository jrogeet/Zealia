<?php view('partials/head.view.php'); ?>

<body class="">
    <?php if(isset($notifications)){
        view('partials/nav.view.php', ['notifications' => $notifications]);
    } elseif (! isset($notifications)) {
        view('partials/nav.view.php');
    }
    ?>

    <script src="assets/js/shared-scripts.js"></script>
</body>

</html>