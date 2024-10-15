<?php
// เปลี่ยนโฮสต์จาก "byteshopnow.atwebpages.com" เป็น "localhost" หรือใช้โฮสต์ที่โฮสต์ของคุณกำหนด
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

// ตั้งค่าการเชื่อมต่อให้ใช้ชุดอักขระ utf8
mysqli_set_charset($conn, "utf8");

// ตรวจสอบว่าการเชื่อมต่อสำเร็จหรือไม่
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

// แสดงวันที่และเวลา
$date = date("d-m-Y h:i:s");
echo "<br>Date and Time: " . $date;
?>
