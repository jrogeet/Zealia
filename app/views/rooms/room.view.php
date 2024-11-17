<?php view('partials/head.view.php'); ?>
<body class="block w-screen overflow-x-hidden bg-white h-fit">
    <?php view('partials/nav.view.php')?>

                                <!-- Delete Area -->
    <div id="deleteArea" class="fixed bottom-0 left-0 z-50 flex items-center justify-center hidden w-full h-24 transition-all duration-300 bg-red-500 opacity-0">
        <div class="flex items-center space-x-3 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            <span class="text-xl font-bold">Drop to Delete</span>
        </div>
    </div>
    
    <main class="relative block left-1/2 transform -translate-x-1/2 min-h-[23.2rem] h-auto w-full top-32">
        <!-- Loading Indicator -->
        <div id="loadingIndicator" class="fixed inset-0 z-50 flex items-center justify-center bg-white bg-opacity-75">
            <div class="flex flex-col items-center">
                <div class="w-12 h-12 mb-4 border-4 border-t-4 border-blue-500 rounded-full animate-spin"></div>
                <p class="text-xl font-satoshimed text-blue3">Loading...</p>
            </div>
        </div>
    
        <?php if (isset($errors['room_name'])) : ?>
            <p class="flex items-center justify-center h-12 text-2xl font-satoshimed text-red1"><?= $errors['room_name'] ?></p>
        <?php endif; ?>
        
        <!-- HEADER -->
        <div id="roomName" class="relative flex flex-col justify-between w-10/12 mb-6 transform -translate-x-1/2 left-1/2 h-fit">
            <div class="max-w-[64rem] flex flex-col truncate ">
                <span class="mr-1 text-3xl font-clashmed text-blackpri"><?= $room_info['room_name'] ?></span>
            </div>

            <div class="flex justify-between">
                <span class="mr-1 text-xl font-satoshimed text-blackless">Room Code: <?= $room_info['room_code'] ?></span>
                <!-- gear button for prof -->
                <?php if ($_SESSION['user']['account_type'] === 'instructor'):?>
                    <button class="flex items-center justify-center w-10 h-10 mr-2 border rounded border-black1" onClick="show('changeRoomNameInput'); hide('roomName');">
                        <img class="w-8 h-8" src="assets/images/icons/settings.png">
                    </button>
                
                <!-- prof name for student -->
                <?php elseif ($_SESSION['user']['account_type'] === 'student'):?>
                    <h1 class="text-xl font-satoshimed text-blackless">Instructor: <?= $prof_name['f_name'], ' ', $prof_name['l_name'] ?></h1>
                <?php endif; ?>
            </div>
        </div>

        <!-- FOR PROF -->
        <?php if ($_SESSION['user']['account_type'] === 'instructor'):?>
            <!-- HEADER.Change room name menu -->
            <div id="changeRoomNameInput" class="relative items-center justify-between hidden w-10/12 mt-10 transform -translate-x-1/2 left-1/2 h-fit">
                <div class="flex items-center w-fit justify-evenly ">
                    <button class="w-8 h-8 mx-2 bg-no-repeat bg-contain rounded bg-back" onClick="show('roomName'); hide('changeRoomNameInput');"></button>
    
                    <form method="POST" action="/room" class="flex w-[33rem] justify-between items-center">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="room" value="<?= htmlspecialchars($encodedRoomInfo, ENT_QUOTES, 'UTF-8') ?>">
                        <input type="hidden" name="edit" value="edit">
                        <input type="text" name="room_name"  class="h-10 px-4 border rounded-lg w-96 border-black1" placeholder="Change room name: <?= $room_info['room_name'] ?>" required>
                        <button class="h-8 p-1 border rounded bg-orange1 font-satoshimed border-black1" type="submit">Confirm Change</button>
                    </form>
                </div>
    
                <button onClick="showDeleteRoomConfirm('<?= $room_info['room_id'] ?>', '<?= $room_info['room_name'] ?>')" class="flex items-center h-8 p-2 mr-2 text-center text-white border rounded bg-red1 font-satoshimed border-black1">
                    Delete Room
                </button>
            </div>

            <!-- delete room confirmation modal -->
            <div id="delRoomConfirmation" class="fixed left-0 z-50 justify-center hidden w-screen h-screen justify-self-center bg-glassmorphism -top-24">
                <div class="relative flex flex-col h-48 border rounded-t-lg bg-white2 w-80 border-black1 top-1/3">
                    <div class="flex items-center justify-between h-20 border rounded-t-lg bg-blue3 border-black1">
                        <span class="w-4/5 pl-2 text-lg text-white font-satoshimed">Confirmation</span>
                        <button class="w-1/5 h-full rounded bg-red1" onClick="hide('delRoomConfirmation'); enableScroll();">X</button>
                    </div>
                    <form method="POST" action="/room" class="flex flex-col items-center h-64 p-2">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="room_id" value="<?= $room_info['room_id'] ?>">

                        <span class="text-2xl font-clashbold text-red1">Delete:</span>
                        <span class="text-xl font-satoshimed">Room name</span>
                        <span class="text-lg font-satoshimed">FOREVER?</span>
                        <button type="submit" class="p-1 mt-2 text-white border rounded bg-red1 border-black1">Delete Room Forever</button>
                    </form>
                </div>
            </div>

            <!-- BODY -->
            <div class="relative flex items-center justify-between w-10/12 my-6 transform -translate-x-1/2 left-1/2 h-fit">
                <!-- LEFT BOX -->
                <div class="h-[37.5rem] w-[24%] border border-black1 rounded-xl overflow-hidden">
                    <!-- Tabs -->
                    <div class="flex border-b border-black1">
                        <button id="stuListTab" onClick="show('studentListContainer'); hide('roomJoinRequest'); active('stuListTab', 'reqListTab', [['bg-blue3', 'text-white'], ['bg-blue2', 'text-black1']], [['bg-blue2', 'text-black1'], ['bg-blue3', 'text-white']]);" class="bg-blue3 h-[2.81rem] w-1/2 font-satoshimed text-white">Students</button>
                        <button id="reqListTab" onClick="show('roomJoinRequest'); hide('studentListContainer'); active('reqListTab', 'stuListTab', [['bg-blue3', 'text-white'], ['bg-blue2', 'text-black1']], [['bg-blue2', 'text-black1'], ['bg-blue3', 'text-white']]);" class="bg-blue2 h-[2.81rem] w-1/2 font-satoshimed text-black1">Join Requests</button>
                    </div>

                    <!-- Students List -->
                    <div id="studentListContainer" class="h-[34.5rem] flex flex-col overflow-y-hidden overflow-x-hidden rounded-b-xl">
                        <!-- Student Count -->
                        <div class="flex items-center justify-center w-full h-12 p-4 border border-black1">
                            <span class="text-lg font-satoshimed">Total: </span>
                            <span id="studentCount" class="mx-1 text-xl font-satoshimed text-blue3"></span>
                            <span class="text-lg font-satoshimed">students.</span>
                        </div>

                        <!-- Student Names -->
                        <div id="roomStudentList" class="flex flex-col overflow-x-hidden overflow-y-auto min-h-3/5 rounded-b-xl">

                        </div>
                    </div>

                    <!-- Requests List -->
                    <div id="roomJoinRequest" class="hidden flex-col h-[34.5rem] overflow-y-auto overflow-x-hidden rounded-b-xl">
                    </div>
                </div>

                <!-- RIGHT BOX -->
                <div id="rightBox" class="shadow-inside1 h-[37.5rem] w-[75%] rounded-xl flex justify-center items-center">
                </div>
            </div>
        <?php elseif ($_SESSION['user']['account_type'] === 'student'):?>
            <?php if(isset($decodedGroup)): ?>
                
                <?php //dd($members) ?>
                <!-- BODY -->
                <div class="flex w-10/12 mx-auto mb-32 rounded-xl shadow-inside1">
                    <!-- left -->
                    <div id="leftBoxStudent" class="flex flex-col w-3/12 text-center justify-between items-center h-[40rem] py-4 ">
                        <!-- head -->
                        <div id="leftBoxStudentHead" class="flex w-full py-2">
                            <!-- <h1 class="mx-auto ml-0 text-4xl text-left font-clashbold">Group: <?//php echo $groupNum ?></h1>
                            <button class="flex items-center justify-center h-10 mx-auto mr-0 text-lg border rounded-lg bg-white2 w-36 font-satoshimed border-black1" onclick="downloadPDF()">Print Group</button> -->
                        </div>
                        <!-- members -->
                         <!-- <div id="leftBoxStudentMembers" class="w-full py-2">
                        </div>-->
                        <div id="kanbanTabs" class="flex flex-col w-full">
                            
                        </div>

                        <button class="flex items-center justify-center h-10 mx-auto text-lg border rounded-lg bg-white2 w-36 font-satoshimed border-black1" onclick="downloadPDF()">Print Group</button>
                    </div>
                    
                    <!-- right -->
                    <div id="rightBoxStudent" class="w-9/12 text-center justify-between items-center min-h-[40rem] shadow-[inset_0_0_10px_rgba(255,255,255,1)] overflow-x-hidden overflow-y-auto font-satoshimed">
                        <!-- group tabs -->
                    </div>
                </div>
            <?php else: ?>
                <div class="flex flex-col items-center mt-40">
                    <span class="text-4xl font-clashbold text-red1">The instructor hasn't grouped the class yet.</span>
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
        const currentUserId = '<?= $_SESSION['user']['school_id'] ?>';
        // console.log('currentUserId', currentUserId);

        let groupChecker = null;
        let studentsChecker = null;
        let requestsChecker = null;

        let studentsCount = 0;
        let membersCount = 0;
        let membersWarning = false;
        let student_has_result = null;
        let student_no_result = null;

        let membersWarningContent = '';

        let members = [];
        let groupNum = 0;
        let studentRole = null;
        let currentKB = 0;
        let currentKBTab = parseInt(localStorage.getItem('lastSelectedTab')) || null;

        let isUpdatingKanban = false;
        let lastDisplayedMemberId = null;

        // const noSelectClass = studentRole === 'Principal Investigator' ? '' : 'cursor-grab select-none pointer-events-none';
        let noSelectClass = '';

        // let membersWarningContent = `
        //     <div id="membersWarning" class="flex items-center justify-center w-full h-10 bg-red1 rounded-t-xl">
        //         <span class="text-base text-white font-clashbold">WARNING!:The number of members in the groups does not match the number of students in the room.</span>
        //     </div>
        //     <div class="flex items-center justify-center w-full h-10 rounded-t-xl">
        //         <form id="submitGroups" method="POST">
        //             <input type="hidden" name="grouped" value="grouped">
        //             <input type="hidden" name="filteredidNRiasec" id="filteredidNRiasec" value="${JSON.stringify(student_has_result)}"> 
        //             <input type="hidden" name="stunotype" id="stunotype" value="${JSON.stringify(student_no_result)}">
        //             <input type="hidden" name="genGroups" id="genGroups" value="">
        //             <input type="hidden" name="room" value="${room_id}">
        //             <button onclick="generateGroups();" class="bg-orange1 h-[3.13rem] w-[13rem] font-clashbold text-base border border-black1 rounded-lg mt-4">Re-generate groups</button>
        //         </form>
        //     </div>
        // `;

        let loadingCount = 0;

        function showLoading() {
            loadingCount++;
            document.getElementById('loadingIndicator').classList.remove('hidden');
        }

        function hideLoading() {
            loadingCount--;
            if (loadingCount <= 0) {
                loadingCount = 0;
                document.getElementById('loadingIndicator').classList.add('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const roomStudentList = document.getElementById('roomStudentList');
            const roomJoinRequest = document.getElementById('roomJoinRequest');
            const studentCount = document.getElementById('studentCount');


            <?php if ($_SESSION['user']['account_type'] === 'instructor'): ?>
                showLoading();
                try {
                    fetchLatestData({
                        "table1": "room_list",
                        "table2": "join_room_requests",
                        "room_id": <?= $_GET['room_id']  ?>,
                        "currentPage": "room",
                    }, displayStudents, 1000); 
                } catch(error) {
                    console.error('Error fetching student data:', error);
                    // Show error message to user
                    const errorMessage = document.createElement('div');
                    errorMessage.className = 'text-red-500 text-center p-4';
                    errorMessage.textContent = 'Failed to load student data. Please refresh the page.';
                    roomStudentList.appendChild(errorMessage);
                } finally {
                    hideLoading();
                }
            <?php endif; ?>

            try {
                fetchLatestData ({
                    "table": "room_groups",
                    "room_id": <?= $_GET['room_id']  ?>,
                }, displayGroups, 3000);
            } catch(error) {
                console.error('Error fetching student data:', error);
                // Show error message to user
                const errorMessage = document.createElement('div');
                errorMessage.className = 'text-red-500 text-center p-4';
                errorMessage.textContent = 'Failed to load student data. Please refresh the page.';
                roomStudentList.appendChild(errorMessage);
            } finally {
                hideLoading();
            }

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
            if (isUpdatingKanban) {
                return;
            }
            showLoading();
            // console.log('studentsCount', studentsCount);
            // console.log('membersCount', membersCount);
            try {
                let membersCounter = 0;

                if (groupsList.length > 0 && groupsList[0]['groups_json'] !== 'null') {
                    // console.log('groupsList', groupsList);
                    const parsedGroupsList = JSON.parse(groupsList[0]['groups_json']);
                    // console.log('parsedGroupsList', parsedGroupsList);

                    members = [];

                    // for KANBAN and PDF generation
                    parsedGroupsList.forEach((group, index) => {
                        // console.log('group ', index + 1, ':', group);
                        let container = [];
                        let bool = false;
                        group.forEach(member => {
                            // console.log('member', member);
                            // console.log('my school id', '<?= $_SESSION['user']['school_id'] ?>');
                            container.push(member);
                            if (<?= $_SESSION['user']['account_type'] === 'instructor' ? 'true' : 'false' ?>) {
                                members[index + 1] = group;
                            } else if (member[1] === '<?= $_SESSION['user']['school_id'] ?>') {
                                // console.log('you r a member', member);
                                bool = true;
                                groupNum = index + 1;
                                studentRole = member[2];
                            }
                        });

                        if (bool === true) {
                            members = container;
                        }
                    });

                    // console.log('members', members);

                    // console.log('groupNum', groupNum);
                    // console.log('studentRole', studentRole);

                    // console.log('members', members);

                    // Checking whether members warning should be shown
                    <?php if ($_SESSION['user']['account_type'] === 'instructor'): ?>

                        parsedGroupsList.forEach(group => {
                            membersCounter += group.length;
                        });
                        
                        if (groupChecker !== null && studentsCount !== membersCount && membersWarning === false) {
                            membersWarning = true;
                            const groupsContent = document.getElementById('groupsContent');

                            groupsContent.innerHTML = membersWarningContent + groupsContent.innerHTML;
                        } else if (membersWarning === true && studentsCount === membersCount)  {
                            membersWarning = false;
                            const groupsContent = document.getElementById('groupsContent');
                            groupsContent.innerHTML = groupsContent.innerHTML.replace(membersWarningContent, '');
                        }
                    <?php endif; ?>

                    // console.log('groups', typeof(parsedGroupsList));
                    // console.log('groups', parsedGroupsList);

                    if (groupChecker === null || JSON.stringify(groupChecker) !== JSON.stringify(parsedGroupsList)){
                        membersCount = membersCounter;
                        console.log('Groups updated - refreshing UI');
                        console.log('not equal');
                        // console.log('parsedGroupsList', parsedGroupsList);
                        groupChecker = parsedGroupsList;

                        <?php if ($_SESSION['user']['account_type'] === 'instructor'): ?>
                            const rightBox = document.getElementById('rightBox');
                            if (!rightBox) {
                                console.error('rightBox element not found');
                                return;
                            }

                            rightBox.innerHTML = '';

                            rightBox.innerHTML = `
                                <div id="groupsContent" class="relative flex flex-col items-center w-full h-full overflow-y-hidden">
                                    <!-- HEADER -->
                                    <div class="flex items-center w-full h-20 p-6">
                                        <span class="w-4/5 text-4xl font-clashbold">GROUPS</span>
                                
                                        <!-- downloadPDF groups btn -->
                                        <button onclick="downloadPDF()" class="flex items-center justify-center h-10 text-lg border rounded-lg bg-white2 w-36 font-satoshimed border-black1">Print Groups</button>
                                        <!-- edit groups btn -->
                                        <a href="/groups?room_id=<?= $room_info['room_id'] ?>" class="flex items-center justify-center h-10 ml-4 text-lg border rounded-lg bg-blue2 w-36 font-satoshimed border-black1">Edit Groups</a>
                                    </div>

                                    <!-- Groups Container -->
                                    <div id="groupsContainer" class="flex flex-wrap w-full h-auto p-6 overflow-y-auto min-h-3/5 gap-y-5 justify-evenly">
                                        <!-- Each Boxes -->
                                    </div>
                                </div>
                            `;


                            const groupsContainer = document.getElementById('groupsContainer');
                            groupsContainer.innerHTML = '';

                            parsedGroupsList.forEach((group, index) => {
                                groupsContainer.innerHTML += `
                                            <a href="/view-group?room_id=${room_id}&group=${index}" class="bg-white h-auto max-w-[20rem] border flex flex-col overflow-hidden">
                                                <!-- Group Head -->
                                                <div class="flex items-center justify-center w-full h-10 bg-black1 ">
                                                    <span class="text-4xl text-white font-satoshimed">Group</span>
                                                    <span class="ml-2 text-4xl font-clashbold text-orange1">${index + 1}:</span>
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
                                                <span class="flex items-center w-6/12 p-1 text-xl break-all border border-black1 font-satoshimed">${member[0]}</span>
                                                <span class="w-6/12  border border-black1 ${member[2] === 'Leader' ? 'text-orange1' : 'text-blue3'} flex justify-center items-center p-1 font-satoshimed text-xl">${member[2]}</span>
                                            </div>
                                `;
                                });
                            });
                        <?php elseif ($_SESSION['user']['account_type'] === 'student'): ?>
                            noSelectClass = (studentRole === 'Principal Investigator' || members[currentKB][1] === currentUserId) ? '' : 'cursor-grab select-none pointer-events-none';
                            
                            if (isUpdatingKanban) {
                                isUpdatingKanban = false;
                                return;
                            }

                            // First, try to get the last selected tab from localStorage
                            let currentKBTab = parseInt(localStorage.getItem('lastSelectedTab'));

                            // If no stored tab or invalid tab number, find the appropriate default
                            if (currentKBTab === null || isNaN(currentKBTab) || currentKBTab >= members.length) {
                                // Try to find the user's own tab first
                                currentKBTab = members.findIndex(member => member[1] === currentUserId);
                                
                                // If user's tab not found, default to first tab (0)
                                if (currentKBTab === -1) {
                                    currentKBTab = 0;
                                }
                            }

                            // Update currentKB to match and save the current tab
                            currentKB = currentKBTab;
                            localStorage.setItem('lastSelectedTab', currentKBTab.toString());

                            const leftBoxStudentHead = document.getElementById('leftBoxStudentHead');
                            // const leftBoxStudentMembers = document.getElementById('leftBoxStudentMembers');
                            const rightBoxStudent = document.getElementById('rightBoxStudent');
                            const kanbanTabs = document.getElementById('kanbanTabs');

                            leftBoxStudentHead.innerHTML = '';
                            // leftBoxStudentMembers.innerHTML = '';

                            rightBoxStudent.innerHTML = '';
                            kanbanTabs.innerHTML = '';

                            leftBoxStudentHead.innerHTML = `
                                <h1 class="mx-auto text-4xl text-center font-clashbold">Group: ${groupNum}</h1>
                            `;

                            // members.forEach(member => {
                            //     leftBoxStudentMembers.innerHTML += `
                            //         <h1 class="flex py-4 my-2 text-xl"> <span class="w-2/6 mx-auto text-left">${member[0]}</span><span class="w-2/6 mx-auto text-right">${member[2]}</span></h1>
                            //     `;
                            // });

                            // rightBoxStudent.innerHTML = `
                            //     <!-- Delete Area -->
                            //     <div id="deleteArea" class="fixed bottom-0 left-0 z-50 flex items-center justify-center hidden w-full h-24 transition-all duration-300 bg-red-500 opacity-0">
                            //         <div class="flex items-center space-x-3 text-white">
                            //             <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            //                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            //             </svg>
                            //             <span class="text-xl font-bold">Drop to Delete</span>
                            //         </div>
                            //     </div>
                            // `;

                            members.forEach((member, index) => {
                                let separatedName = member[0].split(' ');
                                let lastName = separatedName.pop();

                                if (member[2] === 'Principal Investigator') {
                                    kanbanTabs.innerHTML += `
                                    <div onclick="changeKB(${index});" id="${member[1]}" class="flex pl-6 rounded-l-2xl border-l flex-col member ${index === currentKBTab ? 'bg-gradient-to-r from-greige to-whitecon': ''} text-black w-full py-4">
                                        <div class="flex items-center">
                                            <img src="assets/images/vectors/shapes/Zealia-Star-Yellow.svg" alt="star" class="h-4 ml-1 mr-1">
                                            <h6 class="text-xs font-satoshireg">${member[2]}</h6>
                                        </div>

                                        <div class="flex flex-col w-full">
                                            <span class="text-xl text-left font-clashbold">${lastName}</span>
                                            <span class="text-base text-left font-satoshireg">${separatedName.join(' ')}</span>
                                        </div>
                                    </div>
                                `;
                                } else {
                                    kanbanTabs.innerHTML += `
                                    <div onclick="changeKB(${index});" id="${member[1]}" class="flex pl-6 rounded-l-2xl border-l  flex-col member ${index === currentKBTab ? 'bg-gradient-to-r from-greige to-whitecon': ''} text-black w-full py-4 ">
                                        <h6 class="flex flex-col w-full text-left">${member[2]}</h6>
                                        <span class="text-xl text-left font-clashbold">${lastName}</span>
                                        <span class="text-base text-left font-satoshireg">${separatedName.join(' ')}</span>
                                    </div>
                                `;
                                }
                            });

                            
                            // Generate all kanbans
                            // let allKanbans = `
                            //     <!-- Delete Area -->
                            //     <div id="deleteArea" class="absolute bottom-0 left-0 z-50 flex items-center justify-center hidden w-full h-24 transition-all duration-300 bg-red-500 opacity-0">
                            //         <div class="flex items-center space-x-3 text-white">
                            //             <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            //                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            //             </svg>
                            //             <span class="text-xl font-bold">Drop to Delete</span>
                            //         </div>
                            //     </div>
                            // `;
                            let allKanbans = '';

                            members.forEach((member, index) => {
                                console.log('Generating kanban for member:', member);
                                console.log('Member kanban data:', member[3]); // Add this debug line

                                //<div id="kanban${index}" class="${member[1] === currentUserId ? (() => { currentKB = index; return 'flex'; })() : 'hidden'} flex-col items-right w-full h-fit min-h-[36.3rem] py-2 pt-4">
                                
                                if (currentKBTab === null && member[1] === currentUserId) {
                                    currentKBTab = index;
                                    currentKB = index;
                                }

                                allKanbans += `
                                    <div id="kanban${index}" 
                                        class="${index === currentKBTab ? 'flex' : 'hidden'}
                                            flex-col items-right w-full h-fit min-h-[36.3rem]">
                                        <div class="flex items-center justify-between min-h-[3.5rem]">
                                            <h1 class=" font-clashreg">Currently viewing <span class="font-clashmed">${member[0]}</span>'s board...</h1>
                                        <!-- add task button -->
                                            ${member[1] === currentUserId || studentRole === 'Principal Investigator' 
                                                ? '<div class="flex pr-4 w-fit"><button onclick="showTaskModal()" class="flex items-center justify-center h-10 mx-auto text-lg border rounded-lg bg-white2 w-36 font-satoshimed border-black1">Add Task</button></div>' 
                                                : ''
                                            }
                                        </div>


                                        <!-- lanes -->
                                        <div class="relative flex w-full min-h-full gap-2 mt-2">
                                            <!-- to do -->
                                            <div id="${index}todoCont" class="w-1/3 min-h-[33.8rem] overflow-hidden bg-whitecon group dropzone rounded-xl">
                                                <h1 class="px-3 py-3 text-left text-white border-b bg-blackless font-clashsemibold border-black1">To Do List:</h1>
                                                ${generateTaskList(member[1], member[3], 'todo', room_id)}
                                            </div>

                                            <!-- work in progress -->
                                            <div id="${index}wipCont" class="w-1/3 min-h-[33.8rem] overflow-hidden bg-whitecon group dropzone rounded-xl">
                                                <h1 class="px-3 py-3 text-left text-white border-b bg-blackless font-clashsemibold border-black1">Work in progress:</h1>
                                                ${generateTaskList(member[1], member[3], 'wip', room_id)}
                                            </div>

                                            <!-- done -->
                                            <div id="${index}doneCont" class="w-1/3 min-h-[33.8rem] overflow-hidden bg-whitecon group dropzone rounded-xl">
                                                <h1 class="px-3 py-3 text-left text-white border-b bg-blackless font-clashsemibold border-black1">Done:</h1>
                                                ${generateTaskList(member[1], member[3], 'done', room_id)}
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });
                            // Insert all kanbans after the tabs
                            rightBoxStudent.innerHTML += allKanbans;
                            attachDragAndDropListeners();
                        <?php endif; ?>

                        // Helper function to generate task list HTML
                        // function generateTaskList(memberData, listType, roomId) {
                        //     if (!memberData || !Array.isArray(memberData)) return '';

                        //     return memberData.reduce((html, roomKanban) => {
                        //         if (roomKanban.room_id != roomId) return html;

                        //         const tasks = roomKanban[listType] || [];
                        //         return html + tasks.map(task => `
                        //             <div class="block py-2 border-b card cursor-grab h-fit border-black1" draggable="true">
                        //                 <div class="flex p-1 cursor-grab justify-evenly">
                        //                     <span class="px-4 mx-auto ml-1 text-base text-left border-b font-clashbold border-grey2 text-black1 text-wrap">${task[0]}</span>
                        //                     <span class="pl-1 mx-auto mr-2 text-sm font-satoshimed text-black1 text-wrap">${task[2]}</span>
                        //                 </div>
                        //                 <span class="relative block ml-10 text-base text-left font-satoshimed text-black1 text-wrap">${task[1]}</span>
                        //             </div>
                        //         `).join('');
                        //     }, '');
                        // }

                        function generateTaskList(memberId, memberData, listType, roomId) {
                            console.log('MEMBERDATA', memberData);

                            console.log('Generating task list:', {
                                memberId,
                                memberData,
                                listType,
                                roomId
                            });
                            
                            // Check if memberData exists and has the expected structure
                            if (!memberData || typeof memberData !== 'object') {
                                console.log('No task data available for', listType);
                                return '';
                            }

                            // Check if room data exists
                            if (!memberData[roomId]) {
                                console.log('No data for room:', roomId);
                                return '';
                            }

                            // Get the tasks for this list type
                            const tasks = memberData[roomId][listType];
                            if (!tasks || !Array.isArray(tasks)) {
                                console.log('No tasks found for', listType);
                                return '';
                            }

                            let myKanban = memberId === currentUserId;

                            // let myKanban = false;
                            // if (memberId === currentUserId) {
                            //     myKanban = true;
                            // } else {
                            //     myKanban = false;
                            // }

                            console.log('memberData', typeof(memberData[roomId][listType][0]));
                            console.log('memberData.listType', typeof(memberData[roomId][listType]));

                            console.log('tasks', tasks);

                            return tasks.map(task => {
                                const isOwnKanban = memberId === currentUserId;
                                const canDrag = studentRole === 'Principal Investigator' || isOwnKanban;

                                // Add background colors based on list type
                                const bgColor = {
                                    'todo': 'bg-rederr',
                                    'wip': 'bg-blue2',
                                    'done': 'bg-greensuccess'
                                }[listType];

                                const borderColor = {
                                    'todo': 'border-rederr',
                                    'wip': 'border-blue2',
                                    'done': 'border-greensuccess'
                                }[listType];

                                let taskData = task;
                                if (typeof task === 'string') {
                                    try {
                                        taskData = JSON.parse(task);
                                    } catch (e) {
                                        console.error('Error parsing task:', e);
                                        return '';
                                    }
                                }

                                let date = new Date(taskData[2]);
                                let formattedDate = date.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });

                                return `
                                    <div class="flex border mt-2 ${borderColor} flex-col w-full min-h-32 p-2 h-auto max-w-full mb-4 card rounded-xl ${bgColor} bg-opacity-30 ${canDrag ? 'cursor-grab' : 'select-none pointer-events-none'}" draggable="${canDrag}">
                                        <div class="flex px-2 bg-white border rounded-xl w-fit">
                                            <span class="text-xs text-left font-satoshimed text-wrap text-blackpri">${formattedDate}</span>
                                        </div>
                                        
                                        <!-- Task Title & Task Description -->
                                        <div class="${canDrag ? 'cursor-grab' : ''} min-h-[2.28rem] flex items-center w-full">
                                            <span class="w-full text-lg text-left text-black break-words font-satoshireg">${taskData[0]}</span>
                                        </div>
                                        
                                        <div class="w-full border-t border-black">
                                            <p class="text-base text-left break-words whitespace-normal font-satoshilight text-blackpri">
                                                ${taskData[1]}
                                            </p>
                                        </div>
                                    </div>
                                `;
                            }).join('');
                        }

                        // Function to reattach drag and drop listeners
                        function attachDragAndDropListeners() {
                            const cards = document.querySelectorAll('.card');
                            const dropzones = document.querySelectorAll('.dropzone');
                            const deleteArea = document.getElementById('deleteArea');

                            // Add delete area event listeners
                            deleteArea.addEventListener('dragover', function(e) {
                                e.preventDefault();
                                this.classList.add('bg-red-600'); // Visual feedback
                            });

                            deleteArea.addEventListener('dragleave', function() {
                                this.classList.remove('bg-red-600');
                            });

                            deleteArea.addEventListener('drop', function(e) {
                                e.preventDefault();
                                this.classList.remove('bg-red-600');
                                
                                const curTask = document.querySelector(".dragging");
                                if (!curTask) return;

                                // Get task data
                                const taskName = curTask.querySelector('.font-satoshireg').textContent;
                                const taskDate = curTask.querySelector('.font-satoshimed').textContent;
                                const taskInfo = curTask.querySelector('.font-satoshilight').textContent;

                                // Process deletion
                                processUpdateKanban('delete', [taskName, taskInfo, taskDate], 'delete')
                                    .then(() => {
                                        curTask.remove();
                                    })
                                    .catch(error => {
                                        console.error('Error deleting task:', error);
                                    });
                            });

                            cards.forEach(card => {
                                const isCurrentUserKanban = members[currentKB][1] === currentUserId;

                                if (studentRole === 'Principal Investigator' || isCurrentUserKanban) {
                                    console.log('isCurrentUserKanban', isCurrentUserKanban);
                                    card.addEventListener('dragstart', function() {
                                        card.classList.add("dragging");
                                        card.classList.remove("cursor-grab");
                                        card.classList.add("cursor-grabbing");
                                        
                                        // Show delete area
                                        deleteArea.classList.remove('hidden');
                                        setTimeout(() => {
                                            deleteArea.classList.remove('opacity-0');
                                        }, 0);
                                    });

                                    card.addEventListener('dragend', function() {
                                        card.classList.remove("dragging");
                                        card.classList.remove("cursor-grabbing");
                                        card.classList.add("cursor-grab");
                                        
                                        // Hide delete area
                                        deleteArea.classList.add('opacity-0');
                                        setTimeout(() => {
                                            deleteArea.classList.add('hidden');
                                        }, 300);
                                    });
                                }
                            });

                            dropzones.forEach(zone => {
                                zone.addEventListener('dragover', function(e) {
                                    const isCurrentUserKanban = members[currentKB][1] === currentUserId;
                                    if (!(studentRole === 'Principal Investigator' || isCurrentUserKanban)) {
                                        return;
                                    }
                                    
                                    e.preventDefault();
                                    const bottomTask = InsertAboveTask(zone, e.clientY);
                                    const curTask = document.querySelector(".dragging");
                                    
                                    if (!bottomTask) {
                                        zone.appendChild(curTask);
                                    } else {
                                        zone.insertBefore(curTask, bottomTask);
                                    }
                                });

                                zone.addEventListener('drop', function(e) {
                                    e.preventDefault();
                                    const curTask = document.querySelector(".dragging");
                                    if (!curTask) return;

                                    // Get the new destination column
                                    const newDestination = zone.id.replace(`${currentKB}`, '').replace('Cont', ''); // 'todo', 'wip', or 'done'
                                    
                                    // Update the background color based on new destination
                                    curTask.classList.remove('bg-rederr', 'bg-blue2', 'bg-greensuccess');
                                    curTask.classList.remove('border-rederr', 'border-blue2', 'border-greensuccess');
                                    const newBgColor = {
                                        'todo': 'bg-rederr',
                                        'wip': 'bg-blue2',
                                        'done': 'bg-greensuccess'
                                    }[newDestination];
                                    const newBorderColor = {
                                        'todo': 'border-rederr',
                                        'wip': 'border-blue2',
                                        'done': 'border-greensuccess'
                                    }[newDestination];
                                    
                                    curTask.classList.add(newBgColor);
                                    curTask.classList.add(newBorderColor);
                                    
                                    // Update the data-list-type attribute
                                    curTask.setAttribute('data-list-type', newDestination);

                                    // Get task data from the DOM element
                                    const taskName = curTask.querySelector('.font-satoshireg').textContent;
                                    const taskDate = curTask.querySelector('.font-satoshimed').textContent;
                                    const taskInfo = curTask.querySelector('.font-satoshilight').textContent;

                                    processUpdateKanban('move', [taskName, taskInfo, taskDate], newDestination)
                                        .then(() => {
                                            zone.appendChild(curTask);
                                            curTask.classList.remove("cursor-grabbing");
                                            curTask.classList.add("cursor-grab");
                                        })
                                        .catch(error => {
                                            console.error('Error moving task:', error);
                                        });
                                });
                            });
                        }

                    } else {
                        // console.log('equal');
                    }
                } else if (groupsList.length === 0 || groupsList[0]['groups_json'] === 'null') {
                    const rightBox = document.getElementById('rightBox');
                    rightBox.innerHTML = '';

                    if (<?= $_SESSION['user']['account_type'] === 'student' ? 'true' : 'false' ?>) {
                        // console.log('student');
                    } else if (<?= $_SESSION['user']['account_type'] === 'instructor' ? 'true' : 'false' ?>) {
                        // console.log('student_has_result', student_has_result);
                        rightBox.innerHTML = `
                            <div id="profNoGroups" class="flex flex-col items-center">
                                <span class="text-4xl font-clashbold">You haven't grouped the class yet.</span>
                                
                                <form id="submitGroups" method="POST">
                                    <input type="hidden" name="grouped" value="grouped">
                                    <input type="hidden" name="filteredidNRiasec" id="filteredidNRiasec" value='${JSON.stringify(student_has_result)}'>
                                    <input type="hidden" name="stunotype" id="stunotype" value="">

                                    <input id="genGroups" type="hidden" name="genGroups" value="">
                                    <input type="hidden" name="room" value="<?= $_GET['room_id'] ?>">
                                    <button onclick="generateGroups();" class="bg-orange1 h-[3.13rem] w-[12.5rem] font-clashbold text-xl border border-black1 rounded-lg mt-4">Generate groups</button>
                                </form>
                            </div>
                        `;
                    }
                }
            } catch (error) {
                console.error('Error displaying groups:', error);
                // Optionally show error to user
                alert('Error loading groups. Please try again later.');
            } finally {
                hideLoading();
            }
            
        }

        function processUpdateKanban(action, taskData, destination) {
            isUpdatingKanban = true;

            const formData = new FormData();
            formData.append('school_id', members[currentKB][1]);
            formData.append('task', JSON.stringify(taskData));
            formData.append('destination', destination);
            formData.append('room_id', room_id);
            formData.append('form_type', 'update_kanban');
            if (action) formData.append('action', action);

            return fetch('/api/submit-form', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    throw new Error(data.message || 'Failed to update kanban');
                }
                return data;
            })
            .finally(() => {
                setTimeout(() => {
                    isUpdatingKanban = false;
                }, 1000);
            })
        }

        function submitForm(formId, url, type, params = {}) {
            console.log('beginning of submitForm');
            const form = document.getElementById(formId);
            if (!form) {
                console.error('Form not found:', formId);
                return;
            }

            let formData = new FormData(form);
            formData.append('form_type', type);

            Object.entries(params).forEach(([key, value]) => {
                formData.append(key, value);
            });

            fetch(url, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (!data) {
                    // throw new Error('No data received from server');
                }
                
                console.log('Response:', data);
                
                if (type === 'group_students') {
                    if (data.success) {
                        // Reset the group checker to force a UI update
                        groupChecker = null;
                        membersWarning = false;
                        
                        // Force fetch new data
                        fetchLatestData({
                            "table": "room_groups",
                            "room_id": room_id,
                        }, displayGroups, 3000);
                        
                        // Also fetch latest student data
                        fetchLatestData({
                            "table1": "room_list",
                            "table2": "join_room_requests",
                            "room_id": room_id,
                            "currentPage": "room",
                        }, displayStudents, 1000);
                    } else {
                        console.error('Error generating groups:', data.message);
                        alert('Error generating groups: ' + data.message);
                    }
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                alert('Error submitting form: ' + error.message);
            });
        }

        function displayStudents(studentsList){
            showLoading();

            try {
                studentsCount = studentsList.room_list.length;
                // console.log('studentsList', studentsList.room_list.length);

                // if (student_has_result === null || JSON.stringify(student_has_result) !== JSON.stringify(studentsList.student_has_result)){
                //     student_has_result = studentsList.student_has_result;
                // }

                // if (student_no_result === null || JSON.stringify(student_no_result) !== JSON.stringify(studentsList.student_no_result)){
                //     student_no_result = studentsList.student_no_result;
                // }

                if (studentsList.student_has_result) {
                    student_has_result = studentsList.student_has_result;
                    
                    // Update warning content with latest data
                    membersWarningContent = `
                        <div id="membersWarning" class="flex items-center justify-center w-full h-10 bg-red1 rounded-t-xl">
                            <span class="text-base text-white font-clashbold">WARNING!: The number of members in the groups does not match the number of students in the room.</span>
                        </div>
                        <div class="flex items-center justify-center w-full h-10 rounded-t-xl">
                            <form id="submitGroups" method="POST">
                                <input type="hidden" name="grouped" value="grouped">
                                <input type="hidden" name="filteredidNRiasec" id="filteredidNRiasec" value='${JSON.stringify(student_has_result)}'>
                                <input type="hidden" name="stunotype" id="stunotype" value="">
                                <input type="hidden" name="genGroups" id="genGroups" value="">
                                <input type="hidden" name="room" value="${room_id}">
                                <button onclick="generateGroups();" class="bg-orange1 h-[3.13rem] w-[13rem] font-clashbold text-base border border-black1 rounded-lg mt-4">Re-generate groups</button>
                            </form>
                        </div>
                    `;
                }


                // Force check warning state on every update
                const groupsContent = document.getElementById('groupsContent');
                if (groupsContent) {
                    if (studentsCount !== membersCount) {
                        if (!membersWarning) {
                            membersWarning = true;
                            groupsContent.innerHTML = membersWarningContent + groupsContent.innerHTML;
                        }
                    } else if (membersWarning) {
                        membersWarning = false;
                        groupsContent.innerHTML = groupsContent.innerHTML.replace(membersWarningContent, '');
                    }
                }

                if (studentsList.room_list.length === 0) {
                    studentCount.innerHTML = `<span class="mx-1 text-xl font-satoshimed text-blue3">0</span>`;
                    roomStudentList.innerHTML = `
                        <div class="flex flex-col items-center justify-center h-[34.5rem]">
                            <span class="text-lg text-center font-clashbold text-grey2">There are no students in this room yet.</span>
                        </div>
                    `;
                } else if (studentsChecker === null || JSON.stringify(studentsChecker) !== JSON.stringify(studentsList.room_list)){
                    console.log('not equal students');
                    studentsChecker = studentsList.room_list;

                    // const idNRiasecInput = document.getElementById('filteredidNRiasec');
                    // // console.log(JSON.stringify(studentsList.student_has_result));
                    // if (idNRiasecInput) {  // pag naka show yung Generate Groups Button
                    //     idNRiasecInput.value = JSON.stringify(student_has_result);
                    // }

                    if (groupChecker !== null && studentsCount !== membersCount && membersWarning === false) {
                        membersWarning = true;
                        const groupsContent = document.getElementById('groupsContent');

                        groupsContent.innerHTML = membersWarningContent + groupsContent.innerHTML;
                    } else if (membersWarning === true && studentsCount === membersCount)  {
                        membersWarning = false;
                        const groupsContent = document.getElementById('groupsContent');
                        groupsContent.innerHTML = groupsContent.innerHTML.replace(membersWarningContent, '');
                    }

                    // UPDATING THE DOM:
                    roomStudentList.innerHTML = '';
                    roomJoinRequest.innerHTML = '';
                    studentCount.innerHTML = '';
                    
                    studentCount.innerHTML = `<span class="mx-1 text-xl font-satoshimed text-blue3">${studentsList.room_list.length}</span>`;

                    studentsList.room_list.forEach(student => {
                        roomStudentList.innerHTML += `
                            <div class="flex justify-between h-[3.75rem] w-full bg-blue1 border-t border-black1 p-4">
                                <a href="#" class="text-base font-satoshimed">${student.l_name}, ${student.f_name}</a>
                                <img src="assets/images/icons/cross.png" class="w-6 h-6 cursor-pointer" onClick="show('kickConfirmation${student.school_id}'); disableScroll(); clearInterval(intervalID);">
                            </div>

                            <div id="kickConfirmation${student.school_id}"  class="fixed left-0 z-50 justify-center hidden w-screen h-screen bg-glassmorphism -top-24">
                                <div class="relative flex flex-col h-48 border rounded-t-lg bg-white2 w-80 border-black1 top-1/3">
                                    <div class="flex items-center justify-between h-20 border rounded-t-lg bg-blue3 border-black1">
                                        <span class="w-4/5 pl-2 text-lg text-white font-satoshimed">Confirmation</span>
                                        <button class="w-1/5 h-full rounded bg-red1" onClick="hide('kickConfirmation${student.school_id}'); enableScroll(); fetchLatestData({'table1': 'room_list','table2': 'join_room_requests','room_id': <?= $_GET['room_id']  ?>,'currentPage': 'room',}, displayStudents, 3000);">X</button>
                                    </div>
                                    <form id="kickForm${student.school_id}" method="POST" class="flex flex-col items-center p-2 h-60">
                                        <span class="text-2xl font-clashbold text-red1">Remove:</span>
                                        <span class="text-xl font-satoshimed">${student.l_name} ${student.f_name}</span>
                                        <span class="text-lg font-satoshimed">from this room?</span>
                                        <button onclick="enableScroll();" type="submit" name="kick" value="${student.room_id},${student.school_id}" class="w-16 text-white border rounded bg-red1 border-black1">Confirm</button>
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
                            <span class="text-xl text-center font-clashbold text-red1">Empty :(</span>
                            <span class="text-lg text-center font-clashbold text-grey2">No requests for now.</span>
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
                                    <a href="#" class="text-base font-satoshimed">${request.l_name} ${request.f_name}</a>
                                    <a href="#" class="text-sm font-satoshimed text-grey2">${request.school_id}</a>
                                    <a href="#" class="truncate">
                                        <span class="text-sm font-satoshimed text-grey2">${request.email}</span>
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
            }catch (error) {
                console.error('Error displaying students:', error);
                // Optionally show error to user
                alert('Error loading student list. Please try again later.');
            } finally {
                hideLoading();
            }
            
            
        }
        
    </script>

    <!-- KANBAN Board -->
    <script>
        // function generateGroups() {
        //     // const rows = <?//php //echo $encodedFilteredidNRiasec; ?>;
        //     createList(<?//php echo $encodedFilteredidNRiasec; ?>)
        //     groupRoles(PI)
        //     groupRoles(writer)
        //     groupRoles(dev)
        //     groupRoles(des)
        //     distributeRoles()
        //     // display()
        // }

        <?php if ($_SESSION['user']['account_type'] === 'student'): ?>
            console.log('currentKB', currentKB);
            // const StudButt = document.getElementById('StudButt');
            // const GrButt = document.getElementById('GrButt');
            // const students = document.getElementById('students');
            // const groupContent = document.getElementById('groups');
            const groupMembers = members;
            const groupNumber = groupNum;

            const kbButts = document.querySelectorAll('.member');
            const dropzones = document.querySelectorAll('.dropzone');
            let cards = document.querySelectorAll('.card');
 
            // let currentKB = currentKB;

            function addTask() {
                // Get values from the modal inputs
                const taskName = document.getElementById('taskName').value;
                const taskDate = document.getElementById('taskDate').value;
                const taskInfo = document.getElementById('taskInfo').value;
                const taskDestination = document.getElementById('taskDestination').value;
                
                // Validate inputs
                if (!taskName.trim()) {
                    alert('Task name is required');
                    return;
                }

                // console.log('DESTINASYON: ', taskDestination);

                // Create the task array
                const newTask = [taskName, taskInfo, taskDate];

                processUpdateKanban(null, newTask, taskDestination)
                .then(() => {
                    // Add UI update code here
                    const container = document.getElementById(`${currentKB}${taskDestination}Cont`);
                    const newCard = document.createElement('div');
                    const canDrag = studentRole === 'Principal Investigator' || members[currentKB][1] === currentUserId;

                    newCard.setAttribute('draggable', canDrag);
                    newCard.classList.add('block', 'py-2', 'card');
                    if (canDrag) {
                        newCard.classList.add('cursor-grab');
                    } else {
                        newCard.classList.add('select-none', 'pointer-events-none');
                    }

                    const bgColor = {
                        'todo': 'bg-rederr',
                        'wip': 'bg-blue2',
                        'done': 'bg-greensuccess'
                    }[taskDestination];

                    const borderColor = {
                        'todo': 'border-rederr',
                        'wip': 'border-blue2',
                        'done': 'border-greensuccess'
                    }[taskDestination];

                    // Split noSelectClass into an array and add each class individually
                    if (noSelectClass) {
                        const classes = noSelectClass.split(' ').filter(className => className.length > 0);
                        newCard.classList.add(...classes);
                    }

                    let date = new Date(taskDate);
                    let formattedDate = date.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });

                    newCard.innerHTML = `
                        <div class="flex border ${borderColor} flex-col w-full min-h-32 p-2 h-auto max-w-full mb-4 card rounded-xl ${bgColor} bg-opacity-30 ${canDrag ? 'cursor-grab' : 'select-none pointer-events-none'}" draggable="${canDrag}">
                            <div class="flex px-2 bg-white border rounded-xl w-fit">
                                <span class="text-xs text-left font-satoshimed text-wrap text-blackpri">${formattedDate}</span>
                            </div>
                            
                            <!-- Task Title & Task Description -->
                            <div class="${canDrag ? 'cursor-grab' : ''} min-h-[2.28rem] flex items-center w-full">
                                <span class="w-full text-lg text-left break-words font-satoshireg">${taskName}</span>
                            </div>
                            
                            <div class="w-full border-t border-black">
                                <p class="text-base text-left break-words whitespace-normal font-satoshilight text-blackpri">
                                    ${taskInfo}
                                </p>
                            </div>
                        </div>
                    `;

                    container.appendChild(newCard);
                    attachDragListeners(newCard);
                    
                    // clearModal();
                    // hide('taskModal');
                })
                .catch(error => {
                    console.error('Error saving task:', error);
                    alert('Error saving task. Please try again.');
                });
                
                // Get the member whose kanban is being updated
                // const member = members[currentKB];
                
                // // Create the form data directly instead of relying on a form element
                // const formData = new FormData();
                // formData.append('school_id', member[1]);
                // formData.append('task', JSON.stringify(newTask));
                // formData.append('destination', taskDestination);
                // formData.append('room_id', room_id);
                // formData.append('form_type', 'update_kanban');

                // Make the fetch request directly
                // fetch('/api/submit-form', {
                //     method: 'POST',
                //     body: formData
                // })
                // .then(response => response.json())
                // .then(data => {
                //     if (!data.success) {
                //         console.error('Failed to save task:', data.message);
                //         alert('Failed to save task. Please try again.');
                //         return;
                //     }

                //     console.log('data', data);
                //     console.log('noSelectClass', noSelectClass);
                //     console.log('studentRole', studentRole);
                //     console.log('currentKB', currentKB);
                //     console.log('taskDestination', taskDestination);

                //     // If successful, update the UI
                //     const container = document.getElementById(`${currentKB}${taskDestination}Cont`);
                //     const newCard = document.createElement('div');
                //     newCard.setAttribute('draggable', `${studentRole === 'Principal Investigator' ? 'true' : 'false'}`);
                //     newCard.classList.add('block', 'py-2', 'border-b', 'card', 'cursor-grab', 'border-black1');

                //     if (noSelectClass) {
                //         const classes = noSelectClass.split(' ').filter(className => className.length > 0);
                //         newCard.classList.add(...classes);
                //     }

                //     newCard.innerHTML = `
                //         <div class="flex p-1 cursor-grab justify-evenly">
                //             <span class="px-4 mx-auto ml-1 text-base text-left border-b font-clashbold border-grey2 text-black1 text-wrap">${taskName}</span>
                //             <span class="pl-1 mx-auto mr-2 text-sm font-satoshimed text-black1 text-wrap">${taskDate}</span>
                //         </div>
                //         <span class="relative block ml-10 text-base text-left font-satoshimed text-black1 text-wrap">${taskInfo}</span>
                //     `;

                //     container.appendChild(newCard);
                //     attachDragListeners(newCard);
                    
                //     clearModal();
                //     hide('taskModal');
                // })
                // .catch(error => {
                //     console.error('Error saving task:', error);
                //     alert('Error saving task. Please try again.');
                // });
            }

            // Helper function to attach drag listeners to a card
            function attachDragListeners(card) {
                card.addEventListener('dragstart', function() {
                    card.classList.add("dragging");
                    card.classList.remove("cursor-grab");
                    card.classList.add("cursor-grabbing");
                });

                card.addEventListener('dragend', function() {
                    card.classList.remove("dragging");
                    card.classList.remove("cursor-grabbing");
                    card.classList.add("cursor-grab");
                });
            }

            // for add task modal only
            // function clearModal(){
            //     document.getElementById('taskName').value = '';
            //     document.getElementById('taskDate').value = '';
            //     document.getElementById('taskInfo').value = '';
            //     document.getElementById('taskDestination').value = 'todo';
            // }



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

                // zone.addEventListener('drop', function(e) {
                //     e.preventDefault();
                //     const curTask = document.querySelector(".dragging");
                //     if (!curTask) return;

                //     console.log('curTask',curTask);

                //     curTask.classList.remove("dragging");

                //     // Get the new destination column
                //     const newDestination = zone.id.replace(`${currentKB}`, '').replace('Cont', ''); // 'todo', 'wip', or 'done'
                //     console.log(newDestination);
                    
                //     // Get task data from the DOM element
                //     const taskName = curTask.querySelector('.font-clashbold').textContent;
                //     const taskDate = curTask.querySelector('.font-satoshimed').textContent;
                //     const taskInfo = curTask.querySelector('.font-satoshimed').textContent;

                //     console.log(taskName, taskData, taskInfo);
                    
                //     // Create and send form data
                //     const formData = new FormData();
                //         formData.append('school_id', members[currentKB][1]);
                //         formData.append('task', JSON.stringify([taskName, taskInfo, taskDate]));
                //         formData.append('destination', newDestination);
                //         formData.append('room_id', room_id);
                //         formData.append('form_type', 'update_kanban');
                //         formData.append('action', 'move');

                //     fetch('/api/submit-form', {
                //         method: 'POST',
                //         body: formData
                //     })
                //     .then(response => response.json())
                //     .then(data => {
                //         if (!data.success) {
                //             console.error('Failed to move task:', data.message);
                //             // Optionally revert the UI change
                //             return;
                //         }
                //     })
                //     .catch(error => {
                //         console.error('Error moving task:', error);
                //     });
                // });
            });

            // toggle hidden/flex kanban of members
            // function changeKB(index){
            //     console.log(index);
            //     let kanbans = document.querySelectorAll('[id^="kanban"]');
            //     currentKB = index;

            //     kanbans.forEach(kb =>{
            //         kb.classList.remove('flex');
            //         kb.classList.add('hidden');
            //         if (kb.id == `kanban${index}`){
            //             kb.classList.add('flex');
            //             kb.classList.remove('hidden');
            //         }
            //     })
            // }

// ... existing code ...

            // toggle hidden/flex kanban of members
            function changeKB(index) {
                console.log('Changing to tab:', index);
                currentKBTab = index;
                currentKB = index;
                isUpdatingKanban = true;
                localStorage.setItem('lastSelectedTab', index.toString());

                // Update tab colors
                const tabs = document.querySelectorAll('.member');
                tabs.forEach((tab, tabIndex) => {
                    if (tabIndex === index) {
                        // tab.classList.remove('bg-white', 'text-black');
                        // tab.classList.add('bg-whitecon', 'text-black');
                        tab.classList.add('bg-gradient-to-r', 'from-greige', 'to-whitecon');
                    } else {
                        // tab.classList.remove('bg-whitecon', 'text-black');
                        // tab.classList.add('bg-white', 'text-black');
                        tab.classList.remove('bg-gradient-to-r', 'from-greige', 'to-whitecon');
                    }
                });

                // Toggle kanban visibility
                const kanbans = document.querySelectorAll('[id^="kanban"]');
                kanbans.forEach(kb => {
                    if (!kb.id.includes('kanbanTabs')) {
                        if (kb.id === `kanban${index}`) {
                            kb.classList.remove('hidden');
                            kb.classList.add('flex');
                        } else {
                            kb.classList.remove('flex');
                            kb.classList.add('hidden');
                        }
                    }
                });
            }





            // function changeKB(index) {
            //     console.log(index);
            //     let kanbans = document.querySelectorAll('[id^="kanban"]');
            //     currentKB = index;
            //     currentKBTab = index;

            //     // Update tab colors
            //     const tabs = document.querySelectorAll('.member');
            //     tabs.forEach(tab => {
            //         const tabId = tab.id;
            //         const memberId = members[index][1];
                    
            //         if (tabId === memberId) {
            //             tab.classList.remove('bg-white', 'text-black1');
            //             tab.classList.add('bg-blue3', 'text-white');
            //         } else {
            //             tab.classList.remove('bg-blue3', 'text-white');
            //             tab.classList.add('bg-white', 'text-black1');
            //         }
            //     });

            //     // Toggle kanban visibility
            //     kanbans.forEach(kb => {
            //         if (!kb.id.includes('kanbanTabs')) {
            //             kb.classList.remove('flex');
            //             kb.classList.add('hidden');
            //             if (kb.id == `kanban${index}`) {
            //                 kb.classList.add('flex');
            //                 kb.classList.remove('hidden');
            //             }
            //         }
            //     });
            // }

            // ... existing code ...

            // toggle color of each kanban button
            // kbButts.forEach(button => {
            //     button.addEventListener('click', function() {
            //         kbButts.forEach(btn => {
            //             // button visual
            //             btn.classList.remove('bg-blue3', 'text-white');
            //             btn.classList.add('bg-white', 'text-black1');
            //         });
            //         // button visual
            //         this.classList.add('bg-blue3', 'text-white');
            //         this.classList.remove('bg-white', 'text-black1');
            //     });
            // });

            // StudButt.addEventListener('click',function(){
            //     if(StudButt.classList.contains("bg-blue3")){
                        
            //     }else{
            //         StudButt.classList.replace("bg-orange1","bg-blue3");
            //         StudButt.classList.replace("text-black1","text-white");
            //         StudButt.classList.replace("w-2/5","w-3/5");
            //         GrButt.classList.replace("bg-blue3","bg-orange1");
            //         GrButt.classList.replace("text-white","text-black1");
            //         GrButt.classList.replace("w-3/5","w-2/5");
            //         students.classList.remove("hidden");
            //         groupContent.classList.add("hidden");
            //     }
            // })

            
            // GrButt.addEventListener('click',function(){
            //     if(GrButt.classList.contains("bg-blue3")){
                    
            //     }else{
            //         GrButt.classList.replace("bg-orange1","bg-blue3");
            //         GrButt.classList.replace("text-black1","text-white");
            //         GrButt.classList.replace("w-2/5","w-3/5");
            //         StudButt.classList.replace("bg-blue3","bg-orange1");
            //         StudButt.classList.replace("text-white","text-black1");
            //         StudButt.classList.replace("w-3/5","w-2/5");
            //         students.classList.add("hidden");
            //         groupContent.classList.remove("hidden");
            //     }
            // })
        <?php endif; ?>
    </script>


    <!-- PDF GENERATION -->
    <script src="assets/js/pdf/jspdf.umd.min.js"></script>
    <script src="assets/js/pdf/jspdf.plugin.autotable.min.js"></script>
    <script src="assets/js/pdf/pdf.min.js"></script>
    <script>
    // Set the worker source for PDF.js
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'assets/js/pdf/pdf.worker.min.js';

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
        const isStudent = <?php echo $_SESSION['user']['account_type'] === 'student' ? 'true' : 'false'; ?>;

        if (isStudent) {
            // Student view
            let groupMembers = members;
            console.log('groupMembers', groupMembers);
            console.log('groupNum', groupNum);
            console.log('members', members);
            
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

            // doc.save(`${roomCode}-group-${groupNum}.pdf`);

        } else {
            // instructor view
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

            // doc.save(`all_groups_info-${roomCode}.pdf`);
        }

        const pdfBlob = doc.output('blob', { type: 'application/pdf' });
        const filename = isStudent ? 
            `${roomName}-group-${groupNum}.pdf` : 
            `all_groups_info-${roomName}.pdf`;

        // Create a download link
        const downloadLink = document.createElement('a');
        downloadLink.href = URL.createObjectURL(pdfBlob);
        downloadLink.download = filename;

        // Create a preview link
        const previewLink = document.createElement('a');
        previewLink.href = URL.createObjectURL(pdfBlob);
        previewLink.target = '_blank';

        // Create a dialog to ask user preference
        const userChoice = confirm('Would you like to:\nOK - Download the PDF\nCancel - Preview it first in a new tab');

        if (userChoice) {
            // User chose to download
            downloadLink.click();
        } else {
            // User chose to preview
            previewLink.click();
        }

        // Clean up the Blob URLs after a delay
        setTimeout(() => {
            URL.revokeObjectURL(downloadLink.href);
            URL.revokeObjectURL(previewLink.href);
        }, 1000);
    }
    </script>

    <script src="/assets/js/sweetalert2.min.js"></script>
</body>
</html>
