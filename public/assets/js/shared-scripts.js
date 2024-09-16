// NavBar Account Toggle
document.getElementById('navDDbutton').addEventListener('click', (event) => 
{
    event.stopPropagation(); 
    toggle('navDropDown');
});
    
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

document.body.addEventListener('click', () => hide('navDropDown'));