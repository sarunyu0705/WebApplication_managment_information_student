<?php
include_once("config.php");
$std_id = $_GET['std_id'];
$result = mysqli_query($mysqli, "SELECT * FROM major_select
 WHERE std_id=$std_id");

while ($res = mysqli_fetch_array($result)) {

	$major_1 = $res['major_1'];
	$major_2 = $res['major_2'];
	$major_3 = $res['major_3'];
	$major_4 = $res['major_4'];
	$major_5 = $res['major_5'];
	$major_6 = $res['major_6'];
	$major_7 = $res['major_7'];
	$major_8 = $res['major_8'];
	$major_9 = $res['major_9'];
	$major_10 = $res['major_10'];
	$major_11 = $res['major_11'];
	$major_12 = $res['major_12'];
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
				<a href="info.php">ข้อมูลนักศึกษา</a>
				<a href="add.php">เพิ่มบัญชีผู้ใช้งาน</a>
				<a href="info_select.php" class="active">ข้อมูลการเลือกสาขา</a>
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
				<label for="major_1" class="">สาขาที่ 1</label><br>
				<input type="text" disabled name="major_1" value="<?php echo $major_1; ?>">
			</div>
			<div class="col">
				<label for="major_2" class="">สาขาที่ 2</label><br>
				<input type="text" disabled name="major_2" value="<?php echo $major_2; ?>">
			</div>
			<div class="col">
				<label for="major_3" class="">สาขาที่ 3</label><br>
				<input type="text" disabled name="major_3" value="<?php echo $major_3; ?>">
			</div>
		</div><br>
		<div class="row">
			<div class="col">
				<label for="major_4" class="">สาขาที่ 4</label><br>
				<input type="text" disabled name="major_4" value="<?php echo $major_4; ?>">
			</div>
			<div class="col">
				<label for="major_5" class="">สาขาที่ 5</label><br>
				<input type="text" disabled name="major_5" value="<?php echo $major_5; ?>">
			</div>
			<div class="col">
				<label for="major_6" class="">สาขาที่ 6</label><br>
				<input type="text" disabled name="major_6" value="<?php echo $major_6; ?>">
			</div>
		</div><br>
		<div class="row">
			<div class="col">
				<label for="major_7" class="">สาขาที่ 7</label><br>
				<input type="text" disabled name="major_7" value="<?php echo $major_8; ?>">
			</div>
			<div class="col">
                <label for="major_8">สาขาที่ 8</label><br>
                <input type="text" disabled name="major_8" value="<?php echo $major_8; ?>">
            </div>
			<div class="col">
                <label for="major_9">สาขาที่ 9</label><br>
                <input type="text" disabled name="major_9" value="<?php echo $major_9; ?>">
            </div>
		</div>
		</div><br><br>
		<div class="row">
			<div class="col">
				<label for="major_10">สาขาที่ 10</label><br>
				<input type="text" disabled name="major_10" value="<?php echo $major_10; ?>">
			</div>
			<div class="col">
				<label for="major_11">สาขาที่ 11</label><br>
				<input type="text" disabled name="major_11" value="<?php echo $major_11; ?>"><br>
			</div>
			<div class="col ">
				<label for="major_12">สาขาที่ 12</label><br>
				<input type="text" disabled name="major_12" value="<?php echo $major_12; ?>"><br>
			</div>
		</div><br><br>
	</form>
</body>

</html>