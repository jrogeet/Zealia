<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-control" content="no-cache">
    <title>Zealia</title>
    <!-- <link rel="stylesheet" type="text/css"  href="assets/css/output.css"> -->
    <link rel="icon" href="assets/images/faveicon.ico">
    <link rel="stylesheet" href="assets/css/output.css">

    <script src="assets/js/shared-scripts.js"></script>

    <?php if ($_SERVER['REQUEST_URI'] === '/account' || strpos($_SERVER['REQUEST_URI'], '/room') !== false): ?>
        <script src="assets/js/pdf/jspdf.umd.min.js"></script>
    <?php endif; ?>

    <?php if (($_SERVER['REQUEST_URI'] === '/login' || $_SERVER['REQUEST_URI']=== '/register') && hasInternetConnection()): ?>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <?php endif; ?>
</head>