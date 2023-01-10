<?php
session_start();
include "config.php";

if (isset($_POST['admin_user']) && isset($_POST['admin_password'])) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$admin_user = validate($_POST['admin_user']);
	$admin_password = validate($_POST['admin_password']);

	if (empty($admin_user)) {
		header("Location: index.php?error=กรุณากรอก *ชื่อผู้ใช้งาน*");
		exit();
	} else if (empty($admin_password)) {
		header("Location: index.php?error=กรุณากรอก *รหัสผ่าน*");
		exit();
	} else {
		$sql = "SELECT * FROM admin WHERE admin_user='$admin_user' AND admin_password='$admin_password'";

		$result = mysqli_query($mysqli, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['admin_user'] === $admin_user && $row['admin_password'] === $admin_password) {
				$_SESSION['admin_user'] = $row['admin_user'];
				$_SESSION['admin_name'] = $row['admin_name'];
				$_SESSION['no'] = $row['no'];
				header("Location: homepage.php");
				exit();
			} else {
				header("Location: index.php?error=ชื่อผู้ใช้งานหรือรหัสผ่านผิด");
				exit();
			}
		} else {
			header("Location: index.php?error=ชื่อผู้ใช้งานหรือรหัสผ่านผิด");
			exit();
		}
	}
} else {
	header("Location: index.php");
	exit();
}
