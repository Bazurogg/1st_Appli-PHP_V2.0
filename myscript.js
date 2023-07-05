

// ----------------------------------------- Toggle Nav Bar -------------------------------------------------]


const navToggle = document.getElementById("toggle-icon");
const navBar = document.getElementById("nav-bar");
const iconToggle = document.getElementById("toggle-bars");

navToggle.addEventListener("click", () => {
     
    navBar.classList.toggle("active");
    iconToggle.classList.toggle("active");

    console.log("Bazinga ! it's working");

})

$(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
