<?php view('partials/head.view.php'); ?>

<body class="flex flex-col w-screen overflow-x-hidden bg-white1 justify">
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
                    <form id="searchRoomForm" method="POST"  class="flex items-center h-[2.25rem] w-[30rem] bg-white2 border border-grey2 text-grey1 font-synemed rounded-lg pr-4 overflow-hidden">
                        <input type="hidden" name="search" value="search">
                        <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">
                        <input id="searchInput"  class="w-5/6 h-full pl-2 bg-white2" type="text" name="search_input" placeholder="Search Room">
                        <button type="submit" class="w-1/6 bg-center bg-no-repeat bg-contain border bg-search h-5/6 border-l-grey2"></button>
                    </form>

                    <button class="h-[2.25rem] px-4 bg-orange1 text-black1 font-synemed border border-grey2 rounded-lg" onClick="toggle('filters');">Filter</button>

                    <!-- <button class="bg-sort h-[2.25rem] w-[2.25rem] border border-grey2 rounded-lg" onClick="toggleHidden(['rooms-ascending','rooms-descending']); toggleHidden(['t-rooms-ascending','t-rooms-descending']);"></button> -->
                    <button class="bg-sort h-[2.25rem] w-[2.25rem] border border-grey2 rounded-lg" onClick="toggle('rooms-ascending'); toggle('rooms-descending'); toggleHidden(['t-rooms-ascending','t-rooms-descending']);"></button>
                </div>

                <?php if ($_SESSION['user']['account_type'] === 'student'):?>
                    <form id="joinRoomForm" class="flex justify-between gap-4" method="POST">
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
                <div class="flex w-4/6">
                <div class="flex items-center h-[2.25rem] w-full bg-white1 border border-white font-synemed rounded-lg pr-4 overflow-hidden">
                    <!-- Year -->
                    <select class="mx-auto bg-grey1 h-[2.25rem] w-[10rem] rounded-lg pl-2 font-synemed" id="yrLevel">
                        <option class="bg-white2" value="">Year Level</option>
                        <option class="bg-white2" value="1st year">1st Year</option>
                        <option class="bg-white2" value="2nd year">2nd Year</option>
                        <option class="bg-white2" value="3rd year">3rd Year</option>
                        <option class="bg-white2" value="4th year">4th Year</option>
                    </select>

                    <!-- Section -->
                    <select class="mx-auto bg-grey1 h-[2.25rem] w-[10rem] rounded-lg pl-2 font-synemed" id="section">
                        <option class="bg-white2" value="">Section</option>
                        <option class="bg-white2" value="A">A</option>
                        <option class="bg-white2" value="B">B</option>
                        <option class="bg-white2" value="C">C</option>
                    </select>

                    <!-- Program -->
                    <select class="mx-auto bg-grey1 h-[2.25rem] w-[10rem] rounded-lg pl-2 font-synemed" id="program">
                        <option class="bg-white2" value="">Program</option>
                        <option class="bg-white2" value="cs">CS</option>
                        <option class="bg-white2" value="it">IT</option>
                    </select>

                    <button id="clearFilters" class="mx-auto bg-red1 text-white1 h-[2.25rem] w-[10rem] rounded-lg font-synemed">Clear Filters</button>
                </div>
                </div>
            </div>

   

            <!-- TILES  -->
            <div id="dashboardTiles" class="flex justify-center max-h-[39.8rem] w-full overflow-y-auto overflow-x-hidden">         
                <?php if(! empty($ascending_rooms)): ?>
                    <div class="flex-wrap content-start hidden w-full m-4 gap-9" id="rooms-ascending">
                        <!--  ROOMS  -->
                    </div>
                    <!-- added div as fix for descending being toggled as block -->
                    <!-- <div class="hidden h-[39.76rem] w-full overflow-y-scroll overflow-x-hidden"> -->
                    <div  class="flex flex-wrap content-start w-full m-4 gap-9" id="rooms-descending">
                        <!--  ROOMS  -->
                    </div>
                    <!-- </div> -->
            </div>

            <!-- TABLE -->
            <div id="dashboardTable" class="hidden w-full h-full overflow-x-hidden overflow-y-auto scrollbar-thumb-blue-500 scrollbar-thumb-rounded">
                <table class="max-h-[39.8rem] w-full table-fixed">
                    <thead class="h-10 text-xl bg-blue3 max-h-10 font-synereg">
                        <tr class="">
                            <th class="border-2 border-black1 text-white1 w-[29rem]">Room Name</th>
                            <th class="border-2 border-black1 text-white1 w-[29rem]">Instructor Name</th>
                            <th class="border-2 border-black1 text-white1 w-[29rem]">Room Code</th>
                        </tr>
                    </thead>

                    <tbody class="hidden w-full h-40 min-h-40" id="t-rooms-ascending">
                    </tbody>
                    <tbody class="w-full h-40 min-h-40" id="t-rooms-descending">
                    </tbody>
                </table>
           </div>
                <?php else: ?>
                    <div class="flex flex-col items-center justify-center w-full h-full">
                        <span class="text-4xl font-synebold text-grey2">No room found</span>
                        
                        <?php if($_SESSION['user']['account_type'] === 'professor'):?>
                            <span class="text-xl font-synemed">Create a room by clicking the "<span class="text-orange2">Create Room</span>" button</span>
                        <?php elseif($_SESSION['user']['account_type'] === 'student'): ?>
                            <span class="text-xl font-synemed">Join a room by <span class="text-orange2">entering the code</span> above</span>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>
        </div>
    </main>

    <div id="createRoom" class="fixed z-50 justify-center hidden w-full h-full bg-glassmorphism">
        <div class="relative flex flex-col h-64 border rounded-t-lg bg-white2 w-80 border-black1 top-1/3">
            <div class="flex items-center justify-between h-20 border rounded-t-lg bg-blue3 border-black1">
                <span class="w-4/5 pl-2 text-lg text-white1 font-synemed">Confirmation</span>
                <button class="w-1/5 h-full rounded bg-red1" onClick="hide('createRoom'); enableScroll();">X</button>
            </div>
            <form id="createRoomForm" method="POST" class="flex flex-col items-center h-64 p-2">
                <input type="hidden" name="create" value="create">
                <input type="hidden" name="asc" value="<?= htmlspecialchars($encoded_ascending_rooms, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="desc" value="<?= htmlspecialchars($encoded_descending_rooms, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>"> 

                <span class="text-xl font-synebold">Enter Room name:</span>
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

                <!-- <input name="section" class="h-[2.25rem] w-[12.5rem] bg-white2 border border-grey2 font-synemed text-grey1 text-base px-4" placeholder="Enter section:" required> -->
                <div class="flex">
                    <label for="yearPrefix">Y</label>
                    <input type="text" id="yearPrefix" maxlength="1" class="year-prefix" pattern="[A-Z0-9]" placeholder="A or 1" required>
                    <span>-</span>
                    <input type="text" id="sectionSuffix" maxlength="1" class="section-suffix" pattern="[A-Z0-9]" placeholder="A or 1" required>
                </div>
                
                <input type="hidden" id="combinedSection" name="section">

                <button type="submit" class="p-1 mt-2 border rounded bg-orange1 text-black1 border-black1">Create Room</button>
            </form>
        </div>
    </div>

    <!-- mobile -->
    <div class="relative block w-full mt-10 text-center lg:hidden h-fit">

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
        <form method="POST" action="/dashboard" class="flex hidden w-full p-2 bg-white2" id="search">
            <input type="hidden" name="search" value="search">
            <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">

            <input class="w-5/6 pl-2 mx-auto border border-black1" name="search_input" placeholder="Room Name">
            <button type="submit" class="relative top-1/2 w-2/6 py-1 ml-2 mr-2 bg-blue3 text-white1 mx-auto text-[3vw] rounded-sm text-sm h-full">Search</button>
        </form>

        <!-- create/join dropdown -->
        <form method="POST" action="/dashboard" class="flex hidden w-full p-2 bg-white2" id="jc">

            <?php if ($_SESSION['user']['account_type'] === 'student'):?>

                <?php if (isset($errors['room_existence'])) : ?>
                        <p class=""><?= $errors['room_existence'] ?></p>
                <?php elseif (isset($errors['is_joined'])) : ?>
                    <p class=""><?= $errors['is_joined'] ?></p>
                <?php endif; ?>

                <input type="hidden" name="join" value="join">
                <input class="w-5/6 pl-2 mx-auto border border-black1" type="number" id="room_code" name="room_code" placeholder="Enter room code" required>
                <button type="submit" class="relative top-1/2 w-2/6 py-1 ml-2 mr-2 bg-blue3 text-white1 mx-auto text-[3vw] rounded-sm text-sm h-full" id="jcButt">Join</button>

            <?php elseif ($_SESSION['user']['account_type'] === 'professor'): ?>

                <input type="hidden" name="create" value="create">
                <input type="hidden" name="asc" value="<?= htmlspecialchars($encoded_ascending_rooms, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="desc" value="<?= htmlspecialchars($encoded_descending_rooms, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">

                <?php if (isset($errors['room_name'])) : ?>
                    <p class=""><?= $errors['room_name'] ?></p>
                <?php endif; ?>

                <input class="w-5/6 pl-2 mx-auto border border-black1" name="room_name" placeholder="Enter room name" required>
                <button class="relative top-1/2 w-2/6 py-1 ml-2 mr-2 bg-orange1 text-black1 mx-auto text-[3vw] rounded-sm text-sm h-full" id="jcButt">Create</button>

            <?php endif;?>
        
        </form>

        <!-- rooms -->
        <div class="relative flex flex-wrap w-full px-0 py-4 h-fit">
            <?php foreach($ascending_rooms as $rooms) { ?>
                <a href="/room?room_id=<?= $rooms['room_id']?>" class="bg-white2 relative flex flex-wrap mx-auto min-w-[19rem] h-32 w-[48%] rounded-2xl m-2 py-2">
                    <div class="w-full">   
                        <h1 class="text-2xl truncate font-synemed"><?= $rooms['room_name'] ?></h1>
                        <span class="text-base text-grey2"><?= $rooms['prof_name'] ?></span>
                    </div>
                    <span class="w-full text-base text-grey2"><?= $rooms['room_code'] ?></span>
                </a>
            <?php } ?>
        </div>  

    </div>

    <?php view('partials/footer.view.php'); ?>
    
    <script src="assets/js/shared-scripts.js"></script>
    <script src="assets/js/fetch/fetch.js"></script>
    
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

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            const rooms = <?php echo json_encode($ascending_rooms) ?>;
            // for ROOM GENERATIONS
            const roomsASC = document.getElementById('rooms-ascending');
            const roomsDESC = document.getElementById('rooms-descending');
            const troomsASC = document.getElementById('t-rooms-ascending');
            const troomsDESC = document.getElementById('t-rooms-descending');
            // for FILTERS
            const yrLevelDropdown = document.getElementById('yrLevel');
            const sectionDropdown = document.getElementById('section');
            const programDropdown = document.getElementById('program');
            const filteredResults = document.getElementById('filteredResults');
            const clearFiltersBtn = document.getElementById('clearFilters');
            
            
            // Displaying Rooms Ascending & Descending (based on time created)
            function displayRooms(rooms, filtering = false) {
                if (filtering == true) {
                    clearInterval(intervalID);
                    console.log('interval cleared');
                    roomsASC.innerHTML = '';
                    roomsDESC.innerHTML = '';
                    troomsASC.innerHTML = '';
                    troomsDESC.innerHTML = '';
                    
                    if (rooms.length > 0) {
                        rooms.forEach(room => {
                            roomsASC.innerHTML += `
                                <a href="/room?room_id=${room.room_id}" class="bg-white2 flex flex-col justify-between h-48 w-[27.625rem] p-6 rounded-2xl">
                                    <div>   
                                        <h1 class="text-2xl truncate font-synemed">${room.room_name}</h1>
                                        <h1 class="text-base text-grey2">BS${room.program.toUpperCase()} ${room.year_level[0]}-${room.section}</h1>
                                        <span class="text-base text-grey2">${room.prof_name}</span>
                                    </div>
                                    <span class="text-base text-grey2">${room.room_code}</span>
                                </a>`;
                            troomsASC.innerHTML += `
                                <tr class="h-40 max-h-[10rem] hover:bg-blue1 ">
                                    <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synemed text-2xl px-4 truncate">
                                        <a href="/room?room_id=${room.room_id}">${room.room_name}</a>
                                        <a href="/room?room_id=${room.room_id}" class="text-base text-grey2">BS${room.program.toUpperCase()} ${room.year_level[0]}-${room.section}</a>
                                    </td>
                                    <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synereg text-2xl text-center text-grey2 break-words"><a href="/room?room_id=${room.room_id}">${room.prof_name}</a></td>
                                    <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synereg text-2xl text-center text-grey2"><a href="/room?room_id=${room.room_id}">${room.room_code}</a></td>
                                </tr>`;
                        });
                        rooms.slice().reverse().forEach(room => {
                            roomsDESC.innerHTML += `
                                <a href="/room?room_id=${room.room_id}" class="bg-white2 flex flex-col justify-between h-48 w-[27.625rem] p-6 rounded-2xl">
                                    <div>   
                                        <h1 class="text-2xl truncate font-synemed">${room.room_name}</h1>
                                        <h1 class="text-base text-grey2">BS${room.program.toUpperCase()} ${room.year_level[0]}-${room.section}</h1>
                                        <span class="text-base text-grey2">${room.prof_name}</span>
                                    </div>
                                    <span class="text-base text-grey2">${room.room_code}</span>
                                </a>`;
                                
                            troomsDESC.innerHTML += `
                                <tr class="h-40 max-h-[10rem] hover:bg-blue1 ">
                                    <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synemed text-2xl px-4 truncate">
                                        <a href="/room?room_id=${room.room_id}">${room.room_name}</a>
                                        <a href="/room?room_id=${room.room_id}" class="text-base text-grey2">BS${room.program.toUpperCase()} ${room.year_level[0]}-${room.section}</a>
                                    </td>
                                    <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synereg text-2xl text-center text-grey2 break-words"><a href="/room?room_id=${room.room_id}">${room.prof_name}</a></td>
                                    <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synereg text-2xl text-center text-grey2"><a href="/room?room_id=${room.room_id}">${room.room_code}</a></td>
                                </tr>`;
                        });
                    } else {
                        roomsASC.innerHTML = '<p>No rooms found.</p>';
                        roomsDESC.innerHTML = '<p>No rooms found.</p>';
                        troomsASC.innerHTML = '<p>No rooms found.</p>';
                        troomsDESC.innerHTML = '<p>No rooms found.</p>';
                    }
                } else {
                    let ascHTML = '';
                    let tascHTML = '';
                    rooms.forEach((room) => {
                        ascHTML += `<a href="/room?room_id=${room.room_id}" class="bg-white2 flex flex-col justify-between h-48 w-[27.625rem] p-6 rounded-2xl">
                                        <div>   
                                            <h1 class="text-2xl truncate font-synemed">${room.room_name}</h1>
                                            <h1 class="text-base text-grey2">BS${room.program.toUpperCase()} ${room.year_level[0]}-${room.section}</h1>
                                            <span class="text-base text-grey2">${room.prof_name}</span>
                                        </div>
                                        <span class="text-base text-grey2">${room.room_code}</span>
                                    </a>`;
                        tascHTML += `
                            <tr class="h-40 max-h-[10rem] hover:bg-blue1 ">
                                <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synemed text-2xl px-4 truncate">
                                    <a href="/room?room_id=${room.room_id}">${room.room_name}</a>
                                    <a href="/room?room_id=${room.room_id}" class="text-base text-grey2">BS${room.program.toUpperCase()} ${room.year_level[0]}-${room.section}</a>
                                </td>
                                <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synereg text-2xl text-center text-grey2 break-words"><a href="/room?room_id=${room.room_id}">${room.prof_name}</a></td>
                                <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synereg text-2xl text-center text-grey2"><a href="/room?room_id=${room.room_id}">${room.room_code}</a></td>
                            </tr>
                        `;
                    });
                    roomsASC.innerHTML = ascHTML;
                    troomsASC.innerHTML = tascHTML;

                    let descHTML = '';
                    let tdescHTML = '';
                    rooms.slice().reverse().forEach((room) => {
                        descHTML += `<a href="/room?room_id=${room.room_id}" class="bg-white2 flex flex-col justify-between h-48 w-[27.625rem] p-6 rounded-2xl">
                                        <div>   
                                            <h1 class="text-2xl truncate font-synemed">${room.room_name}</h1>
                                            <h1 class="text-base text-grey2">BS${room.program.toUpperCase()} ${room.year_level[0]}-${room.section}</h1>
                                            <span class="text-base text-grey2">${room.prof_name}</span>
                                        </div>
                                        <span class="text-base text-grey2">${room.room_code}</span>
                                    </a>`;
                        tdescHTML += `
                            <tr class="h-40 max-h-[10rem] hover:bg-blue1 ">
                                <td class=" h-40 max-w-[29.13rem] border-2 border-black1 font-synemed text-2xl px-4 truncate">
                                    <a href="/room?room_id=${room.room_id}">${room.room_name}</a>
                                    <a href="/room?room_id=${room.room_id}" class="text-base text-grey2">BS${room.program.toUpperCase()} ${room.year_level[0]}-${room.section}</a>
                                </td>
                                <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synereg text-2xl text-center text-grey2 break-words"><a href="/room?room_id=${room.room_id}">${room.prof_name}</a></td>
                                <td class="h-40 max-w-[29.13rem] border-2 border-black1 font-synereg text-2xl text-center text-grey2"><a href="/room?room_id=${room.room_id}">${room.room_code}</a></td>
                            </tr>
                        `;
                    });
                    roomsDESC.innerHTML = descHTML;
                    troomsDESC.innerHTML = tdescHTML;
                }
            }

            // Event listeners for dropdowns
            yrLevelDropdown.addEventListener('change', filterRooms);
            sectionDropdown.addEventListener('change', filterRooms);
            programDropdown.addEventListener('change', filterRooms);

            // Clear filters button
            clearFiltersBtn.addEventListener('click', function() {
                yrLevelDropdown.value = '';
                sectionDropdown.value = '';
                programDropdown.value = '';

                console.log('interval started again');
                <?php if($_SESSION['user']['account_type'] == 'professor'): ?>
                    fetchLatestData({
                        "table": "rooms"
                    }, displayRooms, 3000);
                    
                <?php elseif ($_SESSION['user']['account_type'] == 'student'): ?>
                    fetchLatestData(
                        {
                            "table": "room_list", 
                            "school_id": "<?= $_SESSION['user']['school_id'] ?>",
                        }, displayRooms, 3000);
                <?php endif; ?>
                displayRooms(rooms);
            });
            
            displayRooms(rooms);
        
            // FILTERING ROOMS:
            function populateSections() {
                const sections = [...new Set(rooms.map(room => room.section))]; // Extract unique sections
                
                sectionDropdown.innerHTML = `<option class="bg-white2" value="">Section</option>`;
                
                sections.forEach(section => {
                    const option = document.createElement('option');
                    option.value = section;
                    option.textContent = section;
                    option.classList.add('bg-white2');
                    sectionDropdown.appendChild(option);
                });
            }

            populateSections();

            function filterRooms() {
                const selectedYear = yrLevelDropdown.value;
                const selectedSection = sectionDropdown.value;
                const selectedProgram = programDropdown.value;

                // Check if all dropdowns are in their default state (empty or default values)
                const isDefaultFilter = !selectedYear && !selectedSection && !selectedProgram;

                if (isDefaultFilter) {
                    console.log('interval started again');
                    <?php if($_SESSION['user']['account_type'] == 'professor'): ?>
                        fetchLatestData({
                            "table": "rooms"
                        }, displayRooms, 3000);
                        
                    <?php elseif ($_SESSION['user']['account_type'] == 'student'): ?>
                        fetchLatestData(
                            {
                                "table": "room_list", 
                                "school_id": "<?= $_SESSION['user']['school_id'] ?>",
                            }, displayRooms, 3000);
                    <?php endif; ?>
                } else {
                    // Filter the rooms based on the selected values
                    const filteredRooms = rooms.filter(room => {
                        const yearMatch = selectedYear ? room.year_level === selectedYear : true;
                        const sectionMatch = selectedSection ? room.section === selectedSection : true;
                        const programMatch = selectedProgram ? room.program === selectedProgram : true;
                        return yearMatch && sectionMatch && programMatch;
                    });

                    // Display the filtered rooms
                    displayRooms(filteredRooms, true);
                }
            }

            const createRoomForm =  document.getElementById('createRoomForm');
            
            // createRoomForm.addEventListener('submit', submitForm('createRoomForm', '/api/submit-form', 'create_room'));
            submitForm('createRoomForm', '/api/submit-form', 'create_room');
            submitForm('joinRoomForm', '/api/submit-form', 'join_room');

            <?php if($_SESSION['user']['account_type'] == 'professor'): ?>
                fetchLatestData({
                    "table": "rooms"
                }, displayRooms, 3000);
                
            <?php elseif ($_SESSION['user']['account_type'] == 'student'): ?>
                fetchLatestData(
                    {
                        "table": "room_list", 
                        "school_id": "<?= $_SESSION['user']['school_id'] ?>",
                    }, displayRooms, 3000);
            <?php endif; ?>

            const searchForm = document.getElementById('searchRoomForm');
                
            // searchForm.addEventListener('submit', function(e) {
            //     e.preventDefault();
            //     const searchInput = document.getElementById('searchInput');
                
            //     if (searchInput || searchInput !== '') {
            //         const searchTerm = searchInput.value.toLowerCase();
            //         if (searchTerm) {
            //             fetch(`/api/search?search=${searchTerm}`, {
            //                 method: 'POST',
            //                 body: new URLSearchParams('searchInput=' + searchTerm)
            //             })
            //             .then(res => {
            //                 res.json()
            //                 console.log('first then:', res);
            //             })
            //             .then(data => console.log('second then', res))
            //             .catch(e => console.error('Error: ' + e))
            //         } else {
            //             window.isSearching = false;
            //             displayRooms(rooms);
            //         }
            //     }
            // });

            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const searchInput = document.getElementById('searchInput');
                
                if (searchInput || searchInput !== '') {
                    const searchTerm = searchInput.value.toLowerCase();
                    if (searchTerm) {
                        fetch(`/api/search?search=${searchTerm}`, {
                            method: 'POST',
                            body: new URLSearchParams('searchInput=' + searchTerm)
                        })
                        .then(res => res.json())  // Assuming the response is JSON
                        .then(data => {
                            console.log('second then', data);

                            // Update the UI here
                            // Example: Let's say `displayRooms` is a function to display search results.
                            if (data) {
                                clearInterval(intervalID);
                                console.log('data type:', typeof(data));
                                console.log('data:',data);
                                displayRooms(data);  // Update your UI with the fetched data
                            } else {
                                // displayNoResultsMessage();  // Handle cases where there are no results
                                console.log('no data.rooms');
                            }
                        })
                        .catch(e => {
                            console.error('Error: ' + e);
                            // Optionally, display an error message in the UI
                            displayErrorMessage('Something went wrong, please try again.');
                        });
                    } else {
                        window.isSearching = false;
                        displayRooms(rooms);  // Display all rooms when there's no search term
                    }
                }
            });


            // function searching(typed) {
            //     // console.log(typed);

            // }


        });

        
        // ************************************************** //
        // >                   FETCH API                    < // 
        // ************************************************** //

        function updateCombinedSection() {
            const yearPrefix = document.getElementById('yearPrefix');
            const sectionSuffix = document.getElementById('sectionSuffix');
            const combinedSection = document.getElementById('combinedSection');
            
            const yearValue = yearPrefix.value;
            const sectionValue = sectionSuffix.value;

            if (yearValue && sectionValue) {
                combinedSection.value = `Y${yearValue}-${sectionValue}`;
                // console.log("Combined Section:", combinedSection.value);  // For debugging
            } else {
                combinedSection.value = '';
            }
        }
        
        function submitForm(formId, url, type) {
            const form = document.getElementById(formId);
            if (!form) {
                // console.error(`Form with id "${formId}" not found`);
                return;
            }

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                updateCombinedSection();
                // console.log(combinedSection.value)
                // console.log('this', this);
                let formData = new FormData(this);
                formData.append('form_type', type); // Specify the form type here
                formData.append('prof_name', '<?= htmlspecialchars($_SESSION['user']['f_name'] . " " . $_SESSION['user']['l_name'], ENT_QUOTES, 'UTF-8') ?>');
                // console.log('FORM DATA: ', formData);
                fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // console.log('Response:', data);
                    hide('createRoom');
                    enableScroll();
                    // Handle the response (e.g., show success message, update UI)
                })
                .catch(error => console.error('Fetch Error:', error));
            });

            
        }
    </script>
</body>
</html>