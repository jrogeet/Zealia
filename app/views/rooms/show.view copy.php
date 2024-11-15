<?php view('partials/head.view.php'); ?>
<!-- TO DO: -->
 <!-- CHANGE NAME ERROR FIX -->
<body class="bg-white1 flex flex-col justify-between items-center">
    <?php view('partials/nav.view.php')?>
    <main class="flex flex-col h-[50rem] w-[87.5rem] mt-20">
        <?php if (isset($errors['room_name'])) : ?>
            <p class="h-12 flex justify-center items-center font-satoshimed text-red1 text-2xl"><?= $errors['room_name'] ?></p>
        <?php endif; ?>

        <!-- room name & code / header -->
        <div id="roomName" class="flex justify-between items-center h-12 my-6">
            <div class="max-w-[64rem] flex flex-col truncate">
                <span class="font-clashbold text-3xl text-black1 mr-1"><?= $room_info['room_name'] ?></span>
                <span class="font-satoshimed text-2xl text-grey2 mr-1">Room Code: <?= $room_info['room_code'] ?></span>
            </div>
            
            <button class="h-10 w-10 flex justify-center items-center rounded mr-2 border border-black1" onClick="show('changeRoomNameInput'); hide('roomName');">
                <img class="h-8 w-8" src="assets/images/icons/settings.png">
            </button>
        </div>

        <!-- change room name input -->
        <div id="changeRoomNameInput" class="hidden h-12 items-center justify-between my-6">
            <div class="w-[40rem] flex justify-evenly items-center ">
                <button class="bg-grey2 h-8 w-12 rounded" onClick="show('roomName'); hide('changeRoomNameInput');"></button>

                <form method="POST" action="/room" class="flex w-[33rem] justify-between items-center">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="room_id" value="<?= $room_info['room_id'] ?>">
                    <input type="text" name="room_name"  class="h-10 w-96 border border-black1 rounded-lg px-4" placeholder="Change room name: <?= $room_info['room_name'] ?>" required>
                    <button class="bg-orange1 h-8 font-satoshimed border border-black1 rounded p-1" type="submit">Confirm Change</button>
                </form>
            </div>

            <button onClick="show('delRoomConfirmation');" class="bg-red1 h-8 p-2 flex items-center font-satoshimed text-white1 text-center border border-black1 rounded">Delete Room</button>
        </div>

        <!-- delete room confirmation modal -->
        <div id="delRoomConfirmation" class="hidden bg-glassmorphism fixed top-20 left-0  h-screen w-screen pt-56 justify-center">
            <div class="bg-white2 flex flex-col h-48 w-80 border border-black1 rounded-t-lg">
                <div class="bg-blue3 flex justify-between items-center h-20 border border-black1 rounded-t-lg">
                    <span class="text-white1 w-4/5 text-lg font-satoshimed pl-2">Confirmation</span>
                    <button class="bg-red1 h-full w-1/5 rounded" onClick="hide('delRoomConfirmation'); enableScroll();">X</button>
                </div>
                <form method="POST" action="/room" class="flex flex-col items-center h-64 p-2">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="room_id" value="<?= $room_info['room_id'] ?>">

                    <span class="font-clashbold text-red1 text-2xl">Delete:</span>
                    <span class="font-satoshimed text-xl">Room name</span>
                    <span class="font-satoshimed text-lg">FOREVER?</span>
                    <button type="submit" class="bg-red1 p-1 mt-2 text-white1 border border-black1 rounded">Delete Room Forever</button>
                </form>
            </div>
        </div>

        <div class="flex justify-between">
            <!-- Class List & Requests -->
           <div class="h-[37.5rem] w-[18.75rem] border border-black1 rounded-xl overflow-hidden">
                <!-- Tabs -->
                <div class="flex">
                    <button id="stuListTab" onClick="show('roomStudentList'); hide('roomJoinRequest'); active('stuListTab', 'reqListTab', [['bg-blue3', 'text-white1'], ['bg-blue2', 'text-black1']], [['bg-blue2', 'text-black1'], ['bg-blue3', 'text-white1']]);" class="bg-blue3 h-[2.81rem] w-[9.37rem] font-satoshimed text-white1">Students</button>
                    <?php if($_SESSION['user']['account_type'] === 'professor'):?>
                    <button id="reqListTab" onClick="show('roomJoinRequest'); hide('roomStudentList'); active('reqListTab', 'stuListTab', [['bg-blue3', 'text-white1'], ['bg-blue2', 'text-black1']], [['bg-blue2', 'text-black1'], ['bg-blue3', 'text-white1']]);" class="bg-blue2 h-[2.81rem] w-[9.37rem] font-satoshimed text-black1">Join Requests</button>
                    <?php endif; ?>
                </div>

                <!-- Students List -->
                <div id="roomStudentList" class="h-[34.5rem] flex flex-col overflow-y-auto overflow-x-hidden rounded-b-xl">
                    <div class="h-12 w-full p-4 flex justify-center items-center border-b border-black1">
                        <span class="font-satoshimed text-lg">Total: </span>
                        <span class="font-satoshimed text-blue3 text-xl mx-1"><?= count($stu_info) ?> </span>
                        <span class="font-satoshimed text-lg">students.</span>
                    </div>
                        
                    <?php foreach($stu_info as $student): ?>
                        <div class="flex justify-between h-[3.75rem] w-full bg-blue1 border-b border-black1 p-4">
                            <a href="#" class="text-base font-satoshimed"><?= $student['l_name'], ", ", $student['f_name'] ?></a>

                            <?php if($_SESSION['user']['account_type'] === 'professor'):?>
                            <img src="assets/images/icons/cross.png" class="h-6 w-6 cursor-pointer" onClick="show('kickConfirmation<?= $student['school_id'] ?>'); disableScroll();">
                            <?php endif; ?>
                        </div>

                        <?php if($_SESSION['user']['account_type'] === 'professor'):?>
                        <div id="kickConfirmation<?= $student['school_id'] ?>" class="hidden bg-glassmorphism fixed top-20 left-0  h-screen w-screen pt-56 justify-center">
                            <div class="bg-white2 flex flex-col h-40 w-80 border border-black1 rounded-t-lg">
                                <div class="bg-blue3 flex justify-between items-center h-20 border border-black1 rounded-t-lg">
                                    <span class="text-white1 w-4/5 text-lg font-satoshimed pl-2">Confirmation</span>
                                    <button class="bg-red1 h-full w-1/5 rounded" onClick="hide('kickConfirmation<?= $student['school_id'] ?>'); enableScroll();">X</button>
                                </div>
                                <form action="/room" method="POST" class="flex flex-col items-center h-60 p-2">
                                    <input type="hidden" name="room_id" value="<?= $room_info['room_id'] ?>">
                                    <span class="font-clashbold text-red1 text-2xl">Remove:</span>
                                    <span class="font-satoshimed text-xl"><?= $student['l_name'], ", ", $student['f_name']?></span>
                                    <span class="font-satoshimed text-lg">from this room?</span>
                                    <button type="submit" name="delete" value="<?php echo implode(',', [$student['school_id'], $_GET['room_id']]); ?>"  class="bg-red1 w-16 text-white1 border border-black1 rounded">Confirm</button>
                                </form>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <!-- Requests List -->
                <?php if($_SESSION['user']['account_type'] === 'professor'):?>
                <div id="roomJoinRequest" class="hidden h-[34.5rem] overflow-y-auto overflow-x-hidden rounded-b-xl">
                    <?php foreach($requests as $request): ?>
                    <div class="flex justify-between items-center h-20 w-full px-2 bg-blue1 border border-black1">
                        <div class="w-52 flex flex-col">
                            <a href="#" class="font-satoshimed text-base"><?= $request['l_name'], ", ", $request['f_name']?></a>
                            <a href="#" class="font-satoshimed text-sm text-grey2"><?= $request['school_id'] ?></a>
                            <a href="#" class="truncate">
                                <span class="font-satoshimed text-sm text-grey2"><?= $request['email'] ?></span>
                            </a>
                        </div>

                        <form method="POST" action="/room" class="flex h-6 w-16 justify-evenly">
                            <button class="bg-check bg-cover h-6 w-6 cursor-pointer" type="submit"  name="accept" value="<?php echo implode(',', [$request['school_id'], $_GET['room_id']]); ?>"> </button>
                            <button class="bg-cross bg-cover h-6 w-6 cursor-pointer" type="submit" name="decline" value="<?php echo implode(',', [$request['school_id'], $_GET['room_id']]); ?>"> </button>
                        </form>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
           </div>

           <!-- Groups Area -->
           <div class="shadow-inside1  h-[37.5rem] w-[67.5rem] rounded-xl border border-black1 flex justify-center items-center">
                <!-- Has Groups -->
                <?php if($roomHasGroup):?>
                <div class=" h-full w-full flex flex-col items-center overflow-y-auto">
                    <div class="h-20 w-full flex items-center justify-between p-6">
                        <span class="w-4/5 font-clashbold text-4xl flex">GROUPS</span>
                        
                        <!-- edit groups btn -->
                        <?php if ($_SESSION['user']['account_type'] === 'professor'):?>
                            <form id="groupings" action="/groups" method="post">
                                <input type="hidden" name="grouped" id="grouped" value="<?= htmlspecialchars($encodedGroup, ENT_QUOTES, 'UTF-8') ?>">
                                <input type="hidden" name="room_id" value="<?= $room_id ?>">
                                <button type="submit" class="bg-blue2 h-10 w-36 font-satoshimed text-lg border border-black1 rounded-lg">Edit Groups</button>
                            </form>
                        <?php endif;?>
                    </div>

<!-- TO DO: ROW & COLUMN FLEX??? -->
                    
                    <!-- Groups Container -->
                    <div class="h-auto w-full flex flex-wrap gap-y-5 justify-evenly p-6">
                        <!-- Each Boxes -->
                        <?php foreach ($decodedGroup as $index => $group) {?>
                        <div class="bg-white1 h-auto max-h-[30rem] min-w-[20rem] max-w-[20rem] border border-black1 rounded-lg flex flex-col overflow-hidden">
                            <!-- Group Head -->
                            <div class="bg-black1 h-10 w-full flex justify-center items-center ">
                                <span class="font-satoshimed text-white1 text-4xl">Group</span>
                                <span class="font-clashbold text-orange1 text-4xl ml-2"><?= $index + 1 ?>:</span>
                            </div>
  
                            <!-- Group Body -->
                            <div class="max-h-[24.9125rem] w-full">
                                <!-- Each Member -->
                                <?php foreach ($group as $member) {?>
                                <div class="h-[6.22875rem] w-full flex">
                                    <span class="w-6/12  border border-black1 flex items-center break-all p-1 font-satoshimed text-xl"><?= $member[0] ?></span>
                                    <span class="w-6/12  border border-black1 <?php if($member[2] === 'Leader') { echo 'text-orange1'; } else { echo 'text-blue3'; }?> flex justify-center items-center p-1 font-satoshimed text-xl "><?= $member[2] ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <?php else: ?>
                <!-- NO GROUPS -->
                    <?php if ($_SESSION['user']['account_type'] === 'professor'):?>
                    <div class="flex flex-col items-center">
                        <span class="font-clashbold text-4xl">You haven't grouped the class yet.</span>
                        <button class="bg-orange1 h-[3.13rem] w-[12.5rem] font-clashbold text-xl border border-black1 rounded-lg mt-4">Generate groups</button>
                    </div>
                    <?php else: ?>
                    <div class="flex flex-col items-center">
                        <span class="font-clashbold text-4xl">The instructor hasn't grouped the class yet.</span>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <?php view('partials/footer.view.php')?>
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>