<?php view('partials/head.view.php'); ?>
<body class="block w-screen overflow-x-hidden bg-white1 h-fit">
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
                    } elseif ($member[1] === $_SESSION['user']['school_id'])  {
                        $bool = true;
                        $groupNum = $index+1;
                        // inistore ko role ng user(student) sa $studentRole, for checking kung pwede din sya mag add ng task sa kanban (line 265)
                        $studentRole = $member[2]; 
                    }
                }
                if ($bool === true) {
                    $members = $container;
                }  
            }
        }
    ?>
    
    <main class="relative block left-1/2 transform -translate-x-1/2 h-[23.2rem] w-full top-32">
        <?php if (isset($errors['room_name'])) : ?>
            <p class="flex items-center justify-center h-12 text-2xl font-synemed text-red1"><?= $errors['room_name'] ?></p>
        <?php endif; ?>

        <!-- Add task modal -->
        <div id="taskModal" class="absolute hidden w-screen h-screen -top-20 bg-glassmorphism z-[55]">
            <div class="relative block text-center left-1/2 top-1/3 transform -translate-x-1/2 -translate-y-1/3 w-[40%] h-fit bg-white1 border border-grey1 shadow-xl rounded-xl p-2">
                
                <div class="flex w-full">                        
                    <h1 class="block mx-auto mt-2 ml-2 text-xl text-left font-synebold text-grey2">Add Task</h1>
                    <button onclick="hide('taskModal'),clearModal()" class="pt-1 pr-2 mx-auto mr-2 text-3xl">X</button>
                </div>

                <!-- TODO: ADD VALUES INTO JSON -->
                    <div class="flex w-full">                        
                        <input class="block w-1/2 p-2 mx-auto my-2 ml-2 text-2xl border-b border-black bg-white1 font-synemed" placeholder="Task Name" name="task" id="taskName" required>
                        <input type="date" class="block w-1/4 p-2 mx-auto my-2 mr-2 border-b border-black bg-white1 font-synemed" placeholder="Date" name="date" id="taskDate">
                    </div>
                    
                    <div class="flex w-full">                        
                        <input class="block w-1/2 p-2 mx-auto my-2 ml-2 text-base border-b border-black bg-white1 font-synemed text-grey2" placeholder="Description" name="info" id="taskInfo">
                        <select class="block w-1/4 p-2 mx-auto my-2 mr-2 border-b border-black bg-white1 font-synemed text-grey2" name="destination" id="taskDestination">
                            <option class="text-grey2" value="todo">To do</option>
                            <option class="text-grey2" value="wip">Work in Progress</option>
                            <option class="text-grey2" value="done">Done</option>
                        </select>
                    </div>

                    <button type="submit" onclick="addTask()" class="p-0 px-10 mt-10 mb-4 text-lg rounded-lg bg-green1 text-black1 font-synebold">Add</button>

            </div>
        </div>
        

        <!-- HEADER -->
        <div id="roomName" class="relative flex items-center justify-between w-10/12 mb-6 transform -translate-x-1/2 left-1/2 h-fit">
            <div class="max-w-[64rem] flex flex-col truncate ">
                <span class="mr-1 text-3xl font-synebold text-black1"><?= $room_info['room_name'] ?></span>
                <span class="mr-1 text-2xl font-synemed text-grey2">Room Code: <?= $room_info['room_code'] ?></span>
                <span class="mb-2 mr-1 text-xl font-synereg text-grey2">Instructor: <?= $prof_name['f_name'], ' ', $prof_name['l_name'] ?></span>
            </div>
            
            <!-- gear button for prof -->
            <?php if ($_SESSION['user']['account_type'] === 'professor'):?>
                <button class="flex items-center justify-center w-10 h-10 mr-2 border rounded border-black1" onClick="show('changeRoomNameInput'); hide('roomName');">
                    <img class="w-8 h-8" src="assets/images/icons/settings.png">
                </button>
            
            <!-- prof name for student -->
            <?php elseif ($_SESSION['user']['account_type'] === 'student'):?>
                <h1 class="text-3xl font-synebold text-black1"><?= $prof_name['f_name'], ' ', $prof_name['l_name'] ?></h1>
            <?php endif; ?>
        </div>

        <!-- FOR PROF -->
        <?php if ($_SESSION['user']['account_type'] === 'professor'):?>
            <!-- HEADER.Change room name menu -->
            <div id="changeRoomNameInput" class="relative items-center justify-between hidden w-10/12 mt-10 transform -translate-x-1/2 left-1/2 h-fit">
                <div class="flex items-center w-fit justify-evenly ">
                    <button class="w-8 h-8 mx-2 bg-no-repeat bg-contain rounded bg-back" onClick="show('roomName'); hide('changeRoomNameInput');"></button>
    
                    <form method="POST" action="/room" class="flex w-[33rem] justify-between items-center">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="room" value="<?= htmlspecialchars($encodedRoomInfo, ENT_QUOTES, 'UTF-8') ?>">
                        <input type="hidden" name="edit" value="edit">
                        <input type="text" name="room_name"  class="h-10 px-4 border rounded-lg w-96 border-black1" placeholder="Change room name: <?= $room_info['room_name'] ?>" required>
                        <button class="h-8 p-1 border rounded bg-orange1 font-synemed border-black1" type="submit">Confirm Change</button>
                    </form>
                </div>
    
                <button onClick="show('delRoomConfirmation'); disableScroll();" class="flex items-center h-8 p-2 mr-2 text-center border rounded bg-red1 font-synereg text-white1 border-black1">Delete Room</button>
            </div>

            <!-- delete room confirmation modal -->
            <div id="delRoomConfirmation" class="fixed left-0 z-50 justify-center hidden w-screen h-screen justify-self-center bg-glassmorphism -top-24">
                <div class="relative flex flex-col h-48 border rounded-t-lg bg-white2 w-80 border-black1 top-1/3">
                    <div class="flex items-center justify-between h-20 border rounded-t-lg bg-blue3 border-black1">
                        <span class="w-4/5 pl-2 text-lg text-white1 font-synemed">Confirmation</span>
                        <button class="w-1/5 h-full rounded bg-red1" onClick="hide('delRoomConfirmation'); enableScroll();">X</button>
                    </div>
                    <form method="POST" action="/room" class="flex flex-col items-center h-64 p-2">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="room_id" value="<?= $room_info['room_id'] ?>">

                        <span class="text-2xl font-synebold text-red1">Delete:</span>
                        <span class="text-xl font-synemed">Room name</span>
                        <span class="text-lg font-synereg">FOREVER?</span>
                        <button type="submit" class="p-1 mt-2 border rounded bg-red1 text-white1 border-black1">Delete Room Forever</button>
                    </form>
                </div>
            </div>

            <!-- BODY -->
            <div class="relative flex items-center justify-between w-10/12 my-6 transform -translate-x-1/2 left-1/2 h-fit">
                <!-- LEFT BOX -->
                <div class="h-[37.5rem] w-[24%] border border-black1 rounded-xl overflow-hidden">
                    <!-- Tabs -->
                    <div class="flex">
                        <button id="stuListTab" onClick="show('studentListContainer'); hide('roomJoinRequest'); active('stuListTab', 'reqListTab', [['bg-blue3', 'text-white1'], ['bg-blue2', 'text-black1']], [['bg-blue2', 'text-black1'], ['bg-blue3', 'text-white1']]);" class="bg-blue3 h-[2.81rem] w-1/2 font-synereg text-white1">Students</button>
                        <button id="reqListTab" onClick="show('roomJoinRequest'); hide('studentListContainer'); active('reqListTab', 'stuListTab', [['bg-blue3', 'text-white1'], ['bg-blue2', 'text-black1']], [['bg-blue2', 'text-black1'], ['bg-blue3', 'text-white1']]);" class="bg-blue2 h-[2.81rem] w-1/2 font-synereg text-black1">Join Requests</button>
                    </div>

                    <!-- Students List -->
                    <div id="studentListContainer" class="h-[34.5rem] flex flex-col overflow-y-hidden overflow-x-hidden rounded-b-xl">
                        <!-- Student Count -->
                        <div class="flex items-center justify-center w-full h-12 p-4 border-t border-black1">
                            <span class="text-lg font-synemed">Total: </span>
                            <span id="studentCount" class="mx-1 text-xl font-synemed text-blue3"></span>
                            <span class="text-lg font-synemed">students.</span>
                        </div>

                        <!-- Student Names -->
                        <div id="roomStudentList" class="min-h-3/5 flex flex-col overflow-x-hidden overflow-y-auto rounded-b-xl">

                        </div>


                    </div>

                    <!-- Requests List -->
                    <div id="roomJoinRequest" class="hidden flex-col h-[34.5rem] overflow-y-auto overflow-x-hidden rounded-b-xl">

                    </div>

                    
                </div>

                <!-- RIGHT BOX -->
                <div id="rightBox" class="shadow-inside1 h-[37.5rem] w-[75%] rounded-xl flex justify-center items-center">
                    <?php if($roomHasGroup):?>
                        <!-- content -->
                        <div id="groupsContent" class="flex flex-col items-center w-full h-full overflow-y-auto ">
                            <!-- HEADER -->
                            <div class="flex items-center w-full h-20 p-6">
                                <span class="w-4/5 text-4xl font-synebold">GROUPS</span>
                        
                                <!-- downloadPDF groups btn -->
                                <button onclick="downloadPDF()" class="flex items-center justify-center h-10 text-lg border rounded-lg bg-white2 w-36 font-synereg border-black1">Print Groups</button>
                                <!-- edit groups btn -->
                                <a href="/groups?room_id=<?= $room_info['room_id'] ?>" class="flex items-center justify-center h-10 ml-4 text-lg border rounded-lg bg-blue2 w-36 font-synereg border-black1">Edit Groups</a>
                                    

                                    <!-- <form id="groupings" action="/groups" method="get">
                                        <input type="hidden" name="grouped" id="grouped" value="<?= htmlspecialchars($encodedGroup, ENT_QUOTES, 'UTF-8') ?>">
                                        <input type="hidden" name="room_id" value="<?= $room_id ?>">
                                        <button type="submit" class="h-10 text-lg border rounded-lg bg-blue2 w-36 font-synereg border-black1">Edit Groups</button>
                                    </form> -->
                            </div>
                    
                            <!-- Groups Container -->
                            <div id="groupsContainer" class="flex flex-wrap min-h-full w-full h-auto p-6 gap-y-5 justify-evenly">
                                <!-- Each Boxes -->

                            </div>
                    </div>


                    
                    <!-- NO GROUPS -->
                    <?php else: ?>
                        <div class="flex flex-col items-center">
                            <span class="text-4xl font-synebold">You haven't grouped the class yet.</span>

                            <!-- <form id="submitGroups" action="/room" method="POST">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="grouped" value="grouped">
                                <input type="hidden" name="genGroups" value="" id="genGroups">

                                <input type="hidden" name="room" value="<?//= htmlspecialchars($encodedRoomInfo, ENT_QUOTES, 'UTF-8') ?>">
                                <input type="hidden" name="filteredidNRiasec" id="filteredidNRiasec" value="<?//= htmlspecialchars($encodedFilteredidNRiasec, ENT_QUOTES, 'UTF-8') ?>"> 
                                <input type="hidden" name="stunotype" id="stunotype" value="<?//= count($stuNoType) ?>">
                                <button onclick="generateGroups();" class="bg-orange1 h-[3.13rem] w-[12.5rem] font-synebold text-xl border border-black1 rounded-lg mt-4">Generate groups</button>
                            </form> -->
                            
                            <form id="submitGroups" method="POST">
                                <!-- <input type="hidden" name="_method" value="PATCH"> -->
                                <input type="hidden" name="grouped" value="grouped">
                                <input type="hidden" name="filteredidNRiasec" id="filteredidNRiasec" value=""> 
                                <input type="hidden" name="stunotype" id="stunotype" value="">

                                <input id="genGroups" type="hidden" name="genGroups" value="">
                                <input type="hidden" name="room" value="<?= $_GET['room_id'] ?>">
                                <button onclick="generateGroups();" class="bg-orange1 h-[3.13rem] w-[12.5rem] font-synebold text-xl border border-black1 rounded-lg mt-4">Generate groups</button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php elseif ($_SESSION['user']['account_type'] === 'student'):?>
            <?php if(isset($decodedGroup)): ?>
                
                <?php //dd($members) ?>
                <!-- BODY -->
                <div class="flex w-10/12 mx-auto mb-32">
                    <!-- left -->
                    <div class="bg-white2 relative block mx-auto w-[26%] text-center justify-between items-center h-[40rem] border border-black1 px-6 py-4 rounded-2xl shadow-[inset_0_0_10px_rgba(255,255,255,1)]">
                        <!-- head -->
                        <div class="flex w-full py-2">
                            <h1 class="mx-auto ml-0 text-4xl text-left font-synebold">Group: <?php echo $groupNum ?></h1>
                            <button class="flex items-center justify-center h-10 mx-auto mr-0 text-lg border rounded-lg bg-white2 w-36 font-synereg border-black1" onclick="downloadPDF()">Print Group</button>
                        </div>
                        
                        <!-- members -->
                        <div class="w-full py-2">
                            <?php foreach ($members as $member){ ?>
                                <h1 class="flex py-4 my-2 text-xl"> <span class="w-2/6 mx-auto text-left"><?php echo $member[0]; ?></span><span class="w-2/6 mx-auto text-right"><?php echo $member[2]; ?></span></h1>
                                
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
                                    <div class="flex self-end pr-4 w-fit">
                                        <button onclick="show('taskModal')" class="px-10 border rounded-lg border-grey1 bg-green1">Add +</button>
                                    </div>
                                <?php endif; ?>

                                <!-- lanes  -->
                                <!-- changed id of lanes from todoCont => 3todoCont** first char = member index -->
                                <div class="relative flex w-full gap-2 p-2 mt-2">
                                    <!-- to do -->
                                    <div id="<?php echo $index; ?>todoCont" class="w-1/3 overflow-hidden bg-red-300 border shadow-xl group dropzone border-black1 rounded-xl h-fit min-h-32">
                                        <h1 class="border-b font-synebold border-black1">To Do List:</h1>

                                        <?php if (!empty($member[3])) {
                                            foreach($member[3] as $key => $room_kanban) {
                                                if($key == $_GET['room_id']) {
                                                    foreach($room_kanban['todo'] as $task) { ?>
                                                        <div class="block py-2 border-b card cursor-grab h-fit border-black1" draggable="true">                                                            
                                                            <div class="flex p-1 cursor-grab justify-evenly">
                                                                <span class="px-4 mx-auto ml-1 text-base text-left border-b font-synebold border-grey2 text-black1 text-wrap"><?= $task[0] ?></span>
                                                                <span class="pl-1 mx-auto mr-2 text-sm font-synemed text-black1 text-wrap"><?= $task[2] ?></span>
                                                            </div>
                                                                <span class="relative block ml-10 text-base text-left font-synereg text-black1 text-wrap"><?= $task[1] ?></span>
                                                        </div>
                                        <?php       }
                                                }
                                            }
                                        }
                                        ?>
                                    </div>                                
                                    <!-- work in progress -->
                                    <div id="<?php echo $index; ?>wipCont" class="w-1/3 overflow-hidden bg-blue-200 border shadow-xl dropzone border-black1 rounded-xl h-fit min-h-32">
                                        <h1 class="border-b font-synebold border-black1">Work in progress:</h1>
                                        <?php 
                                            if (!empty($member[3])) {
                                                foreach($member[3] as $key => $room_kanban) {
                                                    if($key == $_GET['room_id']) {
                                                        foreach($room_kanban['wip'] as $task) { ?>
                                                            <div class="block py-2 border-b card cursor-grab h-fit border-black1" draggable="true">                                                            
                                                                <div class="flex p-1 cursor-grab justify-evenly">
                                                                    <span class="px-4 mx-auto ml-1 text-base text-left border-b font-synebold border-grey2 text-black1 text-wrap"><?= $task[0] ?></span>
                                                                    <span class="pl-1 mx-auto mr-2 text-sm font-synemed text-black1 text-wrap"><?= $task[2] ?></span>
                                                                </div>
                                                                    <span class="relative block ml-10 text-base text-left font-synereg text-black1 text-wrap"><?= $task[1] ?></span>
                                                            </div>
                                        <?php           }
                                                    }
                                                }
                                            }
                                        ?>
                                    </div>
                                    <!-- done -->
                                    <div id="<?php echo $index; ?>doneCont" class="w-1/3 overflow-hidden bg-green-300 border shadow-xl dropzone border-black1 rounded-xl h-fit min-h-32">
                                        <h1 class="border-b font-synebold border-black1">Done:</h1>
                                        <?php 
                                            if (!empty($member[3])) {
                                                foreach($member[3] as $key => $room_kanban) {
                                                    if($key == $_GET['room_id']) {
                                                        foreach($room_kanban['done'] as $task) { ?>
                                                            <div class="block py-2 border-b card cursor-grab h-fit border-black1" draggable="true">                                                            
                                                                <div class="flex p-1 cursor-grab justify-evenly">
                                                                    <span class="px-4 mx-auto ml-1 text-base text-left border-b font-synebold border-grey2 text-black1 text-wrap"><?= $task[0] ?></span>
                                                                    <span class="pl-1 mx-auto mr-2 text-sm font-synemed text-black1 text-wrap"><?= $task[2] ?></span>
                                                                </div>
                                                                    <span class="relative block ml-10 text-base text-left font-synereg text-black1 text-wrap"><?= $task[1] ?></span>
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
                <div class="flex flex-col items-center mt-40">
                    <span class="text-4xl font-synebold text-red1">The instructor hasn't grouped the class yet.</span>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </main>

    <?php view('partials/footer.view.php')?>

    <script src="assets/js/shared-scripts.js"></script>
    <script src="assets/js/grouping.js"></script>
    <script src="assets/js/fetch/fetch.js"></script>

    <!-- FETCHING -->
    <script>
        const room_id = <?= $_GET['room_id']  ?>;
        let groupChecker = null;
        let studentsChecker = null;
        let requestsChecker = null;

        let studentsCount = 0;
        let membersCount = 0;
        let membersWarning = false;

        let membersWarningContent = `
            <div id="membersWarning" class="bg-red1 w-full h-10 flex items-center justify-center rounded-t-xl">
                <span class="text-base font-synebold text-white1">WARNING!:The number of members in the groups does not match the number of students in the room.</span>
            </div>
            <div class="w-full h-10 flex items-center justify-center rounded-t-xl">
                <button onclick="generateGroups();" class="bg-orange1 h-[3.13rem] w-[13rem] font-synebold text-base border border-black1 rounded-lg mt-4">Re-generate groups</button>
            </div>
        `;

        document.addEventListener('DOMContentLoaded', function() {
            const roomStudentList = document.getElementById('roomStudentList');
            const roomJoinRequest = document.getElementById('roomJoinRequest');
            const studentCount = document.getElementById('studentCount');

            fetchLatestData({
                "table1": "room_list",
                "table2": "join_room_requests",
                "room_id": <?= $_GET['room_id']  ?>,
                "currentPage": "room",
            }, displayStudents, 1000);

            fetchLatestData ({
                "table": "room_groups",
                "room_id": <?= $_GET['room_id']  ?>,
            }, displayGroups, 3000);

            setupFormSubmissions();
        });
        
        function setupFormSubmissions() {
            document.body.addEventListener('submit', function(e) {
                if (e.target && e.target.id && e.target.id.startsWith('kickForm')) {
                    console.log('e.target', e.target);
                    e.preventDefault();
                    const clickedButton = e.submitter;
                    submitForm(e.target.id, '/api/submit-form', 'kick_student', {
                        buttonID: clickedButton.id,
                        buttonName: clickedButton.name,
                        buttonValue: clickedButton.value,
                    });
                } else if (e.target && e.target.id && e.target.id.startsWith('requestForm')) {
                    console.log('e.target', e.target);
                    e.preventDefault();
                    const clickedButton = e.submitter;
                    submitForm(e.target.id, '/api/submit-form', 'handle_request', {
                        buttonID: clickedButton.id,
                        buttonName: clickedButton.name,
                        buttonValue: clickedButton.value,
                    });
                } else if (e.target && e.target.id && e.target.id.startsWith('submitGroups')) {
                    e.preventDefault();
                    submitForm(e.target.id, '/api/submit-form', 'group_students', {
                        genGroups: document.getElementById('genGroups').value,
                        room: <?= $_GET['room_id'] ?>,
                        filteredidNRiasec: document.getElementById('filteredidNRiasec').value,
                        stunotype: document.getElementById('stunotype').value,
                    });
                }
            });
        }

        function displayGroups(groupsList){
            console.log('studentsCount', studentsCount);
            console.log('membersCount', membersCount);
            let membersCounter = 0;

            if (groupsList.length > 0) {
                console.log('groupsList', groupsList);
                const parsedGroupsList = JSON.parse(groupsList[0]['groups_json']);

                parsedGroupsList.forEach(group => {
                    membersCounter += group.length;
                });

                console.log('membersCounter', membersCounter);

                // Checking whether members warning should be shown
                if (groupChecker !== null && studentsCount !== membersCount && membersWarning === false) {
                    membersWarning = true;
                    const groupsContent = document.getElementById('groupsContent');

                    groupsContent.innerHTML = membersWarningContent + groupsContent.innerHTML;
                } else if (membersWarning === true && studentsCount === membersCount)  {
                    membersWarning = false;
                    const groupsContent = document.getElementById('groupsContent');
                    groupsContent.innerHTML = groupsContent.innerHTML.replace(membersWarningContent, '');
                }

                // console.log('groups', typeof(parsedGroupsList));
                // console.log('groups', parsedGroupsList);

                if (groupChecker === null || JSON.stringify(groupChecker) !== JSON.stringify(parsedGroupsList)){
                    membersCount = membersCounter;

                    console.log('not equal');
                    console.log('parsedGroupsList', parsedGroupsList);
                    groupChecker = parsedGroupsList;


                    // const groupForGenerationForm = document.getElementById('submitGroups');
                    // const groupForGenerationValue = document.getElementById('filteredidNRiasec').value;

                    // if (groupForGenerationForm) {
                    //     console.log('groupForGeneration', groupForGeneration);
                    //     groupForGeneration.value = JSON.stringify(parsedGroupsList);
                    // }
                    // console.log('filteredidNRiasec', document.getElementById('filteredidNRiasec').value);

                    // MAY ERROR TO
                    const groupsContainer = document.getElementById('groupsContainer');
                    groupsContainer.innerHTML = '';

                    parsedGroupsList.forEach((group, index) => {
                        groupsContainer.innerHTML += `
                                    <a href="/view-group?room_id=${room_id}&group=${index}" class="bg-white1 h-auto max-w-[20rem] border flex flex-col overflow-hidden">
                                        <!-- Group Head -->
                                        <div class="flex items-center justify-center w-full h-10 bg-black1 ">
                                            <span class="text-4xl font-synemed text-white1">Group</span>
                                            <span class="ml-2 text-4xl font-synebold text-orange1">${index + 1}:</span>
                                        </div>
        
                                        <!-- Group Body -->
                                        <div id="groupBody${index}" class="w-full ">
                                            <!-- Each Member -->

                                        </div>
                                    </a>
                        `;

                        // add members to group body
                        group.forEach(member => {
                            member[0] = member[0].replace("+", " ");
                            document.getElementById(`groupBody${index}`).innerHTML += `
                                    <div class="h-[6.22875rem] w-full flex">
                                        <span class="flex items-center w-6/12 p-1 text-xl break-all border border-black1 font-synemed">${member[0]}</span>
                                        <span class="w-6/12  border border-black1 ${member[2] === 'Leader' ? 'text-orange1' : 'text-blue3'} flex justify-center items-center p-1 font-synemed text-xl">${member[2]}</span>
                                    </div>
                        `;
                        });
                    });
                } else {
                    // console.log('equal');
                }
             }
        }

        function submitForm(formId, url, type, params = {}) {
            console.log('beginning of submitForm');
            const form = document.getElementById(formId);
            if (!form) {
                console.log('form not found');
                return;
            }
            console.log('params', params);  

            console.log('form', form);

            // form.addEventListener('submit', function(e) {
                console.log('submit event');
                // e.preventDefault();
                let formData = new FormData(form);
                // formData.append('', )
                console.log('formData', formData);
                formData.append('form_type', type);

                Object.entries(params).forEach(([key, value]) => {
                    formData.append(key, value);
                });


                fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                console.log('Response:', data);
                })
                .catch(error => console.error('Fetch Error:', error));
            // });
        }

        function displayStudents(studentsList){
            studentsCount = studentsList.room_list.length;
            // console.log('studentsList', studentsList.room_list.length);

            if (studentsList.room_list.length === 0) {
                studentCount.innerHTML = `<span class="mx-1 text-xl font-synemed text-blue3">0</span>`;
                roomStudentList.innerHTML = `
                    <div class="flex flex-col items-center justify-center h-[34.5rem]">
                        <span class="text-lg font-synebold text-grey2 text-center">There are no students in this room yet.</span>
                    </div>
                `;
            } else if (studentsChecker === null || JSON.stringify(studentsChecker) !== JSON.stringify(studentsList.room_list)){
                console.log('not equal students');
                studentsChecker = studentsList.room_list;

                const idNRiasecInput = document.getElementById('filteredidNRiasec');
                // console.log(JSON.stringify(studentsList.student_has_result));
                if (idNRiasecInput) {  // pag naka show yung Generate Groups Button
                    idNRiasecInput.value = JSON.stringify(studentsList.student_has_result);
                }

                // UPDATING THE DOM:
                roomStudentList.innerHTML = '';
                roomJoinRequest.innerHTML = '';
                studentCount.innerHTML = '';
                
                studentCount.innerHTML = `<span class="mx-1 text-xl font-synemed text-blue3">${studentsList.room_list.length} </span>`;


                studentsList.room_list.forEach(student => {
                    roomStudentList.innerHTML += `
                        <div class="flex justify-between h-[3.75rem] w-full bg-blue1 border-t border-black1 p-4">
                            <a href="#" class="text-base font-synereg">${student.l_name}, ${student.f_name}</a>
                            <img src="assets/images/icons/cross.png" class="w-6 h-6 cursor-pointer" onClick="show('kickConfirmation${student.school_id}'); disableScroll(); clearInterval(intervalID);">
                        </div>

                        <div id="kickConfirmation${student.school_id}"  class="fixed z-50 justify-center hidden w-screen h-screen -left-20 bg-glassmorphism -top-24">
                            <div class="relative flex flex-col h-48 border rounded-t-lg bg-white2 w-80 border-black1 top-1/3">
                                <div class="flex items-center justify-between h-20 border rounded-t-lg bg-blue3 border-black1">
                                    <span class="w-4/5 pl-2 text-lg text-white1 font-synemed">Confirmation</span>
                                    <button class="w-1/5 h-full rounded bg-red1" onClick="hide('kickConfirmation${student.school_id}'); enableScroll(); fetchLatestData({'table1': 'room_list','table2': 'join_room_requests','room_id': <?= $_GET['room_id']  ?>,'currentPage': 'room',}, displayStudents, 3000);">X</button>
                                </div>
                                <form id="kickForm${student.school_id}" method="POST" class="flex flex-col items-center p-2 h-60">
                                    <span class="text-2xl font-synebold text-red1">Remove:</span>
                                    <span class="text-xl font-synemed">${student.l_name} ${student.f_name}</span>
                                    <span class="text-lg font-synereg">from this room?</span>
                                    <button type="submit" name="kick" value="${student.room_id},${student.school_id}" class="w-16 border rounded bg-red1 text-white1 border-black1">Confirm</button>
                                </form>
                            </div>
                        </div>
                    `;
                });
            } else {
                // console.log('equal students');
            }

            if (studentsList.join_room_requests.length === 0) {
                roomJoinRequest.innerHTML = `
                    <div class="flex flex-col items-center justify-center h-[34.5rem]">
                        <span class="text-xl font-synebold text-red1 text-center">Empty :(</span>
                        <span class="text-lg font-synebold text-grey2 text-center">No requests for now.</span>
                    </div>
                `;
            } else if (requestsChecker === null || JSON.stringify(requestsChecker) !== JSON.stringify(studentsList.join_room_requests)){
                console.log('not equal requests');
                requestsChecker = studentsList.join_room_requests;
                roomJoinRequest.innerHTML = '';

                studentsList.join_room_requests.forEach(request => {
                    roomJoinRequest.innerHTML += `
                        <div class="flex items-center justify-between w-full h-20 px-2 border bg-blue1 border-black1">
                            <div class="flex flex-col w-52">
                                <a href="#" class="text-base font-synereg">${request.l_name} ${request.f_name}</a>
                                <a href="#" class="text-sm font-synereg text-grey2">${request.school_id}</a>
                                <a href="#" class="truncate">
                                    <span class="text-sm font-synereg text-grey2">${request.email}</span>
                                </a>
                            </div>

                            <form id="requestForm${request.school_id}" method="POST" class="flex w-16 h-6 justify-evenly">
                                <button id="acceptButton${request.school_id}" class="w-6 h-6 bg-cover cursor-pointer bg-check" type="submit"  name="accept" value="${request.room_id},${request.school_id}"> </button>
                                <button id="declineButton${request.school_id}" class="w-6 h-6 bg-cover cursor-pointer bg-cross" type="submit" name="decline" value="${request.room_id},${request.school_id}"> </button>
                            </form>
                        </div>
                    `;
                });
            } else {
                // console.log('equal requests');
            }

            // console.log(studentsList);
        }
        
    </script>

    <!-- KANBAN Board -->
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
            const groupMembers = <?php echo json_encode($members); ?>;
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
                                    <div class="flex p-1 card cursor-grab justify-evenly" draggable="true">
                                        <span class="px-4 mx-auto ml-1 text-base text-left border-b font-synebold border-grey2 text-black1 text-wrap">${taskName}</span>
                                        <span class="pl-1 mx-auto mr-2 text-sm font-synemed text-black1 text-wrap">${taskDate}</span>
                                    </div>
                                        <span class="relative block ml-10 text-base text-left font-synereg text-black1 text-wrap">${taskInfo}</span>
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


    <!-- PDF GENERATION -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
    <script>
    // Set the worker source for PDF.js
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.worker.min.js';

    async function downloadPDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF({
            orientation: 'portrait',
            unit: 'mm',
            format: 'a4'
        });

        const backgroundPdf = await pdfjsLib.getDocument('/assets/images/ZealiaGroupsPDF.pdf').promise;
        const backgroundPage = await backgroundPdf.getPage(1);
        const viewport = backgroundPage.getViewport({ scale: 2 });
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');
        canvas.height = viewport.height;
        canvas.width = viewport.width;
        await backgroundPage.render({ canvasContext: context, viewport: viewport }).promise;
        const backgroundImage = canvas.toDataURL('image/png', 1.0);

        function addBackgroundAndSetup(doc) {
            doc.addImage(backgroundImage, 'PNG', 0, 0, 210, 297);
            doc.setFontSize(20);  // Increased font size
        }

        // Common footer information
        const userName = "<?php echo $_SESSION['user']['f_name'] . ' ' . $_SESSION['user']['l_name']; ?>";
        const roomName = "<?php echo $room_info['room_name']; ?>";
        const instructorName = "<?php echo $prof_name['f_name'] . ' ' . $prof_name['l_name']; ?>";
        const timestamp = new Date().toLocaleString(); // Get current timestamp
        const roomCode = "<?php echo $room_info['room_code']; ?>";

        <?php if ($_SESSION['user']['account_type'] === 'student'): ?>
            // Student view
            let groupNum = <?php echo json_encode($groupNum); ?>;
            let groupMembers = <?php echo json_encode($members); ?>;
            
            let cleanData = groupMembers.map(member => [
                member[0] || '',  // Name
                member[1] || '',  // Student Number
                member[2] || ''   // Role
            ]);

            addBackgroundAndSetup(doc);
            doc.setFontSize(40);
            doc.setTextColor(3, 52, 110);
            if (groupNum >= 10) {
                doc.text(`${groupNum}`, 54, 23);
            } else {
                doc.text(`${groupNum}`, 58, 23);
            }
              // Moved down to avoid overlapping with background
            doc.setFontSize(20);

            doc.autoTable({
                startY: 50,  // Adjusted start position
                head: [['Name', 'Student Number', 'Role']],
                body: cleanData,
                theme: 'grid',
                styles: { 
                    fontSize: 12, 
                    cellPadding: 3, 
                    textColor: [0, 0, 0], // Text color for body
                },
                headStyles: {
                    fillColor: [3, 52, 110], // Header background color (e.g., teal)
                    textColor: [255, 255, 255], // Header text color (e.g., white)
                    fontSize: 14, // Header font size
                    fontStyle: 'bold' // Header font style
                },
                margin: { top: 50, right: 20, bottom: 20, left: 20 },
                tableWidth: 170,  // Wider table
                didParseCell: function(data) {
                    // Change text color for the second column (index 1)
                    if (data.row.index !== undefined && data.row.index >= 0) {
                        // Change text color for the second column (index 1) in the body
                        if (data.column.index === 2) { // Check if it's the second column
                            data.cell.styles.textColor = [246, 134, 20]; // Set text color to red
                        }

                        if (data.column.index === 1) { // Check if it's the second column
                            doc.setFont("courier");
                            data.cell.styles.fontStyle = 'italic'; // Set text color to red
                            data.cell.styles.textColor = [128, 128, 128]; 
                        }

                        // Set font size for body cells
                        data.cell.styles.fontSize = 14; // Set font size for body cells
                        // Optionally, set a minimum height for the cells
                        data.cell.styles.minCellHeight = 10; // Minimum height for cells
                    }
                }
            });

            doc.setTextColor(128, 128, 128);
            doc.setFontSize(12);
             // Add footer with user name, room name, instructor name, and timestamp
            doc.text(`Generated by: ${userName}`, 20, doc.internal.pageSize.height - 50);
            doc.text(`Room Name: ${roomName}`, 20, doc.internal.pageSize.height - 40);
            doc.text(`Room Code: ${roomCode}`, 20, doc.internal.pageSize.height - 30);
            doc.text(`Instructor: ${instructorName}`, 20, doc.internal.pageSize.height - 20);
            doc.text(`Generated on: ${timestamp}`, 20, doc.internal.pageSize.height - 10);

            doc.save(`${roomCode}-group-${groupNum}.pdf`);
        <?php else: ?>
            // Professor view
            <?php
            $cleanGroupInfo = [];
            if (isset($decodedGroup[0])) {
                foreach ($decodedGroup as $index => $group) {
                    $container = [];
                    foreach ($group as $member) {
                        $container[] = [
                            $member[0] ?? '',  // Name
                            $member[1] ?? '',  // Student Number
                            $member[2] ?? ''   // Role
                        ];
                    }
                    $cleanGroupInfo[] = $container;
                }
             }
            ?>
            const groups = <?php echo json_encode($cleanGroupInfo); ?>;
            
            groups.forEach((group, index) => {
                if (index > 0) {
                    doc.addPage();
                }
                
                addBackgroundAndSetup(doc);
                doc.setFontSize(40);
                doc.setTextColor(3, 52, 110);

                if ((index + 1) >= 10) {
                    doc.text(`${index + 1}`, 54, 23);
                } else {
                    doc.text(`${index + 1}`, 58, 23);
                } 

                doc.setFontSize(20);

                doc.autoTable({
                    startY: 50,  // Adjusted start position
                    head: [['Name', 'Student Number', 'Role']],
                    body: group,
                    theme: 'grid',
                    styles: { 
                        fontSize: 12, 
                        cellPadding: 3, 
                        textColor: [0, 0, 0], // Text color for body
                    },
                    headStyles: {
                        fillColor: [3, 52, 110], // Header background color (e.g., teal)
                        textColor: [255, 255, 255], // Header text color (e.g., white)
                        fontSize: 14, // Header font size
                        fontStyle: 'bold' // Header font style
                    },
                    margin: { top: 50, right: 20, bottom: 20, left: 20 },
                    tableWidth: 170,  // Wider table
                    didParseCell: function(data) {
                        // Change text color for the second column (index 1)
                        if (data.row.index !== undefined && data.row.index >= 0) {
                            // Change text color for the second column (index 1) in the body
                            if (data.column.index === 2) { // Check if it's the second column
                                data.cell.styles.textColor = [246, 134, 20]; // Set text color to red
                            }

                            if (data.column.index === 1) { // Check if it's the second column
                                doc.setFont("courier");
                                data.cell.styles.fontStyle = 'italic'; // Set text color to red
                                data.cell.styles.textColor = [128, 128, 128];
                            }

                            // Set font size for body cells
                            data.cell.styles.fontSize = 14; // Set font size for body cells
                            // Optionally, set a minimum height for the cells
                            data.cell.styles.minCellHeight = 10; // Minimum height for cells
                        }
                    }
                });

                doc.setTextColor(128, 128, 128);
                doc.setFontSize(12);
                // Add footer with user name, room name, instructor name, and timestamp
                doc.text(`Generated by: ${userName}`, 20, doc.internal.pageSize.height - 50);
                doc.text(`Room Name: ${roomName}`, 20, doc.internal.pageSize.height - 40);
                doc.text(`Room Code: ${roomCode}`, 20, doc.internal.pageSize.height - 30);
                doc.text(`Instructor: ${instructorName}`, 20, doc.internal.pageSize.height - 20);
                doc.text(`Generated on: ${timestamp}`, 20, doc.internal.pageSize.height - 10);
            });

            doc.save(`all_groups_info-${roomCode}.pdf`);
        <?php endif; ?>
    }
    </script>
</body>
</html>
