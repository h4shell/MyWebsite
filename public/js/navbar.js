const nav = document.querySelector("nav")
const hamburger = nav.querySelector(".hamburger");
const containerMenu = nav.querySelector(".container-menu")


hamburger.addEventListener("click", () => {
    const spans = hamburger.querySelectorAll("span")
    containerMenu.classList.toggle("active")
    spans[1].classList.toggle("d-none")
    spans[0].classList.toggle("rotate1")
    spans[2].classList.toggle("rotate2")

})