<?php
session_start(); // เริ่มต้น session

// เชื่อมต่อกับฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ตรวจสอบว่ามีการส่ง ID ของสินค้าหรือไม่
if (isset($_GET['id'])) {
    $product_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM products WHERE product_id = '$product_id'"; // คิวรีข้อมูลตาม ID

    $result = mysqli_query($conn, $sql);

    // ตรวจสอบว่าคิวรีสำเร็จหรือไม่
    if ($result) {
        $product = mysqli_fetch_assoc($result);
        
        // ตรวจสอบว่ามีสินค้าหรือไม่
        if (!$product) {
            echo "ไม่พบสินค้านี้";
            exit();
        }
    } else {
        echo "เกิดข้อผิดพลาดในการคิวรีข้อมูล: " . mysqli_error($conn);
        exit();
    }
} else {
    echo "ไม่มีสินค้านี้";
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['product_name']); ?></title>
    <link rel="stylesheet" href="css/product_details.css">
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
                <li><a href="logout.php">ออกจากระบบ</a></li>
            </ul>
        </nav>
        <div class="actions">
    
    <i class="icon-search"></i>

    <?php
    if (isset($_SESSION['username'])) {
        echo '<span class="username">' . htmlspecialchars($_SESSION['username']) . '</span>';
        echo '<form action="logout.php" method="post" style="display:inline;">';
        echo '<button type="submit" class="logout-button">ล็อกเอาท์</button>';
        echo '</form>';
    } else {
        echo '<img src="img/icon/user.png" width="30px" alt="User Icon">';
    }
    ?>
    
    <a href="add_cart.php" class="icon-cart">
        <img src="img/icon/basket.png" width="30px" alt="Cart Icon">
    </a>
</div>

    </div>
</header>

<div class="main-container">
    <div class="product-details">
        <div class="product-image">
            <img src="img/<?php echo htmlspecialchars($product['product_image']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
        </div>
        <div class="product-info">
            <h1><?php echo htmlspecialchars($product['product_name']); ?></h1>
            <p>ราคา: <?php echo number_format($product['product_price'], 2); ?> บาท</p>
            <p><?php echo htmlspecialchars($product['product_description']); ?></p>
            <form action="add_to_cart.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <button type="submit" class="add-to-cart-button">หยิบใส่ตะกร้า</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>
