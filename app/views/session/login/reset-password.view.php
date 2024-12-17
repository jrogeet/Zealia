<?php view('partials/head.view.php'); ?>

<body class="flex flex-col items-center justify-between bg-white">
    <?php view('partials/nav.view.php')?>

    <main class="h-[41rem] w-[87.5rem] mt-20 flex flex-col items-center justify-center">
        <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-2xl">
            <h1 class="mb-8 text-3xl text-center font-satoshimed text-black1">Change Password</h1>
            
            <form method="post" action="/reset" class="flex flex-col space-y-4">
                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

                <div class="space-y-2">
                    <label class="block text-sm text-gray-700 font-satoshimed" for="password">New Password</label>
                    <input 
                        class="w-full px-4 py-2 transition-all border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue3 focus:border-blue3"
                        type="password" 
                        name="password" 
                        placeholder="Enter your new password" 
                        required
                    >
                </div>

                <div class="space-y-2">
                    <label class="block text-sm text-gray-700 font-satoshimed" for="password_confirmation">Confirm Password</label>
                    <input 
                        class="w-full px-4 py-2 transition-all border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue3 focus:border-blue3"
                        type="password" 
                        name="password_confirmation" 
                        placeholder="Confirm your new password" 
                        required
                    >
                </div>

                <?php if (isset($errors['password']) || isset($errors['password-letter']) || isset($errors['password-number']) || isset($errors['password-confirm'])): ?>
                    <div class="p-3 border border-red-200 rounded-lg bg-red-50">
                        <?php if (isset($errors['password'])): ?>
                            <p class="text-sm text-red-600"><?= $errors['password'] ?></p>
                        <?php elseif (isset($errors['password-letter'])): ?>
                            <p class="text-sm text-red-600"><?= $errors['password-letter'] ?></p>
                        <?php elseif (isset($errors['password-number'])): ?>
                            <p class="text-sm text-red-600"><?= $errors['password-number'] ?></p>
                        <?php elseif (isset($errors['password-confirm'])): ?>
                            <p class="text-sm text-red-600"><?= $errors['password-confirm'] ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <button class="w-full mt-6 py-3 text-xl bg-blue3 hover:bg-orangeaccent text-white hover:text-black1 rounded-xl font-satoshimed transition-all duration-300 transform hover:scale-[1.02]" type="submit">
                    Change Password
                </button>
            </form>
        </div>
    </main>
    
    <?php view('partials/footer.view.php')?>
    <script src="assets/js/shared-scripts.js"></script>
</body>