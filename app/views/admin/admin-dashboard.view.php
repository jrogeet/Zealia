<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg">

    <?php view('partials/admin-nav.view.php'); ?>

    <!-- content -->
    <div class="relative block w-[85%] p-12">

        <!-- greeting -->
        <h1 class="text-4xl">Welcome back,</h1>
        <div class="flex">
            <h1 class="text-4xl">Admin</h1><h1 class="ml-2 text-4xl" id="name">Renzo</h1>
        </div>
    
        <!-- counter -->
        <div class="flex w-full mt-8">

            <div class="mx-auto ml-0 border border-black rounded-2xl h-52 w-[24%] bg-orange1 p-4">
                <h1 class="text-lg font-synemed text-grey-200">Total no. of</h1>
                <h1 class="text-lg font-synemed text-grey-200">Users:</h1>
                <h1 class="text-right text-[6.5rem] font-synebold -mt-8" id="userCount">999</h1>
            </div>

            <div class="mx-auto border border-black rounded-2xl h-52 w-[24%] bg-blue2 p-4">
                <h1 class="text-lg font-synemed text-grey-200">Total no. of</h1>
                <h1 class="text-lg font-synemed text-grey-200">Students:</h1>
                <h1 class="text-right text-[6.5rem] font-synebold -mt-8" id="studCount">999</h1>
            </div>

            <div class="mx-auto border border-black rounded-2xl h-52 w-[24%] bg-blue2 p-4">
                <h1 class="text-lg font-synemed text-grey-200">Total no. of</h1>
                <h1 class="text-lg font-synemed text-grey-200">Instructors:</h1>
                <h1 class="text-right text-[6.5rem] font-synebold -mt-8" id="insCount">999</h1>
            </div>

            <div class="mx-auto mr-0 border border-black rounded-2xl h-52 w-[24%] bg-white2 p-4">
                <h1 class="text-lg font-synemed text-grey-200">Total no. of</h1>
                <h1 class="text-lg font-synemed text-grey-200">Rooms:</h1>
                <h1 class="text-right text-[6.5rem] font-synebold -mt-8" id="roomCount">999</h1>
            </div>
    
        </div>

        <!-- lists -->
        <div class="flex mt-14">
            <!-- left -->
            <div class="mx-auto ml-0 w-[97%]">
                <h2 class="text-xl font-synebold text-grey2 mb-4 text-left">Recently Created Accounts</h2>
                <div class="container mx-auto my-6 bg-white shadow-lg rounded-lg border border-black mr-2 overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                            <th class="px-1 pl-4 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">School No.</th>
                            <th class="px-1 pl-4 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Name</th>
                            <th class="px-1 pl-4 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Email</th>
                            <th class="px-1 pl-4 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Type</th>
                            <th class="px-1 pl-4 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Timestamp</th>
                            <th class="px-1 pl-4 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Activation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                            <tbody id="rcAccs"> 
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">12345</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">John Doe</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">john.doe@example.com</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Student</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">2024-09-14 14:36</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Activated</td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            

            <!-- Right -->
            <div class="mx-auto mr-0 w-[97%]">
                <h2 class="text-xl font-synebold text-grey2 mb-4 text-left">Recently Created Rooms</h2>
                <div class="container mx-auto my-6 bg-white shadow-lg rounded-lg border border-black ml-2 overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                            <th class="px-1 pl-4 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Room ID</th>
                            <th class="px-1 pl-4 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Room Name</th>
                            <th class="px-1 pl-4 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Instructor</th>
                            <th class="px-1 pl-4 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Instructor ID</th>
                            <th class="px-1 pl-4 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Room Code</th>
                            <th class="px-1 pl-4 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                            <tbody id="rcRoom"> 
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">12345</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">BSCS 4-y1-1</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">john.doe@example.com</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">12344321</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">1234</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">2024-09-14 14:36</td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>