<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between overflow-x-hidden">
    <?php view('partials/nav.view.php'); ?>

    <!-- first part mobile-->
    <div class="relative flex sm:hidden flex-col mt-10">
        <div class="h-fit flex justify-center items-center">
            <div class=" h-full w-full py-6 flex justify-center items-center bg-cropped-breakdance bg-cover bg-no-repeat">
                <div class="relative flex justify-center items-center">
                    <h1 class="relative font-synereg bg-orange1 text-xs px-2.5 selection:bg-black1 selection:text-orange1">generate teams by passion</h1>
                </div>
            </div>
        </div>

        <div class="w-full h-[30.1875rem] flex justify-center items-center bg-threshold-cropped-solid bg-cover bg-no-repeat">
            <div class="bg-blue3 text-white1 text-2xl text-center w-[84.375rem] px-8 py-4 selection:bg-white1 selection:text-blue3">
            Discover your perfect team match by <h1 class="text-orange1 selection:bg-black1 selection:text-orange1">creating groups that harmonize</h1> your unique RIASEC type with the complementary strengths of others.
            </div>
        </div>
    </div>

    <!-- first part desktop -->
    <div class="hidden sm:flex flex-col mt-10">
        <div class="h-[20.5625rem] flex justify-center items-center">
            <div class=" h-full w-[63.9375rem] flex justify-center items-center bg-cropped-breakdance bg-cover bg-no-repeat">
                <div class="relative flex justify-center items-center">
                    <img class="h-[7.8125rem]" src="assets/images/zealia-logos/Zealia_Logo_Flat/BLUE/DARK-1/FullZ_Flat_BLUEDARK_1.png" alt="ZealiaLogoStarTrail-2.png"/>
                    <span class="font-syneboldextra text-black1 text-[6.875rem]">ealia</span>
                    <span class="absolute font-synereg bg-orange1 bottom-4 -right-9 text-base px-2.5 selection:bg-black1 selection:text-orange1">generate teams by passion</span>
                </div>
            </div>
        </div>

        <div class="w-full h-[35.1875rem] flex justify-center items-center bg-threshold-cropped-solid bg-cover bg-no-repeat">
            <div class="bg-blue3 text-white1 text-4xl text-center w-[84.375rem] px-8 py-4 selection:bg-white1 selection:text-blue3">
            Discover your perfect team match by <span class="text-orange1 selection:bg-black1 selection:text-orange1">creating groups that harmonize</span> your unique RIASEC type with the complementary strengths of others.
            </div>
        </div>
    </div>

    <!-- second part mobile -->
    <div class="flex lg:hidden justify-center items-center ">
        <div class="relative block w-full min-h-[106.25rem] py-10 justify-evenly bg-howtouse bg-no-repeat bg-cover bg-center selection:bg-blue3 selection:text-white1">

            <div class="relative block pl-2 w-5/6 h-fit font-synemed mx-auto ml-[8%] top-[8rem] max-w-[18rem]" >
                <h1 class="relative font-synesemi text-2xl mb-4" >Step: 1</h1>
                <h1 class="relative pl-4 mb-2 text-lg">Complete the RIASEC test.</h1>
                <h1 class="relative pl-4 mb-2 text-lg">Start by taking the RIASEC Test to determine your interests and strengths.</h1>
                <h1 class="relative pl-4 mb-2 text-lg">Once you've finished the test, join the designated room set up by your professor.</h1>
            </div>

            <div class="relative block pl-6 pr-2 w-5/6 font-synemed mx-auto mr-[8%] text-right top-[26rem] max-w-[18rem]" >
                <h1 class="relative font-synesemi text-2xl mb-4" >Step: 2</h1>
                <h1 class="relative pr-4 mb-2 text-lg">After you've entered the room, wait patiently for your professor to generate groups of students based on their RIASEC types.</h1>
                <h1 class="relative pr-4 mb-2 text-lg">This ensures that the groupings are balanced and fair.</h1>
            </div>

            <div class="relative block pl-2 w-5/6 h-fit font-synemed mx-auto ml-[8%] top-[38rem] max-w-[18rem]" >
                <h1 class="relative font-synesemi text-2xl mb-4" >Step: 3</h1>
                <h1 class="relative pl-4 mb-2 text-lg">Collaborate, & Create!</h1>
                <h1 class="relative pl-4 mb-2 text-lg">Once your groups have been formed, work with your assigned members to brainstorm and plan tasks and activities.</h1>
                <h1 class="relative pl-4 mb-2 text-lg">Take advantage of the opportunity to interact, share ideas, and leverage each other's talents to achieve success!</h1>
            </div>            
            
        </div>
    </div>

    <!-- second part desktop -->
    <div class="hidden lg:flex justify-center items-center my-8 min-h-[112.5rem]">
        <div class="flex flex-col justify-evenly bg-howtouse bg-no-repeat bg-cover min-h-[106.25rem] w-[72rem] border-2 border-black1 rounded-2xl selection:bg-blue3 selection:text-white1">
            <div class="flex flex-col justify-between -mt-20 ml-24 h-[17.3125rem] w-[27.0625rem]">
                <span class="font-synebold text-4xl">Step 1:</span>

                <div class="flex flex-col">
                    <span class="font-synereg text-2xl">Complete the RIASEC test.</span>
                    <span class="font-synereg text-2xl">Start by taking the RIASEC Test to determine your interests and strengths.</span>
                </div>
                
                <span class="font-synereg text-2xl">Once you've finished the test, join the designated room set up by your professor.</span>
            </div>

            <div class="flex flex-col justify-between ml-[41.6rem] h-[17.3125rem] w-[27.0625rem] text-right">
                <span class="font-synebold text-4xl">Step 2:</span>

                <span class="font-synereg text-2xl">After you've entered the room, wait patiently for your professor to generate groups of students based on their RIASEC types. </span>
                
                <span class="font-synereg text-2xl">This ensures that the groupings are balanced and fair.</span>
            </div>

            <div class="flex flex-col justify-between ml-24 h-[17.3125rem] w-[27.0625rem]">
                <span class="font-synebold text-4xl">Step 3:</span>

                <div class="flex flex-col">
                    <span class="font-synereg text-2xl">Collaborate, & Create!</span>
                    <span class="font-synereg text-2xl">Once your groups have been formed, work with your assigned members to brainstorm and plan tasks and activities.</span>
                </div>
                
                <span class="font-synereg text-2xl">Take advantage of the opportunity to interact, share ideas, and leverage each other's talents to achieve success!</span>
            </div>
        </div>
    </div>

    
    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>

</body>
</html>