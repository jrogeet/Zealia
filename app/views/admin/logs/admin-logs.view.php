<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">

    <?php view('partials/admin-nav.view.php'); ?>
    
    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem]">
        <div class="relative flex mb-4 mt-12">
                <h1 class="mx-auto font-synemed text-grey2 ml-0 text-2xl">Logs</h1>
                <div class="flex w-fit mr-6">
                    <input type="text" class="border border-black rounded-lg mx-auto bg-white1 pl-4">
                    <button class="mx-auto border border-grey2 rounded-lg bg-orange1 w-28 ml-4 text-black1">Search</button>
                </div>
            </div>

            <table class="min-w-full leading-normal border border-black rounded-xl overflow-hidden">
                <thead>
                    <tr>
                        <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Log ID</th>
                        <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">ID Number</th>
                        <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Category</th>
                        <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Action</th>
                        <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Status</th>
                        <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Session ID</th>
                        <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">IP Address</th>
                        <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Device Info</th>
                        <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Location</th>
                        <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                    <tbody id="rcAccs"> 
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black text-center">Log ID</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">ID number</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Category</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Action</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Status</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Session ID</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">IP address</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Device info</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Location</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Timestamp</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black text-center">Log ID</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">ID number</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Category</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Action</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Status</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Session ID</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">IP address</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Device info</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Location</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Timestamp</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </tbody>
            </table>
        </div>

</body>