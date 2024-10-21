<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify w-screen overflow-x-hidden">
    <?php view('partials/nav.view.php')?>

    <!-- desktop -->
    <main class="hidden lg:block relative left-1/2 transform -translate-x-1/2 h-[41rem] w-[97%] mb-40 top-32">

        <!-- title -->
        <span class="relative block left-[3vw] font-synebold text-5xl text-black1">Dashboard</span>

        <!-- box -->
        <div class="block relative left-1/2 transform -translate-x-1/2 h-[43.75rem] w-[97%] min-w-[65rem] border-black1 border-2 rounded-t-[1.25rem] mt-4">
            <!-- header -->
            <div class="h-[3.75rem] border-black1 border-b-2 flex justify-between items-center px-5 overflow-hidden">
                <!-- search & arrangement -->
                <div class="flex justify-between gap-4 ">
                    <!-- tiles / table -->
                    <div class="flex justify-between h-[2.25rem] w-[4.875rem]">
                        <button class="bg-tiles h-[2.25rem] w-[2.25rem] border border-grey2 rounded-lg " onClick="show('dashboardTiles'); hide('dashboardTable');"></button>

                        <button class="bg-table h-[2.25rem] w-[2.25rem] bordeblock relative transform -translate-x-1/2r border-grey2 rounded-lg ml-2" onClick="show('dashboardTable'); hide('dashboardTiles');"></button>
                    </div>

                    <!-- search -->
                    <form method="POST" action="/dashboard" class="flex items-center h-[2.25rem] w-[30rem] bg-white2 border border-grey2 text-grey1 font-synemed rounded-lg pr-4 overflow-hidden">
                        <input type="hidden" name="search" value="search">
                        <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">
                        <input class="h-full w-5/6 bg-white2 pl-2" type="text" name="search_input" placeholder="Search Room">
                        <button type="submit" class="bg-search bg-center bg-contain bg-no-repeat h-5/6 w-1/6 border border-l-grey2"></button>
                    </form>

                    <button class="h-[2.25rem] px-4 bg-orange1 text-black1 font-synemed border border-grey2 rounded-lg" onClick="toggle('filters');">Filter</button>

                    <!-- <button class="bg-sort h-[2.25rem] w-[2.25rem] border border-grey2 rounded-lg" onClick="toggleHidden(['rooms-ascending','rooms-descending']); toggleHidden(['t-rooms-ascending','t-rooms-descending']);"></button> -->
                    <button class="bg-sort h-[2.25rem] w-[2.25rem] border border-grey2 rounded-lg" onClick="toggle('rooms-ascending'); toggle('rooms-descending'); toggleHidden(['t-rooms-ascending','t-rooms-descending']);"></button>
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
                    <!-- <form class="flex justify-between gap-4" method="POST" action="/dashboard">
                        <input type="hidden" name="create" value="create">
                        <input type="hidden" name="asc" value="<?= htmlspecialchars($encoded_ascending_rooms, ENT_QUOTES, 'UTF-8')?>">
                        <input type="hidden" name="desc" value="<?= htmlspecialchars($encoded_descending_rooms, ENT_QUOTES, 'UTF-8')?>">
                        <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>"> -->
                        
                        <?php if (isset($errors['room_name'])) : ?>
                            <p class=""><?= $errors['room_name'] ?></p>
                        <?php endif; ?>
                        <!-- <input name="room_name" class="h-[2.25rem] w-[12.5rem] bg-white2 border border-grey2 font-synemed text-grey1 text-base px-4" placeholder="Enter room name" required> -->
                        <!-- <button class="bg-orange1 h-[2.25rem] w-[6.25rem] font-synesemi rounded-lg"  type="submit">Create</button> -->
                        <button onclick="show('createRoom'); disableScroll();" class="bg-orange1 h-[2.25rem] w-[6.25rem] font-synesemi rounded-lg">Create</button>
                    <!-- </form> -->
                <?php endif;?>
            </div>

            <!-- Filter -->
            <div class="hidden bg-white1 w-full h-[3.75rem] border-black1 border-b-2 justify-between items-center px-5 overflow-hidden shadow-xl" id="filters">
                <div class="w-4/6 flex">
                    <form method="POST" action="/dashboard" class="flex items-center h-[2.25rem] w-full bg-white1 border border-white font-synemed rounded-lg pr-4 overflow-hidden">
                        <input type="hidden" name="search" value="search">
                        <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">
                        <!-- Year -->
                        <select class="mx-auto bg-grey1 h-[2.25rem] w-[10rem] rounded-lg pl-2 font-synemed" name="year_level" id="yrLevel">
                            <option class="bg-white2" value="">Year Level</option>
                            <option class="bg-white2" value="1st year">1st Year</option>
                            <option class="bg-white2" value="2nd year">2nd Year</option>
                            <option class="bg-white2" value="3rd year">3rd Year</option>
                            <option class="bg-white2" value="4th year">4th Year</option>
                        </select>
    
                        <!-- Section -->
                        <select class="mx-auto bg-grey1 h-[2.25rem] w-[10rem] rounded-lg pl-2 font-synemed" name="section" id="section">
                            <option class="bg-white2" value="">Section</option>
                        </select>
    
                        <!-- Program -->
                        <select class="mx-auto bg-grey1 h-[2.25rem] w-[10rem] rounded-lg pl-2 font-synemed" name="program" id="program">
                            <option class="bg-white2" value="">Program</option>
                            <option class="bg-white2" value="cs">CS</option>
                            <option class="bg-white2" value="it">IT</option>
                        </select>

                        
                        <button type="submit" class="mx-auto bg-blue3 text-white1 h-[2.25rem] w-[10rem] rounded-lg font-synemed">SUBMIT</button>

                        <button type="submit" class="mx-auto bg-red1 text-white1 h-[2.25rem] w-[10rem] rounded-lg font-synemed">Clear Filters</button>
                    </form>
                </div>
            </div>

   

            <!-- TILES  -->
            <div id="dashboardTiles" class="flex justify-center max-h-[39.8rem] w-full overflow-y-auto overflow-x-hidden">         
                <?php if(! empty($ascending_rooms)): ?>
                    <div class="flex flex-wrap content-start gap-9 w-full m-4" id="rooms-ascending">
                        <!--  ROOMS  -->
                        <?php foreach($ascending_rooms as $rooms) { ?>
                            <a href="/room?room_id=<?= $rooms['room_id']?>" class="bg-white2 flex flex-col justify-between h-48 w-[27.625rem] p-6 rounded-2xl">
                                <div>   
                                    <h1 class="font-synemed text-2xl truncate"><?= $rooms['room_name'] ?></h1>
                                    <h1 class="text-grey2 text-base">BS<?= strtoupper($rooms['program']) ?> <?= $rooms['year_level'][0] ?>-<?= $rooms['section'] ?></h1>
                                    <span class="text-grey2 text-base"><?= $rooms['prof_name'] ?></span>
                                </div>
                                <span class="text-grey2 text-base"><?= $rooms['room_code'] ?></span>
                            </a>
                        <?php } ?>
                    </div>
                    <!-- added div as fix for descending being toggled as block -->
                    <!-- <div class="hidden h-[39.76rem] w-full overflow-y-scroll overflow-x-hidden"> -->
                    <div class="hidden flex-wrap content-start gap-9 w-full m-4"  id="rooms-descending">
                        <!--  ROOMS  -->
                        <?php foreach($descending_rooms as $rooms) { ?>
                            <a href="/room?room_id=<?= $rooms['room_id']?>" class="bg-white2 flex flex-col justify-between h-48 w-[27.625rem] p-6 rounded-2xl">
                                <div>   
                                    <h1 class="font-synemed text-2xl truncate"><?= $rooms['room_name'] ?></h1>
                                    <span class="text-grey2 text-base"><?= $rooms['prof_name'] ?></span>
                                </div>
                                <span class="text-grey2 text-base"><?= $rooms['room_code'] ?></span>
                            </a>
                        <?php } ?>
                    </div>
                    <!-- </div> -->
            </div>

            <!-- TABLE -->
            <div id="dashboardTable" class="hidden h-full w-full overflow-y-auto overflow-x-hidden scrollbar-thumb-blue-500 scrollbar-thumb-rounded">
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

    <div id="createRoom" class="hidden z-50 bg-glassmorphism fixed h-full w-full justify-center">
        <div class="bg-white2 relative flex flex-col h-64 w-80 border border-black1 top-1/3 rounded-t-lg">
            <div class="bg-blue3 flex justify-between items-center h-20 border border-black1 rounded-t-lg">
                <span class="text-white1 w-4/5 text-lg font-synemed pl-2">Confirmation</span>
                <button class="bg-red1 h-full w-1/5 rounded" onClick="hide('createRoom'); enableScroll();">X</button>
            </div>
            <form method="POST" action="/dashboard" class="flex flex-col items-center h-64 p-2">
                <!-- <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="room_id" value="<?= $room_info['room_id'] ?>"> -->
                <input type="hidden" name="create" value="create">
                <input type="hidden" name="asc" value="<?= htmlspecialchars($encoded_ascending_rooms, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="desc" value="<?= htmlspecialchars($encoded_descending_rooms, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>"> 

                <span class="font-synebold text-xl">Enter Room name:</span>
                <input name="room_name" class="h-[2.25rem] w-[12.5rem] bg-white2 border border-grey2 font-synemed text-grey1 text-base px-4" placeholder="Enter room name" required>
                <div class="flex">
                    <label>Year Level:</label>
                    <select name="year_level">
                        <option value="1st year">1st year</option>
                        <option value="2nd year">2nd year</option>
                        <option value="3rd year">3rd year</option>
                        <option value="4th year">4th year</option>
                    </select>
                </div>

                <div class="flex">
                    <label>Program:</label>
                    <select name="program">
                        <option value="cs">CS</option>
                        <option value="it">IT</option>
                    </select>
                </div>
                <input name="section" class="h-[2.25rem] w-[12.5rem] bg-white2 border border-grey2 font-synemed text-grey1 text-base px-4" placeholder="Enter section:" required>

                <button type="submit" class="bg-orange1 p-1 mt-2 text-black1 border border-black1 rounded">Create Room</button>
            </form>
        </div>
    </div>

    <!-- mobile -->
    <div class="relative block lg:hidden w-full h-fit mt-10 text-center">

        <!-- label -->
        <div class="flex p-4 bg-gradient-to-t from-white1 to-white2">
            <h1 class="font-synebold text-[5vw] mx-auto ml-2 mt-1">Dashboard</h1>
            <button class="relative top-1/2 w-1/6 py-1 mt-1 mr-2 bg-blue3 text-white1 mx-auto text-[3vw] rounded-sm text-sm h-full" id="searchButt">Search</button>

            <?php if ($_SESSION['user']['account_type'] === 'student'):?>
                <?php if (isset($errors['room_existence'])) : ?>
                    <p class=""><?= $errors['room_existence'] ?></p>
                <?php elseif (isset($errors['is_joined'])) : ?>
                    <p class=""><?= $errors['is_joined'] ?></p>
                <?php endif; ?>
                <button class="relative top-1/2 w-1/6 py-1 mt-1 ml-2 mr-2 bg-orange1 mx-auto text-[3vw] rounded-sm text-sm h-full" id="jcButt">Join</button>
            <?php elseif ($_SESSION['user']['account_type'] === 'professor'): ?>
                <?php if (isset($errors['room_name'])) : ?>
                    <p class=""><?= $errors['room_name'] ?></p>
                <?php endif; ?>
                <button class="relative top-1/2 w-1/6 py-1 mt-1 ml-2 mr-2 bg-orange1 mx-auto text-[3vw] rounded-sm text-sm h-full" id="jcButt">Create</button>
            <?php endif;?>
        </div>

        <!-- search dropdown -->
        <form method="POST" action="/dashboard" class="hidden w-full p-2 flex bg-white2" id="search">
            <input type="hidden" name="search" value="search">
            <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">

            <input class="mx-auto w-5/6 border border-black1 pl-2" name="search_input" placeholder="Room Name">
            <button type="submit" class="relative top-1/2 w-2/6 py-1 ml-2 mr-2 bg-blue3 text-white1 mx-auto text-[3vw] rounded-sm text-sm h-full">Search</button>
        </form>

        <!-- create/join dropdown -->
        <form method="POST" action="/dashboard" class="hidden w-full p-2 flex bg-white2" id="jc">

            <?php if ($_SESSION['user']['account_type'] === 'student'):?>

                <?php if (isset($errors['room_existence'])) : ?>
                        <p class=""><?= $errors['room_existence'] ?></p>
                <?php elseif (isset($errors['is_joined'])) : ?>
                    <p class=""><?= $errors['is_joined'] ?></p>
                <?php endif; ?>

                <input type="hidden" name="join" value="join">
                <input class="mx-auto w-5/6 border border-black1 pl-2" type="number" id="room_code" name="room_code" placeholder="Enter room code" required>
                <button type="submit" class="relative top-1/2 w-2/6 py-1 ml-2 mr-2 bg-blue3 text-white1 mx-auto text-[3vw] rounded-sm text-sm h-full" id="jcButt">Join</button>

            <?php elseif ($_SESSION['user']['account_type'] === 'professor'): ?>

                <input type="hidden" name="create" value="create">
                <input type="hidden" name="asc" value="<?= htmlspecialchars($encoded_ascending_rooms, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="desc" value="<?= htmlspecialchars($encoded_descending_rooms, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">

                <?php if (isset($errors['room_name'])) : ?>
                    <p class=""><?= $errors['room_name'] ?></p>
                <?php endif; ?>

                <input class="mx-auto w-5/6 border border-black1 pl-2" name="room_name" placeholder="Enter room name" required>
                <button class="relative top-1/2 w-2/6 py-1 ml-2 mr-2 bg-orange1 text-black1 mx-auto text-[3vw] rounded-sm text-sm h-full" id="jcButt">Create</button>

            <?php endif;?>
        
        </form>

        <!-- rooms -->
        <div class="relative flex flex-wrap w-full h-fit py-4 px-0">
            <?php foreach($ascending_rooms as $rooms) { ?>
                <a href="/room?room_id=<?= $rooms['room_id']?>" class="bg-white2 relative flex flex-wrap mx-auto min-w-[19rem] h-32 w-[48%] rounded-2xl m-2 py-2">
                    <div class="w-full">   
                        <h1 class="font-synemed text-2xl truncate"><?= $rooms['room_name'] ?></h1>
                        <span class="text-grey2 text-base"><?= $rooms['prof_name'] ?></span>
                    </div>
                    <span class="text-grey2 text-base w-full"><?= $rooms['room_code'] ?></span>
                </a>
            <?php } ?>
        </div>  

    </div>

    <?php view('partials/footer.view.php'); ?>
    <script>
        const search = document.getElementById('searchButt');
        const jc = document.getElementById('jcButt');
        const searchDD = document.getElementById('search');
        const jcDD = document.getElementById('jc');

        search.addEventListener('click', function() {
            if (jcDD.classList.contains("hidden")){ // closes other (jcDD) if its open on search press
                searchDD.classList.toggle('hidden');
            }else{
                jcDD.classList.toggle('hidden');
                searchDD.classList.toggle('hidden');
            }
        });

        jc.addEventListener('click', function() {
            if (searchDD.classList.contains("hidden")){
                jcDD.classList.toggle('hidden');
            }else{
                searchDD.classList.toggle('hidden');
                jcDD.classList.toggle('hidden');
            }
        });
    </script>
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>