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

// Prevent hiding dropdowns when clicking inside them
document.getElementById('navDropDown').addEventListener('click', (event) => {
    event.stopPropagation();
});

document.getElementById('notificationDropdown').addEventListener('click', (event) => {
    event.stopPropagation();
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

// Modify the body click event listener
document.body.addEventListener('click', () => {
    hide('navDropDown');
    hide('notificationDropdown');
});


// for Fetching new data

// let lastFetchedData = null;
function fetchLatestData(params, updateFunction, interval = 5000) {
    function fetchData() {
        let url = `/api/get-latest-data`;
        const queryParams = new URLSearchParams(params).toString();
        url += `?${queryParams}`;

        window.fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data && data.data) {
                    window.allRooms = data.data;
                    if (window.isSearching || isFilterActive()) {
                        applyFilters(); // This will update the filtered results
                    } else {
                        updateFunction(data.data);
                    }
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
    window.allRooms = rooms;
    
    if (window.isSearching || isFilterActive()) {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const yearLevel = document.getElementById('yrLevel').value;
        const section = document.getElementById('section').value;
        const program = document.getElementById('program').value;

        window.searchResults = window.allRooms.filter(room => 
            (searchTerm === '' || room.room_name.toLowerCase().includes(searchTerm) || 
            room.room_code.toLowerCase().includes(searchTerm)) &&
            (yearLevel === '' || room.year_level === yearLevel) &&
            (section === '' || room.section === section) &&
            (program === '' || room.program === program)
        );
        displayRooms(window.searchResults);
    } else {
        displayRooms(rooms);
    }
}

function displayRooms(rooms) {
    const ascRoomsContainer = document.getElementById('rooms-ascending');
    const descRoomsContainer = document.getElementById('rooms-descending');
    if (!ascRoomsContainer || !descRoomsContainer) return;

    const roomHTML = rooms.map(room => `
        <a href="/room?room_id=${room.room_id}" class="bg-white2 flex flex-col justify-between h-48 w-[27.625rem] p-6 rounded-2xl">
            <div class="flex flex-col">   
                <h1 class="font-synemed text-2xl truncate"> ${room.room_name}</h1>
                <span class="text-grey2 text-base">BS${room.program ? room.program.toUpperCase() : ''} ${room.year_level ? room.year_level.charAt(0) : ''}-${room.section || ''}</span>
                <span class="text-grey2 text-base">${room.prof_name || ''}</span>
            </div>
            <span class="text-grey2 text-base">${room.room_code || ''}</span>
        </a>
    `).join('');

    ascRoomsContainer.innerHTML = roomHTML;
    descRoomsContainer.innerHTML = roomHTML;
}

function debounce(func, wait) { // this shit adds delay to the search, to prevent too many requests while typing
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function performSearch(searchTerm) {
    window.isSearching = searchTerm !== '';
    applyFilters();
}

// FILTERING
function applyFilters() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const yearLevel = document.getElementById('yrLevel').value;
    const section = document.getElementById('section').value;
    const program = document.getElementById('program').value;

    const filteredRooms = window.allRooms.filter(room => 
        (searchTerm === '' || (room.room_name && room.room_name.toLowerCase().includes(searchTerm)) || 
        (room.room_code && room.room_code.toLowerCase().includes(searchTerm))) &&
        (yearLevel === '' || room.year_level === yearLevel) &&
        (section === '' || room.section === section) &&
        (program === '' || room.program === program)
    );

    displayRooms(filteredRooms);
}

function isFilterActive() {
    return document.getElementById('yrLevel').value !== '' ||
           document.getElementById('section').value !== '' ||
           document.getElementById('program').value !== '' ||
           document.getElementById('searchInput').value !== '';
}

function clearFilters() {
    document.getElementById('yrLevel').value = '';
    document.getElementById('section').value = '';
    document.getElementById('program').value = '';
    document.getElementById('searchInput').value = '';
    
    window.isSearching = false;
    displayRooms(window.allRooms);
}

function fetchAndPopulateSections() {
    fetchLatestData({
        "table": "rooms",
        "fetch_unique_sections": true
    }, function(response) {
        if (response && Array.isArray(response)) {
            populateSections(response);
        } else {
            console.error('Unexpected response format for sections:', response);
        }
    });
}

function populateSections(sections) {
    console.log(sections);
    const sectionSelect = document.getElementById('section');
    sectionSelect.innerHTML = '<option class="bg-white2" value="">Section</option>';
    sections.forEach(section => {
        const option = document.createElement('option');
        option.value = section['section'];
        option.textContent = section['section'];
        option.className = 'bg-white2';
        sectionSelect.appendChild(option);
    });
}



// ... rest of your existing code ...
