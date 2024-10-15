<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$firstname = $_POST["firstname"];
	$lastname= $_POST["lastname"];
	$email = $_POST["email"];
	$tel= $_POST["tel"];
	$password = $_POST["password"];

	include ("conn.php");
	$sql = "INSERT INTO `customer`(`cus_name`, `cus_sur`, `cus_email`, `cus_tel`, `cus_pass`, `type`, `registration_date`) VALUES ('$firstname','$lastname','$email','$tel','$password','M', '$date')";
	mysqli_query($conn,$sql);
?>

	<script>
		window.open('form_login.php','_self');
		alert("สมัครสมาชิกเรียบร้อยแล้ว");
	</script>
</body>
</html>