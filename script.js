document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    if (username === "admin" && password === "1234") {
        alert("Login successful!");
        window.location.href = "services.html"; // Redirect to services page
    } else {
        alert("Invalid username or password!");
    }
});