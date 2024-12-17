<?php view('partials/head.view.php'); ?>

<body class="flex flex-col justify-between overflow-x-hidden bg-gradient-to-b bg-blue1 from-blue1 to-blue2">
    <?php // view('partials/nav.view.php')?>

    <div class="pt-12 pb-8 bg-white/95 backdrop-blur-sm border border-black/10 rounded-xl shadow-2xl absolute left-[50%] top-[50%] transform -translate-x-1/2 -translate-y-1/2 w-full max-w-[24rem] sm:w-[24rem] h-fit transition-all hover:shadow-3xl"> 

        <h1 class="mx-8 mb-6 text-2xl font-bold text-center sm:text-3xl text-blue3">Create an account</h1>
        
        <?php if (isset($success)): ?>
            <div class="w-2/3 p-4 mx-auto mb-6 text-center bg-green-100 border border-green-400 rounded-lg">
                <p class="mb-3 text-sm text-green-700"><?= $success ?></p>
                <a href="/login" class="inline-block px-6 py-2 text-sm font-semibold text-white transition-all rounded-lg bg-blue3 hover:bg-blue3/90">
                    Proceed to Login
                </a>
            </div>
        <?php endif; ?>

        <?php if (isset($errors['database']) || isset($errors['auth'])): ?>
            <div class="w-2/3 p-3 mx-auto mb-4 bg-red-100 border border-red-400 rounded-lg">
                <p class="text-sm text-center text-red-700">
                    <?= $errors['database'] ?? $errors['auth'] ?? '' ?>
                </p>
            </div>
        <?php endif; ?>

        <form method="POST" action="/register" class="space-y-3">
            <!-- Name Fields with floating labels -->
            <div class="flex justify-between gap-4 mx-12">
                <div class="relative w-[47%]">
                    <input id="lname" 
                        value="<?= old('lname') ?>"
                        class="w-full px-3 text-sm transition-all border h-9 peer border-black/30 rounded-xl bg-white/50 focus:border-blue3 focus:outline-none focus:ring-1 focus:ring-blue3" 
                        type="text" name="lname" required>
                    <label for="lname" class="absolute left-3 -top-2.5 bg-white px-2 text-xs text-gray-600 transition-all peer-placeholder-shown:top-2 peer-placeholder-shown:text-sm peer-focus:-top-2.5 peer-focus:text-xs peer-focus:text-blue3">
                        Last name
                    </label>
                </div>
                <div class="relative w-[47%]">
                    <input id="fname" 
                        value="<?= old('fname') ?>"
                        class="w-full px-3 text-sm transition-all border h-9 peer border-black/30 rounded-xl bg-white/50 focus:border-blue3 focus:outline-none focus:ring-1 focus:ring-blue3" 
                        type="text" name="fname" required>
                    <label for="fname" class="absolute left-3 -top-2.5 bg-white px-2 text-xs text-gray-600 transition-all peer-placeholder-shown:top-2 peer-placeholder-shown:text-sm peer-focus:-top-2.5 peer-focus:text-xs peer-focus:text-blue3">
                        First name
                    </label>
                </div>
            </div>

            <?php if (isset($errors['names'])): ?>
                <p class="text-xs text-center text-red-600"><?= $errors['names'] ?></p>
            <?php endif; ?>

            <!-- School ID with floating label -->
            <div class="relative w-2/3 mx-auto">
                <input id="school_id" 
                    value="<?= old('school_id') ?>"
                    class="w-full px-3 text-sm transition-all border h-9 peer border-black/30 rounded-xl bg-white/50 focus:border-blue3 focus:outline-none focus:ring-1 focus:ring-blue3" 
                    type="number" 
                    name="school_id" 
                    pattern="\d{11,15}"
                    required>
                <label for="school_id" class="absolute left-3 -top-2.5 bg-white px-2 text-xs text-gray-600 transition-all peer-placeholder-shown:top-2 peer-placeholder-shown:text-sm peer-focus:-top-2.5 peer-focus:text-xs peer-focus:text-blue3">
                    School ID (No Dash/Hyphen [-])
                </label>
                <?php if (isset($errors['school_id'])): ?>
                    <p class="mt-1 text-xs text-red-600"><?= $errors['school_id'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Email with floating label -->
            <div class="relative w-2/3 mx-auto">
                <input id="email" 
                    value="<?= old('email') ?>"
                    class="w-full px-3 text-sm transition-all border h-9 peer border-black/30 rounded-xl bg-white/50 focus:border-blue3 focus:outline-none focus:ring-1 focus:ring-blue3" 
                    type="email"
                    name="email"
                    required>
                <label for="email" class="absolute left-3 -top-2.5 bg-white px-2 text-xs text-gray-600 transition-all peer-placeholder-shown:top-2 peer-placeholder-shown:text-sm peer-focus:-top-2.5 peer-focus:text-xs peer-focus:text-blue3">
                    Fatima Email (@[student.]fatima.edu.ph)
                </label>
                <?php if (isset($errors['email'])): ?>
                    <p class="mt-1 text-xs text-red-600"><?= $errors['email'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Password Requirements Card -->
            <div class="w-2/3 p-4 mx-auto border rounded-lg bg-blue1/10 border-blue3/20">
                <p class="mb-2 text-sm font-semibold text-blue3">Password Requirements:</p>
                <ul class="pl-4 space-y-1 text-xs text-gray-600">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-blue3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        At least 8 characters
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-blue3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Uppercase & lowercase letters
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-blue3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        At least one number
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-blue3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        One special character
                    </li>
                </ul>
            </div>

            <!-- Password Fields with show/hide toggle -->
            <div class="relative w-2/3 mx-auto">
                <input id="password" class="w-full h-10 px-4 transition-all border peer border-black/30 rounded-xl bg-white/50 focus:border-blue3 focus:outline-none focus:ring-1 focus:ring-blue3" 
                    type="password" 
                    name="password" 
                    required>
                <label for="password" class="absolute left-3 -top-2.5 bg-white px-2 text-sm text-gray-600 transition-all peer-placeholder-shown:top-2 peer-placeholder-shown:text-base peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue3">
                    Password
                </label>
                <button type="button" onclick="togglePassword('password')" class="absolute right-3 top-2.5 text-gray-500 hover:text-blue3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <div class="relative w-2/3 mx-auto">
                <input id="confirm_password" class="w-full h-10 px-4 transition-all border peer border-black/30 rounded-xl bg-white/50 focus:border-blue3 focus:outline-none focus:ring-1 focus:ring-blue3" 
                    type="password" 
                    name="confirm_password" 
                    required>
                <label for="confirm_password" class="absolute left-3 -top-2.5 bg-white px-2 text-sm text-gray-600 transition-all peer-placeholder-shown:top-2 peer-placeholder-shown:text-base peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue3">
                    Confirm Password
                </label>
                <button type="button" onclick="togglePassword('confirm_password')" class="absolute right-3 top-2.5 text-gray-500 hover:text-blue3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <!-- Password error messages -->
            <?php if (isset($errors['password']) || isset($errors['password-letter']) || 
                      isset($errors['password-number']) || isset($errors['password-special']) || 
                      isset($errors['password-match'])): ?>
                <div class="w-2/3 p-2 mx-auto bg-red-100 border border-red-400 rounded-lg">
                    <?php if (isset($errors['password'])): ?>
                        <p class="text-xs text-red-700"><?= $errors['password'] ?></p>
                    <?php endif; ?>
                    <?php if (isset($errors['password-letter'])): ?>
                        <p class="text-xs text-red-700"><?= $errors['password-letter'] ?></p>
                    <?php endif; ?>
                    <?php if (isset($errors['password-number'])): ?>
                        <p class="text-xs text-red-700"><?= $errors['password-number'] ?></p>
                    <?php endif; ?>
                    <?php if (isset($errors['password-special'])): ?>
                        <p class="text-xs text-red-700"><?= $errors['password-special'] ?></p>
                    <?php endif; ?>
                    <?php if (isset($errors['password-match'])): ?>
                        <p class="text-xs text-red-700"><?= $errors['password-match'] ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- reCAPTCHA -->
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

            <!-- Submit Button -->
            <button class="block w-2/3 mx-auto text-lg font-semibold text-white transition-all h-11 bg-blue3 rounded-xl hover:bg-blue3/90 focus:ring-2 focus:ring-blue3 focus:ring-offset-2" 
                type="submit" 
                name="register">
                Sign Up
            </button>

            <!-- Sign In Link -->
            <p class="text-sm text-center text-gray-600">
                Already have an account? 
                <a href="/login" class="font-semibold text-blue3 hover:text-blue3/80 hover:underline">
                    Sign in
                </a>
            </p>
        </form>
    </div>

    <!-- Add JavaScript for password toggle -->
    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>