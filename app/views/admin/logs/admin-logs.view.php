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
            <h1 class="text-3xl font-clashbold">Logs</h1>
            
            <!-- Updated Filters Section with Toggle -->
            <div class="flex flex-col gap-4 p-6 bg-white border border-black rounded-lg shadow-md w-[40rem]">
                <!-- Always Visible Row -->
                <div class="flex items-end justify-between gap-4">
                    <!-- Search -->
                    <div class="flex-1">
                        <label class="mb-1 text-sm font-satoshimed text-grey2">Search</label>
                        <div class="relative flex items-center">
                            <input id="searchInput" oninput="handleSearch();" type="text" 
                                   placeholder="Search logs..." 
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
                        <button onclick="exportLogs()" class="px-4 py-1 text-white transition-colors bg-green-600 rounded-lg hover:bg-green-700">
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

                        <!-- Sort and Category Filters -->
                        <div class="flex flex-col gap-4">
                            <!-- Sort Filter -->
                            <div class="flex flex-col">
                                <label class="mb-1 text-sm font-satoshimed text-grey2">Sort By</label>
                                <div class="flex items-center gap-2">
                                    <select id="sortBy" class="w-48 px-3 py-1 bg-white border border-black rounded-lg" onchange="handleSort()">
                                        <option value="">Select...</option>
                                        <option value="date_asc">Date (Oldest First)</option>
                                        <option value="date_desc">Date (Newest First)</option>
                                        <option value="id_asc">ID (Ascending)</option>
                                        <option value="id_desc">ID (Descending)</option>
                                    </select>
                                    <button id="clearSort" class="hidden w-8 h-8 text-xl transition-colors rounded-full text-red1 hover:bg-red1 hover:bg-opacity-10" onclick="clearSort()">×</button>
                                </div>
                            </div>

                            <!-- Log Category Filter -->
                            <div class="flex flex-col">
                                <label class="mb-1 text-sm font-satoshimed text-grey2">Log Category</label>
                                <select id="logCategory" class="w-48 px-3 py-1 bg-white border border-black rounded-lg" onchange="handleCategoryFilter()">
                                    <option value="">All Categories</option>
                                    <option value="account_changes">Account Changes</option>
                                    <option value="room_activities">Room Activities</option>
                                    <option value="system_events">System Events</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rest of the original HTML remains the same -->
        <div class="hidden" id="searchResultsHead">
            <h2>Search Results for: <span id="searchTerm"></span></h2>
        </div>

        <!-- Table Container -->
        <div class="overflow-hidden border border-black rounded-xl">
            <div class="relative">
                <!-- Fixed Header -->
                <div class="overflow-hidden">
                    <table class="w-full table-fixed">
                        <thead>
                            <tr>
                                <th class="w-20 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">ID</th>
                                <th class="w-24 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">School ID</th>
                                <th class="w-24 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">User Role</th>
                                <th class="w-48 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Action</th>
                                <th class="w-24 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Status</th>
                                <th class="w-24 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Target Type</th>
                                <th class="w-24 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Target ID</th>
                                <th class="w-40 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Created At</th>
                                <th class="w-32 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">IP Address</th>
                                <th class="px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">User Agent</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-- Scrollable Body -->
                <div class="overflow-y-auto max-h-[31.25rem]">
                    <table class="w-full table-fixed">
                        <tbody id="logsTable">
                            <!-- Table rows will be dynamically inserted here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script src="assets/js/loading.js"></script> 
    <script src="/assets/js/fetch/fetch.js"></script>
    <script> 
        let logsChecker = null;
        let originalData = [];
        const logsTable = document.getElementById('logsTable');

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
                originalData = data;

                logsTable.innerHTML = '';
                data.forEach(log => {
                    const row = document.createElement('tr');
                    row.className = 'border-b border-black hover:bg-gray-50 transition-colors';

                    // Determine log category for filtering
                    let logCategory = '';
                    if (log.action.toLowerCase().includes('account')) {
                        logCategory = 'account_changes';
                    } else if (log.action.toLowerCase().includes('room') || log.action.toLowerCase().includes('space')) {
                        logCategory = 'room_activities';
                    } else {
                        logCategory = 'system_events';
                    }
                    
                    row.setAttribute('data-category', logCategory);

                    // Determine status color
                    let statusColor = '';
                    switch(log.status.toLowerCase()) {
                        case 'success':
                            statusColor = 'text-green-600';
                            break;
                        case 'failed':
                            statusColor = 'text-red-600';
                            break;
                        case 'pending':
                            statusColor = 'text-yellow-600';
                            break;
                        default:
                            statusColor = 'text-gray-600';
                    }

                    const baseClass = "px-4 py-3 text-sm border-l border-r border-black";
                    const linkClass = log.school_id ? "hover:text-blue3 transition-colors" : "";
                    const bgClass = log.school_id ? "bg-white" : "bg-beige";

                    row.innerHTML = `
                        <td class="${baseClass} ${bgClass} w-20">
                            ${log.school_id ? `<a href="/admin-view-log?id=${log.id}" class="${linkClass}">${log.id}</a>` : log.id}
                        </td>
                        <td class="${baseClass} ${bgClass} w-24 font-medium">
                            ${log.school_id ? `<a href="/admin-view-log?id=${log.school_id}" class="${linkClass}">${log.school_id}</a>` : '-'}
                        </td>
                        <td class="${baseClass} ${bgClass} w-24">
                            ${log.school_id ? `<a href="/admin-view-log?id=${log.school_id}" class="${linkClass}">${log.user_role}</a>` : log.user_role}
                        </td>
                        <td class="${baseClass} ${bgClass} w-48">
                            ${log.school_id ? `<a href="/admin-view-log?id=${log.school_id}" class="${linkClass}">${log.action}</a>` : log.action}
                        </td>
                        <td class="${baseClass} ${bgClass} w-24 font-medium ${statusColor}">
                            ${log.school_id ? `<a href="/admin-view-log?id=${log.school_id}" class="${linkClass}">${log.status}</a>` : log.status}
                        </td>
                        <td class="${baseClass} ${bgClass} w-24">
                            ${log.school_id ? `<a href="/admin-view-log?id=${log.school_id}" class="${linkClass}">${log.target_type}</a>` : log.target_type}
                        </td>
                        <td class="${baseClass} ${bgClass} w-24">
                            ${log.school_id ? `<a href="/admin-view-log?id=${log.school_id}" class="${linkClass}">${log.target_id}</a>` : log.target_id}
                        </td>
                        <td class="${baseClass} ${bgClass} w-40">
                            ${log.school_id ? `<a href="/admin-view-log?id=${log.school_id}" class="${linkClass}">${log.created_at}</a>` : log.created_at}
                        </td>
                        <td class="${baseClass} ${bgClass} w-32 font-mono text-xs">
                            ${log.school_id ? `<a href="/admin-view-log?id=${log.school_id}" class="${linkClass}">${log.ip_address}</a>` : log.ip_address}
                        </td>
                        <td class="${baseClass} ${bgClass} truncate text-xs">
                            ${log.school_id ? `<a href="/admin-view-log?id=${log.school_id}" class="${linkClass}">${log.user_agent}</a>` : log.user_agent}
                        </td>
                    `;

                    logsTable.appendChild(row);
                });

                // Maintain current filters and sorts
                const categoryFilter = document.getElementById('logCategory').value;
                if (categoryFilter) {
                    handleCategoryFilter();
                }

                const sortBy = document.getElementById('sortBy').value;
                if (sortBy) {
                    handleSort();
                }

                const searchTerm = document.getElementById('searchInput').value;
                if (searchTerm) {
                    handleSearch();
                }
            }
            hideLoading();
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