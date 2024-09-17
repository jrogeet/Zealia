<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between items-center">
    <?php view('partials/nav.view.php')?>

    <main class="h-[41rem] w-[87.5rem] mt-32 mb-40">
        <span class="font-synebold text-5xl text-black1">Dashboard</span>
        <div class="h-[43.75rem] w-[87.5rem] border-black1 border-2 rounded-t-[1.25rem] mt-4">
            <div class="h-[3.75rem] border-black1 border-b-2 flex justify-between items-center px-5">
                <div class="flex justify-between gap-4">
                    <div class="flex justify-between h-[2.25rem] w-[4.875rem]">
                        <button class="bg-tiles h-[2.25rem] w-[2.25rem] border border-grey2 rounded-lg" onClick="show('dashboardTiles'); hide('dashboardTable');"></button>

                        <button class="bg-table h-[2.25rem] w-[2.25rem] border border-grey2 rounded-lg" onClick="show('dashboardTable'); hide('dashboardTiles');"></button>
                    </div>

                    <form method="POST" action="/dashboard" class="flex items-center h-[2.25rem] w-[30rem] bg-white2 border border-grey2 text-grey1 font-synemed rounded-lg px-4">
                        <input type="hidden" name="search" value="search">
                        <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">
                        <input class="h-full w-5/6 bg-white2" type="text" name="search_input" placeholder="Search Joined Room" required>
                        <button type="submit" class="bg-search h-5/6 w-1/6 border border-l-grey2"></button>
                    </form>

                    <button class="bg-sort h-[2.25rem] w-[2.25rem] border border-grey2 rounded-lg" onClick="toggleHidden(['rooms-ascending','rooms-descending']); toggleHidden(['t-rooms-ascending','t-rooms-descending']);"></button>
                </div>

                <?php if ($_SESSION['user']['account_type'] === 'student'):?>
                <form class="flex justify-between gap-4" method="POST" action="/dashboard">
                    <?php if (isset($errors['room_existence'])) : ?>
                        <p class=""><?= $errors['room_existence'] ?></p>
                    <?php elseif (isset($errors['is_joined'])) : ?>
                        <p class=""><?= $errors['is_joined'] ?></p>
                    <?php endif; ?>
                    <input type="hidden" name="join" value="join">
                    <input class="h-[2.25rem] w-[12.5rem] bg-white2 border border-grey2 font-synemed text-grey1 text-base px-4" type="number" id="room_code" name="room_code" placeholder="Enter room code">
                    <button class="bg-orange1 h-[2.25rem] w-[6.25rem] font-synesemi rounded-lg"  type="submit">Join</button>
                </form>

                <?php elseif ($_SESSION['user']['account_type'] === 'professor'): ?>
                <form class="flex justify-between gap-4" method="POST" action="/dashboard">
                    <input type="hidden" name="create" value="create">
                    <input type="hidden" name="asc" value="<?= htmlspecialchars($encoded_ascending_rooms, ENT_QUOTES, 'UTF-8')?>">
                    <input type="hidden" name="desc" value="<?= htmlspecialchars($encoded_descending_rooms, ENT_QUOTES, 'UTF-8')?>">
                    <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">
                    
                    <?php if (isset($errors['room_name'])) : ?>
                        <p class=""><?= $errors['room_name'] ?></p>
                    <?php endif; ?>
                    <input name="room_name" class="h-[2.25rem] w-[12.5rem] bg-white2 border border-grey2 font-synemed text-grey1 text-base px-4" placeholder="Enter room name" required>
                    <button class="bg-orange1 h-[2.25rem] w-[6.25rem] font-synesemi rounded-lg"  type="submit">Create</button>
                </form>
                <?php endif;?>

            </div>

            <!-- TILES  -->
            <div id="dashboardTiles" class="h-[39.76rem] w-full overflow-y-scroll overflow-x-hidden">         
                <?php if(! empty($ascending_rooms)): ?>
                    <div class="flex flex-wrap gap-x-2.5 gap-y-10 min-h-[36rem] w-[84.5rem] m-4" id="rooms-ascending">
                    <!--  ROOMS  -->
                        <?php foreach($ascending_rooms as $rooms) { ?>
                        <a href="/room?room_id=<?= $rooms['room_id']?>" class="bg-white2 flex flex-col justify-between h-40 w-[27.625rem] p-6 rounded-2xl">
                            <div>   
                                <h1 class="font-synemed text-2xl truncate"><?= $rooms['room_name'] ?></h1>
                                <span class="text-grey2 text-base"><?= $rooms['prof_name'] ?></span>
                            </div>
                            <span class="text-grey2 text-base"><?= $rooms['room_code'] ?></span>
                        </a>
                        <?php } ?>
                    </div>

                    <div class="hidden flex-wrap gap-x-2.5 gap-y-10 min-h-[36rem] w-[84.5rem] m-4" id="rooms-descending">
                    <!--  ROOMS  -->
                        <?php foreach($descending_rooms as $rooms) { ?>
                        <a href="/room?room_id=<?= $rooms['room_id']?>" class="bg-white2 flex flex-col justify-between h-40 w-[27.625rem] p-6 rounded-2xl">
                            <div>   
                                <h1 class="font-synemed text-2xl truncate"><?= $rooms['room_name'] ?></h1>
                                <span class="text-grey2 text-base"><?= $rooms['prof_name'] ?></span>
                            </div>
                            <span class="text-grey2 text-base"><?= $rooms['room_code'] ?></span>
                        </a>
                        <?php } ?>
                    </div>
            </div>

            <!-- TABLE -->
            <div id="dashboardTable" class="hidden h-[39.8rem] w-[87.5rem] overflow-y-auto overflow-x-hidden scrollbar-thumb-blue-500 scrollbar-thumb-rounded">
                <table class="max-h-[39.8rem] w-full table-fixed">
                    <thead class="bg-blue3 h-10 max-h-10 font-synereg text-xl">
                        <tr class="">
                            <th class="border-2 border-black1 text-white1 w-[29rem]">Room Name</th>
                            <th class="border-2 border-black1 text-white1 w-[29rem]">Instructor Name</th>
                            <th class="border-2 border-black1 text-white1 w-[29rem]">Room Code</th>
                        </tr>
                    </thead>

                    <tbody class="h-40 min-h-40 w-full" id="t-rooms-ascending">
                    <?php foreach($ascending_rooms as $rooms) { ?>
                        <tr class="h-40 max-h-[10rem] hover:bg-blue1 ">
                            <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synemed text-2xl px-4 truncate"><a href="/room?room_id=<?= $rooms['room_id']?>"><?= $rooms['room_name'] ?></a></td>
                            <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synereg text-2xl text-center text-grey2 break-words"><a href="/room?room_id=<?= $rooms['room_id']?>"><?= $rooms['prof_name'] ?></a></td>
                            <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synereg text-2xl text-center text-grey2"><a href="/room?room_id=<?= $rooms['room_id']?>"><?= $rooms['room_code'] ?></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tbody class="hidden h-40 min-h-40 w-full" id="t-rooms-descending">
                    <?php foreach($descending_rooms as $rooms) { ?>
                        <tr class="h-40 max-h-[10rem] hover:bg-blue1">
                            <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synemed text-2xl px-4 truncate"><a href="/room?room_id=<?= $rooms['room_id']?>"><?= $rooms['room_name'] ?></a></td>
                            <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synereg text-2xl text-center text-grey2 break-words"><a href="/room?room_id=<?= $rooms['room_id']?>"><?= $rooms['prof_name'] ?></a></td>
                            <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synereg text-2xl text-center text-grey2"><a href="/room?room_id=<?= $rooms['room_id']?>"><?= $rooms['room_code'] ?></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
           </div>
                <?php else: ?>
                    <div class="flex flex-col justify-center items-center h-full w-full">
                        <span class="font-synebold text-4xl text-grey2">No room found</span>
                        
                        <?php if($_SESSION['user']['account_type'] === 'professor'):?>
                            <span class="font-synemed text-xl">Create a room by clicking the "<span class="text-orange2">Create Room</span>" button</span>
                        <?php elseif($_SESSION['user']['account_type'] === 'student'): ?>
                            <span class="font-synemed text-xl">Join a room by <span class="text-orange2">entering the code</span> above</span>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>
        </div>
    </main>

    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>


</html>