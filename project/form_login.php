<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Header</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/form_login_styles.css">
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
            <li><a href="index2.php">หน้าหลัก</a></li>
            <li><a href="index2.php">หมวดหมู่สินค้า</a></li>
            <li><a href="index2.php">เกี่ยวกับเรา</a></li>
            <li><a href="index2.php">ติดต่อเรา</a></li>
        </ul>
    </nav>

    <div class="actions">
        <input type="text" placeholder="Search">
        <i class="icon-search"></i>
        <i class="icon-user"><a href="form_login.php"><img src="img/icon/user.png" width="30px"></a></i>
        <i class="icon-cart"><a href="index2.php"><img src="img/icon/basket.png" width="30px"></a></i>
    </div>
</header>




<form action="login.php" method="POST" enctype="multipart/form-data" >
<div class="container">
    <h2>ยินดีต้อนรับเข้าสู่ระบบลูกค้า BYTESHOP ทุกท่าน</h2>
    <div class="form-container">
        <div class="form-group">
            <h3>เข้าสู่ระบบ</h3>
            <label for="email">อีเมล *</label>
            <input type="email" id="email" name="email" placeholder="กรอกอีเมล" required>
            <label for="password">รหัสผ่าน *</label>
            <input type="password" id="password" name="password" placeholder="กรอกรหัสผ่าน" required>
        </div>
            
         <div class="checkbox-group">
         	<div class="button-group" align="center">
        		<button class="secondary" value="ลืมรหัสผ่าน" onclick="window.location.href='index.php'">ย้อนกลับ</button>
        		<button type="submit">เข้าสู่ระบบ</button>
                
                <button class="last" value="ลืมรหัสผ่าน" onclick="window.location.href='form_rigister.php'">สมัครสมาชิก</button>
    		</div>
         </div>   
   </div>  
</div>
</form>
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
