<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between items-center">
    <?php view('partials/nav.view.php')?>

    <!-- groups -->
    <div class="relative flex flex-wrap w-full h-fit p-6 border border-black mt-24 justify-center" id="container">
    </div>


    <?php view('partials/footer.view.php')?>
    <script>
        const div = document.getElementById('container');
        
        var divContent = '';
        var groupContent = '';

        var groups = <?php echo json_encode($groups); ?>;
        groups = [[["Miller James", "ESTJ", "Leader"], //nag lagay ako new groups kasi nag iinterfere ung same names bale need natin talaga full name sa groups for reliability ng adjustments, same name = conflicts
                ["Thomas Barbara", "ENFJ", "Analyst"],
                ["Jones David", "ISTJ", "Programmer"],
                ["Johnson Jane", "INTJ", "Designer"]],

                [["r John", "ENFP", "Leader"],
                ["e Maria", "INFJ", "Analyst"],
                ["n Michael", "ISTP", "Programmer"],
                ["z Emily", "ENTP", "Designer"]],

                [["Smith John", "ENFP", "Leader"],
                ["Garcia Maria", "INFJ", "Analyst"],
                ["Brown Michael", "ISTP", "Programmer"],
                ["Davis Emily", "ENTP", "Designer"]]];
                    

        console.log('initial groups:',groups);
        
        var cont ='';
        var groupCount = 1;

        function changeGroup(name, start, end){
            let memInd = 0;
            let trash
            let user
            start-=1 // to turn it from group number to group index
            end-=1

            console.log('path:', name, start, end);
            console.log('initial starting group:',groups[start]);

            for (let member of groups[start]){
                if(member.includes(name)){
                    console.log('happens');
                    console.log('member index:',memInd);
                    user = groups[start][memInd];
                    console.log('user:',user);
                    break;
                }
                memInd+=1;
            }

            trash = groups[start].splice(memInd,1); //removes user from old group
            console.log('post removal starting group:',groups[start]);

            groups[end].push(user);
            console.log('new group:',groups[end]);


        }

        for (let group of groups){
            groupContent = '';
            for (let member of group){// + = drag icon
                groupHTML = `<div class="flex w-full h-fit border-t border-black1 cursor-grab active:cursor-grabbing text-left draggable" id="${member[0]}" draggable="true">
                                <div class="w-1/2 p-2 pl-6">
                                    <h1 class="font-synemed text-2xl text-black1 mb-2" id="name">${member[0]}</h1>
                                    <h1 class="font-synemed text-xl text-grey2">${member[2]}</h1>
                                </div>
                                <div class="w-1/2 p-2">
                                    <select class="relative left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 border border-black1 rounded-lg w-[80%] py-2 text-center font-synemed" name="role" id="role">
                                        <option value="null">Change Role</option>
                                        <option value="Leader">Leader</option>
                                        <option value="Analyst">Analyst</option>
                                        <option value="Programmer">Programmer</option>
                                        <option value="Designer">Designer</option>
                                    </select>
                                </div>
                            </div>`

                groupContent+=groupHTML;
            }

            divHTML = `<div class="relative inline-block border border-black1 w-[35%] h-fit rounded-2xl text-center overflow-hidden m-12 min-h-[20rem] dropZone" id="${groupCount-1}">
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
        const toRemove = ['Leader','Analyst','Programmer','Designer','Change Role'];
        let name
        let inGroup
        let endGroup
        let card

        cards.forEach(function(c) { //spag code
            c.addEventListener('dragstart', function(event) {
                let text = this.textContent;
                for (let string of toRemove){
                    text = text.replaceAll(string,"");
                }
                text = text.trim();
                // console.log('name:',text);
                let index = 0;

                for (let group of groups){
                    index+=1
                    let found = false;
                    for (let member of group){
                        if(member.includes(text)){
                            // console.log('true')
                            found = true;
                            break;
                        }
                    }
                    if(found){
                        break;
                    }
                }

                // console.log('starting group:', index); //group number
                // console.log(c);
                name = text;
                inGroup = index;
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
            });


        });
        


    </script>
    <script src="assets/js/edit-groups.js"></script>
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>