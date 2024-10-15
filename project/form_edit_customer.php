<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// ตรวจสอบว่ามีอีเมลลูกค้าใน URL หรือไม่
if (isset($_GET['cus_email'])) {
    $cus_email = $_GET['cus_email'];

    // คำสั่ง SQL เพื่อดึงข้อมูลลูกค้า
    $sql = "SELECT `cus_name`, `cus_sur`, `cus_email`, `cus_tel`, `cus_pass`, `type`, `registration_date` FROM `customer` WHERE `cus_email` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cus_email);
    $stmt->execute();
    $result = $stmt->get_result();

    // ตรวจสอบว่าพบข้อมูลหรือไม่
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "ไม่พบลูกค้าที่ต้องการแก้ไข";
        exit;
    }
} else {
    echo "ไม่มีอีเมลลูกค้า";
    exit;
}

// ปิดการเชื่อมต่อ
$stmt->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลลูกค้า</title>
    <link rel="stylesheet" href="css/form_edit_product_styles.css">
</head>
<body>
<div class="admin-dashboard-container">
    <aside class="sidebar">
        <h2>เมนูการจัดการ</h2>
        <ul>
            <li><a href="behind.php">จัดการสินค้า</a></li>
            <li><a href="behind.php">จัดการคำสั่งซื้อ</a></li>
            <li><a href="behind.php">ดูลูกค้า</a></li>
            <li><a href="behind.php">ตั้งค่า</a></li>
        </ul>
    </aside>

    <main class="admin-content">
        <h1>แก้ไขข้อมูลลูกค้า</h1>
        <form action="update_customer.php" method="POST">
            <input type="hidden" name="cus_email" value="<?php echo htmlspecialchars($row['cus_email'], ENT_QUOTES); ?>">
            
            <label for="cus_name">ชื่อ:</label>
            <input type="text" id="cus_name" name="cus_name" value="<?php echo htmlspecialchars($row['cus_name'], ENT_QUOTES); ?>" required>
            
            <label for="cus_sur">นามสกุล:</label>
            <input type="text" id="cus_sur" name="cus_sur" value="<?php echo htmlspecialchars($row['cus_sur'], ENT_QUOTES); ?>" required>

            <label for="cus_tel">หมายเลขโทรศัพท์:</label>
            <input type="text" id="cus_tel" name="cus_tel" value="<?php echo htmlspecialchars($row['cus_tel'], ENT_QUOTES); ?>" required>

            <label for="cus_pass">รหัสผ่าน:</label>
            <input type="text" id="cus_pass" name="cus_pass" value="<?php echo htmlspecialchars($row['cus_pass'], ENT_QUOTES); ?>" required> <!-- เปลี่ยนเป็น type="text" -->

            <label for="type">ประเภท:</label>
            <input type="text" id="type" name="type" value="<?php echo htmlspecialchars($row['type'], ENT_QUOTES); ?>" required>

            <label for="registration_date">วันที่ลงทะเบียน:</label>
            <input type="text" id="registration_date" name="registration_date" value="<?php echo htmlspecialchars($row['registration_date'], ENT_QUOTES); ?>" readonly>

            <button type="submit" class="save-settings-btn">บันทึกการแก้ไข</button>
        </form>
    </main>
</div>

<footer class="footer">
    <p>© 2024 ร้านค้าของเรา</p>
</footer>

</body>
</html>
