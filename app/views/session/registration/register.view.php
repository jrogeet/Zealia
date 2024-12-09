<?php view('partials/head.view.php'); ?>

<body class="flex flex-col justify-between overflow-x-hidden bg-blue1">
    <?php view('partials/nav.view.php')?>


    <div class="pt-16 pb-10 sm:bg-beige sm:border sm:border-black sm:rounded-xl sm:shadow-2xl absolute left-[50%] top-[60%] transform -translate-x-1/2 -translate-y-1/2 w-full max-w-[26.25rem] sm:w-[26.25rem] h-fit"> 

        <h1 class="mb-14 mx-12 text-[6vw] sm:text-4xl text-center">Create an account</h1>
        <?php if (isset($errors['regexist'])): ?>
                <p class="my-0 text-sm text-center text-red-600"><?= $errors['regexist'] ?></p>
        <?php endif; ?>

        <form method="POST" action="/register">
            <div class="flex justify-between mx-16 mb-2">
                <input class="border border-black rounded-xl transform translate-x-[1%] sm:translate-x-[5%] text-left pl-4 mb-1 h-10 w-[47%] text-sm bg-white" type="text" placeholder="Last name" type="text" name="lname" required>
                <input class="border border-black rounded-xl transform translate-x-[-1%] sm:translate-x-[-5%] text-left pl-4 mb-1 h-10 w-[47%] text-sm bg-white" type="text" placeholder="First name" type="text" name="fname" required>
            </div>
                
                <?php if (isset($errors['names'])): ?>
                    <p class="my-1 text-sm text-center text-red-600"><?= $errors['names'] ?></p>
                <?php endif; ?>

            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-2 bg-white" placeholder="School number" type="number" name="school_id" id="school_id" required></input></br>
            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-2 bg-white" placeholder="Fatima Email" type="email" name="email" required></input></br>
            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-2 bg-white" placeholder="Password" type="password" name="password" required></input></br>
                
                <?php if (isset($errors['password'])): ?>
                    <p class="my-1 text-sm text-center text-red-600"><?= $errors['password'] ?></p>
                <?php endif; ?>
                <?php if (isset($errors['password-letter'])): ?>
                    <p class="my-1 text-sm text-center text-red-600"><?= $errors['password-letter'] ?></p>
                <?php endif; ?>
                <?php if (isset($errors['password-number'])): ?>
                    <p class="my-1 text-sm text-center text-red-600"><?= $errors['password-number'] ?></p>
                <?php endif; ?>

            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-4 bg-white" placeholder="Confirm password" type="password" name="confirm_password" required></input></br>

                <?php if (isset($errors['password-match'])): ?>
                    <p class="my-0 text-sm text-center text-red-600"><?= $errors['password-match'] ?></p>
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
            <h6 class="mt-2 mb-0 text-xs text-center" >Already have an account? <a class="text-blue3" href="/register">Sign in</a></h6></br>

        </form>
        

    </div>
</body>