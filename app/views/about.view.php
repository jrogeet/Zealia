<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between items-center">
    <?php view('partials/nav.view.php'); ?>
    <main class="relative flex bg-green-400 h-[90rem] w-[96rem] mt-20">
        <div class="absolute bg-about bg-cover bg-no-repeat h-[40.94rem] w-full">
            <div class="flex flex-col h-2/4 p-24">
                <span class="font-syneboldextra text-4xl mb-9">RIASEC</span>
                <span class="w-[42.3rem] font-synereg text-xl">At Zealia, we think that recognizing your own interests and strengths is the key to realizing your full potential. That's why we use the RIASEC framework, a useful tool created by psychologist John L. Holland, to help you identify your areas of expertise.</span>
            </div>
            
            <div class="h-2/4 flex justify-center items-bottom items-center">
                <span class="w-[43.75rem] font-synemed text-2xl text-center">RIASEC divides interests into six unique personality types, making it easier to determine what you enjoy and where you may succeed. Here's a quick summary of each type:</span>
            </div>
        </div>
        <div class="bg-blue-400 h-[90rem] w-[87.5rem]">

        </div>
    </main>
    <?php view('partials/footer.view.php'); ?>
</body>

</html>