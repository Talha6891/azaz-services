var open_menu = document.getElementById("open_menu");
var close_menu = document.getElementById("close_menu");
var menu = document.getElementsByClassName("nav_link");

open_menu.addEventListener("click", function() {
    
    gsap.to(".nav_link",{
        top:"0vh",
    })

})

close_menu.addEventListener("click", function() {
    
    gsap.to(".nav_link",{
        top:"-100vh",
    })

})

// ------------------------------------------Menu Section ENDED--------------------------------