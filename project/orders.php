<?php
session_start();

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// รับชื่อผู้ใช้จาก session
$username = $_SESSION['username'];

// ดึงข้อมูลคำสั่งซื้อจากตาราง orders ตามชื่อผู้ใช้
$sql_orders = "SELECT * FROM orders WHERE cus_name = '$username' ORDER BY order_date DESC";
$result_orders = mysqli_query($conn, $sql_orders);

if (!$result_orders) {
    echo "เกิดข้อผิดพลาดในการดึงข้อมูลคำสั่งซื้อ: " . mysqli_error($conn);
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำสั่งซื้อของฉัน</title>
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
    <h1>คำสั่งซื้อของฉัน</h1>

    <?php if (mysqli_num_rows($result_orders) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>หมายเลขคำสั่งซื้อ</th>
                    <th>วันที่สั่งซื้อ</th>
                    <th>ยอดรวม</th>
                    <th>สถานะ</th>
                    <th>รายละเอียด</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($order = mysqli_fetch_assoc($result_orders)): ?>
                    <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['order_date']; ?></td>
                        <td><?php echo number_format($order['total_amount'] + $order['shipping_fee'], 2); ?> บาท</td>
                        <td><?php echo htmlspecialchars($order['order_status']); ?></td>
                        <td><a href="order_summary.php?order_id=<?php echo $order['order_id']; ?>">ดูรายละเอียด</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>คุณยังไม่มีคำสั่งซื้อ</p>
    <?php endif; ?>

    <a href="index.php" class="btn">กลับไปหน้าหลัก</a>
</div>

<footer class="footer">
    <p>© 2024 ByteShop. Co., Ltd.</p>
</footer>

</body>
</html>
