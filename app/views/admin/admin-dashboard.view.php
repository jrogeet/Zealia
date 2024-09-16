<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">

    <?php view('partials/admin-nav.view.php'); ?>

    <!-- content -->
    <div class="relative block w-full p-12 pl-[1%] min-w-[78rem]">

        <!-- greeting -->
        <h1 class="text-4xl">Welcome back,</h1>
        <div class="flex">
            <h1 class="text-4xl">Admin</h1><h1 class="ml-2 text-4xl" id="name"><?= $_SESSION['user']['f_name'] ?></h1>
        </div>
    
        <!-- counter -->
        <div class="flex w-full mt-8">

            <a href="/admin-accounts" class="mx-auto ml-0 border border-black rounded-2xl h-52 w-[24%] bg-orange1 p-4">
                <h1 class="text-lg font-synemed text-grey-200">Total no. of</h1>
                <h1 class="text-lg font-synemed text-grey-200">Users:</h1>
                <h1 class="text-right text-[6.5rem] font-synebold -mt-8" id="userCount"><?= count($accounts) ?></h1>
            </a>

            <a href="/admin-accounts" class="mx-auto border border-black rounded-2xl h-52 w-[24%] bg-blue2 p-4">
                <h1 class="text-lg font-synemed text-grey-200">Total no. of</h1>
                <h1 class="text-lg font-synemed text-grey-200">Students:</h1>
                <h1 class="text-right text-[6.5rem] font-synebold -mt-8" id="studCount"><?= count($students) ?> </h1>
            </a>

            <a href="/admin-accounts" class="mx-auto border border-black rounded-2xl h-52 w-[24%] bg-blue2 p-4">
                <h1 class="text-lg font-synemed text-grey-200">Total no. of</h1>
                <h1 class="text-lg font-synemed text-grey-200">Instructors:</h1>
                <h1 class="text-right text-[6.5rem] font-synebold -mt-8" id="insCount"><?= count($professors) ?></h1>
            </a>

            <a href="/admin-rooms" class="mx-auto mr-0 border border-black rounded-2xl h-52 w-[24%] bg-white2 p-4">
                <h1 class="text-lg font-synemed text-grey-200">Total no. of</h1>
                <h1 class="text-lg font-synemed text-grey-200">Rooms:</h1>
                <h1 class="text-right text-[6.5rem] font-synebold -mt-8" id="roomCount"><?= count($rooms) ?></h1>
            </a>
    
        </div>

        <!-- lists -->
        <div class="relative flex mt-14 w-full">
            <!-- left -->
            <div class="mx-auto ml-0 w-[50%] min-w-[37.5rem]">
                <h2 class="text-xl font-synebold text-grey2 mb-4 text-left">Recently Created Accounts</h2>
                <div class="container mx-auto my-6 bg-white shadow-lg rounded-lg border border-black mr-2 overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                            <th class="px-0 pl-2 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">School No.</th>
                            <th class="px-0 pl-2 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Name</th>
                            <th class="px-0 pl-2 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Email</th>
                            <th class="px-0 pl-2 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Type</th>
                            <th class="px-0 pl-2 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Timestamp</th>
                            <th class="px-0 pl-2 py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Activation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                            <tbody id="rcAccs">
                            <?php foreach($recentAccounts as $account) {?>  
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $account['school_id'] ?></td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $account['l_name'] ?>, <?= $account['f_name'] ?></td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $account['email'] ?></td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $account['account_type'] ?></td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $account['daysAgo'] ?> days, <?= $account['hoursAgo'] ?> hours, <?= $account['minutesAgo'] ?> minutes ago</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">
                                        <?php if(isset($account['account_activation_hash'])): ?>
                                                Not Yet Activated
                                        <?php else:?>
                                                Activated
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php }?>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            

            <!-- Right -->
            <div class="mx-auto mr-0 w-[50%] min-w-[37.5rem]">
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
                            <?php foreach($recentRooms as $room) { ?>
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $room['room_id'] ?></td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $room['room_name'] ?></td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">
                                    <?php foreach($professors as $professor) { ?>
                                        <?php if($professor['school_id'] == $room['school_id']) { ?>
                                            <?= $professor['f_name'] . ' ' . $professor['l_name'] ?>
                                        <?php } ?>
                                    <?php } ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $room['school_id'] ?></td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $room['room_code'] ?></td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $room['daysAgo'] ?> days, <?= $room['hoursAgo'] ?> hours, <?= $room['minutesAgo'] ?> minutes ago</td>
                                </tr>
                            <?php } ?>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>