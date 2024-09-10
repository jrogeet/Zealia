<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between items-center">
    <?php view('partials/nav.view.php'); ?>
    <main class="flex flex-col items-center bg-green-400 h-[90rem] w-[96rem] mt-20">
        <div class="bg-about bg-cover bg-no-repeat min-h-[40.94rem] w-full">
            <div class="flex flex-col h-2/4 p-24 mb-14">
                <span class="font-syneboldextra text-4xl mb-9">RIASEC</span>
                <p class="w-[42.3rem] font-synereg text-xl">At Zealia, we think that recognizing your own interests and strengths is the key to realizing your full potential. That's why we use the RIASEC framework, a useful tool created by psychologist John L. Holland, to help you identify your areas of expertise.</p>
            </div>
            
            <div class="h-2/4 flex justify-center items-bottom items-center">
                <p class="w-[43.75rem] font-synemed text-2xl text-center">RIASEC divides interests into six unique personality types, making it easier to determine what you enjoy and where you may succeed. Here's a quick summary of each type:</p>
            </div>
        </div>


        <div class="bg-blue-400 h-[90rem] w-[87.5rem]">
            <div class="bg-blue3 text-white1 w-[28.75rem] border border-black1 rounded-lg">
                <span class="font-synebold text-4xl">Realistic</span>
                <p class="font-synereg text-2xl">Realistic people enjoy working with tools, machines, and physical skills. They like building, working with plants and animals, and being outdoors.</p>
            </div>
        </div>
    </main>
    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>

</html>