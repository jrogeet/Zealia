<?php view('partials/head.view.php'); ?>

<body class="font-synereg bg-white1">
    <?php view('partials/nav.view.php')?>

    <div class="pt-16 pb-10 bg-white1 sm:bg-white2 sm:border sm:border-black sm:rounded-xl sm:shadow-2xl absolute left-[50%] top-[50%] transform -translate-x-1/2 -translate-y-1/2 w-full sm:w-[26.25rem] h-fit"> 

        <!-- <div>
            <?php //if(isset($loginmessage)): ?>
                <p class="change-pass-success"><?php //= $loginmessage ?></p>
            <?php // endif; ?>
        </div> -->

        <h1 class="mb-16 mx-12 text-[6vw] sm:text-4xl text-center">Welcome back to Zealia</h1>

        <form method="POST" action="/login">
        
            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-4 bg-white1" placeholder="School Number" type="number" name="school_id" value="<?= old('school_id') ?>" required></input></br>
            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-0 bg-white1" placeholder="Password" type="password"  name="password" required></input></br>

            <a class="text-xs relative right-[-60%] top-1 my-0 text-red-600" href="/forgot">Forgot password?</a></br>
            
            <?php if (isset($errors['password'])): ?>
                <p class="text-center text-sm text-red-600 my-0"><?= $errors['password'] ?></p>
            <?php elseif (isset($errors['school_id'])):?>
                <p class="text-center text-sm text-red-600 my-0"><?= $errors['school_id'] ?></p>
            <?php elseif (isset($errors['activate'])): ?>
                <p class="text-center text-sm text-red-600 my-0"><?= $errors['activate']?></p>
            <?php elseif (isset($errors['regexist'])): ?>
                <p class="text-center text-sm text-red-600 my-0"><?= $errors['regexist'] ?></p>
            <?php endif; ?>

            <button class="text-lg h-10 w-2/3 text-center text-white border border-blue3 bg-blue3 rounded-xl relative left-[50%] transform translate-x-[-50%] mt-2 mb-0" type="submit" name="login">Sign in</button></br>
            <h6 class="text-xs text-center mt-2 mb-0" >Don't have an account? <a class="text-blue3" href="/register">Create an account</a></h6></br>

        </form>
    </div>


</body>