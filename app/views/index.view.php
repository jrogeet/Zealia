<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>MBTHESIS</title>
    

    <link rel="stylesheet" type="text/css"  href="assets/css/shared-styles.css">
    <link rel="stylesheet" type="text/css"  href="assets/css/index.css">
</head>
<style>
    <?php 
        
        include base_path('public/assets/css/shared-styles.css');

    ?>
</style>

<body>
    <div class="main-menu"> 
        <!-- <a href="#" class="account"><img src="/resources/images/icons/user.png" class="account-logo"></a> -->


        <div class="menu-hero">
            <div class="hero">
                <div class="title-container">
                    <a class="menu-title-anchor" href="/">
                        <span class="menu-title title-text ">M
                            <span class="title-text title-span mbti-m">B</span>
                            <span class="title-text title-span mbti-b">T</span>
                            H E
                            <span class="title-text title-span mbti-t"></span>
                            <span class="title-text title-span mbti-i">S</span>
                            I S</span></a>
                </div>

                <div class="hero-text">
                    <h1 class="hero-header">ESTABLISH PRECISE TEAM COMPOSITIONS</h1>
                    <p class="hero-para">Build balanced and effective teams using RIASEC profiles to assist in thoughtful team composition.</p>
                </div>
            </div>

            <div class="bonfire-container">
                <img src="assets/images/PixelArt/bonfire.gif" class="bonfire-gif">
    
            </div>

            

            <nav class="menu">
                <div class="account-container">
                    <!-- <a href="#" class="account nav-select">
                        <img src="/resources/images/icons/accountblack.png" class="account-img" alt="Login Icon"/>
                    </a> -->
                    <?php if ($_SESSION['user'] ?? false) : ?>
                        <a href="/account" >
                            <span class="account-btns nav-account nav-btn nav-text">Account</span>
                        </a>

                        <form method="POST" action="/login">
                            <input type="hidden" name="_method" value="DELETE" />
                            <button class="account-btns logout-btn">Log Out</button>
                        </form>
                    <?php else: ?>
                        <a href="/register" class="register-container">
                            <span class="account-btns register nav-text">Register</span>
                        </a>
                        <a href="/login" class="login-container">
                            <span class="account-btns login nav-text">Login</span>
                        </a>
                    <?php endif; ?>
                </div> 
                <ul class="index-navigation">
                    <li class="index-nav-li">
                        <a href="/home" class="menu-buttons">Home</a>
                    </li>

                    <li class="index-nav-li">
                        <?php if(isset($_SESSION['user'])) {
                            if($_SESSION['user']['account_type'] === 'admin') {
                                echo "<a href='/admin' class='menu-buttons'>Dashboard</a>";
                            } else {
                                echo "<a href='/dashboard' class='menu-buttons'>Dashboard</a>";
                            }
                        } else {
                            echo "<a href='/login' class='menu-buttons'>Dashboard</a>";
                        }
                        ?>
                    </li>

                    <li class="index-nav-li">
                        <a href="/about" class="menu-buttons">About</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
    
    <script src="assets/js/shared-scripts.js"></script>
</body>

<style>
    <?php 
        
        include base_path('public/assets/css/shared-styles.css');

    ?>

</style>


</html>