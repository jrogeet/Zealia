<?php view('partials/head.view.php'); ?>

<body class="flex flex-col justify-between mx-auto items-center overflow-x-hidden min-h-auto h-screen w-[96rem] bg-whitecon">
    <?php view('partials/nav.view.php'); ?>

    <main class="h-[96rem] w-[96rem] bg-mesh-yellow bg-no-repeat bg-cover">
       <div class="mt-20">
            <div class="flex flex-col items-center h-[40rem] justify-center">
                <h1 class="text-5xl text-center font-clashbold">BUILD BALANCED TEAMS THAT</h1>
                <h1 class="text-5xl text-center font-clashbold">AMPLIFY STRENGTHS</h1>
                <h5 class="text-xl text-center font-satoshireg">Generate teams by passion</h5>
            </div>
            
            <div class="flex justify-evenly">
                <div class="w-[28.25rem] h-[18.75rem] p-6 flex flex-col justify-between border border-whitebord rounded-xl">
                    <h3 class="text-4xl font-clashbold">Step 1:</h3>
                    <p class="text-xl font-satoshireg">Start by taking the RIASEC Test to determine your interests and strengths.
    
    Once you've finished the test, join the designated room set up by your professor.</p>
                </div>

                <div class="w-[28.25rem] h-[18.75rem] p-6 flex flex-col justify-between border border-whitebord rounded-xl">
                    <h3 class="text-4xl font-clashbold">Step 2:</h3>
                    <p class="text-xl font-satoshireg">Start by taking the RIASEC Test to determine your interests and strengths.
    
    Once you've finished the test, join the designated room set up by your professor.</p>
                </div>

                <div class="w-[28.25rem] h-[18.75rem] p-6 flex flex-col justify-between border border-whitebord rounded-xl">
                    <h3 class="text-4xl font-clashbold">Step 3:</h3>
                    <p class="text-xl font-satoshireg">Start by taking the RIASEC Test to determine your interests and strengths.
    
    Once you've finished the test, join the designated room set up by your professor.</p>
                </div>
                
            </div>
       </div> 
        
    </main>
    
    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>