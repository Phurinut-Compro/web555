<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหมวดหมู่สินค้า</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- เมนูด้านซ้าย -->
    <div class="sidebar">
        <h2>หมวดหมู่สินค้า</h2>
        <ul>
            <li><a href="#">เครื่องดื่ม</a></li>
            <li><a href="#">อาหารเสริม</a></li>
            <li><a href="#">ผลิตภัณฑ์ความงาม</a></li>
            <li><a href="#">ของใช้ในบ้าน</a></li>
            <li><a href="#">อุปกรณ์ออกกำลังกาย</a></li>
        </ul>
    </div>

    <!-- รายการสินค้า -->
    <div class="product-list-container">
        <h1>รายการสินค้า</h1>

        <div class="product-list">
            <!-- รายการสินค้า -->
            <div class="product-item">
                <img src="https://via.placeholder.com/200" alt="สินค้า 1">
                <h3>ผลิตภัณฑ์น้ำมังคุดเสริมคอลลาเจน</h3>
                <p>ราคา: 250 บาท</p>
                <p>น้ำมังคุดเสริมคอลลาเจน ช่วยบำรุงผิวและสุขภาพ</p>
                <button>หยิบใส่ตะกร้า</button>
            </div>

            <div class="product-item">
                <img src="https://via.placeholder.com/200" alt="สินค้า 2">
                <h3>เครื่องดื่มชาเขียวออร์แกนิค</h3>
                <p>ราคา: 150 บาท</p>
                <p>ชาเขียวออร์แกนิค สดชื่นและมีประโยชน์ต่อสุขภาพ</p>
                <button>หยิบใส่ตะกร้า</button>
            </div>

            <!-- เพิ่มสินค้าอื่นๆ อีกหลายรายการได้ -->
        </div>

    </div>

</body>
</html>
