
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

$sql = "SELECT * FROM std_info
INNER JOIN std_gread_sum
ON std_info.std_id = std_gread_sum.std_id
 WHERE std_info.std_id LIKE '%" . $Keyword . "%' ";

$query = mysqli_query($conn, $sql);
?>
<!------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------->



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
				<a href="info.php">ข้อมูลนักศึกษา</a>
				<a href="add.php">เพิ่มบัญชีผู้ใช้งาน</a>
				<a href="info_select.php " class=" nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">ข้อมูลการเลือกสาขา</a>
				<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
					<li><a class="dropdown-item" href="info_select.php">ข้อมูลการเลือกสาขา</a></li>
					<li><a class="dropdown-item" href="info_department.php">ข้อมูลสาขาวิชาต่างๆ</a></li>
				</ul>
				<a href="info_gread.php" class="active">ข้อมูลผลการเรียน</a>
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
					</div>
				</div>
			</ul>
		</div>
	</div>
	<div class="container box"><br>
		<img src=""><br>

		<table class="table"><br>
			<div class="c">
				<img src="https://cdn-icons-png.flaticon.com/512/4631/4631090.png" alt="" width="200"><br><br>
			</div>
			<div class="c">
				<h4>ข้อมูลผลการเรียนนักศึกษาคณะวิศวกรรมศาสตร์ชั้นปีที่ 1</h4>
			</div>
			<br><br>
			<thead class="table-dark">
				<td>รหัสนักศึกษา</td>
				<td>ชื่อนักศึกษา</td>
				<td>นามสกุลนักศึกษา</td>
				<td>GP</td>
				<td>CA</td>
				<td>CP</td>
				<td>CR</td>
				<td>Gread Rate</td>
			</thead>
			<tbody>
				<!-- ---------------------------------	PHP START	---------------------------------------------- -->
				<?php
				while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td>" . $res['std_id'] . "</td>";
					echo "<td>" . $res['std_firstname'] . "</td>";
					echo "<td>" . $res['std_lastname'] . "</td>";
					echo "<td>" . $res['gp'] . "</td>";
					echo "<td>" . $res['ca'] . "</td>";
					echo "<td>" . $res['cp'] . "</td>";
					echo "<td>" . $res['cr'] . "</td>";
					echo "<td>" . $res['grade_rate'] . "</td>";
					echo "<td>
					</td>";
				}
				?>
			</tbody>
		</table>
	</div>

</body>

</html>