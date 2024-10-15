<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// ตรวจสอบว่ามีการส่ง product_id มาหรือไม่
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // สร้างคำสั่ง SQL เพื่อลบสินค้า
    $sql = "DELETE FROM products WHERE product_id = ?";
    
    // เตรียมและ bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
                alert('ลบข้อมูลสินค้าเรียบร้อยแล้ว');
                window.location.href='behind.php'; // เปลี่ยนไปยังหน้าที่คุณต้องการ
              </script>";
    } else {
        echo "เกิดข้อผิดพลาด: " . $stmt->error;
    }

    // ปิด statement
    $stmt->close();
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
