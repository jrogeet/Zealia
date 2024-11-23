<?php view('partials/head.view.php'); ?>

<body class="flex flex-col w-screen overflow-x-hidden bg-whitecon justify">
    <?php view('partials/nav.view.php')?>

    <!-- desktop -->
    <main class="hidden lg:block relative left-1/2 transform -translate-x-1/2 h-auto w-[97%] mb-40 top-32 ">

        <!-- title -->
        <span class="relative block left-[3vw] font-clashsemibold text-5xl text-blackpri">Dashboard</span>

        <!-- box -->
        <div class="block relative bg-whitecon left-1/2 transform -translate-x-1/2 min-h-[43.75rem] w-[97%] min-w-[65rem] border-blackpri border-2 rounded-t-[1.25rem] mt-4">
            <!-- header -->
            <div class="h-[3.75rem] border-blackpri border-b-2 flex justify-between items-center px-5 overflow-hidden">
                <!-- search & arrangement -->
                <div class="flex justify-between gap-4 ">
                    <!-- tiles / table -->
                    <div class="flex justify-between h-[2.25rem] w-[4.875rem]">
                        <button class="bg-tiles h-[2.25rem] w-[2.25rem] border border-grey2 rounded-lg " onClick="show('dashboardTiles'); hide('dashboardTable');"></button>

                        <button class="bg-table h-[2.25rem] w-[2.25rem] bordeblock relative transform -translate-x-1/2r border-grey2 rounded-lg ml-2" onClick="show('dashboardTable'); hide('dashboardTiles');"></button>
                    </div>

                    <!-- search -->
                    <form id="searchRoomForm" method="POST"  class="flex justify-between items-center h-[2.25rem] w-[30rem] bg-whitealt border border-grey2 text-grey1 font-satoshimed rounded-lg overflow-hidden">
                        <input type="hidden" name="search" value="search">
                        <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">
                        <input id="searchInput" oninput="checkSearch();"  class="w-8/12 h-full pl-2 bg-whitecon focus:outline-none" type="text" name="search_input" placeholder="Search Room">
                        <button id="clearSearch"  class="hidden w-1/12 text-xl text-red1">X</button>
                        <button type="submit" class="w-3/12 bg-center bg-no-repeat bg-contain border-0 border-l bg-search h-5/6 border-l-grey2"></button>
                    </form>

                    <button class="h-[2.25rem] px-4 bg-blue1 text-blackpri font-satoshimed border border-blackless rounded-lg" onClick="toggle('filters');">Filter v</button>

                    <!-- <button class="bg-sort h-[2.25rem] w-[2.25rem] border border-grey2 rounded-lg" onClick="toggleHidden(['rooms-ascending','rooms-descending']); toggleHidden(['t-rooms-ascending','t-rooms-descending']);"></button> -->
                    <button class="bg-sort h-[2.25rem] w-[2.25rem] border border-grey2 rounded-lg" onclick="toggle('rooms-ascending-container'); toggle('rooms-descending-container'); toggleHidden(['t-rooms-ascending','t-rooms-descending']);"></button>
                    <button id="clearFilters" class="mx-auto border border-whitebord   h-[2.25rem] w-[10rem] rounded-lg font-satoshimed">Clear Search/Filter</button>
                </div>

                <?php if ($_SESSION['user']['account_type'] === 'student'):?>
                    <form id="joinRoomForm" class="flex justify-between gap-4" method="POST">
                        <?php if (isset($errors['room_existence'])) : ?>
                            <p class=""><?= $errors['room_existence'] ?></p>
                        <?php elseif (isset($errors['is_joined'])) : ?>
                            <p class=""><?= $errors['is_joined'] ?></p>
                        <?php endif; ?>

                        <input type="hidden" name="join" value="join">
                        
                        <input class="h-[2.25rem] w-[12.5rem] bg-whitealt border border-blackless font-satoshimed text-grey1 text-base px-4" type="number" id="room_code" name="room_code" placeholder="Enter room code">

                        <button class="bg-orangeaccent h-[2.25rem] w-[6.25rem] font-satoshimed rounded-lg border border-blackless"  type="submit">Join</button>
                    </form>
                <?php elseif ($_SESSION['user']['account_type'] === 'instructor'): ?>
                    <!-- <form class="flex justify-between gap-4" method="POST" action="/dashboard">
                        <input type="hidden" name="create" value="create">
                        <input type="hidden" name="asc" value="<?= htmlspecialchars($encoded_ascending_rooms, ENT_QUOTES, 'UTF-8')?>">
                        <input type="hidden" name="desc" value="<?= htmlspecialchars($encoded_descending_rooms, ENT_QUOTES, 'UTF-8')?>">
                        <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>"> -->
                        
                        <?php if (isset($errors['room_name'])) : ?>
                            <p class=""><?= $errors['room_name'] ?></p>
                        <?php endif; ?>
                        <!-- <input name="room_name" class="h-[2.25rem] w-[12.5rem] bg-beige border border-grey2 font-satoshimed text-grey1 text-base px-4" placeholder="Enter room name" required> -->
                        <!-- <button class="bg-orangeaccent h-[2.25rem] w-[6.25rem] font-satoshiblack rounded-lg"  type="submit">Create</button> -->
                        <button onclick="show('createRoom'); disableScroll();" class="bg-orangeaccent h-[2.25rem] w-[6.25rem] font-satoshiblack rounded-lg">Create</button>
                    <!-- </form> -->
                <?php endif;?>
            </div>

            <!-- Filter -->
            <div class="hidden bg-white w-full h-[3.75rem] border-blackpri border-b-2 justify-between items-center px-5 overflow-hidden shadow-xl" id="filters">
                <div class="flex w-4/6">
                <div class="flex items-center h-[2.25rem] w-4/5  bg-white border border-white font-satoshimed rounded-lg pr-4 overflow-hidden">
                    <p class="flex text-lg text-grey1 font-satoshimed">Search by Filter:</p>

                    <!-- Year -->
                    <select class="mx-auto h-[2.25rem] w-[10rem] rounded-lg pl-2 font-satoshimed" id="yrLevel">
                        <option class="bg-beige" value="">Year Level</option>
                        <option class="bg-beige" value="1st year">1st Year</option>
                        <option class="bg-beige" value="2nd year">2nd Year</option>
                        <option class="bg-beige" value="3rd year">3rd Year</option>
                        <option class="bg-beige" value="4th year">4th Year</option>
                    </select>

                    <!-- Section -->
                    <select class="mx-auto bg-grey1 h-[2.25rem] w-[10rem] rounded-lg pl-2 font-satoshimed" id="section">
                        <option class="bg-beige" value="">Section</option>
                        <option class="bg-beige" value="A">A</option>
                        <option class="bg-beige" value="B">B</option>
                        <option class="bg-beige" value="C">C</option>
                    </select>

                    <!-- Program -->
                    <select class="mx-auto bg-grey1 h-[2.25rem] w-[10rem] rounded-lg pl-2 font-satoshimed" id="program">
                        <option class="bg-beige" value="">Program</option>
                        <option class="bg-beige" value="cs">CS</option>
                        <option class="bg-beige" value="it">IT</option>
                    </select>

                    <!-- <button id="clearFilters" class="mx-auto bg-red1 text-white h-[2.25rem] w-[10rem] rounded-lg font-satoshimed">Clear Filters</button> -->
                </div>
                </div>
            </div>

            <!-- TILES  -->
            <div id="dashboardTiles" class="flex justify-center max-h-[39.8rem] w-full overflow-y-auto overflow-x-hidden">         
                    <div class="flex-col hidden w-full m-4" id="rooms-ascending-container">
                        <hi class="text-xl font-clashbold">Earliest</hi>
                        <!--  ROOMS  -->
                        <div class="flex flex-wrap content-start gap-9" id="rooms-ascending">
                            <!-- FILLED USING JAVASCRIPT -->
                        </div>
                    </div>
                    <!-- added div as fix for descending being toggled as block -->
                    <!-- <div class="hidden h-[39.76rem] w-full overflow-y-scroll overflow-x-hidden"> -->
                    <div  class="flex flex-col w-full m-4" id="rooms-descending-container">
                        <hi class="text-xl font-satoshiblack">Latest</hi>
                        <!--  ROOMS  -->
                        <div class="flex flex-wrap content-start gap-9" id="rooms-descending">
                            <!-- FILLED USING JAVASCRIPT -->
                        </div>
                    </div>
                    <!-- </div> -->
            </div>

            <!-- TABLE -->
            <div id="dashboardTable" class="hidden w-full h-full overflow-x-hidden overflow-y-auto scrollbar-thumb-blue-500 scrollbar-thumb-rounded">
                <table class="max-h-[39.8rem] w-full table-fixed">
                    <thead class="h-10 text-xl bg-blue3 max-h-10 font-satoshimed">
                        <tr class="">
                            <th class="border-2 border-blackpri text-white w-[29rem]">Room Name</th>
                            <th class="border-2 border-blackpri text-white w-[29rem]">Instructor Name</th>
                            <th class="border-2 border-blackpri text-white w-[29rem]">Room Code</th>
                        </tr>
                    </thead>

                    <tbody class="hidden w-full h-40 min-h-40" id="t-rooms-ascending">
                    </tbody>
                    <tbody class="w-full h-40 min-h-40" id="t-rooms-descending">
                    </tbody>
                </table>
           </div>

            <div id="noRooms" class="flex flex-col items-center justify-center w-full h-full">

            </div>
        </div>
    </main>

    <div id="createRoom" class="fixed z-50 justify-center hidden w-full h-full bg-glassmorphism">
        <div class="relative flex flex-col h-64 border rounded-t-lg bg-whitecon w-96 border-blackpri top-1/3">
            <div class="flex items-center justify-between h-12 border rounded-t-lg bg-blue3 border-blackpri">
                <span class="w-4/5 pl-2 text-lg text-white font-satoshimed">Create:</span>
                <button class="flex items-center justify-center w-5 h-5 text-center rounded-full bg-rederr" onClick="hide('createRoom'); enableScroll();">X</button>
            </div>
            <form id="createRoomForm" method="POST" class="flex flex-col w-full gap-2 p-2 h-72">
                <input type="hidden" name="create" value="create">
                <input type="hidden" name="asc" value="<?= htmlspecialchars($encoded_ascending_rooms, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="desc" value="<?= htmlspecialchars($encoded_descending_rooms, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>"> 

                <div class="flex items-center">
                    <span class="mr-2 text-base font-satoshimed">Enter Room name:</span>
                    <input name="room_name" class="h-[1.75rem] w-[12.5rem] bg-blue1 border border-grey2 font-satoshimed text-grey1 text-base px-2 py-4 mb-2 rounded-lg" placeholder="Enter room name" required>
                </div>
                
                <div class="flex items-center">
                    <label>Year Level:</label>
                    <select name="year_level" class="p-1 ml-2 border rounded-lg bg-blue1 border-grey2">
                        <option value="1st year">1st year</option>
                        <option value="2nd year">2nd year</option>
                        <option value="3rd year">3rd year</option>
                        <option value="4th year">4th year</option>
                    </select>
                </div>

                <div class="flex items-center">
                    <label>Program:</label>
                    <select name="program" class="p-1 ml-2 border rounded-lg bg-blue1 border-grey2">
                        <option value="cs">CS</option>
                        <option value="it">IT</option>
                    </select>
                </div>

                <!-- <input name="section" class="h-[2.25rem] w-[12.5rem] bg-beige border border-grey2 font-satoshimed text-grey1 text-base px-4" placeholder="Enter section:" required> -->
                <div class="flex items-center">
                    <label class="mr-1 ">Section:</label>
                    <label for="yearPrefix">Y</label>
                    <input type="text" id="yearPrefix" maxlength="1" class="p-1 ml-1 border rounded-lg w-14 bg-blue1 border-grey2" pattern="[A-Z0-9]" placeholder="A or 1" required>
                    <span>-</span>
                    <input type="text" id="sectionSuffix" maxlength="1" class="p-1 border rounded-lg bg-blue1 w-14 border-grey2" pattern="[A-Z0-9]" placeholder="A or 1" required>
                </div>
                
                <input type="hidden" id="combinedSection" name="section">

                <button type="submit" class="w-1/2 p-1 mx-auto mt-2 border rounded-xl bg-blue2 text-blackpri border-blackless hover:bg-orangeaccent">Create Room</button>
            </form>
        </div>
    </div>

    <!-- mobile -->
    <div class="relative block w-full mt-10 text-center lg:hidden h-fit">

        <!-- label -->
        <div class="flex p-4 bg-gradient-to-t from-white to-white2">
            <h1 class="font-clashbold text-[5vw] mx-auto ml-2 mt-1">Dashboard</h1>
            <button class="relative top-1/2 w-1/6 py-1 mt-1 mr-2 bg-blue3 text-white mx-auto text-[3vw] rounded-sm text-sm h-full" id="searchButt">Search</button>

            <?php if ($_SESSION['user']['account_type'] === 'student'):?>
                <?php if (isset($errors['room_existence'])) : ?>
                    <p class=""><?= $errors['room_existence'] ?></p>
                <?php elseif (isset($errors['is_joined'])) : ?>
                    <p class=""><?= $errors['is_joined'] ?></p>
                <?php endif; ?>
                <button class="relative top-1/2 w-1/6 py-1 mt-1 ml-2 mr-2 bg-orangeaccent mx-auto text-[3vw] rounded-sm text-sm h-full" id="jcButt">Join</button>
            <?php elseif ($_SESSION['user']['account_type'] === 'instructor'): ?>
                <?php if (isset($errors['room_name'])) : ?>
                    <p class=""><?= $errors['room_name'] ?></p>
                <?php endif; ?>
                <button class="relative top-1/2 w-1/6 py-1 mt-1 ml-2 mr-2 bg-orangeaccent mx-auto text-[3vw] rounded-sm text-sm h-full" id="jcButt">Create</button>
            <?php endif;?>
        </div>

        <!-- search dropdown -->
        <form method="POST" action="/dashboard" class="flex hidden w-full p-2 bg-beige" id="search">
            <input type="hidden" name="search" value="search">
            <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">

            <input class="w-5/6 pl-2 mx-auto border border-blackpri" name="search_input" placeholder="Room Name">
            <button type="submit" class="relative top-1/2 w-2/6 py-1 ml-2 mr-2 bg-blue3 text-white mx-auto text-[3vw] rounded-sm text-sm h-full">Search</button>
        </form>

        <!-- create/join dropdown -->
        <form method="POST" action="/dashboard" class="flex hidden w-full p-2 bg-beige" id="jc">

            <?php if ($_SESSION['user']['account_type'] === 'student'):?>

                <?php if (isset($errors['room_existence'])) : ?>
                        <p class=""><?= $errors['room_existence'] ?></p>
                <?php elseif (isset($errors['is_joined'])) : ?>
                    <p class=""><?= $errors['is_joined'] ?></p>
                <?php endif; ?>

                <input type="hidden" name="join" value="join">
                <input class="w-5/6 pl-2 mx-auto border border-blackpri" type="number" id="room_code" name="room_code" placeholder="Enter room code" required>
                <button type="submit" class="relative top-1/2 w-2/6 py-1 ml-2 mr-2 bg-blue3 text-white mx-auto text-[3vw] rounded-sm text-sm h-full" id="jcButt">Join</button>

            <?php elseif ($_SESSION['user']['account_type'] === 'instructor'): ?>

                <input type="hidden" name="create" value="create">
                <input type="hidden" name="asc" value="<?= htmlspecialchars($encoded_ascending_rooms, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="desc" value="<?= htmlspecialchars($encoded_descending_rooms, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">

                <?php if (isset($errors['room_name'])) : ?>
                    <p class=""><?= $errors['room_name'] ?></p>
                <?php endif; ?>

                <input class="w-5/6 pl-2 mx-auto border border-blackpri" name="room_name" placeholder="Enter room name" required>
                <button class="relative top-1/2 w-2/6 py-1 ml-2 mr-2 bg-orangeaccent text-blackpri mx-auto text-[3vw] rounded-sm text-sm h-full" id="jcButt">Create</button>

            <?php endif;?>
        
        </form>

        <!-- rooms -->
        <div class="relative flex flex-wrap w-full px-0 py-4 h-fit">
            <?php foreach($ascending_rooms as $rooms) { ?>
                <a href="/room?room_id=<?= $rooms['room_id']?>" class="bg-beige relative flex flex-wrap mx-auto min-w-[19rem] h-32 w-[48%] rounded-2xl m-2 py-2">
                    <div class="w-full">   
                        <h1 class="text-2xl truncate font-satoshimed"><?= $rooms['room_name'] ?></h1>
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
        const searchInput = document.getElementById('searchInput');

        const clearSearch = document.getElementById('clearSearch');

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

        function checkSearch() {
            // console.log(searchInput.value);
            if (searchInput.value !== '') {
                show('clearSearch');
            } else {
                hide('clearSearch');
            }
        }

        clearSearch.addEventListener('click', function(event) {
            event.preventDefault();
            
            console.log('clear search input');
            if (searchInput.value.length > 0) {
                searchInput.value = '';
            }
            hide('clearSearch');
        });
    </script>

    <script>
        let roomsChecker = null;

        document.addEventListener('DOMContentLoaded', function() {
            const rooms = <?php echo json_encode($ascending_rooms) ?>;
            // for ROOM GENERATIONS
            const noRooms = document.getElementById('noRooms');
            const dashboardTiles = document.getElementById('dashboardTiles');
            const dashboardTable = document.getElementById('dashboardTable');

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
                // console.log('displayRooms', rooms);
                

                if (roomsChecker == null && rooms.length == 0 && filtering == false) {
                    // Initial fetch and No Room
                    // console.log('no rooms');
                    noRooms.innerHTML = `
                        <span class="text-4xl font-clashbold text-grey2">No room found</span>
                        
                        <?php if($_SESSION['user']['account_type'] === 'instructor'):?>
                            <span class="text-xl font-satoshimed">Create a room by clicking the "<span class="text-orangeaccent">Create Room</span>" button</span>
                        <?php elseif($_SESSION['user']['account_type'] === 'student'): ?>
                            <span class="text-xl font-satoshimed">Join a room by <span class="text-orangeaccent">entering the code</span> above</span>
                        <?php endif; ?>
                    `;
                } else if (rooms.length == 0 && filtering == false) {
                    roomsASC.innerHTML = "<p>We couldn't find any rooms that match your search criteria.</p>";
                    roomsDESC.innerHTML = "<p>We couldn't find any rooms that match your search criteria.</p>";
                    troomsASC.innerHTML = "<p>We couldn't find any rooms that match your search criteria.</p>";
                    troomsDESC.innerHTML = "<p>We couldn't find any rooms that match your search criteria.</p>";
                } else {
                    if (filtering == true) {
                        // noRooms.remove();
                        clearInterval(intervalID);
                        console.log('interval cleared');
                        roomsASC.innerHTML = '';
                        roomsDESC.innerHTML = '';
                        troomsASC.innerHTML = '';
                        troomsDESC.innerHTML = '';
                        
                        if (rooms.length > 0) {
                            rooms.forEach(room => {
                                let roomCourse = room.program.slice(-2);
                                
                                console.log('room', room.program);
                                roomsASC.innerHTML += `
                                    <a href="/room?room_id=${room.room_id}" class="${roomCourse === 'cs' ? 'bg-cs-beige hover:bg-cs-blue bg-cover bg-no-repeat' : roomCourse === 'it' ? 'bg-it-beige hover:bg-it-blue bg-cover bg-no-repeat' : 'bg-beige hover:bg-blue1 bg-cover bg-no-repeat'} border border-blackless flex flex-col justify-between h-48 w-[27.625rem] p-6 rounded-2xl">
                                        <div>   
                                            <h1 class="text-2xl truncate font-clashmed">${room.room_name}</h1>
                                            <h1 class="text-lg font-satoshimed text-blackless">${room.year_level[0]}-${room.section}</h1>
                                            <span class="text-base text-blackless">${room.prof_name}</span>
                                        </div>
                                        <span class="text-xl text-blackless">${room.room_code}</span>
                                    </a>`;
                                troomsASC.innerHTML += `
                                    <tr class="h-40 max-h-[10rem] hover:bg-blue1 ">
                                        <td class="h-40 max-w-[29.13rem] border-2 border-blackpri font-satoshimed text-2xl px-4 truncate">
                                            <a href="/room?room_id=${room.room_id}">${room.room_name}</a>
                                            <a href="/room?room_id=${room.room_id}" class="text-base text-grey2">BS${room.program.toUpperCase()} ${room.year_level[0]}-${room.section}</a>
                                        </td>
                                        <td class="h-40 max-w-[29.13rem] border-2 border-blackpri font-satoshimed text-2xl text-center text-grey2 break-words"><a href="/room?room_id=${room.room_id}">${room.prof_name}</a></td>
                                        <td class="h-40 max-w-[29.13rem] border-2 border-blackpri font-satoshimed text-2xl text-center text-grey2"><a href="/room?room_id=${room.room_id}">${room.room_code}</a></td>
                                    </tr>`;
                            });
                            rooms.slice().reverse().forEach(room => {
                                let roomCourse = room.program.slice(-2);
                                
                                roomsDESC.innerHTML += `
                                    <a href="/room?room_id=${room.room_id}" class="${roomCourse === 'cs' ? 'bg-cs-beige hover:bg-cs-blue bg-cover bg-no-repeat' : roomCourse === 'it' ? 'bg-it-beige hover:bg-it-blue bg-cover bg-no-repeat' : 'bg-beige hover:bg-blue1 bg-cover bg-no-repeat'} flex flex-col justify-between h-48 w-[27.625rem] p-6 rounded-2xl">
                                        <div>   
                                            <h1 class="text-2xl truncate font-clashmed">${room.room_name}</h1>
                                            <h1 class="text-lg font-satoshimed text-blackless">${room.year_level[0]}-${room.section}</h1>
                                            <span class="text-base text-blackless">${room.prof_name}</span>
                                        </div>
                                        <span class="text-xl text-blackless">${room.room_code}</span>
                                    </a>`;
                                    
                                troomsDESC.innerHTML += `
                                    <tr class="h-40 max-h-[10rem] hover:bg-blue1 ">
                                        <td class="h-40 max-w-[29.13rem] border-2 border-blackpri font-satoshimed text-2xl px-4 truncate">
                                            <a href="/room?room_id=${room.room_id}">${room.room_name}</a>
                                            <a href="/room?room_id=${room.room_id}" class="text-base text-grey2">BS${room.program.toUpperCase()} ${room.year_level[0]}-${room.section}</a>
                                        </td>
                                        <td class="h-40 max-w-[29.13rem] border-2 border-blackpri font-satoshimed text-2xl text-center text-grey2 break-words"><a href="/room?room_id=${room.room_id}">${room.prof_name}</a></td>
                                        <td class="h-40 max-w-[29.13rem] border-2 border-blackpri font-satoshimed text-2xl text-center text-grey2"><a href="/room?room_id=${room.room_id}">${room.room_code}</a></td>
                                    </tr>`;
                            });
                        } else {
                            roomsASC.innerHTML = "<p>We couldn't find any rooms that match your search criteria.</p>";
                            roomsDESC.innerHTML = "<p>We couldn't find any rooms that match your search criteria.</p>";
                            troomsASC.innerHTML = "<p>We couldn't find any rooms that match your search criteria.</p>";
                            troomsDESC.innerHTML = "<p>We couldn't find any rooms that match your search criteria.</p>";
                        }
                    } else {
                        if (roomsChecker === null || JSON.stringify(roomsChecker) !== JSON.stringify(rooms)){
                            noRooms.remove();
                            console.log('not equal rooms');
                            roomsChecker = rooms;

                            let ascHTML = '';
                            let tascHTML = '';
                            rooms.forEach((room) => {
                                let roomCourse = room.program.slice(-2);
                                
                                ascHTML += `<a href="/room?room_id=${room.room_id}" class="${roomCourse === 'cs' ? 'bg-cs-beige hover:bg-cs-blue bg-cover bg-no-repeat' : roomCourse === 'it' ? 'bg-it-beige hover:bg-it-blue bg-cover bg-no-repeat' : 'bg-beige hover:bg-blue1 bg-cover bg-no-repeat'} flex flex-col justify-between h-48 w-[27.625rem] p-6 rounded-2xl">
                                                <div>   
                                                    <h1 class="text-2xl truncate font-clashmed">${room.room_name}</h1>
                                                    <h1 class="text-lg font-satoshimed text-blackless">${room.year_level[0]}-${room.section}</h1>
                                                    <span class="text-base text-blackless">${room.prof_name}</span>
                                                </div>
                                                <span class="text-xl text-blackless">${room.room_code}</span>
                                            </a>`;
                                tascHTML += `
                                    <tr class="h-40 max-h-[10rem] hover:bg-blue1 ">
                                        <td class="h-40 max-w-[29.13rem] border-2 border-blackpri font-satoshimed text-2xl px-4 truncate">
                                            <a href="/room?room_id=${room.room_id}">${room.room_name}</a>
                                            <a href="/room?room_id=${room.room_id}" class="text-base text-grey2">BS${room.program.toUpperCase()} ${room.year_level[0]}-${room.section}</a>
                                        </td>
                                        <td class="h-40 max-w-[29.13rem] border-2 border-blackpri font-satoshimed text-2xl text-center text-grey2 break-words"><a href="/room?room_id=${room.room_id}">${room.prof_name}</a></td>
                                        <td class="h-40 max-w-[29.13rem] border-2 border-blackpri font-satoshimed text-2xl text-center text-grey2"><a href="/room?room_id=${room.room_id}">${room.room_code}</a></td>
                                    </tr>
                                `;
                            });
                            roomsASC.innerHTML = ascHTML;
                            troomsASC.innerHTML = tascHTML;

                            let descHTML = '';
                            let tdescHTML = '';
                            rooms.slice().reverse().forEach((room) => {
                                let roomCourse = room.program.slice(-2);
                                
                                descHTML += `<a href="/room?room_id=${room.room_id}" class="${roomCourse === 'cs' ? 'bg-cs-beige hover:bg-cs-blue bg-cover bg-no-repeat' : roomCourse === 'it' ? 'bg-it-beige hover:bg-it-blue bg-cover bg-no-repeat' : 'bg-beige hover:bg-blue1 bg-cover bg-no-repeat'} flex flex-col justify-between h-48 w-[27.625rem] p-6 rounded-2xl">
                                                <div>   
                                                    <h1 class="text-2xl truncate font-clashmed">${room.room_name}</h1>
                                                    <h1 class="text-lg font-satoshimed text-blackless">${room.year_level[0]}-${room.section}</h1>
                                                    <span class="text-base text-blackless">${room.prof_name}</span>
                                                </div>
                                                <span class="text-xl text-blackless">${room.room_code}</span>
                                            </a>`;
                                tdescHTML += `
                                    <tr class="h-40 max-h-[10rem] hover:bg-blue1 ">
                                        <td class=" h-40 max-w-[29.13rem] border-2 border-blackpri font-satoshimed text-2xl px-4 truncate">
                                            <a href="/room?room_id=${room.room_id}">${room.room_name}</a>
                                            <a href="/room?room_id=${room.room_id}" class="text-base text-grey2">BS${room.program.toUpperCase()} ${room.year_level[0]}-${room.section}</a>
                                        </td>
                                        <td class="h-40 max-w-[29.13rem] border-2 border-blackpri font-satoshimed text-2xl text-center text-grey2 break-words"><a href="/room?room_id=${room.room_id}">${room.prof_name}</a></td>
                                        <td class="h-40 max-w-[29.13rem] border-2 border-blackpri font-satoshimed text-2xl text-center text-grey2"><a href="/room?room_id=${room.room_id}">${room.room_code}</a></td>
                                    </tr>
                                `;
                            });
                            roomsDESC.innerHTML = descHTML;
                            troomsDESC.innerHTML = tdescHTML;
                        } else {
                            // console.log('equal rooms');
                        }
                    }
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

                if (searchInput.value.length > 0) {
                    searchInput.value = '';
                    hide('clearSearch');
                }

                roomsChecker = null;
                console.log('interval started again');
                <?php if($_SESSION['user']['account_type'] == 'instructor'): ?>
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
                
                sectionDropdown.innerHTML = `<option class="bg-beige" value="">Section</option>`;
                
                sections.forEach(section => {
                    const option = document.createElement('option');
                    option.value = section;
                    option.textContent = section;
                    option.classList.add('bg-beige');
                    sectionDropdown.appendChild(option);
                });
            }

            populateSections();

            function filterRooms() {
                if (searchInput.value.length > 0) {
                    searchInput.value = '';
                    hide('clearSearch');
                }
                
                const selectedYear = yrLevelDropdown.value;
                const selectedSection = sectionDropdown.value;
                const selectedProgram = programDropdown.value;

                // Check if all dropdowns are in their default state (empty or default values)
                const isDefaultFilter = !selectedYear && !selectedSection && !selectedProgram;

                if (isDefaultFilter) {
                    console.log('interval started again');
                    <?php if($_SESSION['user']['account_type'] == 'instructor'): ?>
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

            <?php if($_SESSION['user']['account_type'] == 'instructor'): ?>
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
                
                if (searchInput || searchInput !== '') {
                    const searchTerm = searchInput.value.toLowerCase();
                    if (searchTerm) {
                        fetch(`/api/search?search=${searchTerm}`, {
                            method: 'POST',
                            body: new URLSearchParams('searchInput=' + searchTerm + '&currentPage=dashboard')
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

        document.getElementById('yearPrefix').addEventListener('input', updateCombinedSection);
        document.getElementById('sectionSuffix').addEventListener('input', updateCombinedSection);

        function updateCombinedSection() {
            const yearPrefix = document.getElementById('yearPrefix');
            const sectionSuffix = document.getElementById('sectionSuffix');
            const combinedSection = document.getElementById('combinedSection');
            
            yearPrefix.value = yearPrefix.value.toUpperCase();
            sectionSuffix.value = sectionSuffix.value.toUpperCase();

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
                return;
            }

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                formData.append('form_type', type);
                formData.append('prof_name', '<?= htmlspecialchars($_SESSION['user']['f_name'] . " " . $_SESSION['user']['l_name'], ENT_QUOTES, 'UTF-8') ?>');

                fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        // Handle different types of errors
                        if (data.error_type === 'no_result') {
                            // Show error message for no RIASEC result
                            Swal.fire({
                                title: 'Cannot Join Room',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'Take Test',
                                showCancelButton: true,
                                customClass: {
                                    popup: 'border-2 border-blackpri rounded-xl',
                                    title: 'font-clashsemibold text-2xl',
                                    confirmButton: 'bg-blue2 text-blue3 font-satoshiblack px-6 py-2 rounded-lg',
                                    cancelButton: 'bg-red1 text-white font-satoshimed px-6 py-2 rounded-lg'
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Redirect to RIASEC test page
                                    window.location.href = '/test';
                                }
                            });
                        } else {
                            // Show other error messages
                            Swal.fire({
                                title: 'Error',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    } else {
                        // Show success message
                        Swal.fire({
                            title: 'Success',
                            text: data.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                        
                        // Clear the form
                        form.reset();

                        if (formId === 'createRoomForm') {
                            hide('createRoom');
                            enableScroll();
                        }
                    }
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                    Swal.fire({
                        title: 'Error',
                        text: 'An unexpected error occurred. Please try again.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
            });
        }
    </script>

    <script src="/assets/js/sweetalert2.min.js"></script>
</body>
</html>