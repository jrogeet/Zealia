<?php view('partials/head.view.php'); ?>

<body class="flex flex-col justify-between mx-auto items-center overflow-x-hidden min-h-auto h-screen w-[96rem] bg-white1">
    <?php view('partials/nav.view.php')?>

    <main class="pt-16 pb-10 bg-white1 sm:bg-white2 sm:border sm:border-black sm:rounded-xl sm:shadow-2xl absolute left-[50%] top-[55%] transform -translate-x-1/2 -translate-y-1/2 w-full sm:w-[26.25rem] h-fit"> 

        <!-- <div>
            <?php //if(isset($loginmessage)): ?>
                <p class="change-pass-success"><?php //= $loginmessage ?></p>
            <?php // endif; ?>
        </div> -->

        <h1 class="mb-16 mx-12 text-[6vw] sm:text-4xl text-center font-clashmed">Welcome back to Zealia</h1>

        <form method="POST" action="/login" class="font-satoshimed">
        
            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-4 bg-white1" placeholder="School Number" type="number" name="school_id" value="<?= old('school_id') ?>" required></input></br>
            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-0 bg-white1" placeholder="Password" type="password"  name="password" required></input></br>

            <a class="text-xs relative right-[-60%] top-1 my-0 text-red-600" href="/forgot">Forgot password?</a></br>
            
            <?php if (isset($errors['password'])): ?>
                <p class="my-0 text-sm text-center text-red-600"><?= $errors['password'] ?></p>
            <?php elseif (isset($errors['school_id'])):?>
                <p class="my-0 text-sm text-center text-red-600"><?= $errors['school_id'] ?></p>
            <?php elseif (isset($errors['activate'])): ?>
                <p class="my-0 text-sm text-center text-red-600"><?= $errors['activate']?></p>
            <?php elseif (isset($errors['regexist'])): ?>
                <p class="my-0 text-sm text-center text-red-600"><?= $errors['regexist'] ?></p>
            <?php endif; ?>
            

            <?php if (hasInternetConnection()): ?>
                <!-- Show reCAPTCHA when there's internet -->
                <div class="g-recaptcha pl-14 rounded-xl relative left-[50%] transform translate-x-[-50%] mt-4" data-sitekey="<?= $config['recaptcha']['site_key'] ?>"></div>
            <?php else: ?>
                <!-- Add a hidden input when there's no internet -->
                <input type="hidden" name="g-recaptcha-response" value="offline">
            <?php endif; ?>
            
            <?php if (isset($errors['recaptcha'])): ?>
                <p class="my-0 text-sm text-center text-red-600"><?= $errors['recaptcha'] ?></p>
            <?php endif; ?>

            <button class="font-satoshireg text-lg h-10 w-2/3 text-center text-greenmain border bg-black rounded-xl relative left-[50%] transform translate-x-[-50%] mt-2 mb-0" type="submit" name="login">Sign in</button></br>
            <h6 class="mt-2 mb-0 text-xs text-center" >Don't have an account? <a class="text-blueinfo" href="/register">Create an account</a></h6></br>

        </form>
    </div>


</body>