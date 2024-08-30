const navDD = document.getElementById('navDropDown');

document.getElementById('navDDbutton').addEventListener('click', (event) => 
{
    event.stopPropagation(); 
    show(navDD)
});
    

function show(showID) {
    showID.classList.toggle("hidden");
    showID.classList.toggle("flex");
    console.log("showed");
}

function hide(showID) {
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

    showID.classList.remove(...displayClasses);
    console.log('removed');
    showID.classList.add("hidden");
    console.log('added');
}

document.body.addEventListener('click', () => hide(navDD));