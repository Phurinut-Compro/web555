<?php
session_start();

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// ตรวจสอบว่ามี order_id ถูกส่งมาหรือไม่
if (!isset($_GET['order_id'])) {
    echo "ไม่พบหมายเลขคำสั่งซื้อ";
    exit();
}

// รับหมายเลขคำสั่งซื้อจาก URL
$order_id = $_GET['order_id'];

// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ดึงข้อมูลคำสั่งซื้อจากตาราง orders
$sql_order = "SELECT * FROM orders WHERE order_id = '$order_id'";
$result_order = mysqli_query($conn, $sql_order);

if ($result_order && mysqli_num_rows($result_order) > 0) {
    $order = mysqli_fetch_assoc($result_order);
} else {
    echo "ไม่พบคำสั่งซื้อ";
    exit();
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สรุปคำสั่งซื้อ</title>
    <link rel="stylesheet" href="css/summary.css">
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

<div class="order-summary-container">
    <h1>สรุปคำสั่งซื้อ</h1>
    <p>หมายเลขคำสั่งซื้อ: <strong><?php echo $order['order_id']; ?></strong></p>
    <p>ชื่อผู้สั่งซื้อ: <strong><?php echo htmlspecialchars($order['cus_name']); ?></strong></p>
    <p>อีเมล: <strong><?php echo htmlspecialchars($order['cus_email']); ?></strong></p>
    <p>เบอร์โทรศัพท์: <strong><?php echo htmlspecialchars($order['cus_tel']); ?></strong></p>
    <p>วันที่สั่งซื้อ: <strong><?php echo $order['order_date']; ?></strong></p>
    <p>ยอดรวมสินค้า: <strong><?php echo number_format($order['total_amount'], 2); ?> บาท</strong></p>
    <p>ค่าจัดส่ง: <strong><?php echo number_format($order['shipping_fee'], 2); ?> บาท</strong></p>
    <h3>ยอดรวมสุทธิ: <strong><?php echo number_format($order['total_amount'] + $order['shipping_fee'], 2); ?> บาท</strong></h3>
    <p>สถานะคำสั่งซื้อ: <strong><?php echo htmlspecialchars($order['order_status']); ?></strong></p>
    
    <a href="index.php" class="btn">กลับไปหน้าหลัก</a>
</div>

<footer class="footer">
    <p>© 2024 ByteShop. Co., Ltd.</p>
</footer>

</body>
</html>
