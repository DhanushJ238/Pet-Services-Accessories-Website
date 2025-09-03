<!-- login.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Pawthopia</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/banner.css">
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <?php include 'header.php'; ?>

  <div class="banner-section text-center">
    <h1>Login to Pawthopia</h1>
  </div>

  <main>
    <section class="login-container">
      <form method="POST" action="submit_login.php" id="loginForm" class="login-form">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email" />

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required minlength="6" placeholder="Enter your password" />

        <label for="phone">Phone</label>
        <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number" />

        <label for="address">Address</label>
        <input type="text" id="address" name="address" required placeholder="Enter your address" />

        <label for="city">City</label>
        <input type="text" id="city" name="city" required placeholder="Enter your city" />

        <label class="checkbox-label">
          <input type="checkbox" name="agree" required />
          I agree to the <a href="#" id="termsLink">terms and conditions</a>.
        </label>

        <button type="submit" class="btn btn-success">Login</button>

        <p class="signup-link">
          New to Pawthopia? <a href="signup.php">Create an account</a>
        </p>
      </form>

    </section>
  </main>

  <!-- Terms Modal -->
  <div id="termsModal" class="modal"
    style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5);">
    <div class="modal-content"
      style="background:#fff; margin:10% auto; padding:20px; width:80%; max-width:500px; position:relative;">
      <span class="close"
        style="position:absolute; top:10px; right:15px; font-size:20px; cursor:pointer;">&times;</span>
      <h2>Terms and Conditions</h2>
      <ul>
        <li>You must provide accurate and up-to-date information during registration.</li>
        <li>Keep your account details safe and secure.</li>
        <li>You agree not to misuse the platform or harm other users.</li>
        <li>Respect community guidelines.</li>
        <li>Pawthopia may update terms at any time.</li>
      </ul>
    </div>
  </div>

  <script>
    const modal = document.getElementById("termsModal");
    const btn = document.getElementById("termsLink");
    const span = document.querySelector(".close");

    btn.onclick = function (e) {
      e.preventDefault();
      modal.style.display = "block";
    };
    span.onclick = function () {
      modal.style.display = "none";
    };
    window.onclick = function (e) {
      if (e.target == modal) {
        modal.style.display = "none";
      }
    };
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const form = document.getElementById("loginForm");

      form.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch("submit_login.php", {
          method: "POST",
          body: formData
        })
          .then(response => response.json())
          .then(result => {
            if (result.status === "success") {
              // Save user info in localStorage
              localStorage.setItem("isLoggedIn", "true");
              localStorage.setItem("user_id", result.user_id);
              localStorage.setItem("user_email", result.email);
              localStorage.setItem("user_phone", result.phone);
              localStorage.setItem("user_city", result.city);

              alert(result.message);
              window.location.href = "index.php";
            } else {
              alert("Error: " + result.message);
            }
          })
          .catch(error => {
            console.error("Error:", error);
            alert("Something went wrong while submitting the form.");
          });
      });
    });

  </script>





  <footer class="bg-dark text-white text-center py-3">
    <p class="bor">&copy; 2025 Pawthopia Pet Services. All rights reserved.</p>
  </footer>
</body>

</html>
