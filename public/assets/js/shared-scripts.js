const navDD = document.getElementById('navDropDown');

document.getElementById('navDDbutton').addEventListener('click', () => show(navDD));

function show(showID) {
    showID.classList.toggle("hidden");
    showID.classList.toggle("flex");
}

