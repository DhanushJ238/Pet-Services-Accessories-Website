<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pawthopia - Home</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">




</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="img/logo.png" alt="Pawthopia Logo" width="40" height="40" class="me-2">
        <span class="fw-bold">Pawthopia Pet Services</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link <?= $current_page == 'index.php' ? 'active' : '' ?>"
              href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link <?= $current_page == 'about.php' ? 'active' : '' ?>"
              href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link <?= $current_page == 'services.php' ? 'active' : '' ?>"
              href="services.php">Services</a></li>

          <li class="nav-item"><a class="nav-link <?= $current_page == 'reviews.php' ? 'active' : '' ?>"
              href="reviews.php">Reviews</a></li>
          <li class="nav-item"><a class="nav-link <?= $current_page == 'branches.php' ? 'active' : '' ?>"
              href="branches.php">Branches</a></li>
          <li class="nav-item"><a class="nav-link <?= $current_page == 'contact.php' ? 'active' : '' ?>"
              href="contact.php">Contact Us</a></li>
          <li class="nav-item"><a class="nav-link <?= $current_page == 'login.php' ? 'active' : '' ?>"
              href="login.php">Login</a></li>
              <li class="nav-item"><a class="nav-link <?= $current_page == 'logout.php' ? 'active' : '' ?>"
              href="logout.php">Logout</a></li>
        </ul>

        <!-- Cart Icon -->
        <ul class="navbar-nav ms-lg-3">
          <li class="nav-item">
            <a class="nav-link position-relative" href="cart.php">
              🛒 Cart
              <span id="cart-count"
                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                0
              </span>
            </a>
          </li>
        </ul>

        <!-- Social Icons -->
        <div class="d-flex ms-lg-3">
          <a href="https://facebook.com" class="me-2"><img src="img/facebook.jpg" alt="Facebook" width="24"
              height="24"></a>
          <a href="https://twitter.com" class="me-2"><img src="img/twitter.jpg" alt="Twitter" width="24"
              height="24"></a>
          <a href="https://instagram.com"><img src="img/instagram.jpg" alt="Instagram" width="24" height="24"></a>
        </div>
      </div>
    </div>
  </nav>

 
    <script>
  document.addEventListener('DOMContentLoaded', () => {
    const cartCountElement = document.getElementById('cart-count');
      const userEmail = localStorage.getItem('user_email');
      const allItems = JSON.parse(localStorage.getItem('cartItems')) || [];

    // Filter only items that belong to the logged-in user
    // const userCartItems = allItems.filter(item => item.email === userEmail);

      if (cartCountElement) {
        cartCountElement.textContent = allItems.length;
    }
  });
  </script>

 
</body>

</html>