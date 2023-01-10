<!DOCTYPE html>
<html lang="en">

<?php
//including the database connection file
include_once("config.php");

if (isset($_POST['Submit'])) {
    $std_id = mysqli_real_escape_string($mysqli, $_POST['std_id']);
    $std_state = mysqli_real_escape_string($mysqli, $_POST['std_state']);
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
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty) 

        //insert data to database	
        $result = mysqli_query($mysqli, "INSERT INTO std_info(std_id,std_firstname,std_lastname,std_email,std_tel,std_password,std_idcard,std_state,std_colorbn,std_major) 
            VALUES('$std_id','$std_firstname','$std_lastname','$std_email','$std_tel','$std_password','$std_idcard','$std_state','$std_colorbn','$std_major')");
        $result2 = mysqli_query($mysqli, "INSERT INTO major_select(std_id,std_idcard) 
            VALUES('$std_id','$std_idcard')");

        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='info.php'>View Result</a>";
        header("Location: info.php");
    }
}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>เพิ่มบัญชีผู้ใช้</title>
</head>

<body class="container">
    <div>
        <img src="https://www.engineer.rmutt.ac.th/wp-content/uploads/2022/02/heading-1.jpg" alt="head_logo" class="rounded mx-auto d-block">
        <div class="topnav container">
            <ul>
                <a href="homepage.php">หน้าหลัก</a>
                <a href="info.php">ข้อมูลนักศึกษา</a>
                <a href="add.php" class="active">เพิ่มบัญชีผู้ใช้งาน</a>
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
    <!-- form เดี๋ยวลืม DIV -->
    <form action="add.php" method="post" name="form1" class="container-sm box"><br>
        <img src="https://cdn-icons-png.flaticon.com/512/1256/1256628.png " alt="" width="200" class="center"><br><br>
        <div class="c">
            <h3>เพิ่มบัญชีข้อมูลนักศึกษาคณะวิศวกรรมศาสตร์ชั้นปีที่ 1</h3><br>
        </div>
        <div class="row">
            <div class="col">
                <label for="std_id" class="center" >รหัสนักศึกษา</label>
                <input type="text" name="std_id" id="std_id"> <br><br>
            </div>
            <div class="col">
                <label for="std_firstname" class="center">ชื่อนักศึกษา</label>
                <input type="text" name="std_firstname" id="std_firstname"> <br><br>
            </div>
                        <div class="col">
                <label for="std_lastname" class="center">นามสกุลนักศึกษา</label>
                <input type="text" name="std_lastname" id="std_lastname"> <br><br>
            </div>
        </div>
        <div class="row">
                        <div class="col">
                <label for="std_password" class="center">รหัสผ่าน</label>
                <input type="text" name="std_password" id="std_password"> <br><br>
            </div>
            <div class="col">
                <label for="std_email" class="center">อีเมล</label>
                <input type="text" name="std_email" id="std_email"> <br><br>
            </div>
            <div class="col">
                <label for="std_tel" class="center">เบอร์โทร</label>
                <input type="text" name="std_tel" id="std_tel"> <br><br>
            </div>
        <div class="row">
                        <div class="col">
                <label for="std_idcard" class="center">รหัสประจำตัวประชาชน</label>
                <input type="text" name="std_idcard" id="std_idcard"> <br><br>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="std_state">สถานะบัญชี</label><br>
                <select id="std_state" name="std_state">
                    <option value="เปิดใช้งาน">เปิดใช้งาน</option>
                    <option value="ระงับบัญชี">ระงับบัญชี</option>
                </select><br><br>
            </div>
            <!--  -->
			<div class="col">
				<label for="std_major">สถานะการเลือกสาขา</label><br>
				<select id="std_major" name="std_major">
					<option value="ยังไม่ได้เลือกสาขา">ยังไม่ได้เลือกสาขา</option>
					<option value="เลือกสาขาแล้ว">เลือกสาขาแล้ว</option>
				</select><br><br>
			</div>
            <!--  -->
            <div class="col ">
                <label for="std_colorbn">ทดสอบอาการตาบอดสี</label><br>
                <select id="std_colorbn" name="std_colorbn">
                    <option value="ยังไม่ได้ทดสอบ">ยังไม่ได้ทดสอบ</option>
                    <option value="ไม่มีอาการตาบอดสี">ไม่มีอาการตาบอดสี</option>
                    <option value="อาการตาบอดสีแดงเขียว">อาการตาบอดสีแดงเขียว</option>
                    <option value="อาการตาบอดสีน้ำเงินเหลือง">อาการตาบอดสีน้ำเงินเหลือง</option>
                    <option value="อาการตาบอดสีทุกสี">อาการตาบอดสีทุกสี</option>
                </select><br><br>
            </div>
        </div>
        <br><br>
        <input type="submit" name="Submit" value="สมัครสมาชิก" class="button_log rounded mx-auto d-block">
        <br><br>
    </form>
    <!-- start Bootstrp -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- start PHP -->

</body>

</html>