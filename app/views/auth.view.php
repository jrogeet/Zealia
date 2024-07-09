<?php require_once 'partials/head.php'; ?>

<body>
    <?php // require_once 'partials/nav.view.php'; ?>
    <main class="logreg-main"> 

<div class="tabs">
    <span class="tab ltab" id="ltab" onclick="loginTab('flex','none')">Login</span>
    <span class="tab rtab" id="rtab" onclick="regTab('flex','none')">Sign Up</span>
</div>

<section class="logreg-container"> 
    <div class="loginform" id="loginform">
        <h2 class="logreg-header">Login:</h2>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="l_inputs">
            <input type="number" name="l_school_id" id="l_school_id" placeholder="School ID Number:" class="inputfield"> 
            <input type="password" name="l_password" id="l_password" placeholder="Enter Password:" class="inputfield"> 
            <input type="submit" name="login" value="login" class="submit-button login-button">
        </form> 
    </div>


    <div class="registerform" id="registerform">
        <h2 class="logreg-header">Sign Up:</h2>

        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <label for="student_number">Remove dashes(-) from your School ID Number. Ex: 12-3456-789 to 123456789</label>
            <br>
            <input type="number" name="s_school_number" id="r_school_id" class="inputfield" placeholder="School ID Number:" required> 
            <br>
            <input type="text" name="fname" class="inputfield" placeholder="First Name:" required>
            <input type="text" name="lname" class="inputfield" placeholder="Last Name:" required> 
            <br>
            <input type="email" name="email" class="inputfield" placeholder="Email:" required> 
            <br>
            <input type="password" name="r_password" class="inputfield" placeholder="Enter Password:" required> 
            <br>
            <input type="password" name="confirm_password" class="inputfield" placeholder="Confirm Password:" required> 
            <br>



            <label for="usertype">You are a/an:</label>
            <select name="usertype" id="usertype"  required>
                <option value="">Please Select:</option>
                <option value="student">Student</option>
                <option value="professor">Instructor</option>
            </select>

            <br>

            <input type="submit" name="register" value="register" class="submit-button register-button" onclick="loginTab('flex','none')">
        </form>
    </div>
</section>
</main>


<script src="resources/scripts/login.js"></script>

<?php require 'partials/footer.php';?>