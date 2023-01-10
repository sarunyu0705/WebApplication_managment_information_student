<?php
include_once("config.php");
session_start();
if (isset($_SESSION['no']) && isset($_SESSION['admin_user'])) {
}
?>
<!------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="style.css" rel="stylesheet">
	<title>หน้าหลัก</title>
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
	<!-- -----------------------------------------	Bootstrap	------------------------------------------------------- -->
	<div>
		<img src="https://www.engineer.rmutt.ac.th/wp-content/uploads/2022/02/heading-1.jpg" alt="head_logo" class="rounded mx-auto d-block">
		<div class="topnav container">
			<ul>
				<a href="homepage.php" class="active">หน้าหลัก</a>
				<a href="info.php">ข้อมูลนักศึกษา</a>
				<a href="add.php">เพิ่มบัญชีผู้ใช้งาน</a>
				<a href="info_select.php " class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">ข้อมูลการเลือกสาขา</a>
				<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
					<li><a class="dropdown-item" href="info_select.php">ข้อมูลการเลือกสาขา</a></li>
					<li><a class="dropdown-item" href="info_department.php">ข้อมูลสาขาวิชาต่างๆ</a></li>
				</ul>
				<a href="info_gread.php">ข้อมูลผลการเรียน</a>
				<a href="login.php">ออกจากระบบ</a>
			</ul>
		</div>
	</div>

	<div class="container c"><br><br>
		<div>
			<h1>ยินดีต้อนรับ : " <?php echo $_SESSION['admin_name']; ?> "</h1><br>
			<h2>กรุณาเลือกเมนูด้านบน</h2>
		</div>
		<div>
			<img src="https://cdn-icons-png.flaticon.com/512/5578/5578628.png" alt="" width="350">
		</div>
	</div>
</body>

</html>