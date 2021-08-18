let burgerBut = document.getElementById("burgerBut");
let burgerStart = document.getElementById("lineStart");
let burgerCenter = document.getElementById("lineCenter");
let burgerEnd = document.getElementById("lineEnd");
let navMenu = document.getElementById("navMenu");
burgerBut.onclick = () =>{
        burgerStart.classList.toggle("burger__line--start");
        burgerCenter.classList.toggle("burger__line--center");
        burgerEnd.classList.toggle("burger__line--end");
        burgerBut.classList.toggle("burger__mobile");
        navMenu.classList.toggle("nav__mobile");
};

