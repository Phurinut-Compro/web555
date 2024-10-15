<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// ตรวจสอบว่ามีการส่ง ID ของลูกค้ามาหรือไม่
if (isset($_POST['cus_email'])) {
    $cus_email = $_POST['cus_email'];

    // คำสั่ง SQL สำหรับลบลูกค้า
    $sql = "DELETE FROM customer WHERE cus_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cus_email);

    if ($stmt->execute()) {
        echo "ลบรายชื่อลูกค้าเรียบร้อยแล้ว";
    } else {
        echo "เกิดข้อผิดพลาด: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "ไม่มีอีเมลของลูกค้า";
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
<script>
		window.open('behind.php','_self');
		alert("ลบรายชื่อลูกค้าเรียบร้อยแล้ว");
	</script>