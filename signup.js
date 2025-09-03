document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("signupForm");
    const errorDisplay = document.getElementById("signup-error");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const fullname = form.fullname.value.trim();
        const email = form.email.value.trim();
        const password = form.password.value;
        const confirmPassword = form["confirm-password"].value;

        if (!fullname || !email || !password || !confirmPassword) {
            errorDisplay.textContent = "All fields are required.";
            return;
        }

        if (!validateEmail(email)) {
            errorDisplay.textContent = "Please enter a valid email address.";
            return;
        }

        if (password.length < 6) {
            errorDisplay.textContent = "Password must be at least 6 characters.";
            return;
        }

        if (password !== confirmPassword) {
            errorDisplay.textContent = "Passwords do not match.";
            return;
        }

        // Simulate successful registration
        alert("Account created successfully!");
        form.reset();
        errorDisplay.textContent = "";
    });

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }
});
