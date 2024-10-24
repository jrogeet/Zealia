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