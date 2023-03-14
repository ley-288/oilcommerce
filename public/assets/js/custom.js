// buttons
const dropdown = document.querySelector("#navbarDropdown");
const closure = document.querySelector("#closure-icon");
const navtog = document.querySelector(".navbar-toggler");
const sercBtn = document.querySelector(".search-btn");
const closeSerc = document.querySelector(".close-search-overlay");

// links
const hoverlink = document.querySelectorAll(".link-hover");

// divs
const page = document.querySelector("body");
const app = document.querySelector("#app");
const overlay = document.querySelector("#menu-overlay");
const overlayImage = document.querySelector(".overlay-layout");
const topnav = document.querySelector(".main-navbar");
const navbar = document.querySelector(".top-navbar");
const navfont = document.querySelector(".headline-spot");
const navfontm = document.querySelector(".m-headline");
const mobilenav = document.querySelector("nav");
const mobilebars = document.querySelector(".mobile-bars");
const sercOverlay = document.querySelector(".search-overlay");

// functions
dropdown.addEventListener("click", function (e) {
    navfont.classList.toggle("color-green");
    navfont.classList.toggle("text-light");
    navbar.classList.toggle("bg-black");
    $(page).scrollTop(0);
    page.classList.toggle("stop-scroll");
    overlay.classList.toggle("overlay-hide");
    closure.classList.toggle("fa-bars");
    closure.classList.toggle("text-light");
    closure.classList.toggle("fa-times-circle");
    overlay.style.backgroundImage = "url('')";
});

navtog.addEventListener("click", function (e) {
    $(app).scrollTop(0);
    page.classList.toggle("stop-scroll");
    app.classList.toggle("stop-scroll");
    navfontm.classList.toggle("color-green");
    navfontm.classList.toggle("text-light");
    mobilenav.classList.toggle("bg-black");
    mobilebars.classList.toggle("black-bars");
    mobilebars.classList.toggle("fa-bars");
    mobilebars.classList.toggle("fa-times-circle");
});

sercBtn.addEventListener("click", function (e) {
    sercOverlay.classList.toggle("overlay-hide");
});

closeSerc.addEventListener("click", function (e) {
    sercOverlay.classList.toggle("overlay-hide");
});

hoverlink.forEach(function (elem) {
    elem.addEventListener(
        "mouseover",
        function (e) {
            const ok = elem.getAttribute("data-src");
            overlay.style.backgroundImage = "url('" + ok + "')";
            this.style.opacity = "1";
            $(elem)
                .siblings()
                .each(function (el) {
                    this.style.opacity = "0.5";
                });
        },
        false
    );
});

/*
var lastScrollTop = 0;
const upscr = document.querySelector(".main-navbar");
// element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.
window.addEventListener(
    "scroll",
    function () {
        // or window.addEventListener("scroll"....
        var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
        if (st > lastScrollTop) {
            console.log("down");
        } else if (st < lastScrollTop) {
            console.log("up");
            $(upscr).scrollTop(0);
        } // else was horizontal scroll
        lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
    },
    false
);
*/
