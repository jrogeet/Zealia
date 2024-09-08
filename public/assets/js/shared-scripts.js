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
    console.log('removed current SHOW', showID);
    element.classList.add("flex");
    console.log('removed FLEX', showID);
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
    console.log('removed current HIDE', hideID);
    element.classList.add("hidden");
    console.log('added HIDDEN', hideID);
}

function disableScroll(){
    document.body.style.overflow = 'hidden';
}

function enableScroll(){
    document.body.style.overflow = 'auto'
}

document.body.addEventListener('click', () => hide('navDropDown'));