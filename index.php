<?php include 'header.php'; ?>
<?php include 'db_connect.php'; ?>

<head>
  <link rel="stylesheet" href="css/back.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<section class="hero">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <h2>Your Pet’s Paradise Awaits!</h2>
    <p>Expert care, quality products, and loving services for your furry friends.</p>
    <a href="booking.php" class="btn btn-success">Book a Service</a>
  </div>
</section>


<section id="about" class="py-5">
  <div class="container">
    <h2 class="mb-5 text-center about-title">About Us</h2>
    <div class="row text-center">
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm outline-orange">
          <div class="card-body">
            <h5 class="card-title">🐾 Grooming</h5>
            <p class="card-text">Professional grooming to keep your pets clean, healthy, and looking their best with
              love and care.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm outline-orange">
          <div class="card-body">
            <h5 class="card-title">🧠 Training</h5>
            <p class="card-text">Behavioral and obedience training designed to help pets learn and grow in a positive
              environment.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm outline-orange">
          <div class="card-body">
            <h5 class="card-title">🏠 Boarding</h5>
            <p class="card-text">Safe, comfortable boarding facilities where your pets are treated like part of our
              family.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="products" class="py-5 products-section text-white">
  <div class="container">
    <h2 class="mb-9 ">Products</h2>
    <p class="text-center mb-5">Discover a variety of nutritious pet foods, accessories, and toys to keep your pets
      healthy and happy.</p>
    <?php
    // Query service data
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);

    // Loop and display each service
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="service">';
        echo '<img src="' . htmlspecialchars($row['img']) . '" alt="' . htmlspecialchars($row['name']) . '">';
        echo '<h3 class="card-title">' . htmlspecialchars($row['name']) . '</h3>';
        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
        echo '<a class="btn btn-success open-signup" href="#" data-link="' . htmlspecialchars($row['link']) . '">Shop Now</a>';

        echo '</div>';
      }
    } else {
      echo "<p>No products available right now.</p>";
    }

    mysqli_close($conn);
    ?>
  </div>
</section>

<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-light shadow-lg rounded-5 overflow-hidden">

      <!-- Modal Header -->
      <div class="modal-header text-white" style="background: linear-gradient(135deg,rgb(237, 157, 37),rgb(248, 187, 96));">
        <h5 class="modal-title"><i class="bi bi-stars me-2"></i>Join Pawtopia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>


      <!-- Modal Body -->
     <div class="modal-body p-5 text-center">

  <!-- Welcome Message -->
  
  

  <!-- Choice Buttons -->
  <div id="choiceSection" class="d-flex justify-content-center gap-3">
    <a href="signup.php" class="btn btn-outline-primary px-4 py-2 rounded-pill fw-semibold shadow-sm">
      <i class="bi bi-person-plus"></i> Sign Up
    </a>
    <a href="login.php" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold shadow-sm">
      <i class="bi bi-box-arrow-in-right"></i> Login
    </a>
  </div>
</div>

        <!-- Signup Form -->
        <form id="signupForm" method="POST" action="signup_handler.php" class="d-none needs-validation" novalidate>
          <div class="input-group mb-3">
            <span class="input-group-text bg-success text-white"><i class="bi bi-person"></i></span>
            <input type="text" class="form-control" name="name" placeholder="Your Name" required>
            <div class="invalid-feedback">Please enter your name.</div>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text bg-primary text-white"><i class="bi bi-envelope"></i></span>
            <input type="email" class="form-control" name="email" placeholder="Email address" required>
            <div class="invalid-feedback">Enter a valid email address.</div>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text bg-warning text-white"><i class="bi bi-telephone"></i></span>
            <input type="tel" class="form-control" name="phone" pattern="\d{10}" placeholder="Phone Number" required>
            <div class="invalid-feedback">Enter a 10-digit phone number.</div>
          </div>
          <input type="hidden" name="product_link" id="signupLink">
          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-gradient-green btn-lg">Create Account</button>
          </div>
        </form>

        <!-- Login Form -->
        <form id="loginForm" method="POST" action="login_handler.php" class="d-none needs-validation" novalidate>
          <div class="input-group mb-3">
            <span class="input-group-text bg-primary text-white"><i class="bi bi-envelope"></i></span>
            <input type="email" class="form-control" name="email" placeholder="Registered Email" required>
            <div class="invalid-feedback">Please enter your registered email.</div>
          </div>
          <input type="hidden" name="product_link" id="loginLink">
          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-gradient-blue btn-lg">Log In</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>


<script>
  document.querySelectorAll('.open-signup').forEach(btn => {
    btn.addEventListener('click', function (e) {
      e.preventDefault(); // Prevent default anchor behavior
      const link = this.getAttribute('data-link');
      const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";

      if (isLoggedIn) {
        // ✅ User is logged in, go to product link
        window.location.href = link;
      } else {
        // ❌ Not logged in, show modal and pass link into forms
        document.getElementById('signupLink').value = link;
        document.getElementById('loginLink').value = link;

        // Reset form sections
        document.getElementById('choiceSection').classList.remove('d-none');
        document.getElementById('signupForm').classList.add('d-none');
        document.getElementById('loginForm').classList.add('d-none');

        // ✅ Show modal manually
        const modal = new bootstrap.Modal(document.getElementById('signupModal'));
        modal.show();
      }
    });
  });
</script>



<!-- <script>
  // Handle dynamic link injection and form toggle
  document.querySelectorAll('.open-signup').forEach(btn => {
    btn.addEventListener('click', function () {
      const link = this.getAttribute('data-link');
      document.getElementById('signupLink').value = link;
      document.getElementById('loginLink').value = link;

      // Reset forms and visibility
      document.getElementById('choiceSection').classList.remove('d-none');
      document.getElementById('signupForm').classList.add('d-none');
      document.getElementById('loginForm').classList.add('d-none');
    });
  });

  function showSignup() {
    document.getElementById('choiceSection').classList.add('d-none');
    document.getElementById('signupForm').classList.remove('d-none');
  }

  function showLogin() {
    document.getElementById('choiceSection').classList.add('d-none');
    document.getElementById('loginForm').classList.remove('d-none');
  }

  // Bootstrap validation
  (() => {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  })();
</script> -->






<section id="reviews" class="py-5 reviews-section text-white">

  <div class="container">
    <div class="row align-items-center">

      <!-- Review Content Column -->
      <div class="col-md-6 mb-4 mb-md-0">
        <h2 class="mb-4">Customer Reviews</h2>

        <blockquote class="blockquote mb-5">
          <p class="mb-0">"Amazing staff and excellent grooming service! My dog loves coming here."</p><br>
          <footer class="blockquote-footer">Meena K.</footer>
        </blockquote>

        <blockquote class="blockquote">
          <p class="mb-0">"Very clean and safe place for boarding. Highly recommend!"</p><br>
          <footer class="blockquote-footer">Arjun D.</footer>
        </blockquote>

        <a href="reviews.php" class="btn btn-success">Read More</a>
      </div>

      <!-- Images Column -->
      <div class="col-md-6 text-center">
        <div class="row g-3">
          <div class="col-6">
            <img src="img/customer1.jpg" alt="Happy Pet" class="img-fluid rounded shadow">
          </div>
          <div class="col-6">
            <img src="img/customer2.jpg" alt="Customer with Pet" class="img-fluid rounded shadow">
          </div>
          <div class="col-6">
            <img src="img/customer3.jpg" alt="Pet Grooming" class="img-fluid rounded shadow">
          </div>
          <div class="col-6">
            <img src="img/customer4.jpg" alt="Pet Boarding" class="img-fluid rounded shadow">
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section id="contact" class="py-5 contact-section text-white">
  <div class="container">
    <h2 class="mb-5 cont">Contact Us</h2>
    <div class="row text-center">

      <!-- Phone -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-0 bg-transparent text-white">
          <div class="cont-body">
            <h5 class="cont-text">📞 Phone</h5>
            <p class="card-text">+91 98765 43210</p>
          </div>
        </div>
      </div>

      <!-- Email -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-0 bg-transparent text-white">
          <div class="cont-body">
            <h5 class="cont-text">📧 Email</h5>
            <p class="card-text">support@pawthopia.com</p>
          </div>
        </div>
      </div>

      <!-- Address -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-0 bg-transparent text-white">
          <div class="cont-body">
            <h5 class="cont-text">📍 Visit Us</h5>
            <p class="card-text">123 Pet Lane, Chennai</p>
          </div>
        </div>
      </div>

    </div>

    <div class="text-center mt-4">
      <a href="contact.php" class="btn btn-success">Get in Touch</a>
    </div>
  </div>
</section>



<?php include 'footer.php'; ?>

</body>

</html>