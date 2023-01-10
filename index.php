<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="style.css" rel="stylesheet">
	<title>เข้าสู่ระบบ</title>
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
	<!-- bootstrap -->
	<div>
		<img src="https://www.engineer.rmutt.ac.th/wp-content/uploads/2022/02/heading-1.jpg" alt="head_logo" class="rounded mx-auto d-block">
	</div><br><br><br><br><br><br>
	<div class="c box container-sm ex1">
		<form action="login.php" method="post">
			<br>
			<br>
			<h2>ล็อคอินเข้าสู่ระบบ</h2><br><br><br>
			<label>
				<h4>ชื่อผู้ใช้งาน :</h4>
			</label>
			<input type="text" name="admin_user" placeholder="กรุณากรอกชื่อผู้ใช้งาน"><br><br>
			<label>
				<h4>รหัสผ่าน : </h4>
			</label>
			<input type="password" name="admin_password" placeholder="กรุณากรอกรหัสผ่าน"><br><br><br>
			<?php if (isset($_GET['error'])) { ?>
				<p class="error" style="color:tomato;"><?php echo $_GET['error']; ?></p>
			<?php } ?>
			<button type="submit" class="button_log">ล็อคอิน</button>
			<br>
			<br>
		</form>
	</div>
</body>

</html>