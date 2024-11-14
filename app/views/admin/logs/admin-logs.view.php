<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">

    <?php view('partials/admin-nav.view.php'); ?>
    
    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem]">
        <div class="relative flex mt-12 mb-4">
            <h1 class="mx-auto ml-0 text-2xl font-synemed text-grey2">Logs</h1>
            <div class="flex gap-4 mr-6 w-fit">
                <div class="flex items-center">
                    <select id="sortBy" class="pl-4 mx-auto border border-black rounded-lg bg-white1" onchange="handleSort()">
                        <option value="">Sort by...</option>
                        <option value="date_asc">Date (Oldest First)</option>
                        <option value="date_desc">Date (Newest First)</option>
                        <option value="id_asc">ID (Ascending)</option>
                        <option value="id_desc">ID (Descending)</option>
                    </select>
                    <button id="clearSort" class="hidden w-10 mx-2 text-xl text-red1" onclick="clearSort()">X</button>
                </div>
                <div class="flex items-center">
                    <input id="searchInput" oninput="handleSearch();" type="text" placeholder="Search..." class="pl-4 mx-auto border border-black rounded-lg bg-white1">
                    <button id="clearSearch" class="hidden w-10 mx-2 text-xl text-red1" onclick="clearSearch()">X</button>
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
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Log ID</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">ID Number</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">User Type</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Action</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Status</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Target Type</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Target ID</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Timestamp</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">IP Address</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Device Info</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-- Scrollable Body -->
                <div class="overflow-y-auto max-h-[31.25rem]">
                    <table class="w-full table-fixed">
                        <tbody id="logs">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/js/fetch/fetch.js"></script>
    <script> 
        let logsChecker = null;
        let originalData = [];
        const logsTable = document.getElementById('logs');

        function handleSort() {
            const sortBy = document.getElementById('sortBy').value;
            if (sortBy) {
                clearInterval(intervalID);
                document.getElementById('clearSort').classList.remove('hidden');
            }
            
            const rows = Array.from(logsTable.getElementsByTagName('tr'));

            rows.sort((a, b) => {
                if (sortBy === 'date_asc' || sortBy === 'date_desc') {
                    const dateA = new Date(a.cells[6].textContent);
                    const dateB = new Date(b.cells[6].textContent);
                    return sortBy === 'date_asc' ? dateA - dateB : dateB - dateA;
                } else if (sortBy === 'id_asc' || sortBy === 'id_desc') {
                    const idA = parseInt(a.cells[0].textContent);
                    const idB = parseInt(b.cells[0].textContent);
                    return sortBy === 'id_asc' ? idA - idB : idB - idA;
                }
                return 0;
            });

            logsTable.innerHTML = '';
            rows.forEach(row => logsTable.appendChild(row));
        }

        function clearSort() {
            document.getElementById('sortBy').value = '';
            document.getElementById('clearSort').classList.add('hidden');
            displayLogs(originalData);
            startFetching();
        }

        function handleSearch() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const clearSearchBtn = document.getElementById('clearSearch');
            const rows = Array.from(logsTable.getElementsByTagName('tr'));
            
            if (searchTerm) {
                clearInterval(intervalID);
                clearSearchBtn.classList.remove('hidden');
                
                rows.forEach(row => {
                    const logId = row.cells[0].textContent.toLowerCase();
                    const userId = row.cells[1].textContent.toLowerCase();
                    const userType = row.cells[2].textContent.toLowerCase();
                    const action = row.cells[3].textContent.toLowerCase();
                    const status = row.cells[4].textContent.toLowerCase();
                    const targetType = row.cells[5].textContent.toLowerCase();
                    const targetId = row.cells[6].textContent.toLowerCase();
                    
                    if (logId.includes(searchTerm) || 
                        userId.includes(searchTerm) || 
                        userType.includes(searchTerm) || 
                        action.includes(searchTerm) || 
                        status.includes(searchTerm) ||
                        targetType.includes(searchTerm) ||
                        targetId.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
                
                show('searchResultsHead');
                document.getElementById('searchTerm').textContent = searchTerm;
            } else {
                clearSearch();
            }
        }

        function clearSearch() {
            const searchInput = document.getElementById('searchInput');
            const clearSearchBtn = document.getElementById('clearSearch');
            const rows = Array.from(logsTable.getElementsByTagName('tr'));
            
            searchInput.value = '';
            clearSearchBtn.classList.add('hidden');
            hide('searchResultsHead');
            document.getElementById('searchTerm').textContent = '';
            
            rows.forEach(row => row.style.display = '');
            startFetching();
        }

        function startFetching() {
            fetchLatestData(
                {
                    "table": "logs"
                }, displayLogs, 3000
            );
        }

        function displayLogs(data) {
            if (logsChecker == null || JSON.stringify(logsChecker) !== JSON.stringify(data)) {
                logsChecker = data;
                originalData = data; // Store original data for reset purposes

                logsTable.innerHTML = '';
                data.forEach(log => {
                    const row = document.createElement('tr');
                    row.className = 'border-b border-black';
                    row.innerHTML = `
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white1` : `bg-white2`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.id}</a>` : log.id}
                        </td>
                        
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white1` : `bg-white2`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.school_id}</a>` : log.school_id}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white1` : `bg-white2`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.user_role}</a>` : log.user_role}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white1` : `bg-white2`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.action}</a>` : log.action}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white1` : `bg-white2`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.status}</a>` : log.status}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white1` : `bg-white2`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.target_type}</a>` : log.target_type}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white1` : `bg-white2`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.target_id}</a>` : log.target_id}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white1` : `bg-white2`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.created_at}</a>` : log.created_at}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white1` : `bg-white2`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.ip_address}</a>` : log.ip_address}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white1` : `bg-white2`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.user_agent}</a>` : log.user_agent}
                        </td>
                    `;

                    logsTable.appendChild(row);
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
        }

        document.addEventListener('DOMContentLoaded', function() {
            startFetching();
        });
    </script>
</body>