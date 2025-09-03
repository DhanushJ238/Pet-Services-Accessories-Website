<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart - Pawthopia</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/banner.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

  <?php include 'header.php'; ?>

  <div class="container-fluid p-0 m-0">
    <div class="banner-section text-center">
      <h1 class="mb-4">The Shopping Cart</h1>
    </div>
  </div>

  <div class="container my-5">
    <div id="cart-container"></div>
  </div>

  <script>
    let cartItems = [];
    let total = 0;

    document.addEventListener('DOMContentLoaded', () => {
      loadCart();
      displayCart();
    });

    function loadCart() {
      cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
      cartItems = cartItems.map(item => {
        if (!item.quantity || item.quantity < 1) {
          item.quantity = 1;
        }
        return item;
      });
    }

    function saveCart() {
      localStorage.setItem('cartItems', JSON.stringify(cartItems));
    }

    function displayCart() {
      const cartContainer = document.getElementById('cart-container');
      total = 0;

      if (cartItems.length === 0) {
        cartContainer.innerHTML = '<p class="text-center">Your cart is empty.</p>';
        return;
      }

      let html = '<table class="table table-bordered text-center align-middle">';
      html += '<thead><tr><th>Image</th><th>Product</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th>Actions</th></tr></thead><tbody>';

      cartItems.forEach((item, index) => {
        const price = parseFloat(item.price);
        const subtotal = price * item.quantity;
        total += subtotal;

        html += `
      <tr>
        <td><img src="${item.image}" class="cart-img" alt="Product Image"></td>
        <td>${item.name}</td>
        <td>₹${price.toFixed(2)}</td>
        <td>
          <input type="number" min="1" value="${item.quantity}" class="qty-input" onchange="updateQuantity(${index}, this.value)" />
        </td>
        <td>₹${subtotal.toFixed(2)}</td>
        <td>
          <i class="bi bi-trash text-danger" style="cursor: pointer;" onclick="deleteItem(${index})" title="Delete item"></i>
        </td>
      </tr>
    `;
      });

      html += '</tbody></table>';
      html += `<h4 class="text-end" id="total-amount">Total: ₹${total.toFixed(2)}</h4>`;
      html += `
    <div class="d-flex justify-content-end mt-2 gap-2">
      <button class="btn btn-danger btn-sm" onclick="clearCart()">Clear</button>
      <button class="btn btn-danger btn-sm" onclick="buyNow()">Buy Now</button>
    </div>
  `;

      cartContainer.innerHTML = html;
    }

    function updateQuantity(index, newQty) {
      newQty = parseInt(newQty);
      if (isNaN(newQty) || newQty < 1) {
        alert("Quantity must be 1 or more");
        displayCart();
        return;
      }
      cartItems[index].quantity = newQty;
      saveCart();
      displayCart();
    }

    function deleteItem(index) {
      if (confirm(`Remove "${cartItems[index].name}" from cart?`)) {
        cartItems.splice(index, 1);
        saveCart();
        displayCart();
      }
    }

    function clearCart() {
      if (confirm("Are you sure you want to clear the entire cart?")) {
        localStorage.removeItem('cartItems');
        location.reload();
      }
    }



    function buyNow() {
      const userEmail = localStorage.getItem("user_email") || "";

      const cartItemsWithOptionalEmail = cartItems.map(item => ({
        ...item,
        email: userEmail
      }));

      fetch("submit_order.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(cartItemsWithOptionalEmail)
      })
        .then(res => res.json())
        .then(data => {
          if (data.status === "success") {
            alert(data.message);

            // ✅ Clear cart array
            cartItems.length = 0;

            // ✅ Clear localStorage cart
            localStorage.removeItem("cartItems");

            // ✅ Clear cart HTML view
              window.location.href = "cart.php";

            // ✅ Optional: reload page
            // location.reload();

          } else {
            alert("Order failed: " + data.message);
          }
        })
        .catch(err => console.error("Fetch error", err));
    }
  

  </script>

  <footer class="bg-dark text-white text-center py-3">
    <p class="bor mb-0">&copy; 2025 Pawthopia Pet Services. All rights reserved.</p>
  </footer>

</body>

</html>