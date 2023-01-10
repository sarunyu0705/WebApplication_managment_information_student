<!-- tag php ของ data in table -->
<?php
include("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM std_info ORDER BY std_id DESC"); // using mysqli_query instead
?>

<?php
ini_set('display_errors', 1);
error_reporting(~0);

$Keyword = null;

if (isset($_POST["textKeyword"])) {
	$Keyword = $_POST["textKeyword"];
}
?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<?php
$serverName = "localhost";
$userName = "admin";
$userPassword = "123456";
$dbName = "select_major";

$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);

$sql = "SELECT * FROM std_info WHERE std_id LIKE '%" . $Keyword . "%' ";

$query = mysqli_query($conn, $sql);
?>
<!------------------------------------------------------------------------------------------------------------->
<?php
include("config.php");
if (isset($_POST['update'])) {
	$select_major_state = mysqli_real_escape_string($mysqli, $_POST['select_major_state']);
	$result = mysqli_query(
		$mysqli,
		"UPDATE mobile_app_state SET select_major_state='$select_major_state'"
	);
} else {
}
?>
<!------------------------------------------------------------------------------------------------------------->
<?php
//GET DATA
$result = mysqli_query($mysqli, "SELECT * FROM mobile_app_state");
while ($res = mysqli_fetch_array($result)) {
	$select_major_state = $res['select_major_state'];
}
?>


<!-- ********************************************************************************************************************************************** -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<title>ข้อมูลนักศึกษา</title>
</head>

<body>
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
				<div class=" container">
					<div class="r c text-white">
						<label for="frmSearch">ค้นหาข้อมูลนักศึกษา</label><br>
						<form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
							<input name="textKeyword" type="text" id="textKeyword" value="<?php echo $Keyword; ?>">
							<button type="submit" class="c button_search">
								ค้นหา
							</button>
						</form>
						<!-- <form action="info.php" method="post" name="on_off">
							<div class="r c text-white">
								<label for="select_major_state">ตั้งค่าสถานะ เปิด/ปิด การเลือกสาขา</label><br>
								<select id="select_major_state" name="select_major_state">
									<option>
										<?php echo $select_major_state; ?>
									</option>
									<option value="">------ อัพเดท ------</option>
									<option value="เปิดระบบ">เปิดระบบ</option>
									<option value="ปิดระบบ">ปิดระบบ</option>
								</select>
								<input type="submit" name="update" value="อัพเดทสถานะ" class="">
							</div>
						</form> -->
					</div>
				</div>
			</ul>
		</div>
	</div>
	<div class="container box"><br>
		<img src=""><br>

		<table class="table"><br>
			<div class="c">
				<img src="https://cdn-icons-png.flaticon.com/512/1256/1256650.png" alt="" width="200"><br><br>
			</div>
			<div class="c">
				<h4>ข้อมูลนักศึกษาคณะวิศวกรรมศาสตร์ชั้นปีที่ 1</h4>
			</div>
			<br><br>
			<div class="c">
				<a href="add.php" class="button_log container rounded mx-auto d-block">เพิ่มบัญชีผู้ใช้งาน</a>
			</div>
			<thead class="table-dark">
				<td>รหัสนักศึกษา</td>
				<td>ชื่อนักศึกษา</td>
				<td>นามสกุลนักศึกษา</td>
				<td>อีเมล</td>
				<td>เบอร์โทร</td>
				<td>เพิ่มเติม</td>
			</thead>
			<tbody>
				<!-- ---------------------------------	PHP START	---------------------------------------------- -->
				<?php
				while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td>" . $res['std_id'] . "</td>";
					echo "<td>" . $res['std_firstname'] . "</td>";
					echo "<td>" . $res['std_lastname'] . "</td>";
					echo "<td>" . $res['std_email'] . "</td>";
					echo "<td>" . $res['std_tel'] . "</td>";
					echo "<td>
					<a href=\"info_detail.php?std_id=$res[std_id]\" class=\"button_detail\" >รายละเอียด</a> 
					<a href=\"edit.php?std_id=$res[std_id]\" class=\"button_edit\">แก้ไขข้อมูล</a> 
					<a href=\"delete.php?std_id=$res[std_id]\" class=\"button_delete\" onClick=\"return confirm('ต้องการจะลบข้อมูล ?')\">ลบข้อมูล</a>
					</td>";
				}
				?>
			</tbody>
		</table>
	</div>

</body>

</html>