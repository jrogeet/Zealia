<?php view('partials/head.view.php'); ?>

<body class="static block w-full overflow-x-hidden overflow-y-scroll">
    <?php view('partials/nav.view.php')?>

    <div class="relative w-full h-[47rem] top-[5rem] pt-32 mb-44 block">

        <div class="font-satoshiblack text-left relative w-8/12 h-fit left-[53%] mb-0 transform translate-x-[-50%] flex">
            <h1 class="ml-4 text-4xl text-grey2">PARTIAL RESULT:</h1>
            <h1 class="relative text-[6rem] font-clashsemibold top-[-2.2rem] ml-4" id="tempResDisplay"></h1>
        </div>

        <div class="absolute w-full h-fit left-1/2 py-10 top-[26rem] transform translate-x-[-50%] mb-32" id="tdCont"> 
        </div>

    </div>

    <div class="relative block w-full mb-12 h-fit">
        <div class="text-4xl tracking-wider text-center font-clashmed text-grey2">TIE BREAKER</div>
        
        <div class="font-satoshiblack mt-12 text-right relative h-fit left-[12%] inline-block">
            <h1 class="text-3xl text-grey2">PLEASE SELECT:</h1></br>
            <h1 class="relative text-4xl font-clashsemibold top-[-2.2rem] ml-14" id="opCountDisplay"></h1>
        </div>

        <div class="font-satoshimed bg-white relative block mb-20 left-1/2 transform translate-x-[-50%] border border-black rounded-2xl shadow-2xl w-6/12 h-fit p-0 overflow-hidden mt-20" id="opCont">
        </div>

        <button class="font-satoshimed relative block w-56 h-12 left-[50%] bottom-0 transform mb-20  -translate-x-1/2 border border-grey2 rounded-2xl bg-grey2 text-grey1" onclick="submit()" id="sub">Update Results</button>
        

    </div>

    <script src="assets/js/tieOpt.js"></script>
    <script src="assets/js/shared-scripts.js"></script>

</body>