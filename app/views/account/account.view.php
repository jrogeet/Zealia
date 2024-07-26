<!-- ACCOUNT SETTINGS PAGE  / PROFILE PAGE -->
<?php view('partials/head.view.php'); ?>
<body>
    <?php   view('partials/nav.view.php', ['notifications' => $notifications]) ?>

    <main class="main-container">
        <div class="profile-section">
            <div class="profile-info-container">
                <ul class="profile-info-ul">
                    <li class="profile-info-li"><?php echo "{$_SESSION['user']['l_name']}, {$_SESSION['user']['f_name']}"; ?></li>
                    <li class="profile-info-li"><?php echo "{$_SESSION['user']['school_id']}"; ?></li>
                    <li class="profile-info-li"><?php echo "{$_SESSION['user']['email']}"; ?></li>
                </ul>
            </div>

            <div class= "change-pass-container">
                <form method="POST" action="/account">
                    <ul class="change-pass-ul">
                        <li class="change-pass-li">
                            <label for="cur_pass">Current Password:</label>
                            <input type="password" name="cur_pass" class="change-pass-input" placeholder="Current Password:" required>
                        </li>

                        <li class="change-pass-li">
                            <label>New Password:</label>
                            <input type="password" name="new_pass" class="change-pass-input" placeholder="New Password:" required>
                        </li>
                        <li class="change-pass-li">
                            <label>Confirm New Password:</label>
                            <input type="password" name="conew_pass" class="change-pass-input" placeholder="Confirm New Password:" required>
                        </li>                    
                    </ul>

                    <?php if (isset($errors['cur_pass'])): ?>
                            <p class=""><?= $errors['cur_pass'] ?></p>
                    <?php elseif(isset($errors['password'])): ?>
                        <p class=""><?= $errors['password'] ?></p>
                    <?php elseif (isset($errors['new_pass'])):?>
                            <p class=""><?= $errors['new_pass'] ?></p>
                    <?php elseif (isset($errors['password-letter'])):?>
                            <p class=""><?= $errors['password-letter'] ?></p>
                    <?php elseif (isset($errors['password-number'])):?>
                            <p class=""><?= $errors['password-number'] ?></p>
                    <?php endif; ?>

                    <!-- <input type="submit" name="change_password"> -->
                    <button type="submit" name="change_password" class="change-pass-btn">Change Password</button>
                </form>
            </div>

        </div>

        <div class="mbti-test-section">
            <?php if (isset($decodedData)):?>
            <div class="type-graph-container">
                <div class="result-page" id="resultPage">
                    <div class="mbti-type-container">
                        <h1 id="MBTI" class="mbti-type"><?= $decodedData['mbti']?></h1>
                    </div>

                    <img class="mbti-avatar" src="assets/images/mbti-avatars/png/<?= $decodedData['mbti']?>.png" alt="<?= $decodedData['mbti']?>">

                    <div class="letter-bar-container">
                        <div class="letter-bar">
                            <span class="mbti-perc">E: <?= $decodedData['extroperc']?>%</span>
                            <div class="result-bar" id="extroBar"> <!--EXTRO BAR-->
                                <div class="fill" style="width: <?= $decodedData['extroperc']?>%;"></div>
                            </div>
                            <span class="mbti-perc">I: <?= $decodedData['introperc']?>%</span>
                        </div>


                        <div class="letter-bar">
                            <span class="mbti-perc">N: <?= $decodedData['intuiperc']?>%</span>
                            <div class="result-bar" id="extroBar"> <!--EXTRO BAR-->
                                <div class="fill" style="width: <?= $decodedData['intuiperc']?>%;"></div>
                            </div>
                            <span class="mbti-perc">S: <?= $decodedData['sensperc']?>%</span>
                        </div>

                        <div class="letter-bar">
                            <span class="mbti-perc">F: <?= $decodedData['feelperc']?>%</span>
                            <div class="result-bar" id="extroBar"> <!--EXTRO BAR-->
                                <div class="fill" style="width: <?= $decodedData['feelperc']?>%;"></div>
                            </div>
                            <span class="mbti-perc">T: <?= $decodedData['thinkperc']?>%</span>
                        </div>

                        <div class="letter-bar">
                            <span class="mbti-perc">J: <?= $decodedData['judgeperc']?>%</span>
                            <div class="result-bar" id="extroBar"> <!--EXTRO BAR-->
                                <div class="fill" style="width: <?= $decodedData['judgeperc']?>%;"></div>
                            </div>
                            <span class="mbti-perc">P: <?= $decodedData['perceperc']?>%</span>
                        </div>
                    </div>
                </div>
                <a href="/test" >
                    <button class="take-test-btn">Take test again</button>
                </a>
            </div>
            <?php else:?>
            <div class="account-no-test-container">
                <span class="account-no-test">You haven't taken the Personality Test yet!</span>
                <button class="account-no-test-btn"><a class="account-no-test-btn-link" href="/test">Take test</a></button>
            </div>
            <?php endif;?>
        </div>
    </main>
    <?php view('partials/footer.php')?>

    <script src="assets/js/shared-scripts.js"></script>
</body>