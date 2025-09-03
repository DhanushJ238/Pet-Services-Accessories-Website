<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Book Grooming Service</title>
  <style>
       header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #ff9800;
    padding: 10px 20px;
    color: white;
}

.logo {
    width: 50px;
    height: auto;
    margin-right: 10px;
}

.header-left {
    display: flex;
    align-items: center;
}

nav ul {
    list-style: none;
    display: flex;
    gap: 20px;
}

nav a {
    text-decoration: none;
    color: white;
    font-weight: bold;
}

.social-media img {
    width: 30px;
    margin-left: 10px;
}
    body {
      font-family: Arial;
      background-color: #f4f4f9;
      padding: 20px;
    }
    form {
      background: #fff;
      padding: 20px;
      max-width: 500px;
      margin: auto;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    input, select, button {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
    }
    button {
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>
    <header>
    <div class="header-left">
        <img src="img/logo.png" alt="Pawthopia Logo" class="logo">
        <h1>Pawthopia Pet Services</h1>
    </div>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="booking.php">Book Now</a></li>
            <li><a href="branches.php">Branches</a></li>
            <li><a href="signup.php">Signup</a></li>
            <li><a href="reviews.php">Reviews</a></li>
             <li><a href="product.php">Products</a></li>
        </ul>
    </nav>
    
    <div class="social-media">
        <a href="https://facebook.com"><img src="img/facebook.jpg" alt="Facebook"></a>
        <a href="https://twitter.com"><img src="img/twitter.jpg" alt="Twitter"></a>
        <a href="https://instagram.com"><img src="img/instagram.jpg" alt="Instagram"></a>
    </div>
</header>

  <h2 style="text-align:center;">Book Your Pet's Grooming</h2>
  <form id="groomingForm">
    <div class="form-group">
      <label for="clientName">Full Name</label>
      <input type="text" id="clientName" name="clientName" required>
    </div>
    <div class="form-group">
      <label for="clientEmail">Email</label>
      <input type="email" id="clientEmail" name="clientEmail" required>
    </div>
    <div class="form-group">
      <label for="petName">Pet's Name</label>
      <input type="text" id="petName" name="petName" required>
    </div>
    <div class="form-group">
      <label for="serviceType">Select Service</label>
      <select id="serviceType" name="serviceType" required>
        <option value="">Choose a service</option>
        <option value="bathing">Bathing</option>
        <option value="haircut">Haircut</option>
        <option value="nailTrimming">Nail Trimming</option>
      </select>
    </div>
    <button type="submit">Submit</button>
  </form>

  <script>
    // Automatically select the service from URL
    const params = new URLSearchParams(window.location.search);
    const selectedService = params.get('service');
    if (selectedService) {
      document.getElementById('serviceType').value = selectedService;
    }

    document.getElementById('groomingForm').addEventListener('submit', function(e) {
      e.preventDefault();
      alert("Thank you! Your booking has been submitted.");
    });
  </script>
</body>
</html>
