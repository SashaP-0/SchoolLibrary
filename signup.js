// Populate the day dropdown
const daySelect = document.getElementById('day');
for (let i = 1; i <= 31; i++) {
    const option = document.createElement('option');
    option.value = i;
    option.textContent = i;
    daySelect.appendChild(option);
}

//Populate the year dropdown
const yearSelect = document.getElementById('year');
const currentYear = new Date().getFullYear();
for (let i = currentYear; i >= 1900; i--) {
    const option = document.createElement('option');
    option.value = i;
    option.textContent = i;
    yearSelect.appendChild(option);
}

document.addEventListener("DOMContentLoaded", function () {
    function togglePassword(inputId, toggleId) {
        const passwordField = document.getElementById(inputId);
        const toggleButton = document.getElementById(toggleId);

        if (passwordField && toggleButton) {
            toggleButton.addEventListener("click", function () {
                passwordField.type = passwordField.type === "password" ? "text" : "password";
                toggleButton.classList.toggle("fa-eye");
                toggleButton.classList.toggle("fa-eye-slash");
            });
        }
    }

    togglePassword("password", "togglePassword");
    togglePassword("confirmPassword", "toggleConfirmPassword");
});
