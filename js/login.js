document.getElementById("loginForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value.trim();
  const petType = document.getElementById("pet-type").value;
  const userType = document.querySelector('input[name="user-type"]:checked');
  const terms = document.querySelector('input[name="terms"]').checked;
  const errorMessage = document.getElementById("error-message");

  if (!email || !password || !petType || !userType || !terms) {
    errorMessage.textContent = "Please fill in all fields correctly.";
  } else if (password.length < 6) {
    errorMessage.textContent = "Password must be at least 6 characters.";
  } else {
    errorMessage.textContent = "";
    alert("Login successful!");
    // Optionally submit form via AJAX or redirect here
  }
});
