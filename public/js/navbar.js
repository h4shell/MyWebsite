const nav = document.querySelector("nav")
const hamburger = nav.querySelector(".hamburger");
const containerMenu = nav.querySelector(".container-menu")

hamburger.addEventListener("click", () => {
    containerMenu.classList.toggle("active")
})