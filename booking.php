<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Book Now - Pawthopia</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/booking.css" />
  <link rel="stylesheet" href="css/banner.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="pawthopia-booking">

  <?php include 'header.php'; ?>

  <div class="hero-section">
    <h1 class="hero-title">Book a Service</h1>
  </div>

  <main>
    <form class="booking-form" method="POST" action="submit_booking.php" id="bookingForm">
      <h2 class="form-header">Reservation Details</h2>

      <!-- Row 1: Your Name & Your Email -->
      <div class="form-row d-flex gap-3">
        <div class="form-col flex-fill">
          <div class="form-field">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required pattern="[A-Za-z\s]+"
              title="Name should only contain letters and spaces." class="form-control" />
          </div>
        </div>
        <div class="form-col flex-fill">
          <div class="form-field">
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required class="form-control" />
          </div>
        </div>
      </div>

      <!-- Row 2: Preferred Date & Pet's Name -->
      <div class="form-row d-flex gap-3 mt-3">
        <div class="form-col flex-fill">
          <div class="form-field">
            <label for="date">Preferred Date:</label>
            <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>" class="form-control" />
          </div>
        </div>
        <div class="form-col flex-fill">
          <div class="form-field">
            <label for="pet">Pet's Name:</label>
            <input type="text" id="pet" name="pet" required pattern="[A-Za-z\s]+"
              title="Pet's name should only contain letters and spaces." class="form-control" />
          </div>
        </div>
      </div>

      <!-- Row 3: Select Service & Additional Notes -->
      <!-- Row for Service -->
      <div class="form-row">
        <div class="form-col">
          <div class="form-field">
            <label for="service">Select Service:</label>
            <select id="service" name="service" required>
              <option value="">-- Please choose an option --</option>
              <option value="boarding">Boarding</option>
              <option value="grooming">Grooming</option>
              <option value="behaviorist">Behavioral Consultation</option>
              <option value="shopping">Personal Pet Shopping</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Row for Notes -->
      <div class="form-row">
        <div class="form-col">
          <div class="form-field">
            <label for="note">Additional Notes:</label>
            <textarea id="note" name="note" rows="5" placeholder="Any special instructions?"></textarea>
          </div>
        </div>
      </div>


      <div class="form-actions mt-4">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </form>
  </main>

  <script>
    document.getElementById('bookingForm').addEventListener('submit', function (e) {
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      const petName = document.getElementById('pet_name').value.trim();
      const service = document.getElementById('service').value;
      const date = document.getElementById('date').value;

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      const nameRegex = /^[A-Za-z\s]+$/;
      const errors = [];

      if (!nameRegex.test(name)) errors.push("Name can only contain letters and spaces.");
      if (!emailRegex.test(email)) errors.push("Please enter a valid email address.");
      if (!nameRegex.test(petName)) errors.push("Pet's name can only contain letters and spaces.");
      if (!service) errors.push("Please select a service.");
      if (!date) {
        errors.push("Please select a preferred date.");
      } else {
        const selectedDate = new Date(date);
        const today = new Date(); today.setHours(0, 0, 0, 0);
        if (selectedDate < today) errors.push("Preferred date cannot be in the past.");
      }

      if (errors.length > 0) {
        e.preventDefault();
        alert("Please fix the following errors:\n\n" + errors.join("\n"));
      }
    });
  </script>

  <?php include 'footer.php'; ?>
</body>

</html>