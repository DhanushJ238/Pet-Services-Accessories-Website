<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title class="mb-4">Contact Us</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f8f8;
    }

    main {
     
      margin: auto;
      padding: 40px 20px;
    }

    .center-section {
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .customer-reviews {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .review {
      text-align: center;
    }

    .customer-img {
      width: 250px;       /* Medium size */
      height: auto;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
      margin-bottom: 10px;
    }

    h2, h3 {
      font-family:"DynaPuff", system-ui;
      text-align: center;
      color: #333;
    }

    .card {
      background-color: #fdfdfd;
      padding: 20px;
      margin-top: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .right-side {
      background-color: #fff;
      padding: 25px;
      margin-top: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }

    form input[type="text"],
    form textarea {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    form input[type="submit"] {
      padding: 10px 20px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    form input[type="submit"]:hover {
      background-color: #0056b3;
    }

    @media (max-width: 600px) {
      .customer-img {
        width: 100%;
      }
    }
  </style>
</head>
<body> -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - Pawthopia</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/banner.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

  <?php include 'header.php'; ?>

  <div class="container-fluid p-0 m-0">
    <div class="banner-section text-center">
      <h1 class=" mb-4">Reviews</h1>
    </div>
  </div>



  <section class="review-section py-5">
    <div class="container">
      <div class="row align-items-center">
        <!-- Image Column -->
        <div class="col-lg-6 mb-4 mb-lg-0 pe-lg-5">
          <img src="img/customer3.jpg" alt="About Us" class="img-fluid rounded-4 shadow-lg">
        </div>

        <!-- Text Column -->
        <div class="col-lg-6 ps-lg-5">
          <h2 class="display-5 fw-bold mb-3 review-title">About Our Pet Care</h2>

          <p>At Happy Paws Pet Boarding, we understand how much your furry family members mean to you. That’s why we
            strive to create a safe, clean, and loving environment where pets feel at home - even when you're away.</p>

          <p>Our customer reviews reflect the trust and satisfaction of pet parents who have experienced our care
            firsthand. Whether it's short - term boarding, extended stays, or special attention for senior pets, our
            team
            goes the extra mile to ensure tails keep wagging.</p>

          <p>Reading real feedback helps new customers feel confident about leaving their pets with us—and we love
            hearing how our service brings peace of mind. Your stories, suggestions, and kind words inspire us to
            continuously improve and provide the best care possible.</p>

          <p>Have you tried our boarding services? We'd love to hear from you! 🐶🐱💬</p>

          <p>We also offer personalized feeding routines and daily exercise plans tailored to your pet's needs—because
            every animal deserves individual attention and care.</p>

          <ul class="list-unstyled">
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Premium Quality Products</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Trusted by Pet Lovers</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Fast & Friendly Service</li>
            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Personalized Feeding & Exercise Plans</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="review-section py-5">
    <div class="container">
      <div class="row align-items-center">
        <!-- Review Form Column -->
        <div class="col-lg-12 mb-4 mb-lg-0 pe-lg-5">
          <div class="shadow-lg p-4 rounded-4">
            <h3 class="mb-4 text-center">Leave a Review 🐾</h3>
             <form method="POST" action="submit_review.php">
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="name" class="form-label">Your Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label">Your Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
              </div>

              <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select class="form-label" id="rating" name="rating" required>
                  <option selected disabled value="">Choose rating</option>
                  <option>⭐⭐⭐⭐⭐ Excellent</option>
                  <option>⭐⭐⭐⭐ Good</option>
                  <option>⭐⭐⭐ Average</option>
                  <option>⭐⭐ Poor</option>
                  <option>⭐ Very Poor</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="your_review" class="form-label">Your Review</label>
                <textarea class="form-control" id="your_review" name="your_review" rows="4" placeholder="Write your review here..."
                  required></textarea>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-success">
                  Submit 
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php include 'footer.php'; ?>



</body>

</html>