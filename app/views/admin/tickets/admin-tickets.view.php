<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-beige">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem]">
        <div class="flex justify-between mb-8">
            <h1 class="text-4xl font-clashbold">TICKETS</h1>
            <div class="flex gap-4">
                <div class="flex items-center">
                    <select id="sortBy" class="pl-4 mx-auto bg-white border border-black rounded-lg" onchange="handleSort()">
                        <option value="">Sort by...</option>
                        <option value="date_asc">Date (Oldest First)</option>
                        <option value="date_desc">Date (Newest First)</option>
                        <option value="name_asc">Name (A-Z)</option>
                        <option value="name_desc">Name (Z-A)</option>
                        <option value="id_asc">Ticket ID (Ascending)</option>
                        <option value="id_desc">Ticket ID (Descending)</option>
                    </select>
                    <button id="clearSort" class="hidden w-10 mx-2 text-xl text-red1" onclick="clearSort()">X</button>
                </div>
                <!-- Existing search form -->
                <form id="searchTicketForm" method="POST" action="/admin-tickets" class="flex mr-6 w-fit">
                    <input id="searchInput" oninput="checkSearch();" name="search_input" type="text" placeholder="Search..." class="pl-4 mx-auto bg-white border border-black rounded-lg" required>
                    <button id="clearSearch" class="hidden w-10 mx-2 text-xl text-red1">X</button>
                    <button type="submit" class="mx-auto ml-4 border rounded-lg border-grey2 bg-orangeaccent w-28 text-black1">Search</button>
                </form>
            </div>
        </div>

        <div id="searchResultsHead" class="hidden mt-4">
            <h2 class="text-xl font-satoshimed text-grey2">Search Results for: <span id="searchTerm"></span></h2>
        </div>

        <div class="relative flex mt-12 mb-4">
            <h1 class="mx-auto ml-0 text-2xl font-satoshimed text-grey2">Pending Tickets</h1>
        </div>

        <div class="overflow-hidden border border-black rounded-b-xl">
            <div class="relative">
                <!-- Fixed Header -->
                <div class="overflow-hidden">
                    <table class="w-full table-fixed">
                        <thead>
                            <tr>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Status</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Ticket ID</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Category</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Message</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">First Name</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Last Name</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">ID number</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Email</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Timestamp</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-- Scrollable Body -->
                <div class="overflow-y-auto max-h-[31.25rem]">
                    <table class="w-full table-fixed">
                        <tbody id="pending">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="relative flex mt-24 mb-4 ">
            <h1 class="mx-auto ml-0 text-2xl font-satoshimed text-grey2">Solved Tickets</h1>
        </div>

        <div class="overflow-hidden border border-black rounded-b-xl">
            <div class="relative">
                <!-- Fixed Header -->
                <div class="overflow-hidden">
                    <table class="w-full table-fixed">
                        <thead>
                            <tr>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Status</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Ticket ID</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Category</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Message</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">First Name</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Last Name</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">ID number</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Email</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Timestamp</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-- Scrollable Body -->
                <div class="overflow-y-auto max-h-[31.25rem]">
                    <table class="w-full table-fixed">
                        <tbody id="solved">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="relative flex mt-12 mb-4">
            <h1 class="mx-auto ml-0 text-2xl font-satoshimed text-grey2">Unresolved Tickets</h1>
        </div>

        <div class="overflow-hidden border border-black rounded-b-xl">
            <div class="relative">
                <!-- Fixed Header -->
                <div class="overflow-hidden">
                    <table class="w-full table-fixed">
                        <thead>
                            <tr>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Status</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Ticket ID</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Category</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Message</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">First Name</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Last Name</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">ID number</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Email</th>
                                <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Timestamp</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-- Scrollable Body -->
                <div class="overflow-y-auto max-h-[31.25rem]">
                    <table class="w-full table-fixed">
                        <tbody id="unresolved">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


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

        function displayTickets(data) {
            if (ticketsChecker === null || JSON.stringify(ticketsChecker) !== JSON.stringify(data)) {
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
                        } else if (ticket.status === "pending") {  
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

        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (searchInput && searchInput.value !== '') {
                const searchTerm = searchInput.value.toLowerCase();
                isSearching = true;
                
                if (searchTerm) {
                    fetch(`/api/search?search=${searchTerm}`, {
                        method: 'POST',
                        body: new URLSearchParams('searchInput=' + searchTerm + '&currentPage=admin_tickets')
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data) {
                            clearInterval(intervalID);
                            displayTickets(data);

                            show('searchResultsHead');
                            document.getElementById('searchTerm').innerHTML = searchTerm;
                        } else {
                            console.log('no matching tickets found');
                        }
                    })
                    .catch(e => {
                        console.error('Error: ' + e);
                    });
                } else {
                    fetchLatestData({
                        "table": "ticket",
                    }, displayTickets, 3000);
                }
            }
        });

        function handleSort() {
            const sortBy = document.getElementById('sortBy').value;
            if (sortBy) {
                clearInterval(intervalID);
                document.getElementById('clearSort').classList.remove('hidden');
            }
            
            const tables = [pending, solved, unresolved];
            
            tables.forEach(table => {
                const rows = Array.from(table.getElementsByTagName('tr'));
                
                // Skip empty state rows
                if (rows.length === 1 && rows[0].cells.length === 1) return;

                rows.sort((a, b) => {
                    if (sortBy === 'date_asc' || sortBy === 'date_desc') {
                        const dateA = new Date(a.cells[8].textContent);
                        const dateB = new Date(b.cells[8].textContent);
                        return sortBy === 'date_asc' ? dateA - dateB : dateB - dateA;
                    } else if (sortBy === 'name_asc' || sortBy === 'name_desc') {
                        const nameA = (a.cells[2].textContent + a.cells[3].textContent).toLowerCase();
                        const nameB = (b.cells[2].textContent + b.cells[3].textContent).toLowerCase();
                        return sortBy === 'name_asc' 
                            ? nameA.localeCompare(nameB)
                            : nameB.localeCompare(nameA);
                    } else if (sortBy === 'id_asc' || sortBy === 'id_desc') {
                        const idA = parseInt(a.cells[1].textContent);
                        const idB = parseInt(b.cells[1].textContent);
                        return sortBy === 'id_asc' ? idA - idB : idB - idA;
                    }
                    return 0;
                });

                // Clear and repopulate table
                table.innerHTML = '';
                rows.forEach(row => table.appendChild(row));
            });
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
            const tables = [pending, solved, unresolved];
            
            tables.forEach(table => {
                const rows = Array.from(table.getElementsByTagName('tr'));
                rows.forEach(row => {
                    const ticketCategory = row.cells[2].textContent.toLowerCase();
                    row.style.display = !category || ticketCategory === category ? '' : 'none';
                });
            });
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
</body>