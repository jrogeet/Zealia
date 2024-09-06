<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between items-center">
    <?php view('partials/nav.view.php')?>

    <main class="h-[41rem] w-[87.5rem] mt-32 mb-40">
        <span class="font-synebold text-5xl text-black1">Dashboard</span>
        <div class="h-[43.75rem] w-[87.5rem] border-black1 border-2 rounded-t-[1.25rem] mt-4">
            <div class="h-[3.75rem] border-black1 border-b-2 flex justify-between items-center px-5">
                <div class="flex justify-between gap-4">
                    <div class="flex justify-between h-[2.25rem] w-[4.875rem]">
                        <button class="bg-tiles h-[2.25rem] w-[2.25rem] border border-grey2 rounded-lg"></button>

                        <button class="bg-borger h-[2.25rem] w-[2.25rem] border border-grey2 rounded-lg"></button>
                    </div>

                    <form method="POST" action="/dashboard">
                        <input type="hidden" name="search" value="search">
                        <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">
                        <input class="h-[2.25rem] w-[30rem] bg-white2 border border-grey2 text-grey1 font-synemed rounded-lg px-4" type="text" name="search_input" placeholder="Search Joined Room" required>
                    </form>
                </div>

                <?php if ($_SESSION['user']['account_type'] === 'student'):?>
                <form class="flex justify-between gap-4" method="POST" action="/dashboard">
                    <?php if (isset($errors['room_existence'])) : ?>
                        <p class=""><?= $errors['room_existence'] ?></p>
                    <?php elseif (isset($errors['is_joined'])) : ?>
                        <p class=""><?= $errors['is_joined'] ?></p>
                    <?php endif; ?>
                    <input class="h-[2.25rem] w-[12.5rem] bg-white2 border border-grey2 font-synemed text-grey1 text-base px-4" type="number" placeholder="Enter room code">
                    <button class="bg-orange1 h-[2.25rem] w-[6.25rem] font-synesemi rounded-lg"  type="submit">Join</button>
                </form>

                <?php elseif ($_SESSION['user']['account_type'] === 'professor'): ?>
                <form class="flex justify-between gap-4" method="POST" action="/dashboard">
                    <input type="hidden" name="create" value="create">
                    <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">
                    
                    <?php if (isset($errors['room_name'])) : ?>
                        <p class=""><?= $errors['room_name'] ?></p>
                    <?php endif; ?>
                    <input class="h-[2.25rem] w-[12.5rem] bg-white2 border border-grey2 font-synemed text-grey1 text-base px-4" placeholder="Enter room name">
                    <button class="bg-orange1 h-[2.25rem] w-[6.25rem] font-synesemi rounded-lg"  type="submit">Create</button>
                </form>
                <?php endif;?>

            </div>

            <!-- TILES  -->
            <div class="h-[39.76rem] w-full overflow-y-scroll overflow-x-hidden">         
                <?php if(! empty($room_info)): ?>
                    <div class="flex flex-wrap gap-x-2.5 gap-y-10 min-h-[36rem] w-[84.5rem] m-4" id="rooms-default">
                    <!--  ROOMS  -->
                        <?php foreach($room_info as $rooms) { ?>
                        <a href="/room?room_id=<?= $rooms['room_id']?>" class="bg-white2 flex flex-col justify-between h-40 w-[27.625rem] p-6 rounded-2xl">
                            <div>   
                                <h1 class="font-synemed text-2xl"><?= $rooms['room_name'] ?></h1>
                                <span class="text-grey2 text-base"><?= $rooms['prof_name'] ?></span>
                            </div>
                            <span class="text-grey2 text-base"><?= $rooms['room_code'] ?></span>
                        </a>
                        <?php } ?>
                    </div>

                    <div class="flex flex-wrap gap-x-2.5 gap-y-10 min-h-[36rem] w-[84.5rem] m-4" id="rooms-ascending">
                    <!--  ROOMS  -->
                        <?php foreach($room_info as $rooms) { ?>
                        <a href="/room?room_id=<?= $rooms['room_id']?>" class="bg-white2 flex flex-col justify-between h-40 w-[27.625rem] p-6 rounded-2xl">
                            <div>   
                                <h1 class="font-synemed text-2xl"><?= $rooms['room_name'] ?></h1>
                                <span class="text-grey2 text-base"><?= $rooms['prof_name'] ?></span>
                            </div>
                            <span class="text-grey2 text-base"><?= $rooms['room_code'] ?></span>
                        </a>
                        <?php } ?>
                    </div>

                    <div class="flex flex-wrap gap-x-2.5 gap-y-10 min-h-[36rem] w-[84.5rem] m-4" id="rooms-descending">
                    <!--  ROOMS  -->
                        <?php foreach($room_info as $rooms) { ?>
                        <a href="/room?room_id=<?= $rooms['room_id']?>" class="bg-white2 flex flex-col justify-between h-40 w-[27.625rem] p-6 rounded-2xl">
                            <div>   
                                <h1 class="font-synemed text-2xl"><?= $rooms['room_name'] ?></h1>
                                <span class="text-grey2 text-base"><?= $rooms['prof_name'] ?></span>
                            </div>
                            <span class="text-grey2 text-base"><?= $rooms['room_code'] ?></span>
                        </a>
                        <?php } ?>
                    </div>
                <?php else: ?>
                        <span class="" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">No rooms found</span>
                        
                        <?php if($_SESSION['user']['account_type'] === 'professor'):?>
                            <span class="">Create a room by clicking the "Create Room" button</span>
                        <?php elseif($_SESSION['user']['account_type'] === 'student'): ?>
                            <span class="">Join a room by entering the code above</span>
                        <?php endif; ?>
                <?php endif; ?>
            </div>

            <!-- TABLE -->
            <div class="hidden h-[39.8rem] w-full overflow-y-auto overflow-x-hidden scrollbar-thumb-blue-500 scrollbar-thumb-rounded">
                <table class="max-h-full w-full">
                    <thead class="bg-blue3 h-10 font-synereg text-xl">
                        <tr class="">
                            <th class="border-2 border-black1 text-white1 w-[29rem]">Room Name</th>
                            <th class="border-2 border-black1 text-white1 w-[29rem]">Instructor Name</th>
                            <th class="border-2 border-black1 text-white1 w-[29rem]">Room Code</th>
                        </tr>
                    </thead>

                    <tbody class="">
                        <tr class="h-40 max-h-40 w-full hover:bg-blue1">
                            <td class="max-w-[29.13rem] border-2 border-black1 font-synemed text-2xl px-4 truncate">Name that the Instructor gave to this roomwjerihjewurheworhewiorhoewirhjoewhrowqeqweqwewqewqewqewqiewh</td>
                            <td class="max-w-[29.13rem] border-2 border-black1 font-synereg text-2xl text-center text-grey2 break-words">Name of D. Instructor</td>
                            <td class="max-w-[29.13rem] border-2 border-black1 font-synereg text-2xl text-center text-grey2">123456</td>
                        </tr>
                    </tbody>
                </table>
           </div>
            
        </div>
    </main>

    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>


</html>