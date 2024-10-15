// NavBar Account Toggle
// document.getElementById('navDDbutton').addEventListener('click', (event) => 
// {
//     event.stopPropagation(); 
//     toggle('navDropDown');
// });

// document.getElementById('notificationBtn').addEventListener('click', (event) => 
// {
//     event.stopPropagation(); 
//     toggle('notificationDropdown');
// });
    
function toggle(toggleID) {
    const element = document.getElementById(toggleID);
    element.classList.toggle("hidden");
    element.classList.toggle("flex");
}

function toggleHidden(toggleID) {
    for (let i = 0; i < toggleID.length; i++) {
        const element = document.getElementById(toggleID[i]);
        element.classList.toggle("hidden");
    }
}

function show(showID, display = 'flex') {
    const element = document.getElementById(showID);
    const displayClasses = [
        "hidden",
        "block",
        "inline-block",
        "inline",
        "flex",
        "inline-flex",
        "table",
        "table-row",
        "table-cell",
        "grid",
        "inline-grid",
    ];

    element.classList.remove(...displayClasses);
    element.classList.add(display);
}

function hide(hideID) {
    const element = document.getElementById(hideID);
    const displayClasses = [
        "block",
        "inline-block",
        "inline",
        "flex",
        "inline-flex",
        "table",
        "table-row",
        "table-cell",
        "grid",
        "inline-grid",
    ];

    element.classList.remove(...displayClasses);
    element.classList.add("hidden");
}

function active(activeID,inactiveID, removeList, addList) {
    const active = document.getElementById(activeID);
    const inactive = document.getElementById(inactiveID);

    for (let i = 0; i < removeList.length; i++) {
        inactive.classList.remove(removeList[0][i]);
        active.classList.remove(removeList[1][i]);
    }

    for (let i = 0; i < addList.length; i++) {
        inactive.classList.add(addList[0][i]);
        active.classList.add(addList[1][i]);
    }
}

function disableScroll(){
    document.body.style.overflow = 'hidden';
}

function enableScroll(){
    document.body.style.overflow = 'auto'
}

// Wrap the event listeners in a DOMContentLoaded event
// document.addEventListener('DOMContentLoaded', function() {
//     const navDDbutton = document.getElementById('navDDbutton');
//     const notificationBtn = document.getElementById('notificationBtn');

//     if (navDDbutton) {
//         navDDbutton.addEventListener('click', (event) => {
//             event.stopPropagation();
//             // toggleDropdown('navDropDown', 'notificationDropdown');
//             toggle('navDropDown');
//         });
//     }

//     if (notificationBtn) {
//         notificationBtn.addEventListener('click', (event) => {
//             event.stopPropagation();
//             // toggleDropdown('notificationDropdown', 'navDropDown');
//             toggle('notificationDropdown');
//         });
//     }

//     // ... rest of the existing code ...
// });

document.getElementById('navDDbutton').addEventListener('click', (event) => {
    event.stopPropagation();
    toggleDropdown('navDropDown', 'notificationDropdown');
});

document.getElementById('notificationBtn').addEventListener('click', (event) => {
    event.stopPropagation();
    toggleDropdown('notificationDropdown', 'navDropDown');
});

function toggleDropdown(openId, closeId) {
    const openElement = document.getElementById(openId);
    const closeElement = document.getElementById(closeId);
    
    if (!openElement.classList.contains('flex')) {
        openElement.classList.remove('hidden');
        openElement.classList.add('flex');
        closeElement.classList.remove('flex');
        closeElement.classList.add('hidden');
    } else {
        openElement.classList.remove('flex');
        openElement.classList.add('hidden');
    }
}

// Prevent hiding dropdowns when clicking inside them
document.getElementById('navDropDown').addEventListener('click', (event) => {
    event.stopPropagation();
});

document.getElementById('notificationDropdown').addEventListener('click', (event) => {
    event.stopPropagation();
});

// Modify the body click event listener
document.body.addEventListener('click', () => {
    hide('navDropDown');
    hide('notificationDropdown');
});


// FOR FETCH
function fetchLatestData(table, updateFunction, interval = 5000) {
    function fetchData() {
        const url = `/api/get-latest-data?table=${table}`;
        
        window.fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json(); // Change this to response.json()
            })
            .then(data => {
                console.log('Received data:', data);
                if (data && data.data) {
                    console.log('Triggering Update Function:');
                    updateFunction(data.data);
                    console.log('Update Function Triggered');
                } else {
                    console.warn('No data in response or data is null.');
                }
            })
            .catch(error => {
                console.error('Error fetching latest data:', error);
            });
    }

    fetchData(); // Initial fetch
    setInterval(fetchData, interval); // Fetch every 'interval' milliseconds
}



function updateRooms(rooms) {
    console.log('Inside Update Rooms function:', rooms);
    const ascRoomsContainer = document.getElementById('rooms-ascending');
    const descRoomsContainer = document.getElementById('rooms-descending');
    if (!ascRoomsContainer) return;
    if (!descRoomsContainer) return;
    ascRoomsContainer.innerHTML = ''; // Clear existing rooms
    descRoomsContainer.innerHTML = '';

    rooms.forEach(room => {
        const roomElement = document.createElement('a');
        roomElement.href = `/room?room_id=${room.room_id}`;
        roomElement.className = "bg-white2 flex flex-col justify-between h-48 w-[27.625rem] p-6 rounded-2xl";
        roomElement.innerHTML = `
            <div>   
                <h1 class="font-synemed text-2xl truncate">${room.room_name}</h1>
                <span class="text-grey2 text-base">${room.prof_name}</span>
            </div>
            <span class="text-grey2 text-base">${room.room_code}</span>
        `;
        ascRoomsContainer.appendChild(roomElement);
    });
    rooms.slice().reverse().forEach(room => {
        const roomElement = document.createElement('a');
        roomElement.href = `/room?room_id=${room.room_id}`;
        roomElement.className = "bg-white2 flex flex-col justify-between h-48 w-[27.625rem] p-6 rounded-2xl";
        roomElement.innerHTML = `
            <div>   
                <h1 class="font-synemed text-2xl truncate">${room.room_name}</h1>
                <span class="text-grey2 text-base">${room.prof_name}</span>
            </div>
            <span class="text-grey2 text-base">${room.room_code}</span>
        `;
        descRoomsContainer.appendChild(roomElement);
    });
}

// Add more update functions for other types of data as needed
