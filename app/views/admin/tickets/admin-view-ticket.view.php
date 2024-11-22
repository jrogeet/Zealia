<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-beige">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="block w-full h-fit p-12 min-w-[75rem]  transition-all duration-300 <?= $_SESSION['page-settings']['admin_nav_toggle'] ? 'ml-20' : 'ml-48' ?>" id="main-content">
        <h1 class="text-3xl text-blackpri font-clashbold">Ticket ID:</h1>

        <div class="relative w-1/6 h-10 mt-12 mb-2 text-sm ">
            <div onclick="toggle('statusDD');" class="bg-blue2 hover:cursor-pointer relative z-50 <?php echo ($ticket['status'] == 'pending') ? 'bg-orangeaccent' : (($ticket['status'] == 'solved') ? 'bg-green-500' : 'bg-red1');?> group border border-blackpri rounded-xl  flex justify-evenly items-center h-full w-full">
                <button class="hidden w-4/5 h-full text-lg text-black group-hover:block">Change Status:</button>
                <button class="w-4/5 h-full text-lg text-black group-hover:hidden"><?= ucfirst($ticket['status']) ?></button>
                <div class="w-0 h-0 border-l-[6px] border-l-transparent border-r-[6px] border-r-transparent border-t-[12px] border-white"></div>
            </div>
            
            <div id="statusDD" class="absolute z-40 flex flex-col hidden w-full bg-white border rounded top-6 border-blackpripri">
                <form method="POST" action="/admin-view-ticket">
                    <input type="hidden" name="solved" value="solved">
                    <input type="hidden" name="ticket_id" value="<?= $_GET['id'] ?>">
                    <button type="submit" class="w-full h-full pt-4 pb-2 text-lg text-green-500 border border-b-blackpri">Solved</button>
                </form>
                <form method="POST" action="/admin-view-ticket" class="">
                    <input type="hidden" name="unresolved" value="unresolved">
                    <input type="hidden" name="ticket_id" value="<?= $_GET['id'] ?>">
                    <button type="submit" class="w-full h-full p-2 text-lg border border-b-blackpri text-red1">Unresolved</button>
                </form>
                <form method="POST" action="/admin-view-ticket">
                    <input type="hidden" name="pending" value="pending">
                    <input type="hidden" name="ticket_id" value="<?= $_GET['id'] ?>">
                    <button type="submit" class="w-full h-full p-2 text-lg text-orangeaccent">Pending</button>
                </form>
            </div>
        </div>

        <div class="w-[70%] h-fit border border-blackpripri rounded-2xl p-6 mt-12">

            <h1 class="mt-2 font-satoshimed text-grey2">Category</h1>
            <h1 class="text-2xl font-clashbold text-blackpripri"><?= ucfirst($ticket['category']) ?></h1>

            <div class="flex mt-12">
                <div class="block w-1/3">        
                    <h1 class="font-satoshimed text-grey2">ID Number</h1>
                    <h1 class="text-2xl font-clashbold text-blackpripri"><?= $ticket['school_id'] ?></h1>
                </div>
                <div class="block">        
                    <h1 class="font-satoshimed text-grey2">Email</h1>
                    <h1 class="text-2xl font-clashbold text-blackpripri"><?= $ticket['email'] ?></h1>
                </div>
            </div>
            
            <div class="flex mt-12">
                <div class="block w-1/3">        
                    <h1 class="font-satoshimed text-grey2">First Name</h1>
                    <h1 class="text-2xl font-clashbold text-blackpripri"><?= $ticket['f_name'] ?></h1>
                </div>
                <div class="block">        
                    <h1 class="font-satoshimed text-grey2">Last Name</h1>
                    <h1 class="text-2xl font-clashbold text-blackpripri"><?= $ticket['l_name'] ?></h1>
                </div>
            </div>

            
            <h1 class="mt-12 font-satoshimed text-grey2">Timestamp</h1>
            <h1 class="text-2xl font-clashbold text-blackpripri"><?= $ticket['ticket_date'] ?></h1>

            <h1 class="mt-12 font-satoshimed text-grey2">Message</h1>
            <div class="w-[70%] h-fit border border-blackpripri rounded-2xl p-6 mb-6 mt-4">
                <p><?= $ticket['message'] ?></p>
            </div>
        </div>
    </div>

    <script src="assets/js/shared-scripts.js"></script>
    <script>
    // Adjust main content margin when sidebar is toggled
    document.getElementById('toggle-sidebar').addEventListener('click', function() {
        const mainContent = document.getElementById('main-content');
        mainContent.classList.toggle('ml-48');
        mainContent.classList.toggle('ml-20');
    });
</script>
</body>