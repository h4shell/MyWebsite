const containerPortfolio = document.querySelector("#container-portfolio");

const items = document.querySelectorAll(".item");

items.forEach((item) => {

    const url = item.getAttribute("data-url");
    const image = item.getAttribute("data-image");

    if (!url && !image) {
        return;
    }

    const containerButton = document.createElement("div");
    containerButton.classList.add("container-button");

    const btn = document.createElement("a");
    btn.classList.add("btn");
    btn.setAttribute("href", url);
    btn.innerText = "View Project";

    containerButton.appendChild(btn);
    item.appendChild(containerButton);


    console.log(url, image)

    item.style.background = "url(public/images/" + image + ") no-repeat center/cover";
})