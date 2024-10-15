<?php session_start(); ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหมวดหมู่สินค้า</title>
    <link rel="stylesheet" href="css/styles2.css">
    <style>
        .actions {
            display: flex;
            align-items: center; /* จัดตำแหน่งให้ตรงกลางในแนวตั้ง */
            gap: 15px; /* ระยะห่างระหว่างไอคอนและข้อความ */
        }

        .logout-btn {
            background-color: #dc3545; /* สีพื้นหลังของปุ่มล็อกเอาท์ */
            color: white; /* สีตัวอักษร */
            border: none; /* ไม่ต้องการกรอบ */
            border-radius: 5px; /* มุมมน */
            padding: 8px 12px; /* ระยะห่างภายใน */
            cursor: pointer; /* เปลี่ยนเป็นมือเมื่อ hover */
            transition: background-color 0.3s; /* เปลี่ยนสีเมื่อ hover */
        }

        .logout-btn:hover {
            background-color: #c82333; /* สีเปลี่ยนเมื่อ hover */
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
                <li><a href="index.php">หน้าหลัก</a></li>
                <li><a href="Category.php">หมวดหมู่สินค้า</a></li>
                <li><a href="about_us.php">เกี่ยวกับเรา</a></li>
                <li><a href="contact.php">ติดต่อเรา</a></li>
            </ul>
        </nav>
        <div class="actions"><i class="icon-search"></i>
            <!-- ตรวจสอบการล็อกอิน -->
            <?php if (isset($_SESSION['username'])): ?>
          <p>ยินดีต้อนรับ, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
                <form action="logout.php" method="post" style="display:inline;">
                    <button type="submit" class="logout-btn">ล็อกเอ้า</button>
                </form>
            <?php else: ?>
                <a href="form_login.php" class="icon-user">
                    <img src="img/icon/user.png" width="30px" alt="User Icon">
                </a>
            <?php endif; ?>
            <a href="add_cart.php" class="icon-cart">
                
            </a>
        </div>
    </div>
</header>

<!-- Main content -->
<div class="main-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>หมวดหมู่สินค้า</h2>
        <ul>
            <li><a href="Category.php?type=แอปเปิ้ล">แอปเปิ้ล</a></li>
            <li><a href="Category.php?type=โน๊ตบุค">โน๊ตบุค</a></li>
            <li><a href="Category.php?type=โทรศัพท์มือถือและอุปกรณ์เสริม">โทรศัพท์มือถือและอุปกรณ์เสริม</a></li>
            <li><a href="Category.php?type=เครื่องใช้ไฟฟ้าภายในบ้าน">เครื่องใช้ไฟฟ้าภายในบ้าน</a></li>
            <li><a href="Category.php?type=คอมพิวเตอร์ตั้งโต๊ะและออลอินวัน">คอมพิวเตอร์ตั้งโต๊ะและออลอินวัน</a></li>
            <li><a href="Category.php?type=อุปกรณ์คอมพิวเตอร์(DIY)">อุปกรณ์คอมพิวเตอร์(DIY)</a></li>
            <li><a href="Category.php?type=แทปแล็ตและอุปกรณ์เสริม">แทปแล็ตและอุปกรณ์เสริม</a></li>
            <li><a href="Category.php?type=ลำโพง&หูฟัง&ทีวี">ลำโพง&หูฟัง&ทีวี</a></li>
            <li><a href="Category.php?type=เกม&สตรีมมิ่งและอุปกรณ์เสริม">เกม&สตรีมมิ่งและอุปกรณ์เสริม</a></li>
            <li><a href="Category.php?type=อุปกรณ์เสริมไอที">อุปกรณ์เสริมไอที</a></li>
        </ul>
    </div>

    <!-- Product list -->
    <div class="product-list-container">
        <h1>
            <?php
            // ตรวจสอบว่ามีการส่งประเภทสินค้าหรือไม่
            if (isset($_GET['type'])) {
                echo htmlspecialchars($_GET['type']); // แสดงประเภทสินค้าที่เลือก
            } else {
                echo "หมวดหมู่สินค้า"; // ถ้าไม่มีการเลือกประเภท
            }
            ?>
        </h1>
        <div class="product-list">
            <?php
            // เชื่อมต่อกับฐานข้อมูล
            $conn = mysqli_connect("127.0.0.1", "root", "", "project");

            // ตรวจสอบการเชื่อมต่อ
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // ตรวจสอบประเภทสินค้าที่ส่งมา
            if (isset($_GET['type'])) {
                $product_type = mysqli_real_escape_string($conn, $_GET['type']); // กำจัดอักขระพิเศษ
                $sql = "SELECT * FROM products WHERE product_type = '$product_type'"; // คิวรีข้อมูลตามประเภท

                $result = mysqli_query($conn, $sql);

                // ตรวจสอบว่ามีสินค้าที่ตรงกันหรือไม่
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='product-item'>";
                        echo "<img src='img/" . htmlspecialchars($row['product_image']) . "' alt='" . htmlspecialchars($row['product_name']) . "'>";
                        echo "<h3>" . htmlspecialchars($row['product_name']) . "</h3>";
                        echo "<p>ราคา: " . number_format($row['product_price'], 2) . " บาท</p>";
                        echo "<p>" . htmlspecialchars($row['product_description']) . "</p>";

                        // สร้างฟอร์มสำหรับปุ่มหยิบใส่ตะกร้า
                        echo "<form action='add_cart.php' method='post' style='display:inline;'>";
                        echo "<input type='hidden' name='product_id' value='" . $row['product_id'] . "'>"; // ส่ง product_id
                        echo "<input type='hidden' name='product_name' value='" . htmlspecialchars($row['product_name']) . "'>"; // ส่งชื่อสินค้า
                        echo "<input type='hidden' name='product_price' value='" . $row['product_price'] . "'>"; // ส่งราคาสินค้า
                        echo "<button type='submit' class='add-to-cart-btn'>หยิบใส่ตะกร้า</button>";
                        echo "</form>";

                        echo "<button class='details-btn'><a href='product_details.php?id=" . $row['product_id'] . "' style='color: white; text-decoration: none;'>เพิ่มเติม</a></button>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>ไม่มีสินค้าในหมวดหมู่นี้</p>";
                }
            } else {
                echo "<p>กรุณาเลือกหมวดหมู่สินค้า</p>";
            }

            // ปิดการเชื่อมต่อฐานข้อมูล
            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>

</body>
</html>
