<?php view('partials/head.view.php'); ?>

<body>
    <?php //dd($rows);?>

    <div class="header">
        <h1> Zealia </h1>
    </div>

    <div class="content">
        <div id="groups">
        </div>
    </div>


    <script>
    // Use json_encode to properly handle special characters and pass its value to grouping.js
        var rows = <?php echo json_encode($rows); ?>;
    </script>
    <script src="assets/js/grouping.js"></script>
</body>
</html>

