<?php
session_start(); // เริ่มต้น session
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตะกร้าสินค้า</title>
    <link rel="stylesheet" href="css/styles2.css">
</head>
<body>

<header class="sticky-header">
    <!-- รหัส HTML เดิมของ header -->
</header>

<div class="main-container">
    <h1>ตะกร้าสินค้า</h1>
    <div class="cart-items">
        <?php
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $item) {
                echo "<div class='cart-item'>";
                echo "<img src='img/" . htmlspecialchars($item['image']) . "' alt='" . htmlspecialchars($item['name']) . "'>";
                echo "<h3>" . htmlspecialchars($item['name']) . "</h3>";
                echo "<p>ราคา: " . number_format($item['price'], 2) . " บาท</p>";
                echo "</div>";
            }
        } else {
            echo "<p>ตะกร้าสินค้าว่างเปล่า</p>";
        }
        ?>
    </div>
</div>

</body>
</html>
