<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">

    <?php view('partials/admin-nav.view.php'); ?>

    <!-- content -->
    <div class="relative block w-full p-12 pl-[1%] min-w-[73rem]">

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
        <div class="relative flex w-full mt-14">
            <!-- left -->
            <div class="mx-auto ml-0 w-[50%] min-w-[37.5rem]">
                <h2 class="mb-4 text-xl text-left font-synebold text-grey2">Recently Created Accounts</h2>
                <div class="container mx-auto my-6 mr-2 overflow-hidden bg-white border border-black rounded-lg shadow-lg">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                            <th class="px-1 py-3 pl-2 text-xs font-semibold tracking-wider text-left uppercase border-l border-r border-black bg-blue3 text-white1">School No.</th>
                            <th class="px-1 py-3 pl-2 text-xs font-semibold tracking-wider text-left uppercase border-l border-r border-black bg-blue3 text-white1">Name</th>
                            <th class="px-1 py-3 pl-2 text-xs font-semibold tracking-wider text-left uppercase border-l border-r border-black bg-blue3 text-white1">Email</th>
                            <th class="px-1 py-3 pl-2 text-xs font-semibold tracking-wider text-left uppercase border-l border-r border-black bg-blue3 text-white1">Type</th>
                            <th class="px-1 py-3 pl-2 text-xs font-semibold tracking-wider text-left uppercase border-l border-r border-black bg-blue3 text-white1">Timestamp</th>
                            <th class="px-1 py-3 pl-2 text-xs font-semibold tracking-wider text-left uppercase border-l border-r border-black bg-blue3 text-white1">Activation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                            <tbody id="rcAccs">
                            <?php foreach($recentAccounts as $account) {?>  
                                <tr>
                                    <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-account-edit?id=<?= $account['school_id'] ?>"><?= $account['school_id'] ?></a></td>
                                    <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-account-edit?id=<?= $account['school_id'] ?>"><?= $account['l_name'] ?>, <?= $account['f_name'] ?></a></td>
                                    <td class="px-1 text-center py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black truncate max-w-[8rem]"><a href="/admin-account-edit?id=<?= $account['school_id'] ?>"><?= $account['email'] ?></a></td>
                                    <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-account-edit?id=<?= $account['school_id'] ?>"><?= $account['account_type'] ?></a></td>
                                    <td class="px-1 text-center py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black truncate max-w-[8rem]"><a href="/admin-account-edit?id=<?= $account['school_id'] ?>"><?= $account['daysAgo'] ?> days, <?= $account['hoursAgo'] ?> hours, <?= $account['minutesAgo'] ?> minutes ago</a></td>
                                    <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200">
                                        <a href="/admin-account-edit?id=<?= $account['school_id'] ?>">
                                        <?php if(isset($account['account_activation_hash'])): ?>
                                                Not Yet Activated
                                        <?php else:?>
                                                Activated
                                        <?php endif; ?>
                                        </a>
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
                <h2 class="mb-4 text-xl text-left font-synebold text-grey2">Recently Created Rooms</h2>
                <div class="container mx-auto my-6 ml-2 overflow-hidden bg-white border border-black rounded-lg shadow-lg">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                            <th class="px-1 py-3 pl-4 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Room ID</th>
                            <th class="px-1 py-3 pl-4 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Room Name</th>
                            <th class="px-1 py-3 pl-4 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Instructor</th>
                            <th class="px-1 py-3 pl-4 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Instructor ID</th>
                            <th class="px-1 py-3 pl-4 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Room Code</th>
                            <th class="px-1 py-3 pl-4 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                            <tbody id="rcRoom"> 
                            <?php foreach($recentRooms as $room) { ?>
                                <tr>
                                    <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-room-edit?room_id=<?= $room['room_id'] ?>"><?= $room['room_id'] ?></a></td>
                                    <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-room-edit?room_id=<?= $room['room_id'] ?>"><?= $room['room_name'] ?></a></td>
                                    <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200">
                                        <a href="/admin-room-edit?room_id=<?= $room['room_id'] ?>">
                                        <?php foreach($professors as $professor) { ?>
                                            <?php if($professor['school_id'] == $room['school_id']) { ?>
                                                <?= $professor['f_name'] . ' ' . $professor['l_name'] ?>
                                            <?php } ?>
                                        <?php } ?>
                                        </a>
                                    </td>
                                    <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-room-edit?room_id=<?= $room['room_id'] ?>"><?= $room['school_id'] ?></a></td>
                                    <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-room-edit?room_id=<?= $room['room_id'] ?>"><?= $room['room_code'] ?></a></td>
                                    <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-room-edit?room_id=<?= $room['room_id'] ?>"><?= $room['daysAgo'] ?> days, <?= $room['hoursAgo'] ?> hours, <?= $room['minutesAgo'] ?> minutes ago</a></td>
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