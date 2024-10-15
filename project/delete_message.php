<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = new mysqli("127.0.0.1", "root", "", "project");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// ตรวจสอบว่ามีการส่ง message_id มาหรือไม่
if (isset($_POST['message_id'])) {
    $message_id = $_POST['message_id'];

    // คำสั่ง SQL เพื่อทำการลบข้อความ
    $sql = "DELETE FROM contact_messages WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $message_id); // 'i' สำหรับ integer

    // ตรวจสอบการลบ
    if ($stmt->execute()) {
        echo "ข้อความถูกลบเรียบร้อยแล้ว";
    } else {
        echo "เกิดข้อผิดพลาด: " . $conn->error;
    }

    // ปิด statement
    $stmt->close();
} else {
    echo "ไม่มี message_id ที่จะลบ";
}

// ปิดการเชื่อมต่อ
$conn->close();

// เปลี่ยนเส้นทางกลับไปยังหน้าที่แสดงข้อความ
header("Location: behind.php"); // เปลี่ยนเป็น URL ที่เหมาะสม
exit();
?>
