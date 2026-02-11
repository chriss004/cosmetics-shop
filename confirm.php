<?php
include 'config.php';

$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 0;

$sql = "SELECT * FROM orders WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$order_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$order) {
    echo "<h2>Order not found</h2>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        
        .confirmation {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            max-width: 600px;
            width: 90%;
            text-align: center;
        }
        
        .success-icon {
            color: #4CAF50;
            font-size: 60px;
            margin-bottom: 20px;
        }
        
        h1 {
            color: #4CAF50;
            margin-bottom: 20px;
        }
        
        .order-details {
            text-align: left;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        
        .order-details p {
            margin: 10px 0;
            font-size: 16px;
        }
        
        .total {
            font-size: 24px;
            font-weight: bold;
            color: #ff6b8b;
            margin: 20px 0;
        }
        
        .buttons {
            margin-top: 30px;
        }
        
        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin: 0 10px;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-home {
            background-color: #4CAF50;
            color: white;
        }
        
        .btn-new {
            background-color: #2196F3;
            color: white;
        }
        
        .btn-home:hover {
            background-color: #45a049;
        }
        
        .btn-new:hover {
            background-color: #0b7dda;
        }
        
        .order-id {
            color: #666;
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="confirmation">
        <div class="success-icon">✓</div>
        <h1>Order Confirmed!</h1>
        <p>Thank you for your order, <?php echo htmlspecialchars($order['customer_name']); ?>!</p>
        
        <div class="order-details">
            <p><strong>Order ID:</strong> #<?php echo $order['id']; ?></p>
            <p><strong>Product:</strong> <?php echo htmlspecialchars($order['product']); ?></p>
            <p><strong>Quantity:</strong> <?php echo $order['quantity']; ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($order['phone']); ?></p>
            <p><strong>Delivery Address:</strong> <?php echo htmlspecialchars($order['address']); ?></p>
            <p><strong>Order Date:</strong> <?php echo date('F j, Y, g:i a', strtotime($order['order_date'])); ?></p>
        </div>
        
        <div class="total">
            Total Amount: TZS <?php echo number_format($order['total_price'], 0, '.', ','); ?>
        </div>
        
        <p>We will contact you soon for delivery details.</p>
        
        <div class="buttons">
            <a href="cosmetics.php" class="btn btn-home">Home Page</a>
            <a href="cosmetics.php" class="btn btn-new">Place New Order</a>
        </div>
        
        <div class="order-id">
            Reference: ORDER-<?php echo str_pad($order['id'], 6, '0', STR_PAD_LEFT); ?>
        </div>
    </div>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>