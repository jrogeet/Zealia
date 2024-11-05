<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between overflow-x-hidden">
    <?php view('partials/nav.view.php')?>


    <div class="pt-16 pb-10 sm:bg-white2 sm:border sm:border-black sm:rounded-xl sm:shadow-2xl absolute left-[50%] top-[60%] transform -translate-x-1/2 -translate-y-1/2 w-full max-w-[26.25rem] sm:w-[26.25rem] h-fit"> 

        <h1 class="mb-14 mx-12 text-[6vw] sm:text-4xl text-center">Create an account</h1>
        <?php if (isset($errors['regexist'])): ?>
                <p class="text-center text-sm text-red-600 my-0"><?= $errors['regexist'] ?></p>
        <?php endif; ?>

        <form method="POST" action="/register">
            <div class="flex justify-between mx-16 mb-2">
                <input class="border border-black rounded-xl transform translate-x-[1%] sm:translate-x-[5%] text-left pl-4 mb-1 h-10 w-[47%] text-sm bg-white1" type="text" placeholder="Last name" type="text" name="lname" required>
                <input class="border border-black rounded-xl transform translate-x-[-1%] sm:translate-x-[-5%] text-left pl-4 mb-1 h-10 w-[47%] text-sm bg-white1" type="text" placeholder="First name" type="text" name="fname" required>
            </div>
                
                <?php if (isset($errors['names'])): ?>
                    <p class="text-center text-sm text-red-600 my-1"><?= $errors['names'] ?></p>
                <?php endif; ?>

            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-2 bg-white1" placeholder="School number" type="number" name="school_id" id="school_id" required></input></br>
            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-2 bg-white1" placeholder="Fatima Email" type="email" name="email" required></input></br>
            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-2 bg-white1" placeholder="Password" type="password" name="password" required></input></br>
                
                <?php if (isset($errors['password'])): ?>
                    <p class="text-center text-sm text-red-600 my-1"><?= $errors['password'] ?></p>
                <?php endif; ?>
                <?php if (isset($errors['password-letter'])): ?>
                    <p class="text-center text-sm text-red-600 my-1"><?= $errors['password-letter'] ?></p>
                <?php endif; ?>
                <?php if (isset($errors['password-number'])): ?>
                    <p class="text-center text-sm text-red-600 my-1"><?= $errors['password-number'] ?></p>
                <?php endif; ?>

            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-4 bg-white1" placeholder="Confirm password" type="password" name="confirm_password" required></input></br>

                <?php if (isset($errors['password-match'])): ?>
                    <p class="text-center text-sm text-red-600 my-0"><?= $errors['password-match'] ?></p>
                <?php endif; ?>

            <?php if (hasInternetConnection()): ?>
                <!-- Show reCAPTCHA when there's internet -->
                <div class="g-recaptcha pl-14 rounded-xl relative left-[50%] transform translate-x-[-50%] mb-2" data-sitekey="<?= $config['recaptcha']['site_key'] ?>"></div>
            <?php else: ?>
                <!-- Add a hidden input when there's no internet -->
                <input type="hidden" name="g-recaptcha-response" value="offline">
            <?php endif; ?>
            
            <?php if (isset($errors['recaptcha'])): ?>
                <p class="my-0 text-sm text-center text-red-600"><?= $errors['recaptcha'] ?></p>
                <?php endif; ?>

            <button class="text-lg h-10 w-2/3 text-center text-white border border-blue3 bg-blue3 rounded-xl relative left-[50%] transform translate-x-[-50%] mb-2" type="submit" name="register">Sign Up</button></br>
            <h6 class="text-xs text-center mt-2 mb-0" >Already have an account? <a class="text-blue3" href="/register">Sign in</a></h6></br>

        </form>
        

    </div>
</body>