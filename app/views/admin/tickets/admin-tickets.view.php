<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem]">

        <h1 class="text-4xl font-synebold">TICKETS</h1>

        <div class="relative flex mt-12 mb-4">
            <h1 class="mx-auto ml-0 text-2xl font-synemed text-grey2">Pending Tickets</h1>
            <div class="flex mr-6 w-fit">
                <input type="text" class="pl-4 mx-auto border border-black rounded-lg bg-white1">
                <button class="mx-auto ml-4 border rounded-lg border-grey2 bg-orange1 w-28 text-black1">Search</button>
            </div>
        </div>

        <table class="min-w-full overflow-hidden leading-normal border border-black rounded-xl">
            <thead>
                <tr>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Status</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Ticket ID</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Category</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Message</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">First Name</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Last Name</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">ID number</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Email</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                <tbody id="pending">

                    <!-- Add more rows as needed -->
                </tbody>
            </tbody>
        </table>

        <div class="relative flex mt-24 mb-4">
            <h1 class="mx-auto ml-0 text-2xl font-synemed text-grey2">Solved Tickets</h1>
            <div class="flex mr-6 w-fit">
                <input type="text" class="pl-4 mx-auto border border-black rounded-lg bg-white1">
                <button class="mx-auto ml-4 border rounded-lg border-grey2 bg-orange1 w-28 text-black1">Search</button>
            </div>
        </div>

        <table class="min-w-full overflow-hidden leading-normal border border-black rounded-xl">
            <thead>
                <tr>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Status</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Ticket ID</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Category</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Message</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">First Name</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Last Name</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">ID number</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Email</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                <tbody id="solved"> 
                    <!-- Add more rows as needed -->
                </tbody>
            </tbody>
        </table>

        <div class="relative flex mt-12 mb-4">
            <h1 class="mx-auto ml-0 text-2xl font-synemed text-grey2">Unresolved Tickets</h1>
            <div class="flex mr-6 w-fit">
                <input type="text" class="pl-4 mx-auto border border-black rounded-lg bg-white1">
                <button class="mx-auto ml-4 border rounded-lg border-grey2 bg-orange1 w-28 text-black1">Search</button>
            </div>
        </div>

        <table class="min-w-full overflow-hidden leading-normal border border-black rounded-xl">
            <thead>
                <tr>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Status</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Ticket ID</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Category</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Message</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">First Name</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Last Name</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">ID number</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Email</th>
                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                <tbody id="unresolved"> 
                    <!-- Add more rows as needed -->
                </tbody>
            </tbody>
        </table>
        

    </div>


    <script src="assets/js/fetch/fetch.js"></script>

    <script>
        const pending = document.getElementById('pending');
        const solved = document.getElementById('solved');
        const unresolved = document.getElementById('unresolved');

        let ticketsChecker = null;

        document.addEventListener('DOMContentLoaded', function() {
            fetchLatestData({
                "table": "ticket",
            },displayTickets ,3000);
        });

        function displayTickets(data){
            if (ticketsChecker === null || JSON.stringify(ticketsChecker) !== JSON.stringify(data)) {
                ticketsChecker = data;

                pending.innerHTML = '';
                solved.innerHTML = '';
                unresolved.innerHTML = '';
                // console.log(data);
                
                data.forEach(ticket => {
                    // console.log(data);
                    if (ticket.status === "solved") {
                        console.log('Solved:', data);
                        solved.innerHTML += `
                            <tr>
                                <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}" class="px-4 rounded-sm bg-green1 text-black1">Solved</a></td>
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
                        console.log('Unsolved:', data);
                        unresolved.innerHTML += `
                            <tr>
                                <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}" class="px-4 rounded-sm bg-grey1 text-black1">Unresolved</a></td>
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
                    } else  if (ticket.status == null) {
                        console.log('Pending:', data);
                        pending.innerHTML += `
                            <tr>
                                <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-view-ticket?id=${ticket.ticket_id}" class="px-4 rounded-sm bg-orange1 text-black1">Pending</a></td>
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
            }
        }
    </script>
</body>