const piPrio = ['R', 'A', 'S', 'C', 'E', 'I']; //index 0 is lowest rank
const writerPrio = ['R', 'E', 'S', 'C', 'A', 'I'];
const devPrio = ['S', 'A', 'E', 'C', 'I', 'R'];
const desPrio = ['C', 'S', 'R', 'I', 'E', 'A',];

let userlist = [];

let PI = [];
let writer = [];
let dev = [];
let des = [];

const Members = [writer, dev, des];
let grCount = 0;

let groups = [];

function createList(rows){ // ADD USERS TO userlist
    console.log('ROWS:',rows)
    for (let row of rows){ // iterate over each person(row) in section(rows)
        let result = row['result'];
        let id = row['school_id'];
        let name = row['name'];
        // let name = row['f_name'];
        
        let arr = []; //container for [name, id, role1, role2, role3, role4];

        let piScore = 0;
        let wriScore = 0;
        let devScore = 0;
        let desScore = 0;

        for (let x in result){ //used for..in for indexing
            // 
            piScore = piScore + row[result[x]] + piPrio.indexOf(result[x]) + 1;
            wriScore = wriScore + row[result[x]] + writerPrio.indexOf(result[x]) + 1;
            devScore = devScore + row[result[x]] + devPrio.indexOf(result[x]) + 1;
            desScore = desScore + row[result[x]] + desPrio.indexOf(result[x]) + 1;
        }

        piScore = (piScore/36*10).toFixed(2); //change '*10' in formula to change scale of scores
        wriScore = (wriScore/36*10).toFixed(2);
        devScore = (devScore/36*10).toFixed(2);
        desScore = (desScore/36*10).toFixed(2);

        let scores = {'Principal Investigator' : piScore,
                      'Research Writer' : wriScore,
                      'System Developer' : devScore,
                      'System Designer' : desScore
                     };

        // Convert object to array of arrays
        const scoresArray = Object.entries(scores); // turns obj into scores = [[pi, piscore], [sa. anscore], ...]

        // Sort the array based on the second element (the values)
        scoresArray.sort((a, b) => b[1] - a[1]); // sort based on scores

        // Reconstruct the sorted object
        const sortedScores = Object.fromEntries(scoresArray);

        scores = sortedScores;

        arr = [name, id, Object.keys(scores)[0], Object.keys(scores)[1], Object.keys(scores)[2], Object.keys(scores)[3]];// ['f_name', 'school_id', 'Role 1', 'Role 2']
        
        userlist.push(arr);

    }

    if (userlist.length%4 == 0){
        grCount = userlist.length/4;
    }else{
        grCount = Math.floor(userlist.length/4)+1;
    }

    console.log('Userlist:',userlist);
    console.log('Groups:',groups);
    console.log('');

}

function cleanUserlist(role){
    let limit = userlist.length;
    for (let user of role){
        let i = 0;
        while (i < limit){ //i represents userlist users index
            if (userlist[i][1] == user[1]){
                userlist.splice(i,1);
                limit--;
            }
            i++;
        }
    }
}

function groupRoles(role){ // add user to group
    let roleName = '';

    switch (role){
        case PI:
            roleName = 'Principal Investigator';
            break;
        case writer:
            roleName = 'Research Writer';
            break;
        case dev:
            roleName = 'System Developer';
            break;
        case des:
            roleName = 'System Designer';
            break;

    }

    let i = 2 // index of highest score [name,id,top role, 2nd role, 3rd role,4th role]
    while (i < 6 ){//2,3,4,5
        for (let user of userlist){
            if (user[i] == roleName && role.length < grCount){
                role.push([user[0], user[1], user[i]]);
            }
        }
        i++;
    }

    cleanUserlist(role);
    console.log(roleName, role);

}

function distributeRoles(){

    for (let user of PI){ // distribute PI individually first
        groups.push([user]);
    }

    for (let role of Members){ // Members = [writer, dev, des]
        for (let group of groups){
            if (role[0] !== undefined){ // role[0] = first person sa role i.e. writer[0]
                group.push(role.pop(0)); // adds 1 per group per role
            }
        }
    }

    console.log('GROUPS:', typeof(groups),groups);
    // console.log(JSON.stringify(groups));

    document.getElementById('genGroups').value = JSON.stringify(groups);
    document.getElementById('submitGroups').submit();
}

// function generateGroups() {
//     const filteredIdNRiasecElement = document.getElementById('filteredidNRiasec');
//     if (filteredIdNRiasecElement) {
//         const filteredIdNRiasec = JSON.parse(filteredIdNRiasecElement.value);
//         createList(filteredIdNRiasec);
//         groupRoles(PI);
//         groupRoles(writer);
//         groupRoles(dev);
//         groupRoles(des);
//         distributeRoles();
//     } else {
//         console.error('Could not find filteredidNRiasec element');
//     }
// }

function generateGroups() {
    const filteredIdNRiasecElement = document.getElementById('filteredidNRiasec');
    if (filteredIdNRiasecElement) {
        try {
            // Check if value exists and is not empty
            const value = filteredIdNRiasecElement.value;
            if (!value || value.trim() === '') {
                console.error('filteredIdNRiasec value is empty');
                return;
            }

            // Try to parse the JSON
            const filteredIdNRiasec = JSON.parse(value);
            
            // Validate the parsed data
            if (!Array.isArray(filteredIdNRiasec)) {
                console.error('filteredIdNRiasec is not an array:', filteredIdNRiasec);
                return;
            }

            if (filteredIdNRiasec.length > 0) {
                // Reset global arrays before generating new groups
                // userlist = [];
                // PI = [];
                // writer = [];
                // dev = [];
                // des = [];
                // groups = [];
                
                createList(filteredIdNRiasec);
                groupRoles(PI);
                groupRoles(writer);
                groupRoles(dev);
                groupRoles(des);
                distributeRoles();
            } else {
                console.error('filteredIdNRiasec array is empty');
            }
        } catch (error) {
            console.error('Error parsing filteredIdNRiasec JSON:', error);
            console.log('Raw value:', filteredIdNRiasecElement.value);
        }
    } else {
        console.error('Could not find filteredidNRiasec element');
    }
}

// function display(){ //MOSTLY 
    
//     let container = document.getElementById('groups');// Get the existing HTML element where you want to insert the users
    
//     for (let group of groups) {// Iterate over the groups
    
//         let groupElement = document.createElement('div');// Create a new HTML element for the group
//         groupElement.className = "group";
        
//         for (let user of group) {// Iterate over the users in the group
            
//             let userElement = document.createElement('p');// Create a new HTML element for the user
//             userElement.textContent = [`User${user[1]} ${user[2]}`];
            
            
//             groupElement.appendChild(userElement);// Insert the user element into the group element
//         }
//         if (group.length < 4){
//             let userElement = document.createElement('p');// Create a new HTML element for the user
//             userElement.textContent = ['Empty slot'];
            
//             groupElement.appendChild(userElement);// Insert the user element into the group element
//         }
        
        
//         container.appendChild(groupElement);// Insert the group element into the container
//     }

// }

// createList()
// groupRoles(PI)
// groupRoles(writer)
// groupRoles(dev)
// groupRoles(des)
// distributeRoles()

// display()
