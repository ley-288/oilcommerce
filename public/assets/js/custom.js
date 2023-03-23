const closeSerc = document.querySelector(".close-search-overlay");
const sercOverlay = document.querySelector(".search-overlay");
const sercBtn = document.querySelector(".search-btn");

sercBtn.addEventListener("click", function (e) {
    sercOverlay.classList.toggle("overlay-hide");
});

closeSerc.addEventListener("click", function (e) {
    sercOverlay.classList.toggle("overlay-hide");
});
