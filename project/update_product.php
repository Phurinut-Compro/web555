<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_stock = $_POST['product_stock'];
    $product_description = $_POST['product_description'];
    $product_type = $_POST['product_type']; // เพิ่มประเภทสินค้า

    // การอัปโหลดไฟล์ภาพ
    if (!empty($_FILES['product_image']['name'])) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // ตรวจสอบว่าเป็นภาพจริง
        $check = getimagesize($_FILES["product_image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "ไฟล์ที่อัปโหลดไม่ใช่ภาพ.";
            $uploadOk = 0;
        }

        // ตรวจสอบว่ามีข้อผิดพลาดในการอัปโหลด
        if ($_FILES["product_image"]["error"] !== UPLOAD_ERR_OK) {
            echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์.";
            $uploadOk = 0;
        }

        // ถ้าไม่มีข้อผิดพลาด ให้ทำการอัปโหลดไฟล์
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
                // อัปเดตข้อมูลในฐานข้อมูล
                $sql = "UPDATE products SET 
                            product_name='$product_name', 
                            product_price='$product_price', 
                            product_stock='$product_stock', 
                            product_description='$product_description', 
                            product_image='" . basename($_FILES["product_image"]["name"]) . "',
                            product_type='$product_type' 
                        WHERE product_id='$product_id'";
            } else {
                echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์.";
            }
        }
    } else {
        // ถ้าไม่อัปโหลดภาพใหม่ ให้ไม่เปลี่ยนแปลงชื่อภาพ
        $sql = "UPDATE products SET 
                    product_name='$product_name', 
                    product_price='$product_price', 
                    product_stock='$product_stock', 
                    product_description='$product_description',
                    product_type='$product_type' 
                WHERE product_id='$product_id'";
    }

    // ทำการอัปเดตข้อมูลในฐานข้อมูล
    if ($conn->query($sql) === TRUE) {
        echo "อัปเดตสินค้าเรียบร้อยแล้ว";
        header("Location: behind.php"); // เปลี่ยนไปยังหน้าหลักหลังการอัปเดต
        exit();
    } else {
        echo "เกิดข้อผิดพลาด: " . $conn->error;
    }
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
