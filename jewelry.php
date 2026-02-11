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
<title>jewelry</title>

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

<h1 class="title">Jewelry</h1>

<!-- PRODUCTS SECTION -->
<div class="products">

    <div class="product">
        <img src="image\rings1.jpeg">
        <img src="image\rings2.jpeg">
        <img src="image\rings3.jpeg">
        <h3>rings</h3>
        <p>Price: TZS 10,000</p>
    </div>

    <div class="product">
        <img src="image\earings1.jpeg">
        <img src="image\earings2.jpeg">
        <img src="image\earings3.jpeg">
        <h3>earings</h3>
        <p>Price: TZS 5,000</p>
    </div>

    <div class="product">
        <img src="image\bracelets1.jpeg">
        <img src="image\bracelets2.jpeg">
        <img src="image\bracelets3.jpeg">
        <h3>bracelets</h3>
        <p>
            Watch 15,000/= Tsh<br>
            silver bracelets 5,000/= Tsh @1<br>
            gold bracelets 10,000/= Tsh @1
        </p>
    </div>

    <div class="product">
        <img src="image\necklaces4.jpeg">
        <img src="image\necklaces2.jpeg">
        <img src="image\necklaces3.jpeg">
        <h3>necklaces</h3>
        <p>Price: TZS 20,000</p>
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
        <option>Rings</option>
        <option>Necklaces</option>
        <option>Bracelets</option>
        <option>Earings</option>
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
