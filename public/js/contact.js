const form = document.querySelector("form");

const sendButton = form.querySelector(".btn");
let url = "";

if (window.location.host === "h4shell.github.io") {
  url = "https://h4sh.it/contact.php";
} else {
  url = "/contact.php";
}

sendButton.addEventListener("click", (event) => {
  event.preventDefault();
  const formBody = {
    name: form.querySelector('input[name="name"]').value,
    email: form.querySelector('input[name="email"]').value,
    message: form.querySelector('textarea[name="message"]').value,
  };

  const options = {
    method: "POST",
    body: JSON.stringify(formBody),
    headers: {
      "Content-Type": "application/json",
    },
  };

  fetch(url, options)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Errore nella richiesta POST");
      }
      return response.json(); // Parsa la risposta come JSON
    })
    .then((data) => {
      console.log(data);
      if (data === 1) {
        sendButton.style.background = "green";
        sendButton.style.color = "white";
        sendButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
</svg>`;

        form.querySelectorAll("input, textarea").forEach((input) => {
          input.value = "";
        });
      } else {
        sendButton.style.background = "red";
        sendButton.style.color = "white";
        sendButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
</svg>`;
      }
    })
    .catch((error) => {
      console.log(error);
      sendButton.style.background = "red";
      sendButton.style.color = "white";
      sendButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
</svg>`;
    });
});
