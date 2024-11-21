<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-beige">

    <?php view('partials/admin-nav.view.php'); ?>
    
    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem]">
        <div class="relative flex mt-12 mb-4">
            <h1 class="mx-auto ml-0 text-2xl font-satoshimed text-grey2">Logs</h1>
            <div class="flex gap-4 mr-6 w-fit">
                <!-- Log Categories Dropdown -->
                <div class="flex items-center">
                    <select id="logCategory" class="pl-4 mx-auto bg-white border border-black rounded-lg" onchange="handleCategoryFilter()">
                        <option value="">All Log Categories</option>
                        <option value="account_changes">Account Changes</option>
                        <option value="room_activities">Room Activities</option>
                        <option value="system_events">System Events</option>
                    </select>
                </div>

                <!-- Sorting Dropdown (Kept from original) -->
                <div class="flex items-center">
                    <select id="sortBy" class="pl-4 mx-auto bg-white border border-black rounded-lg" onchange="handleSort()">
                        <option value="">Sort by...</option>
                        <option value="date_asc">Date (Oldest First)</option>
                        <option value="date_desc">Date (Newest First)</option>
                        <option value="id_asc">ID (Ascending)</option>
                        <option value="id_desc">ID (Descending)</option>
                    </select>
                    <button id="clearSort" class="hidden w-10 mx-2 text-xl text-red1" onclick="clearSort()">X</button>
                </div>

            <!-- Date Range Filter -->
            <div class="flex items-center">
                <input type="date" id="startDate" class="pl-2 mx-1 bg-white border border-black rounded-lg" placeholder="Start Date">
                <input type="date" id="endDate" class="pl-2 mx-1 bg-white border border-black rounded-lg" placeholder="End Date">
                <button onclick="applyDateFilter()" class="px-2 py-1 mx-1 text-white rounded-lg bg-blue3">Filter Dates</button>
                <button id="clearDateFilter" onclick="clearDateFilter()" class="hidden px-2 py-1 mx-1 rounded-lg text-blackpri bg-red1">Clear Dates</button>
            </div>

                <!-- Search Input (Kept from original) -->
                <div class="flex items-center">
                    <input id="searchInput" oninput="handleSearch();" type="text" placeholder="Search..." class="pl-4 mx-auto bg-white border border-black rounded-lg">
                    <button id="clearSearch" class="hidden w-10 mx-2 text-xl text-red1" onclick="clearSearch()">X</button>
                </div>

                <!-- Export Logs Button -->
                <div class="flex items-center">
                    <button onclick="exportLogs()" class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700">
                        Export Logs
                    </button>
                </div>
            </div>
        </div>

        <!-- Rest of the original HTML remains the same -->
        <div class="hidden" id="searchResultsHead">
            <h2>Search Results for: <span id="searchTerm"></span></h2>
        </div>

        <div class="overflow-hidden border border-black rounded-xl">
            <!-- Table structure remains the same as in the original code -->
            <div class="relative">
                <!-- Fixed Header -->
                <div class="overflow-hidden">
                    <table class="w-full table-fixed">
                        <thead>
                            <tr>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Log ID</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">ID Number</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">User Type</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Action</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Status</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Target Type</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Target ID</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Timestamp</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">IP Address</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Device Info</th>
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
                document.getElementById('clearSort').classList.remove('hidden');
            }
            
            const rows = Array.from(logsTable.getElementsByTagName('tr'));

            rows.sort((a, b) => {
                if (sortBy === 'date_asc' || sortBy === 'date_desc') {
                    // Use the 8th cell (index 7) which contains the timestamp
                    const dateA = new Date(a.cells[7].textContent);
                    const dateB = new Date(b.cells[7].textContent);
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

        function handleCategoryFilter() {
            const category = document.getElementById('logCategory').value;
            const rows = Array.from(logsTable.getElementsByTagName('tr'));

            if (category) {
                rows.forEach(row => {
                    // Assume we add a data attribute for log category
                    const rowCategory = row.getAttribute('data-category');
                    row.style.display = rowCategory === category ? '' : 'none';
                });
            } else {
                rows.forEach(row => row.style.display = '');
            }
        }

        // New function for date range filtering
        function applyDateFilter() {
            const startDate = new Date(document.getElementById('startDate').value);
            const endDate = new Date(document.getElementById('endDate').value);
            const rows = Array.from(logsTable.getElementsByTagName('tr'));
            
            if (startDate && endDate) {
                clearInterval(intervalID); // Stop fetching
                document.getElementById('clearDateFilter').classList.remove('hidden');
                
                rows.forEach(row => {
                    const rowDate = new Date(row.cells[7].textContent); // Timestamp column
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
            const rows = Array.from(logsTable.getElementsByTagName('tr'));
            rows.forEach(row => row.style.display = '');
            
            // Restart fetching
            startFetching();
        }

        // Export logs function
        function exportLogs() {
            // Get current filter parameters
            const category = document.getElementById('logCategory').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const searchTerm = document.getElementById('searchInput').value;

            // Collect log data from the current table view
            const rows = Array.from(logsTable.getElementsByTagName('tr'));
            const logData = rows
                .filter(row => row.style.display !== 'none') // Only visible rows
                .map(row => ({
                    logId: row.cells[0].textContent,
                    idNumber: row.cells[1].textContent,
                    userType: row.cells[2].textContent,
                    action: row.cells[3].textContent,
                    status: row.cells[4].textContent,
                    targetType: row.cells[5].textContent,
                    targetId: row.cells[6].textContent,
                    timestamp: row.cells[7].textContent,
                    ipAddress: row.cells[8].textContent,
                    deviceInfo: row.cells[9].textContent
                }));

            // Convert log data to CSV
            function convertToCSV(data) {
                // Define headers
                const headers = [
                    'Log ID', 'ID Number', 'User Type', 'Action', 
                    'Status', 'Target Type', 'Target ID', 
                    'Timestamp', 'IP Address', 'Device Info'
                ];

                // Create CSV rows
                const csvRows = [
                    headers.join(','), // Header row
                    ...data.map(log => [
                        log.logId,
                        log.idNumber,
                        log.userType,
                        log.action,
                        log.status,
                        log.targetType,
                        log.targetId,
                        log.timestamp,
                        log.ipAddress,
                        log.deviceInfo
                    ].map(field => 
                        `"${String(field).replace(/"/g, '""')}"` // Escape quotes
                    ).join(','))
                ];

                return csvRows.join('\n');
            }

            // Create and download CSV
            const csvContent = convertToCSV(logData);
            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            
            // Create download link
            const link = document.createElement('a');
            const url = URL.createObjectURL(blob);
            link.setAttribute('href', url);
            link.setAttribute('download', `logs_export_${new Date().toISOString().split('T')[0]}.csv`);
            
            // Trigger download
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
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

                     // Determine log category based on available information
                     let logCategory = '';
                    if (log.action.toLowerCase().includes('account')) {
                        logCategory = 'account_changes';
                    } else if (log.action.toLowerCase().includes('room') || log.action.toLowerCase().includes('space')) {
                        logCategory = 'room_activities';
                    } else {
                        logCategory = 'system_events';
                    }
                    
                    // Add data attribute for category filtering
                    row.setAttribute('data-category', logCategory);


                    row.innerHTML = `
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white` : `bg-beige`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.id}</a>` : log.id}
                        </td>
                        
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white` : `bg-beige`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.school_id}</a>` : log.school_id}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white` : `bg-beige`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.user_role}</a>` : log.user_role}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white` : `bg-beige`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.action}</a>` : log.action}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white` : `bg-beige`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.status}</a>` : log.status}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white` : `bg-beige`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.target_type}</a>` : log.target_type}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white` : `bg-beige`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.target_id}</a>` : log.target_id}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white` : `bg-beige`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.created_at}</a>` : log.created_at}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white` : `bg-beige`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.ip_address}</a>` : log.ip_address}
                        </td>
                        <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center ${log.school_id !== null ? `bg-white` : `bg-beige`} border-l border-r border-black">
                            ${log.school_id !== null ? `<a href="/admin-view-log?id=${log.school_id}">${log.user_agent}</a>` : log.user_agent}
                        </td>
                    `;

                    logsTable.appendChild(row);
                });

                const categoryFilter = document.getElementById('logCategory').value;
                if (categoryFilter) {
                    handleCategoryFilter();
                }

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