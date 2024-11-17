<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem]">

        <h1 class="text-3xl text-grey2 font-satoshimed mb-12">Edit <span class="text-black1 truncate"><?= $allRoomInfo['room_name'] ?></span> Information</h1>
        
        <div class="flex">
            <div class="relative block w-[60%]">
                <div class="flex border border-black h-[40rem] rounded-2xl ml-12 p-6 pl-8">
                    <div class="block w-full my-auto">
                        <h1 class="text-grey2">Room Name</h1>
                        <input type="text" class="ml-0 w-full h-12 border border-grey2 rounded-lg bg-white pl-4" placeholder="<?= $allRoomInfo['room_name'] ?>"></input>
                        
                        <h1 class="text-grey2 mt-12">Change Instructor</h1>
                        <input type="text" class="ml-0 w-2/3 h-12 border border-grey2 rounded-lg bg-white pl-4" placeholder="<?= $allRoomInfo['school_id'] ?>"></input>
                        <h1 class="text-grey2 text-xs ml-2">Enter new Instructor's ID</h1>

                        <h1 class="text-grey2 mt-12">Room Code</h1>
                        <input type="text" class="ml-0 w-1/3 h-12 border border-grey2 rounded-lg bg-white pl-4" placeholder="<?= $allRoomInfo['room_code'] ?>"></input>
                    </div>
                </div>
            </div>
    
            <div class="relative block w-[30%] border border-black rounded-2xl ml-12 overflow-hidden">
                <h1 class="w-full h-10 bg-blue3 text-center text-white font-satoshimed pt-2">Students</h1>
                <div class="flex w-full h-12 border-b border-black p-1">
                    <input type="text" class="w-[74%] h-[98%] mx-auto border border-grey2 rounded-lg pl-2" placeholder="Enter ID number to add">
                    <button class="w-[24%] h-[98%] mx-auto bg-orangeaccent font-satoshimed text-black1 border border-grey2 rounded-lg">Add</button>
                </div>
                <?php foreach($roomStudents as $student): ?>    
                <div class="flex w-full h-fit border-b border-black p-2">
                    <div class="block w-2/3 mx-auto ml-2">
                        <h1 class="text-xl"><?= $student['l_name']?>, <?= $student['f_name']  ?></h1>
                        <h5 class="text-grey2 text-lg mb-4"><?= $student['school_id'] ?></h5>
                        <h5 class="text-grey2"><?= $student['email'] ?></h5>
                    </div>
                    <div>
                        <!-- di ko mapagana ung pic di nag lload -->
                        <button class="relative top-1/2 transform -translate-y-1/2 -translate-x-1/2 w-8 h-8 bg-red1 mx-auto text-3xl">X</button>
                        <!-- <img src="public\assets\images\icons\cross.png"> -->
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
    
            <div class="relative block w-[30%] border border-black rounded-2xl ml-12 overflow-hidden">
                <h1 class="w-full h-10 bg-blue3 text-center text-white font-satoshimed pt-2">Groups</h1>
                <?php foreach($decoded_roomGroups as $index => $group): ?>
                <div class="flex w-full h-fit border-b border-black p-2">
                    <div class="block w-2/3 mx-auto ml-2">
                        <h1 class="text-xl">Group <?= $index + 1 ?></h1>
                        <?php foreach($group as $member): ?>
                        <h5 class="text-grey2 text-sm mb-0 ml-4 "><?= $member[0] ?></h5>
                        <?php endforeach; ?>
                        <!-- Result & Role could also be added, name pa lang yung $member[0]-->
                    </div>
                    <div>
                        <!-- di ko mapagana ung pic di nag lload -->
                        <button class="relative top-1/2 transform -translate-y-1/2 -translate-x-1/2 w-8 h-8 bg-red1 mx-auto text-3xl">X</button>
                        <!-- <img src="public\assets\images\icons\cross.png"> -->
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="flex ml-12 mt-12">
            <button class="mx-auto w-20 h-12 border border-black1 bg-red1 px-12 text-white ml-0 rounded-xl">Delete Room</button>
            <button class="mx-auto w-20 h-12 border border-black1 bg-orangeaccent px-12 text-black1 mr-0 rounded-xl">Save Changes</button>
        </div>

    </div>

</body>