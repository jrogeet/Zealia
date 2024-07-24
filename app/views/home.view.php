<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Zealia</title>
    <!-- <link rel="stylesheet" type="text/css"  href="assets/css/output.css"> -->
    <link rel="stylesheet" href="assets/css/output.css">
</head>

<body>
    <?php if(isset($notifications)){
        view('partials/nav.view.php', ['notifications' => $notifications]);
    } elseif (! isset($notifications)) {
        view('partials/nav.view.php');
    }
    ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>

<style>
    <?php include base_path('public/assets/css/shared-styles.css'); ?>
</style>
</html>