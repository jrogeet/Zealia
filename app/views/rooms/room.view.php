<?php view('partials/head.view.php'); ?>
<body class="bg-white1 block w-screen h-fit overflow-x-hidden">
    <?php view('partials/nav.view.php')?>

    <?php 
        $members = [];
        $groupNum = 0;

        if (isset($decodedGroup)) {
            foreach ($decodedGroup as $index => $group) {
                $container = [];
                $bool = false;
                foreach ($group as $member) {
                    $container[] = $member;
                    if ($_SESSION['user']['account_type'] == 'professor') {
                        $members[$index + 1] = $member;
                    } else {
                        if ($member[1] === $_SESSION['user']['school_id']) {
                            $bool = true;
                            $groupNum = $index+1;
                            // inistore ko role ng user(student) sa $studentRole, for checking kung pwede din sya mag add ng task sa kanban (line 265)
                            $studentRole = $member[2];
                        }
                    }
                }
                if ($bool === true) {
                    $members = $container;
                }
                
            }
        }
        

    ?>
    
    <?php //dd($stu_info) ?>
    <?php //dd($decodedGroup) ?>
    <main class="relative block left-1/2 transform -translate-x-1/2 h-[23.2rem] w-full top-32">
        <?php if (isset($errors['room_name'])) : ?>
            <p class="h-12 flex justify-center items-center font-synemed text-red1 text-2xl"><?= $errors['room_name'] ?></p>
        <?php endif; ?>

        <!-- Add task modal -->
        <div id="taskModal" class="absolute hidden w-screen h-screen -top-20 bg-glassmorphism z-[55]">
            <div class="relative block text-center left-1/2 top-1/3 transform -translate-x-1/2 -translate-y-1/3 w-[40%] h-fit bg-white1 border border-grey1 shadow-xl rounded-xl p-2">
                
                <div class="flex w-full">                        
                    <h1 class="block font-synebold text-xl text-grey2 text-left ml-2 mt-2 mx-auto">Add Task</h1>
                    <button onclick="hide('taskModal'),clearModal()" class="mx-auto mr-2 text-3xl pt-1 pr-2">X</button>
                </div>

                <!-- TODO: ADD VALUES INTO JSON -->
                    <div class="flex w-full">                        
                        <input class="block p-2 w-1/2 border-b border-black bg-white1 mx-auto ml-2 my-2 font-synemed text-2xl" placeholder="Task Name" name="task" id="taskName" required>
                        <input type="date" class="block p-2 w-1/4 border-b border-black bg-white1 mx-auto mr-2 my-2 font-synemed" placeholder="Date" name="date" id="taskDate">
                    </div>
                    
                    <div class="flex w-full">                        
                        <input class="block p-2 w-1/2 border-b border-black bg-white1 mx-auto ml-2 my-2 font-synemed ml-2 text-base text-grey2" placeholder="Description" name="info" id="taskInfo">
                        <select class="block p-2 w-1/4 border-b border-black bg-white1 mx-auto mr-2 my-2 font-synemed text-grey2" name="destination" id="taskDestination">
                            <option class="text-grey2" value="todo">To do</option>
                            <option class="text-grey2" value="wip">Work in Progress</option>
                            <option class="text-grey2" value="done">Done</option>
                        </select>
                    </div>

                    <button type="submit" onclick="addTask()" class="bg-green1 text-black1 p-0 px-10 mt-10 mb-4 rounded-lg font-synebold text-lg">Add</button>

            </div>
        </div>
        

        <!-- HEADER -->
        <div id="roomName" class="relative left-1/2 transform -translate-x-1/2 w-10/12 flex justify-between items-center h-fit mb-6">
            <div class="max-w-[64rem] flex flex-col truncate ">
                <span class="font-synebold text-3xl text-black1 mr-1"><?= $room_info['room_name'] ?></span>
                <span class="font-synemed text-2xl text-grey2 mr-1">Room Code: <?= $room_info['room_code'] ?></span>
                <span class="font-synereg text-xl text-grey2 mr-1 mb-2">Instructor: <?= $prof_name['f_name'], ' ', $prof_name['l_name'] ?></span>
            </div>
            
            <!-- gear button for prof -->
            <?php if ($_SESSION['user']['account_type'] === 'professor'):?>
                <button class="h-10 w-10 flex justify-center items-center rounded mr-2 border border-black1" onClick="show('changeRoomNameInput'); hide('roomName');">
                    <img class="h-8 w-8" src="assets/images/icons/settings.png">
                </button>
            
            <!-- prof name for student -->
            <?php elseif ($_SESSION['user']['account_type'] === 'student'):?>
                <h1 class="font-synebold text-3xl text-black1"><?= $prof_name['f_name'], ' ', $prof_name['l_name'] ?></h1>
            <?php endif; ?>
        </div>

        <!-- FOR PROF -->
        <?php if ($_SESSION['user']['account_type'] === 'professor'):?>
            <!-- HEADER.Change room name menu -->
            <div id="changeRoomNameInput" class="relative hidden left-1/2 transform -translate-x-1/2 h-fit items-center justify-between w-10/12 mt-10">
                <div class="w-fit flex justify-evenly items-center ">
                    <button class="bg-back bg-contain bg-no-repeat h-8 w-8 rounded mx-2" onClick="show('roomName'); hide('changeRoomNameInput');"></button>
    
                    <form method="POST" action="/room" class="flex w-[33rem] justify-between items-center">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="room" value="<?= htmlspecialchars($encodedRoomInfo, ENT_QUOTES, 'UTF-8') ?>">
                        <input type="hidden" name="edit" value="edit">
                        <input type="text" name="room_name"  class="h-10 w-96 border border-black1 rounded-lg px-4" placeholder="Change room name: <?= $room_info['room_name'] ?>" required>
                        <button class="bg-orange1 h-8 font-synemed border border-black1 rounded p-1" type="submit">Confirm Change</button>
                    </form>
                </div>
    
                <button onClick="show('delRoomConfirmation');" class="bg-red1 h-8 p-2 mr-2 flex items-center font-synereg text-white1 text-center border border-black1 rounded">Delete Room</button>
            </div>

            <!-- delete room confirmation modal -->
            <div id="delRoomConfirmation" class="hidden z-50 bg-glassmorphism fixed -top-24 left-0 h-screen w-screen justify-center">
                <div class="bg-white2 relative flex flex-col h-48 w-80 border border-black1 top-1/3 rounded-t-lg">
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

            <!-- BODY -->
            <div class="relative left-1/2 transform -translate-x-1/2 w-10/12 flex justify-between items-center h-fit my-6">
                <!-- LEFT BOX -->
                <div class="h-[37.5rem] w-[24%] border border-black1 rounded-xl overflow-hidden">
                    <!-- Tabs -->
                    <div class="flex">
                        <button id="stuListTab" onClick="show('roomStudentList'); hide('roomJoinRequest'); active('stuListTab', 'reqListTab', [['bg-blue3', 'text-white1'], ['bg-blue2', 'text-black1']], [['bg-blue2', 'text-black1'], ['bg-blue3', 'text-white1']]);" class="bg-blue3 h-[2.81rem] w-1/2 font-synereg text-white1">Students</button>
                        <button id="reqListTab" onClick="show('roomJoinRequest'); hide('roomStudentList'); active('reqListTab', 'stuListTab', [['bg-blue3', 'text-white1'], ['bg-blue2', 'text-black1']], [['bg-blue2', 'text-black1'], ['bg-blue3', 'text-white1']]);" class="bg-blue2 h-[2.81rem] w-1/2 font-synereg text-black1">Join Requests</button>
                    </div>

                    <!-- Students List -->
                    <div id="roomStudentList" class="h-[34.5rem] flex flex-col overflow-y-auto overflow-x-hidden rounded-b-xl">
                        <!-- Student Count -->
                        <div class="h-12 w-full p-4 flex justify-center items-center border-t border-black1">
                            <span class="font-synemed text-lg">Total: </span>
                            <span class="font-synemed text-blue3 text-xl mx-1"><?= count($stu_info) ?> </span>
                            <span class="font-synemed text-lg">students.</span>
                        </div>

                        <!-- Student Names -->
                        <?php foreach($stu_info as $student): ?>
                            <div class="flex justify-between h-[3.75rem] w-full bg-blue1 border-t border-black1 p-4">
                                <a href="#" class="text-base font-synereg"><?= $student['l_name'], ", ", $student['f_name'] ?></a>
                                <img src="assets/images/icons/cross.png" class="h-6 w-6 cursor-pointer" onClick="show('kickConfirmation<?= $student['school_id'] ?>'); disableScroll();">
                            </div>

                            <div id="kickConfirmation<?= $student['school_id'] ?>" class="hidden bg-glassmorphism fixed top-20 left-0  h-screen w-screen pt-56 justify-center">
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
                        <?php endforeach; ?>
                    </div>

                    <!-- Requests List -->
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

                    
                </div>

                <!-- RIGHT BOX -->
                <div class="shadow-inside1 h-[37.5rem] w-[75%] rounded-xl flex justify-center items-center">
                    <?php if($roomHasGroup):?>
                        <!-- content -->
                        <div class=" h-full w-full flex flex-col items-center overflow-y-auto">
                            <!-- HEADER -->
                            <div class="h-20 w-full flex items-center p-6">
                                <span class="w-4/5 font-synebold text-4xl">GROUPS</span>
                        
                                <!-- downloadPDF groups btn -->
                                <button onclick="downloadPDF()" class="bg-white2 h-10 w-36 flex items-center justify-center font-synereg text-lg border border-black1 rounded-lg">Print Groups</button>
                                <!-- edit groups btn -->
                                <a href="/groups?room_id=<?= $room_info['room_id'] ?>" class="bg-blue2 h-10 w-36 flex ml-4 items-center justify-center font-synereg text-lg border border-black1 rounded-lg">Edit Groups</a>
                                    

                                    <!-- <form id="groupings" action="/groups" method="get">
                                        <input type="hidden" name="grouped" id="grouped" value="<?= htmlspecialchars($encodedGroup, ENT_QUOTES, 'UTF-8') ?>">
                                        <input type="hidden" name="room_id" value="<?= $room_id ?>">
                                        <button type="submit" class="bg-blue2 h-10 w-36 font-synereg text-lg border border-black1 rounded-lg">Edit Groups</button>
                                    </form> -->
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
                                                <span class="w-6/12  border border-black1 <?php if($member[2] === 'Leader') { echo 'text-orange1'; } else { echo 'text-blue3'; }?> flex justify-center items-center p-1 font-synemed text-xl"><?= $member[2] ?></span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </a>
                            <?php }?>
                        </div>
                    </div>


                    
                    <!-- NO GROUPS -->
                    <?php else: ?>
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
                    <?php endif; ?>
                </div>
            </div>
        <?php elseif ($_SESSION['user']['account_type'] === 'student'):?>
            <?php if(isset($decodedGroup)): ?>
                
                <?php //dd($members) ?>
                <!-- BODY -->
                <div class="flex w-10/12 mb-32 mx-auto">
                    <!-- left -->
                    <div class="bg-white2 relative block mx-auto w-[26%] text-center justify-between items-center h-[40rem] border border-black1 px-6 py-4 rounded-2xl shadow-[inset_0_0_10px_rgba(255,255,255,1)]">
                        <!-- head -->
                        <div class="w-full py-2 flex">
                            <h1 class="font-synebold text-4xl text-left mx-auto ml-0">Group: <?php echo $groupNum ?></h1>
                            <button class="bg-white2 h-10 w-36 flex items-center justify-center font-synereg text-lg border border-black1 rounded-lg mx-auto mr-0" onclick="downloadPDF()">Print Group</button>
                        </div>
                        
                        <!-- members -->
                        <div class="w-full py-2">
                            <?php foreach ($members as $member){ ?>
                                <h1 class="text-xl flex my-2 py-4"> <span class="mx-auto w-2/6 text-left"><?php echo $member[0]; ?></span><span class="mx-auto w-2/6 text-right"><?php echo $member[2]; ?></span></h1>
                                
                            <?php } ?>
                        </div>
        
                    </div>
                    
                    <!-- right -->
                    <div class="bg-white2 relative block mx-auto w-8/12 text-center justify-between items-center h-[40rem] border border-black1 rounded-2xl shadow-[inset_0_0_10px_rgba(255,255,255,1)] overflow-x-hidden overflow-y-auto font-synemed">
                        <!-- group tabs -->
                        <div class="flex w-full border-b border-black1">
                            <!-- TO FIX: hide other kanban onclick -->
                            <?php foreach ($members as $index => $member){ ?>
                                <button onclick="changeKB(<?php echo $index; ?>); " id="<?php echo $member[1]; ?>" class="member <?php if($member[1] === $_SESSION['user']['school_id']): ?>bg-blue3 text-white1<?php else: ?>bg-white1<?php endif;?> w-1/4 mx-auto py-4 border-r border-l border-black1"><?php echo $member[0]; ?></button>
                            <?php } ?>
                        </div>

                        <?php foreach($members as $index => $member): ?>
                            <!-- whiteboard -->
                            <!-- added $currentKB for default add location sa addTask() -->
                            <div id="kanban<?= $index ?>" class="<?php if($member[1] === $_SESSION['user']['school_id']): $currentKB = $index;?>flex<?php else: ?>hidden<?php endif;?> flex-col items-right w-full h-fit min-h-[36.3rem] py-2 pt-4">
                                <!-- add task button -->
                                <?php if(($member[1] === $_SESSION['user']['school_id']) || ($studentRole === 'Principal Investigator')) : ?> 
                                    <div class="flex w-fit pr-4 self-end">
                                        <button onclick="show('taskModal')" class="px-10 border border-grey1 bg-green1 rounded-lg">Add +</button>
                                    </div>
                                <?php endif; ?>

                                <!-- lanes  -->
                                <!-- changed id of lanes from todoCont => 3todoCont** first char = member index -->
                                <div class="relative flex w-full p-2 mt-2 gap-2">
                                    <!-- to do -->
                                    <div id="<?php echo $index; ?>todoCont" class="group dropzone w-1/3 bg-red-300 border border-black1 rounded-xl h-fit min-h-32 shadow-xl overflow-hidden">
                                        <h1 class="font-synebold border-b border-black1">To Do List:</h1>

                                        <?php if (!empty($member[3])) {
                                            foreach($member[3] as $key => $room_kanban) {
                                                if($key == $_GET['room_id']) {
                                                    foreach($room_kanban['todo'] as $task) { ?>
                                                        <div class="block card cursor-grab h-fit py-2 border-b border-black1" draggable="true">                                                            
                                                            <div class="flex cursor-grab justify-evenly p-1">
                                                                <span class="ml-1 mx-auto text-base text-left font-synebold border-b border-grey2 text-black1 text-wrap px-4"><?= $task[0] ?></span>
                                                                <span class="mr-2 mx-auto text-sm font-synemed text-black1 text-wrap pl-1"><?= $task[2] ?></span>
                                                            </div>
                                                                <span class="relative block ml-10 font-synereg text-left text-base text-black1 text-wrap"><?= $task[1] ?></span>
                                                        </div>
                                        <?php       }
                                                }
                                            }
                                        }
                                        ?>
                                    </div>                                
                                    <!-- work in progress -->
                                    <div id="<?php echo $index; ?>wipCont" class="dropzone w-1/3 bg-blue-200 border border-black1 rounded-xl h-fit min-h-32 shadow-xl overflow-hidden">
                                        <h1 class="font-synebold border-b border-black1">Work in progress:</h1>
                                        <?php 
                                            if (!empty($member[3])) {
                                                foreach($member[3] as $key => $room_kanban) {
                                                    if($key == $_GET['room_id']) {
                                                        foreach($room_kanban['wip'] as $task) { ?>
                                                            <div class="block card cursor-grab h-fit py-2 border-b border-black1" draggable="true">                                                            
                                                                <div class="flex cursor-grab justify-evenly p-1">
                                                                    <span class="ml-1 mx-auto text-base text-left font-synebold border-b border-grey2 text-black1 text-wrap px-4"><?= $task[0] ?></span>
                                                                    <span class="mr-2 mx-auto text-sm font-synemed text-black1 text-wrap pl-1"><?= $task[2] ?></span>
                                                                </div>
                                                                    <span class="relative block ml-10 font-synereg text-left text-base text-black1 text-wrap"><?= $task[1] ?></span>
                                                            </div>
                                        <?php           }
                                                    }
                                                }
                                            }
                                        ?>
                                    </div>
                                    <!-- done -->
                                    <div id="<?php echo $index; ?>doneCont" class="dropzone w-1/3 bg-green-300 border border-black1 rounded-xl h-fit min-h-32 shadow-xl overflow-hidden">
                                        <h1 class="font-synebold border-b border-black1">Done:</h1>
                                        <?php 
                                            if (!empty($member[3])) {
                                                foreach($member[3] as $key => $room_kanban) {
                                                    if($key == $_GET['room_id']) {
                                                        foreach($room_kanban['done'] as $task) { ?>
                                                            <div class="block card cursor-grab py-2 h-fit border-b border-black1" draggable="true">                                                            
                                                                <div class="flex cursor-grab justify-evenly p-1">
                                                                    <span class="ml-1 mx-auto text-base text-left font-synebold border-b border-grey2 text-black1 text-wrap px-4"><?= $task[0] ?></span>
                                                                    <span class="mr-2 mx-auto text-sm font-synemed text-black1 text-wrap pl-1"><?= $task[2] ?></span>
                                                                </div>
                                                                    <span class="relative block ml-10 font-synereg text-left text-base text-black1 text-wrap"><?= $task[1] ?></span>
                                                            </div>
                                        <?php           }
                                                    }
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div> 
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="mt-40 flex flex-col items-center">
                    <span class="font-synebold text-4xl text-red1">The instructor hasn't grouped the class yet.</span>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </main>

    <?php view('partials/footer.view.php')?>

    <script src="assets/js/shared-scripts.js"></script>
    <script src="assets/js/grouping.js"></script>
    <script>
        // function generateGroups() {
        //     // const rows = <?php //echo $encodedFilteredidNRiasec; ?>;
        //     createList(<?php echo $encodedFilteredidNRiasec; ?>)
        //     groupRoles(PI)
        //     groupRoles(writer)
        //     groupRoles(dev)
        //     groupRoles(des)
        //     distributeRoles()
        //     // display()
        // }
            const StudButt = document.getElementById('StudButt');
            const GrButt = document.getElementById('GrButt');
            const students = document.getElementById('students');
            const groupContent = document.getElementById('groups');

            const kbButts = document.querySelectorAll('.member');
            const dropzones = document.querySelectorAll('.dropzone');
            let cards = document.querySelectorAll('.card');
            const groupData = <?php echo json_encode($members); ?>;
            const groupNumber = <?php echo json_encode($groupNum); ?>;
        <?php if ($_SESSION['user']['account_type'] === 'student'): ?>
 
            let currentKB = <?php echo $currentKB; ?>;

            function addTask() { // ONLY ADDS TASK PHYSICALLY, STILL NEED TO UPDATE JSON ON TASK ADD
                // Get values from the modal inputs
                const taskName = document.getElementById('taskName').value;
                const taskDate = document.getElementById('taskDate').value;
                const taskInfo = document.getElementById('taskInfo').value;
                const taskDestination = document.getElementById('taskDestination').value;
                const container = document.getElementById(`${currentKB}${taskDestination}Cont`);
                const newCard = document.createElement('div');

                newCard.setAttribute('draggable', 'true');
                newCard.classList.add('block', 'h-fit', 'py-2', 'border-b', 'border-black1', 'cursor-grab');
                newCard.innerHTML = `
                                    <div class="card flex cursor-grab justify-evenly p-1" draggable="true">
                                        <span class="ml-1 mx-auto text-base text-left font-synebold border-b border-grey2 text-black1 text-wrap px-4">${taskName}</span>
                                        <span class="mr-2 mx-auto text-sm font-synemed text-black1 text-wrap pl-1">${taskDate}</span>
                                    </div>
                                        <span class="relative block ml-10 font-synereg text-left text-base text-black1 text-wrap">${taskInfo}</span>
                                    `;

                console.log("currentKB:",currentKB);
                console.log(`${currentKB}${taskDestination}Cont`);

                container.appendChild(newCard);
                
                // adds drag and drop functionality to new tasks
                newCard.addEventListener('dragstart', function(event) {
                    newCard.classList.add("dragging");
                    newCard.classList.remove("cursor-grab");
                    newCard.classList.add("cursor-grabbing");
                });
                newCard.addEventListener('dragend', function(event) { // To remove class after dragging
                    newCard.classList.remove("dragging");
                    newCard.classList.remove("cursor-grabbing");
                    newCard.classList.add("cursor-grab");
                });

                clearModal()

                // Hide the modal
                hide('taskModal');
            }

            // for add task modal only
            function clearModal(){
                document.getElementById('taskName').value = '';
                document.getElementById('taskDate').value = '';
                document.getElementById('taskInfo').value = '';
                document.getElementById('taskDestination').value = 'todo';
            }


            const InsertAboveTask = (zone, mouseY) => {
                const els = zone.querySelectorAll(".card:not(.dragging)");
                let closestTask = null;
                let closestOffset = Number.NEGATIVE_INFINITY;

                els.forEach((task) => {
                    const { top } = task.getBoundingClientRect(); // Fixed typo
                    const offset = mouseY - top;
                    if (offset < 0 && offset > closestOffset) {
                        closestOffset = offset;
                        closestTask = task;
                    }
                });
                return closestTask;
            };

            // Add event listeners to cards
            cards.forEach(function(c) {
                c.addEventListener('dragstart', function(event) {
                    c.classList.add("dragging");
                    c.classList.remove("cursor-grab");
                    c.classList.add("cursor-grabbing");
                });

                c.addEventListener('dragend', function(event) { // To remove class after dragging
                    c.classList.remove("dragging");
                    c.classList.remove("cursor-grabbing");
                    c.classList.add("cursor-grab");
                });
            });

            // Function to find the element closest to the mouse position
            
            // Add event listeners to dropzones
            dropzones.forEach(function(zone) {
                zone.addEventListener('dragover', function(event) {
                    event.preventDefault();
                    const bottomTask = InsertAboveTask(zone, event.clientY);
                    const curTask = document.querySelector(".dragging");
                    
                    if (!bottomTask) {
                        zone.appendChild(curTask);
                    } else {
                        zone.insertBefore(curTask, bottomTask);
                    }
                });

                zone.addEventListener('drop', function(event) {
                    event.preventDefault();
                    const curTask = document.querySelector(".dragging");
                    curTask.classList.remove("dragging");
                });
            });


            

            // toggle hidden/flex kanban of members
            function changeKB(index){
                console.log(index);
                let kanbans = document.querySelectorAll('[id^="kanban"]');
                currentKB = index;

                kanbans.forEach(kb =>{
                    kb.classList.remove('flex');
                    kb.classList.add('hidden');
                    if (kb.id == `kanban${index}`){
                        kb.classList.add('flex');
                        kb.classList.remove('hidden');
                    }
                })
            }

            // toggle color of each kanban button
            kbButts.forEach(button => {
                button.addEventListener('click', function() {
                    kbButts.forEach(btn => {
                        // button visual
                        btn.classList.remove('bg-blue3', 'text-white1');
                        btn.classList.add('bg-white1', 'text-black1');
                    });
                    // button visual
                    this.classList.add('bg-blue3', 'text-white1');
                    this.classList.remove('bg-white1', 'text-black1');
                });
            });

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
        <?php endif; ?>
    </script>

    <script>
        function downloadPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            let groupNum = groupNumber;
            console.log('groupNum', groupNum);
            let yOffset = 30;

            doc.setFontSize(12);
            doc.text(`Group: ${groupNum}`, 10, 10);
            
            const pageHeight = doc.internal.pageSize.height;
            console.log('Group Data:', groupData)

            groupData.forEach(member => {
                doc.text(member.join(' | '), 30, yOffset);
                yOffset += 15;
            });

            doc.save('group_info.pdf');
        }
    </script>
</body>
</html>