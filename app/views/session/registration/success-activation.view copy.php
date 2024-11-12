<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Account Activated!</title>
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
            Account activated successfully.
            You can now <a href="/login">Login</a>.
        </p>
    </main>


</body>