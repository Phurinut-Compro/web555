<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Header</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sticky-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: #FFF;
            z-index: 1000;
            transition: transform 0.3s ease-in-out;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            width: 100%;
            box-sizing: border-box;
        }
        .logo img {
            width: 150px;
        }
        .menu ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .menu ul li {
            margin-right: 20px;
        }
        .menu ul li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }
        .actions {
            display: flex;
            align-items: center;
        }
        .actions input[type="text"] {
            padding: 5px;
            margin-right: 10px;
            width: 150px;
        }
        .user-info {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }
        .user-info p {
            margin-right: 10px;
            color: #333;
        }
        .logout-btn, .login-btn {
            padding: 5px 10px;
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin-left: 10px;
        }
        .logout-btn:hover, .login-btn:hover {
            background-color: #ff1a1a;
        }
        .icon-cart {
            margin-left: 10px;
        }
        .product-list {
            padding: 20px;
            margin-top: 100px; /* ปรับระยะให้พอเหมาะกับเฮดเดอร์ */
        }
        .products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin: 20px 0;
        }
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            width: calc(25% - 20px);
        }
        .product img {
            max-width: 100%;
            height: auto;
        }
        .price {
            color: #e74c3c;
            font-weight: bold;
        }
        .button-container {
            display: flex; /* ใช้ flexbox เพื่อเรียงปุ่ม */
            justify-content: space-between; /* จัดให้ปุ่มอยู่ในระยะห่างที่เหมาะสม */
            margin-top: 10px; /* ระยะห่างบนระหว่างรายละเอียดสินค้าและปุ่ม */
        }
        .add-to-cart, .more-details {
            flex: 1; /* ทำให้ปุ่มมีความกว้างเท่ากัน */
            background-color: #28a745; /* สีพื้นหลังสำหรับปุ่มเพิ่มไปยังตะกร้า */
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 5px; /* ระยะห่างขวาของปุ่ม */
        }
        .add-to-cart:hover {
            background-color: #218838; /* สีเมื่อชี้ปุ่มเพิ่มไปยังตะกร้า */
        }
        .more-details {
            background-color: #007bff; /* สีพื้นหลังสำหรับปุ่มรายละเอียดเพิ่มเติม */
			border-radius:5px;
        }
        .more-details:hover {
            background-color: #0056b3; /* สีเมื่อชี้ปุ่มรายละเอียดเพิ่มเติม */
        }
        .hidden {
            transform: translateY(-100%);
        }
        .actions input[type="text"] {
            padding: 5px;
            margin-right: 10px;
            width: 150px;
            font-size: 16px; /* ปรับขนาดฟอนต์สำหรับช่องค้นหา */
        }
        .menu ul li a {
            font-size: 20px; /* ปรับขนาดฟอนต์สำหรับเมนู */
        }
        .user-info p {
            margin-right: 10px;
            color: #333;
            font-size: 14px; /* ปรับขนาดฟอนต์สำหรับชื่อผู้ใช้ */
        }
    </style>
</head>
<body>
<header class="sticky-header">
    <div class="header-container">
        <div class="logo">
            <a href="index2.php">
                <img src="img/logo.png" alt="Logo">
            </a>
        </div>
        <nav class="menu">
            <ul>
            	<li><a href="form_login.php">&nbsp;</a></li>
                <li><a href="form_login.php">&nbsp;</a></li>
                <li><a href="form_login.php">&nbsp;</a></li>
                <li><a href="form_login.php">&nbsp;</a></li>
                <li><a href="form_login.php">หน้าหลัก</a></li>
                <li><a href="form_login.php">หมวดหมู่สินค้า</a></li>
                <li><a href="form_login.php">เกี่ยวกับเรา</a></li>
                <li><a href="form_login.php">ติดต่อเรา</a></li>
            </ul>
        </nav>
        <div class="actions">
            

            <i class="icon-cart"><a href="form_login.php"><img src="img/icon/basket.png" width="30px"></a></i>
        </div>
    </div>
</header>

<!-- ส่วนแสดงสินค้า -->
<div class="product-list">
    <?php
    // เชื่อมต่อกับฐานข้อมูล
    $conn = mysqli_connect("127.0.0.1", "root", "", "project");

    // ตรวจสอบการเชื่อมต่อ
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // สร้างอาร์เรย์สำหรับประเภทสินค้า
    $product_types = ['แอปเปิ้ล', 'โทรศัพท์มือถือและอุปกรณ์เสริม', 'เครื่องใช้ไฟฟ้าภายในบ้าน', 'คอมพิวเตอร์ตั้งโต๊ะ'];

    // แสดงข้อมูลสินค้าในแต่ละประเภท
    foreach ($product_types as $type) {
        // คิวรีข้อมูลจากฐานข้อมูล
        $sql = "SELECT * FROM products WHERE product_type = '$type'";
        $result = mysqli_query($conn, $sql);

        // แสดงชื่อประเภทสินค้า
        echo "<h2>$type</h2>";
        echo "<div class='products'>";

        // ตรวจสอบว่ามีสินค้าที่ตรงกันหรือไม่
        if (mysqli_num_rows($result) > 0) {
            // วนลูปแสดงสินค้าที่ค้นพบ
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='product'>";
                echo "<img src='img/" . $row['product_image'] . "' alt='" . $row['product_name'] . "' />";
                echo "<h3>" . $row['product_name'] . "</h3>";
                echo "<p>" . $row['product_description'] . "</p>";
                echo "<p class='price'>฿" . number_format($row['product_price'], 2) . "</p>";
                
                // ปุ่มสำหรับเพิ่มไปยังตะกร้าและรายละเอียดเพิ่มเติม
                echo "<div class='button-container'>"; // Container สำหรับปุ่ม
                echo "<button class='add-to-cart' onclick=\"window.location.href='form_login.php'\">เพิ่มไปยังตะกร้า</button>";
                echo "<button class='more-details' onclick=\"window.location.href='form_login.php'\">รายละเอียดเพิ่มเติม</button>";
                echo "</div>"; // ปิด Container
                echo "</div>";
            }
        } else {
            echo "<p>ไม่มีสินค้าในหมวดหมู่นี้</p>";
        }

        echo "</div>";
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($conn);
    ?>
</div>

<footer class="footer">
    <p>© 2024 ByteShop. Co., Ltd.</p>
</footer>

<script>
    let lastScrollTop = 0;
    const header = document.querySelector('.sticky-header');

    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop) {
            // ถ้าหากเลื่อนลง
            header.classList.add('hidden');
        } else {
            // ถ้าหากเลื่อนขึ้น
            header.classList.remove('hidden');
        }
        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    });
</script>

</body>
</html>
