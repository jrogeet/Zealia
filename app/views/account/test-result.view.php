<?php view('partials/head.view.php'); ?>

<body class="w-full overflow-x-hidden static block">
    <?php view('partials/nav.view.php')?>

    <div class="relative w-full h-[47rem] top-[5rem] pt-28 mb-44 block">

        <div class="font-synesemi text-left relative w-8/12 h-fit left-[62%] mb-0 transform translate-x-[-50%] flex">
            <h1 class="text-3xl ml-4 text-grey2">RESULT:</h1>
            <h1 class="relative text-[5rem] font-syneboldextra top-[-2.2rem] ml-10" id="resultDisplay"></h1>
        </div>

        <div class="absolute w-full h-fit left-1/2 py-10 top-[24rem] transform translate-x-[-50%] mb-12" id="tdCont"> 
        </div>

    </div>

    <form method="post" action="/result" class="relative block left-1/2 top-32 transform translate-x-[-50%]">
        <input type="hidden" name="rCount" value="<?php echo $rCount; ?>">
        <input type="hidden" name="iCount" value="<?php echo $iCount; ?>">
        <input type="hidden" name="aCount" value="<?php echo $aCount; ?>">
        <input type="hidden" name="sCount" value="<?php echo $sCount; ?>">
        <input type="hidden" name="eCount" value="<?php echo $eCount; ?>">
        <input type="hidden" name="cCount" value="<?php echo $cCount; ?>">
        <input type="hidden" name="finalRes" value="<?php echo $finalRes; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button class="relative left-1/2 w-64 h-12 transform translate-x-[-50%] mb-16 border border-grey2 rounded-2xl bg-blue3 text-white1">Go to Dashboard</button>
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

</body>



