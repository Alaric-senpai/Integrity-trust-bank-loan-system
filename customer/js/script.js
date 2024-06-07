const toggle = document.getElementById("toggler");
const menu = document.getElementById("menu");
const content = document.getElementById("content");

toggle.addEventListener('click', function(){
    menu.classList.toggle("shown");
    console.log("button clicked");
});

content.addEventListener('click', function(){
    menu.classList.remove("shown");
});
