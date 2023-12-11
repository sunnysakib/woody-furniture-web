document
  .querySelector("form")
  .addEventListener("submit", async function (event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);
    const errorElement = document.getElementById("loginError");

    try {
      const response = await fetch(form.action, {
        method: form.method,
        body: formData,
      });

      const result = await response.text();

      if (result === "ok") {
        window.location.href = "/woody/index.html";
      } else {
        errorElement.innerText = result;
      }

    } catch (error) {
      console.error("Error:", error);
    }
  });
