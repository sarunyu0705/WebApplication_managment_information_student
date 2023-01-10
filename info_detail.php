<?php
include_once("config.php");
$std_id = $_GET['std_id'];
$result = mysqli_query($mysqli, "SELECT * FROM std_info
 WHERE std_id=$std_id");

while ($res = mysqli_fetch_array($result)) {

    $std_state = $res['std_state'];
    $std_firstname = $res['std_firstname'];
    $std_lastname = $res['std_lastname'];
    $std_password = $res['std_password'];
    $std_email = $res['std_email'];
    $std_tel = $res['std_tel'];
    $std_idcard = $res['std_idcard'];
    $std_colorbn = $res['std_colorbn'];
    $std_major = $res['std_major'];
    $std_major_time = $res['std_major_time'];
    $std_colorbn_time = $res['std_colorbn_time'];
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
				<a href="info_select.php">ข้อมูลการเลือกสาขา</a>
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
                <input type="text" disabled name="std_id" value="<?php echo $std_id; ?>">
            </div>
            <div class="col">
                <label for="std_firstname" class="">ชื่อนักศึกษา</label><br>
                <input type="text" disabled name="std_firstname" value="<?php echo $std_firstname; ?>">
            </div>
            <div class="col">
                <label for="std_lastname" class="">นามสกุลนักศึกษา</label><br>
                <input type="text" disabled name="std_lastname" value="<?php echo $std_lastname; ?>">
            </div>
        </div><br>
        <div class="row">
        	<div class="col">
                <label for="std_password" class="">รหัสผ่าน</label><br>
                <input type="text" disabled name="std_password" value="<?php echo $std_password; ?>">
            </div>
            <div class="col">
                <label for="std_email" class="">อีเมล</label><br>
                <input type="text" disabled name="std_email" value="<?php echo $std_email; ?>">
            </div>
            <div class="col">
                <label for="std_tel" class="">เบอร์โทร</label><br>
                <input type="text" disabled name="std_tel" value="<?php echo $std_tel; ?>">
            </div>
        </div><br>
                <div class="row">
            <div class="col">
                <label for="std_idcard" class="">รหัสประจำตัวประชาชน</label><br>
                <input type="text" disabled name="std_idcard" value="<?php echo $std_idcard; ?>">
            </div>            </div>
        </div><br><br>
        <div class="row">
            <div class="col">
                <label for="std_state">สถานะบัญชี</label><br>
                <input type="text" disabled name="std_state" value="<?php echo $std_state; ?>">
            </div>
            <div class="col">
                <label for="std_major">สถานะการเลือกสาขา</label><br>
                <input type="text" disabled name="std_major" value="<?php echo $std_major; ?>"><br>
                <label for="std_major_time">เวลาในการเลือกสาขา</label><br>
                <input type="text" disabled name="std_major_time" value="<?php echo $std_major_time; ?>">
            </div>
            <div class="col ">
                <label for="std_colorbn">ทดสอบอาการตาบอดสี</label><br>
                <input type="text" disabled name="std_colorbn" value="<?php echo $std_colorbn; ?>"><br>
                <label for="std_colorbn_time">เวลาทดสอบอาการตาบอดสี</label><br>
                <input type="text" disabled name="std_colorbn_time" value="<?php echo $std_colorbn_time; ?>">
            </div>
        </div><br><br>
    </form>
</body>

</html>