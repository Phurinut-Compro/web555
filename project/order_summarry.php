<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบหลังบ้าน</title>
    <link rel="stylesheet" href="css/be_styles.css">
</head>
<body>

<div class="admin-dashboard-container">
    <aside class="sidebar">
        <h2>เมนูการจัดการ</h2>
        <ul>
            <li><a href="#manage-products">จัดการสินค้า</a></li>
            <li><a href="#manage-orders">จัดการคำสั่งซื้อ</a></li>
            <li><a href="#view-customers">ดูลูกค้า</a></li>
            <li><a href="#settings">คอมเมนท์</a></li>
        </ul>
    </aside>

    <main class="admin-content">
        <h1>ระบบหลังบ้าน</h1>
        
        <section id="manage-products">
            <h2>จัดการสินค้า</h2>
            <button class="add-product-btn">เพิ่มสินค้า</button>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>ภาพสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวนคงเหลือ</th>
                        <th>การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="https://via.placeholder.com/100" alt="สินค้า 1"></td>
                        <td>ผลิตภัณฑ์น้ำมังคุดเสริมคอลลาเจน</td>
                        <td>250 บาท</td>
                        <td>20</td>
                        <td>
                            <button class="edit-btn">แก้ไข</button>
                            <button class="delete-btn">ลบ</button>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://via.placeholder.com/100" alt="สินค้า 2"></td>
                        <td>เครื่องดื่มชาเขียวออร์แกนิค</td>
                        <td>150 บาท</td>
                        <td>30</td>
                        <td>
                            <button class="edit-btn">แก้ไข</button>
                            <button class="delete-btn">ลบ</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="manage-orders">
            <h2>จัดการคำสั่งซื้อ</h2>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>หมายเลขคำสั่งซื้อ</th>
                        <th>ชื่อผู้สั่งซื้อ</th>
                        <th>สถานะ</th>
                        <th>ยอดรวม</th>
                        <th>วันที่</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#001</td>
                        <td>นายสมชาย ใจดี</td>
                        <td>ชำระเงินแล้ว</td>
                        <td>600 บาท</td>
                        <td>2024-10-13</td>
                    </tr>
                    <tr>
                        <td>#002</td>
                        <td>นางสาวสวย สวย</td>
                        <td>รอดำเนินการ</td>
                        <td>150 บาท</td>
                        <td>2024-10-12</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="view-customers">
            <h2>ดูลูกค้า</h2>
            <table class="customer-table">
                <thead>
                    <tr>
                        <th>ชื่อ</th>
                        <th>อีเมล</th>
                        <th>หมายเลขโทรศัพท์</th>
                        <th>วันที่ลงทะเบียน</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>นายสมชาย ใจดี</td>
                        <td>somchai@example.com</td>
                        <td>012-3456789</td>
                        <td>2024-01-15</td>
                    </tr>
                    <tr>
                        <td>นางสาวสวย สวย</td>
                        <td>suay@example.com</td>
                        <td>012-9876543</td>
                        <td>2024-02-10</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="settings">
            <h2>คอมเมทน์</h2>
            <form>
                <label for="site-title">ชื่อเว็บไซต์:</label>
                <input type="text" id="site-title" placeholder="ชื่อเว็บไซต์">
                
                <label for="admin-email">อีเมลผู้ดูแลระบบ:</label>
                <input type="email" id="admin-email" placeholder="อีเมลผู้ดูแลระบบ">

                <button type="submit" class="save-settings-btn">บันทึกการตั้งค่า</button>
            </form>
        </section>
    </main>
</div>

<footer class="footer">
    <p>© 2024 ByteShop. Co., Ltd.</p>
</footer>

</body>
</html>
