<?php
include("config.php");
$dept_id = $_GET['dept_id'];

$result = mysqli_query(
	$mysqli,
	"SELECT department_subject.dept_id,department.dept_tname,department.dept_status,department.dept_blind
        ,department_subject.subject_id,subject.subject_name_th
         FROM ((department_subject
         RIGHT JOIN department ON department_subject.dept_id = department.dept_id)
         RIGHT JOIN subject ON department_subject.subject_id = subject.subject_id)
         WHERE department.dept_id ='$dept_id'
         "
);

while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

	// colum from department // 
	$dept_tname = $res['dept_tname'];
	$dept_status = $res['dept_status'];
	$dept_blind = $res['dept_blind'];
	// colum from subject //
	$subject_id = $res['subject_id'];
	$subject_name_th = $res['subject_name_th'];
}
?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<?php
$serverName = "localhost";
$userName = "admin";
$userPassword = "123456";
$dbName = "select_major";

$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);

$dept_id = $_GET['dept_id'];

$sql = "SELECT department_subject.dept_id,department.dept_tname,department.dept_shortname,department.dept_status,department.dept_blind
,department_subject.subject_id,subject.subject_name_th,subject.subject_credit
 FROM ((department_subject
 RIGHT JOIN department ON department_subject.dept_id = department.dept_id)
 RIGHT JOIN subject ON department_subject.subject_id = subject.subject_id)
 WHERE department.dept_id ='$dept_id'";

$query = mysqli_query($conn, $sql);
?>
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
	<form action="edit.php" method="post" name="form1" class="container-sm box"><br>
		<div class="row">
			<div class="col">
				<label for="dept_id" class="">รหัสสาขาวิชา</label><br>
				<input type="text" disabled name="dept_id" class="" value="<?php echo $dept_id; ?>">
			</div>
			<div class="col">
				<label for="std_lastname" class="">ชื่อสาขาวิชา</label><br>
				<input type="text" name="std_lastname" disabled value="<?php echo $dept_tname; ?>">
			</div>
			<div class="col">

			</div>
		</div><br>
		<div class="row">
			<div class="col">
				<label for="dept_status" class="">สถานะของสาขาวิชา</label><br>
				<select id="dept_status" disabled name="dept_status">
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
				<input type="text" disabled name="dept_blind" value="<?php echo $dept_blind; ?>">
			</div>
			<div class="col">
			</div>
		</div><br><br>
		<div class="row">
			<div class="c">
				<h4>เงื่อนไขรายวิชาที่ต้องผ่านก่อนเลือกสาขา</h4>
			</div>
			<p class="ex2">
			<table class="table table table-bordered ">
				<thead>
					<tr class="table-primary">
						<th scope="col">รหัสวิชา</th>
						<th scope="col">ชื่อวิชา</th>
						<th scope="col">หน่วยกิต</th>
					</tr>
				</thead>
				<tbody>
				<tbody>
					<!-- ---------------------------------	PHP START	---------------------------------------------- -->
					<?php
					while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
						echo "<tr class>";
						echo "<td>" . $res['subject_id'] . "</td>";
						echo "<td>" . $res['subject_name_th'] . "</td>";
						echo "<td>" . $res['subject_credit'] . "</td>";

					}
					?>
				</tbody>
			</table>
			</p>
		</div>
	</form>
</body>

</html>