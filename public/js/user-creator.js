document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("form").addEventListener("submit", function (event) {
        let isValid = true;

        // Obtener los valores de los campos del formulario
        const name = document.getElementById("nombre").value.trim();
        const surname = document.getElementById("apellidos").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();
        const phone = document.getElementById("telefono").value.trim();

        // Validación del nombre
        if (!name) {
            alert("El campo Nombre es obligatorio.");
            isValid = false;
        }

        // Validación de los apellidos
        if (!surname) {
            alert("El campo Apellidos es obligatorio.");
            isValid = false;
        }

        // Validación del correo electrónico
        if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            alert("Introduce un correo electrónico válido.");
            isValid = false;
        }

        // Validación de la contraseña
        if (password.length < 8) {
            alert("La password debe tener al menos 8 caracteres.");
            isValid = false;
        }

        // Validación del teléfono opcional
        if (phone.length > 0) {
            if (phone.length < 9 || phone.length > 9) {
                alert(
                    "El número de teléfono debe tener 9 dígitos (Número ES)."
                );
                isValid = false;
            }
        }

        // Si hay errores, evitar el envío del formulario
        if (!isValid) {
            event.preventDefault();
        }
    });
});
