<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบหลังบ้าน</title>
    <link rel="stylesheet" href="css/form_insert_product.css">
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
        <h1>ระบบหลังบ้าน</h1>
        
        <section id="manage-products">
            <h2>เพิ่มสินค้าใหม่</h2>
            <form action="insert_product.php" method="POST" enctype="multipart/form-data" class="add-product-form">
                <label for="product-name">ชื่อสินค้า:</label>
                <input type="text" name="product_name" id="product-name" placeholder="กรอกชื่อสินค้า" required>

                <label for="product-price">ราคา (บาท):</label>
                <input type="number" name="product_price" id="product-price" placeholder="กรอกราคา" required>

                <label for="product-stock">จำนวนสินค้าในคลัง:</label>
                <input type="number" name="product_stock" id="product-stock" placeholder="กรอกจำนวนสินค้า" required>

                <label for="product-description">รายละเอียดสินค้า:</label>
                <textarea name="product_description" id="product-description" placeholder="กรอกรายละเอียดสินค้า" rows="4" required></textarea>

                <label for="product-type">ประเภทสินค้า:</label>
                <select name="product_type" id="product-type" required>
                    <option value="แอปเปิ้ล">แอปเปิ้ล</option>
                    <option value="โน๊ตบุค">โน๊ตบุค</option>
                    <option value="โทรศัพท์มือถือและอุปกรณ์เสริม">โทรศัพท์มือถือและอุปกรณ์เสริม</option>
                    <option value="เครื่องใช้ไฟฟ้าภายในบ้าน">เครื่องใช้ไฟฟ้าภายในบ้าน</option>
                    <option value="คอมพิวเตอร์ตั้งโต๊ะและออลอินวัน">คอมพิวเตอร์ตั้งโต๊ะและออลอินวัน</option>
                    <option value="อุปกรณ์คอมพิวเตอร์(DIY)">อุปกรณ์คอมพิวเตอร์(DIY)</option>
                    <option value="แทปแล็ตและอุปกรณ์เสริม">แทปแล็ตและอุปกรณ์เสริม</option>
                    <option value="ลำโพง&หูฟัง&ทีวี">ลำโพง&หูฟัง&ทีวี</option>
                    <option value="เกม&สตรีมมิ่งและอุปกรณ์เสริม">เกม&สตรีมมิ่งและอุปกรณ์เสริม</option>
                    <option value="อุปกรณ์เสริมไอที">อุปกรณ์เสริมไอที</option>
                </select>

                <label for="product-image">อัพโหลดภาพสินค้า:</label>
                <input type="file" name="product_image" id="product-image" required>

                <button type="submit" class="save-product-btn">บันทึกสินค้า</button>
                <button type="button" class="back-btn" onclick="window.history.back()">ย้อนกลับ</button>
            </form>
        </section>
    </main>
</div>

<footer class="footer">
    <p>© 2024 ByteShop. Co., Ltd.</p>
</footer>

</body>
</html>
