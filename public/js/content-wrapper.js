const navClose = document.getElementById("nav-close");
const navMenu = document.getElementById("nav-menu");
const navLink = document.getElementById("nav-link");
const sidebarButton = document.getElementById("sidebar-button");
const scrollUpButton = document.getElementById("tombol-scrollUp");
const sidebar = document.getElementById("sidebar");
const contentApp = document.getElementById("content-app");
const iconLeft = sidebarButton.querySelector('.fa-arrow-left');
const iconRight = sidebarButton.querySelector('.fa-arrow-right');

iconRight.style.display = 'none';


window.addEventListener("resize", () => {
    if (parseInt(window.innerWidth) < 725) {
        sidebar.classList.add("close");
        contentApp.classList.add("close");
    }
});
window.addEventListener("load", () => {
    if (parseInt(window.innerWidth) < 725) {
        sidebar.classList.add("close");
        contentApp.classList.add("close");
    }
});

scrollUpButton.addEventListener("click", () => {
    scrollTo(0, 0);
});

sidebarButton.addEventListener("click", () => {
    let pressed = sidebarButton.dataset.pressed;
    if (pressed === "false") {
        sidebar.classList.toggle("close");
        contentApp.classList.toggle("close");
        sidebarButton.dataset.pressed = "true";
        sidebarButton.style.backgroundColor = "var(--primary)";
        iconRight.style.display = 'inline-block';
        iconLeft.style.display = 'none';
        icon.classList.remove('fa-arrow-left');
        icon.classList.add('fa-arrow-rigth');
    } else {
        sidebar.classList.toggle("close");
        contentApp.classList.toggle("close");
        iconRight.style.display = 'none';
        iconLeft.style.display = 'inline-block';
        sidebarButton.dataset.pressed = "false";
        sidebarButton.style.backgroundColor = "#bebebe";
    }
});

navClose.addEventListener("click", () => {
    navLink.style.display = "none";
    navLink.style.transform = "translateY(-120%)";
    navLink.style.opacity = "0";
    buttonDisctive(navClose);
    buttonActive(navMenu);
});
navMenu.addEventListener("click", () => {
    navLink.style.display = "flex";
    navLink.style.transform = "translateY(0)";
    navLink.style.opacity = "1";
    buttonDisctive(navMenu);
    buttonActive(navClose);
});

function buttonActive(button) {
    button.style.display = "flex";
    button.style.pointerEvents = "auto";
}
function buttonDisctive(button) {
    button.style.display = "none";
    button.style.pointerEvents = "none";
}