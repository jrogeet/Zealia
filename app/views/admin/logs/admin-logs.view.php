<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">

    <?php view('partials/admin-nav.view.php'); ?>
    
    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem]">
        <div class="relative flex mt-12 mb-4">
                <h1 class="mx-auto ml-0 text-2xl font-synemed text-grey2">Logs</h1>
                <div class="flex mr-6 w-fit">
                    <input type="text" class="pl-4 mx-auto border border-black rounded-lg bg-white1">
                    <button class="mx-auto ml-4 border rounded-lg border-grey2 bg-orange1 w-28 text-black1">Search</button>
                </div>
            </div>
<!-- 
            <table class="min-w-full overflow-hidden leading-normal border border-black rounded-xl">
                <thead>
                    <tr>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Log ID</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">ID Number</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Category</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Action</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Status</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Session ID</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">IP Address</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Device Info</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Location</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Timestamp</th>
                    </tr>
                </thead>
                <tbody> -->
                    <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                    <!-- <tbody id="rcAccs"> 
                        <tr>
                            <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200">Log ID</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">ID number</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">Category</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">Action</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">Status</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">Session ID</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">IP address</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">Device info</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">Location</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">Timestamp</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200">Log ID</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">ID number</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">Category</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">Action</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">Status</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">Session ID</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">IP address</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">Device info</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">Location</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">Timestamp</td>
                        </tr> -->
                        <!-- Add more rows as needed -->
                    <!-- </tbody>
                </tbody>
            </table> -->

            <div class="border border-black rounded-xl overflow-hidden">
                <div class="relative">
                    <!-- Fixed Header -->
                    <div class="overflow-hidden">
                        <table class="w-full table-fixed">
                            <thead>
                                <tr>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Log ID</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">ID Number</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Category</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Action</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Status</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Session ID</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">IP Address</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Device Info</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Location</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Timestamp</th>
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

</body>