<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Header</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header class="sticky-header">
    <div class="logo">
        <a href="index2.php">
            <img src="img/logo.png" alt="Logo" width="200px">
        </a>
    </div>
    <nav class="menu">
        <ul>
            <li><a href="form_login.php">หน้าหลัก</a></li>
            <li><a href="form_login.php">หมวดหมู่สินค้า</a></li>
            <li><a href="form_login.php">เกี่ยวกับเรา</a></li>
            <li><a href="form_login.php">ติดต่อเรา</a></li>
        </ul>
    </nav>
    <div class="actions">
        
        <i class="icon-search"></i>
        <i class="icon-user"><a href="form_login.php"><img src="img/icon/user.png" width="30px"></a></i>
        <i class="icon-cart"><a href="form_login.php"><img src="img/icon/basket.png" width="30px"></a></i>
    </div>
</header>

<div class="slider">
    <input type="radio" name="slides" id="slide1" checked>
    <input type="radio" name="slides" id="slide2">
    <input type="radio" name="slides" id="slide3">

    <div class="slides">
        <div class="slide">
            <label for="slide1" class="slide-container">
                <img src="img/image1.jpg" alt="Product 1" width="100%">
            </label>
        </div>
        <div class="slide">
            <label for="slide2" class="slide-container">
                <img src="img/image2.png" alt="Product 2" width="100%">
            </label>
        </div>
        <div class="slide">
            <label for="slide3" class="slide-container">
                <img src="img/image3.png" alt="Product 3" width="100%">
            </label>
        </div>
    </div>
    <div class="navigation">
        <label for="slide1">1</label>
        <label for="slide2">2</label>
        <label for="slide3">3</label>
    </div>
</div>
<nav class="menu2">
    <ul>
        <li><a href="#">หน้าแรก</a></li>
    </ul>
</nav>

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
                echo "<a href='form_login.php'><button class='add-to-cart'>เพิ่มไปยังตะกร้า</button></a>"; // เปลี่ยนปุ่มให้ลิงค์ไปหน้า form_login.php
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
    const menu2 = document.querySelector('.menu2');

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

<style>
    .hidden {
        transform: translateY(-100%);
        transition: transform 0.3s ease-in-out;
    }
</style>

</body>
</html>
