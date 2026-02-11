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
<title>E-Commerce</title>

<style>
.about {
    background-image: url("background.jpg");
    background-size: 70% auto;
    min-height: 50vh;
    background-position: center;
    background-repeat: no-repeat;
    padding: 60px 20px;
    text-align: center;
}

.about h1 {
    font-size: 36px;
    color: black;
}

.about h2 {
    font-size: 30px;
    margin-bottom: 15px;
    color: blue;
}

.about .intro {
    max-width: 700px;
    margin: 0 auto 40px;
    font-size: 16px;
    color: black;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 10px;
    max-width: 1100px;
    margin: auto;
}

.product-box {
    background: #f3f4f6;
    padding: 15px;
    border-radius: 20px;
    transition: 0.3s;
}

.product-box:hover {
    background: pink;
    transform: scale(1.03);
}

.product-box h3 {
    margin-bottom: 10px;
    color: black;
}

.product-box p {
    font-size: 15px;
    color: blue;
    line-height: 1.5;
}

button {
    margin-top: 10px;
    padding: 8px 15px;
    background: black;
    border: none;
    border-radius: 8px;
}

button a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}
</style>
</head>

<body>

<section class="about">
    <h1>ZUMOKI COSMETICS</h1>
    <p>Welcome to Zumoki Cosmetics where beauty meets quality</p>

    <h2>About Our Products</h2>
    <p class="intro">
        We offer a wide range of high-quality beauty and lifestyle products
        carefully selected to meet your daily needs.
    </p>

    <div class="product-grid">

        <div class="product-box">
            <h3>Cosmetics</h3>
            <p>
                Our cosmetics include makeup products such as foundations,
                lipsticks, powders, eye shadows, and skincare items.
                They are designed to enhance beauty while keeping your skin healthy.
            </p>
            <button><a href="cosmetics.php">Enter</a></button>
        </div>

        <div class="product-box">
            <h3>Perfumes</h3>
            <p>
                We provide long-lasting perfumes for both men and women.
                Our fragrances are fresh, attractive, and suitable for all occasions.
            </p>
            <button><a href="perfume.php">Enter</a></button>
        </div>

        <div class="product-box">
            <h3>Jewelry</h3>
            <p>
                Discover beautiful jewelry including rings, necklaces,
                bracelets, and earrings. Perfect for daily wear, gifts,
                and special occasions.
            </p>
            <button><a href="jewelry.php">Enter</a></button>
        </div>

        <div class="product-box">
            <h3>Body Oils & Lotions</h3>
            <p>
                Our body oils and moisturizing lotions keep your skin soft,
                smooth, and well-nourished. They are suitable for all skin types
                and give natural glow.
            </p>
            <button><a href="oils&lotions.php">Enter</a></button>
        </div>

    </div>
</section>

</body>
</html>
