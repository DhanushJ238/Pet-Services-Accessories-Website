<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Pawthopia</title>
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/banner.css">
    <script defer src="signup.js"></script>
</head>
<body>

   <?php include 'header.php'; ?>
      <div class="banner-section text-center">
  <h1>Create a New Account</h1>
</div>
    <main>
        <section class="signup-form">
            
            <form  method="POST" action="submit_signin.php">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required placeholder="Enter your full name">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required minlength="6" placeholder="Create a password">

                <label for="confirm">Confirm Password:</label>
                <input type="password" id="confirm" name="confirm" required placeholder="Confirm your password">

                <button type="submit" class="btn btn-success">Sign Up</button>
                <p id="signup-error" style="color: red;"></p>
            </form>
        </section>
    </main>
 <?php include 'footer.php'; ?>
</body>
</html>
