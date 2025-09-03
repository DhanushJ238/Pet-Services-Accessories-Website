<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pawtopia Care – Pet Food</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
     <?php include 'header.php'; ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Pawtopia</a>
  </div>
</nav>

<!-- Main Section -->
<div class="container my-5">
  <h2 class="text-center mb-4 section-title">Pet Food Products</h2>
  <div class="row g-4">

    <!-- Product Template -->
    <div class="col-md-4">
      <div class="card h-100">
        <img src="img/A.jpg" class="card-img-top" alt="Dog Food">
        <div class="card-body">
          <h5 class="card-title">Healthy Bites Dog Food</h5>
          <p class="card-text">Grain-free, chicken formula with vitamins and minerals. Ideal for active dogs.</p>
          <p class="fw-bold">$20 – 5kg</p>
          <button class="btn btn-primary btn-sm add-to-cart" 
                  data-name="Healthy Bites Dog Food" 
                  data-price="$20" 
                  data-image="img/A.jpg"
                  data-bs-toggle="modal" data-bs-target="#productModal">
            Add to Cart
          </button>
        </div>
      </div>
    </div>

    <!-- Product 2 -->
    <div class="col-md-4">
      <div class="card h-100">
        <img src="img/C.jpg" class="card-img-top" alt="Cat Food">
        <div class="card-body">
          <h5 class="card-title">Meow Mix Cat Food</h5>
          <p class="card-text">Rich in protein and omega-3 for shiny fur and healthy digestion.</p>
          <p class="fw-bold">$18 – 3kg</p>
          <button class="btn btn-primary btn-sm add-to-cart" 
                  data-name="Meow Mix Cat Food" 
                  data-price="$18" 
                  data-image="img/B.jpg"
                  data-bs-toggle="modal" data-bs-target="#productModal">
            Add to Cart
          </button>
        </div>
      </div>
    </div>

    <!-- Product 3 -->
    <div class="col-md-4">
      <div class="card h-100">
        <img src="img/B.jpg" class="card-img-top" alt="Puppy Food">
        <div class="card-body">
          <h5 class="card-title">PupStart Puppy Food</h5>
          <p class="card-text">Formulated for growing pups with DHA for brain development.</p>
          <p class="fw-bold">$22 – 4kg</p>
          <button class="btn btn-primary btn-sm add-to-cart" 
                  data-name="PupStart Puppy Food" 
                  data-price="$22" 
                  data-image="img/C.jpg"
                  data-bs-toggle="modal" data-bs-target="#productModal">
            Add to Cart
          </button>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalProductName">Product Name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body row">
        <div class="col-md-5">
          <img id="modalProductImage" src="" class="img-fluid" alt="Product">
          <p class="mt-3"><strong>Price:</strong> <span id="modalProductPrice"></span></p>
          <div class="quantity-control mb-3">
            <label class="me-2">Quantity:</label>
            <button class="btn btn-outline-secondary btn-sm" onclick="changeQty(-1)">-</button>
            <span id="qtyDisplay">1</span>
            <button class="btn btn-outline-secondary btn-sm" onclick="changeQty(1)">+</button>
          </div>
        </div>
        <div class="col-md-7">
          <h6>Select Size:</h6>
          <div id="size-options">
            <span class="option-button" onclick="selectOption(this, 'size')">200G</span>
            <span class="option-button" onclick="selectOption(this, 'size')">300G</span>
          </div>

          <h6 class="mt-3">Select Pack:</h6>
          <div id="pack-options">
            <span class="option-button" onclick="selectOption(this, 'pack')">Single</span>
            <span class="option-button" onclick="selectOption(this, 'pack')">Pack of 5</span>
            <span class="option-button" onclick="selectOption(this, 'pack')">Pack of 15 <small>(15% off)</small></span>
            <span class="option-button" onclick="selectOption(this, 'pack')">Pack of 30 <small>(25% off)</small></span>
          </div>

          <form id="orderForm" class="needs-validation mt-4" novalidate>
            <h6>Customer Details</h6>
            <div class="mb-2">
              <input type="text" name="customerName" class="form-control" placeholder="Name" required>
              <div class="invalid-feedback">Please enter your name.</div>
            </div>
            <div class="mb-2">
              <input type="email" name="customerEmail" class="form-control" placeholder="Email" required>
              <div class="invalid-feedback">Please enter a valid email address.</div>
            </div>
            <div class="mb-2">
              <textarea name="customerAddress" class="form-control" placeholder="Address" rows="2" required></textarea>
              <div class="invalid-feedback">Please enter your address.</div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" onclick="submitOrder()">Buy Now</button>
        <button class="btn btn-primary" onclick="handleAddToCart()">Add to Cart</button>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer>
  <p>&copy; 2025 Pawtopia Care. All rights reserved.</p>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  let qty = 1;
  function changeQty(val) {
    qty += val;
    if (qty < 1) qty = 1;
    document.getElementById('qtyDisplay').textContent = qty;
  }

  function selectOption(el, group) {
    let containerId = group === 'size' ? 'size-options' : 'pack-options';
    document.querySelectorAll('#' + containerId + ' .option-button').forEach(btn => {
      btn.classList.remove('active');
    });
    el.classList.add('active');
  }

  document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function () {
      document.getElementById('modalProductName').textContent = this.dataset.name;
      document.getElementById('modalProductImage').src = this.dataset.image;
      document.getElementById('modalProductPrice').textContent = this.dataset.price;
      qty = 1;
      document.getElementById('qtyDisplay').textContent = qty;
      document.querySelectorAll('.option-button').forEach(btn => btn.classList.remove('active'));
    });
  });

  function submitOrder() {
    const form = document.getElementById('orderForm');
    if (!form.checkValidity()) {
      form.classList.add('was-validated');
      return;
    }

    alert('Order submitted successfully!');
    form.reset();
    form.classList.remove('was-validated');

    const modal = bootstrap.Modal.getInstance(document.getElementById('productModal'));
    modal.hide();
  }

  function handleAddToCart() {
    const form = document.getElementById('orderForm');
    if (!form.checkValidity()) {
      form.classList.add('was-validated');
      return;
    }

    alert('Product added to cart!');
    form.reset();
    form.classList.remove('was-validated');

    const modal = bootstrap.Modal.getInstance(document.getElementById('productModal'));
    modal.hide();
  }
</script>
 <footer class="bg-dark text-white text-center py-3">
    <p class="bor">&copy; 2025 Pawthopia Pet Services. All rights reserved.</p>
  </footer>

</body>
</html>
