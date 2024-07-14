<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zealia</title>
    <link rel="stylesheet" type="text/css" href="assets/css/rooms/groups/grouping.css">
</head>
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

