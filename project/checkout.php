<?php
session_start();

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// ตรวจสอบว่าตะกร้ามีสินค้าอยู่หรือไม่
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
    header("Location: add_cart.php");
    exit();
}

// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ดึงข้อมูลผู้ใช้จากเซสชัน
$username = $_SESSION['username'];
$email = $_SESSION['email'];  // สมมติว่ามีข้อมูลอีเมลในเซสชัน
$tel = $_SESSION['tel'];      // สมมติว่ามีข้อมูลเบอร์โทรในเซสชัน

// ตั้งค่าวันที่และเวลา
$order_date = date("Y-m-d H:i:s");

// ดึงรายการสินค้าในตะกร้า
$cart_items = $_SESSION['cart'];
$total_amount = 0;

// คำนวณยอดรวมสินค้า
$product_ids = array_keys($cart_items);
$ids = implode(',', $product_ids);
$sql = "SELECT product_id, product_price FROM products WHERE product_id IN ($ids)";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $quantity = $cart_items[$product_id];
        $total_price = $row['product_price'] * $quantity;
        $total_amount += $total_price;
    }
}

// กำหนดค่าจัดส่ง
$shipping_fee = 50; // ค่าจัดส่งคงที่ 50 บาท
$grand_total = $total_amount + $shipping_fee;

// สถานะคำสั่งซื้อเริ่มต้น
$order_status = 'pending'; // คำสั่งซื้อยังไม่ชำระเงิน

// บันทึกข้อมูลคำสั่งซื้อในตาราง orders
$sql_order = "INSERT INTO orders (cus_name, cus_email, cus_tel, order_date, total_amount, shipping_fee, order_status, created_at)
              VALUES ('$username', '$email', '$tel', '$order_date', '$total_amount', '$shipping_fee', '$order_status', NOW())";

if (mysqli_query($conn, $sql_order)) {
    // ดึง order_id ของคำสั่งซื้อที่เพิ่งสร้างขึ้น
    $order_id = mysqli_insert_id($conn);

    // หลังจากทำรายการเสร็จสิ้น ให้เคลียร์ตะกร้าสินค้า
    unset($_SESSION['cart']);

    echo "คำสั่งซื้อของคุณสำเร็จแล้ว หมายเลขคำสั่งซื้อคือ $order_id";
    // เปลี่ยนเส้นทางไปที่หน้าสรุปคำสั่งซื้อ
    header("Location: order_summary.php?order_id=$order_id");
    exit();
} else {
    echo "เกิดข้อผิดพลาดในการสั่งซื้อ: " . mysqli_error($conn);
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>
