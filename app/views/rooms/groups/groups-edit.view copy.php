<?php view('partials/head.view.php'); ?>

<body class="bg-white1 block">
    <?php view('partials/nav.view.php')?>

    <!-- groups -->
    <div class="relative flex flex-wrap w-full h-fit p-6 mt-24 justify-center" id="container">
    </div>
    <form id="submitMods" method="POST" action="/groups">
        <input type="hidden" name="modGroups" id="modGroups" value="">
        <input type="hidden" name="room_id" value="<?= $_GET['room_id'] ?>">
    </form>

    <button onclick="checkGroups();" class="relative left-1/2 transform -translate-x-1/2 border border-black w-36 bg-blue3 text-white1 font-synemed h-8 rounded-lg mb-16">Submit</button>

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

        function changeGroup(name, start, end){
            let memInd = 0;
            let trash
            let user
            start-=1 // to turn it from group number to group index
            end-=1

            if(start == end){
                console.log("same group");
            }else{
                // console.log('path:', name, start, end);
                // console.log('initial starting group:',groups[start]);

                for (let member of groups[start]){
                    if(member.includes(name)){
                        // console.log('happens');
                        // console.log('member index:',memInd);
                        user = groups[start][memInd];
                        // console.log('user:',user);
                        break;
                    }
                    memInd+=1;
                }

                trash = groups[start].splice(memInd,1); //removes user from old group
                // console.log('post removal starting group:',groups[start]);

                groups[end].push(user);
                let oldG = start+1;
                let newG = end+1;
                let oldID = `${name} ${oldG}`;
                let newID = `${name} ${newG}`;
                // console.log(oldID);
                // console.log(newID);
                // console.log(`test: ${name} ${start}`);

                // run twice; one for draggable and another for dropDown
                let el = document.getElementById(oldID);
                el.id = newID;
                el = document.getElementById(oldID);
                el.id = newID;
                // console.log('new group:',groups[end]);
                // console.log(groups);
                jsonString = groups;
            }

        }

        let groupNum = 0;
        for (let group of groups){
            groupNum+=1;
            groupContent = '';
            for (let member of group){// + = drag icon
                groupHTML = `<div class="flex w-full h-[6rem] bg-white1 border-t border-black1 cursor-grab active:cursor-grabbing text-left draggable" id="${member[0]} ${groupNum}" draggable="true">
                                <div class="w-2/3 p-2 pl-6">
                                    <h1 class="font-synemed text-2xl text-black1 mb-2 mt-2 truncate" id="name">${member[0]}</h1>
                                    <h1 class="font-synemed text-xl text-grey2">${member[2]}</h1>
                                </div>
                                <div class="w-1/3 px-2">
                                    <select class="relative left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 border border-black1 rounded-lg w-[80%] py-2 text-center font-synemed roleOpt" name="role" id="${member[0]} ${groupNum}">
                                        <option class="ddOpt" value="null" id="null">Role</option>
                                        <option class="ddOpt" value="Leader" id="Leader">Leader</option>
                                        <option class="ddOpt" value="Analyst" id="Analyst">Analyst</option>
                                        <option class="ddOpt" value="Programmer" id="Programmer">Programmer</option>
                                        <option class="ddOpt" value="Designer" id="Designer">Designer</option>
                                    </select>
                                </div>
                            </div>`

                groupContent+=groupHTML;
            }
                // nilagayn ko lang bg-red para sa reminder na kulang di ko sure ano gagawin eh
            divHTML = `<div class="relative inline-block bg-red-300 border border-black1 w-[25%] h-fit rounded-2xl text-center overflow-hidden m-12 min-h-[26.9rem] min-w-[20rem] max-w-[25rem] dropZone" id="${groupCount-1}">
                            <h1 class="w-full h-[10%] font-synebold text-xl bg-black1 text-white1 py-2">GROUP ${groupCount}</h1>
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

        // for cards and dropZone functions
        let name
        let inGroup
        let endGroup
        let card

        cards.forEach(function(c) { //spag code
            c.addEventListener('dragstart', function(event) {
                let arr = this.id.split(" ");
                inGroup = arr.pop();
                name = arr.join(" ");
                card = c;
            });
        });

        dropZones.forEach(function(zone) {
            zone.addEventListener('dragover', function(event) {
                event.preventDefault()
            });

            zone.addEventListener('drop', function(event) {
                zone.append(card);
                // console.log(this);
                let index = parseInt(this.id)+1
                // console.log('ending group:',index);
                endGroup = index
                changeGroup(name,inGroup,endGroup)
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
                name = arr.join(" ");

                for (let member of groups[ind]) {
                    if (member.includes(name)){
                        // console.log(`${name} from group ${group}`);
                        // console.log('old:',member)
                        member[2] = item.value;
                        // console.log('new:',member)
                    }
                }


                console.log(groups);
                jsonString = groups;
            })
        });
        
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