<?php
session_start();

if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cosmetics Shop</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .title {
            text-align: center;
            color: #c48b2c;
            margin-top: 20px;
        }

        .desc {
            text-align: center;
            width: 70%;
            margin: auto;
            color: #555;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 30px;
        }

        .product {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .product img {
            width: 100%;
            height: 200px;
            object-fit: scale-down;
            border-radius: 8px;
        }

        .product h3 {
            margin: 10px 0;
        }

        .product button {
            background: #c48b2c;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        .product button:hover {
            background: #a06f1f;
        }

        .order-section {
            background: white;
            padding: 30px;
            margin: 20px;
            border-radius: 10px;
        }

        .order-section h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: auto;
        }

        form input,
        form select,
        form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        form button {
            width: 100%;
            padding: 12px;
            background: #c48b2c;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h1 class="title">Cosmetics</h1>

<!-- PRODUCTS SECTION -->
<div class="products">

    <div class="product">
        <img src="image\Foundation1.jpeg">
        <img src="image\Foundation2.jpeg">
        <img src="image\Foundation3.jpeg">
        <img src="image\Foundation4.jpeg">
        <img src="image\Foundation5.jpeg">
        <h3>Foundation</h3>
        <p>Price: TZS 25,000</p>
    </div>

    <div class="product">
        <img src="image\lipstick1.jpeg">
        <img src="image\lipstick2.jpeg">
        <img src="image\lipstick3.jpeg">
        <img src="image\lipstick4.jpeg">
        <img src="image\lipstick5.jpeg">
        <h3>Lipstick</h3>
        <p>Price: TZS 10,000</p>
    </div>

    <div class="product">
        <img src="image\powder1.jpeg">
        <img src="image\powder2.jpeg">
        <img src="image\powder3.jpeg">
        <img src="image\powder4.jpeg">
        <img src="image\powder5.jpeg">
        <h3>Powder</h3>
        <p>Price: TZS 15,000</p>
    </div>

    <div class="product">
        <img src="image\eye shadow1.jpeg">
        <img src="image\eye shadow2.jpeg">
        <img src="image\eye shadow3.jpeg">
        <img src="image\eye shadow4.jpeg">
        <img src="image\eye shadow5.jpeg">
        <h3>Eye Shadow</h3>
        <p>Price: TZS 18,000</p>
    </div>

    <div class="product">
        <img src="image\skincare1.jpeg">
        <img src="image\skincare2.jpeg">
        <img src="image\skincare3.jpeg">
        <img src="image\skincare4.jpeg">
        <img src="image\2.jpeg">
        <h3>Skincare</h3>
        <p>Price: TZS 30,000</p>
    </div>

</div>

<!-- ORDER SECTION -->
<div class="order-section">
    <h2>Order Your Products</h2>

    <form>
        <input type="text" id="name" placeholder="Full Name" required>
        <input type="tel" id="phone" placeholder="Phone Number" required>

        <select id="product" required>
            <option value="">Select Product</option>
            <option>Foundation</option>
            <option>Lipstick</option>
            <option>Powder</option>
            <option>Eye Shadow</option>
            <option>Skincare</option>
        </select>

        <input type="number" id="quantity" placeholder="quantity" required>
        <textarea id="address" placeholder="address" required></textarea>

        <button type="button" onclick="placeOrder()">placeorder</button>
    </form>
</div>

<script>
function placeOrder() {
  let name = document.getElementById("name").value.trim();
  let phone = document.getElementById("phone").value.trim();
  let product = document.getElementById("product").value;
  let quantity = document.getElementById("quantity").value;
  let address = document.getElementById("address").value.trim();

  if (name === "" || phone === "" || product === "" || quantity === "" || address === "") {
    alert("please fill the gap.");
    return;
  }

  localStorage.setItem("name", name);
  localStorage.setItem("phone", phone);
  localStorage.setItem("product", product);
  localStorage.setItem("quantity", quantity);
  localStorage.setItem("address", address);

  window.location.href = "confirm.php";
}
</script>

</body>
</html>
