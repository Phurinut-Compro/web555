<?php
session_start();
include("conn.php");  // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าฟอร์มถูกส่งมาแล้วหรือยัง
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    // ตรวจสอบว่าค่าที่รับมาว่างหรือไม่
    if (!empty($email) && !empty($password)) {
        // เขียนคำสั่ง SQL ในการตรวจสอบอีเมลและรหัสผ่าน
        $sql = "SELECT * FROM customer WHERE cus_email='$email' AND cus_tel='$tel' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        // ถ้าพบข้อมูลในฐานข้อมูล
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            // เก็บข้อมูลเข้าสู่ Session
            $_SESSION['email'] = $row['cus_email'];
            $_SESSION['tel'] = $row['cus_tel'];
            $_SESSION['type'] = $row['type'];  // ตรวจสอบว่าผู้ใช้เป็น Admin หรือ Member
			echo $row['cus_pass'];
		}
	}
}
?>
