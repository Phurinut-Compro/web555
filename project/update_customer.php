<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// ตรวจสอบว่ามีการส่งข้อมูลจากฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cus_email = $_POST['cus_email'];
    $cus_name = $_POST['cus_name'];
    $cus_sur = $_POST['cus_sur'];
    $cus_tel = $_POST['cus_tel'];

    // คำสั่ง SQL เพื่ออัปเดตข้อมูลลูกค้า
    $sql = "UPDATE customer SET cus_name = ?, cus_sur = ?, cus_tel = ? WHERE cus_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $cus_name, $cus_sur, $cus_tel, $cus_email);

    if ($stmt->execute()) {
        // หากอัปเดตสำเร็จ
        echo "<script>
                alert('ข้อมูลลูกค้าอัปเดตเรียบร้อยแล้ว');
                window.location.href = 'behind.php'; // เปลี่ยนเส้นทางกลับไปที่หน้า 'ดูลูกค้า'
              </script>";
    } else {
        // หากเกิดข้อผิดพลาดในการอัปเดต
        echo "<script>
                alert('เกิดข้อผิดพลาดในการอัปเดตข้อมูล: " . $stmt->error . "');
                window.history.back(); // กลับไปที่หน้าก่อนหน้า
              </script>";
    }

    // ปิดการเชื่อมต่อ
    $stmt->close();
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
