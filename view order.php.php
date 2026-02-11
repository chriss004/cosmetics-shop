<?php
include 'config.php';

$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .back-link {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .back-link a {
            color: #2196F3;
            text-decoration: none;
            font-size: 18px;
        }
        
        .back-link a:hover {
            text-decoration: underline;
        }
        
        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        
        th {
            background-color: #ff6b8b;
            color: white;
            padding: 15px;
            text-align: left;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        .total-row {
            background-color: #f9f9f9;
            font-weight: bold;
        }
        
        .no-orders {
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
        }
        
        .status-new {
            background-color: #4CAF50;
            color: white;
        }
        
        @media (max-width: 768px) {
            table {
                display: block;
                overflow-x: auto;
            }
            
            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="back-link">
            <a href="cosmetics.php">&larr; Back to Shop</a>
        </div>
        
        <h1> All Orders</h1>
        
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Address</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $grand_total = 0;
                    while($row = $result->fetch_assoc()): 
                        $grand_total += $row['total_price'];
                    ?>
                    <tr>
                        <td>#<?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['product']); ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td>TZS <?php echo number_format($row['total_price'], 0, '.', ','); ?></td>
                        <td><?php echo htmlspecialchars($row['address']); ?></td>
                        <td><?php echo date('M d, Y', strtotime($row['order_date'])); ?></td>
                    </tr>
                    <?php endwhile; ?>
                    <tr class="total-row">
                        <td colspan="5"><strong>Grand Total</strong></td>
                        <td colspan="3"><strong>TZS <?php echo number_format($grand_total, 0, '.', ','); ?></strong></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-orders">
                <h2>No orders yet</h2>
                <p>Be the first to place an order!</p>
            </div>
        <?php endif; ?>
        
        <div class="back-link" style="margin-top: 30px;">
            <a href="cosmetics.php">&larr; Back to Shop</a>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>.