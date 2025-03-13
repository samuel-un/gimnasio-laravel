document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        let isValid = true;
        let messages = [];

        const name = document.getElementById("nombre").value.trim();
        const surname = document.getElementById("apellidos").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();
        const phone = document.getElementById("telefono").value.trim();

        if (!name) {
            isValid = false;
            messages.push("El campo Nombre es obligatorio.");
        }

        if (!surname) {
            isValid = false;
            messages.push("El campo Apellidos es obligatorio.");
        }

        if (!email || !validateEmail(email)) {
            isValid = false;
            messages.push("Introduce un correo electrónico válido.");
        }

        if (password.length < 8) {
            isValid = false;
            messages.push("La contraseña debe tener al menos 8 caracteres.");
        }

        if (phone.length > 0 && phone.length !== 9) {
            isValid = false;
            messages.push(
                "El número de teléfono debe tener 9 dígitos (Número ES)."
            );
        }

        if (!isValid) {
            event.preventDefault();
            showAlert(messages);
        }
    });

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
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
