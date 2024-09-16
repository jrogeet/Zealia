<!-- ACCOUNT SETTINGS PAGE  / PROFILE PAGE -->
<?php view('partials/head.view.php'); ?>

<body class="static bg-white1 font-synereg min-w-[78rem]">

    <?php  view('partials/nav.view.php') ?>

    <div class="relative w-full h-full text-center top-[5.8rem] pt-8 mb-32                    ">
        <h1 class="relative font-synebold text-3xl">Account Settings</h1>

        <div class="relative flex left-1/2 transform -translate-x-1/2 w-full h-5/6 min-h-[47rem] px-6">
            <!-- left box -->
            <div class="block border border-black rounded-2xl w-5/12 h-[75vh] m-auto mt-10 bg-white2 text-left p-[4%] pt-2 pl-[4%]  min-h-[32rem] max-h-[45rem]">
                <h5 class="text-xl text-grey2 mt-[8%]">Name</h5>
                <h1 class="text-3xl ml-4 mb-4"><?php echo "{$_SESSION['user']['f_name']} {$_SESSION['user']['l_name']}"; ?></h1>

                <h5 class="text-xl text-grey2 mt-4">Student Number</h5>
                <h1 class="text-3xl ml-4 mb-2"><?php echo "{$_SESSION['user']['school_id']}"; ?></h1>

                <h5 class="text-xl text-grey2 mt-24">Change Password</h5>
                <input class="border border-grey2 p-2 h-10 rounded-lg mt-2 ml-4" type="text" placeholder="Current Password"></input>

                <div class="flex mt-2 ml-4">
                    <input class="border border-grey2 p-2 h-10 rounded-lg mt-2" type="text" placeholder="New Password"></input>
                    <input class="border border-grey2 p-2 h-10 rounded-lg mt-2 ml-4" type="text" placeholder="Confirm New Password"></input>
                </div>

            </div>

            <!-- right box -->
            <div class="block border border-black rounded-2xl w-5/12 h-[75vh] m-auto mt-10 bg-white2 text-left py-2 min-h-[32rem] max-h-[45rem]">
                <?php if (isset($typeNscores)):?>
                    <div class="relative flex mt-[8%]">
                        <h1 class="font-synemed text-xl text-grey2 ml-auto mt-1">RESULTS:</h1>
                        <label class="font-syneboldextra text-4xl text-black top-12 mr-auto"><?= $typeNscores['result'] ?></label>
                    </div>
                    <div class="flex my-[5%]">
                        <div class="relative text-left mx-auto w-[20rem] h-5/6 pl-24">
                            <h1 class="font-synemed text-lg text-grey2 mb-4">REALISTIC</h1>
                            <h1 class="font-synemed text-lg text-grey2 mb-4">INVESTIGATIVE</h1>
                            <h1 class="font-synemed text-lg text-grey2 mb-4">ARTISTIC</h1>
                            <h1 class="font-synemed text-lg text-grey2 mb-4">SOCIAL</h1>
                            <h1 class="font-synemed text-lg text-grey2 mb-4">ENTERPRISING</h1>
                            <h1 class="font-synemed text-lg text-grey2 mb-4">CONVENTIONAL</h1>
                        </div>
                        <div class="relative text-right mx-auto w-[20rem] h-5/6 pr-32">
                            <h1 class="font-synemed text-xl text-black mb-4" id="r"><?= $typeNscores['R'] ?></h1>
                            <h1 class="font-synemed text-xl text-black mb-4" id="i"><?= $typeNscores['I'] ?></h1>
                            <h1 class="font-synemed text-xl text-black mb-4" id="a"><?= $typeNscores['A'] ?></h1>
                            <h1 class="font-synemed text-xl text-black mb-4" id="s"><?= $typeNscores['S'] ?></h1>
                            <h1 class="font-synemed text-xl text-black mb-4" id="e"><?= $typeNscores['E'] ?></h1>
                            <h1 class="font-synemed text-xl text-black mb-4" id="c"><?= $typeNscores['C'] ?></h1>
                        </div>
                    </div>

                    <a href="/test"><button class="relative left-1/2 transform -translate-x-1/2 border border-grey2 rounded-2xl w-40 h-12 bg-orange1 font-synemed text-xl">Retake Test</button></a>
                <?php else:?>
                    <h1 class="relative top-64 transform -translate-y-1/2 font-synemed text-4xl">You haven't taken the test!</h1>
                    <a href="/test"><button class="relative top-72 border border-grey2 rounded-2xl w-40 h-12 bg-orange1 font-synemed text-xl">Take Test</button></a>
                <?php endif;?>

            </div>
        </div>

    </div>


    <script src="assets/js/shared-scripts.js"></script>

    <?php view('partials/footer.view.php'); ?>
</body>