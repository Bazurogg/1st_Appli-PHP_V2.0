

// ----------------------------------------- Toggle Nav Bar -------------------------------------------------]


const navToggle = document.getElementById("toggle-icon");
const navBar = document.getElementById("nav-bar");
const iconToggle = document.getElementById("toggle-bars");

navToggle.addEventListener("click", () => {
     
    navBar.classList.toggle("active");
    iconToggle.classList.toggle("active");

})

