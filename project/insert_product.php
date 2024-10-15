<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// รับค่าจากฟอร์ม
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_stock = $_POST['product_stock'];
$product_description = $_POST['product_description'];
$product_image = $_FILES['product_image'];
$product_type = $_POST['product_type']; // รับค่าประเภทสินค้า

// ตั้งค่าที่อยู่ในการเก็บไฟล์
$target_dir = "img/";
$target_file = $target_dir . basename($product_image["name"]);

// อัปโหลดไฟล์
if (move_uploaded_file($product_image["tmp_name"], $target_file)) {
    // คำสั่ง SQL สำหรับเพิ่มข้อมูลสินค้า
    $sql = "INSERT INTO products (product_name, product_price, product_stock, product_description, product_image, created_at, product_type) 
            VALUES ('$product_name', $product_price, $product_stock, '$product_description', '{$product_image['name']}', NOW(), '$product_type')"; // เพิ่มประเภทสินค้า

    if ($conn->query($sql) === TRUE) {
        // ถ้าสำเร็จ แสดงข้อความและเปลี่ยนหน้า
        echo "
        <script>
            alert('เพิ่มสินค้าเรียบร้อยแล้ว');
            setTimeout(function() {
                window.location.href = 'behind.php';
            }, 1000); // รอ 1 วินาทีก่อนเปลี่ยนหน้า
        </script>
        ";
    } else {
        echo "เกิดข้อผิดพลาดในการเพิ่มสินค้า: " . $conn->error;
    }
} else {
    echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์";
}

// ปิดการเชื่อมต่อ
$conn->close();

?>
