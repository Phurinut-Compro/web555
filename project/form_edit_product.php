<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// ตรวจสอบว่ามี product_id หรือไม่
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // ดึงข้อมูลสินค้าจากฐานข้อมูล
    $sql = "SELECT * FROM products WHERE product_id = '$product_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        die("ไม่พบสินค้านี้");
    }
} else {
    die("ไม่มี product_id");
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขสินค้า</title>
    <link rel="stylesheet" href="css/form_edit_product_styles.css">
</head>
<body>
<div class="admin-dashboard-container">
    <aside class="sidebar">
        <h2>เมนูการจัดการ</h2>
        <ul>
            <li><a href="behind.php">จัดการสินค้า</a></li>
            <li><a href="behind.php">จัดการคำสั่งซื้อ</a></li>
            <li><a href="behind.php">ดูลูกค้า</a></li>
            <li><a href="behind.php">ตั้งค่า</a></li>
        </ul>
    </aside>

    <main class="admin-content">
        <h1>แก้ไขสินค้า</h1>
        <form action="update_product.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
            
            <label for="product-name">ชื่อสินค้า:</label>
            <input type="text" name="product_name" id="product-name" value="<?php echo $product['product_name']; ?>" required>

            <label for="product-price">ราคา (บาท):</label>
            <input type="number" name="product_price" id="product-price" value="<?php echo $product['product_price']; ?>" required>

            <label for="product-stock">จำนวนสินค้าในคลัง:</label>
            <input type="number" name="product_stock" id="product-stock" value="<?php echo $product['product_stock']; ?>" required>

            <label for="product-description">รายละเอียดสินค้า:</label>
            <textarea name="product_description" id="product-description" rows="4" required><?php echo $product['product_description']; ?></textarea>

            <label for="product-type">ประเภทสินค้า:</label>
            <select name="product_type" id="product-type" required>
                <option value="แอปเปิ้ล" <?php echo ($product['product_type'] == 'แอปเปิ้ล') ? 'selected' : ''; ?>>แอปเปิ้ล</option>
                <option value="โน๊ตบุค" <?php echo ($product['product_type'] == 'โน๊ตบุค') ? 'selected' : ''; ?>>โน๊ตบุค</option>
                <option value="โทรศัพท์มือถือและอุปกรณ์เสริม" <?php echo ($product['product_type'] == 'โทรศัพท์มือถือและอุปกรณ์เสริม') ? 'selected' : ''; ?>>โทรศัพท์มือถือและอุปกรณ์เสริม</option>
                <option value="เครื่องใช้ไฟฟ้าภายในบ้าน" <?php echo ($product['product_type'] == 'เครื่องใช้ไฟฟ้าภายในบ้าน') ? 'selected' : ''; ?>>เครื่องใช้ไฟฟ้าภายในบ้าน</option>
                <option value="คอมพิวเตอร์ตั้งโต๊ะและออลอินวัน" <?php echo ($product['product_type'] == 'คอมพิวเตอร์ตั้งโต๊ะและออลอินวัน') ? 'selected' : ''; ?>>คอมพิวเตอร์ตั้งโต๊ะและออลอินวัน</option>
                <option value="อุปกรณ์คอมพิวเตอร์(DIY)" <?php echo ($product['product_type'] == 'อุปกรณ์คอมพิวเตอร์(DIY)') ? 'selected' : ''; ?>>อุปกรณ์คอมพิวเตอร์(DIY)</option>
                <option value="แทปแล็ตและอุปกรณ์เสริม" <?php echo ($product['product_type'] == 'แทปแล็ตและอุปกรณ์เสริม') ? 'selected' : ''; ?>>แทปแล็ตและอุปกรณ์เสริม</option>
                <option value="ลำโพง&หูฟัง&ทีวี" <?php echo ($product['product_type'] == 'ลำโพง&หูฟัง&ทีวี') ? 'selected' : ''; ?>>ลำโพง&หูฟัง&ทีวี</option>
                <option value="เกม&สตรีมมิ่งและอุปกรณ์เสริม" <?php echo ($product['product_type'] == 'เกม&สตรีมมิ่งและอุปกรณ์เสริม') ? 'selected' : ''; ?>>เกม&สตรีมมิ่งและอุปกรณ์เสริม</option>
                <option value="อุปกรณ์เสริมไอที" <?php echo ($product['product_type'] == 'อุปกรณ์เสริมไอที') ? 'selected' : ''; ?>>อุปกรณ์เสริมไอที</option>
            </select>

            <label for="product-image">ภาพสินค้า:</label>
            <img src="img/<?php echo $product['product_image']; ?>" alt="<?php echo $product['product_name']; ?>" width="100">
            <input type="file" name="product_image" id="product-image">

            <button type="submit">อัปเดตสินค้า</button>
        </form>
    </main>
</div>
</body>
</html>

<?php
// ปิดการเชื่อมต่อ
$conn->close();
?>
