<?php view('partials/head.view.php'); ?>

<body class="block overflow-x-hidden bg-beige">
    <?php view('partials/nav.view.php')?>

    <!-- groups -->
    <div class="relative flex flex-wrap justify-center w-full p-6 mt-20 h-fit" id="container">

    </div>

    <!-- <div id="customModal ${member[1]} ${groupNum}" class="fixed left-0 z-50 flex justify-center w-screen h-screen pt-56 bg-glassmorphism top-20">
        <div class="flex flex-col justify-between bg-white border rounded-t-lg h-52 w-96 border-blackpri">
            <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-blackpri">
                <span class="w-4/5 pl-2 text-lg text-white font-satoshimed">Custom Role:</span>
                <button class="w-10 h-full rounded bg-red1" onClick="hide('customModal ${member[1]} ${groupNum}'); enableScroll();">X</button>
            </div>
        
            <div class="flex flex-col items-center p-4 h-5/6 justify-evenly">
                <div class="w-full">
                    <p class="text-black font-satoshimed">Enter custom role for <span class="text-blue3">${member[0]}</span>:</p>
                    <input id="customInput ${member[1]} ${groupNum}" placeholder="Enter custom role:" class="w-full p-2 mt-2 border border-black rounded font-satoshimed">
                </div>

                <button onclick="customRole(`${member[1]} ${groupNum}`)" class="w-6/12 p-1 mt-2 border rounded bg-orangeaccent text-blackpri border-blackpri">Confirm</button>
            </div>
        </div>
    </div> -->

    <form id="submitMods" method="POST" action="/groups">
        <input type="hidden" name="modGroups" id="modGroups" value="">
        <input type="hidden" name="reasons" id="reasons" value="">
        <input type="hidden" name="room_id" value="<?= $_GET['room_id'] ?>">
    </form>

    <button onclick="submitGroups();" class="relative h-8 mb-16 text-white transform -translate-x-1/2 border border-black rounded-lg left-1/2 w-36 bg-blue3 font-satoshimed">Submit</button>
    <?php view('partials/footer.view.php')?>
    <script>
        let reasons = [];
        let jsonString
        const div = document.getElementById('container');
        
        var divContent = '';
        var groupContent = '';

        var groups = <?php echo json_encode($groups); ?>;

        // console.log('initial groups:',groups);
        
        var cont ='';
        var groupCount = 1;

        async function changeGroup(schoolID, start, end, zone, card) {
            let memInd = 0;
            let user;
            let coreRoles = ['Principal Investigator', 'Research Writer', 'System Developer', 'System Designer'];
            let presentRoles = [];
            let neededRole
            start -= 1; // to turn it from group number to group index
            end -= 1;

            // check for missing role for changeRole()
            if(groups[end].length >= 4){ //auto custom 
                let cont = card.querySelector('[id^="dd"]') //find dropdown ID from card
                let id = cont.id
                changeRole(true,'custom',id);
            }else{ // auto set to missing role
                let cont = card.querySelector('[id^="dd"]') //find dropdown ID from card
                let id = cont.id
                for (let user of groups[end]){ // find taken roles
                    if(coreRoles.includes(user[2])){
                        presentRoles.push(user[2])
                    }
                }
                neededRole = coreRoles.filter(role => !presentRoles.includes(role))[0]; // filter for missing role
                console.log("missing Role", neededRole);
                changeRole(true,neededRole,id);
                
            }

            if (start == end) {
                return;
            }

            let oldG = start + 1;
            let newG = end + 1;
            let oldID = `${schoolID} ${oldG}`;
            let newID = `${schoolID} ${newG}`;

            let reasonID = `reason ${oldID}`;
            let customID = `customModal ${oldID}`;
            
            // Show the reason modal and wait for user input

            const reasonResult = await new Promise((resolve) => {
                show(reasonID);
                disableScroll();
                const draggableDiv = document.getElementById(oldID);
                draggableDiv.setAttribute('draggable', 'false');
                
                const confirmButton = document.getElementById(`confirmReason ${oldID}`);
                const closeButton = document.getElementById(`closeReason ${oldID}`);
                const reasonInput = document.getElementById(`reasonInput ${oldID}`);

                confirmButton.onclick = () => {
                    hide(reasonID);
                    resolve(reasonInput.value.trim());
                };

                closeButton.onclick = () => {
                    hide(reasonID);
                    hide(customID);
                    resolve("");
                };
            });

            // If reason is empty, don't proceed with the group change
            if (reasonResult === "" || reasonResult.trim().length < 5) {
                console.log("Group change cancelled");
                alert("Group change cancelled,\na REASON must be included AND \nit must be atleast 5 characters long.");
                return;
            }

            document.getElementById(`reasonInput ${oldID}`).value = '';

            // Proceed with group change
            for (let member of groups[start]) {
                if (member.includes(schoolID)) {
                    user = groups[start][memInd];
                    break;
                }
                memInd += 1;
            }

            // Update IDs for the user elements
            let elements = document.querySelectorAll(`[id*='${oldID}']`);
            elements.forEach(element => {
                let newElementID = element.id.replace(oldID, newID);
                element.id = newElementID;

                if (element.oninput) {
                    element.oninput = function() {
                        capitalizeWords(newElementID);
                    };
                }
            });

            // Clear role if has the same role
            for (let member of groups[end]) {
                if (member.includes(user[2])) {
                    user[2] = "N/A";
                    document.getElementById(`role ${newID}`).innerHTML = 'N/A';
                    break;
                }
            }

            groups[start].splice(memInd, 1); // removes user from old group
            groups[end].push(user);

            // move visually
            zone.append(card);

            // console.log('new group:', groups[end]);
            // console.log(groups);
            jsonString = groups;

            // STORE THE REASON IN AN ARRAY
            let reasonObj = { room_id:<?= $_GET['room_id'] ?>, from_group:start, to_group:end, school_id:schoolID, groups_json:JSON.stringify(groups), reason:reasonResult };
            
            // Check if same school_id exists, delete the previous if yes.
            let indexToDelete = -1;
            reasons.forEach((reason, index) => {
                if (reason.school_id === schoolID) {
                    indexToDelete = index;
                }
            });

            if (indexToDelete !== -1) {
                reasons.splice(indexToDelete, 1); // Remove the element at the index if a match was found
            }

            reasons.push(reasonObj);
            // console.log('current Reasons:', reasons);
        }

        let groupNum = 0;
        for (let group of groups) {
            groupNum+=1;
            groupContent = '';
            for (let member of group){// + = drag icon
                groupHTML = `<div class="flex w-full h-[6.1rem] bg-white border-t border-blackpri cursor-grab active:cursor-grabbing text-left draggable" id="${member[1]} ${groupNum}" draggable="true">
                                <div class="w-2/3 p-2 pl-6">
                                    <h1 class="mt-2 mb-2 text-2xl truncate font-satoshimed text-blackpri" id="name">${member[0]}</h1>
                                    <h1 class="text-lg truncate font-satoshimed text-blackless" id="role ${member[1]} ${groupNum}">${member[2]}</h1>
                                </div>
                                <div class="w-1/3 px-2">
                                    <select class="relative left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 border border-blackpri rounded-lg w-[80%] py-2 text-center font-satoshimed roleOpt" name="role" id="dd ${member[1]} ${groupNum}">
                                        <option class="ddOpt" value="null" id="null">Role</option>
                                        <option class="ddOpt" value="Principal Investigator" id="Leader">Principal Investigator</option>
                                        <option class="ddOpt" value="Research Writer" id="Analyst">Research Writer</option>
                                        <option class="ddOpt" value="System Developer" id="Programmer">System Developer</option>
                                        <option class="ddOpt" value="System Designer" id="Designer">System Designer</option>
                                        <option class="ddOpt" value="custom" id="custom">Custom</option>
                                    </select>
                                </div>

                                <div id="customModal ${member[1]} ${groupNum}" class="fixed left-0 z-50 justify-center hidden w-screen h-screen pt-56 bg-glassmorphism top-20">
                                    <div class="flex flex-col justify-between bg-white border rounded-t-lg h-52 w-96 border-blackpri">
                                        <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-blackpri">
                                            <span class="w-4/5 pl-2 text-lg text-white font-satoshimed">Custom Role:</span>
                                            <button id="closeModal ${member[1]} ${groupNum}" class="w-10 h-full rounded bg-red1 closeModal">X</button>
                                    </div>
                                    
                                    <div class="flex flex-col items-center p-4 h-5/6 justify-evenly">
                                        <div class="w-full">
                                            <p class="text-black font-satoshimed">Enter custom role for <span class="text-blue3">${member[0]}</span>:</p>
                                            <input id="customInput ${member[1]} ${groupNum}" oninput="capitalizeWords('customInput ${member[1]} ${groupNum}')" placeholder="Enter custom role:" class="w-full p-2 mt-2 border border-black rounded font-satoshimed" required>
                                        </div>

                                        <button id="confirmCustom ${member[1]} ${groupNum}" class="w-6/12 p-1 mt-2 border rounded bg-orangeaccent text-blackpri border-blackpri confirmModal">Confirm</button>
                                    </div>

                                    </div>
                                </div>

                                <div id="reason ${member[1]} ${groupNum}" class="fixed left-0 z-50 justify-center hidden w-screen h-screen pt-56 bg-glassmorphism top-20">
                                    <div class="flex flex-col justify-between bg-white border rounded-t-lg h-52 w-96 border-blackpri">
                                        <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-blackpri">
                                            <span class="w-4/5 pl-2 text-lg text-white font-satoshimed">Reason required:</span>
                                            <button id="closeReason ${member[1]} ${groupNum}" class="w-10 h-full rounded bg-red1 closeModal">X</button>
                                        </div>
                                    
                                        <div class="flex flex-col items-center p-4 h-5/6 justify-evenly">
                                            <div class="w-full">
                                                <p class="text-black font-satoshimed">Enter the reason for transferring <span class="text-blue3">${member[0]}</span>:</p>
                                                <select id="reasonInput ${member[1]} ${groupNum}" class="w-full p-2 mt-2 border border-black rounded font-satoshimed" required>
                                                    <option value="" disabled selected>Select reason:</option>
                                                    <option value="Personal Request">Personal Request</option>
                                                    <option value="Internal Issues">Internal Issues</option>
                                                    <option value="Performance Issues">Performance Issues</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>

                                            <button id="confirmReason ${member[1]} ${groupNum}" class="w-6/12 p-1 mt-2 border rounded bg-orangeaccent text-blackpri border-blackpri confirmModal">Confirm</button>
                                        </div>

                                    </div>
                                </div>



                            </div>`

                groupContent+=groupHTML;
            }
                // nilagayn ko lang bg-red para sa reminder na kulang di ko sure ano gagawin eh
            divHTML = `<div class="relative inline-block bg-whitealt border border-blackpri w-[25%] h-fit rounded-2xl text-center overflow-hidden m-12 min-h-[26.9rem] min-w-[20rem] max-w-[25rem] dropZone" id="${groupCount-1}">
                            <h1 class="w-full h-[10%] font-clashbold text-xl bg-blackpri text-white py-2">GROUP <span class="text-greenaccent">${groupCount}</span></h1>
                            ${groupContent}
                        </div>`;
            divContent += divHTML;
            groupCount++;

        }
        cont += divContent;
        div.innerHTML = cont;

        // <div class="flex flex-col items-center p-4 h-5/6 justify-evenly">
        //     <div class="w-full">
        //         <p class="text-black font-satoshimed">Enter custom role for <span class="text-blue3">${member[0]}</span>:</p>
        //         <input id="customInput ${member[1]} ${groupNum}" oninput="capitalizeWords('customInput ${member[1]} ${groupNum}')" placeholder="Enter custom role:" class="w-full p-2 mt-2 border border-black rounded font-satoshimed" required>
        //     </div>

        //     <button id="confirmCustom ${member[1]} ${groupNum}" class="w-6/12 p-1 mt-2 border rounded bg-orangeaccent text-blackpri border-blackpri confirmModal">Confirm</button>
        // </div>

        const cards = document.querySelectorAll(".draggable");
        const dropZones = document.querySelectorAll(".dropZone");
        const dropD = document.querySelectorAll(".roleOpt");
        const ddOpt = document.querySelectorAll(".ddOpt");
        const toRemove = ['Leader','Analyst','Programmer','Designer','Change Role'];
        const closeModal = document.querySelectorAll('.closeModal');
        const confirmModal = document.querySelectorAll('.confirmModal');

        // for cards and dropZone functions
        let schoolID
        let inGroup
        let endGroup
        let card

        cards.forEach(function(c) { //spag code
            c.addEventListener('dragstart', function(event) {
                let arr = this.id.split(" ");
                inGroup = arr.pop();
                console.log('arr:' ,arr);
                schoolID = arr[0];
                console.log('schoolID:' ,schoolID);
                card = c;
            });
        });

        dropZones.forEach(function(zone) {
            zone.addEventListener('dragover', function(event) {
                event.preventDefault()
            });
            zone.addEventListener('drop', async function(event) {
                let index = parseInt(this.id) + 1
                endGroup = index
                await changeGroup(schoolID, inGroup, endGroup, zone, card)

                // console.log(groups);
                
                jsonString = groups;
            });
        });

        // console.log(groups);

        function changeRole(event,string,id) {
            let arr, ind, item;

            // when function is called by dragging card when changing groups
            if(event === true) {
                arr = id.split(" ");
                item = document.getElementById(id);
                group = arr.pop(); // group number
                ind = parseInt(group)-1; // group index
                schoolID = arr[1]; // user's student ID
                item.value = string;
            } else { //when function is called by event ('change') by dropdown
                arr = this.id.split(" ");
                item = this;
                group = arr.pop(); // group number
                ind = parseInt(group)-1; // group index
                schoolID = arr[1]; // user's student ID
            }

            // check if chosen role(item.value) is present in the group
            let conflict = false;
            let conInd;
            
            for (let index in groups[ind]) {
                // Skip checking the current user's role when looking for conflicts
                if (groups[ind][index][1] === schoolID) continue;
                
                if (groups[ind][index].includes(item.value)) {
                    conflict = true;
                    conInd = index;
                    break;
                }
            }

            // change role
            if (conflict) {
                console.log('conflict is present');
                alert(`The role "${item.value}" is already taken \n Please create custom role instead. `);
                item.value = "null";
            }

            for (let member of groups[ind]) {
                if (member.includes(schoolID)) {
                    if ((item.value !== "custom") && (item.value !== "null")) { // selects role
                        // Clearing custom input's value, so next time it's selected; the input field is empty
                        let customInputID =  `customInput ${schoolID} ${group}`;
                    
                        document.getElementById(customInputID).value = '';

                        member[2] = item.value;
                        // change role visually
                        let roleID = `role ${schoolID} ${group}`;
                        document.getElementById(roleID).innerHTML = item.value;

                        console.log(groups);
                        jsonString = groups;
                    } else if (item.value === "custom" || item.value === "null") { // selects custom
                        let modalID = `customModal ${schoolID} ${group}`;
                        show(modalID);
                        disableScroll();
                        const draggableDiv = document.getElementById(`${schoolID} ${group}`);
                        draggableDiv.setAttribute('draggable', 'false');
                        // modalID.addEventListener('click', function(event) {

                        // });
                    }
                }
            }
        }

        // for change role (dropdown)
        dropD.forEach(function(item) {
            item.addEventListener('change',changeRole)
        });

        confirmModal.forEach(function(custom) {
            custom.addEventListener('click', function(event) {
                let arr = this.id.split(" ");
                let IDandGroup = `${arr[1]} ${arr[2]}`;

                if (arr[0] == 'confirmCustom') {
                    hide(`customModal ${IDandGroup}`);
                    enableScroll();

                    // console.log('IDandGroup:',IDandGroup);
                    let input = document.getElementById(`customInput ${IDandGroup}`).value.trim();
                    // console.log(input);

                    // console.log('customRole arr:', arr);
                    let ind
                    group = arr[2];
                    ind = parseInt(group)-1;
                    schoolID = arr[1];
                    // console.log('1', schoolID);

                    for (let member of groups[ind]) {
                        // console.log('2', member);
                        if (member.includes(schoolID)) {
                            // console.log('3');
                            if(input !== '') {
                                // console.log('4');
                                member[2] = input;
                                // console.log('5');

                                // console.log('not changed visually');
                                // change role visually
                                let roleID = `role ${IDandGroup}`;
                                document.getElementById(roleID).innerHTML = input;
                                // console.log('changed visually');

                                // console.log(groups);
                                jsonString = groups;

                            } else {
                                alert("Custom role can't be blank.");
                            }
                        }
                    }
                } else if (arr[0] == 'confirmReason') {
                    enableScroll();
                }

                const draggableDiv = document.getElementById(`${arr[1]} ${arr[2]}`);
                draggableDiv.setAttribute('draggable', 'true');
            });
        });

        closeModal.forEach(function(modal) {
            modal.addEventListener('click', function(event) {
                let arr = this.id.split(" ");
                // console.log('close arr:',arr);

                if (arr[0] == 'closeReason') {
                    // console.log('reason');
                    hide(`reason ${arr[1]} ${arr[2]}`);
                    enableScroll()
                } else {
                    hide(`customModal ${arr[1]} ${arr[2]}`);
                    enableScroll();

                    const selectElement = document.getElementById(`${arr[1]} ${arr[2]}`);

                    for (let i = 0; i < selectElement.options.length; i++) {
                        if (selectElement.options[i].value === "null") {
                            selectElement.options[i].selected = true;
                            break; // Exit loop after finding the option
                        }
                    }
                }

                const draggableDiv = document.getElementById(`${arr[1]} ${arr[2]}`);
                draggableDiv.setAttribute('draggable', 'true');
            });
        });
        
        function capitalizeWords(customInput) {
            console.log(customInput);
            let input = document.getElementById(customInput);
            input.value = input.value
                .replace(/\b\w/g, function(letter) {
                    return letter.toUpperCase(); // Capitalize the first letter of each word
                });
        }

        function submitGroups(){
            console.log(typeof(groups));
            document.getElementById('modGroups').value = JSON.stringify(groups);
            console.log(typeof(JSON.stringify(groups)));

            document.getElementById('reasons').value = JSON.stringify(reasons);
            document.getElementById('submitMods').submit();
        }



        //***************************************
        //         SCROLL WHILE DRAGGING
        //VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV

        // Function to handle scrolling during drag
        function handleDragScroll(e) {
            const scrollSpeed = 13; // Adjust this value to change scroll speed
            const buffer = 100; // Distance from top/bottom of viewport to start scrolling

            const mouseY = e.clientY;
            const viewportHeight = window.innerHeight;

            if (mouseY < buffer) {
                // Scroll up
                window.scrollBy(0, -scrollSpeed);
            } else if (mouseY > viewportHeight - buffer) {
                // Scroll down
                window.scrollBy(0, scrollSpeed);
            }
        }

        // Add event listeners for drag events
        document.addEventListener('dragover', (e) => {
            e.preventDefault(); // Necessary to allow dropping
            handleDragScroll(e);
        });

        // Optional: add smooth scrolling
        document.documentElement.style.scrollBehavior = 'smooth';

        // Make sure all draggable elements have the draggable attribute set
        document.querySelectorAll('.draggable').forEach(el => {
            el.setAttribute('draggable', 'true');
        });

        // ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
        //         SCROLL WHILE DRAGGING
        //***************************************

    </script>
    <!-- <script src="assets/js/edit-groups.js"></script> -->
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>