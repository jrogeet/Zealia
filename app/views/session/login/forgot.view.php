<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Forgot Password</title>

    <link rel="stylesheet" type="text/css" href="assets/css/partials/navbar.css">
    <link rel="stylesheet" type="text/css"  href="assets/css/session/forgot.css">
</head>

<style> <?php  include base_path('public/assets/css/shared-styles.css');?> </style>

<body>
    <?php view('partials/nav.view.php')?>

    <main>
        <h1 class="forgot-header">Forgot Password</h1>
        <form method="post" action="/forgot-password">
            <div class="forgot-form-container">
                <label class="email-label" for="email">EMAIL</label>
                <input class="forgot-input" type="email" name="email" placeholder="Email" required>
                <input class="forgot-submit" type="submit" value="Send Reset Email">
            </div>

        </form>
    </main>
</body>