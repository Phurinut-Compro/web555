<?php
// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ตรวจสอบว่ามีคำค้นหาหรือไม่
if (isset($_GET['query'])) {
    $query = mysqli_real_escape_string($conn, $_GET['query']);
    
    // คำสั่ง SQL เพื่อค้นหาสินค้า
    $sql = "SELECT * FROM products WHERE product_name LIKE '%$query%'";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลการค้นหา</title>
    <link rel="stylesheet" href="css/orders.css">
</head>
<body>

<header class="sticky-header">
    <div class="header-container">
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="Logo" width="150px"></a>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="index.php">หน้าหลัก</a></li>
                <li><a href="Category.php">หมวดหมู่สินค้า</a></li>
                <li><a href="about_us.php">เกี่ยวกับเรา</a></li>
                <li><a href="contact.php">ติดต่อเรา</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="orders-container">
    <h1>ผลการค้นหา: "<?php echo htmlspecialchars($query); ?>"</h1>

    <div class="products-container">
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($product = mysqli_fetch_assoc($result)) {
                echo '<div class="product">';
                echo '<h2>' . htmlspecialchars($product['product_name']) . '</h2>';
                echo '<p>ราคา: ' . number_format($product['product_price'], 2) . ' บาท</p>';
                echo '<img src="img/' . htmlspecialchars($product['product_image']) . '" alt="' . htmlspecialchars($product['product_name']) . '" width="30%">';
                echo '</div>';
            }
        } else {
            echo '<p>ไม่พบสินค้า</p>';
        }
        ?>
    </div>
    
</div>

<footer class="footer">
    <p>© 2024 ByteShop. Co., Ltd.</p>
</footer>

</body>
</html>
