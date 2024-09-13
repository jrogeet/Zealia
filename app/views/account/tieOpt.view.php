<?php view('partials/head.view.php'); ?>

<body class="w-full overflow-y-scroll overflow-x-hidden static block">
    <?php view('partials/nav.view.php')?>

    <div class="relative w-full h-[47rem] top-[5rem] pt-32 mb-44 block">

        <div class="font-synesemi text-left relative w-8/12 h-fit left-[53%] mb-0 transform translate-x-[-50%] flex">
            <h1 class="text-4xl ml-4 text-grey2">PARTIAL RESULT:</h1>
            <h1 class="relative text-[6rem] font-syneboldextra top-[-2.2rem] ml-4" id="tempResDisplay"></h1>
        </div>

        <div class="absolute w-full h-fit left-1/2 py-10 top-[26rem] transform translate-x-[-50%] mb-32" id="tdCont"> 
        </div>

    </div>

    <div class="relative static w-full h-fit mb-12">
        <div class="font-synesemi text-right relative h-fit left-[12%] inline-block">
            <h1 class="text-3xl text-grey2">PLEASE SELECT:</h1></br>
            <h1 class="relative text-4xl font-syneboldextra top-[-2.2rem] ml-14" id="opCountDisplay"></h1>
        </div></br>

        <div class="font-synemed bg-white1 relative mb-20 left-1/2 transform translate-x-[-50%] border border-black rounded-2xl shadow-2xl w-6/12 h-fit p-0 overflow-hidden mb-36" id="opCont">
        </div></br>

        <button class="font-synereg fixed hidden w-56 h-12 left-[50%] mt-34 top-[88%] transform translate-x-[-50%] border border-grey2 rounded-2xl bg-blue3 text-white1" onclick="submit()" id="sub">Update Results</button>

    </div>

    <script src="assets/js/tieOpt.js"></script>

</body>