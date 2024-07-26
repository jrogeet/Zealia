<?php view('partials/head.view.php'); ?>

<body class="">
    <?php view('partials/nav.view.php')?>

    <main>
        <div class="loginform" id="loginform">
            <!-- <h2 class="header">Login:</h2> -->
            <div class="heading-text">Login</div>

            <div>
                <?php if(isset($loginmessage)): ?>
                    <p class="change-pass-success"><?= $loginmessage ?></p>
                <?php endif; ?>
                
            </div>

            <form method="POST" action="/login" class="login-actual-form">
                <div class="login-input-field">
                    <div class="login-input-field-container">
                        <input type="number" name="school_id" id="school_id" class="inputfield" placeholder="School ID Number:" value="<?= old('school_id') ?>" required> 
                    </div>
                    
                    <div class="login-input-field-container">
                        <input type="password" name="password" class="inputfield" placeholder="Enter Password:" required> 

                        <?php if (isset($errors['password'])): ?>
                            <p class=""><?= $errors['password'] ?></p>
                        <?php elseif (isset($errors['school_id'])):?>
                            <p class=""><?= $errors['school_id'] ?></p>
                        <?php elseif (isset($errors['activate'])): ?>
                            <p class=""><?= $errors['activate']?></p>
                        <?php elseif (isset($errors['regexist'])): ?>
                            <p class=""><?= $errors['regexist'] ?></p>
                        <?php endif; ?>
                    </div>
                    <input type="submit" name="login" value="LOGIN" class="submit-button login-button" >
                    <a class="forgot-password-link" href="/forgot-password">Forgot Password</a>
                </div>


            </form>

            
        </div>
    </main>


</body>