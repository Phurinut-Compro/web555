<?php
session_start();
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ตรวจสอบข้อมูลผู้ใช้จากฐานข้อมูล
    $sql = "SELECT * FROM customer WHERE cus_email = '$email' AND cus_pass = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // เก็บชื่อผู้ใช้และประเภทผู้ใช้ในเซสชัน
        $_SESSION['username'] = $row['cus_name'] . ' ' . $row['cus_sur']; // ชื่อเต็ม
        $_SESSION['type'] = $row['type']; // ประเภทผู้ใช้

        // ตรวจสอบประเภทผู้ใช้ และนำไปหน้าแตกต่างกัน
        if ($row['type'] === 'A') { // ถ้าเป็นแอดมิน
            header("Location: behind.php"); // นำไปหน้า behind.php
        } elseif ($row['type'] === 'M') { // ถ้าเป็นสมาชิกทั่วไป
            header("Location: index.php"); // นำไปหน้า index.php
        }
        exit();
    } else {
        echo "<script>
            alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง.');
            window.location.href = 'form_login.php'; // เปลี่ยนหน้าไปยัง form_login.php
        </script>";
    }
}

mysqli_close($conn);
?>
