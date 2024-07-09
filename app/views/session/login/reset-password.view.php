<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="assets/css/partials/navbar.css">
    <link rel="stylesheet" type="text/css"  href="assets/css/session/forgot.css">
</head>

<style>
    <?php 
        
        include base_path('public/assets/css/shared-styles.css');

    ?>

</style>
<body>
    <?php view('partials/nav.view.php', ['notifications' => $notifications])?>

    <main>
        <h1 class="forgot-header">Change Password</h1>
        <form method="post" action="/reset-password">
            <div class="change-input-container">
                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

                <label class="pass-label" for="password">New Password</label>
                <input class="pass-input" type="password" name="password" placeholder="New Password" required>

                <label class="pass-label for="password_confirmation">Confirm Password</label>
                <input class="pass-input" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <?php if (isset($errors['password'])): ?>
                                <p class="error-msg"><?= $errors['password'] ?></p>
                <?php elseif (isset($errors['password-letter'])): ?>
                                <p class="error-msg"><?= $errors['password-letter'] ?></p>
                <?php elseif (isset($errors['password-number'])): ?>
                                <p class="error-msg"><?= $errors['password-number'] ?></p>
                <?php elseif (isset($errors['password-confirm'])): ?>
                                <p class="error-msg"><?= $errors['password-confirm'] ?></p>
                <?php endif; ?>
                <button class="change-btn" type="submit">Change Password</button>
            </div>
        </form>
    </main>


</body>