<?php view('partials/head.view.php'); ?>

<body class="">
    <?php view('partials/nav.view.php')?>

    <main>
        <div class="registerform" id="registerform">
            <h2 class="heading-text">Sign Up</h2>

            <form method="POST" action="/register" class="register-actual-form">
                <div class="register-input-field">
                    <?php if (isset($errors['regexist'])): ?>
                            <p class="error-msg"><?= $errors['regexist'] ?></p>
                    <?php endif; ?>

                    <div class="register-input-field-container">
                        <?php if (isset($errors['school_id'])): ?>
                            <p class="error-msg"><?= $errors['school_id'] ?></p>
                        <?php endif; ?>
                        <input type="number" name="school_id" id="school_id" class="inputfield" placeholder="School ID Number:" required> 
                    </div>

                    <div class="register-input-field-container">
                        <?php if (isset($errors['names'])): ?>
                            <p class="error-msg"><?= $errors['names'] ?></p>
                        <?php endif; ?>
                        <input type="text" name="fname" class="inputfield" placeholder="First Name:" required>
                        <input type="text" name="lname" class="inputfield" placeholder="Last Name:" required> 
                    </div>

                    <div class="register-input-field-container">
                        <?php if (isset($errors['email'])): ?>
                            <p class="error-msg"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                        <input type="email" name="email" class="inputfield" placeholder="Email:" required> 
                    </div>
                    
                    <div class="register-input-field-container">
                        <?php if (isset($errors['password'])): ?>
                            <p class="error-msg"><?= $errors['password'] ?></p>
                        <?php endif; ?>
                        <input type="password" name="password" class="inputfield" placeholder="Enter Password:" required> 
                        <input type="password" name="confirm_password" class="inputfield" placeholder="Confirm Password:" required> 
                    </div>
                    
                    <input type="submit" name="register" value="REGISTER" class="submit-button register-button" >
                </div>
            </form>
        </div>
    </main>


</body>