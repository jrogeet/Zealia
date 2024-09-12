<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between items-center">
    <?php view('partials/nav.view.php'); ?>
    <main class="flex flex-col items-center h-[90rem] w-[96rem] mt-20">
        <div class="bg-about bg-cover bg-no-repeat min-h-[40.94rem] w-full">
            <div class="flex flex-col h-2/4 p-24 mb-14">
                <span class="font-syneboldextra text-4xl mb-9">RIASEC</span>
                <p class="w-[42.3rem] font-synereg text-xl">At Zealia, we think that recognizing your own interests and strengths is the key to realizing your full potential. That's why we use the RIASEC framework, a useful tool created by psychologist John L. Holland, to help you identify your areas of expertise.</p>
            </div>
            
            <div class="h-2/4 flex justify-center items-bottom items-center">
                <p class="w-[43.75rem] font-synemed text-2xl text-center">RIASEC divides interests into six unique personality types, making it easier to determine what you enjoy and where you may succeed. Here's a quick summary of each type:</p>
            </div>
        </div>


        <div class="w-[87.5rem] flex flex-wrap gap-x-2 gap-y-4">
            <div class=" flex flex-col gap-4 justify-between text-black1 w-[28.75rem] p-4 border-2 border-black1 rounded-lg">
                <div class="flex font-synebold text-3xl">
                    <span class="text-blue2">R</span>
                    <span class="">ealistic</span>                </div>
                <p class="font-synereg text-xl text-grey2">Realistic people enjoy working with tools, machines, and physical skills. They like building, working with plants and animals, and being outdoors.</p>
            </div>
            <div class=" flex flex-col gap-4 justify-between text-black1 w-[28.75rem] p-4 border-2 border-black1 rounded-lg">
                <div class="flex font-synebold text-3xl">
                    <span class="text-blue2">I</span>
                    <span class="">nvestigative</span>                </div>
                <p class="font-synereg text-xl text-grey2">Investigative people are drawn to research, theories, and intellectual inquiry. They enjoy working with ideas, concepts, science, technology, and academia.</p>
            </div>
            <div class=" flex flex-col gap-4 justify-between text-black1 w-[28.75rem] p-4 border-2 border-black1 rounded-lg">
                <div class="flex font-synebold text-3xl">
                    <span class="text-blue2">A</span>
                    <span class="">rtistic</span>                </div>
                <p class="font-synereg text-xl text-grey2">Artistic people thrive in unstructured environments where they can express themselves creatively. They enjoy art, design, language, and producing unique things.</p>
            </div>
            <div class=" flex flex-col gap-4 justify-between text-black1 w-[28.75rem] p-4 border-2 border-black1 rounded-lg">
                <div class="flex font-synebold text-3xl">
                    <span class="text-blue2">S</span>
                    <span class="">ocial</span>                </div>
                <p class="font-synereg text-xl text-grey2">Social people are interested in helping, teaching, coaching, and serving others. They like working cooperatively to improve lives.</p>
            </div>
            <div class=" flex flex-col gap-4 justify-between text-black1 w-[28.75rem] p-4 border-2 border-black1 rounded-lg">
                <div class="flex font-synebold text-3xl">
                    <span class="text-blue2">E</span>
                    <span class="">nterprising</span>                </div>
                <p class="font-synereg text-xl text-grey2">Enterprising people enjoy leading, motivating, and influencing others. They are drawn to positions of power to make decisions and carry out projects.</p>
            </div>
            <div class=" flex flex-col gap-4 justify-between text-black1 w-[28.75rem] p-4 border-2 border-black1 rounded-lg">
                <div class="flex font-synebold text-3xl">
                    <span class="text-blue2">C</span>
                    <span class="">onventional</span>                </div>
                <p class="font-synereg text-xl text-grey2">Conventional people are interested in managing data, information, and processes. They like working in structured environments to complete precise, accurate tasks.</p>
            </div>
        </div>
    </main>
    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>

</html>