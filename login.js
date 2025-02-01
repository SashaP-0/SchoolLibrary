document.addEventListener("DOMContentLoaded", function () {
    const passwordField = document.getElementById("loginPassword");
    const toggleButton = document.getElementById("toggleLoginPassword");

    if (passwordField && toggleButton) {
        toggleButton.addEventListener("click", function () {
            passwordField.type = passwordField.type === "password" ? "text" : "password";
            toggleButton.classList.toggle("fa-eye");
            toggleButton.classList.toggle("fa-eye-slash");
        });
    }
});

