<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Confirm Email</title>
    <link rel="stylesheet" type="text/css" href="assets/css/partials/navbar.css">
    <link rel="stylesheet" type="text/css"  href="assets/css/shared-styles.css">
    <link rel="stylesheet" type="text/css"  href="assets/css/session/success-signup.css">
</head>

<style>
    <?php 
        
        include base_path('public/assets/css/shared-styles.css');

    ?>

</style>
<body>
    <?php view('partials/nav.view.php')?>
    <main>
        <p>
            Signup Successful.
            Please check your email to activate your account.
        </p>
    </main>


</body>