<!-- tag php ของ data in table -->
<?php
include("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM department ORDER BY dept_id DESC"); // using mysqli_query instead
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

$sql = "SELECT * FROM department WHERE dept_tname LIKE '%" . $Keyword . "%' ";

$query = mysqli_query($conn, $sql);
?>
<!-- ********************************************************************************************************************************************** -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<title>ข้อมูลการสาขาวิชา</title>
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
	<!-- -----------------------------------------	Bootstrap	------------------------------------------------------- -->
	<div>
		<img src="https://www.engineer.rmutt.ac.th/wp-content/uploads/2022/02/heading-1.jpg" alt="head_logo" class="rounded mx-auto d-block">
		<div class="topnav container">
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
			<div class=" container">
				<div class="r c text-white">
					<label for="frmSearch">ค้นหาสาขาวิชา</label><br>
					<form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
						<input name="textKeyword" type="text" id="textKeyword" value="<?php echo $Keyword; ?>">
						<button type="submit" class="c button_search">
							ค้นหา
						</button>
					</form>
				</div>
			</div>
			</ul>
		</div>
	</div>
	<div class="container box"><br>
		<img src=""><br>

		<table class="table"><br>
			<div class="c">
				<img src="https://cdn-icons-png.flaticon.com/512/1488/1488564.png" alt="" width="200"><br><br>
			</div>
			<div class="c">
				<h4>ข้อมูลสาขาวิชาภายในคณะวิศวกรรมศาสตร์</h4>
			</div> <br><br>
			<div class="c">
				<a href="add_department.php" class="button_log container rounded mx-auto d-block">เพิ่มสาขาวิชาภายในคณะวิศวกรรมศาสตร์</a>
			</div>
			<thead class="table-dark">
				<td>รหัสสาขาวิชา</td>
				<td>ชื่อสาขาวิชา</td>
				<td>สถานะสาขาวิชา</td>
				<td>สถานะตาบอดสี</td>
				<td>เพิ่มเติม</td>
			</thead>
			<tbody>
				<!-- ---------------------------------	PHP START	---------------------------------------------- -->
				<?php
				while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td>" . $res['dept_id'] . "</td>";
					echo "<td>" . $res['dept_tname'] . "</td>";
					echo "<td>" . $res['dept_status'] . "</td>";
					echo "<td>" . $res['dept_blind'] . "</td>";
					echo "<td>
					<a href=\"info_department_detail.php?dept_id=$res[dept_id]\" class=\"button_detail\" >รายละเอียดสาขา</a>
					<a href=\"edit_department.php?dept_id=$res[dept_id]\" class=\"button_edit\" >แก้ไขข้อมูล</a>
					<a href=\"delete_department.php?dept_id=$res[dept_id]\" onClick=\"return confirm('ต้องการจะลบข้อมูล ?')\" class=\"button_delete\">ลบสาขา</a> 
					</td>";
					echo "<td>
					</td>";
				}
				?>
			</tbody>
		</table>
	</div>

</body>

</html>