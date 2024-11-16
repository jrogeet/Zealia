<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="block w-full h-fit p-12 min-w-[75rem]">
        <h1 class="font-clashbold text-black text-3xl">Ticket ID:</h1>

        <div class=" relative text-sm h-10 w-1/6 mb-2 mt-12">
            <div onclick="toggle('statusDD');" class="relative z-50 <?php echo ($ticket['status'] == 'pending') ? 'bg-orange1' : (($ticket['status'] == 'solved') ? 'bg-green-500' : 'bg-red1');?> group border border-black rounded-xl  flex justify-evenly items-center h-full w-full">
                <button class="group-hover:block  hidden h-full w-4/5 text-white text-lg">Change Status:</button>
                <button class="group-hover:hidden h-full w-4/5 text-white text-lg"><?= ucfirst($ticket['status']) ?></button>
                <div class="w-0 h-0 border-l-[6px] border-l-transparent border-r-[6px] border-r-transparent border-t-[12px] border-white"></div>
            </div>
            
            <div id="statusDD" class="bg-white hidden absolute z-40 top-6 flex flex-col w-full border border-black1 rounded">
                <form method="POST" action="/admin-view-ticket">
                    <input type="hidden" name="solved" value="solved">
                    <input type="hidden" name="ticket_id" value="<?= $_GET['id'] ?>">
                    <button type="submit" class="h-full w-full text-lg pt-4 pb-2 border border-b-black1 text-green-500">Solved</button>
                </form>
                <form method="POST" action="/admin-view-ticket" class="">
                    <input type="hidden" name="unresolved" value="unresolved">
                    <input type="hidden" name="ticket_id" value="<?= $_GET['id'] ?>">
                    <button type="submit" class="h-full w-full text-lg p-2 border border-b-black1 text-red1">Unresolved</button>
                </form>
                <form method="POST" action="/admin-view-ticket">
                    <input type="hidden" name="pending" value="pending">
                    <input type="hidden" name="ticket_id" value="<?= $_GET['id'] ?>">
                    <button type="submit" class="h-full w-full text-lg p-2 text-orange2">Pending</button>
                </form>
            </div>
        </div>

        <div class="w-[70%] h-fit border border-black1 rounded-2xl p-6 mt-12">

            <h1 class="font-satoshimed text-grey2 mt-2">Category</h1>
            <h1 class="font-clashbold text-black1 text-2xl"><?= ucfirst($ticket['category']) ?></h1>

            <div class="flex mt-12">
                <div class="w-1/3 block">        
                    <h1 class="font-satoshimed text-grey2">ID Number</h1>
                    <h1 class="font-clashbold text-black1 text-2xl"><?= $ticket['school_id'] ?></h1>
                </div>
                <div class="block">        
                    <h1 class="font-satoshimed text-grey2">Email</h1>
                    <h1 class="font-clashbold text-black1 text-2xl"><?= $ticket['email'] ?></h1>
                </div>
            </div>
            
            <div class="flex mt-12">
                <div class="w-1/3 block">        
                    <h1 class="font-satoshimed text-grey2">First Name</h1>
                    <h1 class="font-clashbold text-black1 text-2xl"><?= $ticket['f_name'] ?></h1>
                </div>
                <div class="block">        
                    <h1 class="font-satoshimed text-grey2">Last Name</h1>
                    <h1 class="font-clashbold text-black1 text-2xl"><?= $ticket['l_name'] ?></h1>
                </div>
            </div>

            
            <h1 class="font-satoshimed text-grey2 mt-12">Timestamp</h1>
            <h1 class="font-clashbold text-black1 text-2xl"><?= $ticket['ticket_date'] ?></h1>

            <h1 class="font-satoshimed text-grey2 mt-12">Message</h1>
            <div class="w-[70%] h-fit border border-black1 rounded-2xl p-6 mb-6 mt-4">
                <p><?= $ticket['message'] ?></p>
            </div>
        </div>
    </div>

    <script src="assets/js/shared-scripts.js"></script>
</body>