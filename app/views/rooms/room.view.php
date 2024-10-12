<?php view('partials/head.view.php'); ?>
<body class="bg-white1 block w-screen h-fit overflow-x-hidden">
    <?php view('partials/nav.view.php')?>

    <main class="relative block left-1/2 transform -translate-x-1/2 h-[23.2rem] w-full top-32">
        <?php dd($stu_info) ?>
        <?php if (isset($errors['room_name'])) : ?>
            <p class="h-12 flex justify-center items-center font-synemed text-red1 text-2xl"><?= $errors['room_name'] ?></p>
        <?php endif; ?>

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
            <div id="delRoomConfirmation" class="hidden bg-glassmorphism fixed -top-24 left-0 h-screen w-screen justify-center">
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
                                <button class="bg-white2 h-10 w-36 flex items-center justify-center font-synereg text-lg border border-black1 rounded-lg" onclick="downloadPDF()">Print Groups</button>
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
            <?php 
            $members = [];
            $groupNum = 0;
            foreach ($decodedGroup as $index => $group) {
                $container = [];
                $bool = false;
                foreach ($group as $member) {
                    $container[] = $member;
                    if ($member[1] === $_SESSION['user']['school_id']) {
                        $bool = true;
                        $groupNum = $index+1;
                    }

                }
                if ($bool === true) {
                    $members = $container;
                }
            }
            ?>
            <!-- BODY -->
            <div class="flex w-10/12 mx-auto">
                <!-- left -->
                <div class="bg-white2 relative block mx-auto w-[30%] text-center justify-between items-center h-[40rem] border border-black1 px-6 py-4 rounded-2xl shadow-[inset_0_0_10px_rgba(255,255,255,1)]">
                    <!-- head -->
                    <div class="w-full py-2 flex">
                         <h1 class="font-synebold text-4xl text-left mx-auto ml-0">Group: <?php echo $groupNum ?></h1>
                         <button class="bg-white2 h-10 w-36 flex items-center justify-center font-synereg text-lg border border-black1 rounded-lg mx-auto mr-0" onclick="downloadPDF()">Print Group</button>
                    </div>
                     
                    <!-- content -->
                    <div class="w-full py-2">
                         <h1 class="text-xl flex my-2 py-4"> <span class="mx-auto w-2/6 text-left"><?php echo $members[0][0] ?></span><span class="mx-auto w-2/6 text-right"><?php echo $members[0][2] ?></span></h1>
                         <h1 class="text-xl flex my-2 py-4"> <span class="mx-auto w-2/6 text-left"><?php echo $members[1][0] ?></span><span class="mx-auto w-2/6 text-right"><?php echo $members[1][2] ?></span></h1>
                         <h1 class="text-xl flex my-2 py-4"> <span class="mx-auto w-2/6 text-left"><?php echo $members[2][0] ?></span><span class="mx-auto w-2/6 text-right"><?php echo $members[2][2] ?></span></h1>
                         <h1 class="text-xl flex my-2 py-4"> <span class="mx-auto w-2/6 text-left"><?php echo $members[3][0] ?></span><span class="mx-auto w-2/6 text-right"><?php echo $members[3][2] ?></span></h1>
                    </div>
     
                </div>
                
                <!-- right -->
                <div class="bg-white2 relative block mx-auto w-8/12 text-center justify-between items-center h-[40rem] border border-black1 rounded-2xl shadow-[inset_0_0_10px_rgba(255,255,255,1)] overflow-x-hidden overflow-y-auto font-synemed">
                    <!-- group tabs -->
                    <div class="flex w-full border-b border-black1">
                        <button id="button1" class="bg-blue2 w-1/4 mx-auto py-4 border-r border-black1"><?php echo $members[0][0] ?></button>
                        <button id="button2" class="bg-white1 w-1/4 mx-auto py-4 border-r border-l border-black1"><?php echo $members[1][0] ?></button>
                        <button id="button3" class="bg-white1 w-1/4 mx-auto py-4 border-r border-l border-black1"><?php echo $members[2][0] ?></button>
                        <button id="button4" class="bg-white1 w-1/4 mx-auto py-4 border-l border-black1"><?php echo $members[3][0] ?></button>
                    </div>
                    <!-- personal tabs -->
                    <div class="flex w-full border-b border-black1">
                        <button class="bg-orange1 w-2/6 mx-auto py-4 border-r border-black1">Working</button>
                        <button class="bg-white1 w-2/6 mx-auto py-4 border-r border-l border-black1">To-Do</button>
                        <button class="bg-white1 w-2/6 mx-auto py-4  border-l border-black1">Waiting</button>
                    </div>
                    <!-- whiteboard -->
                    <div class="block w-full h-fit min-h-[32.8rem] py-2 pt-4">
                        <!-- add -->
                        <div class="relative flex left-[100%] transform -translate-x-full w-fit pr-4 items-right">
                            <input class="pl-2 mx-4 border border-black1 rounded-lg" type="text" placeholder="Add new task">
                            <button class="px-2 bg-green1 rounded-lg">Add +</button>
                        </div>
                        <!-- lanes  -->
                        <div class="relative flex w-full p-2 mt-2 gap-2">
                            <!-- to do -->
                            <div class="w-1/3 bg-red-300 border border-black1 rounded-xl h-fit min-h-32 shadow-xl overflow-hidden">
                                <h1 class="font-synebold">To Do List:</h1>
                                <div class="p-2 border-t border-black1 cursor-grab" draggable="true">
                                    <h1 class="text-left text-lg font-synebold">Task 1</h1>
                                    <h1 class="text-left text-grey2 pl-4">Info</h1>
                                    <h1 class="text-left text-grey2 pl-4">target date</h1>
                                </div>
                                <div class="p-2 border-t border-black1 cursor-grab" draggable="true">
                                    <h1 class="text-left text-lg font-synebold">Task 2</h1>
                                    <h1 class="text-left text-grey2 pl-4">Info</h1>
                                    <h1 class="text-left text-grey2 pl-4">target date</h1>
                                </div>
                                <div class="p-2 border-t border-black1 cursor-grab" draggable="true">
                                    <h1 class="text-left text-lg font-synebold">Task 3</h1>
                                    <h1 class="text-left text-grey2 pl-4">Info</h1>
                                    <h1 class="text-left text-grey2 pl-4">target date</h1>
                                </div>
                            </div>
                            <!-- work in progress -->
                            <div class="w-1/3 bg-white2 border border-black1 rounded-xl h-fit min-h-32 shadow-xl overflow-hidden">
                                <h1 class="font-synebold">Work in progress:</h1>
                                <div class="p-2 border-t border-black1 cursor-grab" draggable="true">
                                    <h1 class="text-left text-lg font-synebold">Task 1</h1>
                                    <h1 class="text-left text-grey2 pl-4">Info</h1>
                                    <h1 class="text-left text-grey2 pl-4">target date</h1>
                                </div>
                                <div class="p-2 border-t border-black1 cursor-grab" draggable="true">
                                    <h1 class="text-left text-lg font-synebold">Task 2</h1>
                                    <h1 class="text-left text-grey2 pl-4">Info</h1>
                                    <h1 class="text-left text-grey2 pl-4">target date</h1>
                                </div>
                                <div class="p-2 border-t border-black1 cursor-grab" draggable="true">
                                    <h1 class="text-left text-lg font-synebold">Task 3</h1>
                                    <h1 class="text-left text-grey2 pl-4">Info</h1>
                                    <h1 class="text-left text-grey2 pl-4">target date</h1>
                                </div>
                            </div>
                            <!-- done -->
                            <div class="w-1/3 bg-green-300 border border-black1 rounded-xl h-fit min-h-32 shadow-xl overflow-hidden">
                                <h1 class="font-synebold">Done:</h1>
                                <div class="p-2 border-t border-black1 cursor-grab" draggable="true">
                                    <h1 class="text-left text-lg font-synebold">Task 1</h1>
                                    <h1 class="text-left text-grey2 pl-4">Info</h1>
                                    <h1 class="text-left text-grey2 pl-4">target date</h1>
                                </div>
                                <div class="p-2 border-t border-black1 cursor-grab" draggable="true">
                                    <h1 class="text-left text-lg font-synebold">Task 2</h1>
                                    <h1 class="text-left text-grey2 pl-4">Info</h1>
                                    <h1 class="text-left text-grey2 pl-4">target date</h1>
                                </div>
                                <div class="p-2 border-t border-black1 cursor-grab" draggable="true">
                                    <h1 class="text-left text-lg font-synebold">Task 3</h1>
                                    <h1 class="text-left text-grey2 pl-4">Info</h1>
                                    <h1 class="text-left text-grey2 pl-4">target date</h1>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>

    <?php view('partials/footer.view.php')?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
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
        const groupData = <?php echo json_encode($decodedGroup); ?>;
        

        function downloadPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            doc.setFontSize(12);
            doc.text("Groups:\n\n", 10, 10);
            
            let yOffset = 30;
            let groupNum = 1;
            const pageHeight = doc.internal.pageSize.height;

            groupData.forEach(group => {
                if (yOffset + 75 > pageHeight) {
                    doc.addPage();
                    yOffset = 30; // Reset yOffset for new page
                }
                
                doc.text(`Group ${groupNum}`, 20, yOffset);
                groupNum++;
                yOffset += 15;
                
                group.forEach(member => {
                    if (yOffset + 10 > pageHeight) {
                        doc.addPage();
                        yOffset = 10; // Reset yOffset for new page
                    }
                    doc.text(member.join(' | '), 30, yOffset);
                    yOffset += 15;
                });
                yOffset += 15; // Add extra space between groups
            });

            doc.save('group_info.pdf');
        }

        
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


    </script>
</body>
</html>