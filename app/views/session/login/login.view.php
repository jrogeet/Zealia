<?php view('partials/head.view.php'); ?>

<body class="font-satoshimed bg-blue1">
    <?php view('partials/nav.view.php')?>

    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-2xl">
            <h1 class="mb-8 text-3xl text-center font-satoshimed text-black1">Welcome back to Zealia</h1>

            <form method="POST" action="/login" class="flex flex-col space-y-4">
                <div class="space-y-2">
                    <input 
                        class="w-full px-4 py-2 text-sm transition-all border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue3 focus:border-blue3"
                        placeholder="School Number"
                        type="number"
                        name="school_id"
                        value="<?= old('school_id') ?>"
                        required
                    >
                </div>

                <div class="space-y-2">
                    <input 
                        class="w-full px-4 py-2 text-sm transition-all border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue3 focus:border-blue3"
                        placeholder="Password"
                        type="password"
                        name="password"
                        required
                    >
                    <div class="flex justify-end">
                        <a class="text-sm transition-colors text-blue3 hover:text-orangeaccent" href="/forgot">Forgot password?</a>
                    </div>
                </div>

                <?php if (isset($errors['password']) || isset($errors['school_id']) || isset($errors['activate']) || isset($errors['regexist'])): ?>
                    <div class="p-3 border border-red-200 rounded-lg bg-red-50">
                        <?php if (isset($errors['password'])): ?>
                            <p class="text-sm text-red-600"><?= $errors['password'] ?></p>
                        <?php elseif (isset($errors['school_id'])): ?>
                            <p class="text-sm text-red-600"><?= $errors['school_id'] ?></p>
                        <?php elseif (isset($errors['activate'])): ?>
                            <p class="text-sm text-red-600"><?= $errors['activate'] ?></p>
                        <?php elseif (isset($errors['regexist'])): ?>
                            <p class="text-sm text-red-600"><?= $errors['regexist'] ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if (hasInternetConnection()): ?>
                    <div class="flex justify-center">
                        <div class="g-recaptcha" data-sitekey="<?= $config['recaptcha']['site_key'] ?>"></div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="g-recaptcha-response" value="offline">
                <?php endif; ?>

                <?php if (isset($errors['recaptcha'])): ?>
                    <p class="text-sm text-center text-red-600"><?= $errors['recaptcha'] ?></p>
                <?php endif; ?>

                <button 
                    class="w-full mt-6 py-3 text-lg bg-blue3 hover:bg-orangeaccent text-white hover:text-black1 rounded-xl font-satoshimed transition-all duration-300 transform hover:scale-[1.02]"
                    type="submit"
                    name="login"
                >
                    Sign in
                </button>

                <p class="text-sm text-center">
                    Don't have an account? 
                    <a class="transition-colors text-blue3 hover:text-orangeaccent" href="/register">Create an account</a>
                </p>
            </form>
        </div>
    </div>
</body>