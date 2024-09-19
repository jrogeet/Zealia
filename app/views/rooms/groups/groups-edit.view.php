<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between items-center">
    <?php view('partials/nav.view.php')?>
    
    <main class="flex flex-col h-[50rem] w-[87.5rem] mt-20">
        <?php dd($groups);?>

        <?php foreach($groups as $group): ?>
            <?php dd($group); ?>
        <?php endforeach; ?>
    </main>


    <?php view('partials/footer.view.php')?>
    <script src="assets/js/edit-groups.js"></script>
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>