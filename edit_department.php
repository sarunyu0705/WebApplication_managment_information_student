<?php
// including the database connection file
include("config.php");

if (isset($_POST['update'])) {

	$dept_id = mysqli_real_escape_string($mysqli, $_POST['dept_id']);
	$dept_shortname = mysqli_real_escape_string($mysqli, $_POST['dept_shortname']);
	$dept_tname = mysqli_real_escape_string($mysqli, $_POST['dept_tname']);
	$dept_status = mysqli_real_escape_string($mysqli, $_POST['dept_status']);
	$dept_blind = mysqli_real_escape_string($mysqli, $_POST['dept_blind']);
	//updating the Department
	$result = mysqli_query(
		$mysqli,
		"UPDATE department SET dept_tname='$dept_tname',dept_shortname='$dept_shortname',dept_status='$dept_status',dept_blind='$dept_blind'
		 WHERE dept_id=$dept_id"
	);

	header("Location:info_department.php");
}
?>
<?php

$dept_id = $_GET['dept_id'];

$result = mysqli_query($mysqli, "SELECT * FROM department WHERE dept_id=$dept_id");

while ($res = mysqli_fetch_array($result)) {

	$dept_tname = $res['dept_tname'];
	$dept_shortname = $res['dept_shortname'];
	$dept_status = $res['dept_status'];
	$dept_blind = $res['dept_blind'];
}
?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
<!--  -->
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
				<a href="info.php">ข้อมูลนักศึกษา</a>
				<a href="add.php">เพิ่มบัญชีผู้ใช้งาน</a>
				<a href="info_select.php " class="active nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">ข้อมูลการเลือกสาขา</a>
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
	
	<form action="edit_department.php" method="post" name="form1" class="container-sm box"><br>
		<div class="row">
			<div class="col">
				<label for="dept_id" class="">รหัสสาขาวิชา</label><br>
				<input type="text" name="dept_id" class="" value="<?php echo $dept_id; ?>">
			</div>
			<div class="col">
				<label for="dept_tname" class="">ชื่อสาขาวิชา</label><br>
				<input type="text" name="dept_tname" value="<?php echo $dept_tname; ?>">
			</div>
			<div class="col">
			</div>
		</div><br>
		<div class="row">
			<div class="col">
				<label for="dept_status" class="">สถานะของสาขาวิชา</label><br>
				<select id="dept_status" name="dept_status">
					<option>
						<?php echo $dept_status; ?>
					</option>
					<option value="">------ อัพเดท ------</option>
					<option value="เปิด">เปิด</option>
					<option value="ปิด">ปิด</option>
				</select><br><br>
			</div>
			<div class="col">
				<label for="dept_blind" class="">อ้างอิงกับผลการทดสอบอาการตาบอดสี</label><br>
				<select id="dept_blind" name="dept_blind">
					<option>
						<?php echo $dept_blind; ?>
					</option>
					<option value="">------ อัพเดท ------</option>
					<option value="จำเป็น">จำเป็น</option>
					<option value="ไม่จำเป็น">ไม่จำเป็น</option>
				</select><br><br>
			</div>
			<div class="col">
			</div>
		</div><br><br>
		<div class="row">
		</div>
		<input type="submit" name="update" value="อัพเดทข้อมูลสาขา" class="button_log box rounded mx-auto d-block">
	</form>
</body>

</html>