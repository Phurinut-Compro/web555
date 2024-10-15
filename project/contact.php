<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - ติดต่อเรา</title>
    <link rel="stylesheet" href="css/contac_us.css">
    <style>
        .container {
            padding: 20px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .contact-info, .contact-form, .social-links, .working-hours {
            background-color: white; /* พื้นหลังสีขาว */
            border: 1px solid #ccc; /* กรอบสี่เหลี่ยม */
            border-radius: 5px; /* มุมมน */
            padding: 20px; /* ระยะห่างภายใน */
            box-shadow: 0 2px 5px rgba(243, 239, 239, 0.1); /* เงาเบา */
            max-width: 800px; /* กำหนดความกว้างสูงสุด */
            width: 100%; /* ความกว้างเต็มที่ */
            margin-bottom: 20px; /* ระยะห่างระหว่างบล็อก */
        }

        h3 {
            color: #333; /* สีหัวข้อ */
        }

        p, ul {
            color: #555; /* สีข้อความ */
        }

        ul {
            padding-left: 20px; /* ระยะห่างซ้ายสำหรับรายการ */
        }

        .form-group {
            margin-bottom: 15px; /* ระยะห่างระหว่างฟอร์ม */
        }

        button {
            background-color: #4CAF50; /* สีพื้นหลังปุ่ม */
            color: white; /* สีข้อความในปุ่ม */
            border: none; /* ไม่มีขอบ */
            border-radius: 5px; /* มุมมน */
            padding: 10px 20px; /* ระยะห่างในปุ่ม */
            cursor: pointer; /* แสดงมือเมื่อชี้ */
        }

        button:hover {
            background-color: #45a049; /* สีเมื่อชี้ */
        }

        .logout-button {
            background-color: #f44336; /* สีพื้นหลังปุ่มล็อกเอาท์ */
            margin-top: 10px; /* ระยะห่างบนปุ่มล็อกเอาท์ */
        }

        .logout-button:hover {
            background-color: #d32f2f; /* สีเมื่อชี้ */
        }

        footer {
            text-align: center; /* จัดข้อความให้กลาง */
            padding: 10px 0; /* ระยะห่างในฟุตเตอร์ */
            background-color: #333; /* พื้นหลังฟุตเตอร์ */
            color: white; /* สีข้อความในฟุตเตอร์ */
        }

        .confirmation-message {
            display: none; /* ซ่อนข้อความยืนยัน */
            color: #4CAF50; /* สีข้อความยืนยัน */
            margin-top: 10px; /* ระยะห่างบนข้อความยืนยัน */
        }
    </style>
</head>
<body>
    <header class="sticky-header">
        <div class="logo">
            <a href="index.php">
                <img src="img/logo.png" alt="Logo" width="200px">
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
            <i class="icon-cart"><a href="add_cart.php"><img src="img/icon/basket.png" width="30px"></a></i>
          <button class="logout-button">ล็อกเอาท์</button> <!-- ปุ่มล็อกเอาท์ -->
        </div>
    </header>

    <div class="container">
        <!-- ข้อมูลติดต่อ -->
        <div class="contact-info">
            <h3>ข้อมูลติดต่อ</h3>
            <p><strong>ที่อยู่:</strong> ถนน ปราจีนบุรี เขา ใหญ่ อำเภอ เมือง, ตำบล เนินหอม ปราจีนบุรี 25230</p>
            <p><strong>เบอร์โทรศัพท์:</strong> 037-217-300</p>
            <p><strong>อีเมล: </strong><a href="https://www.fitm.kmutnb.ac.th/" target="_blank">fitm.kmutnb.ac.th</a></p>
            <!-- แผนที่ Google Maps -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d483.5752514849356!2d101.34574758604944!3d14.159480284692775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311c52d4f41b1155%3A0x83d165d1cca95d3b!2z4LiE4LiT4Liw4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14LmB4Lil4Liw4LiB4Liy4Lij4LiI4Lix4LiU4LiB4Liy4Lij4Lit4Li44LiV4Liq4Liy4Lir4LiB4Lij4Lij4LihIOC4oeC4q-C4suC4p-C4tOC4l-C4ouC4suC4peC4seC4ouC5gOC4l-C4hOC5guC4meC5guC4peC4ouC4teC4nuC4o-C4sOC4iOC4reC4oeC5gOC4geC4peC5ieC4suC4nuC4o-C4sOC4meC4hOC4o-C5gOC4q-C4meC4t-C4rQ!5e0!3m2!1sth!2sth!4v1728816506298!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!-- แบบฟอร์มติดต่อ -->
        <div class="contact-form">
            <h3>แบบฟอร์มติดต่อ</h3>
            <form id="contactForm" action="insert_contact.php" method="POST">
                <div class="form-group">
                    <label for="name">ชื่อ</label>
                    <input type="text" id="name" name="name" placeholder="กรอกชื่อของคุณ" required>
                </div>
                <div class="form-group">
                    <label for="email">อีเมล</label>
                    <input type="email" id="email" name="email" placeholder="กรอกอีเมลของคุณ" required>
                </div>
                <div class="form-group">
                    <label for="subject">หัวข้อ</label>
                    <input type="text" id="subject" name="subject" placeholder="กรอกหัวข้อ" required>
                </div>
                <div class="form-group">
                    <label for="message">ข้อความ</label>
                    <textarea id="message" name="message" placeholder="เขียนข้อความของคุณ" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">ส่งข้อความ</button>
                </div>
            </form>

            <?php
            // ตรวจสอบว่าได้ส่งข้อมูลแล้วหรือไม่
            if (isset($_GET['success'])) {
                echo '<div class="confirmation-message" id="confirmationMessage">ขอบคุณ! ข้อความของคุณได้ถูกส่งเรียบร้อยแล้ว</div>';
            }
            ?>
        </div>

        <!-- ลิงก์ไปยังโซเชียลมีเดีย -->
        <div class="social-links">
            <h3>ติดตามเราได้ที่</h3>
            <a href="https://www.facebook.com/planfha.kutter" target="_blank">Facebook</a>
        </div>

        <!-- เวลาทำการ -->
        <div class="working-hours">
            <h3>เวลาทำการ</h3>
            <p><strong>วันจันทร์-ศุกร์:</strong> 9.00-18.00 น.</p>
            <p><strong>วันเสาร์-อาทิตย์:</strong> ปิดทำการ</p>
        </div>
    </div>

    <footer>
        <p>© 2024 All rights reserved. | Website created by Your Name</p>
    </footer>

    <script>
        // แสดงข้อความยืนยันเมื่อส่งฟอร์มสำเร็จ
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('success')) {
            document.getElementById('confirmationMessage').style.display = 'block'; // แสดงข้อความยืนยัน
        }
    </script>
</body>
</html>
