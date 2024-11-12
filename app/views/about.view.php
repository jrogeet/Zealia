<?php view('partials/head.view.php'); ?>

<body class="flex flex-col items-center justify-between overflow-x-hidden bg-white1">
    <?php view('partials/nav.view.php'); ?>
    <main class="flex flex-col items-center h-fit lg:h-[90rem] w-screen max-w-[96rem]">
        <!-- RIASEC INTRO -->
        <div class="bg-about bg-[right_2.6rem] bg-cover bg-no-repeat h-[40.94rem] lg:h-auto min-h-[40.94rem] w-full">
            <div class="flex flex-col w-full py-24 h-2/4 lg:px-24 mb-14 lg:w-auto">
                <span class="font-syneboldextra text-3xl lg:text-4xl mb-9 text-right sm:text-left drop-shadow-[0_0_5px_rgba(255,255,255,1)] mt-60 :mt-0 pl-2 sm:pr-2 lg:pr-0">RIASEC</span>
                <p class="w-full md:w-[42.3rem] font-synereg text-lg lg:text-xl text-right sm:text-left pl-2 sm:pr-2 lg:pr-0">At Zealia, we think that recognizing your own interests and strengths is the key to realizing your full potential. That's why we use the RIASEC framework, a useful tool created by psychologist John L. Holland, to help you identify your areas of expertise.</p>
            </div>
            
            <div class="flex items-center justify-center mt-64 h-2/4 items-bottom lg:mt-0">
                <p class="w-full lg:w-[43.75rem] font-synemed text-lg lg:text-2xl text-center pl-2 lg:pl-0">RIASEC divides interests into six unique personality types, making it easier to determine what you enjoy and where you may succeed. Here's a quick summary of each type:</p>
            </div>
        </div>

        <!-- RIASEC LETTERS -->
        <div class="relative block w-screen xl:w-[78.5rem] flex flex-wrap gap-x-2 gap-y-4 mb-20 pt-4 lg:pt-0 mt-64 lg:mt-0 text-center sm:text-left">
            <div class="mx-auto flex flex-col gap-4 justify-between text-black1 w-full md:max-w-[26rem] xl:max-w-[28.75rem] p-4 md:border-2 md:border-black1 md:rounded-lg">
                <div class="flex text-3xl font-synebold">
                    <span class="text-blue2">R</span>
                    <span class="">ealistic</span>                </div>
                <p class="text-xl font-synereg text-grey2">Realistic people enjoy working with tools, machines, and physical skills. They like building, working with plants and animals, and being outdoors.</p>
            </div>
            <div class="mx-auto flex flex-col gap-4 justify-between text-black1 w-full md:max-w-[26rem] xl:max-w-[28.75rem] p-4 md:border-2 md:border-black1 md:rounded-lg">
                <div class="flex text-3xl font-synebold">
                    <span class="text-blue2">I</span>
                    <span class="">nvestigative</span>                </div>
                <p class="text-xl font-synereg text-grey2">Investigative people are drawn to research, theories, and intellectual inquiry. They enjoy working with ideas, concepts, science, technology, and academia.</p>
            </div>
            <div class="mx-auto flex flex-col gap-4 justify-between text-black1 w-full md:max-w-[26rem] xl:max-w-[28.75rem] p-4 md:border-2 md:border-black1 md:rounded-lg">
                <div class="flex text-3xl font-synebold">
                    <span class="text-blue2">A</span>
                    <span class="">rtistic</span>                </div>
                <p class="text-xl font-synereg text-grey2">Artistic people thrive in unstructured environments where they can express themselves creatively. They enjoy art, design, language, and producing unique things.</p>
            </div>
            <div class="mx-auto flex flex-col gap-4 justify-between text-black1 w-full md:max-w-[26rem] xl:max-w-[28.75rem] p-4 md:border-2 md:border-black1 md:rounded-lg">
                <div class="flex text-3xl font-synebold">
                    <span class="text-blue2">S</span>
                    <span class="">ocial</span>                </div>
                <p class="text-xl font-synereg text-grey2">Social people are interested in helping, teaching, coaching, and serving others. They like working cooperatively to improve lives.</p>
            </div>
            <div class="mx-auto flex flex-col gap-4 justify-between text-black1 w-full md:max-w-[26rem] xl:max-w-[28.75rem] p-4 md:border-2 md:border-black1 md:rounded-lg">
                <div class="flex text-3xl font-synebold">
                    <span class="text-blue2">E</span>
                    <span class="">nterprising</span>                </div>
                <p class="text-xl font-synereg text-grey2">Enterprising people enjoy leading, motivating, and influencing others. They are drawn to positions of power to make decisions and carry out projects.</p>
            </div>
            <div class="mx-auto flex flex-col gap-4 justify-between text-black1 w-full md:max-w-[26rem] xl:max-w-[28.75rem] p-4 md:border-2 md:border-black1 md:rounded-lg">
                <div class="flex text-3xl font-synebold">
                    <span class="text-blue2">C</span>
                    <span class="">onventional</span>                </div>
                <p class="text-xl font-synereg text-grey2">Conventional people are interested in managing data, information, and processes. They like working in structured environments to complete precise, accurate tasks.</p>
            </div>
        </div>
    </main>


    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>

</html>