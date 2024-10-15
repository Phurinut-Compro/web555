<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = mysqli_connect("127.0.0.1", "root", "", "project");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// คำสั่ง SQL เพื่อดึงข้อมูลสินค้า
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

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
            <li><a href="#settings">ข้อความ</a></li>
        </ul>
    </aside>

    <main class="admin-content">
        <h1>ระบบหลังบ้าน</h1>
        
        <section id="manage-products">
            <h2>จัดการสินค้า</h2>
            <button class="add-product-btn"><a href="form_insert_product.php">เพิ่มสินค้า</a></button>
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
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><img src="img/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" width="100"></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['product_price']; ?> บาท</td>
                                <td><?php echo $row['product_stock']; ?></td>
                                <td>
                                    <button class="add-product-btn">
                                        <a href="form_edit_product.php?product_id=<?php echo $row['product_id']; ?>">แก้ไข</a>
                                    </button>
                                    <form action="delete_product.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                        <button type="submit" class="delete-btn" onclick="return confirm('คุณแน่ใจหรือว่าต้องการลบสินค้านี้?');">ลบ</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">ยังไม่มีสินค้าที่บันทึกไว้</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>

        <section id="manage-orders">
      
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
                <th>การจัดการ</th> <!-- เพิ่มคอลัมน์การจัดการ -->
            </tr>
        </thead>
        <tbody>
            <?php
            // คิวรีเพื่อดึงข้อมูลคำสั่งซื้อ
            $sql = "SELECT order_id, cus_name, order_status, total_amount, order_date FROM orders";
            $result = mysqli_query($conn, $sql);

            // ตรวจสอบว่ามีข้อมูลหรือไม่
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['order_id']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['cus_name']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['order_status']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['total_amount']) . ' บาท</td>';
                    echo '<td>' . htmlspecialchars($row['order_date']) . '</td>';
                    echo '<td>
                            <form action="delete_order.php" method="POST" style="display:inline;">
                                <input type="hidden" name="order_id" value="' . htmlspecialchars($row['order_id']) . '">
                                <button type="submit" class="delete-btn" onclick="return confirm(\'คุณแน่ใจหรือว่าต้องการลบคำสั่งซื้อนี้?\');">ลบ</button>
                            </form>
                          </td>'; // เพิ่มฟอร์มลบคำสั่งซื้อ
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="6">ไม่มีคำสั่งซื้อ</td></tr>'; // ปรับให้มี 6 คอลัมน์
            }
            ?>
        </tbody>
    </table>
</section>

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
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // เชื่อมต่อกับฐานข้อมูล
            $conn = new mysqli("127.0.0.1", "root", "", "project");

            // ตรวจสอบการเชื่อมต่อ
            if ($conn->connect_error) {
                die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
            }

            // คำสั่ง SQL เพื่อดึงข้อมูลลูกค้า
            $sql2 = "SELECT * FROM customer";
            $result2 = $conn->query($sql2);

            // แสดงข้อมูลลูกค้า
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row2['cus_name'] . " " . $row2['cus_sur'] . "</td>";
                    echo "<td>" . $row2['cus_email'] . "</td>";
                    echo "<td>" . $row2['cus_tel'] . "</td>";
                    echo "<td>" . $row2['registration_date'] . "</td>"; // assuming registration_date is a column in your database
                    echo "<td>
                            <button class='add-product-btn'>
                                <a href='form_edit_customer.php?cus_email=" . urlencode($row2['cus_email']) . "'>แก้ไข</a>
                            </button>
                            <form action='delete_customer.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='cus_email' value='" . htmlspecialchars($row2['cus_email'], ENT_QUOTES) . "'>
                                <button type='submit' class='add-product-btn' onclick=\"return confirm('คุณแน่ใจหรือว่าต้องการลบลูกค้านี้?');\">ลบ</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>ยังไม่มีลูกค้าที่บันทึกไว้</td></tr>";
            }

            // ปิดการเชื่อมต่อ
            $conn->close();
            ?>
        </tbody>
    </table>
</section>



        <?php
// เชื่อมต่อกับฐานข้อมูล
$conn5 = new mysqli("127.0.0.1", "root", "", "project");

// ตรวจสอบการเชื่อมต่อ
if ($conn5->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn5->connect_error);
}

// คำสั่ง SQL เพื่อดึงข้อมูลข้อความจากลูกค้า
$sql5 = "SELECT id, name, email, subject, message, created_at FROM contact_messages ORDER BY created_at DESC";
$result5 = $conn5->query($sql5);
?>

<section id="view-messages">
    <h2>ข้อความ</h2>
    <table class="message-table">
        <thead>
            <tr>
                <th>ชื่อผู้ส่ง</th>
                <th>อีเมล</th>
                <th>หัวข้อ</th>
                <th>ข้อความ</th>
                <th>วันที่ส่ง</th>
                <th>การจัดการ</th> <!-- เพิ่มคอลัมน์การจัดการ -->
            </tr>
        </thead>
        <tbody>
            <?php if ($result5 && $result5->num_rows > 0): ?>
                <?php while($row5 = $result5->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row5['name']); ?></td>
                        <td><?php echo htmlspecialchars($row5['email']); ?></td>
                        <td><?php echo htmlspecialchars($row5['subject']); ?></td>
                        <td><?php echo htmlspecialchars($row5['message']); ?></td>
                        <td><?php echo htmlspecialchars($row5['created_at']); ?></td>
                        <td>
                            <form action="delete_message.php" method="POST" style="display:inline;">
                                <input type="hidden" name="message_id" value="<?php echo $row5['id']; ?>">
                                <button type="submit" class="delete-btn" onclick="return confirm('คุณแน่ใจหรือว่าต้องการลบข้อความนี้?');">ลบ</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">ยังไม่มีข้อความจากลูกค้า</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>

<?php
// ปิดการเชื่อมต่อฐานข้อมูลหลังจากใช้งานเสร็จ
$conn5->close();
?>
    </main>
</div>

<footer class="footer">
    <p>© 2024 ByteShop. Co., Ltd.</p>
</footer>

</body>
</html>


