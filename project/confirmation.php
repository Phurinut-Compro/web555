<?php
session_start(); // เริ่มต้น session

// เชื่อมต่อกับฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ตรวจสอบว่ามี order_id ใน URL หรือไม่
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // ดึงข้อมูลคำสั่งซื้อ
    $sql = "SELECT * FROM orders WHERE order_id = $order_id";
    $result = mysqli_query($conn, $sql);
    $order = mysqli_fetch_assoc($result);
} else {
    // ถ้าไม่มี order_id ให้ redirect กลับไปที่หน้า add_cart
    header("Location: add_cart.php");
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยืนยันการชำระเงิน</title>
    <link rel="stylesheet" href="css/styles3.css"> <!-- ลิงก์ไปที่ styles.css -->
</head>
<body>

<header class="sticky-header">
    <div class="header-container">
        <div class="logo">
            <a href="index.php">
                <img src="img/logo.png" alt="Logo" width="150px">
            </a>
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

<div class="confirmation-container">
    <h1>การชำระเงินสำเร็จ</h1>
    <p>คำสั่งซื้อของคุณหมายเลข: <strong><?php echo $order['order_id']; ?></strong></p>
    <p>ยอดรวมที่ชำระ: <strong><?php echo number_format($order['total_amount'], 2); ?> บาท</strong></p>
    <p>ชื่อผู้สั่งซื้อ: <strong><?php echo $order['customer_name']; ?></strong></p>
    <p>อีเมล: <strong><?php echo $order['customer_email']; ?></strong></p>
    <p>เบอร์โทรศัพท์: <strong><?php echo $order['customer_tel']; ?></strong></p>
    <a href="index.php" class="btn">กลับไปที่หน้าหลัก</a>
</div>

<footer class="footer">
    <p>© 2024 ร้านค้าของเรา</p>
</footer>

</body>
</html>
