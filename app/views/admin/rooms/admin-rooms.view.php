<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>
    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem]">

        <div class="relative flex mb-12">
            <h1 class="mx-auto font-synebold ml-6 text-3xl">Room List</h1>
            <div class="flex w-fit mr-6">
                <input type="text" class="border border-black rounded-lg mx-auto bg-white1 pl-4">
                <button class="mx-auto border border-grey2 rounded-lg bg-orange1 w-28 ml-4 text-black1">Search</button>
            </div>
        </div>

        <table class="table-fixed min-w-full leading-normal border border-black rounded-xl overflow-hidden">
            <thead>
                <tr>
                <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Edit</th>
                <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Room ID</th>
                <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Room Name</th>
                <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Instructor Name</th>
                <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Instructor ID</th>
                <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Room Code</th>
                <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Time Created</th>
                </tr>
            </thead>
            <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
            <tbody> 
                <?php foreach($rooms as $room): ?>
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black text-center"><a href="/admin-room-edit?room_id=<?= $room['room_id'] ?>" class="bg-blue3 text-white1 px-4 py-2 rounded-sm">EDIT</a></td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $room['room_id'] ?></td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black truncate"><?= $room['room_name'] ?></td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black truncate"><?= $room['f_name'] ?> <?= $room['l_name'] ?></td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $room['school_id'] ?></td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $room['room_code'] ?></td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $room['created_date'] ?></td>
                </tr>
                <?php endforeach; ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
    
</body>