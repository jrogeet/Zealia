<!-- ACCOUNT SETTINGS PAGE  / PROFILE PAGE -->
<?php view('partials/head.view.php'); ?>

<body class="static bg-white1 font-synereg min-w-[78rem] overflow-x-hidden">

    <?php view('partials/nav.view.php') ?>

    <?php //dd($_SESSION['user']['result'])?>

    <div class="relative w-full h-full text-center top-28 pt-8 mb-32">
        <h1 class="relative font-synebold text-3xl">Account Settings</h1>

        <div class="relative flex left-1/2 transform -translate-x-1/2 w-full h-fit px-6">
            <!-- left box -->
            <div class="relative block border border-black rounded-2xl w-5/12 h-[70vh] min-h-[37rem] m-auto mt-6 bg-white2 text-left p-[4%] pt-2 pl-[3%]">
                <h5 class="text-xl text-grey2 mt-36">Change Password</h5>
                <form method="POST" action="/account">
                    <input class="border border-grey2 p-2 h-10 rounded-lg ml-4 mt-4" type="text" placeholder="Current Password" name="cur_pass" required></input>
                    <div class="flex mt-2 ml-4">
                        <input class="border border-grey2 p-2 h-10 rounded-lg mt-4" type="text" placeholder="New Password" name="new_pass" required></input>
                        <input class="border border-grey2 p-2 h-10 rounded-lg ml-4 mt-4" type="text" placeholder="Confirm New Password" name="conew_pass" required></input>
                    </div>
                    <button class="relative left-1/2 transform -translate-x-1/2 border border-black1 rounded-lg px-8 h-10 bg-orange1 text-black1 mt-12">Save Changes</button>
                </form>

            </div>

            <!-- right box -->
            <div class="relative block border border-black rounded-2xl w-5/12 h-[70vh] min-h-[37rem] m-auto mt-6 bg-white2 text-left p-[4%] pt-2 pl-[4%]">
                <?php if (isset($typeNscores)):?>
                    <div class="relative flex mt-16">
                        <h1 class="font-synemed text-xl text-grey2 ml-auto mt-1">RESULTS:</h1>
                        <label class="font-syneboldextra text-4xl text-black top-12 mr-auto"><?= $typeNscores['result'] ?></label>
                    </div>
                    <div class="flex mt-16">
                        <div class="relative text-left mx-auto w-[20rem] h-5/6 pl-24">
                            <h1 class="font-synemed text-lg text-grey2 mb-4">REALISTIC</h1>
                            <h1 class="font-synemed text-lg text-grey2 mb-4">INVESTIGATIVE</h1>
                            <h1 class="font-synemed text-lg text-grey2 mb-4">ARTISTIC</h1>
                            <h1 class="font-synemed text-lg text-grey2 mb-4">SOCIAL</h1>
                            <h1 class="font-synemed text-lg text-grey2 mb-4">ENTERPRISING</h1>
                            <h1 class="font-synemed text-lg text-grey2 mb-4">CONVENTIONAL</h1>
                        </div>
                        <div class="relative text-right mx-auto w-[20rem] h-5/6 pr-32 mb-1">
                            <h1 class="font-synemed text-xl text-black mb-4" id="r"><?= $typeNscores['R'] ?></h1>
                            <h1 class="font-synemed text-xl text-black mb-4" id="i"><?= $typeNscores['I'] ?></h1>
                            <h1 class="font-synemed text-xl text-black mb-4" id="a"><?= $typeNscores['A'] ?></h1>
                            <h1 class="font-synemed text-xl text-black mb-4" id="s"><?= $typeNscores['S'] ?></h1>
                            <h1 class="font-synemed text-xl text-black mb-4" id="e"><?= $typeNscores['E'] ?></h1>
                            <h1 class="font-synemed text-xl text-black mb-2" id="c"><?= $typeNscores['C'] ?></h1>
                        </div>
                    </div>

                    <a href="/test"><button class="relative left-1/2 transform -translate-x-1/2 border border-black1 rounded-lg px-8 h-10 mt-24 bg-orange1 text-black1">Retake Test</button></a>
                <?php else:?>
                    <h1 class="relative top-1/2 transform -translate-y-1/2 font-synemed text-4xl text-center">You haven't taken the test!</h1>
                    <a href="/test"><button class="relative top-1/2 border border-grey2 rounded-2xl w-40 h-12 bg-orange1 font-synemed text-xl left-1/2 transform -translate-x-1/2">Take Test</button></a>
                <?php endif;?>

            </div>
        </div>

    </div>


    <script src="assets/js/shared-scripts.js"></script>

    <?php view('partials/footer.view.php'); ?>
</body>