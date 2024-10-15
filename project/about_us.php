<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เกี่ยวกับเรา</title>
    <link rel="stylesheet" href="css/styles3.css">
    <style>
        .container {
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        
        .about-us {
            background-color: white; /* พื้นหลังสีขาว */
            border: 1px solid #ccc; /* กรอบสี่เหลี่ยม */
            border-radius: 5px; /* มุมมน */
            padding: 20px; /* ระยะห่างภายใน */
            box-shadow: 0 2px 5px rgba(243, 239, 239, 0.1); /* เงาเบา */
            max-width: 800px; /* กำหนดความกว้างสูงสุด */
            width: 100%; /* ความกว้างเต็มที่ */
        }
        
        h3, h4 {
            color: #333; /* สีหัวข้อ */
        }
        
        p, ul {
            color: #555; /* สีข้อความ */
        }
        
        ul {
            padding-left: 20px; /* ระยะห่างซ้ายสำหรับรายการ */
        }

        /* CSS สำหรับเฮดเดอร์ */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f8f8f8; /* สีพื้นหลังเฮดเดอร์ */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* เงาเฮดเดอร์ */
        }

        .menu ul {
            list-style-type: none; /* ลบจุดรายการ */
            margin: 0;
            padding: 0;
            display: flex; /* แสดงรายการแบบแนวนอน */
        }

        .menu li {
            margin: 0 15px; /* ระยะห่างระหว่างรายการ */
        }

        .menu a {
            text-decoration: none; /* ลบขีดเส้นใต้ */
            color: #333; /* สีข้อความในเมนู */
        }

        .actions {
            display: flex;
            align-items: center;
        }

        .actions input[type="text"] {
            padding: 5px;
            margin-right: 10px;
        }

        .actions i {
            margin-left: 10px;
        }

        .logout-button {
            background-color: #dc3545; /* สีพื้นหลังปุ่มล็อกเอาท์ */
            color: white; /* สีข้อความ */
            border: none; /* ไม่มีกรอบ */
            border-radius: 5px; /* มุมมน */
            padding: 5px 10px; /* ระยะห่างภายใน */
            cursor: pointer; /* เปลี่ยนเป็นรูปมือเมื่อชี้ไปที่ปุ่ม */
            margin-left: 10px; /* ระยะห่างซ้ายของปุ่มล็อกเอาท์ */
        }

        .logout-button:hover {
            background-color: #c82333; /* สีพื้นหลังเมื่อเอาเมาส์ชี้ */
        }

        footer {
            text-align: center; /* จัดข้อความให้กลาง */
            padding: 10px 0; /* ระยะห่างในฟุตเตอร์ */
            background-color: #333; /* พื้นหลังฟุตเตอร์ */
            color: white; /* สีข้อความในฟุตเตอร์ */
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
    
        <div class="actions">
            
            <i class="icon-search"></i>
            
            <i class="icon-cart"><a href="add_cart.php"><img src="img/icon/basket.png" width="30px"></a></i>
            <button class="logout-button"><a href="logout.php" style="color: white; text-decoration: none;">ล็อกเอาท์</a></button>
        </div>
    </header>

    <div class="container">
        <!-- About Us Content -->
        <div class="about-us">
            <h3>เกี่ยวกับเรา</h3>
            <p>ยินดีต้อนรับสู่ ByteShop เราเป็นทีมที่หลงใหลในการนำเสนอสินค้าที่มีคุณภาพสูงและบริการที่ดีที่สุดให้กับลูกค้าของเรา เราเชื่อว่าทุกคนควรมีสิทธิ์เข้าถึงสินค้าที่ดีและเหมาะสมกับความต้องการของตน</p>

            <h4>พันธกิจของเรา</h4>
            <p>เรามุ่งมั่นที่จะสร้างประสบการณ์การช็อปปิ้งออนไลน์ที่สะดวกสบายและน่าเชื่อถือ โดยเราเลือกสรรสินค้าอย่างพิถีพิถันจากผู้ผลิตที่มีชื่อเสียง เพื่อให้แน่ใจว่าทุกชิ้นที่เราขายมีคุณภาพและคุ้มค่า</p>

            <h4>ค่านิยมของเรา</h4>
            <ul>
                <li><strong>คุณภาพ:</strong> เราเชื่อมั่นในคุณภาพของสินค้าและบริการที่เรานำเสนอ</li>
                <li><strong>ความเชื่อถือได้:</strong> เราตั้งใจที่จะสร้างความไว้วางใจจากลูกค้าผ่านความโปร่งใสและการบริการที่ดี</li>
                <li><strong>ความหลากหลาย:</strong> เรามีสินค้าหลากหลายประเภทเพื่อตอบสนองความต้องการของลูกค้าที่แตกต่างกัน</li>
            </ul>

            <h4>ทีมงานของเรา</h4>
            <p>ทีมงานของเราเป็นกลุ่มคนที่มีความเชี่ยวชาญในด้านต่างๆ ตั้งแต่การเลือกซื้อสินค้า การบริการลูกค้า จนถึงการจัดส่ง เราพร้อมที่จะให้บริการและช่วยเหลือคุณในทุกขั้นตอน</p>

            <h4>เข้าร่วมกับเรา!</h4>
            <p>เรายินดีต้อนรับคุณเข้ามาเป็นส่วนหนึ่งของครอบครัว ByteShop และหวังว่าคุณจะเพลิดเพลินกับการช็อปปิ้งออนไลน์กับเรา! หากคุณมีคำถามหรือข้อเสนอแนะใดๆ กรุณาติดต่อเราที่ <a href="s6706022510271@kmutnb.ac.th">s6706022510271@kmutnb.ac.th</a></p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
    <p>© 2024 ByteShop. Co., Ltd.</p>
</footer>

</body>
</html>
