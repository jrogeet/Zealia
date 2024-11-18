<?php view('partials/head.view.php'); ?>

<body class="flex flex-col items-center min-h-screen mx-auto overflow-x-hidden bg-center bg-no-repeat bg-cover bg-sticky bg-about-bg">
    <?php view('partials/nav.view.php'); ?>
    
    <main class="mt-20 min-h-[96rem] h-auto w-[87.75rem]">
        <div class="z-10 absolute left-0 flex items-center w-screen h-[7.1875rem] border-black border-y">
            <!-- Header Border to stretch across the screen -->
        </div>

        <!-- About Us Header -->
        <header class="flex flex-col items-center justify-center h-[7.1875rem]">
            <h4 class="z-40 text-4xl text-blue2 font-clashbold">About Us</h4>
            <div class="z-40 flex items-center gap-x-2">
                <h6>ZEALIA</h6>
                <img class="h-4" alt="Zealia Star" src="assets/images/vectors/shapes/Zealia-Star-Orange.png">
                <h6>RIASEC</h6>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="flex flex-col gap-y-[6.6875rem] my-[2.0625rem] h-[38.625rem] mx-[7.5rem]">
            <div class="w-[50.625rem]">
                <p class="text-[2.5rem] font-clashmed">WE BELIEVE THAT UNDERSTANDING YOUR UNIQUE INTERESTS AND STRENGTHS IS THE KEY TO UNLOCKING YOUR FULL POTENTIAL.</p>
            </div>

            <div class="flex items-end justify-end w-full gap-x-[1.3125rem]">
                <div class="w-[22.25rem]">
                    <p class="text-xl text-right font-satoshireg">That's why we use the RIASEC framework, a proven tool created by psychologist John L. Holland, to help you identify where your true abilities lie.</p>
                </div>
                
                <img src="assets/images/john-holland.png" alt="John Holland" class="h-[14.0625rem]">
            </div>
        </section>

        <!-- RIASEC Header -->
        <div class="z-10 absolute left-0 flex items-center w-screen  h-[9.375rem] border-black border-y">
            <!-- Header Border to stretch across the screen -->
        </div>
        <div class="z-40 flex items-center h-[9.375rem] justify-center">
            <h4 class="text-8xl text-blackpri font-clashsemibold">WHAT IS RIASEC?</h4>
        </div>

        <!-- RIASEC Section -->
        <section class="flex flex-col pb-[10.75rem]">
            <div class="flex justify-center items-center h-[10.75rem]">
                <p class="w-[53.75rem] text-lg text-center font-satoshireg">The RIASEC model categorizes interests into six distinct personality types, making it easier to identify what you enjoy and where you excel.</p>
            </div>

            <!-- RIASEC Cards -->
            <div class="flex justify-center gap-x-5">
                <div class="flex flex-col items-center p-5 h-[18.75rem] w-[13.5625rem] bg-riasec-r bg-cover bg-center">
                    <div class="flex items-center justify-center h-44">
                        <h6 class="text-xl font-clashsemibold">Realistic</h6>
                    </div>
                    
                    <p class="text-sm text-center font-satoshireg">Hands-on and practical, enjoys working with tools, machines, and nature.</p>
                </div>

                <div class="flex flex-col items-center p-5 h-[18.75rem] w-[13.5625rem] bg-riasec-i bg-cover bg-center">
                    <div class="flex items-center justify-center h-44">
                        <h6 class="text-xl font-clashsemibold">Investigative</h6>
                    </div>
                    
                    <p class="text-sm text-center font-satoshireg">Analytical and curious, thrives in research and intellectual exploration.</p>
                </div>

                <div class="flex flex-col items-center p-5 h-[18.75rem] w-[13.5625rem] bg-riasec-a bg-cover bg-center">
                    <div class="flex items-center justify-center h-44">
                        <h6 class="text-xl font-clashsemibold">Artistic</h6>
                    </div>
                    
                    <p class="text-sm text-center font-satoshireg">Creative and expressive, excels in unstructured environments focused on originality.</p>
                </div>

                <div class="flex flex-col items-center p-5 h-[18.75rem] w-[13.5625rem] bg-riasec-s bg-cover bg-center">
                    <div class="flex items-center justify-center h-44">
                        <h6 class="text-xl font-clashsemibold">Social</h6>
                    </div>
                    
                    <p class="text-sm text-center font-satoshireg">Empathetic and cooperative, driven by helping and supporting others.</p>
                </div>

                <div class="flex flex-col items-center p-5 h-[18.75rem] w-[13.5625rem] bg-riasec-e bg-cover bg-center">
                    <div class="flex items-center justify-center h-44">
                        <h6 class="text-xl font-clashsemibold">Enterprising</h6>
                    </div>
                    
                    <p class="text-sm text-center font-satoshireg">Confident and persuasive, enjoys leadership and dynamic decision-making.</p>
                </div>

                <div class="flex flex-col items-center p-5 h-[18.75rem] w-[13.5625rem] bg-riasec-c bg-cover bg-center">
                    <div class="flex items-center justify-center h-44">
                        <h6 class="text-xl font-clashsemibold">Conventional</h6>
                    </div>
                    
                    <p class="text-sm text-center font-satoshireg">Organized and detail-oriented, excels in structured settings and precise tasks.</p>
                </div>
            </div>
            
        </section>

        <!-- WHY IT MATTERS Header -->
        <div class="z-10 absolute left-0 flex items-center w-screen  h-[9.375rem] border-black border-y">
            <!-- Header Border to stretch across the screen -->
        </div>
        <div class="z-40 flex items-center h-[9.375rem] justify-end mx-[7.5rem]">
            <h4 class="text-[2.5rem] text-blackpri font-clashmed">WHY IT MATTERS</h4>
        </div>

        <section class="flex justify-end mx-[7.5rem] py-[3.25rem]">
            <div class="w-[48.5625rem]">
                <p class="text-lg text-right font-satoshireg">Understanding your RIASEC type isn’t just about self-discovery—it’s about building meaningful connections and collaborations. At Zealia, we use this framework to create balanced teams that amplify individual strengths and foster collective success.</p>
            </div>
        </section>
    </main>


    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>

</html>