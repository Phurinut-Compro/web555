<?php
session_start();
session_destroy(); // ลบ session ทั้งหมด
header("Location: index2.php"); // กลับไปยังหน้าหลักหลังล็อกเอ้า
exit();
?>
