<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Registration Form</title>
    <link rel="stylesheet" href="css/form_register_styles.css"> <!-- เชื่อมโยงไฟล์ CSS -->
</head>
<body>
<form action="register.php" method="post" enctype="multipart/form-data">
<div class="container">
    <h2>ข้อมูลการลงทะเบียน</h2>
    <div class="form-container">
        <div class="form-group">
            <h3>ข้อมูลของท่าน</h3>
            <label for="firstName">ชื่อของท่าน *</label>
            <input  name="firstname" type="text" id="firstname" placeholder="กรอกชื่อ" required>
            <label for="lastName">นามสกุลของท่าน *</label>
            <input  name="lastname" type="text" id="lastName" placeholder="กรอกนามสกุล" required>
            <div class="checkbox-group">
            <table border="0">
            	<tr>
                	<td><input type="checkbox" id="agreePolicy" required></td>
                    <td>ฉันได้อ่านและยอมรับ <a href="Privacy.php">นโยบายความเป็นส่วนตัว</td>
                </tr>
                <tr>
                	<td><input type="checkbox" id="receiveOffers"></td>
                    <td><label for="receiveOffers">ฉันต้องการรับข้อเสนอพิเศษและโปรโมชั่น</label></td>
                </tr>
            </table>
            </div>
            
        </div>
        

        <div class="form-group">
            <h3>ข้อมูลบัญชีผู้ใช้</h3>
            <label for="email">อีเมล *</label>
            <input name="email" type="email" id="email" placeholder="กรอกอีเมล" required>
            <label for="phone">เบอร์โทรศัพท์ *</label>
            <input  name="tel" type="tel" id="phone" placeholder="กรอกเบอร์โทรศัพท์" required>
            <label for="password">ตั้งรหัสผ่าน *</label>
            <input  name="password" type="password" id="password" placeholder="กรอกรหัสผ่าน" required>
            
            <label for="confirmPassword">ยืนยันรหัสผ่าน *</label>
            <input type="password" id="confirmPassword" placeholder="กรอกรหัสผ่านอีกครั้ง" required></br>
                
        </div>
    </div>

    <div class="button-group" align="center">
        <button class="secondary" onclick="window.location.href='form_login.php'">ย้อนกลับ</button>
        <button type="submit">สร้างบัญชีผู้ใช้งาน</button>
    </div>
</div>
</form>
</body>
</html>
