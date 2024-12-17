<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-beige">
    <?php view('partials/admin-nav.view.php'); ?>

    <!-- Loading Indicator -->
    <div id="loadingIndicator" class="fixed inset-0 z-50 flex items-center justify-center bg-white bg-opacity-75">
        <div class="flex flex-col items-center">
            <div class="w-28 h-28 loader"></div> 
        </div>
    </div>

    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem] flex-1 transition-all duration-300 <?= $_SESSION['page-settings']['admin_nav_toggle'] ? 'ml-20' : 'ml-48' ?>" id="main-content">
        <!-- Stats Overview -->
        <div class="grid grid-cols-3 gap-6 mb-8">
            <div class="p-6 transition-all duration-150 bg-white rounded-xl shadow-inside3 hover:shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-grey2">Pending Tickets</p>
                        <h3 class="text-2xl font-clashbold text-orangeaccent" id="pendingCount">0</h3>
                    </div>
                    <div class="p-3 bg-orange-100 rounded-lg">
                        <svg class="w-6 h-6 text-orangeaccent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="p-6 transition-all duration-150 bg-white rounded-xl shadow-inside3 hover:shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-grey2">Unresolved Tickets</p>
                        <h3 class="text-2xl font-clashbold text-blue3" id="unresolvedCount">0</h3>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-blue3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="p-6 transition-all duration-150 bg-white rounded-xl shadow-inside3 hover:shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-grey2">Solved Tickets</p>
                        <h3 class="text-2xl font-clashbold text-greensuccess" id="solvedCount">0</h3>
                    </div>
                    <div class="p-3 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-greensuccess" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header and Filters -->
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-4xl font-clashbold text-blackpri">Tickets Management</h1>
            <div class="flex items-center gap-4">
                <!-- Category filter -->
                <div class="relative">
                    <select id="ticketCategory" class="w-40 pl-4 pr-8 py-2.5 bg-white border border-gray-200 rounded-lg appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue3 transition-all duration-150" onchange="handleCategoryFilter()">
                        <option value="">All Categories</option>
                        <option value="technical">Technical</option>
                        <option value="account">Account</option>
                        <option value="other">Other</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Sort dropdown -->
                <div class="relative">
                    <select id="sortBy" class="w-40 pl-4 pr-8 py-2.5 bg-white border border-gray-200 rounded-lg appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue3 transition-all duration-150" onchange="handleSort()">
                        <option value="">Sort by...</option>
                        <option value="date_desc">Newest First</option>
                        <option value="date_asc">Oldest First</option>
                        <option value="name_asc">Name (A-Z)</option>
                        <option value="name_desc">Name (Z-A)</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Search -->
                <div class="relative">
                    <input id="searchInput" type="text" placeholder="Search tickets..." 
                           class="w-64 pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue3 transition-all duration-150">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <button id="clearSearch" class="absolute inset-y-0 right-0 hidden px-3 text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Tickets Sections -->
        <div class="space-y-8">
            <!-- Pending Tickets Section -->
            <div class="overflow-hidden transition-all duration-150 bg-white rounded-xl shadow-inside3">
                <div class="p-4 border-b border-gray-200 bg-orangeaccent/10">
                    <h2 class="text-xl font-clashbold text-blackpri">Pending Tickets</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-white bg-blue3">
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Status</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Ticket ID</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Category</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Message</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">First Name</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Last Name</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">School ID</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Email</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Date</th>
                            </tr>
                        </thead>
                        <tbody id="pending" class="divide-y divide-gray-200">
                            <!-- Rows will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Unresolved Tickets Section -->
            <div class="overflow-hidden transition-all duration-150 bg-white rounded-xl shadow-inside3">
                <div class="p-4 border-b border-gray-200 bg-blue3/10">
                    <h2 class="text-xl font-clashbold text-blackpri">Unresolved Tickets</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-white bg-blue3">
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Status</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Ticket ID</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Category</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Message</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">First Name</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Last Name</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">School ID</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Email</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Date</th>
                            </tr>
                        </thead>
                        <tbody id="unresolved" class="divide-y divide-gray-200">
                            <!-- Rows will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Solved Tickets Section -->
            <div class="overflow-hidden transition-all duration-150 bg-white rounded-xl shadow-inside3">
                <div class="p-4 border-b border-gray-200 bg-greensuccess/10">
                    <h2 class="text-xl font-clashbold text-blackpri">Solved Tickets</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-white bg-blue3">
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Status</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Ticket ID</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Category</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Message</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">First Name</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Last Name</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">School ID</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Email</th>
                                <th class="px-5 py-3 text-sm text-left font-satoshimed">Date</th>
                            </tr>
                        </thead>
                        <tbody id="solved" class="divide-y divide-gray-200">
                            <!-- Rows will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/loading.js"></script> 
    <script src="assets/js/fetch/fetch.js"></script>
    <script>
        let isSearching = false;
        const pending = document.getElementById('pending');
        const solved = document.getElementById('solved');
        const unresolved = document.getElementById('unresolved');

        let ticketsChecker = null;
        let originalData = null;

        document.addEventListener('DOMContentLoaded', function() {
            startFetching();
        });

        function startFetching() {
            fetchLatestData({
                "table": "ticket",
            }, displayTickets, 3000);
        }

        function updateStats(data) {
            document.getElementById('pendingCount').textContent = data.filter(t => t.status === null).length;
            document.getElementById('unresolvedCount').textContent = data.filter(t => t.status === 'unresolved').length;
            document.getElementById('solvedCount').textContent = data.filter(t => t.status === 'solved').length;
        }

        function displayTickets(data) {
            if (ticketsChecker === null || JSON.stringify(ticketsChecker) !== JSON.stringify(data)) {
                updateStats(data);
                originalData = JSON.parse(JSON.stringify(data)); // Store deep copy of original data
                
                let solvedCounter = 0;
                let unresolvedCounter = 0;
                let pendingCounter = 0;
                
                ticketsChecker = data;

                pending.innerHTML = '';
                solved.innerHTML = '';
                unresolved.innerHTML = '';
                console.log('All tickets: ' ,data);
                
                if (!isSearching) {
                    data.forEach(ticket => {
                        // console.log(data);
                        if (ticket.status === "solved") {
                            solvedCounter += 1;
                            console.log('Solved:', data.solved);
                            solved.innerHTML += `
                                <tr>
                                    <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}" class="px-4 rounded-sm bg-greensuccess text-black1">Solved</a></td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.ticket_id}</a></td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.category}</a></td>
                                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.message}</a></td>
                                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.f_name}</a></td>
                                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.l_name}</a></td>
                                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.school_id}</a></td>
                                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.email}</a></td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.ticket_date}</a></td>
                                </tr>
                            `;
                        } else if (ticket.status === "unresolved") {
                            unresolvedCounter += 1;
                            console.log('Unsolved:', data);
                            unresolved.innerHTML += `
                                <tr>
                                    <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}" class="px-4 rounded-sm bg-whitebord text-black1">Unresolved</a></td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.ticket_id}</a></td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.category}</a></td>
                                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.message}</a></td>
                                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.f_name}</a></td>
                                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.l_name}</a></td>
                                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.school_id}</a></td>
                                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.email}</a></td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.ticket_date}</a></td>
                                </tr>
                            `;
                        } else if (ticket.status === null) {  
                            pendingCounter += 1;
                            console.log('Pending:', data);
                            pending.innerHTML += `
                                <tr>
                                    <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}" class="px-4 rounded-sm bg-orangeaccent text-black1">Pending</a></td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.ticket_id}</a></td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.category}</a></td>
                                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.message}</a></td>
                                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.f_name}</a></td>
                                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.l_name}</a></td>
                                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.school_id}</a></td>
                                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.email}</a></td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.ticket_date}</a></td>
                                </tr>
                            `;
                        }
                    });
                } else {
                    data.solved.forEach(ticket => {
                        solved.innerHTML += `
                            <tr>
                                <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}" class="px-4 rounded-sm bg-greensuccess text-black1">Solved</a></td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.ticket_id}</a></td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.category}</a></td>
                                <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.message}</a></td>
                                <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.f_name}</a></td>
                                <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.l_name}</a></td>
                                <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.school_id}</a></td>
                                <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.email}</a></td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.ticket_date}</a></td>
                            </tr>
                        `;
                    });

                    data.unresolved.forEach(ticket => {
                        unresolved.innerHTML += `
                            <tr>
                                <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}" class="px-4 rounded-sm bg-whitebord text-black1">Unresolved</a></td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.ticket_id}</a></td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.category}</a></td>
                                <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.message}</a></td>
                                <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.f_name}</a></td>
                                <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.l_name}</a></td>
                                <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.school_id}</a></td>
                                <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.email}</a></td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.ticket_date}</a></td>
                            </tr>
                        `;
                    });

                    data.pending.forEach(ticket => {
                        pending.innerHTML += `
                            <tr>
                                <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}" class="px-4 rounded-sm bg-orangeaccent text-black1">Pending</a></td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.ticket_id}</a></td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.category}</a></td>
                                <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.message}</a></td>
                                <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.f_name}</a></td>
                                <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.l_name}</a></td>
                                <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.school_id}</a></td>
                                <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.email}</a></td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}">${ticket.ticket_date}</a></td>
                            </tr>
                        `;
                    });
                }

                console.log(solvedCounter, unresolvedCounter, pendingCounter);

                if (solvedCounter === 0) {
                    solved.innerHTML = `
                        <tr>
                            <td colspan="9"  class="px-5 py-5 text-xl text-center bg-white rounded-b-xl text-whitebord">Empty</td>
                        </tr>
                    `;
                }

                if (unresolvedCounter === 0) {
                    unresolved.innerHTML = `
                        <tr>
                            <td colspan="9"  class="px-5 py-5 text-xl text-center bg-white rounded-b-xl text-whitebord">Empty</td>
                        </tr>
                    `;
                }

                if (pendingCounter === 0) {
                    pending.innerHTML = `
                        <tr>
                            <td colspan="9"  class="px-5 py-5 text-xl text-center bg-white rounded-b-xl text-whitebord">Empty</td>
                        </tr>
                    `;
                }
            }
            hideLoading();
        }

        const searchInput = document.getElementById('searchInput');
        const clearSearch = document.getElementById('clearSearch');
        const searchForm = document.getElementById('searchTicketForm');

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

            isSearching = false;
            fetchLatestData({
                "table": "ticket",
            }, displayTickets, 3000);
        });

        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase().trim();
            checkSearch();
            
            if (searchTerm === '') {
                isSearching = false;
                clearSearch.click(); // Reset to original data
                return;
            }

            isSearching = true;
            if (originalData) {
                const filteredData = originalData.filter(ticket => {
                    return (
                        ticket.ticket_id.toLowerCase().includes(searchTerm) ||
                        ticket.category.toLowerCase().includes(searchTerm) ||
                        ticket.message.toLowerCase().includes(searchTerm) ||
                        ticket.f_name.toLowerCase().includes(searchTerm) ||
                        ticket.l_name.toLowerCase().includes(searchTerm) ||
                        ticket.school_id.toLowerCase().includes(searchTerm) ||
                        ticket.email.toLowerCase().includes(searchTerm)
                    );
                });
                displayTickets(filteredData);
            }
        });

        function handleSort() {
            const sortBy = document.getElementById('sortBy').value;
            if (!originalData || !sortBy) return;

            const sortedData = [...originalData].sort((a, b) => {
                switch(sortBy) {
                    case 'date_asc':
                        return new Date(a.ticket_date) - new Date(b.ticket_date);
                    case 'date_desc':
                        return new Date(b.ticket_date) - new Date(a.ticket_date);
                    case 'name_asc':
                        return (a.f_name + a.l_name).localeCompare(b.f_name + b.l_name);
                    case 'name_desc':
                        return (b.f_name + b.l_name).localeCompare(a.f_name + a.l_name);
                    default:
                        return 0;
                }
            });

            displayTickets(sortedData);
        }

        function clearSort() {
            document.getElementById('sortBy').value = '';
            document.getElementById('clearSort').classList.add('hidden');
            if (originalData) {
                displayTickets(originalData);
            }
            startFetching();
        }

        function handleCategoryFilter() {
            const category = document.getElementById('ticketCategory').value.toLowerCase();
            
            if (!originalData) return;

            if (category === '') {
                displayTickets(originalData);
                return;
            }

            const filteredData = originalData.filter(ticket => 
                ticket.category.toLowerCase() === category
            );
            displayTickets(filteredData);
        }

        function applyDateFilter() {
            const startDate = new Date(document.getElementById('startDate').value);
            const endDate = new Date(document.getElementById('endDate').value);
            const tables = [pending, solved, unresolved];
            
            if (startDate && endDate) {
                clearInterval(intervalID); // Stop fetching
                document.getElementById('clearDateFilter').classList.remove('hidden');
                
                tables.forEach(table => {
                    const rows = Array.from(table.getElementsByTagName('tr'));
                    rows.forEach(row => {
                        const rowDate = new Date(row.cells[8].textContent); // Timestamp column
                        row.style.display = (rowDate >= startDate && rowDate <= endDate) ? '' : 'none';
                    });
                });
            }
        }

        function clearDateFilter() {
            // Clear date inputs
            document.getElementById('startDate').value = '';
            document.getElementById('endDate').value = '';
            document.getElementById('clearDateFilter').classList.add('hidden');
            
            // Show all rows
            const tables = [pending, solved, unresolved];
            tables.forEach(table => {
                const rows = Array.from(table.getElementsByTagName('tr'));
                rows.forEach(row => row.style.display = '');
            });
            
            // Restart fetching
            startFetching();
        }

        function exportTickets() {
            const tables = [pending, solved, unresolved];
            const allTickets = [];
            
            tables.forEach(table => {
                const rows = Array.from(table.getElementsByTagName('tr'))
                    .filter(row => row.style.display !== 'none');
                    
                rows.forEach(row => {
                    allTickets.push({
                        status: row.cells[0].textContent,
                        ticketId: row.cells[1].textContent,
                        category: row.cells[2].textContent,
                        message: row.cells[3].textContent,
                        firstName: row.cells[4].textContent,
                        lastName: row.cells[5].textContent,
                        idNumber: row.cells[6].textContent,
                        email: row.cells[7].textContent,
                        timestamp: row.cells[8].textContent
                    });
                });
            });

            // Convert to CSV and download
            const headers = ['Status', 'Ticket ID', 'Category', 'Message', 'First Name', 'Last Name', 'ID Number', 'Email', 'Timestamp'];
            const csvContent = [
                headers.join(','),
                ...allTickets.map(ticket => Object.values(ticket).map(v => `"${v}"`).join(','))
            ].join('\n');

            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = `tickets_export_${new Date().toISOString().split('T')[0]}.csv`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>

<script>
    // Adjust main content margin when sidebar is toggled
    document.getElementById('toggle-sidebar').addEventListener('click', function() {
        const mainContent = document.getElementById('main-content');
        mainContent.classList.toggle('ml-48');
        mainContent.classList.toggle('ml-20');
    });
</script>
</body>