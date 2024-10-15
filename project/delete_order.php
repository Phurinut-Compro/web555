<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// ตรวจสอบว่ามีข้อมูลที่ถูกส่งมาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);

    // สร้างคำสั่ง SQL สำหรับการลบคำสั่งซื้อ
    $sql = "DELETE FROM orders WHERE order_id = '$order_id'";

    // ประมวลผลคำสั่ง SQL
    if (mysqli_query($conn, $sql)) {
        // ถ้าลบสำเร็จเด้งไปที่หน้าจัดการคำสั่งซื้อ
        header("Location: behind.php"); // ปรับให้ตรงกับชื่อไฟล์ของคุณ
        exit();
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
    }
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
