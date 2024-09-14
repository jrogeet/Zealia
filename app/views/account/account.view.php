<!-- ACCOUNT SETTINGS PAGE  / PROFILE PAGE -->
<?php view('partials/head.view.php'); ?>

<body class="static bg-white1 font-synereg min-w-[75rem]">

    <?php   view('partials/nav.view.php') ?>

    <div class="relative w-full h-screen text-center top-[5.8rem] pt-8">
        <h1 class="relative font-synebold text-3xl">Account Settings</h1>

        <div class="relative flex left-1/2 transform -translate-x-1/2 w-full h-5/6 px-6">
            <!-- left box -->
            <div class="block border border-black rounded-2xl w-5/12 h-5/6 m-auto mt-10 bg-white2 text-left p-6 pt-2 pl-16">
                <h5 class="text-xl text-grey2 mt-24">Name</h5>
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

            <!-- dalawa tong box, default na naka show is ung wala, check sa js if may result then i hide/unhide kung ano ung need -->

            <!-- right box w/o result -->
            <div class="block border border-black rounded-2xl w-5/12 h-5/6 m-auto mt-10 bg-white2">
                <?php if (isset($decodedData)):?>
                    <?php dd($decodedData); ?>
                <?php else:?>
                    <h1 class="relative top-64 transform -translate-y-1/2 font-synemed text-4xl">You haven't taken the test!</h1>
                    <a href="/test"><button class="relative top-72 border border-grey2 rounded-2xl w-40 h-12 bg-orange1 font-synemed text-xl">Take Test</button></a>
                <?php endif;?>

            </div>
            
            <!-- right box w/ result -->
            <div class="hidden border border-black rounded-2xl w-5/12 h-5/6 m-auto mt-10 bg-white2">
                <div class="relative flex pt-8">
                    <h1 class="font-synemed text-xl text-grey2 ml-auto mt-1">RESULTS:</h1>
                    <label class="font-syneboldextra text-4xl text-black top-12 mr-auto">IRC</label>
                </div>
                <div class="flex mt-20">
                    <div class="relative text-left mx-auto w-[20rem] h-5/6 pl-24">
                        <h1 class="font-synemed text-lg text-grey2 mb-4">REALISTIC</h1>
                        <h1 class="font-synemed text-lg text-grey2 mb-4">INVESTIGATIVE</h1>
                        <h1 class="font-synemed text-lg text-grey2 mb-4">ARTISTIC</h1>
                        <h1 class="font-synemed text-lg text-grey2 mb-4">SOCIAL</h1>
                        <h1 class="font-synemed text-lg text-grey2 mb-4">ENTERPRISING</h1>
                        <h1 class="font-synemed text-lg text-grey2 mb-4">CONVENTIONAL</h1>
                    </div>
                    <div class="relative text-right mx-auto w-[20rem] h-5/6 pr-32">
                        <h1 class="font-synemed text-xl text-black mb-4" id="r">5</h1>
                        <h1 class="font-synemed text-xl text-black mb-4" id="i">7</h1>
                        <h1 class="font-synemed text-xl text-black mb-4" id="a">1</h1>
                        <h1 class="font-synemed text-xl text-black mb-4" id="s">2</h1>
                        <h1 class="font-synemed text-xl text-black mb-4" id="e">4</h1>
                        <h1 class="font-synemed text-xl text-black mb-4" id="c">4</h1>
                    </div>
                </div>

                <a href="/test"><button class="relative mt-20 border border-grey2 rounded-2xl w-40 h-12 bg-orange1 font-synemed text-xl">Retake Test</button></a>
            </div>
        </div>

    </div>


    <script src="assets/js/shared-scripts.js"></script>

    <?php view('partials/footer.view.php'); ?>
</body>