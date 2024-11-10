<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>
    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem]">

    <div class="relative flex mb-12">
        <h1 class="mx-auto ml-6 text-3xl font-synebold">Room List</h1>
        <form id="searchRoomForm" method="POST" action="/admin-rooms" class="flex mr-6 w-fit">
            <input id="searchInput" oninput="checkSearch();" name="search_input" type="text" placeholder="Search..." class="pl-4 mx-auto border border-black rounded-lg bg-white1" required>
            <button id="clearSearch" class="hidden w-10 mx-2 text-xl text-red1">X</button>
            <button type="submit" class="mx-auto ml-4 border rounded-lg border-grey2 bg-orange1 w-28 text-black1">Search</button>
        </form>
    </div>

    <div class="hidden" id="searchResultsHead">
        <h2>Search Results for: <span id="searchTerm"></span></h2>
    </div>

        <div class="border border-black rounded-xl">
            <div class="relative">
                <!-- Fixed Header -->
                <div class="overflow-hidden">
                    <table class="w-full table-fixed">
                        <thead>
                            <tr>
                            <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Edit</th>
                            <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Room ID</th>
                            <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Room Name</th>
                            <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase truncate border-l border-r border-black bg-blue3 text-white1">Instructor Name</th>
                            <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Instructor ID</th>
                            <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Room Code</th>
                            <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Time Created</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-- Scrollable Body -->
                <div class="overflow-y-auto max-h-[31.25rem]">
                    <table class="w-full table-fixed">
                        <tbody id="roomsTBody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
    

    <script src="assets/js/fetch/fetch.js"></script>

    <script>
        const roomsTBody = document.getElementById('roomsTBody');
        let roomsChecker = null;
        
        document.addEventListener('DOMContentLoaded', function() {
            fetchLatestData({
                "table": "rooms",
                "currentPage": "admin_rooms",
            }, displayRooms, 3000);
        });

        function displayRooms(data) {
            // console.log(data);
            if (roomsChecker === null || JSON.stringify(data) !== JSON.stringify(roomsChecker)) {
                roomsChecker = data;
                console.log(roomsChecker);
                
                roomsTBody.innerHTML = '';

                data.forEach(room => {
                    // console.log('room:', room);
                    roomsTBody.innerHTML += `
                        <tr>
                            <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-room-edit?room_id=${room.room_id}" class="px-4 py-2 rounded-sm bg-blue3 text-white1">EDIT</a></td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${room.room_id}</td>
                            <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200">${room.room_name}</td>
                            <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200">${room.prof_name}</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${room.school_id}</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${room.room_code}</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${room.created_date}</td>
                        </tr>
                    `;
                });
            }
        }

        const searchInput = document.getElementById('searchInput');
        const clearSearch = document.getElementById('clearSearch');
        const searchForm = document.getElementById('searchRoomForm');

        function checkSearch() {
            if (searchInput.value !== '') {
                show('clearSearch');
            } else {
                hide('clearSearch');
            }
        }

        clearSearch.addEventListener('click', function(event) {
            event.preventDefault();
            if (searchInput.value.length > 0) {
                searchInput.value = '';
            }
            hide('clearSearch');
            hide('searchResultsHead');
            document.getElementById('searchTerm').innerHTML = '';

            fetchLatestData({
                "table": "rooms",
                "currentPage": "admin_rooms",
            }, displayRooms, 3000);
        });

        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (searchInput && searchInput.value !== '') {
                const searchTerm = searchInput.value.toLowerCase();
                if (searchTerm) {
                    fetch(`/api/search?search=${searchTerm}`, {
                        method: 'POST',
                        body: new URLSearchParams('searchInput=' + searchTerm + '&currentPage=admin_rooms')
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data) {
                            clearInterval(intervalID);
                            displayRooms(data);

                            show('searchResultsHead');
                            document.getElementById('searchTerm').innerHTML = searchTerm;
                        } else {
                            console.log('no matching rooms found');
                        }
                    })
                    .catch(e => {
                        console.error('Error: ' + e);
                    });
                } else {
                    fetchLatestData({
                        "table": "rooms",
                        "currentPage": "admin_rooms",
                    }, displayRooms, 3000);
                }
            }
        });
    </script>
</body>