<?php view('partials/head.view.php'); ?>
<!-- TO DO: -->
 <!-- CHANGE NAME ERROR FIX -->
<body class="bg-white1 block overflow-x-hidden">
    <?php view('partials/nav.view.php')?>

    <!-- desktop -->
    <main class="relative hidden 2xl:block left-1/2 transform -translate-x-1/2 h-[50rem] w-[87.5rem] mt-20 top-10">
        
        <?php //dd($stu_info); ?>
        <?php //dd($encodedFilteredidNRiasec) ?>
        <?php //dd($stuNoType) ?>
        <?php //dd($idNRiasec); ?>
        <?php //dd($decodedGroup); ?>

        <?php if (isset($errors['room_name'])) : ?>
            <p class="h-12 flex justify-center items-center font-synemed text-red1 text-2xl"><?= $errors['room_name'] ?></p>
        <?php endif; ?>

        <!-- room name & code / header -->
        <div id="roomName" class="flex justify-between items-center h-16 my-6">
            <div class="max-w-[64rem] flex flex-col truncate">
                <span class="font-synebold text-3xl text-black1 mr-1"><?= $room_info['room_name'] ?></span>
                <span class="font-synemed text-2xl text-grey2 mr-1">Room Code: <?= $room_info['room_code'] ?></span>
                <span class="font-synereg text-xl text-grey2 mr-1 mb-2">Instructor: <?= $prof_name['f_name'], ' ', $prof_name['l_name'] ?></span>
            </div>
            
            <?php if($_SESSION['user']['account_type'] === 'professor'):?>
            <button class="h-10 w-10 flex justify-center items-center rounded mr-2 border border-black1" onClick="show('changeRoomNameInput'); hide('roomName');">
                <img class="h-8 w-8" src="assets/images/icons/settings.png">
            </button>
            <?php endif;?>
        </div>

        <?php if($_SESSION['user']['account_type'] === 'professor'):?>
        <!-- change room name input -->
        <div id="changeRoomNameInput" class="hidden h-12 items-center justify-between my-6">
            <div class="w-[40rem] flex justify-evenly items-center ">
                <button class="bg-back bg-contain bg-no-repeat bg-center h-9 w-12 rounded" onClick="show('roomName'); hide('changeRoomNameInput');"></button>

                <form method="POST" action="/room" class="flex w-[33rem] justify-between items-center">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="room" value="<?= htmlspecialchars($encodedRoomInfo, ENT_QUOTES, 'UTF-8') ?>">
                    <input type="hidden" name="edit" value="edit">
                    <input type="text" name="room_name"  class="h-10 w-96 border border-black1 rounded-lg px-4" placeholder="Change room name: <?= $room_info['room_name'] ?>" required>
                    <button class="bg-orange1 h-8 font-synemed border border-black1 rounded p-1" type="submit">Confirm Change</button>
                </form>
            </div>

            <button onClick="show('delRoomConfirmation');" class="bg-red1 h-8 p-2 flex items-center font-synereg text-white1 text-center border border-black1 rounded">Delete Room</button>
        </div>

        <!-- delete room confirmation modal -->
        <div id="delRoomConfirmation" class="hidden bg-glassmorphism fixed top-20 left-0  h-screen w-screen pt-56 justify-center">
            <div class="bg-white2 flex flex-col h-48 w-80 border border-black1 rounded-t-lg">
                <div class="bg-blue3 flex justify-between items-center h-20 border border-black1 rounded-t-lg">
                    <span class="text-white1 w-4/5 text-lg font-synemed pl-2">Confirmation</span>
                    <button class="bg-red1 h-full w-1/5 rounded" onClick="hide('delRoomConfirmation'); enableScroll();">X</button>
                </div>
                <form method="POST" action="/room" class="flex flex-col items-center h-64 p-2">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="room_id" value="<?= $room_info['room_id'] ?>">

                    <span class="font-synebold text-red1 text-2xl">Delete:</span>
                    <span class="font-synemed text-xl">Room name</span>
                    <span class="font-synereg text-lg">FOREVER?</span>
                    <button type="submit" class="bg-red1 p-1 mt-2 text-white1 border border-black1 rounded">Delete Room Forever</button>
                </form>
            </div>
        </div>
        <?php endif; ?>

        <div class="flex justify-between">
            <!-- Class List & Requests -->
           <div class="h-[37.5rem] w-[18.75rem] border border-black1 rounded-xl">
                <!-- Tabs -->
                <div class="flex">
                    
                    <?php if($_SESSION['user']['account_type'] === 'professor'):?>
                        <button id="stuListTab" onClick="show('roomStudentList'); hide('roomJoinRequest'); active('stuListTab', 'reqListTab', [['bg-blue3', 'text-white1'], ['bg-blue2', 'text-black1']], [['bg-blue2', 'text-black1'], ['bg-blue3', 'text-white1']]);" class="bg-blue3 h-[2.81rem] w-[9.37rem] font-synereg text-white1 border border-black1 rounded-tl-xl">Students</button>
                        <button id="reqListTab" onClick="show('roomJoinRequest'); hide('roomStudentList'); active('reqListTab', 'stuListTab', [['bg-blue3', 'text-white1'], ['bg-blue2', 'text-black1']], [['bg-blue2', 'text-black1'], ['bg-blue3', 'text-white1']]);" class="bg-blue2 h-[2.81rem] w-[9.37rem] font-synereg text-black1 border border-black1 rounded-tr-xl">Join Requests</button>
                    <?php else:?>
                        <button id="stuListTab" onClick="show('roomStudentList'); hide('roomJoinRequest'); active('stuListTab', 'reqListTab', [['bg-blue3', 'text-white1'], ['bg-blue2', 'text-black1']], [['bg-blue2', 'text-black1'], ['bg-blue3', 'text-white1']]);" class="bg-blue3 h-[2.81rem] w-full font-synereg text-white1 border border-black1 rounded-t-xl">Students</button>
                    <?php endif; ?>
                </div>

                <?php if($_SESSION['user']['account_type'] === 'professor'):?>
                <form action="/room" method="POST" class="w-full flex justify-between items-center border-b-2 border-black1 px-2">
                    <input type="hidden" name="invite" value="invite">
                    <input type="hidden" name="room_id" value="<?= $_GET['room_id'] ?>">
                    <input type="hidden" name="room_name" value="<?= $room_info['room_name'] ?>">
                    <input type="hidden" name="prof_id" value="<?= $room_info['school_id'] ?>">
                    <input type="hidden" name="prof_name" value="<?= $prof_name['f_name'], ' ', $prof_name['l_name'] ?>">
                    <input name="school_id" class="h-full w-4/5 bg-white1 p-1 font-synereg border-none focus:outline-none" type="number" placeholder="Enter Student's School ID to invite:" required>
                    <button class="bg-orange1 font-synereg rounded py-1 px-2 my-2" type="submit">Invite</button>
                </form>
                <?php endif; ?>

                <!-- Students List -->
                <div id="roomStudentList" class="h-[34.5rem] flex flex-col  overflow-y-auto overflow-x-hidden rounded-b-xl">
                    <div class="h-12 w-full p-4 flex justify-center items-center border-b-2 border-black1">
                        <span class="font-synemed text-lg">Total: </span>
                        <span class="font-synemed text-blue3 text-xl mx-1"><?= count($stu_info) ?> </span>
                        <span class="font-synemed text-lg">students.</span>
                    </div>

                    <!-- ADD STUDENTS -->
                     <div>
                        
                     </div>
                        
                    <?php foreach($stu_info as $student): ?>
                        <div class="flex justify-between h-[3.75rem] w-full bg-blue1 border border-black1 p-4">
                            <a href="#" class="text-base font-synereg"><?= $student['l_name'], ", ", $student['f_name'] ?></a>

                            <?php if($_SESSION['user']['account_type'] === 'professor'):?>
                            <img src="assets/images/icons/cross.png" class="h-6 w-6 cursor-pointer" onClick="show('kickConfirmation<?= $student['school_id'] ?>'); disableScroll();">
                            <?php endif; ?>
                        </div>

                        <?php if($_SESSION['user']['account_type'] === 'professor'):?>
                        <div id="kickConfirmation<?= $student['school_id'] ?>" class="hidden bg-glassmorphism fixed inset-0 h-screen w-screen pt-60 justify-center">
                            <div class="bg-white2 flex flex-col h-40 w-80 border border-black1 rounded-t-lg">
                                <div class="bg-blue3 flex justify-between items-center h-20 border border-black1 rounded-t-lg">
                                    <span class="text-white1 w-4/5 text-lg font-synemed pl-2">Confirmation</span>
                                    <button class="bg-red1 h-full w-1/5 rounded" onClick="hide('kickConfirmation<?= $student['school_id'] ?>'); enableScroll();">X</button>
                                </div>
                                <form action="/room" method="POST" class="flex flex-col items-center h-60 p-2">
                                    <input type="hidden" name="room_id" value="<?= $room_info['room_id'] ?>">
                                    <span class="font-synebold text-red1 text-2xl">Remove:</span>
                                    <span class="font-synemed text-xl"><?= $student['l_name'], ", ", $student['f_name']?></span>
                                    <span class="font-synereg text-lg">from this room?</span>
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
                            <a href="#" class="font-synereg text-base"><?= $request['l_name'], ", ", $request['f_name']?></a>
                            <a href="#" class="font-synereg text-sm text-grey2"><?= $request['school_id'] ?></a>
                            <a href="#" class="truncate">
                                <span class="font-synereg text-sm text-grey2"><?= $request['email'] ?></span>
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

           <!-- GROUPS AREA -->
           <div class="shadow-inside1  h-[37.5rem] w-[67.5rem] rounded-xl flex justify-center items-center">
                <!-- Has Groups -->
                <?php if($roomHasGroup):?>
                <div class=" h-full w-full flex flex-col items-center overflow-y-auto">
                    <div class="h-20 w-full flex items-center justify-between p-6">
                        <span class="w-4/5 font-synebold text-4xl flex">GROUPS</span>
                        
                        <!-- edit groups btn -->
                        <?php if ($_SESSION['user']['account_type'] === 'professor'):?>

                            <a href="/groups?room_id=<?= $room_info['room_id'] ?>" class="bg-blue2 h-10 w-36 flex items-center justify-center font-synereg text-lg border border-black1 rounded-lg">Edit Groups</a>

                            <!-- <form id="groupings" action="/groups" method="get">
                                <input type="hidden" name="grouped" id="grouped" value="<?= htmlspecialchars($encodedGroup, ENT_QUOTES, 'UTF-8') ?>">
                                <input type="hidden" name="room_id" value="<?= $room_id ?>">
                                <button type="submit" class="bg-blue2 h-10 w-36 font-synereg text-lg border border-black1 rounded-lg">Edit Groups</button>
                            </form> -->
                        <?php endif;?>
                    </div>
                    
                    <!-- Groups Container -->
                    <div class="h-auto w-full flex flex-wrap gap-y-5 justify-evenly p-6">
                        <!-- Each Boxes -->
                        <?php foreach ($decodedGroup as $index => $group) {?>
                        <a href="/view-group?room_id=<?= $room_info['room_id'] ?>&group=<?= $index ?>" class="bg-white1 h-auto max-w-[20rem] border flex flex-col overflow-hidden">
                            <!-- Group Head -->
                            <div class="bg-black1 h-10 w-full flex justify-center items-center ">
                                <span class="font-synemed text-white1 text-4xl">Group</span>
                                <span class="font-synebold text-orange1 text-4xl ml-2"><?= $index + 1 ?>:</span>
                            </div>
  
                            <!-- Group Body -->
                            <div class=" w-full">
                                <!-- Each Member -->
                                <?php foreach ($group as $member) {?>
                                <div class="h-[6.22875rem] w-full flex">
                                    <span class="w-6/12  border border-black1 flex items-center break-all p-1 font-synemed text-xl"><?= $member[0] ?></span>
                                    <span class="w-6/12  border border-black1 <?php if($member[2] === 'Leader') { echo 'text-orange1'; } else { echo 'text-blue3'; }?> flex justify-center items-center p-1 font-synemed text-xl "><?= $member[2] ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </a>
                        <?php }?>
                    </div>
                </div>


                
                <?php else: ?>
                <!-- NO GROUPS -->
                    <?php if ($_SESSION['user']['account_type'] === 'professor'):?>
                    <div class="flex flex-col items-center">
                        <span class="font-synebold text-4xl">You haven't grouped the class yet.</span>

                        <button onclick="generateGroups();" class="bg-orange1 h-[3.13rem] w-[12.5rem] font-synebold text-xl border border-black1 rounded-lg mt-4">Generate groups</button>
                        <form id="submitGroups" action="/room" method="POST">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="grouped" value="grouped">
                            <input type="hidden" name="genGroups" value="" id="genGroups">

                            <input type="hidden" name="room" value="<?= htmlspecialchars($encodedRoomInfo, ENT_QUOTES, 'UTF-8') ?>">
                            <input type="hidden" name="filteredidNRiasec" id="filteredidNRiasec" value="<?= htmlspecialchars($encodedFilteredidNRiasec, ENT_QUOTES, 'UTF-8') ?>"> 
                            <input type="hidden" name="stunotype" id="stunotype" value="<?= count($stuNoType) ?>">
                        </form>
                    </div>
                    <?php else: ?>
                    <div class="flex flex-col items-center">
                        <span class="font-synebold text-4xl">The instructor hasn't grouped the class yet.</span>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

        </div>
    </main>


    <!-- mobile -->
    <div class="relative block top-10 lg:top-0 2xl:hidden">
        <div class="relative flex text-center font-synebold">
            <h1 class="w-3/5 py-2 bg-blue3 text-white1 shadow-xl duration-100" id="StudButt">Students</h1>
            <h1 class="w-2/5 py-2 bg-orange1 text-black1 shadow-xl duration-100" id="GrButt">Groups</h1>
        </div>

        <!-- students content -->
        <div class="flex flex-wrap w-full h-fit py-0 sm:py-2 px-0" id="students">
            <?php foreach($stu_info as $student): ?>
                    <?php if($_SESSION['user']['school_id'] == $student['school_id']):?>
                        <div class="bg-blue2 relative block mx-0 sm:mx-auto min-w-[19rem] md:max-w-[28rem] h-fit w-full sm:w-[48%] sm:rounded-2xl border-t border-black sm:border-none m-0 sm:m-2 py-2 text-center">
                            <a href="#" class="relative text-base font-synereg"><?= $student['l_name'], ", ", $student['f_name'] ?></a></br>
                            <a href="#" class="relative text-base font-synereg"><?= $student['school_id'] ?></a>
                        </div>
                    <?php else:?>
                        <div class="bg-white2 relative block mx-0 sm:mx-auto min-w-[19rem] md:max-w-[28rem] h-fit w-full sm:w-[48%] sm:rounded-2xl border-t border-black sm:border-none m-0 sm:m-2 py-2 text-center">
                            <a href="#" class="relative text-base font-synereg"><?= $student['l_name'], ", ", $student['f_name'] ?></a></br>
                            <a href="#" class="relative text-base font-synereg"><?= $student['school_id'] ?></a>
                        </div>
                    <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- groups content -->
        <div class="flex flex-wrap w-full h-fit py-0 sm:py-2 px-0 hidden" id="groups">
            <?php if($roomHasGroup):?>
                <div class=" h-full w-full flex flex-col items-center overflow-y-auto">
                <!-- Groups Container -->
                 <!-- Each Boxes -->
                    <div class="h-auto w-full flex flex-wrap gap-y-5 justify-evenly p-6">
                    
                        <?php foreach ($decodedGroup as $index => $group) {?>
                            <div class="bg-white1 h-auto max-w-[20rem] border flex flex-col overflow-hidden">
                        <!-- Group Head -->
                                <div class="bg-black1 h-10 w-full flex justify-center items-center ">
                                    <span class="font-synemed text-white1 text-4xl">Group</span>
                                    <span class="font-synebold text-orange1 text-4xl ml-2"><?= $index + 1 ?>:</span>
                                </div>

                        <!-- Group Body -->
                            <!-- Each Member -->
                                <div class=" w-full">
                                    <?php foreach ($group as $member) {?>
                                        <div class="h-[6.22875rem] w-full flex">
                                            <span class="w-6/12  border border-black1 flex items-center break-all p-1 font-synemed text-xl"><?= $member[0] ?></span>
                                            <span class="w-6/12  border border-black1 <?php if($member[2] === 'Leader') { echo 'text-orange1'; } else { echo 'text-blue3'; }?> flex justify-center items-center p-1 font-synemed text-xl "><?= $member[2] ?></span>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            <!-- NO GROUPS -->
            <?php else: ?>
                <?php if ($_SESSION['user']['account_type'] === 'professor'):?>
                    <div class="flex flex-col items-center">
                        <span class="font-synebold text-4xl">You haven't grouped the class yet.</span>

                        <button onclick="generateGroups();" class="bg-orange1 h-[3.13rem] w-[12.5rem] font-synebold text-xl border border-black1 rounded-lg mt-4">Generate groups</button>
                        <form id="submitGroups" action="/room" method="POST">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="grouped" value="grouped">
                            <input type="hidden" name="genGroups" value="" id="genGroups">

                            <input type="hidden" name="room" value="<?= htmlspecialchars($encodedRoomInfo, ENT_QUOTES, 'UTF-8') ?>">
                            <input type="hidden" name="filteredidNRiasec" id="filteredidNRiasec" value="<?= htmlspecialchars($encodedFilteredidNRiasec, ENT_QUOTES, 'UTF-8') ?>"> 
                            <input type="hidden" name="stunotype" id="stunotype" value="<?= count($stuNoType) ?>">
                        </form>
                    </div>
                <?php else: ?>
                    <div class="flex flex-col items-center">
                        <span class="font-synebold text-4xl">The instructor hasn't grouped the class yet.</span>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

    </div>



    <?php view('partials/footer.view.php')?>
    <script src="assets/js/shared-scripts.js"></script>
    <script src="assets/js/grouping.js"></script>
    <script>

        const StudButt = document.getElementById('StudButt');
        const GrButt = document.getElementById('GrButt');
        const students = document.getElementById('students');
        const groupContent = document.getElementById('groups');
        
        StudButt.addEventListener('click',function(){
            if(StudButt.classList.contains("bg-blue3")){
                    
            }else{
                StudButt.classList.replace("bg-orange1","bg-blue3");
                StudButt.classList.replace("text-black1","text-white1");
                StudButt.classList.replace("w-2/5","w-3/5");
                GrButt.classList.replace("bg-blue3","bg-orange1");
                GrButt.classList.replace("text-white1","text-black1");
                GrButt.classList.replace("w-3/5","w-2/5");
                students.classList.remove("hidden");
                groupContent.classList.add("hidden");
            }
        })

        
        GrButt.addEventListener('click',function(){
            if(GrButt.classList.contains("bg-blue3")){
                
            }else{
                GrButt.classList.replace("bg-orange1","bg-blue3");
                GrButt.classList.replace("text-black1","text-white1");
                GrButt.classList.replace("w-2/5","w-3/5");
                StudButt.classList.replace("bg-blue3","bg-orange1");
                StudButt.classList.replace("text-white1","text-black1");
                StudButt.classList.replace("w-3/5","w-2/5");
                students.classList.add("hidden");
                groupContent.classList.remove("hidden");
            }
        })

        function generateGroups() {
            // const rows = <?php //echo $encodedFilteredidNRiasec; ?>;
            createList(<?php echo $encodedFilteredidNRiasec; ?>)
            groupRoles(PI)
            groupRoles(writer)
            groupRoles(dev)
            groupRoles(des)
            distributeRoles()
            // display()
        }
    </script>
</body>
</html>