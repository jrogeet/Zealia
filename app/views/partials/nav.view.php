<header class="header" id="navbar">
        <div class="nav-container">

            <div class="logo-container">
                <!-- <a href="/index.html"><img class="logo nav-select" src="" alt="Website Logo"/></a> -->
                <a href="/" class="logo-link">
                    <span class="logo nav-select">M
                        <span class="logo-span mbti-m">B</span>
                            <span class="logo-span mbti-b">T</span>
                            <span class="logo-span">H E</span><span class="logo-span">
                                <span class="logo-span mbti-t"></span>
                                <span class="logo-span mbti-i">S</span>
                                I S</span></a>
            </div>

            <nav class="main-nav nav-select">
                <ul>
                    <li class="main-nav-li">
                        <a href="/home" class="nav-btn btn-home">Home</a>
                    </li>
                    
                    <li class="main-nav-li">
                        <a href="<?php if (isset($_SESSION['user'])) {
                            if ($_SESSION['user']['account_type'] == 'admin') {
                                echo '/admin';
                            } else {
                                echo '/dashboard';
                            }
                        } else {
                            echo '/login';
                        } ?>" class="nav-btn btn-dashboard">Dashboard</a>
                    </li>
                    <li class="main-nav-li">
                        <a href="/about" class="nav-btn btn-about">About</a>
                    </li>
                </ul>
            </nav>

            <div class="account-container">
                <!-- <a href="#" class="account nav-select">
                    <img src="/resources/images/icons/accountblack.png" class="account-img" alt="Login Icon"/>
                </a> -->
                <?php if ($_SESSION['user'] ?? false) : ?>
                    <!-- <a href="/account" >
                        <span class="account-btns nav-account nav-btn nav-text">Account</span>
                    </a>

                    <form method="POST" action="/login">
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="account-btns logout-btn">Log Out</button>
                    </form> -->

                    <div class="dropdown-container">
                        <label class="dropdown dd-notif">
                            <div class="dd-button dd-notif-btn">
                                <?php if (! empty($notifications)):?>
                                    <img src="assets/images/icons/white-bell-filled.png" alt="notification">
                                <?php elseif (empty($notifications)):?>
                                    <img src="assets/images/icons/white-bell.png" alt="notification">
                                <?php endif;?>

                            </div>
                            <input type="checkbox" class="dd-input dropdown-toggle" id="notification-dropdown">
                            
                            <ul class="dd-menu">
                                <?php if (! empty($notifications)):?>
                                <?php foreach ($notifications as $notification): ?>
                                        <?php if($notification['notif_type'] === 'room_accept'): ?>
                                            <a href="/room?room_id=<?=$notification['room_id']?>">
                                                <li class="notif-li">
                                                    <span><?= $notification['sender_name'] ?> has accepted your join request to <?= $notification['room_name'] ?>.</span>
                                                </li>
                                            </a>
                                        <?php elseif($notification['notif_type'] === 'room_decline'):?>
                                            <a href="/dashboard">
                                                <li class="notif-li">
                                                    <span>Your request to join <?= $notification['room_name'] ?> has been declined.</span>
                                                </li>
                                            </a>
                                        <?php elseif($notification['notif_type'] === 'join_room'):?>
                                            <a href="/room?room_id=<?=$notification['room_id']?>">
                                                <li class="notif-li">
                                                    <span><?= $notification['sender_name'] ?> has requested to join <?= $notification['room_name'] ?>.</span>
                                                </li>
                                            </a>
                                        <?php elseif($notification['notif_type'] === 'prejoin'):?>
                                            <a href="/dashboard">
                                                <li class="notif-li">
                                                    <span>Requested to join <?= $notification['room_name'] ?>. Waiting for approval.</span>
                                                </li>
                                            </a>
                                        <?php elseif($notification['notif_type'] === 'group_create'):?>
                                            <a href="/room?room_id=<?=$notification['room_id']?>">
                                                <li class="notif-li">
                                            <span><?= $notification['sender_name'] ?> created a group in <?= $notification['room_name'] ?>.</span>
                                                </li>
                                            </a>
                                        <?php elseif($notification['notif_type'] === 'group_modify'):?>
                                            <a href="/room?room_id=<?=$notification['room_id']?>">
                                                <li class="notif-li">
                                                    <span><?= $notification['sender_name'] ?> modified the groups in <?= $notification['room_name'] ?>.</span>
                                                </li>
                                            </a>
                                        <?php elseif($notification['notif_type'] === 'account'):?>
                                            <a href="#">
                                                <li class="notif-li">
                                                    <span><?= $notification['sender_name'] ?> created a group in <?= $notification['room_name'] ?>.</span>
                                                </li>
                                            </a>
                                        <?php endif; ?>

                                        <li class="divider"></li>
                                <?php endforeach; ?>
                            <?php elseif(empty($notifications)): ?>
                                <li>
                                    <span class="no-notif-text">No notification for now.</span>
                                </li>
                            <?php endif; ?>
                            <?php if(! empty($notifications)): ?> 
                                <div class="clear-notif-container">
                                    <form action="/nav" method="post">
                                        <input type="hidden" name="uri" value="<?= $_SERVER['REQUEST_URI']?>">
                                        <button class="clear-notif-button" type="submit">Clear notifications</button>
                                    </form>
                                </div>
                            <?php endif; ?>
                            </ul>

                        </label>

                        <label class="dropdown dd-account">
                            <div class="dd-button dd-account-btn">
                                Account
                            </div>
                            <input type="checkbox" class="dd-input dropdown-toggle" id="account-dropdown">
                            
                            <ul class="dd-menu dd-menu-account">
                                <a href="/account">
                                    <li class="account-menu-li">
                                        <span class="account-menu-text">Account</span>
                                    </li>
                                </a>
                                <li class="divider"></li>
                                <li class="account-menu-li">
                                    <form method="POST" action="/login">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button class="account-btns logout-btn">Log Out</button>
                                    </form>
                                </li>
                                <!-- <li class="divider"></li>
                                <li>
                                    <a href="http://rane.io">Link to Rane.io</a>
                                </li>  -->
                            </ul>
                        </label>
                    </div>

                <?php else: ?>
                    <a href="/register" class="register-container">
                        <span class="account-btns register nav-text">Register</span>
                    </a>
                    <a href="/login" class="login-container">
                        <span class="account-btns login nav-text">Login</span>
                    </a>
                <?php endif; ?>
            </div> 

        </div>
    </header>





    <style>
        <?php 
            
            include base_path('public/assets/css/shared-styles.css');

        ?>

    </style>
