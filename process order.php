<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $address = $_POST['address'];
    
    $prices = [
        'Foundation' => 25000,
        'Lipstick' => 10000,
        'Powder' => 15000,
        'Eye Shadow' => 18000,
        'Skincare' => 30000
    ];
    
    $unit_price = $prices[$product];
    $total_price = $unit_price * $quantity;
    
    $sql = "INSERT INTO orders (customer_name, phone, product, quantity, address, total_price) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    if ($stmt->execute([$name, $phone, $product, $quantity, $address, $total_price])) {
        $order_id = $conn->lastInsertId();
        header("Location: confirm.php?order_id=" . $order_id);
        exit();
    } else {
        echo "Error: Order could not be placed";
    }
} else {
    header("Location: cosmetics.php");
    exit();
}
?>