document.addEventListener("DOMContentLoaded", () => {

    const form = document.querySelector("form");
    if (!form) return;

    form.addEventListener("submit", (e) => {

        let valido = true;

        document.querySelectorAll(".error").forEach(el => el.textContent = "");

        const nombre = document.getElementById("nombre");
        const email = document.getElementById("email");
        const password = document.getElementById("password");

        if (nombre && nombre.value.trim().length < 3) {
            document.getElementById("errorNombre").textContent =
            "El nombre debe tener al menos 3 caracteres";
            valido = false;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email && !emailRegex.test(email.value)) {
            document.getElementById("errorEmail").textContent =
            "Introduce un email válido";
            valido = false;
        }

        if (password && password.value.length < 6) {
            document.getElementById("errorPassword").textContent =
            "La contraseña debe tener al menos 6 caracteres";
            valido = false;
        }

        if (!valido) {
            e.preventDefault();
        }
    });
});
