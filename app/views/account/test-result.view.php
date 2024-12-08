<?php view('partials/head.view.php'); ?>

<body class="static block w-full overflow-x-hidden bg-beige">
    <?php view('partials/nav.view.php')?>

    <div class="relative w-full min-h-[47rem] top-[5rem] pt-28 pb-32 mb-44 block min-w-[62rem]">
        <div class="relative w-8/12 mx-auto mb-0 text-center font-satoshiblack">
            <h1 class="text-sm text-blackpri/60 tracking-[0.2em] uppercase mb-4 opacity-0 animate-[fadeIn_0.5s_ease_forwards]">Your Personality Type Is</h1>
            <h1 class="text-[6rem] text-blackpri font-clashsemibold opacity-0 translate-y-4 animate-[fadeIn_0.8s_ease_forwards_0.3s] tracking-wider" id="resultDisplay"></h1>
        </div>

        <div class="absolute w-full h-fit left-1/2 py-10 top-[24rem] transform translate-x-[-50%] mb-32 min-w-[62rem]" id="tdCont">
            <!-- Loading spinner -->
            <div class="flex justify-center">
                <div class="w-16 h-16 border-4 rounded-full animate-spin border-orangeaccent/20 border-t-orangeaccent"></div>
            </div>
        </div>
    </div>

    <form method="post" action="/result" class="fixed bottom-0 left-0 right-0 z-50 pt-16 pb-8 bg-gradient-to-t from-blue1 via-blue1/98 to-transparent">
        <input type="hidden" name="rCount" value="<?php echo $rCount; ?>">
        <input type="hidden" name="iCount" value="<?php echo $iCount; ?>">
        <input type="hidden" name="aCount" value="<?php echo $aCount; ?>">
        <input type="hidden" name="sCount" value="<?php echo $sCount; ?>">
        <input type="hidden" name="eCount" value="<?php echo $eCount; ?>">
        <input type="hidden" name="cCount" value="<?php echo $cCount; ?>">
        <input type="hidden" name="finalRes" value="<?php echo $finalRes; ?>">
        <input type="hidden" name="id" value="<?php echo $currentUser; ?>">
        <div class="flex flex-col items-center justify-center gap-3">
            <button type="submit" class="relative w-64 h-12 overflow-hidden text-base transition-all duration-300 rounded-lg group text-blackpri/90 font-satoshimed bg-orangeaccent/90 hover:bg-orangeaccent hover:shadow-lg">
                <span class="relative z-10">Save Result</span>
                <div class="absolute inset-0 transition-transform duration-300 translate-y-full bg-white/20 group-hover:translate-y-0"></div>
            </button>
            <a href="/test" class="text-sm tracking-wide transition-colors duration-300 text-blackpri/60 hover:text-blackpri">
                Re-take Test
            </a>
        </div>
    </form>


    <script>
        var id = <?php echo json_encode($currentUser); ?>;
        var rCount = <?php echo json_encode($rCount); ?>;
        var iCount = <?php echo json_encode($iCount); ?>;
        var aCount = <?php echo json_encode($aCount); ?>;
        var sCount = <?php echo json_encode($sCount); ?>;
        var eCount = <?php echo json_encode($eCount); ?>;
        var cCount = <?php echo json_encode($cCount); ?>;
        var finalRes = <?php echo json_encode($finalRes); ?>;
    </script>
    <script src="assets/js/result.js"></script>
    <script src="assets/js/shared-scripts.js"></script>
</body>



