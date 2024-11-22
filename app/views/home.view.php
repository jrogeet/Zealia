<?php view('partials/head.view.php'); ?>

<body class="flex flex-col items-center min-h-screen mx-auto overflow-x-hidden bg-center bg-no-repeat bg-cover bg-sticky bg-home-bg">
    <?php view('partials/nav.view.php'); ?>

    <main class="mt-20 min-h-[96rem] h-auto w-[87.75rem]">
        <section class=" flex flex-col items-center h-[41rem] justify-center">

            <div class="relative flex items-center justify-center">
                <img class="absolute h-7 -top-2 right-35" src="assets/images/vectors/shapes/Zealia-Star-Orange.png" >
                <h1 class="text-5xl text-center font-clashbold">BUILD <span class="text-blue2 [-webkit-text-stroke:1px_black]">BALANCED TEAMS</span> THAT</h1>
            </div>
            <h1 class="text-5xl text-center font-clashbold">AMPLIFY STRENGTHS</h1>
            <h5 class="text-xl text-center font-satoshireg">Generate teams by passion</h5>
        </section>
        
        <section class="flex flex-col min-w-[87.75rem]">
            <div class="absolute left-0 z-10 flex items-center w-screen h-24 border-black border-y">
                <!-- Header Border to stretch across the screen -->
            </div>

            <div class="z-40 flex items-center h-24">
                <h2 class="ml-[4.125rem] text-5xl font-clashmed">HOW IT WORKS</h2>
            </div>

            <div class="flex flex-col">
                <div class="flex items-center justify-center w-full h-[8.4375rem]">
                    <p class="text-sm font-satoshireg">Follow these simple steps to discover your perfect team:</p>
                </div>

                <div class="flex h-[47.5rem] w-full justify-center">
                    <div class="flex flex-col justify-between h-full text-right">
                        
                        <div class="flex flex-col items-end gap-y-4">
                            <h4 class="text-3xl font-clashmed">Take the RIASEC Test</h4>
                            <div class="w-[13.5rem]">
                                <p class="text-base font-satoshireg">Start by completing the RIASEC Test to identify your strengths and interests.</p>
                            </div>
                        </div>

                        <div class="flex flex-col items-end gap-y-4">
                            <h4 class="text-3xl font-clashmed">Form Your Team</h4>
                            <div class="w-[13.5rem]">
                                <p class="text-base font-satoshireg">Teams are created based on a thoughtful balance of shared passions and complementary strengths.</p>
                            </div>
                        </div>
                    </div>

                    <img src="assets/images/stars&line.png" alt="stars and line" class="mx-[5.625rem]">

                    <div class="flex flex-col justify-center h-full gap-y-4 ">
                        <h4 class="text-3xl font-clashmed">Join Your Room</h4>
                        <div class="w-[13.5rem]">
                            <p class="text-base font-satoshireg">After finishing the test, enter the room set up by your instructor for your group activity.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="flex flex-col min-w-[87.75rem] mt-[8.4375rem]">
            <div class="absolute left-0 z-10 flex items-center w-screen h-24 border-black border-y">
                <!-- Header Border to stretch across the screen -->
            </div>

            <div class="z-40 flex items-center justify-end w-full h-24">
                <h2 class="ml-[4.125rem] text-5xl font-clashmed">WHAT MAKES ZEALIA UNIQUE?</h2>
            </div>

            <div class="h-[22.5rem] flex justify-center items-center gap-x-5 w-full">
                <div class="p-3 h-[13.125rem] flex flex-col w-[21rem] bg-blue2 text-blue3 border border-black rounded-lg">
                    <h5 class="text-4xl font-clashmed">Fostering Collaboration</h5>
                    <div class="flex flex-col pt-4">
                        <p class="text-base font-satoshireg">Teams are designed to maximize the potential of diverse skills and strengths.</p>
                    </div>
                </div>

                <div class="p-3 h-[13.125rem] flex flex-col w-[21rem] bg-orangeaccent border border-black rounded-lg">
                    <h5 class="text-4xl font-clashmed">Grounded in Research</h5>
                    <div class="flex flex-col pt-4">
                        <p class="text-base font-satoshireg">The RIASEC framework ensures compatibility and thoughtful team composition.</p>
                    </div>
                </div>

                <div class="p-3 h-[13.125rem] flex flex-col w-[21rem] bg-blue3 text-blue2 border border-black rounded-lg">
                    <h5 class="text-4xl font-clashmed">Streamlined Process</h5>
                    <div class="flex flex-col pt-4">
                        <p class="text-base font-satoshireg">The steps from taking the test to forming teams are straightforward and user-friendly.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- <img class="absolute -right-[94rem] top-0 opacity-50 h-[204.875rem]" src="assets/images/vectors/gradients/gradient_blur1.png"> -->
    
    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>