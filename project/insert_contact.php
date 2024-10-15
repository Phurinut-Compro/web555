<?php


// เชื่อมต่อกับฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับค่าจากฟอร์ม
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$created_at = date('Y-m-d H:i:s'); // วันที่และเวลาปัจจุบัน

// เตรียมคำสั่ง SQL
$sql = "INSERT INTO `contact_messages` (`name`, `email`, `subject`, `message`, `created_at`) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $subject, $message, $created_at);

// ประมวลผลคำสั่ง SQL
if ($stmt->execute()) {
    // ส่งกลับไปยังฟอร์มพร้อมกับพารามิเตอร์ success
    header("Location: contact.php?success=1");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// ปิดการเชื่อมต่อ
$stmt->close();
$conn->close();
?>
