<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="css/style.css">
  <title>Pawtopia Care – Nutrition Dog Food</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .confirmation-msg {
      margin-top: 8px;
      color: green;
      font-weight: 600;
      font-size: 0.9rem;
    }
  </style>
</head>

<body>
  <div class="main-wrapper">
    <?php include 'header.php'; ?>
    <?php include 'db_connect.php';
    // Fetch branches from database
    $query = "SELECT img, name, description, price FROM product3";
    $result = mysqli_query($conn, $query);
    ?>
    <div class="container my-5">
      <h2 class="text-center mb-9 section-title">Pet Accessories</h2>
      <div class="row g-4">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <div class="col-md-4">
            <div class="card h-100">
              <img src="<?= htmlspecialchars($row['img']) ?>" class="card-img-top"
                alt="<?= htmlspecialchars($row['name']) ?>">
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
                <class="card-text"><?=htmlspecialchars($row['description']) ?></p>
                <p class="fw-bold"><?=htmlspecialchars($row['price']) ?></p>
                <button class="btn btn-success add-to-cart" data-name="<?= htmlspecialchars($row['name']) ?>"
                  data-price="35" data-image="<?= htmlspecialchars($row['img']) ?>">Add to Cart</button>
                <div class="confirmation-msg"></div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center">
        <div class="modal-header">
          <h5 class="modal-title" id="cartModalLabel">Item Added</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="modal-item-name"></p>
          <img id="modal-item-img" src="" alt="" class="img-fluid mb-2" style="max-height: 150px;" />
        </div>
        <div class="modal-footer justify-content-center flex-column align-items-center">
          <div class="d-flex justify-content-center gap-2 mb-2">
            <button type="button" class="btn btn-danger" id="undo-btn">Cancel </button>
            <button type="button" class="btn btn-primary" id="modal-ok-btn">OK</button>
          </div>
          <div id="modal-confirm-msg" style="color: green; font-weight: 600; font-size: 0.9rem; min-height: 1.2em;">
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const cartCountElement = document.getElementById("cart-count");
      let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
      if (cartCountElement) cartCountElement.textContent = cartItems.length;

      let lastAddedItem = null;
      let lastAddedCard = null;

      const modal = new bootstrap.Modal(document.getElementById("cartModal"));
      const itemNameEl = document.getElementById("modal-item-name");
      const itemImgEl = document.getElementById("modal-item-img");
      const undoBtn = document.getElementById("undo-btn");
      const okBtn = document.getElementById("modal-ok-btn");
      const modalConfirmMsg = document.getElementById("modal-confirm-msg");

      document.querySelectorAll(".add-to-cart").forEach(button => {
        button.addEventListener("click", () => {
          const name = button.getAttribute("data-name");
          const price = button.getAttribute("data-price");
          const image = button.getAttribute("data-image");

          const newItem = { name, price, image };
          cartItems.push(newItem);
          localStorage.setItem("cartItems", JSON.stringify(cartItems));
          if (cartCountElement) cartCountElement.textContent = cartItems.length;

          lastAddedItem = newItem;
          lastAddedCard = button.closest(".card-body");

          document.querySelectorAll(".confirmation-msg").forEach(el => el.textContent = "");
          modalConfirmMsg.textContent = "";

          itemNameEl.textContent = `${name} has been added to your cart.`;
          itemImgEl.src = image;
          modal.show();
        });
      });

      undoBtn.addEventListener("click", () => {
        if (lastAddedItem) {
          cartItems = cartItems.filter(item =>
            !(item.name === lastAddedItem.name && item.price === lastAddedItem.price && item.image === lastAddedItem.image)
          );
          localStorage.setItem("cartItems", JSON.stringify(cartItems));
          if (cartCountElement) cartCountElement.textContent = cartItems.length;
          modal.hide();

          if (lastAddedCard) {
            lastAddedCard.querySelector(".confirmation-msg").textContent = "";
          }
          modalConfirmMsg.textContent = "";
        }
      });

      okBtn.addEventListener("click", () => {
        modalConfirmMsg.textContent = "Added to cart!";
        if (lastAddedCard) {
          lastAddedCard.querySelector(".confirmation-msg").textContent = "Added to cart!";
        }
      });
    });
  </script>

  <?php include 'footer.php'; ?>
</body>

</html>