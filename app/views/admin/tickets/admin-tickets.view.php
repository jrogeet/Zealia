<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem]">

        <h1 class="font-synebold text-4xl">TICKETS</h1>

        <div class="relative flex mb-4 mt-12">
            <h1 class="mx-auto font-synemed text-grey2 ml-0 text-2xl">Pending Tickets</h1>
            <div class="flex w-fit mr-6">
                <input type="text" class="border border-black rounded-lg mx-auto bg-white1 pl-4">
                <button class="mx-auto border border-grey2 rounded-lg bg-orange1 w-28 ml-4 text-black1">Search</button>
            </div>
        </div>

        <table class="min-w-full leading-normal border border-black rounded-xl overflow-hidden">
            <thead>
                <tr>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Status</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Ticket ID</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Category</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Message</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">First Name</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Last Name</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">ID number</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Email</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                <tbody id="rcAccs"> 
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black text-center"><a href="#" class="bg-orange1 text-black1 px-4 rounded-sm">Pending</a></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">3</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Account</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Forgot...</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Nikocado</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Abogado</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">1234</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">nfabogado@student.fatima.edu.ph</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">2024-09-14 14:36</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black text-center"><a href="#" class="bg-orange1 text-black1 px-4 rounded-sm">Pending</a></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">4</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Account</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Forgot...</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Nikocado</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Abogado</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">1234</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">nfabogado@student.fatima.edu.ph</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">2024-09-14 14:36</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </tbody>
        </table>

        <div class="relative flex mb-4 mt-24">
            <h1 class="mx-auto font-synemed text-grey2 ml-0 text-2xl">Pending Tickets</h1>
            <div class="flex w-fit mr-6">
                <input type="text" class="border border-black rounded-lg mx-auto bg-white1 pl-4">
                <button class="mx-auto border border-grey2 rounded-lg bg-orange1 w-28 ml-4 text-black1">Search</button>
            </div>
        </div>

        <table class="min-w-full leading-normal border border-black rounded-xl overflow-hidden">
            <thead>
                <tr>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Status</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Ticket ID</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Category</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Message</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">First Name</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Last Name</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">ID number</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Email</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                <tbody id="rcAccs"> 
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black text-center"><a href="#" class="bg-green1 text-black1 px-4 rounded-sm">Solved</a></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">2</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Account</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Forgot...</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Nikocado</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Abogado</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">1234</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">nfabogado@student.fatima.edu.ph</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">2024-09-14 14:36</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </tbody>
        </table>

        <div class="relative flex mb-4 mt-12">
            <h1 class="mx-auto font-synemed text-grey2 ml-0 text-2xl">Unresolved Tickets</h1>
            <div class="flex w-fit mr-6">
                <input type="text" class="border border-black rounded-lg mx-auto bg-white1 pl-4">
                <button class="mx-auto border border-grey2 rounded-lg bg-orange1 w-28 ml-4 text-black1">Search</button>
            </div>
        </div>

        <table class="min-w-full leading-normal border border-black rounded-xl overflow-hidden">
            <thead>
                <tr>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Status</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Ticket ID</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Category</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Message</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">First Name</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Last Name</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">ID number</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Email</th>
                    <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                <tbody id="rcAccs"> 
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black text-center"><a href="#" class="bg-red1 text-white1 px-4 rounded-sm">Unresolved</a></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">1</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Account</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Forgot...</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Nikocado</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Abogado</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">1234</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">nfabogado@student.fatima.edu.ph</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">2024-09-14 14:36</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </tbody>
        </table>
        

    </div>

</body>