document.addEventListener("DOMContentLoaded", function () {
    function togglePasswordVisibility(inputId, toggleId) {
        const passwordField = document.getElementById(inputId);
        const toggleButton = document.getElementById(toggleId);
        if (passwordField && toggleButton) {
            toggleButton.addEventListener("click", function () {
                const isPassword = passwordField.type === "password";
                passwordField.type = isPassword ? "text" : "password";
                toggleButton.classList.toggle("fa-eye");
                toggleButton.classList.toggle("fa-eye-slash");
            });
        }
    }
    togglePasswordVisibility("password", "togglePassword");
    togglePasswordVisibility("confirmPassword", "toggleConfirmPassword");
});
