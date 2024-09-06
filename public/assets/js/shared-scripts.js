document.getElementById('navDDbutton').addEventListener('click', (event) => 
{
    event.stopPropagation(); 
    show('navDropDown');
});
    

function show(showID) {
    const element = document.getElementById(showID);
    element.classList.toggle("hidden");
    element.classList.toggle("flex");
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