<?php view('partials/head.view.php'); ?>

<body class="static block w-full overflow-x-hidden bg-beige">
    <?php view('partials/nav.view.php')?>

    <!-- Vertical Progress Bar (Fixed Position) -->
    <div class="fixed z-50 w-20 transform -translate-y-1/2 right-12 top-1/2">
        <div class="flex flex-col items-center gap-4">
            <span class="text-sm rotate-0 font-satoshimed text-blackpri/60" id="progressText">0/3</span>
            <div class="relative w-2 h-48 overflow-hidden rounded-full bg-white/30">
                <div id="progressBar" class="absolute bottom-0 w-full transition-all duration-300 ease-out bg-orangeaccent" style="height: 0%"></div>
            </div>
            <div class="flex flex-col gap-1.5 items-center">
                <div class="w-2 h-2 transition-all duration-300 rounded-full" id="step1"></div>
                <div class="w-2 h-2 transition-all duration-300 rounded-full" id="step2"></div>
                <div class="w-2 h-2 transition-all duration-300 rounded-full" id="step3"></div>
            </div>
        </div>
    </div>

    <div class="relative w-full min-h-[47rem] top-[5rem] pt-20 pb-32 mb-44 block">
        <!-- Current Result Section -->
        <div class="relative w-8/12 mx-auto mb-16">
            <h2 class="text-sm tracking-[0.2em] uppercase text-blackpri/60 font-satoshimed mb-3">Current Result</h2>
            <div class="relative inline-block">
                <h1 class="tracking-wider text-7xl font-clashsemibold text-blackpri" id="tempResDisplay"></h1>
                <div class="absolute -inset-4 bg-gradient-to-r from-orangeaccent/20 via-transparent to-orangeaccent/20 blur-xl -z-10"></div>
            </div>
        </div>

        <!-- Description Cards -->
        <div class="w-full mb-20" id="tdCont"></div>

        <!-- Selection Section -->
        <div class="relative w-8/12 mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-sm tracking-[0.2em] uppercase text-blackpri/60 font-satoshimed">Select <span id="opCountDisplay"></span> More Traits</h2>
                <div class="flex items-center gap-2">
                    <span class="text-sm font-satoshimed text-blackpri/60" id="selectionCounter">0 selected</span>
                    <button onclick="resetSelections()" class="text-sm transition-colors font-satoshimed text-orangeaccent hover:text-orangeaccent/80">Reset</button>
                </div>
            </div>

            <div class="bg-white/[0.02] backdrop-blur-sm rounded-2xl border border-white/10 overflow-hidden" id="opCont">
                <!-- Options will be injected here -->
            </div>

            <button onclick="submit()" id="sub" 
                    class="flex items-center justify-center w-full gap-2 px-6 py-4 mt-8 transition-all duration-300 rounded-xl font-satoshimed text-grey1 bg-grey2 disabled:opacity-50 disabled:cursor-not-allowed hover:bg-blue3 hover:text-white">
                <span>Update Results</span>
                <svg id="submitIcon" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </button>
        </div>
    </div>

    <script src="assets/js/tieOpt.js"></script>
    <script src="assets/js/shared-scripts.js"></script>
</body>