<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between items-center">
    <?php view('partials/nav.view.php')?>

    <main class="h-[41rem] w-[87.5rem] flex space-between">
        <?php if(isset($sent)): ?>
            <?php echo '<script type="text/javascript">disableScroll();</script>'; ?>
            <div id="resetSent" class=" flex bg-glassmorphism fixed top-20 left-0  h-screen w-screen pt-56 justify-center">
                <div class="bg-white1 flex flex-col justify-between h-48 w-90 border border-black1 rounded-t-lg">
                    <div class="bg-blue3 flex justify-between items-center h-1/6 border border-black1 rounded-t-lg">
                        <span class="text-white1 w-4/5 text-lg font-satoshimed pl-2">Reset Sent</span>
                        <button class="bg-red1 h-full w-10 rounded" onClick="hide('resetSent'); enableScroll();">X</button>
                    </div>
                
                    <div class="h-5/6 flex flex-col justify-center items-center  p-4 ">
                        <p class="font-satoshimed text-black">The reset link was <span class="text-green1">successfully</span> sent to your email,</p>
                        <p class="font-satoshimed mb-3">please check your inbox.</p>
                        <p class="text-sm font-satoshimed text-grey2">If you can't find the email, please check your spam folder.</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="bg-blue1 h-[30rem] w-[26rem] flex flex-col justify-between items-center mt-32 mb-20 border border-black1 rounded-lg px-4">
            <h1 class="flex flex-col font-satoshimed text-4xl text-center text-black1 mt-14">Forgot your<span class="text-3xl text-red1">Password?</span></h1>
            <form method="post" action="/forgot" class="h-4/6 w-full mb-6 flex flex-col justify-evenly items-center">
                <div class="w-5/6 flex flex-col">
                    <label class="font-satoshimed text-lg text-grey2" for="email">Enter Account's email</label>
                    <input class="w-full border border-black1 rounded-lg mt-2 p-2" type="email" name="email" placeholder="Email" required>
                </div>
                <button class="bg-blue3 hover:bg-orange1 hover:text-black1 w-3/6 py-2 border border-blue3 rounded-xl font-satoshimed text-xl text-white1" type="submit">Send Reset Link</button>
            </form>
        </div>
    </main>
    <?php view('partials/footer.view.php')?>
    <script src="assets/js/shared-scripts.js"></script>
</body>