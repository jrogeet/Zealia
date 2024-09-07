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

function show(showID) {
    const element = document.getElementById(showID);
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
    element.classList.add("flex");
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

document.body.addEventListener('click', () => hide('navDropDown'));