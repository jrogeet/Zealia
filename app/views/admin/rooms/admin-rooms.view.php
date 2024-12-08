<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-beige">
    <?php view('partials/admin-nav.view.php'); ?>

    <!-- Loading Indicator -->
    <div id="loadingIndicator" class="fixed inset-0 z-50 flex items-center justify-center bg-white bg-opacity-75">
        <div class="flex flex-col items-center">
            <!-- <div class="w-12 h-12 mb-4 border-4 border-t-4 border-blue-500 rounded-full animate-spin"></div>
            <p class="text-xl font-satoshimed text-blue3">Loading...</p> -->
            <div class="w-28 h-28 loader">
                
            </div> 
        </div>
    </div>
    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem] flex-1 transition-all duration-300 <?= $_SESSION['page-settings']['admin_nav_toggle'] ? 'ml-20' : 'ml-48' ?>" id="main-content">

    <div class="flex items-center justify-between w-full mb-12">
        <h1 class="text-3xl font-clashbold">Room List</h1>
        
        <!-- Updated Filters Section with Toggle -->
        <div class="flex flex-col gap-4 p-6 bg-white border border-black rounded-lg shadow-md w-[40rem]">
            <!-- Always Visible Row -->
            <div class="flex items-end justify-between gap-4">
                <!-- Search -->
                <div class="flex-1">
                    <label class="mb-1 text-sm font-satoshimed text-grey2">Search</label>
                    <div class="relative flex items-center">
                        <input id="searchInput" oninput="handleSearch();" type="text" 
                               placeholder="Search by ID, name, or code..." 
                               class="w-full px-3 py-1 pl-8 bg-white border border-black rounded-lg">
                        <span class="absolute left-2 text-grey2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <button id="clearSearch" class="absolute hidden w-6 h-6 text-xl transition-colors rounded-full right-2 text-red1 hover:bg-red1 hover:bg-opacity-10" onclick="clearSearch()">×</button>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-2">
                    <!-- Toggle Filters Button -->
                    <button onclick="toggleFilters()" class="px-4 py-1 text-white transition-colors rounded-lg bg-blue3 hover:bg-blue2">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                            Filters
                        </div>
                    </button>

                    <!-- Export Button -->
                    <button onclick="exportRooms()" class="px-4 py-1 text-white transition-colors bg-green-600 rounded-lg hover:bg-green-700">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Export
                        </div>
                    </button>
                </div>
            </div>

            <!-- Toggleable Filters Section -->
            <div id="advancedFilters" class="hidden transition-all duration-300">
                <hr class="my-2 border-gray-300">
                <div class="flex items-start justify-between gap-6">
                    <!-- Date Range Filter -->
                    <div class="flex items-start gap-2">
                        <div class="flex flex-col">
                            <label class="mb-1 text-sm font-satoshimed text-grey2">Date Range</label>
                            <div class="flex items-center gap-2">
                                <input type="date" id="startDate" class="px-2 py-1 bg-white border border-black rounded-lg w-36" placeholder="Start Date">
                                <span class="text-grey2">to</span>
                                <input type="date" id="endDate" class="px-2 py-1 bg-white border border-black rounded-lg w-36" placeholder="End Date">
                            </div>
                        </div>
                        <div class="flex flex-col gap-1 mt-6">
                            <button onclick="applyDateFilter()" class="px-3 py-1 text-white transition-colors rounded-lg bg-blue3 hover:bg-blue2">Apply</button>
                            <button id="clearDateFilter" onclick="clearDateFilter()" class="hidden px-3 py-1 transition-colors rounded-lg text-blackpri bg-red1 hover:bg-opacity-80">Clear</button>
                        </div>
                    </div>

                    <!-- Sort and Status Filters -->
                    <div class="flex flex-col gap-4">
                        <!-- Sort Filter -->
                        <div class="flex flex-col">
                            <label class="mb-1 text-sm font-satoshimed text-grey2">Sort By</label>
                            <div class="flex items-center gap-2">
                                <select id="sortBy" class="w-48 px-3 py-1 bg-white border border-black rounded-lg" onchange="handleSort()">
                                    <option value="">Select...</option>
                                    <option value="date_asc">Date (Oldest First)</option>
                                    <option value="date_desc">Date (Newest First)</option>
                                    <option value="name_asc">Room Name (A-Z)</option>
                                    <option value="name_desc">Room Name (Z-A)</option>
                                </select>
                                <button id="clearSort" class="hidden w-8 h-8 text-xl transition-colors rounded-full text-red1 hover:bg-red1 hover:bg-opacity-10" onclick="clearSort()">×</button>
                            </div>
                        </div>

                        <!-- Room Status Filter -->
                        <div class="flex flex-col">
                            <label class="mb-1 text-sm font-satoshimed text-grey2">Room Status</label>
                            <select id="roomStatus" class="w-48 px-3 py-1 bg-white border border-black rounded-lg" onchange="handleStatusFilter()">
                                <option value="">All Statuses</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hidden" id="searchResultsHead">
        <h2>Search Results for: <span id="searchTerm"></span></h2>
    </div>

        <div class="overflow-hidden border border-black rounded-xl">
            <div class="relative">
                <!-- Fixed Header -->
                <div class="overflow-hidden">
                    <table class="w-full table-fixed">
                        <thead>
                            <tr>
                            <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Edit</th>
                            <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Room ID</th>
                            <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Room Name</th>
                            <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase truncate border-l border-r border-black bg-blue3">Instructor Name</th>
                            <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Instructor ID</th>
                            <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Room Code</th>
                            <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Time Created</th>
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
    

    <script src="assets/js/loading.js"></script> 
    <script src="assets/js/fetch/fetch.js"></script>

    <script>
        const roomsTBody = document.getElementById('roomsTBody');
        let roomsChecker = null;
        
        let originalData = [];

        function handleSort() {
            const sortBy = document.getElementById('sortBy').value;
            if (sortBy) {
                clearInterval(intervalID);
                document.getElementById('clearSort').classList.remove('hidden');
            }
            
            const rows = Array.from(roomsTBody.getElementsByTagName('tr'));

            rows.sort((a, b) => {
                if (sortBy === 'date_asc' || sortBy === 'date_desc') {
                    const dateA = new Date(a.cells[6].textContent);
                    const dateB = new Date(b.cells[6].textContent);
                    return sortBy === 'date_asc' ? dateA - dateB : dateB - dateA;
                } else if (sortBy === 'name_asc' || sortBy === 'name_desc') {
                    const nameA = a.cells[2].textContent.toLowerCase();
                    const nameB = b.cells[2].textContent.toLowerCase();
                    return sortBy === 'name_asc' 
                        ? nameA.localeCompare(nameB)
                        : nameB.localeCompare(nameA);
                }
                return 0;
            });

            roomsTBody.innerHTML = '';
            rows.forEach(row => roomsTBody.appendChild(row));
        }

        function clearSort() {
            document.getElementById('sortBy').value = '';
            document.getElementById('clearSort').classList.add('hidden');
            displayRooms(originalData);
            startFetching();
        }

        function handleSearch() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const clearSearchBtn = document.getElementById('clearSearch');
            const rows = Array.from(roomsTBody.getElementsByTagName('tr'));
            
            if (searchTerm) {
                clearInterval(intervalID);
                clearSearchBtn.classList.remove('hidden');
                
                rows.forEach(row => {
                    const roomId = row.cells[1].textContent.toLowerCase();
                    const roomName = row.cells[2].textContent.toLowerCase();
                    const instructorName = row.cells[3].textContent.toLowerCase();
                    const instructorId = row.cells[4].textContent.toLowerCase();
                    const roomCode = row.cells[5].textContent.toLowerCase();
                    
                    if (roomId.includes(searchTerm) || 
                        roomName.includes(searchTerm) || 
                        instructorName.includes(searchTerm) || 
                        instructorId.includes(searchTerm) || 
                        roomCode.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
                
                show('searchResultsHead');
                document.getElementById('searchTerm').innerHTML = searchTerm;
            } else {
                clearSearch();
            }
        }

        function clearSearch() {
            const searchInput = document.getElementById('searchInput');
            const clearSearchBtn = document.getElementById('clearSearch');
            const rows = Array.from(roomsTBody.getElementsByTagName('tr'));
            
            searchInput.value = '';
            clearSearchBtn.classList.add('hidden');
            hide('searchResultsHead');
            document.getElementById('searchTerm').innerHTML = '';
            
            rows.forEach(row => row.style.display = '');
            startFetching();
        }

        function startFetching() {
            fetchLatestData({
                "table": "rooms",
                "currentPage": "admin_rooms",
            }, displayRooms, 3000);
        }

        function displayRooms(data) {
            if (roomsChecker === null || JSON.stringify(data) !== JSON.stringify(roomsChecker)) {
                roomsChecker = data;
                originalData = data; // Store original data for reset purposes
                
                roomsTBody.innerHTML = '';

                data.forEach(room => {
                    roomsTBody.innerHTML += `
                        <tr>
                            <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-room-edit?room_id=${room.room_id}" class="px-4 py-2 text-white rounded-sm bg-blue3">EDIT</a></td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${room.room_id}</td>
                            <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200">${room.room_name}</td>
                            <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200">${room.prof_name}</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${room.school_id}</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${room.room_code}</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${room.created_date}</td>
                        </tr>
                    `;
                });

                // Maintain current sort if active
                const sortBy = document.getElementById('sortBy').value;
                if (sortBy) {
                    handleSort();
                }

                // Maintain search if active
                const searchTerm = document.getElementById('searchInput').value;
                if (searchTerm) {
                    handleSearch();
                }
            }

            hideLoading();
        }

        function handleStatusFilter() {
            const status = document.getElementById('roomStatus').value;
            const rows = Array.from(roomsTBody.getElementsByTagName('tr'));

            rows.forEach(row => {
                const roomStatus = row.getAttribute('data-status').toLowerCase();
                row.style.display = !status || roomStatus === status ? '' : 'none';
            });
        }

        function applyDateFilter() {
            const startDate = new Date(document.getElementById('startDate').value);
            const endDate = new Date(document.getElementById('endDate').value);
            const rows = Array.from(roomsTBody.getElementsByTagName('tr'));
            
            if (startDate && endDate) {
                clearInterval(intervalID); // Stop fetching
                document.getElementById('clearDateFilter').classList.remove('hidden');
                
                rows.forEach(row => {
                    const rowDate = new Date(row.cells[6].textContent); // Time Created column
                    row.style.display = (rowDate >= startDate && rowDate <= endDate) ? '' : 'none';
                });
            }
        }

        function clearDateFilter() {
            // Clear date inputs
            document.getElementById('startDate').value = '';
            document.getElementById('endDate').value = '';
            document.getElementById('clearDateFilter').classList.add('hidden');
            
            // Show all rows
            const rows = Array.from(roomsTBody.getElementsByTagName('tr'));
            rows.forEach(row => row.style.display = '');
            
            // Restart fetching
            startFetching();
        }

        function exportRooms() {
            const rows = Array.from(roomsTBody.getElementsByTagName('tr'))
                .filter(row => row.style.display !== 'none');

            const roomData = rows.map(row => ({
                roomId: row.cells[1].textContent,
                roomName: row.cells[2].textContent,
                instructorName: row.cells[3].textContent,
                instructorId: row.cells[4].textContent,
                roomCode: row.cells[5].textContent,
                timeCreated: row.cells[6].textContent
            }));

            // Convert to CSV and download
            const headers = ['Room ID', 'Room Name', 'Instructor Name', 'Instructor ID', 'Room Code', 'Time Created'];
            const csvContent = [
                headers.join(','),
                ...roomData.map(room => Object.values(room).map(v => `"${v}"`).join(','))
            ].join('\n');

            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = `rooms_export_${new Date().toISOString().split('T')[0]}.csv`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        document.addEventListener('DOMContentLoaded', function() {
            startFetching();
        });
    </script>

<script>
    // Adjust main content margin when sidebar is toggled
    document.getElementById('toggle-sidebar').addEventListener('click', function() {
        const mainContent = document.getElementById('main-content');
        mainContent.classList.toggle('ml-48');
        mainContent.classList.toggle('ml-20');
    });
</script>

<script>
function toggleFilters() {
    const filtersSection = document.getElementById('advancedFilters');
    filtersSection.classList.toggle('hidden');
}
</script>
</body>