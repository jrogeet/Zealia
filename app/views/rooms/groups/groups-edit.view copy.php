<?php view('partials/head.view.php'); ?>

<body class="bg-white block">
    <?php view('partials/nav.view.php')?>

    <!-- groups -->
    <div class="relative flex flex-wrap w-full h-fit p-6 mt-24 justify-center" id="container">

    </div>



<!-- THIS COPY WAS MADE BEFORE THE REASON INPUT -->



    <!-- <div id="customModal ${member[1]} ${groupNum}" class="z-50 flex bg-glassmorphism fixed top-20 left-0  h-screen w-screen pt-56 justify-center">
        <div class="bg-white flex flex-col justify-between h-52 w-96 border border-black1 rounded-t-lg">
            <div class="bg-blue3 flex justify-between items-center h-1/6 border border-black1 rounded-t-lg">
                <span class="text-white w-4/5 text-lg font-satoshimed pl-2">Custom Role:</span>
                <button class="bg-red1 h-full w-10 rounded" onClick="hide('customModal ${member[1]} ${groupNum}'); enableScroll();">X</button>
            </div>
        
            <div class="h-5/6 flex flex-col justify-evenly items-center p-4">
                <div class="w-full">
                    <p class="font-satoshimed text-black">Enter custom role for <span class="text-blue3">${member[0]}</span>:</p>
                    <input id="customInput ${member[1]} ${groupNum}" placeholder="Enter custom role:" class="w-full p-2 mt-2 border border-black rounded font-satoshimed">
                </div>

                <button onclick="customRole(`${member[1]} ${groupNum}`)" class="bg-orangeaccent w-6/12 p-1 mt-2 text-black1 border border-black1 rounded">Confirm</button>
            </div>
        </div>
    </div> -->

    <form id="submitMods" method="POST" action="/groups">
        <input type="hidden" name="modGroups" id="modGroups" value="">
        <input type="hidden" name="room_id" value="<?= $_GET['room_id'] ?>">
    </form>

    <button onclick="checkGroups();" class="relative left-1/2 transform -translate-x-1/2 border border-black w-36 bg-blue3 text-white font-satoshimed h-8 rounded-lg mb-16">Submit</button>

    <?php view('partials/footer.view.php')?>
    <script>
        let jsonString
        const div = document.getElementById('container');
        
        var divContent = '';
        var groupContent = '';

        var groups = <?php echo json_encode($groups); ?>;
        // groups = [[["Miller James Carlo Pablo", "ESTJ", "Leader"], //nag lagay ako new groups kasi nag iinterfere ung same names bale need natin talaga full name sa groups for reliability ng adjustments, same name = conflicts
        //         ["Thomas Barbara", "ENFJ", "Analyst"],
        //         ["Jones David", "ISTJ", "Programmer"],
        //         ["Johnson Jane", "INTJ", "Designer"]],

        //         [["r John", "ENFP", "Leader"],
        //         ["e Maria", "INFJ", "Analyst"],
        //         ["n Michael", "ISTP", "Programmer"],
        //         ["z Emily", "ENTP", "Designer"]],

        //         [["Smith John", "ENFP", "Leader"],
        //         ["Garcia Maria", "INFJ", "Analyst"],
        //         ["Brown Michael", "ISTP", "Programmer"],
        //         ["Davis Emily", "ENTP", "Designer"]]];
                    

        console.log('initial groups:',groups);
        
        var cont ='';
        var groupCount = 1;

        function changeGroup(schoolID, start, end, zone, card) {
            let memInd = 0;
            let trash
            let user
            start-=1 // to turn it from group number to group index
            end-=1

            if (start == end) {
                console.log("same group");
            } else {
                let oldG = start+1;
                let newG = end+1;
                let oldID = `${schoolID} ${oldG}`;
                let newID = `${schoolID} ${newG}`;

                let reasonID = `reason ${oldID}`;
                show(reasonID);
                // let confirmation = confirmResult();

                for (let member of groups[start]) {
                    if (member.includes(schoolID)) {
                        // console.log('happens');
                        // console.log('member index:',memInd);
                        user = groups[start][memInd];
                        // console.log('user:',user);
                        break;
                    }
                    memInd+=1;
                }

                // *******************************************
                //             CHANGING OF ID's
                // vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
                // console.log('old ID:' ,oldID);

                // Update IDs for the user elements
                let elements = document.querySelectorAll(`[id*='${oldID}']`);
                elements.forEach(element => {
                    let newElementID = element.id.replace(oldID, newID);
                    element.id = newElementID;

                    // Update event handlers or any other necessary attributes
                    if (element.oninput) {
                        element.oninput = function() {
                            capitalizeWords(newElementID);
                        };
                    }
                });

                //  OLD 

                // let oldG = start+1;
                // let newG = end+1;
                // let oldID = `${schoolID} ${oldG}`;
                // let newID = `${schoolID} ${newG}`;
                // // console.log('old ID:' ,oldID);

                // // console.log(`test: ${schoolID} ${start}`);

                // // run twice; one for draggable and another for dropDown
                // let el = document.getElementById(oldID);
                // el.id = newID;

                // el = document.getElementById(oldID);
                // el.id = newID;
                // // console.log('new ID:' ,newID);

                // // changing ID of student's role
                // let oldRoleID = `role ${oldID}`;
                // // console.log('old Role ID:', oldRoleID);
                // let newRoleID = `role ${newID}`;
                // // console.log('new Role ID:', newRoleID);
                // let roleID = document.getElementById(oldRoleID);
                // roleID.id = newRoleID;

                // // changing ID of student's custom modal
                // let oldModalID = `customModal ${oldID}`;
                // let newModalID = `customModal ${newID}`;
                // console.log('old Modal ID:', oldModalID, 'new Modal ID:', newModalID);
                // let modalID =  document.getElementById(oldModalID);
                // console.log('modalID:',modalID);
                // modalID.id = newModalID;

                // // changing ID of custom role input
                // let oldInputID = `customInput ${oldID}`;
                // let newInputID = `customInput ${newID}`;
                // console.log('old Input ID:', oldInputID, 'new Input ID:', newInputID);
                // let inputID =  document.getElementById(oldInputID);
                // console.log('InputID:',inputID);
                // inputID.id = newInputID;

                // // changing custom role input's ONINPUT function
                // const inputElement = document.getElementById(newInputID);
                // inputElement.oninput = function() {
                //     capitalizeWords(newInputID);
                // };

                // // changing ID of confirm button
                // let oldConfirmID = `confirmCustom ${oldID}`;
                // let newConfirmID = `confirmCustom ${newID}`;
                // console.log('old Confirm ID:', oldConfirmID, 'new Confirm ID:', newConfirmID);
                // let confirmID =  document.getElementById(oldConfirmID);
                // console.log('confirmID:',confirmID);
                // confirmID.id = newConfirmID;

                // // changing ID of close modal button
                // let oldCloseID = `closeModal ${oldID}`;
                // let newCloseID = `closeModal ${newID}`;
                // console.log('old Close ID:', oldCloseID, 'new Close ID:', newCloseID);
                // let closeID =  document.getElementById(oldCloseID);
                // console.log('closeID:',closeID);
                // closeID.id = newCloseID;

                // ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                //           END of CHANGING OF ID's
                // *******************************************

                // Clear role if has the same role
                for (let member of groups[end]) {
                    // console.log(user[2]);
                    if (member.includes(user[2])) {
                        user[2] = "N/A";

                        // removing role name visually
                        // document.getElementById(newRoleID).innerHTML = 'N/A';
                        document.getElementById(`role ${newID}`).innerHTML = 'N/A';
                        break;
                    }
                }

                // console.log('path:', schoolID, start, end);
                // console.log('initial starting group:',groups[start]);

                trash = groups[start].splice(memInd,1); //removes user from old group
                // console.log('post removal starting group:',groups[start]);

                groups[end].push(user);

                // move visually
                zone.append(card);

                // console.log('new group:',groups[end]);
                // console.log(groups);
                jsonString = groups;
            }
        }

        let groupNum = 0;
        for (let group of groups) {
            groupNum+=1;
            groupContent = '';
            for (let member of group){// + = drag icon
                groupHTML = `<div class="flex w-full h-[6rem] bg-white border-t border-black1 cursor-grab active:cursor-grabbing text-left draggable" id="${member[1]} ${groupNum}" draggable="true">
                                <div class="w-2/3 p-2 pl-6">
                                    <h1 class="font-satoshimed text-2xl text-black1 mb-2 mt-2 truncate" id="name">${member[0]}</h1>
                                    <h1 class="font-satoshimed text-xl text-grey2 truncate" id="role ${member[1]} ${groupNum}">${member[2]}</h1>
                                </div>
                                <div class="w-1/3 px-2">
                                    <select class="relative left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 border border-black1 rounded-lg w-[80%] py-2 text-center font-satoshimed roleOpt" name="role" id="${member[1]} ${groupNum}">
                                        <option class="ddOpt" value="null" id="null">Role</option>
                                        <option class="ddOpt" value="Principal Investigator" id="Leader">Principal Investigator</option>
                                        <option class="ddOpt" value="Research Writer" id="Analyst">Research Writer</option>
                                        <option class="ddOpt" value="System Developer" id="Programmer">System Developer</option>
                                        <option class="ddOpt" value="System Designer" id="Designer">System Designer</option>
                                        <option class="ddOpt" value="custom" id="custom">Custom</option>
                                    </select>
                                </div>

                                <div id="customModal ${member[1]} ${groupNum}" class="z-50 hidden bg-glassmorphism fixed top-20 left-0  h-screen w-screen pt-56 justify-center">
                                    <div class="bg-white flex flex-col justify-between h-52 w-96 border border-black1 rounded-t-lg">
                                        <div class="bg-blue3 flex justify-between items-center h-1/6 border border-black1 rounded-t-lg">
                                            <span class="text-white w-4/5 text-lg font-satoshimed pl-2">Custom Role:</span>
                                            <button id="closeModal ${member[1]} ${groupNum}" class="bg-red1 h-full w-10 rounded closeModal">X</button>
                                        </div>
                                    
                                        <div class="h-5/6 flex flex-col justify-evenly items-center p-4">
                                            <div class="w-full">
                                                <p class="font-satoshimed text-black">Enter custom role for <span class="text-blue3">${member[0]}</span>:</p>
                                                <input id="customInput ${member[1]} ${groupNum}" oninput="capitalizeWords('customInput ${member[1]} ${groupNum}')" placeholder="Enter custom role:" class="w-full p-2 mt-2 border border-black rounded font-satoshimed" required>
                                            </div>

                                            <button id="confirmCustom ${member[1]} ${groupNum}" class="bg-orangeaccent w-6/12 p-1 mt-2 text-black1 border border-black1 rounded confirmModal">Confirm</button>
                                        </div>
                                    </div>
                                </div>

                                <div id="reason ${member[1]} ${groupNum}" class="z-50 hidden bg-glassmorphism fixed top-20 left-0  h-screen w-screen pt-56 justify-center">
                                    <div class="bg-white flex flex-col justify-between h-52 w-96 border border-black1 rounded-t-lg">
                                        <div class="bg-blue3 flex justify-between items-center h-1/6 border border-black1 rounded-t-lg">
                                            <span class="text-white w-4/5 text-lg font-satoshimed pl-2">Reason required:</span>
                                            <button id="closeReason ${member[1]} ${groupNum}" class="bg-red1 h-full w-10 rounded closeModal">X</button>
                                        </div>
                                    
                                        <div class="h-5/6 flex flex-col justify-evenly items-center p-4">
                                            <div class="w-full">
                                                <p class="font-satoshimed text-black">Enter why you're transferring <span class="text-blue3">${member[0]}</span>:</p>
                                                <input id="reasonInput ${member[1]} ${groupNum}" placeholder="Enter reason:" class="w-full p-2 mt-2 border border-black rounded font-satoshimed" required>
                                            </div>

                                            <button id="confirmReason ${member[1]} ${groupNum}" class="bg-orangeaccent w-6/12 p-1 mt-2 text-black1 border border-black1 rounded confirmModal">Confirm</button>
                                        </div>
                                    </div>
                                </div>


                            </div>`

                groupContent+=groupHTML;
            }
                // nilagayn ko lang bg-red para sa reminder na kulang di ko sure ano gagawin eh
            divHTML = `<div class="relative inline-block bg-red-300 border border-black1 w-[25%] h-fit rounded-2xl text-center overflow-hidden m-12 min-h-[26.9rem] min-w-[20rem] max-w-[25rem] dropZone" id="${groupCount-1}">
                            <h1 class="w-full h-[10%] font-clashbold text-xl bg-black1 text-white py-2">GROUP ${groupCount}</h1>
                            ${groupContent}
                        </div>`;
            divContent += divHTML;
            groupCount++;

        }
        cont += divContent;
        div.innerHTML = cont;

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
                // console.log('arr:' ,arr);
                schoolID = arr[0];
                // console.log('schoolID:' ,schoolID);
                card = c;
            });
        });

        dropZones.forEach(function(zone) {
            zone.addEventListener('dragover', function(event) {
                event.preventDefault()
            });
            zone.addEventListener('drop', function(event) {
                // console.log(this);
                let index = parseInt(this.id)+1
                // console.log('ending group:',index);
                endGroup = index
                changeGroup(schoolID, inGroup, endGroup, zone, card)
                console.log(groups);
                
                jsonString = groups;
            });
        });

        // for change role (dropdown)
        dropD.forEach(function(item) {
            item.addEventListener('change',function(event){
                // console.log('user:',item.id, 'to role:',item.value);

                let arr = this.id.split(" ");
                let ind
                group = arr.pop();
                ind = parseInt(group)-1;
                schoolID = arr[0];

                for (let member of groups[ind]) {
                    if (member.includes(schoolID)){
                        if ((item.value !== "custom") && (item.value !== "null")) {
                            // Clearing custom input's value, so next time it's selected; the input field is empty
                            let customInputID =  `customInput ${item.id}`;
                            document.getElementById(customInputID).value = '';

                            // console.log('item value:', item.value);
                            // console.log(`${schoolID} from group ${group}`);
                            // console.log('old:',member)
                            member[2] = item.value;
                            // console.log('new:',member)

                            // change role visually
                            let roleID = `role ${item.id}`;
                            document.getElementById(roleID).innerHTML = item.value;

                            console.log(groups);
                            jsonString = groups;
                        } else if (item.value === "custom") {
                            let modalID = `customModal ${schoolID} ${group}`;
                            show(modalID);
                            const draggableDiv = document.getElementById(`${schoolID} ${group}`);
                            draggableDiv.setAttribute('draggable', 'false');
                            // modalID.addEventListener('click', function(event) {

                            // });
                        }

                    }
                }
            })
        });

        confirmModal.forEach(function(custom) {
            custom.addEventListener('click', function(event) {
                let arr = this.id.split(" ");
                let IDandGroup = `${arr[1]} ${arr[2]}`;

                if (arr[0] == 'confirmCustom') {
                    hide(`customModal ${IDandGroup}`);

                    console.log('IDandGroup:',IDandGroup);
                    let input = document.getElementById(`customInput ${IDandGroup}`).value;
                    console.log(input);

                    console.log('customRole arr:', arr);
                    let ind
                    group = arr[2];
                    ind = parseInt(group)-1;
                    schoolID = arr[1];
                    console.log('1', schoolID);

                    for (let member of groups[ind]) {
                        console.log('2', member);
                        if (member.includes(schoolID)){
                            console.log('3');
                            if(input !== '') {
                                console.log('4');
                                member[2] = input;
                                console.log('5');

                                console.log('not changed visually');
                                // change role visually
                                let roleID = `role ${IDandGroup}`;
                                document.getElementById(roleID).innerHTML = input;
                                console.log('changed visually');

                                console.log(groups);
                                jsonString = groups;

                            }
                        }
                    }
                } else if (arr[0] == 'confirmReason') {

                }

                const draggableDiv = document.getElementById(`${arr[1]} ${arr[2]}`);
                draggableDiv.setAttribute('draggable', 'true');
            });
        });

        closeModal.forEach(function(modal) {
            modal.addEventListener('click', function(event) {
                let arr = this.id.split(" ");
                console.log('close arr:',arr);

                if (arr[0] == 'closeReason') {
                    console.log('reason');
                    hide(`reason ${arr[1]} ${arr[2]}`);
                } else {
                    hide(`customModal ${arr[1]} ${arr[2]}`);
                }

                const draggableDiv = document.getElementById(`${arr[1]} ${arr[2]}`);
                draggableDiv.setAttribute('draggable', 'true');
            });
        });
        
        function capitalizeWords(customInput) {
            // console.log(customInput);
            let input = document.getElementById(customInput);
            input.value = input.value
                .replace(/\b\w/g, function(letter) {
                    return letter.toUpperCase(); // Capitalize the first letter of each word
                });
        }

        function checkGroups(){
            // for(let group of groups) {

            // }
            console.log(typeof(groups));
            document.getElementById('modGroups').value = JSON.stringify(groups);
            console.log(typeof(JSON.stringify(groups)));
            document.getElementById('submitMods').submit();
        }



    </script>
    <!-- <script src="assets/js/edit-groups.js"></script> -->
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>