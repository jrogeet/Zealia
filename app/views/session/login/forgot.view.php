<?php view('partials/head.view.php'); ?>

<body class="flex flex-col items-center justify-between bg-blue1">
    <?php view('partials/nav.view.php')?>

    <main class="h-[41rem] w-[87.5rem] flex space-between">
        <?php if(isset($sent)): ?>
            <?php echo '<script type="text/javascript">disableScroll();</script>'; ?>
            <div id="resetSent" class="fixed left-0 flex justify-center w-screen h-screen pt-56 bg-glassmorphism top-20">
                <div class="flex flex-col justify-between h-48 bg-white border rounded-t-lg w-90 border-black1">
                    <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-black1">
                        <span class="w-4/5 pl-2 text-lg text-white font-satoshimed">Reset Sent</span>
                        <button class="w-10 h-full rounded bg-red1" onClick="hide('resetSent'); enableScroll();">X</button>
                    </div>
                
                    <div class="flex flex-col items-center justify-center p-4 h-5/6 ">
                        <p class="text-black font-satoshimed">The reset link was <span class="text-green1">successfully</span> sent to your email,</p>
                        <p class="mb-3 font-satoshimed">please check your inbox.</p>
                        <p class="text-sm font-satoshimed text-grey2">If you can't find the email, please check your spam folder.</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="bg-blue1 h-[30rem] w-[26rem] flex flex-col justify-between items-center mt-32 mb-20 border border-black1 rounded-lg px-4">
            <h1 class="flex flex-col text-4xl text-center font-satoshimed text-black1 mt-14">Forgot your<span class="text-3xl text-red1">Password?</span></h1>
            <form method="post" action="/forgot" class="flex flex-col items-center w-full mb-6 h-4/6 justify-evenly">
                <div class="flex flex-col w-5/6">
                    <label class="text-lg font-satoshimed text-grey2" for="email">Enter Account's email</label>
                    <input class="w-full p-2 mt-2 border rounded-lg border-black1" type="email" name="email" placeholder="Email" required>
                </div>
                <button class="w-3/6 py-2 text-xl text-white border bg-blue3 hover:bg-orangeaccent hover:text-black1 border-blue3 rounded-xl font-satoshimed" type="submit">Send Reset Link</button>
            </form>
        </div>
    </main>
    <?php view('partials/footer.view.php')?>
    <script src="assets/js/shared-scripts.js"></script>
</body>