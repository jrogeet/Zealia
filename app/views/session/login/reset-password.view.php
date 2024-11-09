<?php view('partials/head.view.php'); ?>

<body class="flex flex-col items-center justify-between bg-white1">
    <?php view('partials/nav.view.php')?>

    <main class="h-[41rem] w-[87.5rem] mt-20 flex flex-col space-between">
        <h1 class="text-3xl font-synereg">Change Password</h1>
        <form method="post" action="/reset" class="flex flex-col">
                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

                <label class="" for="password">New Password</label>
                <input class="pass-input" type="password" name="password" placeholder="New Password" required>

                <label class="" for="password_confirmation">Confirm Password</label>
                <input class="" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <?php if (isset($errors['password'])): ?>
                                <p class=""><?= $errors['password'] ?></p>
                <?php elseif (isset($errors['password-letter'])): ?>
                                <p class=""><?= $errors['password-letter'] ?></p>
                <?php elseif (isset($errors['password-number'])): ?>
                                <p class=""><?= $errors['password-number'] ?></p>
                <?php elseif (isset($errors['password-confirm'])): ?>
                                <p class=""><?= $errors['password-confirm'] ?></p>
                <?php endif; ?>
                <button  class="w-3/6 py-2 text-xl border bg-blue3 hover:bg-orange1 hover:text-black1 border-blue3 rounded-xl font-synereg text-white1" type="submit">Change Password</button>
        </form>
    </main>
    
    <?php view('partials/footer.view.php')?>
    <script src="assets/js/shared-scripts.js"></script>
</body>