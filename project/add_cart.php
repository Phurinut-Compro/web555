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

  
}

// ตรวจสอบว่ามีการลบสินค้าออกจากตะกร้าหรือไม่
if (isset($_POST['remove_id'])) {
    $remove_id = $_POST['remove_id'];
    // ถ้าสินค้าอยู่ในตะกร้า ให้ลบสินค้าออก
    if (isset($_SESSION['cart'][$remove_id])) {
        unset($_SESSION['cart'][$remove_id]);
    }
    
    // Redirect กลับไปที่หน้าตะกร้าสินค้า
    header("Location: add_cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตะกร้าสินค้า</title>
    <link rel="stylesheet" href="css/styles3.css"> <!-- ลิงก์ไปที่ styles.css -->
    <style>
        .username {
            margin-left: 10px;
            font-weight: bold;
            color: #333;
        }
        .remove-item {
            background-color: #e74c3c; /* สีแดง */
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .checkout-btn {
            background-color: #3498db; /* สีน้ำเงิน */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .logout-button {
            background-color: #ff4d4d; /* สีพื้นหลัง */
            color: white; /* สีตัวอักษร */
            border: none; /* ไม่มีกรอบ */
            padding: 8px 12px; /* ระยะห่างภายใน */
            border-radius: 5px; /* มุมมน */
            cursor: pointer; /* แสดงเคอร์เซอร์เป็นมือเมื่อชี้ไปที่ปุ่ม */
            margin-left: 10px; /* ระยะห่างจากชื่อผู้ใช้ */
            transition: background-color 0.3s; /* เปลี่ยนสีเมื่อชี้ */
        }
        .logout-button:hover {
            background-color: #ff1a1a; /* เปลี่ยนสีเมื่อชี้ */
        }
    </style>
</head>
<body>

<header class="sticky-header">
    <div class="header-container">
        <div class="logo">
            <a href="index.php">
                <img src="img/logo.png" alt="Logo" width="150px">
            </a>
        </div>
        <nav class="menu">
            <ul>
                
              <li><a href="Category.php">หมวดหมู่สินค้า</a></li>
                <li><a href="about_us.php">เกี่ยวกับเรา</a></li>
                <li><a href="contact.php">ติดต่อเรา</a></li>
                <li><a href="orders.php">คำสั่งซื้อ</a></li>
            </ul>
        </nav>
        <div class="actions"><i class="icon-search"></i>
            <!-- แสดงชื่อผู้ใช้ -->
            <?php
            if (isset($_SESSION['username'])) {
                echo "<span class='username'>สวัสดี, " . htmlspecialchars($_SESSION['username']) . "</span>";
                echo '<form action="logout.php" method="post" style="display:inline;">';
                echo '<button type="submit" class="logout-button">ล็อกเอาท์</button>';
                echo '</form>';
            } else {
                echo "<span class='username'>กรุณาล็อกอิน</span>"; // ถ้าชื่อผู้ใช้ไม่อยู่ในเซสชัน ให้แสดงข้อความนี้
            }
            ?>
            
        </div>
    </div>
</header>

<div class="cart-container">
    <h1>ตะกร้าสินค้า</h1>

    <table class="cart-table">
        <thead>
            <tr>
                <th>สินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>จำนวน</th>
                <th>ราคา/หน่วย</th>
                <th>ราคารวม</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // เช็คว่าตะกร้าสินค้ามีสินค้าอยู่หรือไม่
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                // เชื่อมต่อกับฐานข้อมูล
                $conn = mysqli_connect("127.0.0.1", "root", "", "project");

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // สร้างอาร์เรย์สำหรับรหัสสินค้า
                $product_ids = array_keys($_SESSION['cart']);
                
                // สร้างคิวรีเพื่อนำเข้าข้อมูลสินค้าจากฐานข้อมูล
                $ids = implode(',', $product_ids);
                $sql = "SELECT * FROM products WHERE product_id IN ($ids)";
                $result = mysqli_query($conn, $sql);

                // วนลูปแสดงสินค้าในตะกร้า
                $total_amount = 0; // สร้างตัวแปรเพื่อเก็บยอดรวมสินค้า
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['product_id'];
                    $quantity = $_SESSION['cart'][$product_id];
                    $total_price = $row['product_price'] * $quantity;
                    $total_amount += $total_price; // คำนวณยอดรวม
                    echo "<tr>";
                    echo "<td><img src='img/" . $row['product_image'] . "' alt='" . $row['product_name'] . "'></td>";
                    echo "<td>" . $row['product_name'] . "</td>";
                    echo "<td>
                            <input type='number' value='$quantity' min='1' readonly>
                          </td>";
                    echo "<td>" . number_format($row['product_price'], 2) . " บาท</td>";
                    echo "<td>" . number_format($total_price, 2) . " บาท</td>";
                    echo "<td>
                            <form method='post' action='add_cart.php' style='display:inline;'>
                                <input type='hidden' name='remove_id' value='$product_id'>
                                <button type='submit' class='remove-item'>ลบ</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }

                // ปิดการเชื่อมต่อฐานข้อมูล
                mysqli_close($conn);
            } else {
                echo "<tr><td colspan='6'>ตะกร้าของคุณว่างเปล่า</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="cart-summary">
        <h2>สรุปคำสั่งซื้อ</h2>
        <p>ยอดรวมสินค้า: <span><?php echo isset($total_amount) ? number_format($total_amount, 2) : '0.00'; ?> บาท</span></p>
        <p>ค่าจัดส่ง: <span>50 บาท</span></p>
        <h3>ยอดรวมสุทธิ: <span><?php echo isset($total_amount) ? number_format($total_amount + 50, 2) : '50.00'; ?> บาท</span></h3>
        <form action="checkout.php" method="post">
            <button type="submit" class="checkout-btn">ชำระเงิน</button>
        </form>
    </div>

</div>

<footer class="footer">
    <p>© 2024 ByteShop. Co., Ltd.</p>
</footer>

</body>
</html>
