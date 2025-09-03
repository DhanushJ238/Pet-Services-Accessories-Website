<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Pawthopia</title>
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/banner.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <?php include 'header.php'; ?>

  <div class="banner-section text-center">
    <h1>Contact Us</h1>
  </div>
  <p class="text-center mt-3">Need assistance or have questions? Reach out to us.</p>

  <div class="contact-container">

    <!-- Form Section -->
    <div class="contact-form">
      <h2>Send Us a Message</h2>
      <form method="POST" action="submit_contact.php">
        <label for="name">Your Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>

        <label for="email">Your Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>

        <label for="message">Message:</label>
        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>

        <button type="submit" class="btn btn-success mt-3">Send</button>
      </form>
    </div>

    <!-- Contact Info Section -->
    <div class="contact-info">
      <p><i class="bi bi-geo-alt-fill text-danger"></i> <strong>Address:</strong> 123 Pet Street, Tambaram, TN, India</p>
      <p><i class="bi bi-telephone-fill text-danger"></i> <strong>Phone:</strong> 9876543210</p>
      <p><i class="bi bi-envelope-at-fill text-primary"></i> <strong>Email:</strong> support@pawthopia.com</p>
      <ul class="mt-3">
        <li>🐾 Open Mon–Sat: 9 AM – 6 PM</li>
        <li>🐾 Quick response within 24 hours</li>
        <li>🐾 Free consultation for pet care</li>
        <li>🐾 Friendly support team</li>
      </ul>
    </div>

  </div>

<?php include 'footer.php'; ?>
</body>
</html>
