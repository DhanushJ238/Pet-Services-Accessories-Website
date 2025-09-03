<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pawtopia Care – Healthy Treats</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <style>
    /* Confirmation message style below each product */
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

  <!-- Main Section -->
  <div class="container my-5">
    <h2 class="text-center mb-9 section-title">Healthy Treats</h2>
    <div class="row g-4">

      <!-- Product 1 -->
      <div class="col-md-4">
        <div class="card h-100">
          <img src="img/treats2.jpg" class="card-img-top" alt="Lamb Sticks for Pets" />
          <div class="card-body">
            <h5 class="card-title">Lamb Treats</h5>
            <p class="card-text">Lamb Sticks with Pumpkin – Rich in Protein & Fiber</p>
            <p class="fw-bold">$25 – 3 pieces</p>
            <button class="btn  btn-success add-to-cart"
                    data-name="Lamb Treats"
                    data-price="25"
                    data-image="img/treats2.jpg">
              Add to Cart
            </button>
            <div class="confirmation-msg"></div>
          </div>
        </div>
      </div>

      <!-- Product 2 -->
      <div class="col-md-4">
        <div class="card h-100">
          <img src="img/treats1.jpg" class="card-img-top" alt="Chicken Breast Treats for Pets" />
          <div class="card-body">
            <h5 class="card-title">Chicken Breast Treats</h5>
            <p class="card-text">Air-Dried Chicken Breast – Great for Dogs & Cats</p>
            <p class="fw-bold">$22 – 2 pieces</p>
            <button class="btn  btn-success add-to-cart"
                    data-name="Chicken Breast Treats"
                    data-price="22"
                    data-image="img/treats1.jpg">
              Add to Cart
            </button>
            <div class="confirmation-msg"></div>
          </div>
        </div>
      </div>

      <!-- Product 3 -->
      <div class="col-md-4">
        <div class="card h-100">
          <img src="img/treats.jpg" class="card-img-top" alt="Healthy Treats for Pets" />
          <div class="card-body">
            <h5 class="card-title">Healthy Treats</h5>
            <p class="card-text">Chicken & Flaxseed Nutritious Snacks for Pets</p>
            <p class="fw-bold">$18 – 3 pieces</p>
            <button class="btn  btn-success add-to-cart"
                    data-name="Healthy Treats"
                    data-price="18"
                    data-image="img/treats.jpg">
              Add to Cart
            </button>
            <div class="confirmation-msg"></div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center mt-5">
    <p>&copy; 2025 Pawtopia Care. All rights reserved.</p>
  </footer>
</div>

<!-- Modal for Add to Cart -->
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
          <button type="button" class="btn btn-danger" id="undo-btn">Cancel</button>
          <button type="button" class="btn btn-primary" id="modal-ok-btn">OK</button>
        </div>
        <div id="modal-confirm-msg" style="color: green; font-weight: 600; font-size: 0.9rem; min-height: 1.2em;"></div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
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

        // Clear all other confirmation messages under products
        document.querySelectorAll(".confirmation-msg").forEach(el => el.textContent = "");
        // Clear modal confirmation message each time modal opens
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

        // Clear confirmation messages
        if (lastAddedCard) {
          lastAddedCard.querySelector(".confirmation-msg").textContent = "";
        }
        modalConfirmMsg.textContent = "";
      }
    });

    okBtn.addEventListener("click", () => {
      // Show confirmation message INSIDE modal below buttons
      modalConfirmMsg.textContent = "Added to cart!";

      // Also show confirmation below the product card
      if (lastAddedCard) {
        lastAddedCard.querySelector(".confirmation-msg").textContent = "Added to cart!";
      }
    });
  });
</script>

<footer class="bg-dark text-white text-center py-3">
  <p class="bor">&copy; 2025 Pawthopia Pet Services. All rights reserved.</p>
</footer>
</body>
</html>
