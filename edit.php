<?php
// including the database connection file
include("config.php");

if (isset($_POST['update'])) {

	$std_id = mysqli_real_escape_string($mysqli, $_POST['std_id']);
	$std_firstname = mysqli_real_escape_string($mysqli, $_POST['std_firstname']);
	$std_lastname = mysqli_real_escape_string($mysqli, $_POST['std_lastname']);
	$std_password = mysqli_real_escape_string($mysqli, $_POST['std_password']);
	$std_email = mysqli_real_escape_string($mysqli, $_POST['std_email']);
	$std_tel = mysqli_real_escape_string($mysqli, $_POST['std_tel']);
	$std_idcard = mysqli_real_escape_string($mysqli, $_POST['std_idcard']);
	$std_state = mysqli_real_escape_string($mysqli, $_POST['std_state']);
	$std_colorbn = mysqli_real_escape_string($mysqli, $_POST['std_colorbn']);
	$std_major = mysqli_real_escape_string($mysqli, $_POST['std_major']);

	// checking empty fields
	if (
		empty($std_firstname) || empty($std_lastname) || empty($std_email) || empty($std_tel) || empty($std_idcard) || empty($std_password)
	) {

		if (empty($std_firstname)) {
			echo "<font color='red'>กรุณากรอกชื่อจริงนักศึกษาด้วย</font><br/>";
		}
		if (empty($std_lastname)) {
			echo "<font color='red'>กรุณากรอกนามสกุลนักศึกษาด้วย</font><br/>";
		}
		if (empty($std_email)) {
			echo "<font color='red'>กรุณากรอกอีเมลนักศึกษาด้วย</font><br/>";
		}
		if (empty($std_tel)) {
			echo "<font color='red'>กรุณากรอกเบอร์โทรนักศึกษาด้วย</font><br/>";
		}
		if (empty($std_password)) {
			echo "<font color='red'>กรุณากรอกรหัสผ่านนักศึกษาด้วย</font><br/>";
		}
	} else {
		//updating the table
		$result = mysqli_query(
			$mysqli,
			"UPDATE std_info SET std_firstname='$std_firstname',std_lastname='$std_lastname',std_email='$std_email',std_tel='$std_tel',std_password='$std_password',std_idcard='$std_idcard',std_state='$std_state',std_colorbn='$std_colorbn',
			std_major='$std_major'
		 WHERE std_id=$std_id"
		);

		header("Location: info.php");
	}
}
?>
<?php
$std_id = $_GET['std_id'];

$result = mysqli_query($mysqli, "SELECT * FROM std_info WHERE std_id=$std_id");

while ($res = mysqli_fetch_array($result)) {

	$std_firstname = $res['std_firstname'];
	$std_lastname = $res['std_lastname'];
	$std_password = $res['std_password'];
	$std_email = $res['std_email'];
	$std_tel = $res['std_tel'];
	$std_idcard = $res['std_idcard'];
	// start state ตัวเลือก value//
	$std_state = $res['std_state'];
	$std_colorbn = $res['std_colorbn'];
	$std_major = $res['std_major'];
}
?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="style.css" rel="stylesheet">
	<title>Edit Data</title>
</head>

<body class="container">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
	<!-- -----------------------------------------	Bootstrap	------------------------------------------------------- -->
	<div>
		<img src="https://www.engineer.rmutt.ac.th/wp-content/uploads/2022/02/heading-1.jpg" alt="head_logo" class="rounded mx-auto d-block">
		<div class="topnav container">
			<ul>
				<a href="homepage.php">หน้าหลัก</a>
				<a href="info.php" class="active">ข้อมูลนักศึกษา</a>
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
	<br>
	<!-- เริ่ม Container -->
	<form action="edit.php" method="post" name="form1" class="container-sm box"><br>
		<div class="row">
			<div class="col">
				<label for="std_id" class="">รหัสนักศึกษา</label><br>
				<input type="text" name="std_id" class="" disable value="<?php echo $std_id; ?>">
			</div>
			<div class="col">
				<label for="std_firstname" class="">ชื่อนักศึกษา</label><br>
				<input type="text" name="std_firstname" value="<?php echo $std_firstname; ?>">
			</div>
			<div class="col">
				<label for="std_lastname" class="">นามสกุลนักศึกษา</label><br>
				<input type="text" name="std_lastname" value="<?php echo $std_lastname; ?>">
			</div>
		</div><br>
		<div class="row">
			<div class="col">
				<label for="std_password" class="">รหัสผ่าน</label><br>
				<input type="text" name="std_password" value="<?php echo $std_password; ?>">
			</div>
			<div class="col">
				<label for="std_email" class="">อีเมล</label><br>
				<input type="text" name="std_email" value="<?php echo $std_email; ?>">
			</div>
			<div class="col">
				<label for="std_tel" class="">เบอร์โทร</label><br>
				<input type="text" name="std_tel" value="<?php echo $std_tel; ?>">
			</div>
		</div><br>
		<div class="row">
			<div class="col">
				<label for="std_idcard" class="">รหัสประจำตัวประชาชน</label><br>
				<input type="text" name="std_idcard" value="<?php echo $std_idcard; ?>">
			</div>
		</div><br>
		<div class="row">
			<div class="col">
				<label for="std_state">สถานะบัญชี</label><br>
				<select id="std_state" name="std_state">
					<option>
						<?php echo $std_state; ?>
					</option>
					<option value="">------ อัพเดท ------</option>
					<option value="เปิดใช้งาน">เปิดใช้งาน</option>
					<option value="ระงับบัญชี">ระงับบัญชี</option>
				</select><br><br>
			</div>
			<div class="col">
				<label for="std_major">สถานะการเลือกสาขา</label><br>
				<select id="std_major" name="std_major">
					<option>
						<?php echo $std_major; ?>
					</option>
					<option value="">------ อัพเดท ------</option>
					<option value="ยังไม่ได้เลือกสาขา">ยังไม่ได้เลือกสาขา</option>
					<option value="เลือกสาขาแล้ว">เลือกสาขาแล้ว</option>
				</select><br><br>
			</div>
			<div class="col ">
				<label for="std_colorbn">ทดสอบอาการตาบอดสี</label><br>
				<select id="std_colorbn" name="std_colorbn">
					<option>
						<?php echo $std_colorbn; ?>
					</option>
					<option value="">------ อัพเดท ------</option>
					<option value="ยังไม่ได้ทดสอบ">ยังไม่ได้ทดสอบ</option>
					<option value="ไม่มีอาการตาบอดสี">ไม่มีอาการตาบอดสี</option>
					<option value="อาการตาบอดสีแดงเขียว">อาการตาบอดสีแดงเขียว</option>
					<option value="อาการตาบอดสีน้ำเงินเหลือง">อาการตาบอดสีน้ำเงินเหลือง</option>
					<option value="อาการตาบอดสีทุกสี">อาการตาบอดสีทุกสี</option>
				</select><br><br>
			</div>
		</div><br>
		<input type="submit" name="update" value="อัพเดทข้อมูล" class="button_log box rounded mx-auto d-block">
	</form>
</body>

</html>