const nav = document.querySelector("nav")
const hamburger = nav.querySelector(".hamburger");
const containerMenu = nav.querySelector(".container-menu")
const liMenu = containerMenu.querySelectorAll("li")

hamburger.addEventListener("click", () => {
    const spans = hamburger.querySelectorAll("span")
    containerMenu.classList.toggle("active")
    spans[1].classList.toggle("d-none")
    spans[0].classList.toggle("rotate1")
    spans[2].classList.toggle("rotate2")
})

liMenu.forEach((li) => {
    li.addEventListener("click", () => {
        const spans = hamburger.querySelectorAll("span")
        containerMenu.classList.remove("active")
        spans[1].classList.remove("d-none")
        spans[0].classList.remove("rotate1")
        spans[2].classList.remove("rotate2")

    })
})
