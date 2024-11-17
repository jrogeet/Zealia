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

    if (element) {
        element.classList.remove(...displayClasses);
        element.classList.add(display);
    }
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

    if (element) {
        element.classList.remove(...displayClasses);
        element.classList.add("hidden");
    }
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

// const navDDbutton = document.getElementById('navDDbutton');
// const notificationBtn = document.getElementById('notificationBtn');
// const navDropDown = document.getElementById('navDropDown');
// const notificationDropDown = document.getElementById('notificationDropdown');

if (document.getElementById('navDDbutton')) {
    document.getElementById('navDDbutton').addEventListener('click', (event) => {
        event.stopPropagation();
        toggleDropdown('navDropDown', 'notificationDropdown');
    });
}

if (document.getElementById('notificationBtn')) {
    document.getElementById('notificationBtn').addEventListener('click', (event) => {
        event.stopPropagation();
        toggleDropdown('notificationDropdown', 'navDropDown');
    });
}
// Prevent hiding dropdowns when clicking inside them

if (document.getElementById('navDropDown')) {
    document.getElementById('navDropDown').addEventListener('click', (event) => {
        event.stopPropagation();
    });
}

if (document.getElementById('notificationDropdown')) {
    document.getElementById('notificationDropdown').addEventListener('click', (event) => {
        event.stopPropagation();
    });
}

// Modify the body click event listener
if (document.getElementById('navDDbutton') && document.getElementById('notificationDropdown')) {
    document.body.addEventListener('click', () => {
        hide('navDropDown');
        hide('notificationDropdown');
    });
}


// SweetAlert2

// Add this to your shared-scripts.js
function showAlert(type, title, message) {
    const styles = {
        success: {
            background: '#69DB7C', // greensuccess
            color: '#1A1A1A'      // blackpri
        },
        error: {
            background: '#FF6B6B', // rederr
            color: '#FFFFFF'       // white
        },
        warning: {
            background: '#DF9F5E', // orangeaccent
            color: '#1A1A1A'      // blackpri
        },
        info: {
            background: '#4DABF7', // blueinfo
            color: '#1A1A1A'      // blackpri
        }
    };

    return Swal.fire({
        title: title,
        text: message,
        icon: type,
        confirmButtonText: 'OK',
        customClass: {
            popup: 'swal-popup font-satoshireg',
            title: 'swal-title font-clashbold',
            confirmButton: 'swal-confirm font-satoshimed',
            cancelButton: 'swal-cancel font-satoshimed'
        },
        background: styles[type]?.background || '#FFFFFF',
        color: styles[type]?.color || '#1A1A1A',
        confirmButtonColor: '#03346E', // blue3
    });
}

// For confirmation dialogs
function showConfirm(title, message, confirmText = 'Yes', cancelText = 'No') {
    return Swal.fire({
        title: title,
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: confirmText,
        cancelButtonText: cancelText,
        customClass: {
            popup: 'swal-popup font-satoshireg',
            title: 'swal-title font-clashbold',
            confirmButton: 'swal-confirm font-satoshimed',
            cancelButton: 'swal-cancel font-satoshimed'
        },
        background: '#FFFFFF',    // white
        color: '#1A1A1A',        // blackpri
        confirmButtonColor: '#03346E', // blue3
        cancelButtonColor: '#99948C',  // grey1
    });
}

// Add task modal
function showTaskModal() {
    return Swal.fire({
        title: 'Add Task',
        html: `
            <div class="flex w-full">                        
                <input class="block w-1/2 p-2 mx-auto my-2 ml-2 text-2xl border-b border-black bg-white font-satoshimed" placeholder="Task Name" id="taskName" required>
                <input type="date" class="block w-1/4 p-2 mx-auto my-2 mr-2 border-b border-black bg-white font-satoshimed" placeholder="Date" id="taskDate">
            </div>
            <div class="flex w-full">                        
                <input class="block w-1/2 p-2 mx-auto my-2 ml-2 text-base border-b border-black bg-white font-satoshimed text-grey2" placeholder="Description" id="taskInfo">
                <select class="block w-1/4 p-2 mx-auto my-2 mr-2 border-b border-black bg-white font-satoshimed text-grey2" id="taskDestination">
                    <option class="text-grey2" value="todo">To do</option>
                    <option class="text-grey2" value="wip">Work in Progress</option>
                    <option class="text-grey2" value="done">Done</option>
                </select>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: 'Add',
        cancelButtonText: 'Cancel',
        customClass: {
            popup: 'swal-popup font-satoshireg',
            title: 'swal-title font-clashmed',
            confirmButton: 'swal-confirm font-satoshimed',
            cancelButton: 'swal-cancel font-satoshimed'
        },
        background: 'rgba(255, 255, 255, 0.9)',
        backdrop: `
            rgba(0, 0, 0, 0.4)
            left top
            no-repeat`,
        preConfirm: () => {
            return {
                taskName: document.getElementById('taskName').value,
                taskDate: document.getElementById('taskDate').value,
                taskInfo: document.getElementById('taskInfo').value,
                taskDestination: document.getElementById('taskDestination').value
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            addTask(result.value);
        }
    });
}

// Delete room confirmation
function showDeleteRoomConfirm(roomId, roomName) {
    return Swal.fire({
        title: 'Delete Room',
        html: `

            <span class="text-xl font-satoshimed">${roomName}</span><br>
            <span class="text-2xl font-clashbold text-red1">FOREVER?</span>
        `,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete Room Forever',
        cancelButtonText: 'Cancel',
        customClass: {
            popup: 'swal-popup font-satoshireg',
            title: 'swal-title font-clashbold text-red1',
            confirmButton: 'swal-confirm font-satoshimed bg-red1 text-white',
            cancelButton: 'swal-cancel font-satoshimed'
        },
        background: '#FFFFFF',
        backdrop: `rgba(0,0,0,0.4)
                  url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+P+/HgAFhAJ/wlseKgAAAABJRU5ErkJggg==)`,
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the delete form
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/room';
            
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            
            const roomInput = document.createElement('input');
            roomInput.type = 'hidden';
            roomInput.name = 'room_id';
            roomInput.value = roomId;
            
            form.appendChild(methodInput);
            form.appendChild(roomInput);
            document.body.appendChild(form);
            form.submit();
        }
    });
}
