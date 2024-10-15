<?php
session_start(); // เริ่มต้น session

// ตรวจสอบว่ามีการส่ง product_id มาหรือไม่
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // ตรวจสอบว่ามีการสร้างตะกร้าสินค้าหรือไม่
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = []; // สร้างตะกร้าใหม่
    }

    // ตรวจสอบว่ามีสินค้าในตะกร้าหรือไม่
    if (array_key_exists($product_id, $_SESSION['cart'])) {
        // ถ้ามีสินค้าแล้วให้เพิ่มจำนวน
        $_SESSION['cart'][$product_id]++;
    } else {
        // ถ้ายังไม่มีให้เพิ่มสินค้าใหม่ลงไป
        $_SESSION['cart'][$product_id] = 1; // จำนวนเริ่มต้น 1
    }

    // Redirect กลับไปที่หน้าสินค้า
    header("Location: index.php");
    exit(); // ออกจาก script
} else {
    // ถ้าไม่มี product_id ให้ redirect กลับ
    header("Location: index.php");
    exit();
}
?>
