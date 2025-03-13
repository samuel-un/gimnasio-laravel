document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");

    form.addEventListener("submit", function (e) {
        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();

        let isValid = true;
        let messages = [];

        if (!validateEmail(email)) {
            isValid = false;
            messages.push("Por favor, ingresa un correo electrónico válido.");
        }

        if (password.length < 8) {
            isValid = false;
            messages.push("La contraseña debe tener al menos 8 caracteres.");
        }

        if (!isValid) {
            e.preventDefault();
            showAlert(messages);
        }
    });

    function validateEmail(email) {
        const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        return regex.test(email);
    }

    function showAlert(messages) {
        const existingAlert = document.querySelector(".alert");
        if (existingAlert) {
            existingAlert.remove();
        }

        const alertDiv = document.createElement("div");
        alertDiv.className = "alert alert-danger py-2 text-center";
        alertDiv.role = "alert";
        alertDiv.innerHTML = messages.map((msg) => `<p>${msg}</p>`).join("");

        form.parentElement.insertBefore(alertDiv, form);
    }
});
