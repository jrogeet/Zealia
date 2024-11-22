<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-beige">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem]"   transition-all duration-300 <?= $_SESSION['page-settings']['admin_nav_toggle'] ? 'ml-20' : 'ml-48' ?>" id="main-content">

        <h1 class="mb-12 text-3xl text-grey2 font-satoshimed">Edit <span class="truncate text-black1"><?= $allRoomInfo['room_name'] ?></span> Information</h1>
        
        <div class="flex">
            <div class="relative block w-[60%]">
                <div class="flex border border-black h-[40rem] rounded-2xl ml-12 p-6 pl-8">
                    <div class="block w-full my-auto">
                        <h1 class="text-grey2">Room Name</h1>
                        <input type="text" class="w-full h-12 pl-4 ml-0 bg-white border rounded-lg border-grey2" placeholder="<?= $allRoomInfo['room_name'] ?>"></input>
                        
                        <h1 class="mt-12 text-grey2">Change Instructor</h1>
                        <input type="text" class="w-2/3 h-12 pl-4 ml-0 bg-white border rounded-lg border-grey2" placeholder="<?= $allRoomInfo['school_id'] ?>"></input>
                        <h1 class="ml-2 text-xs text-grey2">Enter new Instructor's ID</h1>

                        <h1 class="mt-12 text-grey2">Room Code</h1>
                        <input type="text" class="w-1/3 h-12 pl-4 ml-0 bg-white border rounded-lg border-grey2" placeholder="<?= $allRoomInfo['room_code'] ?>"></input>
                    </div>
                </div>
            </div>
    
            <div class="relative block w-[30%] border border-black rounded-2xl ml-12 overflow-hidden">
                <h1 class="w-full h-10 pt-2 text-center text-white bg-blue3 font-satoshimed">Students</h1>
                <div class="flex w-full h-12 p-1 border-b border-black">
                    <input type="text" class="w-[74%] h-[98%] mx-auto border border-grey2 rounded-lg pl-2" placeholder="Enter ID number to add">
                    <button class="w-[24%] h-[98%] mx-auto bg-orangeaccent font-satoshimed text-black1 border border-grey2 rounded-lg">Add</button>
                </div>
                <?php foreach($roomStudents as $student): ?>    
                <div class="flex w-full p-2 border-b border-black h-fit">
                    <div class="block w-2/3 mx-auto ml-2">
                        <h1 class="text-xl"><?= $student['l_name']?>, <?= $student['f_name']  ?></h1>
                        <h5 class="mb-4 text-lg text-grey2"><?= $student['school_id'] ?></h5>
                        <h5 class="text-grey2"><?= $student['email'] ?></h5>
                    </div>
                    <div>
                        <!-- di ko mapagana ung pic di nag lload -->
                        <!-- <button class="relative w-8 h-8 mx-auto text-3xl transform -translate-x-1/2 -translate-y-1/2 top-1/2 bg-red1">X</button> -->
                        <!-- <img src="public\assets\images\icons\cross.png"> -->
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
    
            <div class="relative block w-[30%] border border-black rounded-2xl ml-12 overflow-hidden">
                <h1 class="w-full h-10 pt-2 text-center text-white bg-blue3 font-satoshimed">Groups</h1>
                <?php foreach($decoded_roomGroups as $index => $group): ?>
                <div class="flex w-full p-2 border-b border-black h-fit">
                    <div class="block w-2/3 mx-auto ml-2">
                        <h1 class="text-xl">Group <?= $index + 1 ?></h1>
                        <?php foreach($group as $member): ?>
                        <h5 class="mb-0 ml-4 text-sm text-grey2 "><?= $member[0] ?></h5>
                        <?php endforeach; ?>
                        <!-- Result & Role could also be added, name pa lang yung $member[0]-->
                    </div>
                    <div>
                        <!-- di ko mapagana ung pic di nag lload -->
                        <!-- <button class="relative w-8 h-8 mx-auto text-3xl transform -translate-x-1/2 -translate-y-1/2 top-1/2 bg-red1">X</button> -->
                        <!-- <img src="public\assets\images\icons\cross.png"> -->
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="flex mt-12 ml-12">
            <button class="w-20 h-12 px-12 mx-auto ml-0 text-white border border-black1 bg-red1 rounded-xl">Delete Room</button>
            <button class="w-20 h-12 px-12 mx-auto mr-0 border border-black1 bg-orangeaccent text-black1 rounded-xl">Save Changes</button>
        </div>

    </div>
    <script>
    // Adjust main content margin when sidebar is toggled
    document.getElementById('toggle-sidebar').addEventListener('click', function() {
        const mainContent = document.getElementById('main-content');
        mainContent.classList.toggle('ml-48');
        mainContent.classList.toggle('ml-20');
    });
</script>
</body>